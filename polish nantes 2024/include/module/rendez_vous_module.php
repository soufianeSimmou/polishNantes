<body
    style="background: rgb(31,31,31);background: linear-gradient(252deg, rgba(0,0,0,1) 66%, rgba(96,1,74,1) 100%);height: 80vh bg-no-repeat ">
    <?php
    include_once '../../classe/manager_rdv.php';
    include_once '../../classe/user_manager.php';
    include_once '../../classe/rendez-vous.php';
    $manager = new manager_rdv($bd);
    $manager->terminer_rdv_automatique();



    ?>
    <div class="xl:grid  xl:grid-cols-4  xl:grid-rows-1 h-auto  lg:mx-44  gap-14 sm:mt-28">

<div class="col-span-1">

         <div class="grid grid-cols-1 w-full text-white  my-14 ">
             <?php echo '<div class="text-5xl text-center"> ' . $_SESSION['nom'] . ' ' . $_SESSION['prenom'] . '   </div>' ?>
             <a class="fancy ml-auto w-full menu mt-6   xl:mt-16 !important" >
                 <span class="top-key"></span>
                 <span class="text">Prendre rendez-vous</span>
                 <span class="bottom-key-1"></span>
                 <span class="bottom-key-2"></span>
             </a>
             <a class="fancy ml-auto w-full menu mt-2 !important xl:mt-16 !important">
                 <span class="top-key"></span>
                 <span class="text">Voir statue de(s) rendez-vous</span>
                 <span class="bottom-key-1"></span>
                 <span class="bottom-key-2"></span>
             </a>
             <a class="fancy ml-auto w-full menu mt-2 !important xl:mt-16 !important">
                 <span class="top-key"></span>
                 <span class="text">Voir historique</span>
                 <span class="bottom-key-1"></span>
                 <span class="bottom-key-2"></span>
             </a>

             <a class="fancy ml-auto w-full menu mt-2 !important xl:mt-16 !important">
                 <span class="top-key"></span>
                 <span class="text">Mon compte</span>
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
  
     <div class="  col-span-3 w-full  pb-4 !important containerr  xl:mx-14" id="rdv_accueil">


         <div class="flex flex-col items-center justify-center mx-14 mt-44 ">
             <div class="text-white col-span-2 text-center text-lg h-24 py-4">PRENEZ RENDEZ-VOUS EN 6 ETAPES DES
                 MAINTENANT !</div>
             <div class="text-white col-span-2 text-center text-lg h-24 py-4">Rendez-vous en cours (
                 <?php echo $manager->qt_rdv(); ?>/2)
             </div>
         </div>

         <div
             class="grid  lg:grid-cols-2 lg:grid-rows-1  place-content-center mx-16 lg:mx-28 items-center gap-5 flex flex-col items-center justify-center">


             <?php echo $manager->nombre(); ?>


         </div>
     </div>

     <div class="  col-span-3     containerr  xl:mx-14" id="rdv_etape">

         <div id="rdv_step_1" class="flex flex-col items-center justify-center mx-14 mt-20 hidden">
             <div class="text-white col-span-2  text-center text-lg h-24 py-4"> ETAPE 1 : CHOISISSEZ UNE DATE !</div>

   <input type="date" class="w-screen  sm:w-full text-center bg-white text-black h-20 py-2 flex items-center justify-center !important fancy" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" />




             <div class="">
                 <a class="fancy precedent w-screen sm:w-auto  !important">
                     <span class="top-key"></span>
                     <span class="text">precedent</span>
                     <span class="bottom-key-1"></span>
                     <span class="bottom-key-2"></span>
                 </a>
                 <a class="fancy suivant w-screen mt-4 !important sm:w-auto">
                     <span class="top-key"></span>
                     <span class="text">suivant</span>
                     <span class="bottom-key-1"></span>
                     <span class="bottom-key-2"></span>
                 </a>
             </div>
         </div>
         <div id="rdv_step_2" class="flex flex-col items-center justify-center mx-14 mt-20 hidden ">
             <div class="text-white col-span-2 text-center text-lg h-24 py-4"> ETAPE 2 : CHOISISSEZ UNE HEURE !</div>
             <div
                 class="grid grid-cols-1 grid-rows-auto lg:grid-cols-2 lg:grid-rows-1  place-content-center  items-center gap-5 flex flex-col items-center justify-center">


                 <div class="card w-64 h-64 buttonrdv">
                     <div class="icon">
                         <p class="title pb-6">10H</p>
                     </div>
                 </div>
                 <div class="card w-64 h-64 buttonrdv">
                     <div class="icon">
                         <p class="title pb-6">12H 30</p>
                     </div>
                 </div>
                 <div class="card w-64 h-64 buttonrdv">
                     <div class="icon">
                         <p class="title pb-6">15H</p>
                     </div>
                 </div>
                 <div class="card w-64 h-64 buttonrdv">
                     <div class="icon">
                         <p class="title pb-6">17H 30</p>
                     </div>
                 </div>

             </div>
            <div class="">
                 <a class="fancy precedent w-screen sm:w-auto  !important">
                     <span class="top-key"></span>
                     <span class="text">precedent</span>
                     <span class="bottom-key-1"></span>
                     <span class="bottom-key-2"></span>
                 </a>
                 <a class="fancy suivant w-screen mt-4 !important sm:w-auto">
                     <span class="top-key"></span>
                     <span class="text">suivant</span>
                     <span class="bottom-key-1"></span>
                     <span class="bottom-key-2"></span>
                 </a>
             </div>
         </div>
         <div id="rdv_step_3" class="flex flex-col items-center justify-center mx-14 mt-20 hidden  ">
             <div class="text-white col-span-2 text-center text-lg h-24 py-4"> ETAPE 3 : CHOISISSEZ UNE FORMULE !
             </div>
             <div
                 class="grid grid-cols-1 grid-rows-auto lg:grid-cols-2 lg:grid-rows-1 place-content-center  items-center gap-5 flex flex-col items-center justify-center">


                 <div class="card buttonrdvv">
                     <div class="icon">
                         <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1280.000000pt"
                             height="1100.000000pt" viewBox="0 0 1280.000000 1100.000000"
                             preserveAspectRatio="xMidYMid meet">
                             <metadata>
                                 Created by potrace 1.15, written by Peter Selinger 2001-2017
                             </metadata>
                             <g transform="translate(300.100000,900.000000)  scale(0.050000,-0.050000)"
                                 fill="#FFFFFFF" stroke="none">
                                 <path d="M3165 10985 c-247 -44 -306 -193 -276 -688 12 -185 11 -200 -6 -234
-27 -55 -57 -71 -183 -97 -96 -20 -151 -39 -315 -114 -110 -50 -227 -100 -260
-111 l-60 -21 -66 73 c-36 39 -104 115 -151 167 -175 197 -297 281 -420 288
-59 4 -75 1 -130 -26 -35 -16 -89 -52 -120 -78 -96 -81 -342 -358 -379 -427
-31 -56 -34 -70 -34 -142 0 -68 5 -88 29 -135 44 -85 111 -163 289 -337 l165
-161 -33 -49 c-106 -158 -215 -392 -286 -612 -23 -73 -52 -145 -65 -160 l-22
-26 -289 0 c-329 -1 -357 -6 -437 -76 -92 -81 -116 -176 -116 -451 1 -280 20
-383 89 -474 45 -61 131 -106 230 -123 40 -6 181 -11 328 -11 l259 0 23 -72
c66 -214 196 -491 282 -603 60 -79 71 -101 64 -128 -4 -12 -109 -123 -234
-247 -253 -251 -289 -300 -298 -398 -3 -33 -3 -76 1 -96 22 -117 375 -491 551
-584 72 -38 168 -37 247 2 79 40 167 117 291 254 59 64 151 164 205 222 l99
104 99 -46 c198 -93 344 -146 548 -199 137 -35 129 -16 116 -269 -13 -281 -13
-516 1 -582 21 -100 70 -173 141 -209 84 -43 161 -53 383 -52 400 1 497 35
572 200 55 120 63 251 37 626 -20 281 -26 263 105 302 165 49 317 107 474 183
86 41 158 73 160 71 23 -32 363 -401 413 -450 130 -123 219 -169 329 -169 118
0 178 39 419 271 250 240 301 363 218 525 -46 90 -133 184 -335 362 -102 90
-188 170 -191 179 -12 31 -4 70 25 123 144 255 186 344 246 515 60 173 75 181
323 176 394 -9 462 -7 515 12 103 35 164 117 185 247 18 112 24 385 11 499
-24 204 -67 284 -179 334 -96 43 -213 53 -464 39 -199 -11 -235 -10 -290 13
-30 12 -55 67 -82 178 -22 91 -42 140 -125 300 -107 209 -133 285 -111 336 6
16 69 82 138 146 162 148 262 261 304 344 29 58 33 75 33 147 0 72 -4 87 -37
156 -31 61 -67 107 -193 242 -223 238 -292 285 -416 286 -57 0 -77 -5 -139
-37 -77 -38 -184 -137 -415 -385 -141 -151 -131 -150 -375 -15 -36 19 -135 57
-220 82 -179 54 -264 91 -302 129 -33 34 -35 45 -27 171 12 184 9 416 -5 487
-31 142 -103 237 -213 278 -94 35 -507 51 -648 25z m461 -2480 c425 -72 715
-337 793 -722 72 -354 -44 -702 -305 -912 -399 -321 -1062 -299 -1427 47 -177
169 -267 390 -268 656 0 138 13 226 51 334 93 271 325 481 627 567 49 14 115
29 148 34 98 14 286 12 381 -4z" />
                                 <path d="M8765 7710 c-126 -6 -217 -25 -278 -57 -49 -25 -108 -85 -134 -136
-50 -99 -57 -165 -58 -496 l0 -304 -104 -24 c-220 -50 -443 -135 -660 -250
-145 -76 -172 -86 -209 -72 -15 6 -115 99 -222 209 -215 219 -281 269 -381
290 -55 12 -71 12 -127 -3 -97 -26 -184 -90 -357 -265 -175 -177 -224 -239
-269 -332 -27 -56 -31 -76 -31 -146 0 -74 4 -88 38 -156 46 -91 139 -197 348
-397 l155 -149 -71 -144 c-112 -226 -195 -473 -220 -656 -12 -85 -17 -100 -42
-121 l-28 -24 -295 6 c-306 7 -424 0 -514 -29 -186 -61 -232 -182 -230 -609 0
-206 3 -254 22 -339 33 -153 87 -219 223 -268 63 -23 70 -23 359 -19 162 3
355 5 429 5 l134 1 28 -83 c65 -194 151 -379 273 -591 37 -64 66 -127 66 -142
0 -21 -13 -38 -52 -70 -81 -66 -393 -361 -479 -451 -92 -97 -133 -162 -154
-246 -27 -106 3 -196 113 -333 102 -128 395 -394 482 -439 124 -63 255 -43
410 63 77 53 196 175 382 390 149 172 185 207 207 207 14 0 121 -47 236 -104
193 -96 382 -171 528 -212 50 -13 56 -18 53 -37 -11 -52 -29 -605 -23 -708 9
-171 45 -273 123 -353 81 -83 161 -101 489 -112 392 -12 547 35 618 189 56
121 64 234 42 596 -19 314 -18 326 40 354 19 9 72 26 117 37 183 46 382 119
558 205 183 88 236 64 485 -225 208 -241 296 -308 421 -318 85 -6 141 15 249
95 129 96 368 339 437 443 75 115 92 163 86 244 -11 134 -113 266 -395 514
-81 71 -149 139 -162 163 -34 60 -25 110 37 212 80 132 99 176 152 355 54 185
87 268 126 319 46 61 58 63 285 54 388 -16 550 17 656 132 89 97 102 148 115
479 10 239 10 276 -6 354 -35 180 -102 251 -277 296 -80 20 -97 20 -339 13
-374 -12 -400 -12 -437 8 -43 23 -64 67 -102 212 -26 100 -45 145 -117 278
-108 197 -143 285 -144 355 0 62 -2 60 204 243 173 154 264 259 319 368 40 81
42 89 42 175 0 81 -3 97 -30 150 -34 67 -141 192 -320 372 -177 178 -259 226
-384 226 -141 -1 -287 -110 -551 -412 -135 -155 -167 -180 -229 -180 -48 0
-70 10 -189 88 -84 55 -144 81 -432 187 -69 25 -152 60 -185 78 l-60 32 0 55
c0 30 6 145 13 254 23 334 -8 507 -106 609 -99 103 -231 121 -697 97z m359
-2704 c55 -14 148 -50 210 -79 540 -262 839 -851 686 -1352 -81 -267 -302
-521 -563 -649 -152 -74 -233 -91 -427 -90 -150 1 -173 3 -255 28 -192 58
-351 144 -487 265 -283 251 -438 566 -438 891 0 259 104 498 306 705 151 155
344 261 549 301 107 20 297 12 419 -20z" />
                             </g>
                         </svg>

                     </div>
                     <p class="title">formule 1</p>
                     <p class="text">Lustrage</p>
                 </div>
                 <div class="card buttonrdvv">
                     <div class="icon">
                         <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1280.000000pt"
                             height="1100.000000pt" viewBox="0 0 1280.000000 1100.000000"
                             preserveAspectRatio="xMidYMid meet">
                             <metadata>
                                 Created by potrace 1.15, written by Peter Selinger 2001-2017
                             </metadata>
                             <g transform="translate(300.100000,900.000000)  scale(0.050000,-0.050000)"
                                 fill="#FFFFFFF" stroke="none">
                                 <path d="M3165 10985 c-247 -44 -306 -193 -276 -688 12 -185 11 -200 -6 -234
-27 -55 -57 -71 -183 -97 -96 -20 -151 -39 -315 -114 -110 -50 -227 -100 -260
-111 l-60 -21 -66 73 c-36 39 -104 115 -151 167 -175 197 -297 281 -420 288
-59 4 -75 1 -130 -26 -35 -16 -89 -52 -120 -78 -96 -81 -342 -358 -379 -427
-31 -56 -34 -70 -34 -142 0 -68 5 -88 29 -135 44 -85 111 -163 289 -337 l165
-161 -33 -49 c-106 -158 -215 -392 -286 -612 -23 -73 -52 -145 -65 -160 l-22
-26 -289 0 c-329 -1 -357 -6 -437 -76 -92 -81 -116 -176 -116 -451 1 -280 20
-383 89 -474 45 -61 131 -106 230 -123 40 -6 181 -11 328 -11 l259 0 23 -72
c66 -214 196 -491 282 -603 60 -79 71 -101 64 -128 -4 -12 -109 -123 -234
-247 -253 -251 -289 -300 -298 -398 -3 -33 -3 -76 1 -96 22 -117 375 -491 551
-584 72 -38 168 -37 247 2 79 40 167 117 291 254 59 64 151 164 205 222 l99
104 99 -46 c198 -93 344 -146 548 -199 137 -35 129 -16 116 -269 -13 -281 -13
-516 1 -582 21 -100 70 -173 141 -209 84 -43 161 -53 383 -52 400 1 497 35
572 200 55 120 63 251 37 626 -20 281 -26 263 105 302 165 49 317 107 474 183
86 41 158 73 160 71 23 -32 363 -401 413 -450 130 -123 219 -169 329 -169 118
0 178 39 419 271 250 240 301 363 218 525 -46 90 -133 184 -335 362 -102 90
-188 170 -191 179 -12 31 -4 70 25 123 144 255 186 344 246 515 60 173 75 181
323 176 394 -9 462 -7 515 12 103 35 164 117 185 247 18 112 24 385 11 499
-24 204 -67 284 -179 334 -96 43 -213 53 -464 39 -199 -11 -235 -10 -290 13
-30 12 -55 67 -82 178 -22 91 -42 140 -125 300 -107 209 -133 285 -111 336 6
16 69 82 138 146 162 148 262 261 304 344 29 58 33 75 33 147 0 72 -4 87 -37
156 -31 61 -67 107 -193 242 -223 238 -292 285 -416 286 -57 0 -77 -5 -139
-37 -77 -38 -184 -137 -415 -385 -141 -151 -131 -150 -375 -15 -36 19 -135 57
-220 82 -179 54 -264 91 -302 129 -33 34 -35 45 -27 171 12 184 9 416 -5 487
-31 142 -103 237 -213 278 -94 35 -507 51 -648 25z m461 -2480 c425 -72 715
-337 793 -722 72 -354 -44 -702 -305 -912 -399 -321 -1062 -299 -1427 47 -177
169 -267 390 -268 656 0 138 13 226 51 334 93 271 325 481 627 567 49 14 115
29 148 34 98 14 286 12 381 -4z" />
                                 <path d="M8765 7710 c-126 -6 -217 -25 -278 -57 -49 -25 -108 -85 -134 -136
-50 -99 -57 -165 -58 -496 l0 -304 -104 -24 c-220 -50 -443 -135 -660 -250
-145 -76 -172 -86 -209 -72 -15 6 -115 99 -222 209 -215 219 -281 269 -381
290 -55 12 -71 12 -127 -3 -97 -26 -184 -90 -357 -265 -175 -177 -224 -239
-269 -332 -27 -56 -31 -76 -31 -146 0 -74 4 -88 38 -156 46 -91 139 -197 348
-397 l155 -149 -71 -144 c-112 -226 -195 -473 -220 -656 -12 -85 -17 -100 -42
-121 l-28 -24 -295 6 c-306 7 -424 0 -514 -29 -186 -61 -232 -182 -230 -609 0
-206 3 -254 22 -339 33 -153 87 -219 223 -268 63 -23 70 -23 359 -19 162 3
355 5 429 5 l134 1 28 -83 c65 -194 151 -379 273 -591 37 -64 66 -127 66 -142
0 -21 -13 -38 -52 -70 -81 -66 -393 -361 -479 -451 -92 -97 -133 -162 -154
-246 -27 -106 3 -196 113 -333 102 -128 395 -394 482 -439 124 -63 255 -43
410 63 77 53 196 175 382 390 149 172 185 207 207 207 14 0 121 -47 236 -104
193 -96 382 -171 528 -212 50 -13 56 -18 53 -37 -11 -52 -29 -605 -23 -708 9
-171 45 -273 123 -353 81 -83 161 -101 489 -112 392 -12 547 35 618 189 56
121 64 234 42 596 -19 314 -18 326 40 354 19 9 72 26 117 37 183 46 382 119
558 205 183 88 236 64 485 -225 208 -241 296 -308 421 -318 85 -6 141 15 249
95 129 96 368 339 437 443 75 115 92 163 86 244 -11 134 -113 266 -395 514
-81 71 -149 139 -162 163 -34 60 -25 110 37 212 80 132 99 176 152 355 54 185
87 268 126 319 46 61 58 63 285 54 388 -16 550 17 656 132 89 97 102 148 115
479 10 239 10 276 -6 354 -35 180 -102 251 -277 296 -80 20 -97 20 -339 13
-374 -12 -400 -12 -437 8 -43 23 -64 67 -102 212 -26 100 -45 145 -117 278
-108 197 -143 285 -144 355 0 62 -2 60 204 243 173 154 264 259 319 368 40 81
42 89 42 175 0 81 -3 97 -30 150 -34 67 -141 192 -320 372 -177 178 -259 226
-384 226 -141 -1 -287 -110 -551 -412 -135 -155 -167 -180 -229 -180 -48 0
-70 10 -189 88 -84 55 -144 81 -432 187 -69 25 -152 60 -185 78 l-60 32 0 55
c0 30 6 145 13 254 23 334 -8 507 -106 609 -99 103 -231 121 -697 97z m359
-2704 c55 -14 148 -50 210 -79 540 -262 839 -851 686 -1352 -81 -267 -302
-521 -563 -649 -152 -74 -233 -91 -427 -90 -150 1 -173 3 -255 28 -192 58
-351 144 -487 265 -283 251 -438 566 -438 891 0 259 104 498 306 705 151 155
344 261 549 301 107 20 297 12 419 -20z" />
                             </g>
                         </svg>

                     </div>
                     <p class="title">formule 2</p>
                     <p class="text">
                         Polissage, Traitement rayure & Lustrage</p>
                 </div>
                 <div class="card lg:col-span-2 buttonrdvv">
                     <div class="icon">
                         <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1280.000000pt"
                             height="1100.000000pt" viewBox="0 0 1280.000000 1100.000000"
                             preserveAspectRatio="xMidYMid meet">
                             <metadata>
                                 Created by potrace 1.15, written by Peter Selinger 2001-2017
                             </metadata>
                             <g transform="translate(300.100000,900.000000)  scale(0.050000,-0.050000)"
                                 fill="#FFFFFFF" stroke="none">
                                 <path d="M3165 10985 c-247 -44 -306 -193 -276 -688 12 -185 11 -200 -6 -234
-27 -55 -57 -71 -183 -97 -96 -20 -151 -39 -315 -114 -110 -50 -227 -100 -260
-111 l-60 -21 -66 73 c-36 39 -104 115 -151 167 -175 197 -297 281 -420 288
-59 4 -75 1 -130 -26 -35 -16 -89 -52 -120 -78 -96 -81 -342 -358 -379 -427
-31 -56 -34 -70 -34 -142 0 -68 5 -88 29 -135 44 -85 111 -163 289 -337 l165
-161 -33 -49 c-106 -158 -215 -392 -286 -612 -23 -73 -52 -145 -65 -160 l-22
-26 -289 0 c-329 -1 -357 -6 -437 -76 -92 -81 -116 -176 -116 -451 1 -280 20
-383 89 -474 45 -61 131 -106 230 -123 40 -6 181 -11 328 -11 l259 0 23 -72
c66 -214 196 -491 282 -603 60 -79 71 -101 64 -128 -4 -12 -109 -123 -234
-247 -253 -251 -289 -300 -298 -398 -3 -33 -3 -76 1 -96 22 -117 375 -491 551
-584 72 -38 168 -37 247 2 79 40 167 117 291 254 59 64 151 164 205 222 l99
104 99 -46 c198 -93 344 -146 548 -199 137 -35 129 -16 116 -269 -13 -281 -13
-516 1 -582 21 -100 70 -173 141 -209 84 -43 161 -53 383 -52 400 1 497 35
572 200 55 120 63 251 37 626 -20 281 -26 263 105 302 165 49 317 107 474 183
86 41 158 73 160 71 23 -32 363 -401 413 -450 130 -123 219 -169 329 -169 118
0 178 39 419 271 250 240 301 363 218 525 -46 90 -133 184 -335 362 -102 90
-188 170 -191 179 -12 31 -4 70 25 123 144 255 186 344 246 515 60 173 75 181
323 176 394 -9 462 -7 515 12 103 35 164 117 185 247 18 112 24 385 11 499
-24 204 -67 284 -179 334 -96 43 -213 53 -464 39 -199 -11 -235 -10 -290 13
-30 12 -55 67 -82 178 -22 91 -42 140 -125 300 -107 209 -133 285 -111 336 6
16 69 82 138 146 162 148 262 261 304 344 29 58 33 75 33 147 0 72 -4 87 -37
156 -31 61 -67 107 -193 242 -223 238 -292 285 -416 286 -57 0 -77 -5 -139
-37 -77 -38 -184 -137 -415 -385 -141 -151 -131 -150 -375 -15 -36 19 -135 57
-220 82 -179 54 -264 91 -302 129 -33 34 -35 45 -27 171 12 184 9 416 -5 487
-31 142 -103 237 -213 278 -94 35 -507 51 -648 25z m461 -2480 c425 -72 715
-337 793 -722 72 -354 -44 -702 -305 -912 -399 -321 -1062 -299 -1427 47 -177
169 -267 390 -268 656 0 138 13 226 51 334 93 271 325 481 627 567 49 14 115
29 148 34 98 14 286 12 381 -4z" />
                                 <path d="M8765 7710 c-126 -6 -217 -25 -278 -57 -49 -25 -108 -85 -134 -136
-50 -99 -57 -165 -58 -496 l0 -304 -104 -24 c-220 -50 -443 -135 -660 -250
-145 -76 -172 -86 -209 -72 -15 6 -115 99 -222 209 -215 219 -281 269 -381
290 -55 12 -71 12 -127 -3 -97 -26 -184 -90 -357 -265 -175 -177 -224 -239
-269 -332 -27 -56 -31 -76 -31 -146 0 -74 4 -88 38 -156 46 -91 139 -197 348
-397 l155 -149 -71 -144 c-112 -226 -195 -473 -220 -656 -12 -85 -17 -100 -42
-121 l-28 -24 -295 6 c-306 7 -424 0 -514 -29 -186 -61 -232 -182 -230 -609 0
-206 3 -254 22 -339 33 -153 87 -219 223 -268 63 -23 70 -23 359 -19 162 3
355 5 429 5 l134 1 28 -83 c65 -194 151 -379 273 -591 37 -64 66 -127 66 -142
0 -21 -13 -38 -52 -70 -81 -66 -393 -361 -479 -451 -92 -97 -133 -162 -154
-246 -27 -106 3 -196 113 -333 102 -128 395 -394 482 -439 124 -63 255 -43
410 63 77 53 196 175 382 390 149 172 185 207 207 207 14 0 121 -47 236 -104
193 -96 382 -171 528 -212 50 -13 56 -18 53 -37 -11 -52 -29 -605 -23 -708 9
-171 45 -273 123 -353 81 -83 161 -101 489 -112 392 -12 547 35 618 189 56
121 64 234 42 596 -19 314 -18 326 40 354 19 9 72 26 117 37 183 46 382 119
558 205 183 88 236 64 485 -225 208 -241 296 -308 421 -318 85 -6 141 15 249
95 129 96 368 339 437 443 75 115 92 163 86 244 -11 134 -113 266 -395 514
-81 71 -149 139 -162 163 -34 60 -25 110 37 212 80 132 99 176 152 355 54 185
87 268 126 319 46 61 58 63 285 54 388 -16 550 17 656 132 89 97 102 148 115
479 10 239 10 276 -6 354 -35 180 -102 251 -277 296 -80 20 -97 20 -339 13
-374 -12 -400 -12 -437 8 -43 23 -64 67 -102 212 -26 100 -45 145 -117 278
-108 197 -143 285 -144 355 0 62 -2 60 204 243 173 154 264 259 319 368 40 81
42 89 42 175 0 81 -3 97 -30 150 -34 67 -141 192 -320 372 -177 178 -259 226
-384 226 -141 -1 -287 -110 -551 -412 -135 -155 -167 -180 -229 -180 -48 0
-70 10 -189 88 -84 55 -144 81 -432 187 -69 25 -152 60 -185 78 l-60 32 0 55
c0 30 6 145 13 254 23 334 -8 507 -106 609 -99 103 -231 121 -697 97z m359
-2704 c55 -14 148 -50 210 -79 540 -262 839 -851 686 -1352 -81 -267 -302
-521 -563 -649 -152 -74 -233 -91 -427 -90 -150 1 -173 3 -255 28 -192 58
-351 144 -487 265 -283 251 -438 566 -438 891 0 259 104 498 306 705 151 155
344 261 549 301 107 20 297 12 419 -20z" />
                             </g>
                         </svg>

                     </div>
                     <p class="title">formule 3</p>
                     <p class="text">
                         Polissage, Traitement rayure, Lustrage & Rénovation phare</p>
                 </div>

             </div>
               <div class="">
                 <a class="fancy precedent w-screen sm:w-auto  !important">
                     <span class="top-key"></span>
                     <span class="text">precedent</span>
                     <span class="bottom-key-1"></span>
                     <span class="bottom-key-2"></span>
                 </a>
                 <a class="fancy suivant w-screen mt-4 !important sm:w-auto">
                     <span class="top-key"></span>
                     <span class="text">suivant</span>
                     <span class="bottom-key-1"></span>
                     <span class="bottom-key-2"></span>
                 </a>
             </div>
         </div>


         <div id="rdv_step_4" class="flex flex-col items-center justify-center mx-14 mt-20  hidden  ">
             <div class="text-white col-span-2 text-center text-lg h-24 py-4"> ETAPE 4 : DECRIVER VOTRE VOITURE !
             </div>
             <div class="form-container w-full">

                 <div class="form-group ">
                     <label for="textarea">VOITURE</label>
                     <textarea class="w-full" required="" id="voiture" cols="50" rows="10" name="textarea"
                         placeholder="VOITURE"></textarea>
                 </div>


             </div>
              <div class="">
                 <a class="fancy precedent w-screen sm:w-auto  !important">
                     <span class="top-key"></span>
                     <span class="text">precedent</span>
                     <span class="bottom-key-1"></span>
                     <span class="bottom-key-2"></span>
                 </a>
                 <a class="fancy suivant w-screen mt-4 !important sm:w-auto">
                     <span class="top-key"></span>
                     <span class="text">suivant</span>
                     <span class="bottom-key-1"></span>
                     <span class="bottom-key-2"></span>
                 </a>
             </div>
         </div>

         <div id="rdv_step_5" class="flex flex-col items-center justify-center mx-14 mt-20 hidden ">
             <div class="text-white col-span-2 text-center text-lg h-24 py-4"> ETAPE 5 : QUEL TYPE DE MODEL !
             </div>
             <div
                 class="grid grid-cols-1 grid-rows-auto lg:grid-cols-3 lg:grid-rows-1 place-content-center  items-center gap-5 flex flex-col items-center justify-center">


                 <div class="card w-64 h-64 buttonrdvvv">

                     <p class="title pb-6">BERLINE</p>

                 </div>
                 <div class="card w-64 h-64 buttonrdvvv">

                     <p class="title pb-6">COUPE</p>

                 </div>
                 <div class="card w-64 h-64 buttonrdvvv">

                     <p class="title pb-6">GRAND BERLINE</p>

                 </div>
                 <div class="card w-64 h-64 buttonrdvvv">

                     <p class="title pb-6">SUV</p>

                 </div>
                 <div class="card w-64 h-64 buttonrdvvv">

                     <p class="title pb-6">GRAND SUV</p>

                 </div>

             </div>
             <div class="">
                 <a class="fancy precedent w-screen sm:w-auto  !important">
                     <span class="top-key"></span>
                     <span class="text">precedent</span>
                     <span class="bottom-key-1"></span>
                     <span class="bottom-key-2"></span>
                 </a>
                 <a class="fancy suivant w-screen mt-4 !important sm:w-auto">
                     <span class="top-key"></span>
                     <span class="text">suivant</span>
                     <span class="bottom-key-1"></span>
                     <span class="bottom-key-2"></span>
                 </a>
             </div>
         </div>


         <div id="rdv_step_6" class="flex flex-col items-center justify-center mx-14 mt-20  hidden  ">
             <div class="text-white col-span-2 text-center text-lg h-24 py-4"> ETAPE 6 : LAISSEZ NOUS UN MESSAGE OU
                 UNE DEMANDE SPECIAL !</div>
                 <div class="form-container w-full">

                 <div class="form-group">
                     <label for="textarea">MESSAGE</label>
                     <textarea required="" id="message" cols="50" rows="10" name="textarea"
                         placeholder="Email">          </textarea>
                 </div>


             </div>
             <div class="">
                 <a class="fancy precedent w-screen sm:w-auto  !important">
                     <span class="top-key"></span>
                     <span class="text">precedent</span>
                     <span class="bottom-key-1"></span>
                     <span class="bottom-key-2"></span>
                 </a>
                 <a class="fancy suivant w-screen mt-4 !important sm:w-auto">
                     <span class="top-key"></span>
                     <span class="text">suivant</span>
                     <span class="bottom-key-1"></span>
                     <span class="bottom-key-2"></span>
                 </a>
             </div>
         </div>



         <div id="rdv_step_7" class="flex flex-col items-center justify-center mx-14 mt-20  hidden  ">
             <div class="text-white col-span-2 text-center text-lg h-24 py-4"> VOICI UN RECAPITULATIF DE VOTRE
                 RENDEZ-VOUS </div>

             <div
                 class="grid grid-cols-1 grid-rows-4 place-content-center mx-14 items-center gap-5 flex flex-col items-center justify-center w-full">

                 <div class=" bg-black border border-white flex items-center justify-center text-white text-center h-24 "
                     >
                     <p class="title pb-6" id="date_recap"></p>
                 </div>

                 <div class=" bg-black border border-white flex items-center justify-center text-white text-center h-24 "
                     >

                     <p class="title pb-6" id="heure_recap">10H</p>

                 </div>
                 <div class=" bg-black  border border-white flex items-center justify-center text-white text-center h-24 "
                     >

                     <p class="title pb-6" id="formule_recap">formule1</p>

                 </div>
                 <div class=" bg-black border border-white flex items-center justify-center text-white text-center h-24 "
                     >

                     <p class="title pb-6" id="voiture_recap">voiture :</p>

                 </div>
                 <div class=" bg-black flex border border-white items-center justify-center text-white text-center h-24 "
                     >

                     <p class="title pb-6" id="model_recap">model :</p>

                 </div>
                 <div class=" bg-black flex border border-white items-center justify-center text-white text-center h-24 "
                     >

                     <p class="title pb-6" id="message_recap">message :</p>

                 </div>
                 <div class=" bg-black flex border border-white items-center justify-center text-white text-center h-24 "
                    >

                     <p class="title pb-6" id="prix_recap">prix estimer à :</p>

                 </div>
             </div>

             <a class="fancy suivant" id="envoyer">
                 <span class="top-key"></span>
                 <span class="text">ENVOYER</span>
                 <span class="bottom-key-1"></span>
                 <span class="bottom-key-2"></span>
             </a>

         </div>
     </div>



     <div class="  col-span-3 w-full    containerr  xl:mx-14" id="rdv_statue">

         <div class="flex flex-col items-center justify-center mx-14 mt-44 ">
             <div class="text-white col-span-2 text-center text-lg h-24 py-4"> CONSULTER VOS RENDEZ-VOUS !
                 VOIR, SUPPRIMER...</div>
                 <div class="grid grid-cols-1 grid-rows-2 place-content-center w-full items-center gap-5 flex flex-col items-center justify-center">


                 <?php
                 $resultats = $manager->voir_rdv();
                 foreach ($resultats as $voir) {
                     if ($resultats) {
                         echo $voir;
                     }

                 }
                 ?>

             </div>

         </div>

     </div>
     <div class="  col-span-3 w-full    containerr  xl:mx-14" id="rdv_historique">

         <div class="flex flex-col items-center justify-center mx-14 mt-44 ">
             <div class="text-white col-span-2 text-center text-lg h-24 py-4"> HISTORIQUE !</div>
             <div class="  place-content-center w-full   items-center gap-5 flex flex-col items-center justify-center"
                 style="height: auto">

                 <?php
                 $resultats = $manager->voir_rdv_historique();
                 foreach ($resultats as $voir) {
                     if ($resultats) {
                         echo $voir;
                     }

                 }
                 ?>

             </div>

         </div>

     </div>
     <div class="  col-span-3 w-full    containerr  xl:mx-14" id="rdv_compte">

         <div class="flex flex-col items-center justify-center mx-14 mt-44 gap-y-4 ">
             <div class="text-white col-span-2 text-center text-lg h-24 py-4"> VOTRE COMPTE !</div>
           


                 <?php
                 $resultats = $manager->voircompte();
                 echo $resultats;


                 ?>


             </div>

         </div>



     </div>



 <form method="post" id="post">
     <input type="hidden" required="" id="date_cache" name="date_cache">
     <input type="hidden" required="" id="heure_cache" name="heure_cache">
     <input type="hidden" required="" id="formule_cache" name="formule_cache">
     <input type="hidden" required="" id="message_cache" name="message_cache">
     <input type="hidden" required="" id="voiture_cache" name="voiture_cache">
     <input type="hidden" required="" id="guabarie_cache" name="guabarie_cache">
     <input type="hidden" required="" id="prix_cache" name="prix_cache">
     <input type="submit" name="post" value="Envoyer" class="hidden">
 </form>
 <?php
 if (isset($_POST['prenom'])) {

     $prenom = $_POST["prenomPost"];
     $_SESSION['prenom'] = $prenom;
     $compte = new user_manager($bd);
     $compte->modifierprenom($prenom);
     echo '<script>alert("PRENOM MODIFIER AVEC SUCCEES !");</script>';
     echo '<meta http-equiv="refresh" content="0;url=rendez_vous.php">';
     exit();
 }
 if (isset($_POST['nomPost'])) {

     $nom = $_POST["nomPost"];
     $_SESSION['nom'] = $nom;
     $compte = new user_manager($bd);
     $compte->modifierNom($nom);
     echo '<script>alert("NOM MODIFIER AVEC SUCCEES !");</script>';
     echo '<meta http-equiv="refresh" content="0;url=rendez_vous.php">';
     exit();
 }
 if (isset($_POST['telephonePost'])) {

     $tel = $_POST["telephonePost"];
     $_SESSION['telephone'] = $tel;
     $compte = new user_manager($bd);
     $compte->modifierTelephone($tel);
     echo '<script>alert("NUMERO DE TELEPHONE MODIFIER AVEC SUCCEES !");</script>';
     echo '<meta http-equiv="refresh" content="0;url=rendez_vous.php">';
     exit();
 }
 if (isset($_POST['emailPost'])) {

     $email = $_POST["emailPost"];
     $_SESSION['email'] = $email;
     $compte = new user_manager($bd);
     $compte->modifierEmail($email);
     echo '<script>alert("EMAIL MODIFIER AVEC SUCCEES !");</script>';
     echo '<meta http-equiv="refresh" content="0;url=rendez_vous.php">';
     exit();
 }
 if (isset($_POST['mdpPost'])) {
     $mdpe = $_POST['mdpPoste'];
     $mdp = $_POST['mdpPost'];

     if ($mdpe == $mdp) {
         $compte = new user_manager($bd);
         $compte->modifierMotDePasse($mdp);
         echo '<script>alert("MOT DE PASSE MODIFIER AVEC SUCCEES !");</script>';
         echo '<meta http-equiv="refresh" content="0;url=rendez_vous.php">';
         exit();
     } else {
         // Display an error message or redirect back to the form page
         echo '<script>alert("Mots de passe ne correspondent pas");</script>';
         echo '<meta http-equiv="refresh" content="0;url=rendez_vous.php">';
         exit();

     }
 }

 use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
 try{
 
 
 if (isset($_POST['post'])) {
   
        
   
    require '../../src/Exception.php';
    require '../../src/PHPMailer.php';
    require '../../src/SMTP.php';
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'polishpro44@gmail.com';
    $mail->Password = 'oetq czoc bzes wivy';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
   
    $mail->setFrom('polishpro4@gmail.com');
    $mail->addAddress('polishpro4@gmail.com');
    $mail->isHTML(true);
   
    $mail->Subject = 'Polish Nantes NOUVEAUX RENDEZ-VOUS!!'; // Définissez le sujet de l'e-mail ici
   
    // Concaténez la valeur de $voitureMarque à la chaîne du corps de l'e-mail
    $mail->Body = "Un nouveau créneau de rendez-vous est désormais disponible. Voici un aperçu des détails :
    <b      r> Date : ".$_POST["date_cache"].
    "<br> Heure : ".$_POST["heure_cache"].
    "<br> Formule : ".$_POST["formule_cache"].
    "<br> Message : ".$_POST["message_cache"].
    "<br> Voiture : ".$_POST["voiture_cache"].
    "<br> gabarit : ".$_POST["guabarie_cache"].
    "<br> Prix : ".$_POST["prix_cache"].
    "<br> Pour modifier, supprimer ou confirmer ce rendez-vous, veuillez accéder au site : https://polishnantes.com/connexion.php";

     // Récupérer les valeurs des champs textarea
     $date_cache = $_POST["date_cache"];
     $heure_cache = $_POST["heure_cache"];
     $formule_cache = $_POST["formule_cache"];
     $message_cache = $_POST["message_cache"];
     $voiture_cache = $_POST["voiture_cache"];
     $guabarie_cache = $_POST["guabarie_cache"];
     $prix_cache = $_POST["prix_cache"];
     $rdv = new rendez_vous([
         'date' => $date_cache,
         'heure' => $heure_cache,
         'formule' => $formule_cache,
         'message' => $message_cache,
         'voiture' => $voiture_cache,
         'model' => $guabarie_cache,
         'prix' => $prix_cache,
     ]);
     $mail->send();
     $manager->add($rdv);
     echo '<meta http-equiv="refresh" content="0;url=rendez_vous.php">';
     exit();
 }
}
catch (PDOException $e) {
    // Gérer l'erreur, par exemple, afficher un message ou journaliser l'erreur
    echo "Erreur lors de l'ajout de rendez-vous : " . $e->getMessage();
}
 ?>



<script src="../../js/rendez-vous/calandrier.js"></script>
<script src="../../js/rendez-vous/prise_rdv.js"></script>