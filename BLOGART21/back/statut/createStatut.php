<?
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 09 Fevrier 2021
//
//  Script  : createStatut.php  (ETUD)   -   BLOGART21
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

            header("Location: ./createStatut.php");
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
        if (((isset($_POST['libStat'])) AND !empty($_POST['libStat']))
            AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))) {
            // Saisies valides

            $libStat = ctrlSaisies(($_POST['libStat']));

            $monStatut->create($libStat);

            header("Location: ./statut.php");
        }   // Fin if ((isset($_POST['libStat'])) ...
    }   // Fin if ($_SERVER["REQUEST_METHOD"] == "POST")
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
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
</style>
<body>
<div class="global-div">
    <h1 class="title">BLOGART21 Admin - Gestion du CRUD Statut</h1>
    <h2 class ="title">Ajout d'un statut :</h2>

    <form method="post" action="./createStatut.php" enctype="multipart/form-data">

        <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />
        <div class="control-group">
            <label class="control-label" for="libStat"><b>Nom du statut :</b></label>
            <input class='input-text' type="text" name="libStat" id="libStat" size="30" maxlength="80" autofocus="autofocus" />
        </div>

        <div class="control-group">
            <div class="controls">
                <br><br>
                <input class='btn btn-primary bouton1' type="submit" value="Initialiser" name="Submit" />
                <input class='btn btn-success bouton2' type="submit" value="Valider" name="Submit" />
                <br>
            </div>
        </div>
        </div>
  </div>
    </form>
<?
require_once __DIR__ . '/footerStatut.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
