

















































<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Thematique</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

<style type='text/css'>
  body {
        font-family: 'Roboto', sans-serif;
        padding: 15px;
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
    <h1 class='title'>BLOGART21 Admin - Gestion du CRUD Thematique</h1>
    <h2 class='title'>Suppression d'une thématique</h2>

    <form method="post" action="./deleteThematique.php" enctype="multipart/form-data">
        
        <div class="control-group">
            <label class="control-label" for="libThem"><b>Thematique :</b></label>
            <input class='input-text' type="text"  id="libThem" name="libThem" size="80" maxlength="80" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label for="numLang"><b>Langue :</b></label>  
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
                <input class='btn btn-primary bouton1' type="submit" value="Annuler" name="Submit" />
                <input class='btn btn-success bouton2' type="submit" value="Valider" name="Submit" />
                <br>
            </div>
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