<body>

   
    <?php

if (isset($_SESSION['id_client'])) {
    echo' <div class="text-white  " id="titre_Accueil">';
    echo '<div class="flex flex-col items-center justify-center">';
        echo '<h2 class="lg:text-5xl sm:text-2xl" id="titre2"> Bonjour, ' . $_SESSION['nom'] . ' ' . $_SESSION['prenom'] . ' </h2> <br>';
    
    echo '<h1 class="lg:text-7xl text-center" id="titre"> Prenez Rendez-vous pour Révélez la Beauté Cachée de Votre Auto</h1>';
    echo '<a class="fancy" href="rendez_vous.php">';
    echo '    <span class="top-key"></span>';
    echo '    <span class="text">Prendre rendez-vous </span>';
    echo '    <span class="bottom-key-1"></span>';
    echo '    <span class="bottom-key-2"></span>';
    echo '</a>';
    echo '</div>';
} 
 else if (isset($_SESSION['id_admin'])) {
    echo' <div class="text-white  " id="titre_Accueil">';
    echo '<div class="flex flex-col items-center justify-center">';
        echo '<h2 class="lg:text-5xl sm:text-2xl" id="titre2"> Bonjour, ' . $_SESSION['nom'] . ' ' . $_SESSION['prenom'] . ' </h2> <br>';
    
    echo '<h1 class="lg:text-7xl text-center" id="titre">consulte les rendez-vous disponible des clients</h1>';
    echo '<a class="fancy" href="admin_pad.php">';
    echo '    <span class="top-key"></span>';
    echo '    <span class="text">gérer ses rendez-vous </span>';
    echo '    <span class="bottom-key-1"></span>';
    echo '    <span class="bottom-key-2"></span>';
    echo '</a>';
    echo '</div>';
}else {
    echo' <div class="text-white " id="titre_Accueil">';
    echo '<h2 class="lg:text-4xl hidden sm:block" id="titre2">La splendeur de votre voiture, notre fierté.</h2><br>';
    echo '<h1 class="lg:text-7xl text-5xl" id="titre"> Polissage Expert : Révélez la Beauté Cachée de Votre Auto </h1>';
    echo '<a class="fancy" href="inscription.php">';
    echo '    <span class="top-key"></span>';
    echo '    <span class="text">Commencer</span>';
    echo '    <span class="bottom-key-1"></span>';
    echo '    <span class="bottom-key-2"></span>';
    echo '</a>';
}
?>



        <div class="grid lg:grid-cols-3 lg:grid-rows-1 sm:grid-cols-1 ms:grid-rows-3 lg:place-items-center text-white ml-auto gap-y-20 lg:text-xl" id="grid_formule_titre">
            <div class="flex offreRapide">

                <div class="loader place-self-center ">
                    <svg viewBox="0 0 80 80">
                        <circle r="32" cy="40" cx="40" id="test"></circle>
                    </svg>
                </div>
                <div class="barre"></div>
                <div class="  flex flex-col place-self-center test ">
                    <span class="text-xl">Formule 1</span>
                    <span>Lustrage</span>
                </div>

            </div>
            <div class="flex offreRapide">


                <div class="loader triangle place-self-center ">
                    <svg viewBox="0 0 86 80">
                        <polygon points="43 8 79 72 7 72"></polygon>
                    </svg>
                </div>
                <div class="barre"></div>
                <div class=" flex flex-col place-self-center  test">
                    <span>Formule 2</span>
                    <span>Polissage, Traitement rayure & Lustrage</span>
                </div>

            </div>

            <div class="flex offreRapide">
                <div class="loader place-self-center  ">
                    <svg viewBox="0 0 80 80">
                        <rect height="64" width="64" y="8" x="8"></rect>
                    </svg>
                </div>
                <div class="barre"></div>
                <div class="flex flex-col place-self-center  test">
                    <span>Formule 3</span>
                    <span>Polissage, Traitement rayure, Lustrage & Rénovation phare</span>
                </div>

            </div>

        </div>







    </div>
</body>