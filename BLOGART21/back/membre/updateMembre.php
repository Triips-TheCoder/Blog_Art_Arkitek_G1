<?php
require_once __DIR__ . '/../../util/utilErrOn.php';
include __DIR__ . '/initMembre.php';
require_once __DIR__ . '/../../CLASS_CRUD/membre.class.php';
require_once __DIR__ . '/../../util/ctrlSaisies.php';

if(!isset($_GET['id'])) $_GET['id'] = '';
if(!isset($_GET['date'])) $_GET['date'] = '';

$monMembre = new MEMBRE;
$updated = false;
$errMessage = ""; 
$passOk = 0; 
$emailOk = 0;
$numMemb = $_GET["id"];
     
// stockage des données de la ligne sélectionné dans des variables
$resultMembre = $monMembre->get_1Membre($numMemb);
    $unPrenomMemb = $resultMembre['prenomMemb'];
    $unNomMemb = $resultMembre['nomMemb'];
    $unPseudoMemb = $resultMembre['pseudoMemb'];
    $passMemb = $resultMembre['passMemb'];
    $eMailMemb = $resultMembre['eMailMemb'];

     if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $Submit = isset($_POST['submit']) ? $_POST['submit'] : '';

         if ((isset($_POST["submit"])) AND ($_POST["submit"] === "Annuler")) {
             header("Location: ./membre.php");
         } 

         if(isset($_POST['souvenirMemb'])){
             $souvenirMemb = 1;
         }else{
             $souvenirMemb = 0;
         }

         if(isset($_POST['accordMemb'])){
             $accordMemb = 1;
         }else{
             $accordMemb = 0;
         }

         if((!empty($_POST['submit']) && ($Submit === "Valider")) && 
         !empty($_POST['prenomMemb']) && !empty($_POST['nomMemb']) 
         && !empty($_POST['pseudoMemb']) && !empty($_POST['eMail1Memb']) 
         && !empty($_POST['eMail2Memb']) && !empty($_POST['pass1Memb']) && !empty($_POST['pass2Memb'])
         && !empty($_POST['souvenirMemb']) && !empty($_POST['accordMemb'])){
             if ((isset($_POST['statut'])) && !empty($_POST['statut'])) {

                 $numMemb = $_GET["id"];
                 $prenomMemb = ctrlSaisies($_POST['prenomMemb']);
                 $nomMemb = ctrlSaisies($_POST['nomMemb']);
                 $pseudoMemb = ctrlSaisies($_POST['pseudoMemb']);
                 $pass1Memb = ctrlSaisies($_POST['pass1Memb']);
                 $pass2Memb = ctrlSaisies($_POST['pass2Memb']);
                 $eMail1Memb = ctrlSaisies($_POST['eMail1Memb']);
                 $eMail2Memb = ctrlSaisies($_POST['eMail2Memb']);
                 $dtCreaMemb = date("Y-m-d-H-i-s");
                 $idStat = ctrlSaisies($_POST['statut']);
                 $pseudoExist = $monMembre->get_ExistPseudo($pseudoMemb);

                 if ($pseudoExist == 0){
                     $errMessage = '';
                     $pseudoOk = 1;
                 } else{
                     $errMessage = 'Ce pseudo existe déja'; 
                     $pseudoOk = 0; 
                 }

                 if (filter_var($eMail1Memb, FILTER_VALIDATE_EMAIL)){
                     $errMessage = ""; 
                 } else {
                     $errMessage = "&nbsp&nbsp&nbsp Le format du mail n'est pas valide &nbsp&nbsp&nbsp&nbsp";
                 }

                 if (filter_var($eMail2Memb, FILTER_VALIDATE_EMAIL)){
                     $errMessage = ""; 
                 } else {
                     $eMail2Memb = 0; 
                     $errMessage = "&nbsp&nbsp&nbsp Le format du mail n'est pas valide &nbsp&nbsp&nbsp&nbsp";
                 }

                 if (($pass1Memb == $pass2Memb)){
                     $passOk = 1; 
                     $errMessage = ""; 
                 }  else{
                     $errMessage = "&nbsp&nbsp&nbsp Les mots de passe ne correspondent pas &nbsp&nbsp&nbsp&nbsp";
      
                 }

                 if (($eMail1Memb == $eMail2Memb)){
                     $emailOk = 1; 
                     $errMessage = ""; 
                 }else{
                     $errMessage = "&nbsp&nbsp&nbsp Les mails ne correspondent pas &nbsp&nbsp&nbsp&nbsp";
                 }

                 if ($prenomMemb != "" && $nomMemb != "" && $emailOk == 1 && $passOk == 1 && $pseudoOk == 1 && $accordMemb = 1) {
                     $pass1Memb = password_hash($_POST['pass1Memb'], PASSWORD_DEFAULT);
                     $updated = true; 
                     $monMembre->update($numMemb, $prenomMemb, $nomMemb, $pseudoMemb, $eMail1Memb, $pass1Memb, $idStat);
                     header("Location: ./updateMembre.php");
    
                 } else {
                     $erreur = true;
                     $errSaisies = "Insert impossible, incohérence données saisies :<br>" . $msgErrExistPseudo . $msgErrPseudo . $msgErrMail1 . $msgErrMail2 . $msgErrMailIdentiq . $msgErrPassIdentiq . $msgErrOkRGPD;
                 }
     
                 
                 
             }
         }
     }else{
        $numMemb = $_GET["id"];
        $dtCreaMemb = $_GET['date'];
    }


include __DIR__ . '/initMembre.php'
?>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Membre</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD Membre</h1>

    <form method="post" action=".\updateMembre.php" enctype="multipart/form-data">
    <fieldset>
        <legend class="legend1">Modification du membre <?echo($pseudoMemb)?>...</legend>
        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />
        <input type="hidden" id="date" name="date" value="<?= $_GET['date']; ?>" />
        <label>Prénom du membre:</label>
        <br>
        <input pattern="^[A-Za-z]{2,70}$" type="text" name="prenomMemb" placeholder="Prénom" minlength='2' maxlength='70' value=<? echo $unPrenomMemb;?>>
        <br>
        <br>
        <label>Nom du membre:</label>
        <br>
        <input pattern="^[A-Za-z]{2,70}$" type="text" name="nomMemb" placeholder="Nom" minlength='2' maxlength='70' value=<? echo($unNomMemb); ?>>
        <br>
        <br>
        <label>Pseudo du membre:</label>
        <br>
        <input pattern="^[\w\.](' ')?([\w\.])?{7,70}$" type="text" name="pseudoMemb" minlength='7' maxlength='70' placeholder="Pseudo" value=<? echo $unPseudoMemb; ?>>
        <br>
        <br>
        <label>Mot de passe:</label>
        <br>
        <i class ='italic'>(Au minimum un chiffre, une majuscule et une minuscule (8 caractères minimum)</i>
        <br>
        <input pattern='^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$' type="password" name="pass1Memb" placeholder="Nouveau mot de passe" minlength='8' maxlength='100' value=<? echo $passMemb ?>>
        <br>
        <br>
        <label>Confirmer votre mot de passe:</label>
        <br>
        <input pattern='^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$'  type="password" name="pass2Memb" placeholder="Confirmer mot de passe" minlength='8' maxlength='100' value=<? echo $passMemb ?> >
        <br>
        <br> 
        <label>Email du membre:</label>
        <br>
        <input type="email" name="eMail1Memb" placeholder="Email" value=<? echo $eMailMemb; ?>>
        <br>
        <br>
        <label>Confirmation changement d'Email:</label>
        <br>
        <input type="email" name="eMail2Memb" placeholder="Email" value=<? echo $eMailMemb; ?>>
        <br>
        <br>
        <label for="statut">Modifier son statut: </label>
        <br>
        <br>
        <input class='btn btn-primary' value ='Annuler' type="submit" name='submit'/>
        <input class='btn btn-success' value='Valider' type="submit" name='submit'/>
    </fieldset>
    </form>
<?php

if($updated) {
    echo '<p style="color:green;">Le membre ' . $pseudoMemb . ' #' . $numMemb . ' a été bien modifié.</p>';
}

require_once __DIR__ . '/footerMembre.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>