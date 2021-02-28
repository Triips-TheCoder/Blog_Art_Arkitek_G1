<div class="bigContainer_cookiePop">

<div class="overlay-cook"></div>
<div class="container_cookiePop">
<p> Nous utilisons les cookies pour nous permettre de vous offrir la meilleure expérience. En continuant à naviguer sur ce site, vous acceptez nos cookies en accord avec notre politique 
    <a id="ESP" href="#"> En savoir plus</a></p>
<div class=container_button_cookiePop>
<a id="accepter_cookiePop" class="accepter" href="#">Accepter</a>
<a id="fermer_cookiePop" class="decliner" href="#">Fermer</a>
</div>
</div>


</div>
<script>
    document.cookie = ""; ;


if (document.cookie == "0" ) {
   
    document.getElementById("accueil_page").classList.remove('blur');
    document.getElementById("cookiePop").classList.add('is-gone');
}
if (document.cookie == "1" ) {
   
   document.getElementById("accueil_page").classList.remove('blur');
   document.getElementById("cookiePop").classList.add('is-gone');
}
     document.getElementById("accepter_cookiePop").addEventListener("click", function() {
                {
                    
                    document.cookie = "1";
                    document.getElementById("cookiePop").classList.add('is-gone');
                    document.getElementById("accueil_page").classList.remove('blur');

                }
            });
            document.getElementById("fermer_cookiePop").addEventListener("click", function() {
                {
                    document.cookie = "0";
                    document.getElementById("cookiePop").classList.add('is-gone');
                    document.getElementById("accueil_page").classList.remove('blur');
                }
            });
            document.getElementById("ESP").addEventListener("click", function() {
                {
                    document.getElementById("cookie_page").classList.add('is-active');
                    document.getElementById("cookie_page").classList.remove('is-gone');
                }
            });
</script>