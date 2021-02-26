    <?php
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '../../../CLASS_CRUD/membre.class.php';
// require_once __DIR__ . '/ctrlSaisies.php';

$monMembre = new MEMBRE;

$passOk = 0; 
$emailOk = 0;

function ctrlSaisies($saisie){

    // Convertion caractères spéciaux en entités HTML => peu performant
    // Préférer htmlentities()
    $saisie = htmlspecialchars($saisie);
    // Suppression des espaces (ou d'autres caractères) en début et fin de chaîne
    $saisie = trim($saisie);
    // Suppression des antislashs d'une chaîne
    $saisie = stripslashes($saisie);
    // Conversion des caractères spéciaux en entités HTML
    $saisie = htmlentities($saisie);

    return $saisie;
  }

  echo "toto 1";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';
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
    echo"toto2";
    echo $_POST['prenomMemb'] . $_POST['nomMemb'] . $_POST['pseudoMemb'] . 
    $_POST['eMail1Memb'] . $_POST['pass1Memb'] . $_POST['pass2Memb'] . $_POST['souvenirMemb'] . $_POST['accordMemb'];

    if(!empty($_POST['prenomMemb']) && !empty($_POST['nomMemb']) 
    && !empty($_POST['pseudoMemb']) && !empty($_POST['eMail1Memb']) 
    && !empty($_POST['pass1Memb']) && !empty($_POST['pass2Memb'])
    && !empty($_POST['souvenirMemb']) && !empty($_POST['accordMemb'])){
            $prenomMemb = ctrlSaisies($_POST['prenomMemb']);
            $nomMemb = ctrlSaisies($_POST['nomMemb']);
            $pseudoMemb = ctrlSaisies($_POST['pseudoMemb']);
            $pass1Memb = ctrlSaisies($_POST['pass1Memb']);
            $pass2Memb = ctrlSaisies($_POST['pass2Memb']);
            $eMail1Memb = ctrlSaisies($_POST['eMail1Memb']);
            $dtCreaMemb = date("Y-m-d-H-i-s");
            $ctrlSouvenirMemb = ctrlSaisies($_POST['souvenirMemb']);
            $ctrlAccordMemb = ctrlSaisies($_POST['accordMemb']);
            $pseudoExist = $monMembre->get_ExistPseudo($pseudoMemb);
            echo"toto3";
            if ($pseudoExist == 0){
                $errMessage = '';
                $pseudoOk = 1;
            } else{
                echo "<h3 style='color: red;'>Ce pseudo existe déja !</h3>"; 
                $pseudoOk = 0; 
            }
            if (filter_var($eMail1Memb, FILTER_VALIDATE_EMAIL)){
                $errMail = ""; 
                $emailOk = 1;
            } else {
                echo "<h3 style='color: red;'>Le format du mail n'est pas valide !</h3>";
            }
            if (($pass1Memb === $pass2Memb)){
                $passOk = 1; 
                $errMessage = ""; 
            }  else{
                echo "<h3 style='color: red;'>Les mots de passe ne correspondent pas!</h3>";
 
            }
            
            if ($prenomMemb != "" && $nomMemb != "" && $emailOk == 1 && $passOk == 1 && $pseudoOk == 1 && $accordMemb == 1) {
               try { $pass1Memb = ($_POST['pass1Memb']);
                $idStat = 1;
                $monMembre->create($prenomMemb, $nomMemb, $pseudoMemb, $eMail1Memb, $dtCreaMemb, $pass1Memb, $souvenirMemb, $accordMemb, $idStat);
                header("Location: front\_site\default.html");
            } catch (Exception $e) {

            }
            die('Echec envoi BLOGART : ' . $e->getMessage());
            } 
        
    }
}
include __DIR__ . '/../../back/membre/initMembre.php'
    ?>



    <div class="column_sign ">
        <div class="column_left_sign">
            <img class="bg_sign" src="../_assets/IMG/P1188213.jpg" alt="">
        </div>
        <div class="column_right_sign">
            <div class="box_croix_sign">
                <div class="croix_sign">
                    <a  href="#"><img id="fermer_inscription" class="croix_sign_img" src="../_assets/IMG/cancel.png" alt="Fermer"></a>
                </div>
            </div>

            <div class="box_title_sign">
                <p class="titre_sign"> Hello,</p>
                <p class="sous_titre_sign">Ravis de te rencontrer !</p>    
            </div>
            <div class="deja_inscrit">
               
            <a id="inscriptionVersconnexion" href="#"><p>Déja inscrit ?</p>
            
            </div></a>
           
                <div class="box_formulaire_signup">
                <form action="" method="POST">
                    <div class="nom_prenom_sign">
                    <div class="nom_sign"><p>Nom</p>
                    <input  type="text" name="nomMemb" placeholder="Nom" size="15" required/>
                    </div>
                    <div class="prenom_sign">
                     <p>Prénom</p>
                    <input type="text" name="prenomMemb" placeholder="Prénom" size="15" required/>
                   </div>
                </div> 
                <p>Pseudo</p>
                <input class="champs" type="text" name="pseudoMemb" placeholder="Pseudo" size="20" required/>
                   <p>E-mail</p>
                    <input class="champs" type="email" name="eMail1Memb" placeholder="E-mail" size="20" required/>
                    <p>Mot de passe</p>
                    <input  class="champs" type="password" name="pass1Memb" placeholder="Mot de passe" autocomplete="new-password" minlength="7" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                    <label class="required_caracter" for="condition_password">Doit contenir au moins 7 caractères dont 1 lettre majuscule, 1  minuscule et 1 chiffre</label>
                    <p>Confirmer le mot de passe</p>
                    <input  class="champs" type="password" name="pass2Memb" placeholder="Mot de passe" minlength="7" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                
                    <div class="checkbox_sign">
              
                
                <div class="remember">     
                   <div class="check">
                <input type="checkbox" id="checkbox" name="souvenirMemb">
                <label for="remember">Se souvenir de moi</label>
                </div>    
                  
                </div>  

                <div>
                <input type="checkbox" id="checkbox" name="accordMemb">                        
                <label for="CGU">J'ai lu et j'accepte les <a href="">Conditions Générales d'Utilisation</a><label>
                </div> 
                     

             </div>
                  
                <div class="connect"><input  name="Submit" type="submit" value="Connexion" /></div>

   
                </form>
               

            </div>
        </div>
    </div>
    <script>
         document.getElementById("fermer_inscription").addEventListener("click", function() {
                {
                    document.getElementById("inscription_page").classList.add('is-gone');
                    document.getElementById("inscription_page").classList.remove('is-active');
                }
            }); 
                document.getElementById("inscriptionVersconnexion").addEventListener("click", function() {
            { 
                document.getElementById("inscription_page").classList.remove('is-active');
                document.getElementById("inscription_page").classList.add('is-gone');
                document.getElementById("connexion_page").classList.remove('is-gone');
                document.getElementById("connexion_page").classList.add('is-active');
            }

            }); 
    </script>
    
  