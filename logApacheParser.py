import json
id=[]
file = open('logTest.txt', "r")
lines = file.readlines()
file.close()
for line in lines:
    txt  =line.strip()
    if "/edt/edts/edt_" in txt:
        txt = txt.split("/edt/edts/edt_")
        txt = txt[1].split(".ics")
        id.append(txt[0])

with open("userData.json", "r") as read_file:
    data = json.load(read_file)     

a=0
for value in data:
    if value["id"] in id:
        #print(value)
        print(value["prenom"], value["nom"])
        #print(value)
        a+=1

print(a)


