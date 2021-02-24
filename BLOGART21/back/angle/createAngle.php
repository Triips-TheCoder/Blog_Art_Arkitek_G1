<?
require_once __DIR__ . '/../../util/utilErrOn.php';

require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';
$lang = new LANGUE;

require_once __DIR__ . '/../../CLASS_CRUD/angle.class.php';
require_once __DIR__ . '/../../CLASS_CRUD/getNextNumAngl.php';
$angle = new ANGLE;
$created = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

    if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Initialiser")) {

        header("Location: ./angle.php");
    }   

    if(!empty($_POST['libAngl']) && !empty($_POST['numLang'])){
        $angle->create(getNextNumAngl($_POST['numLang']), $_POST['libAngl'], $_POST['numLang']);
        $created = true;
        $libAngl = $_POST['libAngl'];
    }
}

// Init variables form
include __DIR__ . '/initAngle.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Angle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
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
</head>
<body>
<div class="global-div">
    <h1 class='title'>BLOGART21 Admin - Gestion du CRUD Angle</h1>
    <h2 class='title'>Ajout d'un Angle</h2>
    <?php
    if ($created) {
        echo '<p style="color:green;">L angle "' . $_POST['libAngl'] . '" a été crée.</p>';
    } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "<p style='color:red;'>Le mot-clé n'a pas été créé car : aucun nom n'a été rentré </p>";

    }
    ?>
    <form method="post" action="./createAngle.php" enctype="multipart/form-data">

        <div class="control-group">
            <label class="control-label" for="libAngl"><b>Nom de l'angle :</b></label>
            <input class='input-text' type="text" name="libAngl" id="libAngl" size="80" maxlength="80" autofocus="autofocus" />
        </div>

        <div class="control-group">
        <label for="numLang">Lang :</label>
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
            <div class="controls">
                <br><br>
                <input  class='btn btn-primary bouton1' type="submit" value="Initialiser" name="Submit" />
                <input  class='btn btn-success bouton2' type="submit" value="Valider" name="Submit" />
                <br>
            </div>
        </div>
</div>
    </form>
<?
require_once __DIR__ . '/footerAngle.php';
require_once __DIR__ . '/footer.php';
?>
</body>
</html>