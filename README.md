## src/Capabilities.php
A PHP class for jeedom using meari-like mobile applications :
- Meari,
- CloudEdge,
- Beaba Zen Connect,
- Arenti, (*)
- isiwi,
- ZUMIMALL,
- VacosSmart,
- COOAU,
- Baby Watch Plus,
- My Uniden +,
- CloudPlus,
- Cloudot,
- ieGeek Cam,
- Cococam,
- ANRAN,
- K&F Cam,
- Elemage Cam,
- BabytimeHome,
- WGV,
- Mubview,
- Morecam,
- SV3C Cloud,
- SIIOOE,
- BoifunCam,
- Safeview,
- DingLink,
- Cloud Top,
- DEATTI,
- Topcony,
- SecuPlus,
- Yes iHome,
- VIZIUUY,
- TkenPro,
- Buzzai Pro,
- GCLink,
- PARINNOV,
- Jennov.

## get_brands.sh | get_brands.py
get_brands.sh obsolete, use python
get_brands.py
Thats script test 3 different links (privacy/agreement/google assistant) to catch new app using meari base.

## get_play_store_infos.sh
A script that get name/version/releaseNote/releaseDate from Play Store.
```
usage: get_play_store_infos.sh [-a|--all] [-h|--help] [-j|--json] [-l|--latest] [-n|--name] [-q|--quiet] [-u|--url] [-v|--version] application ID
  options:
  [-a|--all]             Print all available details of the app including name, version, bundle ID, release notes, and release date.
  [-h|--help]            Print this help message.
  [-j|--json]            Print this entire script json tree from the App Store.
  [-l|--latest]          Print the latest version and release notes of the app.
  [-n|--name]            Print the name of the app.
  [-q|--quiet]           Run the script in quiet mode. Only errors and essential messages will be shown.
  [-v|--version]         Print the version of the script.
  [-V|--appVersion]      Print the version of the app.
  application ID         The ID of the application to retrieve information for.
```

## get_app_store_infos.sh
A script that get name/version/bundleId/releaseNote/releaseDate from App Store.
```
usage: get_app_store_infos.sh [-a|--all] [-h|--help] [-j|--json] [-l|--latest] [-n|--name] [-q|--quiet] [-u|--url] [-v|--version] application ID
  options:
  [-a|--all]             Print all available details of the app including name, version, bundle ID, release notes, and release date.
  [-A|--allversions]     Print all history versions of the app.
  [-h|--help]            Print this help message.
  [-j|--json]            Print this entire script json tree from the App Store.
  [-l|--latest]          Print the latest version and release notes of the app.
  [-n|--name]            Print the name of the app.
  [-q|--quiet]           Run the script in quiet mode. Only errors and essential messages will be shown.
  [-u|--url]             Print the url of the app.
  [-v|--version]         Print the version of the script.
  [-V|--appVersion]      Print the version of the app.
  application ID         The ID of the application to retrieve information for.
```

## update_brands_from_stores.sh
This script catches version, releaseNote, releaseDate of apps on App Store and Play Store, and display it or store it in a file.

```
Usage: update_brands_from_stores.sh [-a|--appstore] [-d|--debug] [-h|--help] [-p|--playstore] [-s|--show] [-v|--version] [-i|--input <file>] [-q|--quiet]
  options:
  [-a|--appstore]        Print only app infos from App Store.
  [-d|--debug]           Print additionnal log for debug.
  [-h|--help]            Print this help.
  [-p|--playstore]       Print only app infos from Play Store.
  [-q|--quiet]           Run the script in quiet mode. Only version updates will be shown.
  [-s|--show]            Print only updated apps.
  [-v|--version]         Print script version.
  [-i|--input <file>]    Specify the input JSON file. Default is brands_infos.json.
```
