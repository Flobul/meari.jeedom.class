<?php
include("src/Capabilities.php");
use Flobul\Meari\Capabilities;

function __($_content, $_name) {
    return $_content;
};

$capas = new Capabilities();
$appsO = $capas->apps;
$json = file_get_contents("src/brands_infos.json");
$file = file_get_contents("src/Capabilities.php");

// iOS (App Store) est la référence par défaut
$store = 2; // 0 = both, 1 = playstore, 2 = appstore
$dryRun = false; // dry-run flag

// Analyse des arguments (plusieurs flags acceptés)
foreach (array_slice($argv ?? [], 1) as $arg) {
    switch ($arg) {
        case '-p':
        case '--playstore':
            $store = 1;
            break;
        case '-a':
        case '--appstore':
            $store = 2;
            break;
        case '-b':
        case '--both':
            $store = 0;
            break;
        case '-d':
        case '--dry-run':
            $dryRun = true;
            break;
    }
}

if ($dryRun) {
    echo "[DRY RUN] Vérification des versions dans le fichier Capabilities.php.\n";
}

$array = json_decode($json, true);
if (is_array($array)) {
    foreach ($array as $appsN) {
        if (isset($appsO[$appsN['name']])) {
            $version = null;

            if ($store === 0) {
                // Les deux stores : on prend la plus récente
                if (isset($appsN['appstoreVersion']) && isset($appsN['playstoreVersion'])) {
                    $version = version_compare($appsN['appstoreVersion'], $appsN['playstoreVersion']) >= 0
                        ? $appsN['appstoreVersion']
                        : $appsN['playstoreVersion'];
                } elseif (isset($appsN['appstoreVersion'])) {
                    $version = $appsN['appstoreVersion'];
                } elseif (isset($appsN['playstoreVersion'])) {
                    $version = $appsN['playstoreVersion'];
                }
            } elseif ($store === 1 && isset($appsN['playstoreVersion'])) {
                $version = $appsN['playstoreVersion'];
            } elseif ($store === 2 && isset($appsN['appstoreVersion'])) {
                $version = $appsN['appstoreVersion'];
            }

            if ($version && version_compare($appsO[$appsN['name']]['APP_VERSION'], $version) < 0) {
                echo "Mise à jour de \"" . $appsN['name'] . "\" de v" . $appsO[$appsN['name']]['APP_VERSION'] . " vers v" . $version . "\n";

                $pattern = '/("' . str_replace("+", "\+", $appsN['name']) . '"\s*=>\s*array\s*\(\s*"BRAND"\s*=>\s*".*",\s*"APP_VERSION"\s*=>\s*")[^"]*(",\s*"APP_VERSION_CODE")/';
                $replacement = '${1}' . $version . '${2}';
                if (!$dryRun) {
                    $newFile = preg_replace($pattern, $replacement, $file);
                    if ($newFile === null) {
                        echo "Erreur regex pour \"" . $appsN['name'] . "\" — fichier non modifié pour cette entrée.\n";
                    } else {
                        $file = $newFile;
                    }
                }
            }
        } else {
            echo "Nouvelle application non encore présente dans le fichier PHP : " . $appsN['name'] . "\n";
        }
    }
}

if (!$dryRun) {
    file_put_contents("src/Capabilities.php", $file);

    // Vérification syntaxique du fichier PHP après mise à jour
    $lintOutput = shell_exec("php -l src/Capabilities.php 2>&1");
    if (strpos($lintOutput, 'No syntax errors detected') === false) {
        echo "ERREUR DE SYNTAXE PHP après mise à jour :\n" . $lintOutput . "\n";
        exit(1);
    }

    echo "Mise à jour terminée.\n";
} else {
    echo "[DRY RUN] Aucune modification n'a été apportée au fichier Capabilities.php.\n";
}
?>
