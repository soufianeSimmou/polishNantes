<body>

 
    <div class="lg:pb-44 bg-black border-t border-b border-pink-500 text-black flex items-center justify-center " style="background: rgb(31,31,31);
background:linear-gradient(302deg, rgba(21,21,21,1) 50%, rgba(96,1,74,1) 100%);">
        <div class="lg:mt-44 ">
            <form class="form " method="post" action="" id="formulaire">
                <div class="flex-column">
                    <label>Nom </label>
                </div>
                <div class="inputForm" id="nom_parent">
                    <!-- Add an SVG or icon for the name field -->
                    <input type="text" class="input" placeholder="Nom" name="nom" id="nom">
                    <div class="font-black text-2xl text-lime-500 hidden">√</div>
                    <div class="font-bold text-2xl text-red-500  hidden">X</div>
                </div>
                <div class=" text-red-500 hidden" id="phrase_nom"> Le nom doit avoir une longueur comprise entre 1 et 22
                    caractères et ne doit contenir aucun caractère spécial.</div>
                <div class="flex-column">
                    <label>Prenom</label>
                </div>
                <div class="inputForm" id="prenom_parent">
                    <!-- Add an SVG or icon for the surname field -->
                    <input type="text" class="input" placeholder="Prenom" name="prenom" id="prenom">
                    <div class="font-black text-2xl text-lime-500 hidden">√</div>
                    <div class="font-bold text-2xl text-red-500  hidden">X</div>
                </div>
                <div class=" text-red-500 hidden" id="phrase_prenom"> Le prenom doit avoir une longueur comprise entre 2
                    et 22 caractères et ne doit contenir aucun caractère spécial.</div>
                <div class="flex-column">
                    <label>Numero de Telephone</label>
                </div>
                <div class="inputForm" id="tel_parent">
                    <!-- Add an SVG or icon for the phone number field -->
                    <input type="tel" class="input" placeholder="Numero de Telephone" name="telephone" id="tel">
                    <div class="font-black text-2xl text-lime-500 hidden">√</div>
                    <div class="font-bold text-2xl text-red-500  hidden">X</div>
                </div>
                <div class=" text-red-500 hidden" id="phrase_telephone">Le numéro de téléphone doit comporter exactement
                    10 chiffres.</div>
                <div class="flex-column">
                    <label>Email </label>
                </div>
                <div class="inputForm" id="email_parent">
                    <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                        <!-- SVG content -->
                    </svg>
                    <input type="email" class="input" placeholder="Email" name="email" autocomplete="username"
                        id="email">
                    <div class="font-black text-2xl text-lime-500 hidden">√</div>
                    <div class="font-bold text-2xl text-red-500  hidden">X</div>
                </div>
                <div class=" text-red-500 hidden" id="phrase_email">L'adresse e-mail doit être valide, conformément à la
                    structure standard, sans caractères spéciaux inappropriés.</div>
                <div class="flex-column">
                    <label>mot de passe </label>
                </div>
                <div class="inputForm" id="mdp_parent">
                    <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg">
                        <!-- SVG content -->
                    </svg>
                    <input type="password" class="input" placeholder="mot de passe" name="mdp"
                        autocomplete="current-password" id="mdp">
                    <div class="font-black text-2xl text-lime-500 hidden">√</div>
                    <div class="font-bold text-2xl text-red-500  hidden">X</div>
                </div>
                <div class=" text-red-500 hidden" id="phrase_mdp">Le mot de passe doit respecter les critères de
                    sécurité, comprenant au moins 8 caractères,</br> une combinaison de lettres majuscules et minuscules,</br> au
                    moins un chiffre,</br> et un caractère spécial.</div>

                <div class="flex-column">
                    <label> confirmer mot de passe </label>
                </div>
                <div class="inputForm" id="mdpconfirme_parent">
                    <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg">
                        <!-- SVG content -->
                    </svg>
                    <input type="password" class="input" placeholder="confirme mot de passe"
                        autocomplete="current-password" id="mdpconfirme">
                    <div class="font-black text-2xl text-lime-500 hidden">√</div>
                    <div class="font-bold text-2xl text-red-500  hidden">X</div>
                </div>
                <div class=" text-red-500 hidden" id="phrase_mdpconfirmer">La confirmation du mot de passe doit être identique au mot de passe précédemment saisi</div>
                <button class="button-submit .button-submit" name="inscrire" value="inscrire" type="submit" >S'inscrire</button>
            </form>
        </div>
    </div>
    <script src="../../js/formule/formulaire_inscription.js"></script>


</body>