# -*- coding: utf-8 -*-
from icalendar import Calendar, Event
import json

from pathlib import Path

'''
Ce programme permet d'analyer un fichier d'EDT et d'extraire les cours qui ne sont pas encore dans la base de donnée
'''

def edtParseS4(lv1, lv2, th1, th2, th3, th4, groupe, sgroupe, cursus, id):
    edtADE = open('ADECal_'+groupe+'.ics','rb')

    cal = Calendar()
    cal.add('version', '2.0')
    edtADECal = Calendar.from_ical(edtADE.read())


    cours=["ANG G1", "ANG G2", "ANG G3", "ANG G4", "ANG G5", "ANG G6", "ALL G1", "ALL G2","ESP G1", "ESP G2", "ESP G3", "ITA"]
    projet = ["Projet - G1", "Projet - G2", "Projet - G3", "Projet - G4", "Projet - G5", "Projet - G6", "Projet - G7", "Projet - G8" ]
    cours+=projet
    print("Projet - "+sgroupe)
    cours.remove("Projet - G"+sgroupe)
    cours.remove(lv1)
    cours.remove(lv2)


    with open("coursS4.json", "r") as read_file:
        data = json.load(read_file)     
    cours2=[]
    for key, value in data.items():
        if key in [th1, th2, th3, th4]:
            for e in value:
                cours2.append(e)
    print(cours2)
    for group, nameCourses in data.items():
        if group not in [th1, th2, th3, th4]:
            for courses in nameCourses : 
                if courses not in cours2:
                    print(courses)
                    cours.append(courses)
    print(cours)
    edtADE.close()
    print(cursus)
    if cursus == "HN3":
        cours+=["Maths S4", "Optique ondulatoire", "TC S4 Info", "TH3"]

    for component in edtADECal.walk():
        if component.name == "VEVENT": 
            if component.get('summary') not in cours:
                    #------Type de cours------
                desc = component.get('description')[10:].lower()
                if "ctd" in desc:
                    summary=component.get('summary')
                    component["SUMMARY"] = summary + " CTD"
                elif "td" in desc:
                    summary=component.get('summary')
                    component["SUMMARY"] = summary + " TD"
                elif "ds" in desc:
                    summary=component.get('summary')
                    component["SUMMARY"] = summary + " DS"
                if "cm" in desc:
                    summary=component.get('summary')
                    component["SUMMARY"] += " CM"

                cal.add_component(component)


    f = open('edts/edt_'+id+'.ics', 'wb')
    f.write(cal.to_ical())
    f.close()










