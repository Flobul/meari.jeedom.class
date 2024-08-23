#!/bin/bash
# created by Flobul
# This script gathers useful activator commands

#############################
# DECLARATION DES VARIABLES #
#############################
SCRIPT_VERSION="0.1.0"
default_json_file="src/brands_infos.json"
command_playstore="./get_play_store_infos.sh"
command_appstore="./get_app_store_infos.sh"
show_all=true
debug=false
quiet=false
option="-a"
appstore=true
playstore=true
input_file=""

#############################
# DECLARATION DES FONCTIONS #
#############################

# Fonction d'affichage de l'aide
function display_help() {
    echo "This script catches version, releaseNote, releaseDate of apps on App Store and Play Store, and display it or store it in a file."
    echo
    echo "usage: $(basename "$0") [-a|--appstore] [-d|--debug] [-h|--help] [-p|--playstore] [-s|--show] [-v|--version] [-i|--input <file>] [-q|--quiet]"
    echo "  options:"
    echo "  [-a|--appstore]        Print only app infos from App Store."
    echo "  [-d|--debug]           Print additionnal log for debug."
    echo "  [-h|--help]            Print this help."
    echo "  [-p|--playstore]       Print only app infos from Play Store."
    echo "  [-q|--quiet]           Run the script in quiet mode. Only version updates will be shown."
    echo "  [-s|--show]            Print only updated apps."
    echo "  [-v|--version]         Print script version."
    echo "  [-i|--input <file>]    Specify the input JSON file. Default is $default_json_file."
}

# Fonction d'affichge de la version du script'
function display_version() {
    echo $SCRIPT_VERSION
}

# Fonction de comparaison de versions
function compare_versions() {
    local old_version=$1
    local new_version=$2

    IFS='.' read -r -a old_version_parts <<< "$old_version"
    IFS='.' read -r -a new_version_parts <<< "$new_version"

    for i in "${!new_version_parts[@]}"; do
        if [[ "${new_version_parts[i]:-0}" -gt "${old_version_parts[i]:-0}" ]]; then
            return 0
        elif [[ "${new_version_parts[i]:-0}" -lt "${old_version_parts[i]:-0}" ]]; then
            return 1
        fi
    done

    return 1  # Les versions sont égales
}

# Fonction pour vérifier le fichier JSON d'entrée
function check_input_file() {
    if [[ -n $input_file ]]; then
        json_file="$input_file"
    fi

    if [[ ! -f "$json_file" ]]; then
        log_message "ERROR" "Input file $json_file does not exist."
        exit 1
    fi

    if ! jq empty "$json_file" >/dev/null 2>&1; then
        log_message "ERROR" "Input file $json_file is not a valid JSON."
        exit 1
    fi

    log_message "SUCCESS" "Input file $json_file is valid."
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
        "INFO") echo -e "💬 $message" ;;
        "DEBUG") echo -e "🐛 $message" ;;
        "SUCCESS") echo -e "✅ $message" ;;
        "ERROR") echo -e "❌ $message" ;;
        *) echo -e "$message" ;;
    esac
}

# Fonction principale
function main() {

    # Utiliser le fichier d'entrée spécifié ou le fichier par défaut
    if [[ -n $input_file ]]; then
        json_file="$input_file"
    else
        json_file="$default_json_file"
    fi

    check_input_file

    # Créer une copie du fichier original
    cp "$json_file" "updated_$json_file"
    if [[ $debug = true ]]; then
        log_message "DEBUG" "File copied $json_file in updated_$json_file"
    fi

    # Parcourir chaque entrée dans le fichier JSON
    jq -c '.[]' "$json_file" | while read -r entry; do
        # Extraire le nom, bundleId et id de chaque entrée
        local name=$(echo "$entry" | jq -r '.name?')
        local bundle_id=$(echo "$entry" | jq -r '.bundleId?')
        local app_id=$(echo "$entry" | jq -r '.id?')

        log_message "INFO" "❓ Processing: $name"
        if [[ $debug = true ]]; then
            log_message "DEBUG" "bundle_id=$bundle_id and app_id=$app_id"
        fi
        local updated=false

        if [[ $playstore = true ]]; then
            # Si bundleId est présent, appeler la commande Play Store
            if [[ -n "$bundle_id" && "$bundle_id" != "null" ]]; then
                log_message "INFO" "Fetching Play Store info for $bundle_id"
                local current_version=$(echo "$entry" | jq -r '.playstoreVersion?')
                local result=$($command_playstore "$option" "$bundle_id" 2>/dev/null)

                if [[ $? -ne 0 ]]; then
                    log_message "ERROR" "Failed to fetch Play Store info for $bundle_id"
                    continue
                elif ! echo "$result" | jq . > /dev/null 2>&1; then
                    log_message "ERROR" "Invalid JSON received from Play Store for $app_id"
                    continue
                fi

                # Extraire les informations du résultat
                local version=$(echo "$result" | jq -r '.version')
                local release_note=$(echo "$result" | jq -r '.releaseNote')
                local release_date=$(echo "$result" | jq -r '.releaseDate')

                # Comparer la version actuelle avec la nouvelle
                if compare_versions "$current_version" "$version"; then
                    log_message "SUCCESS" "Updating Play Store info for $bundle_id: $current_version -> $version"
                    updated=true

                    # Mettre à jour le fichier JSON avec les nouvelles informations
                    jq --arg bundleId "$bundle_id" --arg version "$version" \
                       --arg releaseNote "$release_note" --arg releaseDate "$release_date" \
                       '(.[] | select(.bundleId==$bundleId) | .playstoreVersion) = $version |
                        (.[] | select(.bundleId==$bundleId) | .playstoreReleaseNote) = $releaseNote |
                        (.[] | select(.bundleId==$bundleId) | .playstoreReleaseDate) = $releaseDate' "updated_$json_file" > temp.json && mv temp.json "updated_$json_file"
                else
                    # Afficher seulement les mises à jour si l'option est active
                    if [[ $show_all = false && $updated = false ]]; then
                        log_message "INFO" "No update needed for Play Store: $bundle_id"
                    fi
                fi
            fi
        fi

        if [[ $appstore = true ]]; then
            # Si id est présent, appeler la commande App Store
            if [[ -n "$app_id" && "$app_id" != "null" ]]; then
                log_message "INFO" "Fetching App Store info for $app_id"
                local current_version=$(echo "$entry" | jq -r '.appstoreVersion?')
                local result=$($command_appstore "$option" "$app_id" 2>/dev/null)

                if [[ $? -ne 0 ]]; then
                    log_message "ERROR" "Failed to fetch App Store info for $app_id"
                    continue
                elif ! echo "$result" | jq . > /dev/null 2>&1; then
                    log_message "ERROR" "Invalid JSON received from App Store for $app_id"
                    continue
                fi

                # Extraire les informations du résultat
                local version=$(echo "$result" | jq -r '.version')
                local release_note=$(echo "$result" | jq -r '.releaseNote')
                local release_date=$(echo "$result" | jq -r '.releaseDate')

                # Comparer la version actuelle avec la nouvelle
                if compare_versions "$current_version" "$version"; then
                    log_message "SUCCESS" "Updating App Store info for $app_id: $current_version -> $version"
                    updated=true

                    # Mettre à jour le fichier JSON avec les nouvelles informations
                    jq --arg id "$app_id" --arg version "$version" \
                       --arg releaseNote "$release_note" --arg releaseDate "$release_date" \
                       '(.[] | select(.id==$id) | .appstoreVersion) = $version |
                        (.[] | select(.id==$id) | .appstoreReleaseNote) = $releaseNote |
                        (.[] | select(.id==$id) | .appstoreReleaseDate) = $releaseDate' "updated_$json_file" > temp.json && mv temp.json "updated_$json_file"
                else
                    # Afficher seulement les mises à jour si l'option est active
                    if [[ $show_all = false && $updated = false ]]; then
                        log_message "INFO" "No update needed for App Store: $app_id"
                        continue
                    fi
                fi
            fi
        fi
    done

    log_message "SUCCESS" "Brands list updated in updated_$json_file."
    mv "updated_$json_file" "$json_file"
}

function parse_cli {
    # Transforme options longues en courtes
    for arg in "$@"; do
        shift
        case "$arg" in
            "--appstore")  set -- "$@" "-a" ;;
            "--debug")     set -- "$@" "-d" ;;
            "--help")      set -- "$@" "-h" ;;
            "--playstore") set -- "$@" "-p" ;;
            "--quiet")     set -- "$@" "-q" ;;
            "--show")      set -- "$@" "-s" ;;
            "--version")   set -- "$@" "-v" ;;
            "--input")     set -- "$@" "-i" ;;
            *)             set -- "$@" "$arg"
        esac
    done
    # Analyse des arguments de la ligne de commande
    while getopts "adp:hvi:sq" opt; do
        case $opt in
            a) appstore=true; playstore=false ;;
            d) debug=true ;;
            h) display_help ; exit 1 ;;
            p) playstore=true; appstore=false ;;
            q) quiet=true ;;
            s) show_all=false ;;
            v) display_version ; exit 0 ;;
            i) input_file="$OPTARG" ;;
            *) echo "Invalid option: -$OPTARG" >&2; exit 1 ;;
        esac
    done
}

parse_cli "$@"
main
