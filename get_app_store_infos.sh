#!/bin/bash
# created by Flobul
# This script gathers useful activator commands

#############################
# DECLARATION DES VARIABLES #
#############################
SCRIPT_VERSION="0.1.0"
quiet=false

#############################
# DECLARATION DES FONCTIONS #
#############################

# Fonction d'affichage de l'aide
function display_help() {
    echo "usage: $(basename "$0") [-a|--all] [-h|--help] [-j|--json] [-l|--latest] [-n|--name] [-q|--quiet] [-u|--url] [-v|--version] application ID"
    echo "  options:"
    echo "  [-a|--all]             Print all available details of the app including name, version, bundle ID, release notes, and release date."
    echo "  [-A|--allversions]     Print all history versions of the app."
    echo "  [-h|--help]            Print this help message."
    echo "  [-j|--json]            Print this entire script json tree from the App Store."
    echo "  [-l|--latest]          Print the latest version and release notes of the app."
    echo "  [-n|--name]            Print the name of the app."
    echo "  [-q|--quiet]           Run the script in quiet mode. Only errors and essential messages will be shown."
    echo "  [-u|--url]             Print the url of the app."
    echo "  [-v|--version]         Print the version of the script."
    echo "  [-V|--appVersion]      Print the version of the app."
    echo "  application ID         The ID of the application to retrieve information for."
    exit 1
}

# Fonction d'affichge de la version du script'
function display_version() {
    echo $SCRIPT_VERSION
    exit 0
}

# Fonction pour afficher les messages
function log_message() {
    local message_type=$1
    local message=$2

    if [[ $quiet = true ]]; then
        if [[ $message_type != "SUCCESS" ]]; then
            return  # Si silencieux, ne pas afficher les messages sauf en cas de succès (mise à jour)
        fi
    fi

    case $message_type in
        "INFO")    echo -e "💬 $message" ;;
        "DEBUG")   echo -e "🐛 $message" ;;
        "SUCCESS") echo -e "✅ $message" ;;
        "ERROR")   echo -e "❌ $message" ;;
        *)         echo -e "$message" ;;
    esac
}

# Fonction pour récupérer les informations JSON de l'application
function fetch_app_json() {
    local app_id="$1"
    local result=$(curl -sL "https://apps.apple.com/app/id$app_id" |
        tr -d '\n' |
        sed -e 's:.*<script type="fastboot/shoebox" id="shoebox-media-api-cache-apps">::' -e 's:</script>.*::' |
        jq -r 'to_entries | .[0].value | fromjson? // empty')

    if [[ $? -ne 0 || -z "$result" ]]; then
        log_message "ERROR" "Failed to fetch data for app ID $app_id"
        exit 1
    fi

    # Vérifier si la sortie est du JSON valide
    if ! echo "$result" | jq . > /dev/null 2>&1; then
        log_message "ERROR" "Invalid JSON received for app ID $app_id"
        exit 1
    fi

    echo "$result"
}

# Fonction principale
function main() {
    local app_id="$1"
    local arg="$2"
    local app_json=$(fetch_app_json "$app_id")

    if [[ -z "$app_json" ]]; then
        log_message "ERROR" "Could not retrieve or parse JSON for app ID $app_id"
        exit 1
    fi

    case "$arg" in
        json)
            echo "$app_json" | jq .  # Affichage formaté du JSON avec jq
            ;;
        name)
            echo "$app_json" | jq -r '.d[0].attributes.name'
            ;;
        url)
            echo "$app_json" | jq -r '.d[0].attributes.url'
            ;;
        version)
            echo "$app_json" | jq -r '.d[0].attributes.platformAttributes | to_entries[] | { version: .value.versionHistory[0].versionDisplay }'
            ;;
        allversions)
            echo "$app_json" | jq -r '.d[0].attributes.platformAttributes.ios.versionHistory'
            ;;
        latest)
            echo "$app_json" | jq -r '.d[0].attributes.platformAttributes | to_entries[] | { version: .value.versionHistory[0].versionDisplay, releaseNote: .value.versionHistory[0].releaseNotes, releaseDate: .value.versionHistory[0].releaseDate }'
            ;;
        all)
            echo "$app_json" | jq -r '{
                name: .d[0].attributes.name,
                id: "'$app_id'",
                bundleId: .d[0].attributes.platformAttributes | to_entries[0].value.bundleId,
                version: .d[0].attributes.platformAttributes | to_entries[0].value.versionHistory[0].versionDisplay,
                releaseNote: .d[0].attributes.platformAttributes | to_entries[0].value.versionHistory[0].releaseNotes,
                releaseDate: .d[0].attributes.platformAttributes | to_entries[0].value.versionHistory[0].releaseDate
            }'
            ;;
        *)
            display_help
            ;;
    esac
}

# Analyse des arguments de la ligne de commande
function parse_cli {
    # Transforme options longues en courtes
    for arg in "$@"; do
        shift
        case "$arg" in
            "--all")         set -- "$@" "-a" ;;
            "--allversions") set -- "$@" "-A" ;;
            "--help")        set -- "$@" "-h" ;;
            "--json")        set -- "$@" "-j" ;;
            "--latest")      set -- "$@" "-l" ;;
            "--name")        set -- "$@" "-n" ;;
            "--quiet")       set -- "$@" "-q" ;;
            "--url")         set -- "$@" "-u" ;;
            "--version")     set -- "$@" "-v" ;;
            "--appVersion")  set -- "$@" "-V" ;;
            *)               set -- "$@" "$arg"
        esac
    done

    local app_id=""
    local arg=""

    # Analyse des options
    while getopts "A:n:V:j:l:a:u:s:hqv" opt; do
        case $opt in
            a) arg="all" ;;
            A) arg="allversions" ;;
            h) display_help ;;
            j) arg="json" ;;
            l) arg="latest" ;;
            n) arg="name" ;;
            q) quiet=true ;;
            u) arg="url" ;;
            v) display_version ; exit 0 ;;
            V) arg="version" ;;
            \?) display_help ;;
        esac
    done

    shift $((OPTIND + 1))  # Déplace le pointeur de position pour obtenir l'ID d'application et les autres arguments

    # Vérifier que l'ID d'application est fourni
    if [[ $# -lt 1 ]]; then
        display_help
    fi

    app_id="$2"

    # Vérifier que l'argument est fourni
    if [[ -z "$arg" ]]; then
        display_help
    fi

    main "$app_id" "$arg"
}

parse_cli "$@"
