    <div class="ContainerFooter">
        <div class="Newsletter">
            <div class="TitreNewsletter"> Tu es intéressé(e) par d'autres profils ?</div>
            <div class="AccrocheNewsletter"> Ne passe pas à côté du grand amour, inscris toi à notre newsletter pour
                être averti(e) des nouveaux profils !</div>


            <form class="ChampNewsletter" action="action.php ">
               
                    <input type="email" placeholder="Écris ton mail ici...">
                    <img class="LettreEnvoi" src="../../_assets/IMG/icons8-envoi-de-courriel-80.png" alt="envoyer">
                
            </form>


            <div class="DroitNewsletter "> En soumettant ce formulaire, j’accepte que mes informations soient utilisées
                exclusivement dans le cadre de <br>
                ma demande et de la relation commerciale éthique et personnalisée qui pourrait en découler si je le
                souhaite.</div>

        </div>

        <hr>

        <div class="Footer">
            <a href="#"><img src="../../_assets/IMG/LOGO AK BLANC.png" alt="Logo arkitek" /></a>
            <a href="#">Accueil</a>
            <a id="MLbutton" href="#">Mentions légales</a>
            <a id="CguButton" href="#">CGU</a>
            <a href="https://www.instagram.com/arkitekbordeaux/">Nous contacter</a>
            <div class="InstagramFooter">
            <a class="FooterInstaLogo" href="https://www.instagram.com/arkitekbordeaux/"><img src="../../_assets/IMG/Instagram logo.svg" alt="Instagram" /></a>
                <a href="https://www.instagram.com/arkitekbordeaux/">ArkitekBordeaux</a>
            </div>

        </div>





    </div>
    <script>
         document.getElementById("CguButton").addEventListener("click", function() {
                {
                    document.getElementById("cgu_page").classList.remove('is-gone');
                    document.getElementById("cgu_page").classList.add('is-active');
                }
            });
            document.getElementById("MLbutton").addEventListener("click", function() {
                {
                    document.getElementById("mention_legales").classList.remove('is-gone');
                    document.getElementById("mention_legales").classList.add('is-active');
                }
            });
            
    </script>
</body>

</html>