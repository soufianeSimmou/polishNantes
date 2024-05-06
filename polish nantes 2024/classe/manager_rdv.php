<?php


class manager_rdv
{
    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }

    public function add(rendez_vous $rendez_vous)
    {
        try {
            // Vérifier si le client a moins de 3 rendez-vous
            $id_client = $_SESSION['id_client'];
            $q_check = $this->_db->prepare('SELECT COUNT(rendez_vous.id_client) AS count_rdv FROM rendez_vous  WHERE rendez_vous.id_client = :id_client and statue = "en cours de confirmation..."or statue = "LE RENDEZ VOUS A ETE CONFIRMER"');
            $q_check->bindValue(':id_client', $id_client);
            $q_check->execute();
            $result = $q_check->fetch(PDO::FETCH_ASSOC);

            if ($result['count_rdv'] < 2) {
                // Le client a moins de 3 rendez-vous, procéder à l'insertion
                $q_insert = $this->_db->prepare('INSERT INTO rendez_vous( date, heure, formule, message, id_client,statue,voiture,model,prix) VALUES( :date, :heure, :formule, :message,:id_client,:statue,:voiture,:model,:prix)');
                $q_insert->bindValue(':date', $rendez_vous->getDate());
                $q_insert->bindValue(':heure', $rendez_vous->getHeure());
                $q_insert->bindValue(':formule', $rendez_vous->getFormule());
                $q_insert->bindValue(':message', $rendez_vous->getMessage());
                $q_insert->bindValue(':id_client', $id_client);
                $q_insert->bindValue(':statue', "en cours de confirmation...");
                $q_insert->bindValue(':voiture', $rendez_vous->getVoiture());
                $q_insert->bindValue(':model', $rendez_vous->getModel());
                $q_insert->bindValue(':prix', $rendez_vous->getprix());
                $q_insert->execute();


            }
        } catch (PDOException $e) {
            // Gérer l'erreur, par exemple, afficher un message ou journaliser l'erreur
            echo "Erreur lors de l'ajout de rendez-vous : " . $e->getMessage();
        }
    }


    public function qt_rdv()
    {
        try {
            $q = $this->_db->prepare('SELECT COUNT(rendez_vous.id_client) AS count_rdv FROM rendez_vous  WHERE rendez_vous.id_client = :id_client and statue = "en cours de confirmation..."  or statue = "LE RENDEZ VOUS A ETE CONFIRMER" ');
            $q->bindValue(':id_client', $_SESSION['id_client']);
            $q->execute();

            $result = $q->fetch(PDO::FETCH_ASSOC);


            return $result['count_rdv'];
        } catch (PDOException $e) {
            // Gérer l'erreur, par exemple, afficher un message ou journaliser l'erreur
            echo "Erreur lors de la récupération du nombre de rendez-vous : " . $e->getMessage();
            return false; // ou retourner un autre indicateur d'erreur si nécessaire
        }
    }
    public function nombre()
    {
        $q = $this->_db->prepare('SELECT COUNT(rendez_vous.id_client) AS count_rdv FROM rendez_vous  WHERE rendez_vous.id_client = :id_client  and statue = "en cours de confirmation..." or statue = "LE RENDEZ VOUS A ETE CONFIRMER" ');
        $q->bindValue(':id_client', $_SESSION['id_client']);
        $q->execute();

        $result = $q->fetch(PDO::FETCH_ASSOC);
        $count_rdv = $result['count_rdv'];

        // Code commun à toutes les conditions
        $commonHtml = '
            <button class="card add_rdv h-72 sm:h-80 !important">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="38px" width="38px" version="1.1" id="plus" viewBox="0 0 24 24" xml:space="preserve">
                        <g>
                            <rect x="11" y="0" width="2" height="24"></rect>
                            <rect x="0" y="11" width="24" height="2"></rect>
                        </g>
                    </svg>
                </div>
                <p class="title">AJOUTER</p>
                <p class="text">Ajoutez un nouveau rendez-vous à votre planning !</p>
            </button>';
        $encours = '   <div class="card h-72 sm:h-80  !important"
        style="background: rgb(255,0,232);
background: linear-gradient(317deg, rgba(255,0,232,1) 0%, rgba(0,198,255,1) 100%); border: none;">

        <svg class="pl" viewBox="0 0 160 160" width="160px" height="160px"
            xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="grad" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0%" stop-color="#000"></stop>
                    <stop offset="100%" stop-color="#fff"></stop>
                </linearGradient>
                <mask id="mask1">
                    <rect x="0" y="0" width="160" height="160" fill="url(#grad)"></rect>
                </mask>
                <mask id="mask2">
                    <rect x="28" y="28" width="104" height="104" fill="url(#grad)"></rect>
                </mask>
            </defs>

            <g>
                <g class="pl__ring-rotate">
                    <circle class="pl__ring-stroke" cx="80" cy="80" r="72" fill="none"
                        stroke="hsl(223,90%,55%)" stroke-width="16" stroke-dasharray="452.39 452.39"
                        stroke-dashoffset="452" stroke-linecap="round" transform="rotate(-45,80,80)">
                    </circle>
                </g>
            </g>
            <g mask="url(#mask1)">
                <g class="pl__ring-rotate">
                    <circle class="pl__ring-stroke" cx="80" cy="80" r="72" fill="none"
                        stroke="hsl(193,90%,55%)" stroke-width="16" stroke-dasharray="452.39 452.39"
                        stroke-dashoffset="452" stroke-linecap="round" transform="rotate(-45,80,80)">
                    </circle>
                </g>
            </g>

            <g>
                <g stroke-width="4" stroke-dasharray="12 12" stroke-dashoffset="12" stroke-linecap="round"
                    transform="translate(80,80)">
                    <polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14"
                        transform="rotate(-135,0,0) translate(0,40)"></polyline>
                    <polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14"
                        transform="rotate(-90,0,0) translate(0,40)"></polyline>
                    <polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14"
                        transform="rotate(-45,0,0) translate(0,40)"></polyline>
                    <polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14"
                        transform="rotate(0,0,0) translate(0,40)"></polyline>
                    <polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14"
                        transform="rotate(45,0,0) translate(0,40)"></polyline>
                    <polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14"
                        transform="rotate(90,0,0) translate(0,40)"></polyline>
                    <polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14"
                        transform="rotate(135,0,0) translate(0,40)"></polyline>
                    <polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14"
                        transform="rotate(180,0,0) translate(0,40)"></polyline>
                </g>
            </g>
            <g mask="url(#mask1)">
                <g stroke-width="4" stroke-dasharray="12 12" stroke-dashoffset="12" stroke-linecap="round"
                    transform="translate(80,80)">
                    <polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14"
                        transform="rotate(-135,0,0) translate(0,40)"></polyline>
                    <polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14"
                        transform="rotate(-90,0,0) translate(0,40)"></polyline>
                    <polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14"
                        transform="rotate(-45,0,0) translate(0,40)"></polyline>
                    <polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14"
                        transform="rotate(0,0,0) translate(0,40)"></polyline>
                    <polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14"
                        transform="rotate(45,0,0) translate(0,40)"></polyline>
                    <polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14"
                        transform="rotate(90,0,0) translate(0,40)"></polyline>
                    <polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14"
                        transform="rotate(135,0,0) translate(0,40)"></polyline>
                    <polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14"
                        transform="rotate(180,0,0) translate(0,40)"></polyline>
                </g>
            </g>

            <g>
                <g transform="translate(64,28)">
                    <g class="pl__arrows" transform="rotate(45,16,52)">
                        <path fill="hsl(3,90%,55%)"
                            d="M17.998,1.506l13.892,43.594c.455,1.426-.56,2.899-1.998,2.899H2.108c-1.437,0-2.452-1.473-1.998-2.899L14.002,1.506c.64-2.008,3.356-2.008,3.996,0Z">
                        </path>
                        <path fill="hsl(223,10%,90%)"
                            d="M14.009,102.499L.109,58.889c-.453-1.421,.559-2.889,1.991-2.889H29.899c1.433,0,2.444,1.468,1.991,2.889l-13.899,43.61c-.638,2.001-3.345,2.001-3.983,0Z">
                        </path>
                    </g>
                </g>
            </g>
            <g mask="url(#mask2)">
                <g transform="translate(64,28)">
                    <g class="pl__arrows" transform="rotate(45,16,52)">
                        <path fill="hsl(333,90%,55%)"
                            d="M17.998,1.506l13.892,43.594c.455,1.426-.56,2.899-1.998,2.899H2.108c-1.437,0-2.452-1.473-1.998-2.899L14.002,1.506c.64-2.008,3.356-2.008,3.996,0Z">
                        </path>
                        <path fill="hsl(223,90%,80%)"
                            d="M14.009,102.499L.109,58.889c-.453-1.421,.559-2.889,1.991-2.889H29.899c1.433,0,2.444,1.468,1.991,2.889l-13.899,43.61c-.638,2.001-3.345,2.001-3.983,0Z">
                        </path>
                    </g>
                </g>
            </g>
        </svg>

        <p class="title">en cours...</p>
        <p class="text">consulter votre rendez-vous dans la categorie voir statut !</p>
    </div>';
        if ($count_rdv == 0) {
            // Afficher le bouton deux fois si le nombre de rendez-vous est 0
            return $commonHtml . $commonHtml;
        } elseif ($count_rdv == 1) {
            // Afficher le bouton une fois si le nombre de rendez-vous est 1
            return $encours . $commonHtml;
        } else {
            // Si le résultat n'est ni 0 ni 1, retournez une chaîne vide ou quelque chose d'autre selon vos besoins
            return $encours . $encours;
        }
    }
    public function voir_rdv()
    {
        $id_client = $_SESSION['id_client'];
        $q = $this->_db->prepare('SELECT * FROM rendez_vous JOIN client ON client.id_client = rendez_vous.id_client WHERE client.id_client = :id_client and statue = "en cours de confirmation..." or statue = "LE RENDEZ VOUS A ETE CONFIRMER" ');
        $q->bindValue(':id_client', $id_client);
        $q->execute();
        $resultats = $q->fetchAll(PDO::FETCH_ASSOC);



        // Check if any rendez-vous found
        if ($resultats) {
            $htmlArray = [];

            foreach ($resultats as $rendezVous) {

                $html = '<div class="w-full grid grid-cols-1 sm:grid-cols-4   grid-rows-auto w-full h-full  border border-white  bg-black z-30" >
                
                    <div class="text-white text-center sm:col-span-4 gap-4 mt-4">TON RENDEZ-VOUS !</div>
                  
                    <div class="text-white text-center  sm:col-span-1 mt-2">DATE :</div> 
                    <div class="text-white text-center ml-14 sm:ml-px mr-14  col-span-1 ">
                                <div class="bg-black border border-white p-2">
                                    ' . $rendezVous['date'] . '
                                </div>
                                
                            </div>
                            <div class="text-white text-center  sm:col-span-1 "> HEURE :</div>
                            <div class="text-white text-center ml-14 sm:ml-px mr-14  sm:col-span-1 ">
                                <div class="bg-black border border-white p-2">
                                    ' . $rendezVous['heure'] . '
                                </div>
                            </div>
                            <div class="text-white text-center sm:col-span-1"> VOITURE :</div>
                            <div class="text-white text-center ml-14 sm:ml-px mr-14  sm:col-span-1 ">
                                <div class="bg-black border border-white p-2">
                                    ' . $rendezVous['voiture'] . '
                                </div>
                            </div>
                            <div class="text-white text-center sm:col-span-1 "> FORMULE :</div>
                            <div class="text-white text-center ml-14 sm:ml-px mr-14  sm:col-span-1 ">
                                <div class="bg-black border border-white p-2">
                                    ' . $rendezVous['formule'] . '
                                </div>
                            </div>
                            <div class="text-white text-center sm:col-span-1  "> MESSAGE :</div>
                            <div class="text-white text-center ml-14 sm:ml-px mr-14  sm:col-span-3">
                                <textarea class="bg-black border border-white py-px w-full" readonly>' . $rendezVous['message'] . '</textarea>
                            </div>
                           
                           
                            <div class="fancy sm:col-span-2    bg-blue-500 border-black"  style="margin: 0px !important;  ">
                            <span class="top-key"></span>
                            <span class="text"> ' . $rendezVous['statue'] . '</span>
                            <span class="bottom-key-1"></span>
                            <span class="bottom-key-2"></span>
                            </div>
                        <div class="fancy sm:col-span-2   bg-blue-500 border-black" style="margin: 0px !important ;  ">
                        <span class="top-key"></span>
                        <span class="text text-5xl"> ' . $rendezVous['prix'] . ' €</span>
                        <span class="bottom-key-1"></span>
                        <span class="bottom-key-2"></span>
                        </div>
                            <a class="fancy sm:col-span-4   bg-red-500 border-black" data-id-rendez-vous="' . $rendezVous['id_rendez_vous'] . '" style="margin: 0px !important">
                                <span class="top-key"></span>
                                <span class="text">supprimer</span>
                                <span class="bottom-key-1"></span>
                                <span class="bottom-key-2"></span>
                            </a>
                      </div>';
                $htmlArray[] = $html;
            }
            $htmls = '<div class="w-full h-96 border border-white rounded-lg flex items-center justify-center">
            <div class="text-center text-white absolute"> AUCUN RENDEZ-VOUS !</div>
         </div>';
            $tailleListe = count($htmlArray);
            if ($tailleListe == 1) {
                $htmlArray[] = $htmls;
                return $htmlArray;
            } else {
                return $htmlArray;
            }
        } else {
            // Handle case when no rendez-vous found
            $htmls = '<div class="w-full h-96 border border-white rounded-lg flex items-center justify-center">
                        <div class="text-center text-white absolute"> AUCUN RENDEZ-VOUS !</div>
                     </div>';


            // Display the "No rendez-vous" message only once if the number of rendez-vous is 0
            return [$htmls, $htmls];

        }
    }
    public function voir_rdv_historique()
    {
        $id_client = $_SESSION['id_client'];
        $q = $this->_db->prepare('SELECT * FROM rendez_vous JOIN client ON client.id_client = rendez_vous.id_client WHERE client.id_client = :id_client AND statue NOT IN ("en cours de confirmation...", "LE RENDEZ VOUS A ETE CONFIRMER") ORDER BY date DESC;');
        $q->bindValue(':id_client', $id_client);
        $q->execute();
        $resultats = $q->fetchAll(PDO::FETCH_ASSOC);



        // Check if any rendez-vous found
        if ($resultats) {
            $htmlArray = [];

            foreach ($resultats as $rendezVous) {

                $html = '<div class="w-full grid grid-cols-1 sm:grid-cols-4   grid-rows-auto w-full h-full  border border-white  bg-black z-30" >
                
                    <div class="text-white text-center sm:col-span-4 gap-4 mt-4">TON RENDEZ-VOUS !</div>
                  
                    <div class="text-white text-center sm:col-span-1 mt-2">DATE :</div> 
                    <div class="text-white text-center ml-14 sm:ml-px mr-14  sm:col-span-1 ">
                                <div class="bg-black border border-white p-2">
                                    ' . $rendezVous['date'] . '
                                </div>
                                
                            </div>
                            <div class="text-white text-center  sm:col-span-1 "> HEURE :</div>
                            <div class="text-white text-center ml-14 sm:ml-px mr-14  sm:col-span-1 ">
                                <div class="bg-black border border-white p-2">
                                    ' . $rendezVous['heure'] . '
                                </div>
                            </div>
                            <div class="text-white text-center sm:col-span-1"> VOITURE :</div>
                            <div class="text-white text-center ml-14 sm:ml-px mr-14  sm:col-span-1 ">
                                <div class="bg-black border border-white p-2">
                                    ' . $rendezVous['voiture'] . '
                                </div>
                            </div>
                            <div class="text-white text-center sm:col-span-1 "> FORMULE :</div>
                            <div class="text-white text-center ml-14 sm:ml-px mr-14 sm:col-span-1 ">
                                <div class="bg-black border border-white p-2">
                                    ' . $rendezVous['formule'] . '
                                </div>
                            </div>
                            <div class="text-white text-center sm:col-span-1  "> MESSAGE :</div>
                            <div class="text-white text-center ml-14 sm:ml-px mr-14  sm:col-span-3">
                                <textarea class="bg-black border border-white py-px w-full" readonly>' . $rendezVous['message'] . '</textarea>
                            </div>
                           
                           
                            <div class="fancy sm:col-span-2    bg-blue-500 border-black"  style="margin: 0px !important;  ">
                            <span class="top-key"></span>
                            <span class="text"> statut : ' . $rendezVous['statue'] . '</span>
                            <span class="bottom-key-1"></span>
                            <span class="bottom-key-2"></span>
                            </div>
                        <div class="fancy sm:col-span-2   bg-blue-500 border-black" style="margin: 0px !important ;  ">
                        <span class="top-key"></span>
                        <span class="text text-5xl"> ' . $rendezVous['prix'] . ' €</span>
                        <span class="bottom-key-1"></span>
                        <span class="bottom-key-2"></span>
                        </div>
                          
                      </div>';
                $htmlArray[] = $html;
            }
            $htmls = '<div class="w-full h-full border border-white rounded-lg flex items-center justify-center">
            <div class="text-center text-white absolute"> AUCUN RENDEZ-VOUS !</div>
         </div>';
            $tailleListe = count($htmlArray);
            if ($tailleListe == 1) {
                $htmlArray[] = $htmls;
                return $htmlArray;
            } else {
                return $htmlArray;
            }
        } else {
            // Handle case when no rendez-vous found
            $htmls = '<div class="w-full h-full border border-white rounded-lg flex items-center justify-center">
                        <div class="text-center text-white absolute"> AUCUN RENDEZ-VOUS !</div>
                     </div>';


            // Display the "No rendez-vous" message only once if the number of rendez-vous is 0
            return [$htmls, $htmls];

        }
    }
    public function voir_rdvadmin()
    {


        
        $q = $this->_db->prepare('SELECT * FROM rendez_vous where  statue = "en cours de confirmation..." or statue = "LE RENDEZ VOUS A ETE CONFIRMER" ');
        $q->execute();
        $resultats = $q->fetchAll(PDO::FETCH_ASSOC);
    
        // Check if any rendez-vous found
        if ($resultats) {
            $htmlArray = [];
    
            foreach ($resultats as $rendezVous) {
                $c = $this->_db->prepare('SELECT * FROM client where id_client = :id');
                $c->bindValue(':id', $rendezVous['id_client']); // Corrected binding
                $c->execute();
                $resultatsClient = $c->fetch(PDO::FETCH_ASSOC); 
                $html = '<div class="w-full grid grid-cols-1 sm:grid-cols-4   grid-rows-auto  h-auto  border border-white  bg-black z-30" >
                
                    <div class="text-white text-center sm:col-span-4 gap-4 mt-4 mb-8">RENDEZ VOUS CLIENT </div>
                  
                    
                    <form  method="post" action="" id="modifier" class="text-white text-center  flex flex-row ml-14 mr-14 grid grid-cols-1 sm:grid-cols-4  grid-rows-auto sm:col-span-4 sm:row-span-2  ">
                    <div class="text-white text-center  mt-2">DATE :</div> 
                    <input type="date"  name="date" value="' . date('Y-m-d', strtotime($rendezVous['date'])) . '" class="bg-white text-black border w-full border-white p-2">
        
                                   
                                </input>
                                <div class="text-white text-center  sm:col-span-1 "> HEURE :</div>
                                <input type="text"   name="heure" value="' . $rendezVous['heure'] . '"  class="text-black text-center sm:mr-14 border border-white  p-2 sm:col-span-1 ">
                                  
                                </input>

                                <input type="hidden" name="data_id" value="' . $rendezVous['id_rendez_vous'] . '"> 
                                <button type="submit" name="modifier_dh"  class="fancy  w-full sm:col-span-4  bg-blue-500 border-black"  style=" margin-top: 0px !important;  margin-bottom: 2vh !important;   ">
                                <span class="top-key"></span>
                                <span class="text" style="    line-height: 0.9em !important; " > MODIFIER  DATE  OU/ET HEURE </span>
                                <span class="bottom-key-1"></span>
                                <span class="bottom-key-2"></span>
                                </button>
                           
                    </form>        
                           
                            <div class="text-white self-center  text-center sm:col-span-1"> VOITURE :</div>
                            <div class="text-white text-center  ml-14 sm:ml-px mr-14  col-span-1 ">
                                <div class="border border-white  p-2">
                                    ' . $rendezVous['voiture'] . '
                                </div>
                            </div>
                            <div class="text-white self-center  text-center sm:col-span-1"> MODEL :</div>
                            <div class="text-white text-center  ml-14 sm:ml-px mr-14  col-span-1 ">
                                <div class="border border-white  p-2">
                                    ' . $rendezVous['model'] . '
                                </div>
                            </div>
                           
                            <div class="text-white self-center  text-center sm:col-span-1 "> FORMULE :</div>
                            <div class="text-white text-center  ml-14 sm:ml-px mr-14   col-span-1 ">
                                <div class="border border-white  p-2" style=" margin-top: 1vh !important  " >
                                    ' . $rendezVous['formule'] . '
                                </div>
                            </div>
                            <div class="text-white  self-center  text-center sm:col-span-1 "> TELEPHONE :</div>
                            <div class="text-white text-center  ml-14 sm:ml-px mr-14  col-span-1 ">
                                <div class="border border-white  p-2" style=" margin-top: 1vh !important  ">
                                    0' . $resultatsClient['telephone'] . '
                                </div>
                            </div>
                            <div class="text-white self-center  text-center sm:col-span-1  "> MESSAGE :</div>
                            <div class="text-white text-center  ml-14 sm:ml-px mr-14 bg-black  sm:col-span-3  !important ">
                                <textarea class="border border-white bg-black py-px w-full  " readonly style=" margin-top: 1vh !important  ">' . $rendezVous['message'] . '</textarea>
                            </div>
                            <div class="text-white self-center  text-center sm:col-span-1 "> NOM :</div>
                            <div class="text-white text-center  ml-14 sm:ml-px mr-14  sm:col-span-1 ">
                                <div class="border border-white  p-2"style=" margin-top: 1vh !important  ">
                                    ' . $resultatsClient['Nom'] . '
                                </div>
                            </div>
                            <div class="text-white self-center  text-center sm:col-span-1 "> PRENOM :</div>
                            <div class="text-white text-center  ml-14 sm:ml-px mr-14  sm:col-span-1 "style=" margin-top: 1vh !important  ">
                                <div class="border border-white  p-2">
                                    ' . $resultatsClient['prenom'] . '
                                </div>
                            </div>
                          
                            <div class="text-white self-center  text-center sm:col-span-1 "> EMAIL :</div>
                            <div class="text-white text-center  text-xs sm:text-base ml-14 sm:ml-px mr-14  sm:col-span-3 "style=" margin-top: 1vh !important">
                                <div class="border border-white  p-2" >
                                    ' . $resultatsClient['Email'] . '
                                </div>
                            </div>
                            <div  class="fancy sm:col-span-2    bg-blue-500 border-black"  style="margin: 0px ; margin-top: 2vh !important  " data-statut="' . $rendezVous['id_rendez_vous'] . '">
                            <span class="top-key"></span>
                            <span class="text"> ' . $rendezVous['statue'] . '</span>
                            <span class="bottom-key-1"></span>
                            <span class="bottom-key-2"></span>
                            </div>
                        <div class="fancy sm:col-span-2   bg-blue-500 border-black" style="margin: 0px ; margin-top: 2vh !important   ">
                        <span class="top-key"></span>
                        <span class="text text-5xl"> ' . $rendezVous['prix'] . ' €</span>
                        <span class="bottom-key-1"></span>
                        <span class="bottom-key-2"></span>
                        </div>
                            <a class="fancy sm:col-span-4   bg-red-500 border-black" data-id-rendez-vous="' . $rendezVous['id_rendez_vous'] . '" style="margin: 0px !important">
                                <span class="top-key"></span>
                                <span class="text">supprimer (attention sa supprime le rendez-vous definivement)</span>
                                <span class="bottom-key-1"></span>
                                <span class="bottom-key-2"></span>
                            </a>
                      </div>';
                $htmlArray[] = $html;
            }
           
          
          
                return $htmlArray;
          
        } 
        else{
        
            // Handle case when no rendez-vous found
            $htmls = '<div class="w-full h-96 border border-white rounded-lg flex items-center justify-center">
                        <div class="text-center text-white absolute"> AUCUN RENDEZ-VOUS !</div>
                     </div>';


            // Display the "No rendez-vous" message only once if the number of rendez-vous is 0
            return [$htmls, $htmls];

       
        }
    }
    public function voir_rdvadmin_terminer()
    {


        
        $q = $this->_db->prepare('SELECT * FROM rendez_vous where statue != "en cours de confirmation..." and statue != "en cours de confirmation..." or statue != "LE RENDEZ VOUS A ETE CONFIRMER" ');
        $q->execute();
        $resultats = $q->fetchAll(PDO::FETCH_ASSOC);
    
        // Check if any rendez-vous found
        if ($resultats) {
            $htmlArray = [];
    
            foreach ($resultats as $rendezVous) {
                $c = $this->_db->prepare('SELECT * FROM client where id_client = :id');
                $c->bindValue(':id', $rendezVous['id_client']); // Corrected binding
                $c->execute();
                $resultatsClient = $c->fetch(PDO::FETCH_ASSOC); 
                $html = '<div class="w-full grid grid-cols-1 sm:grid-cols-4  grid-rows-auto  h-auto  border border-white  bg-black z-30" >
                
                    <div class="text-white text-center sm:col-span-4 gap-4  mt-4 mb-8">RENDEZ VOUS CLIENT </div>
                  
                    
                    <div class="text-white self-center  text-center  sm:col-span-1"> DATE :</div>
                    <div class="text-white text-center ml-14 sm:ml-px mr-14  sm:col-span-1 ">
                        <div class="border border-white  p-2" >
                            ' . $rendezVous['date'] . '
                        </div>
                    </div>
                   
                    <div class="text-white self-center  text-center sm:col-span-1"> HEURE :</div>
                    <div class="text-white text-center mr-14 ml-14 sm:ml-px col-span-1 ">
                        <div class="border border-white  p-2">
                            ' . $rendezVous['heure'] . '
                        </div>
                    </div> 
                           
                            <div class="text-white self-center  text-center sm:col-span-1"> VOITURE :</div>
                            <div class="text-white text-center mr-14 ml-14 sm:ml-px sm:col-span-1 ">
                                <div class="border border-white  p-2" style=" margin-top: 1vh !important  ">
                                    ' . $rendezVous['voiture'] . '
                                </div>
                            </div>
                            <div class="text-white self-center  text-center sm:col-span-1"> MODEL :</div>
                            <div class="text-white text-center mr-14 ml-14 sm:ml-px sm:col-span-1 ">
                                <div class="border border-white  p-2" style=" margin-top: 1vh !important  ">
                                    ' . $rendezVous['model'] . '
                                </div>
                            </div>
                           
                            <div class="text-white self-center  text-center sm:col-span-1 "> FORMULE :</div>
                            <div class="text-white text-center mr-14 ml-14 sm:ml-px  sm:col-span-1 ">
                                <div class="border border-white  p-2" style=" margin-top: 1vh !important  " >
                                    ' . $rendezVous['formule'] . '
                                </div>
                            </div>
                            <div class="text-white  self-center  text-center sm:col-span-1 "> TELEPHONE :</div>
                            <div class="text-white text-center mr-14 ml-14 sm:ml-px sm:col-span-1 ">
                                <div class="border border-white  p-2" style=" margin-top: 1vh !important  ">
                                    0' . $resultatsClient['telephone'] . '
                                </div>
                            </div>
                            <div class="text-white self-center  text-center sm:col-span-1  "> MESSAGE :</div>
                            <div class="text-white text-center mr-14 ml-14 sm:ml-px bg-black  sm:col-span-3 row-span-3 sm:row-span-1  ">
                                <textarea class="border border-white bg-black py-px w-full" readonly style=" margin-top: 1vh !important  ">' . $rendezVous['message'] . '</textarea>
                            </div>
                            <div class="text-white self-center  text-center sm:col-span-1 "> NOM :</div>
                            <div class="text-white text-center mr-14 ml-14 sm:ml-px  sm:col-span-1 ">
                                <div class="border border-white  p-2"style=" margin-top: 1vh !important  ">
                                    ' . $resultatsClient['Nom'] . '
                                </div>
                            </div>
                            <div class="text-white self-center  text-center sm:col-span-1 "> PRENOM :</div>
                            <div class="text-white text-center mr-14 ml-14 sm:ml-px sm:col-span-1 "style=" margin-top: 1vh !important  ">
                                <div class="border border-white  p-2">
                                    ' . $resultatsClient['prenom'] . '
                                </div>
                            </div>
                          
                            <div class="text-white self-center  text-center sm:col-span-1 "> EMAIL :</div>
                            <div class="text-white text-center text-xs sm:text-base mr-14 ml-14 sm:ml-px sm:col-span-3 "style=" margin-top: 1vh !important">
                                <div class="border border-white  p-2" >
                                    ' . $resultatsClient['Email'] . '
                                </div>
                            </div>
                            <div  class="fancy sm:col-span-2    bg-blue-500 border-black"  style="margin: 0px ; margin-top: 2vh !important  ">
                            <span class="top-key"></span>
                            <span class="text"> statut : ' . $rendezVous['statue'] . '</span>
                            <span class="bottom-key-1"></span>
                            <span class="bottom-key-2"></span>
                            </div>
                        <div class="fancy sm:col-span-2   bg-blue-500 border-black" style="margin: 0px ; margin-top: 2vh !important   ">
                        <span class="top-key"></span>
                        <span class="text text-5xl"> ' . $rendezVous['prix'] . ' €</span>
                        <span class="bottom-key-1"></span>
                        <span class="bottom-key-2"></span>
                        </div>
                            
                      </div>';
                $htmlArray[] = $html;
            }
           
          
          
                return $htmlArray;
          
        } 
    }
    public function supprimerRendezVous($idRendezVous)
    {
        $q = $this->_db->prepare('UPDATE rendez_vous SET statue = "supprimer"WHERE id_rendez_vous = :id_rendez_vous');
        $q->bindValue(':id_rendez_vous', $idRendezVous);
        $q->execute();
    }
    public function update_rdv($idRendezVous)
    {
        $q = $this->_db->prepare('UPDATE rendez_vous SET statue = "LE RENDEZ VOUS A ETE CONFIRMER"WHERE id_rendez_vous = :id_rendez_vous');
        $q->bindValue(':id_rendez_vous', $idRendezVous);
        $q->execute();
    }
    public function email_rdv($idRendezVous)
    {
        $q = $this->_db->prepare('SELECT id_client FROM rendez_vous WHERE id_rendez_vous = :id_rendez_vous');
        $q->bindValue(':id_rendez_vous', $idRendezVous);
        $q->execute();
    
        $result = $q->fetch(PDO::FETCH_ASSOC);
        $q = $this->_db->prepare('SELECT Email FROM client WHERE id_client = :id_client');
        $q->bindValue(':id_client',  $result['id_client']);
        $q->execute();
        $results = $q->fetch(PDO::FETCH_ASSOC);
        return $results['Email'];
    }
    
    
    public function terminer_rdv_automatique()
    {
        // Assuming your appointment date column is named 'date' and status column is named 'statue'
        $q = $this->_db->prepare('SELECT * FROM rendez_vous WHERE date < CURDATE() AND statue <> "terminer";');
        $q->execute();
        $resultats = $q->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($resultats as $rdv) {
            // Update the appointment status to 'terminer'
            $update = $this->_db->prepare('UPDATE rendez_vous SET statue = "terminer"');
       
            $update->execute();
        }
    }
    
    public function modifier_admin_rdv($idRendezVous, $date, $heure)
    {
        $q = $this->_db->prepare('UPDATE rendez_vous SET heure = :heure, date = :date WHERE id_rendez_vous = :id_rendez_vous');
        $q->bindValue(':id_rendez_vous', $idRendezVous);
        $q->bindValue(':date', $date);
        $q->bindValue(':heure', $heure);
        $q->execute();
    }
    
    public function voircompte()
    {
        $id_client = $_SESSION['id_client'];
        $q = $this->_db->prepare('SELECT * FROM client  WHERE id_client = :id_client;');
        $q->bindValue(':id_client', $id_client);
        $q->execute();
        $resultats = $q->fetch(PDO::FETCH_ASSOC);

        $compte = ' <form method="post" id="prenom" class="flex flex-row items-center grid grid-cols-2 sm:grid-cols-3 grid-rows-1 place-content-center  items-center gap-5  justify-center col-span-3">

        <div class="text-white text-center  mr-2">PRENOM :</div>
        <input type="text"  name="prenomPost" size="50" value="' . $resultats['prenom'] . '" style="text-align: center;border: 1px solid white;background-color: black; border-radius: 3px;margin-right: 3vw;padding-block: 1vh;color: white;"/>
    
        <button type="submit" name="prenom" class="fancy bg-blue-700 border-black col-span-2 sm:col-span-1" style="margin: 0px !important " >
            <span class="top-key"></span>
            <span class="text">MODIFIER</span>
            <span class="bottom-key-1"></span>
            <span class="bottom-key-2"></span>
        </button>
                </form>
                <form method="post" name="nom" class="flex flex-row items-center grid grid-cols-2 sm:grid-cols-3 grid-rows-1 place-content-center  items-center gap-5  justify-center col-span-3">

        <div class="text-white text-center ">NOM :</div><input type="text" id="nomPost" name="nomPost" size="50" value="' . $resultats['Nom'] . '"  style="text-align: center;border: 1px solid white;background-color: black; border-radius: 3px;margin-right: 3vw;padding-block: 1vh;color: white;"/>
        <button  type="submit"  class="fancy bg-blue-700 border-black col-span-2 sm:col-span-1" style="margin: 0px !important " >
        <span class="top-key"></span>
        <span class="text">MODIFIER</span>
        <span class="bottom-key-1"></span>
        <span class="bottom-key-2"></span>
    </button>
                </form>
                <form method="post" name="telephone" class="flex flex-row items-center grid grid-cols-2 sm:grid-cols-3 grid-rows-1 place-content-center  items-center gap-5  justify-center col-span-3">

        <div class="text-white text-center">NUMERO DE TELEPHONE :</div><input type="text" id="telPost"  value="0' . $resultats['telephone'] . '"  style="text-align: center;border: 1px solid white;background-color: black; border-radius: 3px;margin-right: 3vw;padding-block: 1vh;color: white;" name="telephonePost"size="50" />
        <button  type="submit" name="num"  class="fancy bg-blue-700 border-black col-span-2 sm:col-span-1" style="margin: 0px !important " >
        <span class="top-key"></span>
        <span class="text">MODIFIER</span>
        <span class="bottom-key-1"></span>
        <span class="bottom-key-2"></span>
    </button>
                </form>
                <form method="post" name="email" class="flex flex-row items-center grid grid-cols-2 sm:grid-cols-3 grid-rows-1 place-content-center  items-center gap-5  justify-center col-span-3">

        <div class="text-white  text-center">EMAIL :</div><input type="text" id="emailPost" name="emailPost" size="50"  value="' . $resultats['Email'] . '"  style="text-align: center;border: 1px solid white;background-color: black; border-radius: 3px;margin-right: 3vw;padding-block: 1vh;color: white;"/>
        <button type="submit" class="fancy bg-blue-700 border-black col-span-2 sm:col-span-1" style="margin: 0px !important " >
            <span class="top-key"></span>
            <span class="text">MODIFIER</span>
            <span class="bottom-key-1"></span>
            <span class="bottom-key-2"></span>
        </button>
                </form>
              <form method="post" name="mdp" id="motde" class=" sd flex flex-row items-center grid grid-cols-2 sm:grid-cols-3  grid-rows-1 place-content-center  items-center gap-5  justify-center col-span-3 row-span-1">
           

        <div class="text-white text-center">MOT DE PASSE :</div><input type="password" id="mdpd" style="text-align: center;border: 1px solid white;background-color: black; border-radius: 3px;margin-right: 3vw;padding-block: 1vh;color: white;" name="mdpPoste" size="50"/>
        <button id="modifiermdp" type="button" class="fancy bg-blue-700 border-black col-span-2 sm:col-span-1" style="margin: 0px !important " >
            <span class="top-key"></span>
            <span class="text">MODIFIER</span>
            <span class="bottom-key-1"></span>
            <span class="bottom-key-2"></span>
        </button>
        <div class=" text-red-500 col-span-3 text-center hidden" id="phrase_mdp">Le mot de passe doit respecter les critères de
        sécurité, comprenant au moins 8 caractères,</br> une combinaison de lettres majuscules et minuscules,</br> au
        moins un chiffre,</br> et un caractère spécial.</div>
           
        <div id="text_modifie" class=" text-white hidden text-center">CONFIRME TON MOT DE PASSE :</div><input type="password" id="input_modifie"  class="hidden" value=""  style="text-align: center;border: 1px solid white;background-color: black; border-radius: 3px;margin-right: 3vw;padding-block: 1vh;color: white;" name="mdpPost" size="50"/>
        <button id="confirme_modifie" type="submit" class="fancy hidden bg-red-700 border-black col-span-2 sm:col-span-1 " style="margin: 0px !important " >
            <span class="top-key "></span>
            <span class="text">confirmer</span>
            <span class="bottom-key-1"></span>
            <span class="bottom-key-2"></span>
        </button>
                </form>
';

        return $compte;
    }

  
}