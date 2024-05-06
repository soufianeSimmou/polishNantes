<body>

    <?php
    ob_start();

    ?>
    <div class="w-full h-full hidden absolute z-40" id="menu_phone" style="background: rgb(31,31,31);
    background: linear-gradient(223deg, rgb(0 0 0) 10%, rgba(96,1,74,1) 100%);margin-top: -7vh;    height: 135vh;">
       
        <?php
                if (isset($_SESSION['id_client']) ) {
                    echo '<div class="grid grid-cols-1 grid-rows-11 place-items-center h-96 text-white ml-auto ms-14 me-14 mt-40 " id="grid_nav_enTete_deux">';
                    echo '  <a class="text-white text-2xl" href="rendez_vous.php">COMPTE</a>';
                    echo '  <div class="w-full h-px bg-pink-500 m-6 z-50"></div>';
                    echo '<a class="text-white text-2xl" href="rendez_vous.php">RENDEZ VOUS</a>';
                    echo '  <div class="w-full h-px bg-pink-500 m-6 z-50"></div>';
                    echo '<a class="text-white text-2xl" href="index.php">ACCUEIL</a>';
                    echo '  <div class="w-full h-px bg-pink-500 m-6 z-50"></div>';
                    echo '<a class="text-white text-2xl" href="CONTACT.php">CONTACT</a>';
                    echo '  <div class="w-full h-px bg-pink-500 m-6 z-50"></div>';
                    echo '<a class="text-white text-2xl" href="A PROPOS.php">A PROPOS</a>';
                    echo '</div>';
                } 
                else if (isset($_SESSION['id_admin']) ) {
                    echo '<div class="grid grid-cols-1 grid-rows-11 place-items-center h-96 text-white ml-auto ms-14 me-14 mt-40 " id="grid_nav_enTete_deux">';
                    echo '  <a class="text-white text-2xl" href="admin_pad.php">ADMIN</a>';
                    echo '  <div class="w-full h-px bg-pink-500 m-6 z-50"></div>';
                    echo '<a class="text-white text-2xl" href="index.php">ACCUEIL</a>';
                    echo '  <div class="w-full h-px bg-pink-500 m-6 z-50"></div>';
                    echo '<a class="text-white text-2xl" href="CONTACT.php">CONTACT</a>';
                    echo '  <div class="w-full h-px bg-pink-500 m-6 z-50"></div>';
                    echo '<a class="text-white text-2xl" href="A PROPOS.php">A PROPOS</a>';
                    echo '</div>';

                } else {
                
                    echo '<div class="grid grid-cols-1 grid-rows-11 place-items-center h-96 text-white ml-auto ms-14 me-14 mt-40 " id="grid_nav_enTete_deux">';
                    echo '<a class="text-white text-2xl" href="inscription.php">INSCRIPTION</a>';
                    echo '  <div class="w-full h-px bg-pink-500 m-6 z-50"></div>';
                    echo '<a class="text-white text-2xl" href="connexion.php">CONNEXION</a>';
                    echo '  <div class="w-full h-px bg-pink-500 m-6 z-50"></div>';
                    echo '<a class="text-white text-2xl" href="index.php">ACCUEIL</a>';
                    echo '  <div class="w-full h-px bg-pink-500 m-6 z-50"></div>';
                    echo '<a class="text-white text-2xl" href="CONTACT.php">CONTACT</a>';
                    echo '  <div class="w-full h-px bg-pink-500 m-6 z-50"></div>';
                    echo '<a class="text-white text-2xl" href="A PROPOS.php">A PROPOS</a>';
                    echo '</div>';

                }
                ?>
    </div>
    <div class="absolute fondnav w-full h-44"></div>
    <nav class=" h-44" id="nav_enTete">
        <div class="grid grid-cols-3 grid-rows-1 place-items-center text-white" id="grid_nav_enTete">
            <div class="place-self-start flex items-center self-center">
                <span>  Appelez-nous 01 23 45 67 89</span>
            </div>
            <div id="time-container">

            </div>
            <?php
            if (isset($_SESSION['id_client'])) {
                echo '<div class="flex items-center place-self-end grid_deux_entete">
                <img src="../../ImageVideo/entete/login.png" alt="" class="mr-2" width="35">
                <a href="../module/destroy_session.php" class="no-underline">Deconnexion</a>
              </div>';
              
            } 
            else if (isset($_SESSION['id_admin'])) {
                echo '<div class="flex items-center place-self-end grid_deux_entete">
                <img src="../../ImageVideo/entete/login.png" alt="" class="mr-2" width="35">
                <a href="../module/destroy_session.php" class="no-underline">Deconnexion</a>
              </div>';
              
            }else {
               
              echo '<div class="flex items-center place-self-end grid_deux_entete">
              <img src="../../ImageVideo/entete/login.png" alt="" class="mr-2" width="35">
              <a href="connexion.php" class="no-underline">Connexion</a>
            </div>';
            }
            ?>

            <label class="hamburger z-50 lg:hidden" id="burger">
                <input type="checkbox">
                <svg viewBox="0 0 32 32">
                    <path class="line line-top-bottom"
                        d="M27 10 13 10C10.8 10 9 8.2 9 6 9 3.5 10.8 2 13 2 15.2 2 17 3.8 17 6L17 26C17 28.2 18.8 30 21 30 23.2 30 25 28.2 25 26 25 23.8 23.2 22 21 22L7 22">
                    </path>
                    <path class="line" d="M7 16 27 16"></path>
                </svg>
            </label>
        </div>
        <div class="w-90 h-px bg-pink-500 m-6"></div>
        <div class="flex grid_deux_entete">
            <div class="flex items-center text-white">
                <img src="../../ImageVideo/entete/logo.png" alt="" width="70">
                <span class="text-cyan-500">POLISH</span>
                <span class="text-pink-500">NANTES</span>
            </div>
            
                <?php
                if (isset($_SESSION['id_client']) ) {
                    echo '<div class="grid grid-cols-7 grid-rows-1 place-items-center text-white ml-auto" id="grid_nav_enTete_deux">';
                    echo '<a class="text-white" href="rendez_vous.php">Compte</a>';
                    echo '<a class="text-white" href="rendez_vous.php">Rendez-vous</a>';
                    echo '<a class="text-white" href="index.php">Accueil</a>';
                    echo '<a class="text-white" href="#fond_formule">Offre</a>';
                    echo '<a class="text-white" href="CONTACT.php">Contact</a>';
                    echo '<a class="text-white" href="A PROPOS.php">A propos</a>';

                } 
                else if (isset($_SESSION['id_admin']) ) {
                    echo '<div class="grid grid-cols-7 grid-rows-1 place-items-center text-white ml-auto" id="grid_nav_enTete_deux">';
                    echo '<a class="text-white" href="admin_pad.php">admin</a>';
                    echo '<a class="text-white" href="index.php">Accueil</a>';
                    echo '<a class="text-white" href="#fond_formule">Offre</a>';
                    echo '<a class="text-white" href="CONTACT.php">Contact</a>';
                    echo '<a class="text-white" href="A PROPOS.php">A propos</a>';

                } else {
                
                    echo '<div class="grid grid-cols-4 grid-rows-1 place-items-center text-white ml-auto" id="grid_nav_enTete_deux">';
                    echo '<a class="text-white" href="index.php">Accueil</a>';
                    echo '<a class="text-white" href="#fond_formule">Offre</a>';
                    echo '<a class="text-white" href="CONTACT.php">Contact</a>';
                    echo '<a class="text-white" href="A PROPOS.php">A propos</a>';
                }
                ?>

            </div>
        </div>



    </nav>




    <script src="../../js/entete/entete.js"></script>
    <script>
        function getCurrentTime() {
            // Créer un nouvel objet Date
            var now = new Date();

            // Obtenir l'heure actuelle au format "HH:mm"
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');

            // Mettre à jour le contenu de la page avec l'heure actuelle
            document.getElementById('time-container').innerHTML = hours + ':' + minutes;
        }

        // Mettre à jour l'heure toutes les secondes
        setInterval(getCurrentTime, 1000);

        // Appeler getCurrentTime une fois au chargement de la page
        getCurrentTime();
    </script>

    <?php
    ob_end_flush();
    ?>