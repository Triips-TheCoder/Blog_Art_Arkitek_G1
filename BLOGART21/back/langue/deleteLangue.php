<?php

require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';
require_once __DIR__ . '/../../CLASS_CRUD/thematique.class.php';
require_once __DIR__ . '/../../CLASS_CRUD/angle.class.php';
require_once __DIR__ . '/../../CLASS_CRUD/motcle.class.php';
include __DIR__ . '/initLangue.php';



$supprImpossible = false;
$deleted = false;
if (!isset($_GET['id'])) $_GET['id'] = '';
$numPays = '';
$frPays = '';
$maLangue = new LANGUE;
$maThematique = new THEMATIQUE;
$monAngle = new ANGLE;
$monMotCle = new MOTCLE;

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if ($_POST["Submit"] === "Annuler") {
        header("Location: ./langue.php");
        die();
    }

    $numLang = $_POST["id"];
    $resultLangue = $maLangue->get_1LangueByPays($numLang);
    $thematiques = $maThematique->get_AllThematiquesByLang($numLang);
    $angles = $monAngle->get_AllAnglesByLang($numLang);
    $motcles = $monMotCle->get_AllMotClesByLang($numLang);

    if (!$thematiques && !$angles && !$motcles) {
        $maLangue->delete($numLang);
        $deleted = true;
    } else {
        $supprImpossible = true;
    }
} else {
    $numLang = $_GET["id"];
    $resultLangue = $maLangue->get_1LangueByPays($numLang);
}

if ($resultLangue) {
    $lib1Lang = $resultLangue["lib1Lang"];
    $lib2Lang = $resultLangue["lib2Lang"];
    $numPays = $resultLangue["numPays"];
    $frPays = $resultLangue["frPays"];
}

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

    .list-box {
        margin: 10px auto;
    }
    </style>
</head>

<body>
<div class="global-div">
    <h1 class='title'>BLOGART21 Admin - Gestion du CRUD Langue</h1>
    <h2 class='title'>Suppression d'une langue</h2>
    <form method="post" action="<?= "./deleteLangue.php?id=" . $numLang; ?>" enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />

            <div class="control-group">
                <label class="control-label" for="lib1Lang"><b>Désignation :</b></label>
                <input class='input-text' type="text" name="lib1Lang" id="lib1Lang" size="80" maxlength="80" value="<?= $deleted ? '' : $lib1Lang; ?>" disabled /><br><br>

                <label class="control-label" for="lib2Lang"><b>Dénomination :</b></label>
                <input class='input-text' type="text" name="lib2Lang" id="lib2Lang" size="80" maxlength="80" value="<?= $deleted ? '' : $lib2Lang; ?>" disabled /><br><br>

                <label class="control-label" for="numPays"><b>Pays :</b></label>
                <select class='list-box' name="numPays" id="numPays" disabled>
                    <option value="<?= $deleted ? '' : $numPays; ?>" selected><?php echo $deleted ? '' : $frPays; ?></option>
                </select>
            </div>

            <div class="control-group">
                <div class="controls">
                    <br><br>
                    <input class='btn btn-primary bouton1' type="submit" value="Annuler" name="Submit" />
                    <input class='btn btn-danger bouton2' type="submit" value="Suppression" name="Submit" />
                    <br>
                </div>
            </div>
        </div>
    </form>
    <br>
    <?php

    if ($supprImpossible) {
        echo '<p style="color:red;">Impossible de supprimer la langue "' . $lib2Lang . '" car elle est référencée par les éléments suivant :</p>';

        if ($thematiques) {
            echo '<p>Table THEMATIQUE :</p>';
            echo '<ul>';
            foreach ($thematiques as $row) {
                echo '<li>' . $row["libThem"] . '</li>';
            }
            echo '</ul>';
        }

        if ($angles) {
            echo '<p>Table ANGLE :</p>';
            echo '<ul>';
            foreach ($angles as $row) {
                echo '<li>' . $row["libAngl"] . '</li>';
            }
            echo '</ul>';
        }

        if ($motcles) {
            echo '<p>Table MOTCLE :</p>';
            echo '<ul>';
            foreach ($motcles as $row) {
                echo '<li>' . $row["libMotCle"] . '</li>';
            }
            echo '</ul>';
        }
    } elseif ($deleted) {
        echo '<p style="color:green;">La langue "' . $lib2Lang . '" a été supprimée.</p>';
    }

    require_once __DIR__ . '/footerLangue.php';

    require_once __DIR__ . '/footer.php';
    ?>
</body>

</html>