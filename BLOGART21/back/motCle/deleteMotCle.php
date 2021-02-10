<?php
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 10 Février 2021
//
//  Script  : deleteMotCle.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe STATUT
    require_once __DIR__ . '/../../util/ctrlSaisies.php';
    require_once __DIR__ . '/../../CLASS_CRUD/motCle.class.php';
    require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';
    global $db;
    $monMotCle= new MOTCLE;
    $maLangue = new LANGUE; 
    $errCIR = 0;    


   // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
   // suppression effective du statut
   if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Opérateur ternaire
    $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

    if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Annuler")) {

        header("Location: ./motCle.php");
        die();
    }   // End of if ((isset($_POST["submit"])) ...

    if ((isset($_POST['id']) AND !empty($_POST['id']))
        AND (!empty($_POST['Submit']) AND ($Submit === "Supprimer"))) {
            
            $numMotCle = ctrlSaisies($_POST['id']);
            $numLang = $_POST["id"];
            $resultLangue = $maLangue->get_1LangueByPays($numLang);
            $nbMotCleArticle = $monMotCle -> get_NbAllMotCleByMotCleArticle($numMotCle);

            //Controle CIR

            if ($nbMotCleArticle < 1){
                $monMotCle -> delete($numMotCle);
                header("Location: ./motCle.php");
            }
            else{
                $errCIR = 1;
                if ($errCIR == 1) {
                    echo '<p style="color:red;">Vous ne pouvez pas supprimer cette occurence car elle se trouve dans une autre table ! </p>';
                 }
                header("Location: ./motCle.php?errCIR=".$errCIR);
            }
  

    }   // End of if ((isset($_POST['id'])
}   // End of if ($_SERVER["REQUEST_METHOD"] === "POST")
// Init variables form
include __DIR__ . '/initMotCle.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Mot Cle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        body{
            color: #000; 
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
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD MotCle</h1>
    <h2>Suppression d'un MotCle</h2>
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

    <form method="post" action="./deleteMotCle.php" enctype="multipart/form-data">

        <fieldset>
            <legend class="legend1">Modification Mot Clé...</legend>

            <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />

            <div class="control-group">
                <label class="control-label" for="libMotCle"><b>Mot Clé :</b></label>
                <input type="text" name="libMotCle" id="libMotCle" size="60" maxlength="80" value="<?= $libMotCle; ?>" autofocus="autofocus" />
            </div>
            <br>
            <div class="control-group">
                <label for="lib1Lang">Langue :</label>  
                <input type="text" name="lib1Lang" id="lib1Lang" size="60" maxlength="80" value="<?= $lib1Lang; ?>" autofocus="autofocus" />
            </div>
            <div class="control-group">
                <div class="controls">
                    <br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" value="Annuler" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" value="Supprimer" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                    <br>
                </div>
            </div>
            <p style ='color : red'>ATTENTION ! Avant de supprimer cette occurence vérifier si elle ne se trouve pas en clé étrangère dans une autre table !</p>
        </fieldset>
    </form>
    <br>
<?php

require_once __DIR__ . '/footerMotCle.php';
require_once __DIR__ . '/footer.php';
?>
</body>
</html>