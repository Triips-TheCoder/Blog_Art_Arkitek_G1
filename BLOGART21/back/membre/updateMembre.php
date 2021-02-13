<?php


     require_once __DIR__ . '/../../util/utilErrOn.php';
     include __DIR__ . '/initMembre.php';
     require_once __DIR__ . '/../../CLASS_CRUD/membre.class.php';
     $updated = null;
     if(!isset($_GET['id'])) $_GET['id'] = '';
     if(!isset($_GET['date'])) $_GET['date'] = '';
     $monMembre = new MEMBRE;
 
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $numMemb = $_POST["id"];
        $dtCreaMemb = $_POST["date"];

        if(isset($_POST['prenomMemb']) && isset($_POST['nomMemb']) 
        && isset($_POST['pseudoMemb']) && isset($_POST['passMemb']) 
        && isset($_POST['eMailMemb'])){
            if(isset($_POST['souvenirMemb'])){
                $souvenirMemb = 1;
            }else{
                $souvenirMemb = 0;
            }
            if(isset($_POST['accordMemb'])){
                $accordMemb = 1;
            }else{
                $accordMemb = 0;
            }

            $monMembre->update($numMemb, $_POST['prenomMemb'], $_POST['nomMemb'], $_POST['pseudoMemb'], $_POST['passMemb'], $_POST['eMailMemb'], $souvenirMemb, $accordMemb);
            $updated = true;
        }

    }else{
        $numMemb = $_GET["id"];
        $dtCreaMemb = $_GET['date'];
    }

    $resultMembre = $monMembre->get_1Membre($numMemb);
    
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
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Membre</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD Membre</h1>
    <h2>Modification d'un Membre</h2>

    <form method="post" action=".\updateMembre.php" enctype="multipart/form-data">
    <fieldset>
        <legend class="legend1">Modification du membre <?echo($pseudoMemb)?>...</legend>
        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />
        <input type="hidden" id="date" name="date" value="<?= $_GET['date']; ?>" />
        <label>Prénom du membre:</label>
        <br>
        <input type="text" name="prenomMemb" placeholder="Prénom" value=<? echo($prenomMemb); ?>>
        <br>
        <br>
        <label>Nom du membre:</label>
        <br>
        <input type="text" name="nomMemb" placeholder="Nom" value=<? echo($nomMemb); ?>>
        <br>
        <br>
        <label>Pseudo du membre:</label>
        <br>
        <input type="text" name="pseudoMemb" placeholder="Pseudo" value=<? echo($pseudoMemb); ?>>
        <br>
        <br>
        <label>Modification de mot de passe:</label>
        <br>
        <input type="password" name="passMemb" placeholder="Mot de passe" value=<? echo($passMemb); ?>>
        <br>
        <br>
        <label>Confirmation du mot de passe:</label>
        <br>
        <input type="password" name="passMemb" placeholder="Mot de passe" value=<? echo($passMemb); ?>>
        <br>
        <br>
        <label>Email du membre:</label>
        <br>
        <input type="text" name="eMailMemb" placeholder="Email" value=<? echo($eMailMemb); ?>>
        <br>
        <br>
        <input type="checkbox" tabindex="0" name="souvenirMemb" <? if($souvenirMemb == 1){ echo('checked'); } ?>>
        <label>Se souvenir de moi</label>
        <br>
        <br>
        <input type="checkbox" tabindex="0" name="accordMemb" <? if($accordMemb == 1){ echo('checked'); } ?>>
        <label>J'accepte les conditions d'utilisation</label>
        <br>
        <br>
        <button type="submit">Valider</button>
    </fieldset>
    </form>
<?php

if($updated) {
    echo '<p style="color:green;">Le membre ' . $pseudoMemb . ' #' . $numMemb . ' a été bien modifié.</p>';
}

require_once __DIR__ . '/footerMembre.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>