<?
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 09 Fevrier 2021
//
//  Script  : deleteStatut.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';
// Ctrl CIR
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Instence de la class STATUT
require_once __DIR__ . '/../../CLASS_CRUD/statut.class.php';
global $db;
$monStatut = NEW STATUT; 

// Instence de la class USER
require_once __DIR__ . '/../../CLASS_CRUD/user.class.php';
global $db;
$monUser = new USER;
$erreur = 0;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Opérateur ternaire
    $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

    if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Annuler")) {

        header("Location: ./statut.php");
    }   // End of if ((isset($_POST["submit"])) ...

    if ((isset($_POST['id']) AND $_POST['id'] > 0)
        AND (!empty($_POST['Submit']) AND ($Submit === "Supprimer"))) {
            $errCIR = 0;
            $idStat = ctrlSaisies($_POST['id']);

            $allUser = (int)$monUser->get_NbAllUsersByIdStat($idStat);
            
            
            if($allUser < 1){
                $count = $monStatut->delete($idStat);
                $erreur = 0;
                if ($erreur == 0){ 
                    header("Location: ./statut.php");
                }else if ($erreur == 1) {
                    header("Location: ./deleteStatut.php");
                    echo "<h1 style ='color: red'>Erreur delete STATUT !</h1>"; 
                }
            }
 

    }   // End of if ((isset($_POST['id'])
}   // End of if ($_SERVER["REQUEST_METHOD"] === "POST")
// Init variables form
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
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
    </style>
</head>
<body>
<div class="global-div">
    <h1 class='title'>BLOGART21 Admin - Gestion du CRUD Statut</h1>
    <h2 class='title'>Suppression d'un statut</h2>
<?
    // Supp : récup id à supprimer
    if (isset($_GET['id']) and $_GET['id'] > 0) {

        $id = ctrlSaisies(($_GET['id']));

        $query = (array)$monStatut->get_1Statut($id);

        if ($query) {
            $libStat = $query['libStat'];
            $idStat = $query['idStat'];
        }   
    }   
?>    <form method="post" action="./deleteStatut.php" enctype="multipart/form-data">

        <input type="hidden" id="id" name="id" value="<?= $_GET['id'] ;?>" />

        <div class="control-group">
            <label class="control-label" for="libStat"><b>Nom du statut :</b></label>
            <input class='input-text' type="text" name="libStat" id="libStat" size="80" maxlength="80" value="<?= $libStat; ?>" disabled="disabled" />
        </div>

        <div class="control-group">
            <div class="controls">
                <br><br>
                <input class='btn btn-primary bouton1' type="submit" value="Annuler" name="Submit" />
                <input class='btn btn-danger bouton2' type="submit" value="Supprimer" name="Submit" />
                <br>
            </div>
        </div>
    </div>
    </form>
    <br>
    <i><div class='error'><br>=>&nbsp;ATTENTION ! Avant de supprimer
    un STATUT vérifier si ce STATUT n'est pas présent dans une autre table.</div><i>  
<?
require_once __DIR__ . '/footerStatut.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
