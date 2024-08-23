#!/bin/bash
# created by Flobul
# This script gathers useful activator commands

#############################
# DECLARATION DES VARIABLES #
#############################
SCRIPT_VERSION="0.1.1"
quiet=false

#############################
# DECLARATION DES FONCTIONS #
#############################

# Fonction d'affichage de l'aide
function display_help() {
    echo "usage: $(basename "$0") [-a|--all] [-h|--help] [-j|--json] [-l|--latest] [-n|--name] [-q|--quiet] [-u|--url] [-v|--version] application ID"
    echo "  options:"
    echo "  [-a|--all]             Print all available details of the app including name, version, bundle ID, release notes, and release date."
    echo "  [-h|--help]            Print this help message."
    echo "  [-j|--json]            Print this entire script json tree from the App Store."
    echo "  [-l|--latest]          Print the latest version and release notes of the app."
    echo "  [-n|--name]            Print the name of the app."
    echo "  [-q|--quiet]           Run the script in quiet mode. Only errors and essential messages will be shown."
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
    local result=$(curl -sL "https://play.google.com/store/apps/details?id=$app_id" |
        tr -d '\n' | sed -e 's:.*<script class="ds\:5" nonce="[^"]*">::' -e 's:</script>.*::' |
        sed -e 's:.*data\:::' -e 's:, sideChannel.*::')

    if [[ $? -ne 0 || -z "$result" ]]; then
        log_message "ERROR" "Failed to fetch data for app ID $app_id"
        exit 1
    fi

    # Vérifier si la sortie est du JSON valide
    if ! echo "$result" | jq . > /dev/null 2>&1; then
        log_message "ERROR" "Invalid JSON received for app ID $app_id"
        exit 1
    fi

    return $result
}

## Fonction pour transformer la date au format YYYY-MM-DD
function format_date() {
    local input_date="$1"
    if [[ "$OSTYPE" == "darwin"* ]]; then
        LC_TIME=en_US.UTF-8 date -j -f "%b %d, %Y" "$input_date" +"%Y-%m-%d"
    else
        LC_TIME=en_US.UTF-8 date -d "$input_date" +"%Y-%m-%d"
    fi
}

## check_result
function check_result() {
    local cmd="$1"
    local result
    result=$(eval "$cmd" 2> /dev/null)
    local status=$?

    if [[ $status -eq 0 ]]; then
        echo "$result" | jq .
        return 0
    else
        log_message "ERROR" "Could not retrieve or parse JSON for bundleID $app_id"
        return 1  # Indique une erreur
    fi
}

# Fonction principale
function main() {
    local app_id="$1"
    local arg="$2"
    local app_json=$(fetch_app_json "$app_id")

    if [[ -z "$app_json" ]]; then
        log_message "ERROR" "Could not retrieve or parse JSON for bundleID $app_id"
        exit 1
    fi

    case "$arg" in
        json)
            echo "$app_json" | jq .  # Affichage formaté du JSON avec jq
            ;;
        name)
            check_result 'echo "$app_json" | jq -er "to_entries | .[1].value.[2][0][0]"'
            ;;
        version)
            check_result 'echo "$app_json" | jq -er "to_entries | .[1].value.[2][140][0][0][0]"'
            ;;
        latest)
            if release_date=$(check_result 'echo "$app_json" | jq -er "to_entries | .[1].value.[2][145]"');then
                release_date=$(echo "$release_date" | jq -er ".[0][0]")
                local formatted_date=$(format_date "$release_date")
                check_result 'echo "$app_json" | jq -er "to_entries | .[1].value.[2] | { version: .[140][0][0][0], releaseNote: .[144][1][1], releaseDate: \"'$formatted_date'\" }"'
            else
                exit 1
            fi
        ;;
        all)
            if release_date=$(check_result 'echo "$app_json" | jq -er "to_entries | .[1].value.[2][145]"');then
                release_date=$(echo "$release_date" | jq -er ".[0][0]")
                local formatted_date=$(format_date "$release_date")
                check_result 'echo "$app_json" | jq -er "{
                    name: to_entries | .[1].value.[2][0][0],
                    bundleId: \"'$app_id'\",
                    version: to_entries | .[1].value.[2][140][0][0][0],
                    releaseNote: to_entries | .[1].value.[2][144][1][1],
                    releaseDate: \"'$formatted_date'\"
                }"'
            else
                exit 1
            fi
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
            "--all")        set -- "$@" "-a" ;;
            "--help")       set -- "$@" "-h" ;;
            "--json")       set -- "$@" "-j" ;;
            "--latest")     set -- "$@" "-l" ;;
            "--name")       set -- "$@" "-n" ;;
            "--quiet")      set -- "$@" "-q" ;;
            "--version")    set -- "$@" "-v" ;;
            "--appVersion") set -- "$@" "-V" ;;
            *)              set -- "$@" "$arg"
        esac
    done

    local app_id=""
    local arg=""

    # Analyse des options
    while getopts "n:V:j:l:a:u:s:hqv" opt; do
        case $opt in
            a) arg="all" ;;
            h) display_help ;;
            j) arg="json" ;;
            l) arg="latest" ;;
            n) arg="name" ;;
            q) quiet=true ;;
            v) display_version ;;
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
