<?
/////////////////////////////////////////////////////
//
//  CRUD MOTCLEARTICLE (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : motCleArticle.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/motCleArticle.class.php'; 
global $db; 
$monMotCleArticle = new MOTCLEARTICLE;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Mots Cle Article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <style type='text/css'>
    body{
        color: black; 
    }
    </style>
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Mots Cle Article</h1>
    <table border = '3' bgcolor = 'aliceblue'>
    <thead>
        <tr>
            <th>&nbsp;numArt&nbsp;</th>
            <th>&nbsp;numMotCle&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?php 
    $allMotsCleArticle = $monMotCleArticle -> get_AllMotsCleArticle(); 
    foreach($allMotsCleArticle as $ligne){ 
?>
    <tr>
    <td><h4>&nbsp;  <?php echo $ligne['numArt']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp;  <?php echo $ligne['numMotCle']; ?> &nbsp;</h4></td>
    </tr>
    
<?php
    }
?> 
    </tbody> 
    </table>
<?php 
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
