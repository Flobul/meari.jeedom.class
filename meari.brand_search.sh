#!/bin/bash

#already known brands
array="1 8 36 39 51 55 62 65 67 75 77 80 81 82 84 86 92 93 96 97 98 100 102 104 107 108 109 112 114 115 119 122 124 129 131 135"

for ((i=1 ;i<200 ; i++))
do
  resultA=$(curl -s -o /dev/null -w "%{http_code}"  "https://apis-eu-frankfurt.cloudedge360.com/img/$i/en/Google_Assistant.html" | xargs)
  if (( "$resultA" == "200")); then
    if ! echo "$array" | grep -w -q "$i"; then
      echo "FOUND GOOGLE ASSISTANT ===> $i: code $resultA"
      curl "https://static-eus.s3.eu-central-1.amazonaws.com/common/app/userAgreement/$i/en/Agreement_en.html" | grep "item-title"
    fi
  fi

  resultB=$(curl -s -o /dev/null -w "%{http_code}"  "https://static-eus.s3.eu-central-1.amazonaws.com/common/app/userAgreement/$i/en/Agreement_en.html" | xargs)
  if (( "$resultB" == "200")); then
    if ! echo "$array" | grep -w -q "$i"; then
      echo "FOUND AGREEMENT ===> $i: code $resultB"
      curl "https://static-eus.s3.eu-central-1.amazonaws.com/common/app/userAgreement/$i/en/Agreement_en.html" | grep "Service Agreement of"
    fi
  fi

  resultC=$(curl -s -o /dev/null -w "%{http_code}"  "https://static-eus.s3.eu-central-1.amazonaws.com/common/app/privacyAgreement/$i/en/Privacy.html" | xargs)
  if (( "$resultC" == "200")); then
    if ! echo "$array" | grep -w -q "$i"; then
      echo "FOUND PRIVACY ===> $i: code $resultC"
      curl "https://static-eus.s3.eu-central-1.amazonaws.com/common/app/privacyAgreement/$i/en/Privacy.html" | grep "Service Agreement of"
    fi
  fi
done
