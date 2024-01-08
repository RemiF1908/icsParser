# -*- coding: utf-8 -*-
from icalendar import Calendar, Event
import json
import requests
from requests.auth import HTTPBasicAuth

'''
Ce programme permet de detecter les cours présent dans l'EDT qui ne sont pas encore répertorier dans cours.json
'''
semestre = "S4"


url = "https://edt.grenoble-inp.fr/directCal/2023-2024/etudiant/prepaINPGrenoble?resources=1471,1468,1472,1469"
utilisateur =
mot_de_passe =

# Utiliser l'authentification de base
auth = HTTPBasicAuth(utilisateur, mot_de_passe)

# Effectuer la requête GET pour télécharger le fichier
response = requests.get(url, auth=auth)

# Vérifier si la requête a réussi (code 200)
if response.status_code == 200:
    # Enregistrer le contenu du fichier
    g = response.content
    print("Téléchargement réussi.")
else:
    print(f"Échec du téléchargement. Code d'état : {response.status_code}")

cal = Calendar()
cal.add('version', '2.0')
gcal = Calendar.from_ical(g)



coursBDD=[]
with open("cours"+semestre+".json", "r") as read_file:
    data = json.load(read_file)     

for key, value in data.items():
        for e in value : 
           coursBDD.append(e)


coursEDT=[]
for component in gcal.walk():
    if component.name == "VEVENT": 
        if "tc" not in component.get("summary").lower() and component.get("summary") not in ['ANG G5', 'ESP G3', 'ALL G2', 'ESP G1', 'ANG G1', 'ANG G3', 'ANG G4', 'ITA', 'ESP G2', 'ANG G2', 'ANG G6', 'ALL G1']:
            coursEDT.append(str(component.get("summary")))

coursEDT = set(coursEDT)
coursBDD = set(coursBDD)
coursAdd=[]
for e in coursEDT:
    if e not in coursBDD:
        print(e)
        coursAdd.append(e)



print(coursAdd)






