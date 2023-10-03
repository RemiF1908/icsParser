import json
import os


'''
Ce programme permet de supprimer le fichier ics des utilisateurs qui ne sont plus dans la BDD
'''
liste = os.listdir('./edts')
with open("userData.json", "r") as read_file:
    data = json.load(read_file)     

id=[]
for value in data:
    print(value["id"])
    id.append(value["id"])
for e in liste :
    print(e[4:-4]) 
    if e[4:-4] not in id:
        os.remove("./edts/"+e)
print(liste)

