<?
/////////////////////////////////////////////////////
//
//  CRUD USER (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : user.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/user.class.php';
global $db; 
$monUser = new USER; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD User</title>
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
    <h1>BLOGART21 Admin - Gestion du CRUD User</h1>
    <table border = '3' bgcolor = 'aliceblue'>
    <thead>
        <tr>
            <th>&nbsp;pseudoUser&nbsp;</th>
            <th>&nbsp;passUser&nbsp;</th>
            <th>&nbsp;nomUser&nbsp;</th>
            <th>&nbsp;prenomUser&nbsp;</th>
            <th>&nbsp;eMailUser&nbsp;</th>
            <th>&nbsp;idStat&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?php 
    $allUsers = $monUser -> get_AllUsers(); 
    foreach($allUsers as $line){ 
?>
    <tr>
    <td><h4>&nbsp;  <?php echo $line['pseudoUser']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo $line['passUser']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo  $line['nomUser'];?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo $line['prenomUser']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo $line['eMailUser']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo $line['idStat']; ?> &nbsp;</h4></td>
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
