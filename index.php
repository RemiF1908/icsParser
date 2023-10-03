<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de sélection</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            box-sizing: border-box;
        }
        h2 {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        select, input {
            padding: 10px;
            margin-bottom: 15px;
        }
        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        img{
            display: flex;
            margin: auto;
            width:20%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Formulaire de sélection</h2>
        <form action="./post" method="post">
            
            <label for="prenom">Prénom :</label>
            <input name="prenom" required >
            <label for="nom">Nom :</label>
            <input name="nom" required >

            <label for="majeur1">Majeur 1 :</label>
            <select name="majeur1" id="majeur1" required >
                <option value="Info">Info</option>
                <option value="Phy G1.1">Phy G1.1</option>
                <option value="Phy G1.2">Phy G1.2</option>
                <option value="Phy G2.1">Phy G2.2</option>
                <option value="Phy G2.2">Phy G2.2</option>
                <option value="Phy G3.1">Phy G3.1</option>
                <option value="Phy G3.2">Phy G3.2</option>
            </select>

            <label for="majeur2">Majeur 2 :</label>
            <select name="majeur2" id="majeur2" required >
                <option value="Chimie">Chimie</option>
                <option value="Maths G1">Maths G1</option>
                <option value="Maths G2">Maths G2</option>
                <option value="SI G1">SI G1</option>
                <option value="SI G1">SI G2</option>
            </select>

            <label for="mineur1">Mineur 1 :</label>
            <select name="mineur1" id="mineur1" required >
                <option value="Chimie G1">Chimie G1</option>
                <option value="Chimie G2">Chimie G2</option>
                <option value="Chimie G3">Chimie G3</option>
                <option value="Info G1">Info G1</option>
                <option value="Info G2">Info G2</option>
                <option value="Physique">Physique</option>
            </select>

            <label for="mineur2">Mineur 2 :</label>
            <select required name="mineur2" id="mineur2" required >
                <option value="Maths">Maths</option>
                <option value="SI G1.1">SI G1.1</option>
                <option value="SI G1.2">SI G1.2</option>
                <option value="SI G2.1">SI G2.1</option>
                <option value="SI G2.2">SI G2.2</option>
            </select>

            <label for="lv1">LV1 :</label>
            <select name="lv1" id="lv1" required >
                <option value="ANG G1">Ang G1</option>
                <option value="ANG G2">Ang G2</option>
                <option value="ANG G3">Ang G3</option>
                <option value="ANG G4">Ang G4</option>
                <option value="ANG G5">Ang G5</option>
                <option value="ANG G6">Ang G6</option>
            </select>

            <label for="lv2">LV2 :</label>
            <select name="lv2" id="lv2">
                <option value="ALL G1">All G1</option>
                <option value="ALL G2">All G2</option>
                <option value="ESP G1">Esp G1</option>
                <option value="ESP G2">Esp G2</option>
                <option value="ESP G3">Esp G3</option>
                <option value="ITA">Ita</option>
            </select>

            <label for="lv2">Groupe :</label>
            <select name="groupe" id="groupe" required >
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>

            <button type="submit">Envoyer</button>
        </form>
    </div>
    <img src="https://cdn.discordapp.com/attachments/989459228534116362/1040592890633654292/logo_corn_copi_copie.png">
</body>
</html>
