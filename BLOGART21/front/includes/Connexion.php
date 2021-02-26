    <div class="column_sign ">
        <div class="column_left_sign">
            <img class="bg_sign" src="../_assets/IMG/P1188213.jpg" alt="">
        </div>
        <div class="column_right_sign">
            <div class="box_croix_sign">
                <div class="croix_sign">
                    <a href="#"><img id="fermer_connexion" class="croix_sign_img" src="../_assets/IMG/cancel.png" alt="Fermer"></a>
                </div>
            </div>
            <div class="box_title_sign">
                <p class="titre_sign"> Hello,</p>
                <p class="sous_titre_sign">Ravis de te revoir !</p>
            </div>
            <div class="deja_inscrit">
                <a id="connexionVersinscription" href="#">
                <p>Pas encore inscrit ?</p>
            </div></a>

            <div class="box_formulaire_signup">
                <form style="padding-top:10vh;" action="" method="post" enctype="multipart/form-data">

                    <p>E-mail</p>
                    <input class="champs" type="email" name="email2Memb" placeholder="E-mail" size="20" required />
                    <p>Mot de passe</p>
                    <input class="champs" type="password" name="passMemb" placeholder="Mot de passe" autocomplete="new-password" minlength="7" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>


                    <div class="checkbox_sign">


                        <div class="remember">
                            <div class="check">
                                <input type="checkbox" id="checkbox" name="souvenirMemb">
                                <label for="remember">Se souvenir de moi<label>
                            </div>

                        </div>


                    </div>

                    <div class="connect"><input type="submit" value="Connexion" /></div>


                </form>


            </div>
        </div>
    </div>
    <script>
        document.getElementById("fermer_connexion").addEventListener("click", function() {
            {
                document.getElementById("connexion_page").classList.add('is-gone');
                document.getElementById("connexion_page").classList.remove('is-active');
            }
        })

        document.getElementById("connexionVersinscription").addEventListener("click", function() {
            {   
                document.getElementById("accueil_page").classList.add('is-gone');

                document.getElementById("connexion_page").classList.remove('is-active');
                document.getElementById("connexion_page").classList.add('is-gone');
                document.getElementById("inscription_page").classList.remove('is-gone');
                document.getElementById("inscription_page").classList.add('is-active');
            }
        })
    </script>