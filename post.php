<style>
h1{
    font-size:40px;
    font-family:Arial;
    text-align:center;
}
h1{
    font-size:20px;
    font-family:Arial;
    text-align:center;
}

</style>
<h1>
<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les valeurs des champs du formulaire
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $majeur1 = $_POST["majeur1"];
    $majeur2 = $_POST["majeur2"];
    $mineur1 = $_POST["mineur1"];
    $mineur2 = $_POST["mineur2"];
    $lv1 = $_POST["lv1"];
    $lv2 = $_POST["lv2"];
    $groupe = $_POST["groupe"];

    // Crée un tableau associatif avec les données
    $id =uniqid();
    $userData = [
        "prenom" => $prenom,
        "nom" => $nom,

        "Majeur1" => $majeur1,
        "Majeur2" => $majeur2,
        "Mineur1" => $mineur1,
        "Mineur2" => $mineur2,
        "LV1" => $lv1,
        "LV2" => $lv2,
        "groupe" => $groupe,
        "id" => $id
    ];

    // Charge les données existantes depuis le fichier JSON
    $existingData = json_decode(file_get_contents("userData.json"), true);

    // Ajoute les nouvelles données au tableau existant
    $existingData[] = $userData;

    // Encode le tableau mis à jour en JSON avec indentation
    $jsonData = json_encode($existingData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

    // Enregistre les données JSON mises à jour dans le fichier
    file_put_contents("userData.json", $jsonData);
    shell_exec('bash dlEDT.sh');
    // Affiche un message de confirmation
    echo "Voici le lien : <a>http://gga.alwaysdata.net/edt/edts/edt_".$id.".ics</a>";
} else {
    // Le formulaire n'a pas été soumis, affiche un message d'erreur
    echo "Le formulaire n'a pas été soumis.";
}
?>

</h1>
<br>
<p>
Comment synchroniser son calendrier avec son emploi du temps sur Android (sorry les Iphones)<br>
1.a Pour obtenir ICSx5 gratuitement (c'est légal et officiel) : Télécharger ICSx5  (il faudra alors activer les sources d'applications externes lors de l'installation) : https://f-droid.org/fr/packages/at.bitfire.icsdroid/<br>
1.b Sur l'application F-Droid, télécharger et installer l'application ICSx5.<br>


2.a Lancez l'application ICSx5 puis cliquez sur le + en bas à droite, rentrez l'URL fournie précédemmen. Votre agenda Android est alors synchronisé avec votre emploi du temps ! Vous pouvez changer l'intervalle de synchro dans les paramètres de ICSx5 (Maximum toutes les 4 heures, inutile au-delà :-)  <br>
2.b Il vous suffit alors d'afficher votre emploi du temps à l'aide d'une application de calendrier qui gère votre calendrier Android global (sur lequel est synchro l'edt), votre app de calendrier par défaut devrait le faire <br>


</p>