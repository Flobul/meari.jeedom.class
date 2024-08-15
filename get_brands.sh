#!/bin/bash

#already known brands
array="1 8 36 39 51 55 62 65 67 75 77 80 81 82 84 86 92 93 96 97 98 100 102 104 107 108 109 112 114 115 119 122 124 127 129 131 135"

# Fonction pour vérifier si un nombre est dans la liste des exclus
is_excluded() {
  local num="$1"
  echo "$array" | grep -w -q "$num"
}

# Initialisation de la variable JSON
json_result="{"

# Fonction pour traiter une URL
process_url() {
  local url="$1"
  local label="$2"
  local num="$3"
  local grep_pattern="$4"

  local result=$(curl -s -o /dev/null -w "%{http_code}" "$url")

  # Debug: Affiche le code HTTP
  echo "HTTP code for $url: $result"

  if (( "$result" == "200" )); then
    if ! is_excluded "$num"; then
      # Debug: Vérifie le contenu de la page
      if curl -s "$url" | grep -q "$grep_pattern"; then
        echo "$label found in $url"
        if echo "$json_result" | grep -q "\"$num\""; then
          json_result=$(echo "$json_result" | sed "s/\"$num\":{/\"$num\":{ \"$label\"/")
        else
          if [[ "$json_result" != "{" ]]; then
            json_result+=", "
          fi
          json_result+="\"$num\": \"$label\""
        fi
      else
        echo "Pattern '$grep_pattern' not found in $url"
      fi
    fi
  fi
}

# Boucle principale
#for ((i=1; i<200; i++)); do
for i in {1..200}; do
  process_url "https://apis-eu-frankfurt.cloudedge360.com/img/$i/en/Google_Assistant.html" "GOOGLE ASSISTANT" "$i" "item-title"
  process_url "https://static-eus.s3.eu-central-1.amazonaws.com/common/app/userAgreement/$i/en/Agreement_en.html" "AGREEMENT" "$i" "Service Agreement of"
  process_url "https://static-eus.s3.eu-central-1.amazonaws.com/common/app/privacyAgreement/$i/en/Privacy.html" "PRIVACY" "$i" "Privacy"
done

# Fermeture du JSON
json_result+="}"

# Affichage du JSON
echo "$json_result"
echo "${json_result}" > src/brands.json
