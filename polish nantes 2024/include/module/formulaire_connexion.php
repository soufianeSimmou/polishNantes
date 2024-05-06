<body>

    <div class="lg:pb-44 bg-black border-t border-b border-pink-500 text-black flex items-center justify-center "style="background: rgb(31,31,31);
background:linear-gradient(302deg, rgba(21,21,21,1) 50%, rgba(96,1,74,1) 100%);">
        <div class="lg:mt-44">
        <form class="form" method="post" action="" id="formulaire">
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
                <div class=" text-red-500 hidden" id="phrase_email">Le mot de passe ou l'adresse e-mail semble incorrecte.</div>
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
                <div class=" text-red-500 hidden" id="phrase_mdp">Le mot de passe ou l'adresse e-mail semble incorrecte.</div>
   
                <button class=".button-submit button-submit " name="connecter" value="connecter" type="submit">se connecter</button>
    <p class="p">tu n'as pas de compte ? <a href="inscription.php" class="span">s'inscrire</a>

  </form>

        </div>
        </form>
    </div>

    <script src="../../js/formule/formulaire_connexion.js"></script>

</body>