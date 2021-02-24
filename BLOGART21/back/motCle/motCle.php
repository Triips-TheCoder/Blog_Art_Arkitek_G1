<?
/////////////////////////////////////////////////////
//
//  CRUD MOTCLE (PDO) - Modifié - 10 Février 2021
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type='text/css'>
    .error {
        padding: 2px;
        border: solid 0px black;
        color: red;
        font-style: italic;
        border-radius: 5px;
    }
    a {
    text-decoration: none; 
    }   
    
    .title {
        margin: 20px 0; 
    }
</style>
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Mots Cle</h1>
    <table class='table-bordered' border = '3' bgcolor = 'aliceblue'>
    <thead>
        <tr>
            <th>&nbsp;numMotCle&nbsp;</th>
            <th>&nbsp;libMotCle&nbsp;</th>
            <th>&nbsp;numLang&nbsp;</th>
            <th colspan="2">&nbsp;Action&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?php 
    $allMotCle = $monMotCle->get_AllMotCleByLangue();
    foreach($allMotCle as $row){ 
?>
    <tr>
    <td><h4>&nbsp;  <?php echo $row['numMotCle']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp;  <?php echo $row['libMotCle']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp;  <?php echo  $row['numLang'];?> &nbsp;</h4></td>
    <td>&nbsp;<a href="./updateMotCle.php?id=<?=$row["numMotCle"];?>"><i>Modifier</i></a>&nbsp;</td>
    <td>&nbsp;<a href="./deleteMotCle.php?id=<?=$row["numMotCle"];?>"><i>Supprimer</i></a>&nbsp;</td>
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