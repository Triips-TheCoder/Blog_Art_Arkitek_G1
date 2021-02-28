<div class="container_accueil">
    <div class="column_vide explain_column">
        <div class="explain">
            <a href=""><img src="../_assets/IMG/icons8-flèche-haut-90-2.png" alt=""></a>
            
            <p> Swipe vers le bas si je te plais </p>
            
        </div>
       
    </div>

    <div style="width: 30%; height: 100%;" id="container_intendant" class="">
        <div class="intendant profil1">
            <img id="intendant_img" src="../_assets/IMG/INTENDANT ACCUEIL.png" alt="L'intendant">
            <img class="is-gone" id="meca_img" src="../_assets/IMG/MECA.png" alt="La MECA">
            <img class="is-gone" id="bordeaux_img" src="../_assets/IMG/Frank OCean.jpg" alt="La MECA">

        </div>
    </div>






    <div class="column_vide Chiffre_column">
        <div class="chiffres">
            <a id="button_int" href="#">1</a>
            <a id="button_mec" href="#">2</a>
            <a id="button_bor" href="#">3</a>
           </div>
           <hr>
           <p> Visualiser un article</p>
    </div>

</div>



<script>
    let swipe1 = false;
    let swipe2 = false;
    let swipe3 = false;


    const button_int = document.getElementById('button_int');
    const button_mec = document.getElementById('button_mec');
    const button_bor = document.getElementById('button_bor');


    const intendant_img = document.getElementById('intendant_img');
    const meca_img = document.getElementById('meca_img');
    const bordeaux_img = document.getElementById('bordeaux_img');

    button_int.addEventListener('click', function() {
        meca_img.classList.add('swipeUp');
        bordeaux_img.classList.add('swipeUp');
        setTimeout(function() {

            meca_img.classList.add('is-gone');
            bordeaux_img.classList.add('is-gone');
            intendant_img.classList.add('is-here')
            intendant_img.classList.remove('is-gone')

            meca_img.classList.remove('swipeUp', 'is-here');
            bordeaux_img.classList.remove('swipeUp', 'is-here');

        }, 800);
    })


    button_mec.addEventListener('click', function() {
        intendant_img.classList.add('swipeUp');
        bordeaux_img.classList.add('swipeUp');
        setTimeout(function() {

           
            meca_img.classList.add('is-here')
            meca_img.classList.remove('is-gone')
            
            intendant_img.classList.add('is-gone');
            bordeaux_img.classList.add('is-gone');

            intendant_img.classList.remove('swipeUp', 'is-here');
            bordeaux_img.classList.remove('swipeUp', 'is-here');

        }, 800);
    })

    button_bor.addEventListener('click', function() {
        intendant_img.classList.add('swipeUp');
        meca_img.classList.add('swipeUp');
        setTimeout(function() {


            bordeaux_img.classList.add('is-here')
            bordeaux_img.classList.remove('is-gone')
            
            intendant_img.classList.add('is-gone');
            meca_img.classList.add('is-gone');
            meca_img.classList.remove('swipeUp', 'is-here');
            intendant_img.classList.remove('swipeUp', 'is-here');

        }, 800);
    })



    intendant_img.addEventListener('mousedown', function() {
        swipe1 = true;
    })
    intendant_img.addEventListener('mousemove', function() {
        if (swipe1 === true) {
            intendant_img.classList.add('swipeDown');
            setTimeout(function() {

                document.getElementById('accueil_page').classList.add('is-gone');
                
                document.getElementById('footer_page').classList.remove('is-gone');
                

            }, 500);

        }
    })

    meca_img.addEventListener('mousedown', function() {
        swipe1 = true;
    })
   meca_img.addEventListener('mousemove', function() {
        if (swipe1 === true) {
            meca_img.classList.add('swipeDown');
            setTimeout(function() {

                document.getElementById('accueil_page').classList.add('is-gone');
                
                document.getElementById('footer_page').classList.remove('is-gone');
                

            }, 500);

        }
    })
    bordeaux_img.addEventListener('mousedown', function() {
        swipe1 = true;
    })
  bordeaux_img.addEventListener('mousemove', function() {
        if (swipe1 === true) {
            bordeaux_img.classList.add('swipeDown');
            setTimeout(function() {

                document.getElementById('accueil_page').classList.add('is-gone');
                
                document.getElementById('footer_page').classList.remove('is-gone');
                

            }, 500);

        }
    })
</script>