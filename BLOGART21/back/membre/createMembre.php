<?php
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/membre.class.php';
require_once __DIR__ . '/../../util/ctrlSaisies.php';


$monMembre = new MEMBRE;
$created = false;
$passOk = 0; 
$emailOk = 0;


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';
    if ((isset($_POST["Annuler"])) AND ($_POST["Annuler"] === "Annuler")) {

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
    if(!empty($_POST['prenomMemb']) && !empty($_POST['nomMemb']) 
    && !empty($_POST['pseudoMemb']) && !empty($_POST['eMail1Memb']) 
    && !empty($_POST['eMail2Memb']) && !empty($_POST['pass1Memb']) && !empty($_POST['pass2Memb'])
    && !empty($_POST['souvenirMemb']) && !empty($_POST['accordMemb'])){
        if ((isset($_POST['statut'])) AND !empty($_POST['statut'])) {
            $prenomMemb = ctrlSaisies($_POST['prenomMemb']);
            $nomMemb = ctrlSaisies($_POST['nomMemb']);
            $pseudoMemb = ctrlSaisies($_POST['pseudoMemb']);
            $pass1Memb = ctrlSaisies($_POST['pass1Memb']);
            $pass2Memb = ctrlSaisies($_POST['pass2Memb']);
            $eMail1Memb = ctrlSaisies($_POST['eMail1Memb']);
            $eMail2Memb = ctrlSaisies($_POST['eMail2Memb']);
            $dtCreaMemb = date("Y-m-d-H-i-s");
            $ctrlSouvenirMemb = ctrlSaisies($_POST['souvenirMemb']);
            $ctrlAccordMemb = ctrlSaisies($_POST['accordMemb']);
            $idStat = ctrlSaisies($_POST['statut']);
            $pseudoExist = $monMembre->get_ExistPseudo($pseudoMemb);
            if ($pseudoExist == 0){
                $errMessage = '';
                $pseudoOk = 1;
            } else{
                echo "<h3 style='color: red;'>Ce pseudo existe déja !</h3>"; 
                $pseudoOk = 0; 
            }
            if (filter_var($eMail1Memb, FILTER_VALIDATE_EMAIL)){
                $errMail = ""; 
            } else {
                echo "<h3 style='color: red;'>Le format du mail n'est pas valide !</h3>";
            }
            if (filter_var($eMail2Memb, FILTER_VALIDATE_EMAIL)){
                $errMail = ""; 
            } else {
                $eMail2Memb = 0; 
                echo "<h3 style='color: red;'>Le format du mail n'est pas valide !</h3>";
            }
            if (($pass1Memb === $pass2Memb)){
                $passOk = 1; 
                $errMessage = ""; 
            }  else{
                echo "<h3 style='color: red;'>Les mots de passe ne correspondent pas!</h3>";
 
            }
            if (($eMail1Memb === $eMail2Memb)){
                $emailOk = 1; 
                $errMessage = ""; 
            }else{
                echo "<h3 style='color: red;'>Les mails ne correspondent pas !</h3>";
            }
            if ($prenomMemb != "" && $nomMemb != "" && $emailOk == 1 && $passOk == 1 && $pseudoOk == 1 && $accordMemb = 1) {
                $pass1Memb = ($_POST['pass1Memb']);
                $created = true;
                $monMembre->create($prenomMemb, $nomMemb, $pseudoMemb, $eMail1Memb, $dtCreaMemb, $pass1Memb, $souvenirMemb, $accordMemb, $idStat);
                header("Location: ./membre.php");
            } 
        }
    }
}

include __DIR__ . '/initMembre.php'

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Membre</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body{
        color: #000; 
        padding: 20px;
    }
    .champ-obligatoire{
        background: none; 
        color: red; 
    }
    .italic{
        white-space: nowrap; 
    }
    </style>
</head>

<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Membre</h1>
    <h2>Ajout d'un Membre</h2>
<?
    if ($created) {
        echo '<p style="color:green;">Le membre "' . $_POST['pseudoMemb'] . '" a été créé.</p>';
    }
?>
    <br>
    <form method="post" action=".\createMembre.php" enctype="multipart/form-data">
        <fieldset>
        <legend class="legend1">Créer un membre...</legend>
            <div class="control-group">
                <label class='control-label'>Prénom:</label>
                <span class='champ-obligatoire'>*</span>
                <br>
                <input pattern="^[A-Za-z]{2,70}$" type="text" name="prenomMemb" placeholder="Prénom" >
                <br>
                <br>
                <label>Nom:</label>
                <span class='champ-obligatoire'>*</span>
                <br>
                <input pattern="^[A-Za-z]{2,70}$" type="text" name="nomMemb" placeholder="Nom" >
                <br> 
                <br>
                <label>Pseudo: (entre 7 et 70 caractères)</label>
                <span class='champ-obligatoire'>*</span>
                <br>
                <input pattern="^[\w\.](' ')?([\w\.])?{7,70}$" type="text" name="pseudoMemb" placeholder="Pseudo" minlength='7' maxlength = '70' >
                <br>
                <br>
                <label>Email:</label>
                <span class='champ-obligatoire'>*</span>
                <br>
                <input type="email" name="eMail1Memb" placeholder="Email" >
                <br>
                <br>
                <label>Confirmation e-mail:</label>
                <span class='champ-obligatoire'>*</span>
                <br>
                <input type="email" name="eMail2Memb" placeholder="Confirmation e-mail" >
                <br>
                <br>
                <label>Mot de passe:
                <span class='champ-obligatoire'>*</span>
                <i class ='italic'>(Au minimum un chiffre, une majuscule et une minuscule (8 caractères minimum)</i>
                </label>
                <br>
                <input pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" type="password" name="pass1Memb" placeholder="Mot de passe" minlength='8' maxlength='100' >
                <br>
                <br>
                <label>Confirmer votre mot de passe:</label>
                <span class='champ-obligatoire'>*</span>
                <br>
                <input pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" type="password" name="pass2Memb" placeholder="Mot de passe" minlength='8' maxlength='100' >
                <br>
                <br>
                <input id='souvenir' type="checkbox" tabindex="0" name="souvenirMemb">
                <label for='souvenir'>Se souvenir de moi</label>
                <br>
                <br>
                <input id='condition' type="checkbox" tabindex="0" name="accordMemb" >
                <label for='condition'>J'accepte les conditions d'utilisations            
                <span class='champ-obligatoire'>*</span>
                </label>
            </div>
            <br>
            <label for='statut'>Choisisez le statut:</label>
            <select id="statut" name="statut"  onchange="select()">
                    <option value="" selected disabled hidden>Sélectionner un statut</option>
                    <?php 
                    global $db;
                    $requete = 'SELECT * FROM STATUT ;';
                    $result = $db->query($requete);
                    $allStatut = $result->fetchAll();
                    foreach ($allStatut AS $row)
                    {
                    ?>
                    <option value="<?php echo $row['idStat'];?>"><?php echo $row['libStat'];?></option>
                    <?php
                }
                ?>
            </select>
            <br>
            <br>
            <div class="champ-obligatoire">(*) Champs obligatoires</div>
            <br>
            <input class='btn btn-primary' value ='Annuler' type="submit" name='Annuler'/>
            <input class='btn btn-success'value='Valider' type="submit" name='Valider'/>   
        </fieldset>
    </form>
    <?php
    require_once __DIR__ . '/footerMembre.php';

    require_once __DIR__ . '/footer.php';
    ?>
</body>
</html>