<?

require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';
require_once __DIR__ . '/../../CLASS_CRUD/angle.class.php';
include __DIR__ . './initAngle.php';

$angle = new ANGLE;
if (!isset($_GET['id'])) $_GET['id'] = '';
$lang = new LANGUE;
$updated = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Annuler")) {

        header("Location: ./angle.php");
    }   

    $numAngl = $_POST["id"];
    $resultAngle = $angle->get_1Angle($numAngl);
    if (!empty($numAngl) && !empty($_POST["libAngl"]) && !empty($_POST["numLang"])) {
        $angle->update($numAngl, $_POST["libAngl"], $_POST["numLang"]);
        $resultAngle = $angle->get_1Angle($numAngl);
        $numLang = $resultAngle["numLang"];
        $libAngl = $resultAngle["libAngl"];
        $updated = true;
    }
} else {
    $numAngl = $_GET["id"];
    $resultAngle = $angle->get_1Angle($numAngl);
    $numLang = $resultAngle["numLang"];
    $libAngl = $resultAngle["libAngl"];
}


if ($resultAngle) {
    $libAngl = $resultAngle["libAngl"];
    $numLang = $resultAngle["numLang"];
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
    <h1 class='title'>BLOGART21 Admin - Gestion du CRUD Angle</h1>
    <h2 class='title'>Modification d'un Angle</h2>

    <?php
    if ($updated) {
        echo '<p style="color:green;">L angle "' . $libAngl . '" a été bien modifiée.</p>';
    }
    ?>

    <form method="post" action="<?= "./updateAngle.php?id=" . $numLang; ?>" enctype="multipart/form-data">

            <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />

            <div class="control-group">
                <label class="control-label" for="numAngl"><b>NumAngl :</b></label>
                <input class='input-text' type="text" name="numAngl" id="numAngl" size="80" maxlength="80" disabled value="<?= isset($numAngl) ? $numAngl : ''; ?>" /><br><br>

                <label class="control-label" for="libAngl"><b>LibAngl :</b></label>
                <input class='input-text' type="text" name="libAngl" id="libAngl" size="80" maxlength="80" value="<?= (isset($libAngl) ? ($libAngl) : ""); ?>" /><br><br>

                <label class="control-label" for="numLang"><b>Lang :</b></label>
                <select class='list-box' name="numLang" id="numLang">
                    <?php
                    $allLangues = $lang->get_AllLangues();
                    foreach ($allLangues as $row) {
                        if ($row["numLang"] === $numLang) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        }
                        echo '<option value="' . $row["numLang"] . '" ' . $selected . '>' . $row["lib1Lang"] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="control-group">
                <div class="controls">
                    <br><br>
                    <input class='btn btn-primary bouton1' type="submit" value="Annuler" name="Submit" />
                    <input class='btn btn-success bouton2'type="submit" value="Valider"name="Submit" />
                    <br>
                </div>
            </div>
    </form>
<?php
require_once __DIR__ . '/footerAngle.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>