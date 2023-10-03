# -*- coding: utf-8 -*-
from icalendar import Calendar, Event
import json

from pathlib import Path

'''
Ce programme permet d'analyer un fichier d'EDT et d'extraire les cours qui ne sont pas encore dans la base de donnée
'''

def edtParse(lv1, lv2, maj1, maj2, min1, min2, groupe, id):
    g = open('ADECal_'+groupe+'.ics','rb')

    cal = Calendar()
    cal.add('version', '2.0')
    gcal = Calendar.from_ical(g.read())


    cours=["ANG G1", "ANG G2", "ANG G3", "ANG G4", "ANG G5", "ANG G6", "ALL G1", "ALL G2","ESP G1", "ESP G2", "ESP G3", "ITA"]
    cours.remove(lv1)
    cours.remove(lv2)


    with open("cours.json", "r") as read_file:
        data = json.load(read_file)     
    cours2=[]
    for key, value in data.items():
        if key in [maj1, maj2, min1, min2]:
            for e in value:
                cours2.append(e)
    print(cours2)
    for key, value in data.items():
        if key not in [maj1, maj2, min1, min2]:
            for e in value : 
                if e not in cours2:             
                    cours.append(e)
    print(cours)
    g.close()


    for component in gcal.walk():
        if component.name == "VEVENT": 
            if component.get('summary') not in cours:
                    #------Type de cours------
                desc = component.get('description')[10:].lower()
                if "ctd" in desc:
                    a=component.get('summary')
                    component["SUMMARY"] = a + " CTD"
                elif "td" in desc:
                    a=component.get('summary')
                    component["SUMMARY"] = a + " TD"
                elif "ds" in desc:
                    a=component.get('summary')
                    component["SUMMARY"] = a + " DS"
                if "cm" in desc:
                    a=component.get('summary')
                    component["SUMMARY"] += " CM"

                cal.add_component(component)


    f = open('edts/edt_'+id+'.ics', 'wb')
    f.write(cal.to_ical())
    f.close()










