import json
from EDTParser import edtParse
from EDTParserS4 import edtParseS4
semester = "S4"
if semester == "S3":
    with open("userDataS3.json", "r") as read_file:
        data = json.load(read_file)
    for value in data:
        edtParse(value["LV1"], value["LV2"], value["Majeur1"], value["Majeur2"], value["Mineur1"], value["Mineur2"], value["groupe"], value["id"] )

if semester == "S4":
    with open("userDataS4.json", "r") as read_file:
        data = json.load(read_file)

    for value in data:
        if not "groupe1A" in value.keys():
            grp1A = None
        else:
            grp1A = value["groupe1A"]
        edtParseS4(value["LV1"], value["LV2"], value["Theme1"], value["Theme2"], value["Theme3"], value["Theme4"], value["groupe"], value["sgroupe"],value["cursus"], grp1A, value["id"])
