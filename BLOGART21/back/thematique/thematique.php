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

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <style type='text/css'>
    body{
        color: black; 
    }
    </style>
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Thematique</h1>
    <table border = '3' bgcolor = 'aliceblue'>
    <thead>
        <tr>
            <th>&nbsp;numThem&nbsp;</th>
            <th>&nbsp;libThem&nbsp;</th>
            <th>&nbsp;numLang&nbsp;</th>
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