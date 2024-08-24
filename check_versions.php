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

var_dump($argv);
exit;
$whichStore = '';
switch ($whichStore) {
    case '':
        break;
    case '':
        break;
    case '':
        break;
}


$array = json_decode($json, true);
if (is_array($array)) {
    foreach ($array as $appsN) {
        if (isset($appsO[$appsN['name']])) {
            if (isset($appsN['playstoreVersion']) && $appsN['playstoreVersion'] != null &&
            isset($appsN['appstoreVersion']) && $appsN['appstoreVersion'] != null) {
                $version = version_compare($appsN['appstoreVersion'], $appsN['playstoreVersion']) < 0 ? $appsN['playstoreVersion'] : $appsN['appstoreVersion'];
            } elseif ($onlyApp && (!isset($appsN['playstoreVersion']) || $appsN['playstoreVersion'] == null)) {
                $version = $appsN['appstoreVersion'];
            } elseif ($onlyPlay && (!isset($appsN['appstoreVersion']) || $appsN['appstoreVersion'] == null)) {
                $version = $appsN['playstoreVersion'];
            }
            if (isset($version) && version_compare($appsO[$appsN['name']]['APP_VERSION'], $version) < 0) {
                echo "update ". $appsN['name'] . " to " . $version . " > " . $appsO[$appsN['name']]['APP_VERSION'] ."\n";
                $pattern = '/("'.$appsN['name'].'"\s*=>\s*array\s*\(\s*"BRAND"\s*=>\s*".*",\s*"APP_VERSION"\s*=>\s*")[^"]*(",\s*"APP_VERSION_CODE")/';
                $replacement = '${1}'.$version.'${2}';
                $file = preg_replace($pattern, $replacement, $file);
            }
        } else {
            echo "New app not yet in php file" . $appsN['name'] . "\n";
        }
    }
}

file_put_contents("src/Capabilities.php", $file);

?>
