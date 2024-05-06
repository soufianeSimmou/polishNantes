<body
    style="background: rgb(31,31,31);background: linear-gradient(252deg, rgba(0,0,0,1) 66%, rgba(96,1,74,1) 100%);height: 80vh bg-no-repeat ">
    <?php
    include_once '../../classe/manager_rdv.php';
    include_once '../../classe/user_manager.php';
    include_once '../../classe/rendez-vous.php';
    $manager = new manager_rdv($bd);
    $manager->terminer_rdv_automatique();



    ?>
    <div class="xl:grid  xl:grid-cols-4  xl:grid-rows-1 h-auto  lg:mx-44  gap-14 mt-28">


        <div class=" col-span-1 w-full h-96">

            <div class="grid grid-cols-1 w-full text-white gap-0 my-14  ">
                <?php echo '<div class="text-5xl pb-20 sm:mb-px text-center xl:text-left"> admin ' . $_SESSION['nom'] . '    </div>' ?>
                <a class="fancy ml-auto w-full menu mt-6 mx-14  xl:mt-16 !important" >

                    <span class="top-key"></span>
                    <span class="text">consulter les rendez-vous</span>
                    <span class="bottom-key-1"></span>
                    <span class="bottom-key-2"></span>
                </a>
                <a class="fancy ml-auto w-full menu mt-2 !important xl:mt-16 !important">
                    <span class="top-key"></span>
                    <span class="text">historique de tout les rendez-vous terminer via le site web</span>
                    <span class="bottom-key-1"></span>
                    <span class="bottom-key-2"></span>
                </a>
                <a class="fancy ml-auto w-full menu mt-2 !important xl:mt-16 !important">
                    <span class="top-key"></span>
                    <span class="text">Deconnexion</span>
                    <span class="bottom-key-1"></span>
                    <span class="bottom-key-2"></span>
                </a>

            </div>

        </div>

        <div class="  col-span-3 w-full    containerr  xl:mx-14" id="rdv_statue">

            <div class="flex flex-col items-center justify-center mx-14 mt-20 xl:mt-44 ">
                <div class="text-white col-span-2 text-center text-lg h-24 py-4 mb-20 sm:mb-px"> CONSULTER LES RENDEZ-VOUS !
                    VOIR, SUPPRIMER, METTRE AU POINT ETC...</div>
                <div class="grid grid-cols-1  place-content-center w-full   items-center gap-5 flex flex-col items-center justify-center"
                    style="height: auto">

                    <?php
                    $resultats = $manager->voir_rdvadmin();
                    foreach ($resultats as $voir) {
                        if ($resultats) {
                            echo $voir;
                        }

                    }
                    ?>

                </div>
            </div>
        </div>
        <div class="  col-span-3 w-screen sm:w-full    containerr  xl:mx-14" id="rdv_historique">
            <div class="flex flex-col items-center justify-center mx-14 mt-20 xl:mt-44 ">
                <div class="text-white col-span-2 text-center text-lg h-24 py-4"> HISTORIQUE DES RENDEZ VOUS TERMINER !
                </div>
                <div class="grid grid-cols-1  place-content-center w-full   items-center gap-5 flex flex-col items-center justify-center"
                    style="height: auto">

                    <?php
                    $resultats = $manager->voir_rdvadmin_terminer();
                    foreach ($resultats as $voir) {
                        if ($resultats) {
                            echo $voir;
                        }

                    }
                    ?>

                </div>

            </div>
        </div>



    </div>

    <?php
    if (isset($_POST['modifier_dh'])) {

        $heure = $_POST["heure"];
        $date = $_POST["date"];
        $idRendezVous = $_POST["data_id"];
        $rdv = new manager_rdv($bd);
        $rdv->modifier_admin_rdv($idRendezVous, $date, $heure);
        echo '<meta http-equiv="refresh" content="0;url=../page/admin_pad.php">';
        exit();
    }



    ?>

</body>
<script src="../../js/rendez-vous/calandrier.js"></script>
<script src="../../js/rendez-vous/prise_rdvadmin.js"></script>