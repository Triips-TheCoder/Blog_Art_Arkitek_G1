<?
/////////////////////////////////////////////////////
//
//  CRUD ANGLE (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : angle.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/angle.class.php';
global $db;
$monAngle = new ANGLE;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Angle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style type='text/css'>
    body{
        color: black; 
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
    <h1>BLOGART21 Admin - Gestion du CRUD Langue</h1>
    <table class='table-bordered' border = '3' bgcolor = 'aliceblue'>
    <thead>
        <tr>
            <th>&nbsp;numAngl&nbsp;</th>
            <th>&nbsp;libAngl&nbsp;</th>
            <th>&nbsp;numLang&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?php 
    $allAngles = $monAngle -> get_AllAngles(); 
    foreach($allAngles as $ligne){ 
?>
    <tr>
    <td><h4>&nbsp;  <?php echo $ligne['numAngl']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo $ligne['libAngl']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo  $ligne['numLang'];?> &nbsp;</h4></td>
    </tr>
    
<?php
    }
?> 
    </tbody> 
    </table>
    <footer>
    <br /><br /><hr />
    <h2>Créer un angle : <a href="./createAngle.php">Creer un Angle</a></h2>
    </footer>
<?php 
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
