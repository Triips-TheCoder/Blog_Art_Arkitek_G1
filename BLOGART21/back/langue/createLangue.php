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
    require_once __DIR__ . '/../../CLASS_CRUD/getNextNumLang.php';
    require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';
    global $db;
    $maLangue = new LANGUE;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif du statut
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Initialiser")) {

            header("Location: ./createLangue.php");
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
        if (((isset($_POST['lib1Lang'])) AND !empty($_POST['lib1Lang']))
            AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))) {
                if ((isset($_POST['lib2Lang'])) AND !empty($_POST['lib2Lang'])) {
                    if ((isset($_POST['pays'])) AND !empty($_POST['pays'])) {
            
                        // Saisies valides
                        $erreur = false;

                        $lib1Lang = ctrlSaisies(($_POST['lib1Lang']));

                        $lib2Lang = ctrlSaisies(($_POST['lib2Lang']));

                        $numPays = ($_POST['pays']);
                        
                        $numLang = getNextNumLang($numPays);

                        $maLangue->create($numLang, $lib1Lang, $lib2Lang, $numPays);

                        header("Location: ./langue.php");
                    }
                }
        }   // Fin if ((isset($_POST['libStat'])) ...
        else {
            $erreur = true;
            $errSaisies =  "Erreur, la saisie est obligatoire !";
        }   // End of else erreur saisies

    }   // Fin if ($_SERVER["REQUEST_METHOD"] == "POST")

    // Init variables form
    include __DIR__ . '/initLangue.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Langue</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style> 
    body {
        font-family: 'Roboto', sans-serif;
    }

    .global-div {
        width: 80%; 
        padding: 10px;
        border: 1px solid grey; 
        border-radius: 15px; 
        margin: 10px auto 0px auto;
    }
    .title {
        margin: 40px auto; 
        text-align: center; 
    }
    
    .input-text {
        width: 20%;
        margin-bottom: 20px;
    }

    .controls {
        display: flex; 
        justify-content: space-between;
        width: 250px;

    }

    .control-group {
        display: flex; 
        flex-direction: column; 
        align-items: center;

    }

    .bouton1 {
        width: 45%;
    }

    .bouton2 {
        width: 45%; 
    }

    .list-box {
        margin: 10px auto;
    }
</style>
<body>
<div class="global-div">
    <h1 class='title'>BLOGART21 Admin - Gestion du CRUD Langue</h1>
    <h2 class='title'>Ajout d'une langue</h2>

    <form method="post" action="./createLangue.php" enctype="multipart/form-data">

        <!--<input type="hidden" id="id" name="id" value=": /*$_GET['id']; */-->
        
        <div class="control-group">
            <label class="control-label" for="lib1Lang"><b>Langue libellé court :</b></label>
            <input class='input-text' type="text" name="lib1Lang" id="lib1Lang" size="80" maxlength="80" value="<?= $lib1Lang; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label class="control-label" for="lib2Lang"><b>Langue libellé long :</b></label>
            <input class='input-text' type="text" name="lib2Lang" id="lib2Lang" size="80" maxlength="80" value="<?= $lib2Lang; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label for="pays">Num Pays :</label>  
            <select class='list-box' id="pays" name="pays"  onchange="select()">
                <option value="" selected disabled hidden>Sélectionner Pays</option>
                <?php 
                global $db;
                $requete = 'SELECT * FROM PAYS ;';
                $result = $db->query($requete);
                $allPays = $result->fetchAll();
                foreach ($allPays AS $pays)
                {
                ?>
                <option value="<?php echo $pays['numPays'];?>"><?php echo $pays['frPays'];?></option>
                <?php
            }
            ?>
            </select>
            <div class="controls">
                <br><br>
                <input class='btn btn-primary bouton1' type="submit" value="Initialiser" name="Submit" />
                <input class='btn btn-success bouton2' type="submit" value="Valider" name="Submit" />
                <br>
            </div>
        </div>
        </div>
    </form>
    <footer>
    <br /><br /><hr />
    <h2>Retour à la gestion des membres <a href="./langue.php">CRUD Langue</a></h2>
</footer>
<?php

require_once __DIR__ . '/footer.php';
?>
</body>
</html>