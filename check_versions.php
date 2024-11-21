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

$store = 0; // 0 = both, 1 = playstore, 2 = appstore
$dryRun = false; // dry-run flag

// Analyse des arguments
if (isset($argv)) {
    foreach ($argv as $arg) {
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
            default:
                echo "Aucun argument n'a été saisi.\n";
                return;
        }
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

            if ($store == 0) {
                if (isset($appsN['playstoreVersion']) && isset($appsN['appstoreVersion'])) {
                    $version = version_compare($appsN['appstoreVersion'], $appsN['playstoreVersion']) < 0 ? $appsN['playstoreVersion'] : $appsN['appstoreVersion'];
                } elseif (isset($appsN['playstoreVersion'])) {
                    $version = $appsN['playstoreVersion'];
                } elseif (isset($appsN['appstoreVersion'])) {
                    $version = $appsN['appstoreVersion'];
                }
            } elseif ($store == 1 && isset($appsN['playstoreVersion'])) {
                $version = $appsN['playstoreVersion'];
            } elseif ($store == 2 && isset($appsN['appstoreVersion'])) {
                $version = $appsN['appstoreVersion'];
            }

            if ($version && version_compare($appsO[$appsN['name']]['APP_VERSION'], $version) < 0) {
                echo "Mise à jour de \"" . $appsN['name'] . "\" de v" . $appsO[$appsN['name']]['APP_VERSION'] . " vers v" . $version . "\n";

                $pattern = '/("'.str_replace("+","\+",$appsN['name']).'"\s*=>\s*array\s*\(\s*"BRAND"\s*=>\s*".*",\s*"APP_VERSION"\s*=>\s*")[^"]*(",\s*"APP_VERSION_CODE")/';
                $replacement = '${1}'.$version.'${2}';
                if (!$dryRun) {
                    $file = preg_replace($pattern, $replacement, $file);
                }
            }
        } else {
            echo "Nouvelle application non encore présente dans le fichier PHP : " . $appsN['name'] . "\n";
        }
    }
}

if (!$dryRun) {
    file_put_contents("src/Capabilities.php", $file);
    echo "Mise à jour terminée.\n";
} else {
    echo "[DRY RUN] Aucune modification n'a été apportée au fichier Capabilities.php.\n";
}
?>
