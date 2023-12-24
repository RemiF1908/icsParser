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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $th1 = $_POST["th1"];
    $th2 = $_POST["th2"];
    $th3 = $_POST["th3"];
    $th4 = $_POST["th4"];
    $lv1 = $_POST["lv1"];
    $lv2 = $_POST["lv2"];
    $groupe = $_POST["groupe"];
    $sgroupe = $_POST["sgroupe"];
    $cursus = $_POST["cursus"];

    $id =uniqid();
    $userData = [
        "prenom" => $prenom,
        "nom" => $nom,

        "Theme1" => $th1,
        "Theme2" => $th2,
        "Theme3" => $th3,
        "Theme4" => $th4,
        "LV1" => $lv1,
        "LV2" => $lv2,
        "groupe" => $groupe,
        "sgroupe" => $sgroupe,
        "cursus" => $cursus,
        "id" => $id
    ];
    if ($cursus=="HN2"){
        $groupe1A = $_POST["groupe1A"];
        $userData["groupe1A"] = $groupe1A;
    }


    $existingData = json_decode(file_get_contents("userDataS4.json"), true);

    $existingData[] = $userData;

    // Encode le tableau mis à jour en JSON avec indentation
    $jsonData = json_encode($existingData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

    file_put_contents("userDataS4.json", $jsonData);
    shell_exec('bash dlEDT.sh');
    echo "Voici le lien : <a>http://gga.alwaysdata.net/edt/edts/edt_".$id.".ics</a>";
} else {
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