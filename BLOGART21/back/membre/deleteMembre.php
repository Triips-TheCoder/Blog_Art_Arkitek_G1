<?php
require_once __DIR__ . '/../../util/utilErrOn.php';

    include __DIR__ . '/initMembre.php';
    $deleted = false;
    if(!isset($_GET['id'])) $_GET['id'] = '';
    $numLang = '';
    $lib1Lang = '';
    require_once __DIR__ . '/../../CLASS_CRUD/membre.class.php';
    $class = new MEMBRE;
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        if($_POST["Submit"] === "Annuler"){
            header("Location: ./membre.php");
            die();
        }

        $numMemb = $_POST["id"];

        $resultMembre = $class->get_1Membre($numMemb);
        
        $class->delete($numMemb);
        $deleted = true;

    }else{
        $numMemb = $_GET["id"];
        $resultMembre = $class->get_1Membre($numMemb);
    }

    if($resultMembre){
        $prenomMemb = $resultMembre['prenomMemb'];
        $nomMemb = $resultMembre['nomMemb'];
        $pseudoMemb = $resultMembre['pseudoMemb'];
        $passMemb = $resultMembre['passMemb'];
        $eMailMemb = $resultMembre['eMailMemb'];
        $souvenirMemb = $resultMembre['souvenirMemb'];
        $accordMemb = $resultMembre['accordMemb'];
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Membre</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style disabled type="text/css">
    body {
        padding: 40px;
    }
        #p1 {
            max-width: 600px;
            width: 600px;
            max-height: 200px;
            height: 200px;
            border: 1px solid #000000;
            background-color: whitesmoke;
            /* Coins arrondis et couleur du cadre */
            border: 2px solid grey;
            -moz-border-radius: 8px;
            -webkit-border-radius: 8px;
            border-radius: 8px;
        }
        .error {
            padding: 2px;
            border: solid 0px black;
            color: red;
            font-style: italic;
            border-radius: 5px;
        }
    </style>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Membre</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="../css/style.css" rel="stylesheet" disabled type="text/css" /> 
</head>

<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Membre</h1>

    <form method="post" action=".\deleteMembre.php">
    <fieldset>
    <legend class="legend1">Suppression du membre <?echo($pseudoMemb)?>...</legend>
        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />
        <input type="hidden" id="date" name="date" value="<?= $_GET['id']; ?>" />
        <label>Prénom du membre</label>
        <br>
        <input disabled type="text" name="prenomMemb" placeholder="Prénom" value="<? echo($prenomMemb); ?>" readonly>
        <br>
        <br>
        <label>Nom du membre</label>
        <br>
        <input disabled type="text" name="nomMemb" placeholder="Nom" value=<? echo($nomMemb); ?> readonly>
        <br>
        <br>
        <label>Pseudo du membre</label>
        <br>
        <input disabled type="text" name="pseudoMemb" placeholder="Pseudo" value=<? echo($pseudoMemb); ?> readonly>
        <br>
        <br>
        <label>Mot de passe du membre</label>
        <br>
        <input disabled type="password" name="passMemb" placeholder="Mot de passe" value=<? echo($passMemb); ?> readonly>
        <br>
        <br>
        <label>Email du membre</label>
        <br>
        <input disabled type="text" name="eMailMemb" placeholder="Email" value=<? echo($eMailMemb); ?> readonly>
        <br>
        <br>
        <input disabled type="checkbox" tabindex="0" name="souvenirMemb" <? if($souvenirMemb == 1){ echo('checked'); } ?> readonly>
        <label>Se souvenir de moi</label>
        <br>
        <br>
        <input disabled type="checkbox" tabindex="0" name="accordMemb" <? if($accordMemb == 1){ echo('checked'); } ?> readonly>
        <label>J'accepte les conditions d'utilisation</label>
        <br>
        <br>
        <input class='btn btn-primary' type="submit" name="Submit" value="Annuler">
        <input class='btn btn-success' type="submit" name="Submit" value="Valider">
        <br>
        <br>
    <fieldset>
    </form>

<?php

if($deleted) {
    echo '<p style="color:green;">Le membre ' . $pseudoMemb . ' #' . $numMemb . ' a été supprimé.</p>';
}

require_once __DIR__ . '/footerMembre.php';

require_once __DIR__ . '/footer.php';
?>

</body>
</html>