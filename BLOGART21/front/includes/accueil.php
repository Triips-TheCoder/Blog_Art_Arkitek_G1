<div class="container_accueil">
    <div class="column_vide">

    </div>
    <div>
        <img id="profil" src="../_assets/IMG/INTENDANT ACCUEIL.png" alt="L'intendant">
    </div>

    <div class="column_vide Chiffre_column">
        <div class="chiffres">
            <a href="">1</a>
            <a href="">2</a>
            <a href="">3</a>

        </div>
    </div>

</div>
<script>
    let swipe = false;
    let x = 0;
    let y = 0;
    const profil = document.getElementById('profil');


    profil.addEventListener('mousedown', e => {
        swipe = true;

    })
    profil.addEventListener('mousemove', e => {


        if (swipe === true) {
            profil.classList.add('swipeUp')
        }

    })
</script>