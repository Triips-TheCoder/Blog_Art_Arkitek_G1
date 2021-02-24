<?php
/////////////////////////////////////////////////////
//
//  CRUD LANGUE (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : updateLangue.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';
require_once __DIR__ . '/../../CLASS_CRUD/thematique.class.php';
include __DIR__ . './initThematique.php';

$thematique = new THEMATIQUE;
if (!isset($_GET['id'])) $_GET['id'] = '';
$lang = new LANGUE;
$updated = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Annuler")) {

        header("Location: ./thematique.php");
    }   

    $numThem = $_POST["id"];
    $resultThem = $thematique->get_1Thematique($numThem);
    if (!empty($numThem) && !empty($_POST["libThem"]) && !empty($_POST["numLang"])) {
        $thematique->update($numThem, $_POST["libThem"], $_POST["numLang"]);
        $resultThem = $thematique->get_1Thematique($numThem);
        
    $numLang = $resultThem["numLang"];
    $libThem = $resultThem["libThem"];
        $updated = true;
    }
} else {
    $numThem = $_GET["id"];
    $resultThem = $thematique->get_1Thematique($numThem);

    $numLang = $resultThem["numLang"];
    $libThem = $resultThem["libThem"];
}


if ($resultThem) {
    $libThem = $resultThem["libThem"];
    $numLang = $resultThem["numLang"];
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
    <h1 class='title'>BLOGART21 Admin - Gestion du CRUD Thematique</h1>
    <h2 class='title'>Modification d'une Thematique</h2>
    <?
    if ($updated) {
        echo '<p style="color:green;">Le mot-clé "' . $_POST['libThem'] . '" a été modifié.</p>';
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "<p style='color:red;'>La thématique n'a pas été modifié car aucune thématique n'a été rentré </p>";

    }
    ?>
 <form method="post" action="<?= "./updateThematique.php?id=" . $numThem; ?>" enctype="multipart/form-data">
        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />

        <div class="control-group">
            <label class="control-label" for="numThem"><b>NumThem :</b></label>
            <input type="text" name="numThem" id="numThem" size="80" maxlength="80" disabled value="<?= isset($numThem) ? $numThem : ''; ?>" /><br><br>        
        </div>
        <div class="control-group">
            <label class="control-label" for="libThem"><b>LibThem :</b></label>
            <input type="text" name="libThem" id="libThem" size="80" maxlength="80" value="<?= (isset($libThem) ? ($libThem) : ""); ?>" /><br><br>
        </div>
        <div class="control-group">
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
            <div class="controls">
                <br><br>
                <input class='btn btn-primary bouton1' type="submit" value="Annuler" name="Submit" />
                <input class='btn btn-success bouton2' type="submit" value="Valider" name="Submit" />
                <br>
            </div>
        </div>
        </div>
    </form>
<?php
require_once __DIR__ . '/footerThematique.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>