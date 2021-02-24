<?
/////////////////////////////////////////////////////
//
//  CRUD THEMATIQUE (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : thematique.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/thematique.class.php'; 
global $db; 
$maThematique = new THEMATIQUE;

?>
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
body{
    padding: 15px;
    font-family: 'Roboto', sans-serif;
}

a {
    text-decoration: none; 
    }   
    
.title {
    margin: 20px 0; 
}
</style>
    <style type='text/css'>
    body{
        color: black; 
    }
    </style>
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Thematique</h1>
    <table class='table-bordered' border = '3' bgcolor = 'aliceblue'>
    <thead>
        <tr>
            <th>&nbsp;numThem&nbsp;</th>
            <th>&nbsp;libThem&nbsp;</th>
            <th>&nbsp;numLang&nbsp;</th>
            <th colspan='2'>&nbsp;Action&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?php 
    $allThematiques = $maThematique -> get_AllThematiques(); 
    foreach($allThematiques as $ligne){ 
?>
    <tr>
    <td><h4>&nbsp;  <?php echo $ligne['numThem']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp;  <?php echo $ligne['libThem']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp;  <?php echo $ligne['numLang']; ?> &nbsp;</h4></td>
    <td><a href="./updateThematique.php?id=<?= $ligne["numThem"]; ?>"><i>Modifier</i></a></td>
    <td><a href="./deleteThematique.php?id=<?= $ligne["libThem"]; ?>"><i>Supprimer</i></a></td>
    </tr>

<?php
    }
?> 
    </tbody> 
    </table>
    <footer>
    <br /><br /><hr />
    <h2>Créer une thématique : <a href="./createThematique.php">Creer une thématique</a></h2>
    </footer>
<?php 
require_once __DIR__ . '/footer.php';
?>
</body>
</html>