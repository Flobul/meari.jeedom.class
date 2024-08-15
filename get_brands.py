import os
import re
import requests
import json

file_path = "src/new_brands.json"

# Liste des numéros exclus
#excluded_numbers = set([1, 8, 36, 39, 51, 55, 62, 65, 67, 75, 77, 80, 81, 82, 84, 86, 92, 93, 96, 97, 98, 100, 102, 104, 107, 108, 109, 112, 114, 115, 119, 122, 124, 127, 129, 131, 135])
excluded_numbers = set([])

# Initialisation de la variable JSON
json_result = {}

# Fonction pour vérifier si un nombre est dans la liste des exclus
def is_excluded(num):
    return num in excluded_numbers

# Fonction pour extraire le nom de la marque selon le label
def get_brand_name(snippet, label):
    patterns = {
        'AGREEMENT': r'(Service\s+Agreement\s+of\s+([\s\S]*?)\s+Platform|Service\sAgreement\sof\s*(.*?)\s*Platform)',
        'PRIVACY': r'\"Section0\"([\s\S]*?)Application\sPrivacy\sPolicy',
        'GOOGLE ASSISTANT': r'(applicazione\s(.*?),|Enter\s(the|your)\s(.*?)\sapp\saccount\sand\spassword)'
    }

    match = re.search(patterns.get(label, ''), snippet)
    if not match and label == 'PRIVACY':
        match = re.search(patterns['AGREEMENT'], snippet)

    if match:
        name = match.group(1)
        return re.sub(r'&nbsp;', ' ', name).strip()

    return None

# Fonction pour traiter une URL
def process_url(url, label, num):
    try:
        response = requests.get(url)
        response.raise_for_status()  # Vérifie si la requête a réussi

        if not is_excluded(num):
            if num not in json_result:
                json_result[num] = {}
            json_result[num][label] = get_brand_name(response.text, label) or url

    except requests.RequestException as e:
        pass

# Boucle principale
for i in range(100, 136):
    urls_labels = [
        (f"https://apis-eu-frankfurt.cloudedge360.com/img/{i}/en/Google_Assistant.html", "GOOGLE ASSISTANT"),
        (f"https://static-eus.s3.eu-central-1.amazonaws.com/common/app/userAgreement/{i}/en/Agreement_en.html", "AGREEMENT"),
        (f"https://static-eus.s3.eu-central-1.amazonaws.com/common/app/privacyAgreement/{i}/en/Privacy.html", "PRIVACY")
    ]

    for url, label in urls_labels:
        process_url(url, label, i)

# Sérialisation en JSON avec indentation pour une meilleure lisibilité
json_str = json.dumps(json_result, indent=4)

# Affichage du JSON
print(json_str)

# Vérification de l'existence du répertoire et création s'il n'existe pas
dir_name = os.path.dirname(file_path)
if not os.path.exists(dir_name):
    os.makedirs(dir_name)

# Écriture dans le fichier
with open(file_path, "w") as f:
    f.write(json_str)
