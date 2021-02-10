<?php
///////////////////////////////////////////////////////////////
//
//  CRUD LANGUE (PDO) - Code Modifié - 09 Fevrier 2021
//
//  Script  : createLangue.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe LANGUE
    require_once __DIR__ . '/../../util/ctrlSaisies.php';
    require_once __DIR__ . '/../../CLASS_CRUD/membre.class.php'; 
    global $db;
    $unMembre = new MEMBRE; 


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif du statut
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($Submit === "Initialiser")) {

            header("Location: ./createMembre.php");
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
        if (((isset($_POST['libsMembre'])) AND !empty($_POST['libsMembre']))
            AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))) {
            // Saisies valides

            $libsMembre = ctrlSaisies(($_POST['libsMembre']));
            $unMembre->createMembre($libsMembre);

            header("Location: ./membre.php");
        }   // Fin if ((isset($_POST['libStat'])) ...
    }   // Fin if ($_SERVER["REQUEST_METHOD"] == "POST")
    include __DIR__ . '/initMembre.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Membre</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Membre</h1>
    <h2>Ajout d'un membre</h2>

    <form method="post" action="./createMembre.php" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire Membre...</legend>

        <!--<input type="hidden" id="id" name="id" value=": /*$_GET['id']; */-->
        
        <div class="control-group">
            <label class="control-label" for="createMembre"><b>Nom: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <br>
            <input type="text" name="newMembre" id="libsMembre" size="80" maxlength="80" value="" autofocus="autofocus" />
            <br>
            <br>
            <label class="control-label" for="createMembre"><b>Prénom:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <br>
            <input type="text" name="newMembre" id="libsMembre" size="80" maxlength="80" value="" autofocus="autofocus" />
            <br>
            <br>
            <label class="control-label" for="createMembre"><b>Pseudo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <br>
            <input type="text" name="newMembre" id="libsMembre" size="80" maxlength="80" value="" autofocus="autofocus" />
            <br>
            <br>
            <label class="control-label" for="createMembre"><b>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <br>
            <input type="text" name="newMembre" id="libsMembre" size="80" maxlength="80" value="" autofocus="autofocus" />
            <br>
            <br>
            <label class="control-label" for="createMembre"><b>Mot de passe:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <br>
            <input type="text" name="newMembre" id="libsMembre" size="80" maxlength="80" value="" autofocus="autofocus" />
            <br>
            <br>
            <label class="control-label" for="createMembre"><b>Confirmer mot de passe:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <br>
            <input type="text" name="newMembre" id="libsMembre" size="80" maxlength="80" value="" autofocus="autofocus" />

        </div>
        <div class="control-group">
            <div class="controls">
                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Initialiser" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Valider" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                <br>
            </div>
        </div>

      </fieldset>
    </form>
    <footer>
    <br /><br /><hr />
    <h2>Retour à la gestion des Membres : <a href="./membre.php">CRUD Membre</a></h2>
    </footer>
<?php

require_once __DIR__ . '/footer.php';
?>
</body>
</html>