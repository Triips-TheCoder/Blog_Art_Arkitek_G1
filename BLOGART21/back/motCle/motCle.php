<?
/////////////////////////////////////////////////////
//
//  CRUD MOTCLE (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : motCle.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/motCle.class.php'; 
global $db; 
$monMotCle = new MOTCLE;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Mots Cle</title>
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
    <h1>BLOGART21 Admin - Gestion du CRUD Mots Cle</h1>
    <table border = '3' bgcolor = 'aliceblue'>
    <thead>
        <tr>
            <th>&nbsp;numMotCle&nbsp;</th>
            <th>&nbsp;libMotCle&nbsp;</th>
            <th>&nbsp;numLang&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?php 
    $allMotsCle = $monMotCle -> get_AllMotsCle(); 
    foreach($allMotsCle as $ligne){ 
?>
    <tr>
    <td><h4>&nbsp;  <?php echo $ligne['numMotCle']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp;  <?php echo $ligne['libMotCle']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp;  <?php echo  $ligne['numLang'];?> &nbsp;</h4></td>
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