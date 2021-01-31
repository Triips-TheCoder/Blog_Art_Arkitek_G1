<?
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : updateStatut.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../util/ctrlSaisies.php';
require_once __DIR__ . '/../../CLASS_CRUD/statut.class.php';
global $db;
$monStatut = NEW STATUT; 
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
            // Opérateur ternaire
            $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';
    
            if ((isset($_POST["Submit"])) AND ($Submit === "Initialiser")) {
    
                header("Location: ./updateStatut.php");
            }   // End of if ((isset($_POST["submit"])) ...
    
            // Mode modif
            
            if ((isset($_POST['id']) AND $_POST['id'] > 0)
            AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))) {
    
                $idStat = ctrlSaisies($_POST['id']);
    
                if (((isset($_POST['libStat'])) AND !empty($_POST['libStat']))) {
                    // Saisies valides
    
                    $libStat = ctrlSaisies(($_POST['libStat']));
    
                    $monStatut->update($idStat, $libStat);
    
                    header("Location: ./statut.php");
                }   
    
            } 
           
        }   

    include __DIR__ . '/initStatut.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Statut</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <style type ='text/css'>
    body{
        color: black; 
    }
    </style>
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Statut</h1>
    <h2>Modification d'un statut</h2>
<?php
    // Modif : récup id à modifier
    if (isset($_GET['id']) and $_GET['id'] > 0) {

        $id = ctrlSaisies(($_GET['id']));

        $query = (array)$monStatut->get_1Statut($id);

        if ($query) {
            $libStat = $query['libStat'];
            $idStat = $query['idStat'];
        }   // Fin if ($query)
    }   // Fin if (isset($_GET['id'])...)
?>
    <form method="post" action="./updateStatut.php" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire Statut...</legend>

        <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />

        <div class="control-group">
            <label class="control-label" for="libStat"><b>Nom du statut :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libStat" id="libStat" size="80" maxlength="80" value="<?= $libStat ?>" autofocus="autofocus" />
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
<?
require_once __DIR__ . '/footerStatut.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
