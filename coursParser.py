# -*- coding: utf-8 -*-
from icalendar import Calendar, Event
import json

'''
Ce programme permet de detecter les cours présent dans l'EDT qui ne sont pas encore répertorier dans cours.json
'''

g = open('ADECal.ics','rb')

cal = Calendar()
cal.add('version', '2.0')
gcal = Calendar.from_ical(g.read())



coursBDD=[]
with open("cours.json", "r") as read_file:
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


print(coursEDT)
print(coursBDD)
print(coursAdd)


g.close()




