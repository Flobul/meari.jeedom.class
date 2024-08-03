#!/bin/bash

#already known brands
array="1 8 36 39 51 55 62 65 67 75 77 80 81 82 84 86 92 93 96 97 98 100 102 104 107 108 109 112 114 115 119 122 124 127 129 131 135"

# Fonction pour vérifier si un nombre est dans la liste des exclus
is_excluded() {
  local num="$1"
  echo "$array" | grep -w -q "$num"
}

# Fonction pour traiter une URL
process_url() {
  local url="$1"
  local label="$2"
  local num="$3"
  local grep_pattern="$4"

  local result=$(curl -s -o /dev/null -w "%{http_code}" "$url")

  if (( "$result" == "200" )); then
    if ! is_excluded "$num"; then
      echo "FOUND $label ===> $num: code $result"
      curl "$url" | grep "$grep_pattern"
    fi
  fi
}

# Boucle principale
for ((i=1; i<200; i++)); do
  process_url "https://apis-eu-frankfurt.cloudedge360.com/img/$i/en/Google_Assistant.html" "GOOGLE ASSISTANT" "$i" "item-title"
  process_url "https://static-eus.s3.eu-central-1.amazonaws.com/common/app/userAgreement/$i/en/Agreement_en.html" "AGREEMENT" "$i" "Service Agreement of"
  process_url "https://static-eus.s3.eu-central-1.amazonaws.com/common/app/privacyAgreement/$i/en/Privacy.html" "PRIVACY" "$i" "Service Agreement of"
done
