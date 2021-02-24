<?
require_once __DIR__ . '/../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // modification classe LANGUE
    require_once __DIR__ . '/../../util/ctrlSaisies.php';
    require_once __DIR__ . '/../../CLASS_CRUD/motCle.class.php';
    global $db;
    $monMotCle = new MOTCLE;
    

    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif de la LANGUE
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Initialiser")) {
            $reload = $_POST['id'];
            header("Location: ./motCle.php?id=".$reload);
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création   
        
        if ((isset($_POST['id'])) AND !empty($_POST['id'])
        AND (!empty($_POST['Submit'])) AND ($Submit === "Valider")
        AND (isset($_POST['libMotCle'])) AND !empty($_POST['libMotCle'])
        AND (isset($_POST['numLang'])) AND !empty($_POST['numLang'])) {
            
            // Saisies valides
            $erreur = false;

            $numMotCle = ($_POST['id']);

            $libMotCle = ctrlSaisies(($_POST['libMotCle']));

            $numLang = ($_POST['numLang']);    

            $monMotCle->update($numMotCle, $libMotCle, $numLang);
            header("Location: ./motCle.php");
                      
        }   // Fin if ((isset($_POST['libStat'])) ...
        else {
            $erreur = true;
            $errSaisies =  "Erreur, la saisie est obligatoire !";
        }   // End of else erreur saisies




    }   // Fin if ($_SERVER["REQUEST_METHOD"] == "POST")

    // Init variables form
    include __DIR__ . '/initMotCle.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD MotClé</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    a{
        text-decoration: none; 
    }
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
        margin: 30px auto; 
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
</head>
<body>
<div class="global-div">
    <h1 class='title'>BLOGART21 Admin - Gestion du CRUD Mots Clés</h1>
    <h2 class='title'>Modification d'un Mot Clé</h2>
<?
    // Modif : récup id à modifier
    if (isset($_GET['id']) AND !empty($_GET['id'])) {

        $id = ctrlSaisies(($_GET['id']));

        $query = (array)$monMotCle->get_1MotCleByLangue($id);
        
        if ($query) {
            $libMotCle = $query['libMotCle'];
            $numLang = $query['numLang'];
            $lib1Lang = $query['lib1Lang'];
        }   // Fin if ($query)
    }   // Fin if (isset($_GET['id'])...)


?>
    <form method="post" action="./updateMotCle.php" enctype="multipart/form-data">
        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />

        <div class="control-group">
            <label class="control-label" for="libMotCle"><b>Mot Clé</b></label>
            <input class='input-text' type="text" name="libMotCle" id="libMotCle" size="60" maxlength="80" value="<?= $libMotCle; ?>" autofocus="autofocus" />
        </div>
        
        <div class="control-group">
            <label for="numLang">Langue :</label>  
            <select class='list-box' id="numLang" name="numLang"  onchange="select()"> 
                <?php
                global $db;
                $requete = 'SELECT numLang, lib1Lang FROM LANGUE ;';
                $result = $db->query($requete);
                $allLangue = $result->fetchAll();
                foreach ($allLangue AS $langue)
                {
                ?>
               <option value="<?php echo $langue['numLang'];?>"><?php echo $langue['lib1Lang'];?></option>
            <?php
            }
            ?>
            </select>
        </div>
        <div class="control-group">
            <div class="controls">
                <br><br>
                <input class='btn btn-primary' type="submit" value="Initialiser" name="Submit" />
                <input class= 'btn btn-success' type="submit" value="Valider" name="Submit" />
                <br>
            </div>
        </div>
      </div>
    </form>
<?php
require_once __DIR__ . '/footerMotCle.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>