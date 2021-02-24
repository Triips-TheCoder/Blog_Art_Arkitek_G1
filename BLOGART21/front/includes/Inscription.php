    <div class="column_sign ">
        <div class="column_left_sign">
            <img class="bg_sign" src="/_assets/IMG/P1188213.jpg" alt="">
        </div>
        <div class="column_right_sign">
            <div class="box_croix_sign">
                <div class="croix_sign">
                    <a  href="#"><img id="fermer_inscription" class="croix_sign_img" src="/_assets/IMG/cancel.png" alt="Fermer"></a>
                </div>
            </div>
            <div class="box_title_sign">
                <p class="titre_sign"> Hello,</p>
                <p class="sous_titre_sign">Ravis de te rencontrer !</p>    
            </div>
            <div class="deja_inscrit">
                <a href=""><p>Déja inscrit ?</p></div></a>
           
                <div class="box_formulaire_signup">
                <form action="../../back/membre/createMembre.php" method="post" enctype="multipart/form-data">
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
                    <input class="champs" type="email" name="email2Memb" placeholder="E-mail" size="20" required/>
                    <p>Mot de passe</p>
                    <input  class="champs" type="password" name="passMemb" placeholder="Mot de passe" autocomplete="new-password" minlength="7" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                    <label class="required_caracter" for="condition_password">Doit contenir au moins 7 caractères dont 1 lettre majuscule, 1  minuscule et 1 chiffre</label>
                    <p>Confirmer le mot de passe</p>
                    <input  class="champs" type="password" name="confirm_password" placeholder="Mot de passe" minlength="7" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                     
                
                    <div class="checkbox_sign">
              
                
                <div class="remember">     
                   <div class="check">
                <input type="checkbox" id="checkbox" name="souvenirMemb">
                <label for="remember">Se souvenir de moi<label>
                </div>    
                  
                </div>  

                <div>
                <input type="checkbox" id="checkbox" name="accordMemb">                        
                <label for="CGU">J'ai lu et j'accepte les <a href="">Conditions Générales d'Utilisation</a><label>
                </div> 
                     

             </div>
                  
                <div class="connect"><input  type="submit" value="Connect" /></div>

   
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
    </script>
    
  