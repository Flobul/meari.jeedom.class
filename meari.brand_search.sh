#!/bin/bash

# already known brands
array="8 39 51 55 62 65 67 75 77 80 81 82 84 92 96 97 98 100 104 107 114 119"

for ((i=1 ;i<200 ; i++))
do
  # should work with https://static-eus.s3.eu-central-1.amazonaws.com/common/app/userAgreement/$i/en/Agreement_en.html
  result=$(curl -s -o /dev/null -w "%{http_code}"  "https://apis-eu-frankfurt.cloudedge360.com/img/$i/en/Google_Assistant.html" | xargs)
  if (( "$result" == "200")); then
    if [ $(echo "$array" | grep "$i" | wc -l) -eq 0 ] ; then
      echo "$i"
    fi
  fi
done
