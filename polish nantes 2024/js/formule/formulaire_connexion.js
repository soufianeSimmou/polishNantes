

var email = document.getElementById("email");
var email_parent = document.getElementById("email_parent");
var phrase_email = document.getElementById("phrase_email");
var enfant3 = email_parent.children;
email.addEventListener("input", function () {
    
   

    // Vérifie si la saisie ressemble à une adresse e-mail valide
    if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
        // Si oui, applique une bordure verte au parent
        email_parent.style.border = "5px solid green";
        email_parent.style.marginRight = "1vw";
        enfant3[2].classList.remove("hidden");
        enfant3[3].classList.add("hidden");
        phrase_email.classList.add("hidden");
    } 
    
    else {
        // Sinon, réinitialise la bordure à sa valeur par défaut
        email_parent.style.border = "5px solid red";
        enfant3[2].classList.add("hidden");
        enfant3[3].classList.remove("hidden");
        phrase_email.classList.remove("hidden");
    }
});
var mdp = document.getElementById("mdp");
var mdp_parent = document.getElementById("mdp_parent");
var phrase_mdp = document.getElementById("phrase_mdp");
var enfant4 = mdp_parent.children;
mdp.addEventListener("input", function () {
    var longueurmdp = mdp.value.length;
    

    // Vérifie si le mot de passe répond aux critères
    if (
        longueurmdp >= 8 &&           // Exemple: longueur minimale de 8 caractères
        /[A-Z]/.test(mdp.value) &&    // Au moins une lettre majuscule
        /[a-z]/.test(mdp.value) &&    // Au moins une lettre minuscule
        /\d/.test(mdp.value) &&       // Au moins un chiffre
        /\W/.test(mdp.value)           // Au moins un caractère spécial
    ) {
        // Si oui, applique une bordure verte au parent
        mdp_parent.style.border = "5px solid green";
        mdp_parent.style.marginRight = "1vw";
        enfant4[2].classList.remove("hidden");
        enfant4[3].classList.add("hidden");
        phrase_mdp.classList.add("hidden");
    } else {
        // Sinon, réinitialise la bordure à sa valeur par défaut
        mdp_parent.style.border = "5px solid red";
        enfant4[2].classList.add("hidden");
        enfant4[3].classList.remove("hidden");
        phrase_mdp.classList.remove("hidden");
    }
});









var formulaire = document.getElementById("formulaire");

formulaire.addEventListener("submit", function(event) {
    // Vérification du nom
   
    // Vérification de l'e-mail
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
        email_parent.style.border = "5px solid red";
        enfant3[2].classList.add("hidden");
        enfant3[3].classList.remove("hidden");
        phrase_email.classList.remove("hidden");
        event.preventDefault();
       
    }

    // Vérification du mot de passe
    var longueurMdp = mdp.value.length;
    if (
        !(longueurMdp >= 8 &&
        /[A-Z]/.test(mdp.value) &&
        /[a-z]/.test(mdp.value) &&
        /\d/.test(mdp.value) &&
        /\W/.test(mdp.value))
    ) {
        mdp_parent.style.border = "5px solid red";
        enfant4[2].classList.add("hidden");
        enfant4[3].classList.remove("hidden");
        phrase_mdp.classList.remove("hidden");
        event.preventDefault();
      
    }
   

});