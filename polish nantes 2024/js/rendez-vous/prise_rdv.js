var step = 0;
var categorie = 0;
var prixformule = 0;
var prixmodel = 0;
var prixfinal = 0;
document.addEventListener("DOMContentLoaded", function () {
    const button = document.getElementsByClassName("add_rdv");
    const precedent = document.getElementsByClassName("precedent");
    const buttonrdv = document.getElementsByClassName("buttonrdv");
    const buttonrdvv = document.getElementsByClassName("buttonrdvv");
    const buttonrdvvv = document.getElementsByClassName("buttonrdvvv");
    const menu = document.getElementsByClassName("menu");
    const suivant = document.getElementsByClassName("suivant");
    const step_1 = document.getElementById("rdv_step_1");
    const step_2 = document.getElementById("rdv_step_2");
    const step_3 = document.getElementById("rdv_step_3");
    const step_4 = document.getElementById("rdv_step_4");
    const step_5 = document.getElementById("rdv_step_5");
    const step_6 = document.getElementById("rdv_step_6");
    const step_7 = document.getElementById("rdv_step_7");
    const date_recap = document.getElementById("date_recap");
    const heure_recap = document.getElementById("heure_recap");
    const formule_recap = document.getElementById("formule_recap");
    const message_recap = document.getElementById("message_recap");
    const voiture_recap = document.getElementById("voiture_recap");
    const model_recap = document.getElementById("model_recap");
    const prix_recap = document.getElementById("prix_recap");
    const rdv_accueil = document.getElementById("rdv_accueil");
    const rdv_etape = document.getElementById("rdv_etape");
    const rdv_statue = document.getElementById("rdv_statue");
    const rdv_compte = document.getElementById("rdv_compte");
    const rdv_historique = document.getElementById("rdv_historique");
    const voiture = document.getElementById("voiture");
    const date = document.getElementById("date");
    const date_cacher = document.getElementById("date_cache");
    const formule_cacher = document.getElementById("formule_cache");
    const heure_cacher = document.getElementById("heure_cache");
    const voiture_cache = document.getElementById("voiture_cache");
    const guabarie_cache = document.getElementById("guabarie_cache");
    const prix_cache = document.getElementById("prix_cache");
    const message = document.getElementById("message");
    const message_cacher = document.getElementById("message_cache");
    rdv_historique.classList.add("hidden");
    rdv_statue.classList.add("hidden");
    rdv_compte.classList.add("hidden");
    menu[0].style.backgroundColor = "white";
    menu[0].children[1].style.color = "black";
    menu[0].addEventListener("click", function () {
        rdv_accueil.classList.remove("hidden");
        rdv_etape.classList.remove("hidden");
        rdv_statue.classList.add("hidden");
        rdv_compte.classList.add("hidden");
        rdv_historique.classList.add("hidden");
    });

    menu[1].addEventListener("click", function () {
        rdv_accueil.classList.add("hidden");
        step = 0;
        rdv_etape.classList.add("hidden");
        rdv_statue.classList.remove("hidden");
        step_1.classList.add("hidden");
        step_2.classList.add("hidden");
        step_3.classList.add("hidden");
        step_4.classList.add("hidden");
        step_5.classList.add("hidden");
        step_6.classList.add("hidden");
        step_7.classList.add("hidden");
        rdv_historique.classList.add("hidden");
        rdv_compte.classList.add("hidden");
    });
    menu[2].addEventListener("click", function () {
        rdv_compte.classList.add("hidden");
        step = 0;
        rdv_historique.classList.remove("hidden");
        rdv_accueil.classList.add("hidden");
        rdv_etape.classList.add("hidden");
        rdv_statue.classList.add("hidden");
        step_1.classList.add("hidden");
        step_2.classList.add("hidden");
        step_3.classList.add("hidden");
        step_4.classList.add("hidden");
        step_5.classList.add("hidden");
        step_6.classList.add("hidden");
        step_7.classList.add("hidden");
    });
    menu[3].addEventListener("click", function () {
        rdv_compte.classList.remove("hidden");
        step = 0;
        rdv_historique.classList.add("hidden");
        rdv_accueil.classList.add("hidden");
        rdv_etape.classList.add("hidden");
        rdv_statue.classList.add("hidden");
        step_1.classList.add("hidden");
        step_2.classList.add("hidden");
        step_3.classList.add("hidden");
        step_4.classList.add("hidden");
        step_5.classList.add("hidden");
        step_6.classList.add("hidden");
        step_7.classList.add("hidden");
    });
    menu[4].addEventListener("click", function () {
        var nouvelleURL = "../../include/module/destroy_session.php";

        // Effectuez la redirection de la page
        window.location.href = nouvelleURL;
    });
    Array.from(button).forEach(function (element, index) {
        element.addEventListener("click", function () {
            step++;
            rdv_accueil.classList.add("hidden");
            step_1.classList.remove("hidden");
        });
    });
    // Stocke la référence de l'élément qui a été précédemment modifié


    let elementModifie = null;

    Array.from(buttonrdv).forEach(function (element, index) {
        element.addEventListener("click", function () {
            // Vérifiez si un autre élément a été modifié précédemment
            if (elementModifie && elementModifie !== element) {
                // Rétablissez les styles de l'élément précédemment modifié
                annulerStyless(elementModifie);
            }

            heure_cacher.value = element.children[0].querySelector('p').textContent;
            heure_recap.textContent = "VOTRE HEURE : " + heure_cacher.value;

            // Modifiez la hauteur de l'élément
            element.style.height = "30vh";

            // Modifiez le background-position de l'élément
            element.style.backgroundPosition = "-120px";
            element.style.transition = "all 0.3s ease";

            // Modifiez le background-position de l'enfant de l'élément (si l'enfant est direct)
            const childElement = element.querySelector(':first-child'); // Utilisez le sélecteur approprié
            if (childElement) {
                childElement.style.backgroundPosition = "-120px";
                childElement.style.transition = "all 0.3s ease";
            }

            // Stocke la référence de l'élément actuellement modifié
            elementModifie = element;
        });
    });

    // Fonction pour annuler les styles d'un élément
    function annulerStyless(element) {
        if (element) {
            element.style.height = ""; // Rétablit la hauteur par défaut
            element.style.backgroundPosition = ""; // Rétablit le background-position par défaut
            element.style.transition = ""; // Rétablit la transition par défaut

            const childElement = element.querySelector(':first-child'); // Utilisez le sélecteur approprié
            if (childElement) {
                childElement.style.backgroundPosition = ""; // Rétablit le background-position de l'enfant par défaut
                childElement.style.transition = ""; // Rétablit la transition de l'enfant par défaut
            }
        }
    }

    let elementModifiee = null;

    Array.from(buttonrdvv).forEach(function (element, index) {
        element.addEventListener("click", function () {
            // Vérifiez si un autre élément a été modifié précédemment
            if (elementModifiee && elementModifiee !== element) {
                // Rétablissez les styles de l'élément précédemment modifié
                annulerStyles(elementModifiee);
            }

            // Modifiez la hauteur de l'élément
            element.style.height = "30vh";
            // Modifiez le background-position de l'élément
            element.style.backgroundPosition = "-120px";
            element.style.transition = "all 0.3s ease";

            // Modifiez le background-position de l'enfant de l'élément (si l'enfant est direct)
            const childElement = element.querySelector('.icon'); // Adjust the selector to match your HTML structure
            if (childElement) {
                childElement.style.backgroundPosition = "-120px";
                childElement.style.transition = "all 0.3s ease";
            }

            // Set formule_cacher to the text content of the second <p> element
            formule_cacher.value = element.querySelector('.title').textContent;
            formule_recap.textContent = "VOTRE FORMULE : " + formule_cacher.value;
            if(formule_cacher.value == "formule 1")
            {
                prixformule = 100;
            }
            else if(formule_cacher.value == "formule 2")
            {
                prixformule = 150;

            } 
            else if(formule_cacher.value == "formule 3"){ 
                prixformule = 180;
            }
            // Stocke la référence de l'élément actuellement modifié
            elementModifiee = element;
        });
    });


    // Fonction pour annuler les styles d'un élément
    function annulerStyles(element) {
        if (element) {
            element.style.height = ""; // Rétablit la hauteur par défaut
            element.style.backgroundPosition = ""; // Rétablit le background-position par défaut
            element.style.transition = ""; // Rétablit la transition par défaut

            const childElement = element.querySelector(':first-child'); // Utilisez le sélecteur approprié
            if (childElement) {
                childElement.style.backgroundPosition = ""; // Rétablit le background-position de l'enfant par défaut
                childElement.style.transition = ""; // Rétablit la transition de l'enfant par défaut
            }
        }
    }
    let elementModifiemenu = menu[0];

    Array.from(menu).forEach(function (element, index) {
        element.addEventListener("click", function () {
            // Vérifiez si un autre élément a été modifié précédemment
            if (elementModifiemenu && elementModifiemenu !== element) {
                // Rétablissez les styles de l'élément précédemment modifié
                annulerStyle(elementModifiemenu);
            }
            categorie = index;
          
            // Modifiez la hauteur de l'élément
            element.style.backgroundColor = "white"; // "backgroundColor" au lieu de "backgroundcolor" et pas de "!important"
            element.children[1].style.color = "black"; // texte black
            // Stocke la référence de l'élément actuellement modifié
            elementModifiemenu = element;
        });
    });

    // Fonction pour annuler les styles d'un élément
    function annulerStyle(element) {
        if (element) {
            element.style.backgroundColor = ""; // "backgroundColor" au lieu de "backgroundcolor" et pas de "!important"
            element.children[1].style.color = "white"; // texte black
        }
    }

    let elementModifiev = null;

    Array.from(buttonrdvvv).forEach(function (element, index) {
        element.addEventListener("click", function () {
            // Vérifiez si un autre élément a été modifié précédemment
            if (elementModifiev && elementModifiev !== element) {
                // Rétablissez les styles de l'élément précédemment modifié
                annulerStyless(elementModifiev);
            }

            guabarie_cache.value =  element.querySelector('.title').textContent;
            model_recap.textContent = "VOTRE MODEL : " + guabarie_cache.value;
            if( guabarie_cache.value == "BERLINE" || "BREAK" || "COUPÉ"){
                prixmodel = 30;
            }
            else if (guabarie_cache.value == "SUV" || "CROSSOVER" || "CAMIONNETTE")
            {
                prixmodel = 50;
            }
            // Modifiez la hauteur de l'élément
            element.style.height = "30vh";

            // Modifiez le background-position de l'élément
            element.style.backgroundPosition = "-120px";
            element.style.transition = "all 0.3s ease";
            element.style.backgroundColor = "white";

            // Modifiez le background-position de l'enfant de l'élément (si l'enfant est direct)
            const childElement = element.querySelector(':first-child'); // Utilisez le sélecteur approprié
            if (childElement) {
                childElement.style.backgroundPosition = "-120px";
                childElement.style.transition = "all 0.3s ease";
                childElement.style.color = "black";
              
            }

            // Stocke la référence de l'élément actuellement modifié
            elementModifiev = element;
        });
    });

    // Fonction pour annuler les styles d'un élément
    function annulerStyless(element) {
        if (element) {
            element.style.height = ""; // Rétablit la hauteur par défaut
            element.style.backgroundPosition = ""; // Rétablit le background-position par défaut
            element.style.transition = ""; // Rétablit la transition par défaut
            element.style.backgroundColor = "#292929";
            element.style.color = "white";
            const childElement = element.querySelector(':first-child'); // Utilisez le sélecteur approprié
            if (childElement) {
                childElement.style.backgroundPosition = ""; // Rétablit le background-position de l'enfant par défaut
                childElement.style.transition = "";
                childElement.style.color = "white";
                // Rétablit la transition de l'enfant par défaut
            }
        }
    }
    // Ajout de la balise script manquante pour le code JavaScript

    Array.from(precedent).forEach(function (element, index) {
        element.addEventListener("click", function () {
            // Décrémentez la valeur de la variable 'step' pour revenir à l'étape précédente
            step--;


            // Ajoutez des conditions pour afficher les étapes en fonction de la valeur de 'step'
            if (step === 0) {
                rdv_accueil.classList.remove("hidden");
                step_1.classList.add("hidden");
                step_2.classList.add("hidden");
                step_3.classList.add("hidden");
                step_4.classList.add("hidden");
                step_5.classList.add("hidden");
                step_6.classList.add("hidden");
            } else if (step === 1) {
                rdv_accueil.classList.add("hidden");
                step_1.classList.remove("hidden");
                step_2.classList.add("hidden");
                step_3.classList.add("hidden");
                step_4.classList.add("hidden");
                step_5.classList.add("hidden");
                step_6.classList.add("hidden");
            } else if (step === 2) {
                rdv_accueil.classList.add("hidden");
                step_1.classList.add("hidden");
                step_2.classList.remove("hidden");
                step_3.classList.add("hidden");
                step_4.classList.add("hidden");
                step_5.classList.add("hidden");
                step_6.classList.add("hidden");
            } else if (step === 3) {
                rdv_accueil.classList.add("hidden");
                step_1.classList.add("hidden");
                step_2.classList.add("hidden");
                step_3.classList.remove("hidden");
                step_4.classList.add("hidden");
                step_5.classList.add("hidden");
                step_6.classList.add("hidden");
            } else if (step === 4) {
                rdv_accueil.classList.add("hidden");
                step_1.classList.add("hidden");
                step_2.classList.add("hidden");
                step_3.classList.add("hidden");
                step_4.classList.remove("hidden");
                step_5.classList.add("hidden");
                step_6.classList.add("hidden");
            }
            else if (step === 5) {
                rdv_accueil.classList.add("hidden");
                step_1.classList.add("hidden");
                step_2.classList.add("hidden");
                step_3.classList.add("hidden");
                step_4.classList.add("hidden");
                step_5.classList.remove("hidden");
                step_6.classList.add("hidden");
                step_7.classList.add("hidden");
            }
            else if (step === 6) {


                rdv_accueil.classList.add("hidden");
                step_1.classList.add("hidden");
                step_2.classList.add("hidden");
                step_3.classList.add("hidden");
                step_4.classList.add("hidden");
                step_5.classList.add("hidden");
                step_6.classList.remove("hidden");
                step_7.classList.add("hidden");
            }
            else if (step === 7) {


                rdv_accueil.classList.add("hidden");
                step_1.classList.add("hidden");
                step_2.classList.add("hidden");
                step_3.classList.add("hidden");
                step_4.classList.add("hidden");
                step_5.classList.add("hidden");
                step_6.classList.add("hidden");
                step_7.classList.remove("hidden");

            }
        });
    });
    Array.from(suivant).forEach(function (element, index) {
        element.addEventListener("click", function () {
            voiture_cache.value = voiture.value;
            date_cacher.value = date.value;
            step++;
            if (step == 2 && date_cacher.value == '') {

                step = 1;

            }
            if (step == 3 && heure_cacher.value == '') {

                step = 2;

            }
            if (step == 4 && formule_cacher.value == '') {

                step = 3;

            }
            if (step == 5 && voiture_cache.value == '') {

                step = 4;

            }  if (step == 6 && guabarie_cache.value == '') {

                step = 5;

            }
            
            if (step > 7) {
                step = 7;
            }
       
            // Ajoutez des conditions pour afficher les étapes en fonction de la valeur de 'step'
            if (step === 0) {
                rdv_accueil.classList.remove("hidden");
                step_1.classList.add("hidden");
                step_2.classList.add("hidden");
                step_3.classList.add("hidden");
                step_4.classList.add("hidden");
                step_5.classList.add("hidden");
                step_6.classList.add("hidden");
                step_7.classList.add("hidden");
            } else if (step === 1) {
                rdv_accueil.classList.add("hidden");
                step_1.classList.remove("hidden");
                step_2.classList.add("hidden");
                step_3.classList.add("hidden");
                step_4.classList.add("hidden");
                step_5.classList.add("hidden");
                step_6.classList.add("hidden");
                step_7.classList.add("hidden");
            } else if (step === 2) {
                date_cacher.value = date.value;
                date_recap.textContent = "VOTRE DATE : " + date_cacher.value;
                rdv_accueil.classList.add("hidden");
                step_1.classList.add("hidden");
                step_2.classList.remove("hidden");
                step_3.classList.add("hidden");
                step_4.classList.add("hidden");
                step_5.classList.add("hidden");
                step_7.classList.add("hidden");
                step_6.classList.add("hidden");
            } else if (step === 3) {
                rdv_accueil.classList.add("hidden");
                step_1.classList.add("hidden");
                step_2.classList.add("hidden");
                step_3.classList.remove("hidden");
                step_4.classList.add("hidden");
                step_5.classList.add("hidden");
                step_6.classList.add("hidden");
                step_7.classList.add("hidden");
            } else if (step === 4) {

               
                rdv_accueil.classList.add("hidden");
                step_1.classList.add("hidden");
                step_2.classList.add("hidden");
                step_3.classList.add("hidden");
                step_4.classList.remove("hidden");
                step_5.classList.add("hidden");
                step_6.classList.add("hidden");
                step_7.classList.add("hidden");
            }
            else if (step === 5) {

                voiture_cache.value = voiture.value;
                voiture_recap.textContent = "VOTRE VOITURE : " + voiture_cache.value;
                rdv_accueil.classList.add("hidden");
                step_1.classList.add("hidden");
                step_2.classList.add("hidden");
                step_3.classList.add("hidden");
                step_4.classList.add("hidden");
                step_5.classList.remove("hidden");
                step_6.classList.add("hidden");
                step_7.classList.add("hidden");
            }
            else if (step === 6) {


                rdv_accueil.classList.add("hidden");
                step_1.classList.add("hidden");
                step_2.classList.add("hidden");
                step_3.classList.add("hidden");
                step_4.classList.add("hidden");
                step_5.classList.add("hidden");
                step_6.classList.remove("hidden");
                step_7.classList.add("hidden");
            }
            else if (step === 7) {
                prixfinal = 0;
                prixfinal = prixformule + prixmodel;
                prix_cache.value = prixfinal + " €";
                prix_recap.textContent = "VOTRE RENDEZ VOUS EST ESTIMER A  : " + prix_cache.value;
                message_cacher.value = message.value;
                message_recap.textContent = "VOTRE MESSAGE : " + message_cacher.value;
                rdv_accueil.classList.add("hidden");
                step_1.classList.add("hidden");
                step_2.classList.add("hidden");
                step_3.classList.add("hidden");
                step_4.classList.add("hidden");
                step_5.classList.add("hidden");
                step_6.classList.add("hidden");
                step_7.classList.remove("hidden");

            }
        });
    });



});
document.addEventListener("DOMContentLoaded", function () {
    // Sélectionnez le lien avec la classe "fancy suivant"
    var fancyLink = document.getElementById("envoyer");

    // Ajoutez un gestionnaire d'événements pour le clic sur le lien
    fancyLink.addEventListener('click', function () {
        // Sélectionnez le formulaire correspondant (dans cet exemple, le deuxième formulaire)

        var form = document.getElementById("post");
        step = 0;

        // Déclenchez le clic sur le bouton "Envoyer" du formulaire
        form.querySelector('input[type="submit"]').click();

    });


});


document.addEventListener('DOMContentLoaded', function () {
    const supprimerButtons = document.querySelectorAll('.fancy[data-id-rendez-vous]');

    supprimerButtons.forEach(button => {
        button.addEventListener('click', function () {
            const idRendezVous = this.getAttribute('data-id-rendez-vous');

            // Envoyez une requête AJAX vers le serveur pour supprimer le rendez-vous
            fetch('../../classe/supprime.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ idRendezVous: idRendezVous }),
            })
                .then(response => response.json())
                .then(data => {
                    // Gérez la réponse si nécessaire (peut être vide si la suppression réussit)
                    console.log(data);

                    // Actualisez la page ou mettez à jour l'interface utilisateur après la suppression
                    // Par exemple, vous pouvez recharger la liste des rendez-vous
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Erreur lors de la suppression du rendez-vous:', error);
                });
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const modifierButtons = document.querySelectorAll('.fancy[data_compte]');
    function submitForm() {
        document.getElementById("post").submit();
    }
    modifierButtons.forEach(button => {
        button.addEventListener('click', function () {
            const idRendezVous = this.getAttribute('data-id-rendez-vous');

            // Envoyez une requête AJAX vers le serveur pour supprimer le rendez-vous
            fetch('../../classe/supprime.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ idRendezVous: idRendezVous }),
            })
                .then(response => response.json())
                .then(data => {
                    // Gérez la réponse si nécessaire (peut être vide si la suppression réussit)
                    console.log(data);

                    // Actualisez la page ou mettez à jour l'interface utilisateur après la suppression
                    // Par exemple, vous pouvez recharger la liste des rendez-vous
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Erreur lors de la suppression du rendez-vous:', error);
                });
        });
    });
});
document.addEventListener('DOMContentLoaded', function () {
    const modifiermdp = document.getElementById("modifiermdp");
    const mdp = document.getElementById("mdpd");
    const confirmbutton = document.getElementById("confirme_modifie");
    const input_modifie = document.getElementById("input_modifie");
    const text_modifie = document.getElementById("text_modifie");
    const motdepasseForm = document.getElementById("motde");
    const phrase_mdp = document.getElementById("phrase_mdp");
    modifiermdp.addEventListener('click', function (event) {
        // Empêcher le comportement par défaut de soumission du formulaire
        event.preventDefault();

        var longueurMdp = mdp.value.length;

        if (
            (longueurMdp >= 8 &&
            /[A-Z]/.test(mdp.value) &&
            /[a-z]/.test(mdp.value) &&
            /\d/.test(mdp.value) &&
            /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/.test(mdp.value))
        ) {
        

            // Modifier les classes de la balise <form>
            motdepasseForm.classList.remove("row-span-1");
            motdepasseForm.classList.add("row-span-2");
            motdepasseForm.classList.add("mt-6");
            phrase_mdp.classList.add("hidden");
            // Afficher les éléments cachés
            confirmbutton.classList.remove("hidden");
            input_modifie.classList.remove("hidden");
            text_modifie.classList.remove("hidden");
        }
        else{
            phrase_mdp.classList.remove("hidden");
            motdepasseForm.classList.remove("row-span-1");
            motdepasseForm.classList.add("row-span-2");
            motdepasseForm.classList.add("mt-12");
        }
    });

});

   