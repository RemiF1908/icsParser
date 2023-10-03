import json
from EDTParser import edtParse
with open("userData.json", "r") as read_file:
    data = json.load(read_file)     


for value in data:
    print(value)
    edtParse(value["LV1"], value["LV2"], value["Majeur1"], value["Majeur2"], value["Mineur1"], value["Mineur2"], value["groupe"], value["id"] )

