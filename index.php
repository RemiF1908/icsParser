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

            <label for="th1">Thème 1 :</label>
            <select name="th1" id="th1" required >
                <option value="MF">Maths Fondamentales</option>
                <option value="PC">Physique contemporaine</option>
                <option value="GP">Génie des procédés</option>

            </select>
            <label for="th2">Thème 2 :</label>
            <select name="th2" id="th2" required >
                <option value="EL">Electronique</option>
                <option value="MMC">Mécanique des milieux continues</option>
                <option value="GI">Génie industriel</option>

            </select>

            <label for="th3">Thème 3 :</label>
            <select name="th3" id="th3" required >
                <option value="MA">Maths appliquées</option>
                <option value="TM">Technologie mécanique</option>
                <option value="GE">Génie électrique</option>
            </select>

            <label for="th4">Thème 4 :</label>
            <select name="th4" id="th4" required >
                <option value="INFO">Informatique</option>
                <option value="MAT">Matériaux</option>
                <option value="OM">Ondes et matières</option>
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

            <label for="cursus">Cursus :</label>
            <select name="cursus" id="cursus" required >
                <option value="main">Classique</option>
                <option value="HN2">HN2</option>
                <option value="HN3">HN3</option>
            </select>

            <label for="mountain">Massif :</label>
            <select name="mountain" id="mountain" required >
                <option value="bel">Belledonne</option>
                <option value="char">Chartreuse</option>
                <option value="ver">Vercors</option>
            </select>

            <button type="submit" onclick="displayErrorMessage()">Envoyer</button>
        </form>
        <p id="errorMessage" style="color: red; display: none;">Ce site est réservé au gens de bon goût</p>
    </div>

    <img src="https://cdn.discordapp.com/attachments/989459228534116362/1040592890633654292/logo_corn_copi_copie.png">

    <script>
        function checkSelectedOption() {
            // Récupérer l'élément select
            var selectField = document.getElementById("mountain");

            // Récupérer l'index de l'option sélectionnée
            var selectedIndex = selectField.selectedIndex;

            // Récupérer la valeur de l'option sélectionnée
            return selectedIndex;
        }

        function displayErrorMessage() {
            // Afficher le message d'erreur
            var errorMessageElement = document.getElementById("errorMessage");
            if (checkSelectedOption() != 0){
                errorMessageElement.style.display = "block";
            }

        }
    </script>

</body>
</html>
