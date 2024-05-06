var nom = document.getElementById("nom");
var nom_parent = document.getElementById("nom_parent");
var phrase_nom = document.getElementById("phrase_nom");
var enfant = nom_parent.children;
nom.addEventListener("input", function () {
    var longueurNom = nom.value.length;
   
    // Vérifie si la longueur du nom est entre 1 et 22 caractères et s'il ne contient que des lettres
    if (longueurNom >= 1 && longueurNom <= 22 && /^[a-zA-Z]+$/.test(nom.value)) {
        // Si oui, applique une bordure verte au parent
        nom_parent.style.border = "5px solid green";
        nom_parent.style.marginRight = "1vw";
        enfant[1].classList.remove("hidden");
        enfant[2].classList.add("hidden");
        phrase_nom.classList.add("hidden");
    } else {
        // Sinon, réinitialise la bordure à sa valeur par défaut
        nom_parent.style.border = "5px solid red";
        enfant[1].classList.add("hidden");
        enfant[2].classList.remove("hidden");
        phrase_nom.classList.remove("hidden");
    }
});
var prenom = document.getElementById("prenom");
var prenom_parent = document.getElementById("prenom_parent");
var phrase_prenom = document.getElementById("phrase_prenom");
var enfant1 = prenom_parent.children;
prenom.addEventListener("input", function () {
    var longueurprenom = prenom.value.length;
    
    // Vérifie si la longueur du nom est entre 1 et 22 caractères et s'il ne contient que des lettres
    if (longueurprenom >= 2 && longueurprenom <= 22 && /^[a-zA-Z]+$/.test(prenom.value)) {
        // Si oui, applique une bordure verte au parent
        prenom_parent.style.border = "5px solid green";
        prenom_parent.style.marginRight = "1vw";
        enfant1[1].classList.remove("hidden");
        enfant1[2].classList.add("hidden");
        phrase_prenom.classList.add("hidden");
    } else {
        // Sinon, réinitialise la bordure à sa valeur par défaut
        prenom_parent.style.border = "5px solid red";
        enfant1[1].classList.add("hidden");
        enfant1[2].classList.remove("hidden");
        phrase_prenom.classList.remove("hidden");
    }
});
var tel = document.getElementById("tel");
var tel_parent = document.getElementById("tel_parent");
var phrase_telephone = document.getElementById("phrase_telephone");
var enfant2 = tel_parent.children;
tel.addEventListener("input", function () {
    var longueurtel = tel.value.length;
    

    // Vérifie si la longueur du numéro de téléphone est de 10 caractères et s'il ne contient que des chiffres
    if (longueurtel === 10 && /^\d+$/.test(tel.value)) {
        // Si oui, applique une bordure verte au parent
        tel_parent.style.border = "5px solid green";
        tel_parent.style.marginRight = "1vw";
        enfant2[1].classList.remove("hidden");
        enfant2[2].classList.add("hidden");
        phrase_telephone.classList.add("hidden");
    } else {
        // Sinon, réinitialise la bordure à sa valeur par défaut
        tel_parent.style.border = "5px solid red";
        enfant2[1].classList.add("hidden");
        enfant2[2].classList.remove("hidden");
        phrase_telephone.classList.remove("hidden");
    }
});

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
    } else {
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
var mdpconfirme = document.getElementById("mdpconfirme");
var mdpconfirme_parent = document.getElementById("mdpconfirme_parent");
var phrase_mdpconfirmer = document.getElementById("phrase_mdpconfirmer");
var enfant5 = mdpconfirme_parent.children;
mdpconfirme.addEventListener("input", function () {
    var longueurmdpconfirme = mdpconfirme.value.length;


    // Vérifie si la confirmation de mot de passe est identique au mot de passe
    if (mdpconfirme.value === mdp.value) {
        // Si oui, applique une bordure verte au parent
        mdpconfirme_parent.style.border = "5px solid green";
        mdpconfirme_parent.style.marginRight = "1vw";
        enfant5[2].classList.remove("hidden");
        enfant5[3].classList.add("hidden");
        phrase_mdpconfirmer.classList.add("hidden");
    } else {
        // Sinon, réinitialise la bordure à sa valeur par défaut
        mdpconfirme_parent.style.border = "5px solid red";
        enfant5[2].classList.add("hidden");
        enfant5[3].classList.remove("hidden");
        phrase_mdpconfirmer.classList.remove("hidden");
    }
});











var formulaire = document.getElementById("formulaire");

formulaire.addEventListener("submit", function(event) {
    // Vérification du nom
    var longueurNom = nom.value.length;
    if (!(longueurNom >= 1 && longueurNom <= 32 && /^[a-zA-Z]+$/.test(nom.value))) {
        nom_parent.style.border = "5px solid red";
        enfant[1].classList.add("hidden");
        enfant[2].classList.remove("hidden");
        phrase_nom.classList.remove("hidden");
        event.preventDefault();
      
    }

    // Vérification du prénom
    var longueurPrenom = prenom.value.length;
    if (!(longueurPrenom >= 2 && longueurPrenom <= 22 && /^[a-zA-Z]+$/.test(prenom.value))) {
        prenom_parent.style.border = "5px solid red";
        enfant1[1].classList.add("hidden");
        enfant1[2].classList.remove("hidden");
        phrase_prenom.classList.remove("hidden");
        event.preventDefault();
        
    }

    // Vérification du numéro de téléphone
    var longueurTel = tel.value.length;
    if (!(longueurTel === 10 && /^\d+$/.test(tel.value))) {
        tel_parent.style.border = "5px solid red";
        enfant2[1].classList.add("hidden");
        enfant2[2].classList.remove("hidden");
        phrase_telephone.classList.remove("hidden");
        event.preventDefault();
      
    }

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
    var longueurMdpconfirme = mdpconfirme.value.length;
    // Vérification de la confirmation de mot de passe
    if (mdpconfirme.value !== mdp.value || longueurMdpconfirme == 0) {
        mdpconfirme_parent.style.border = "5px solid red";
        enfant5[2].classList.add("hidden");
        enfant5[3].classList.remove("hidden");
        phrase_mdpconfirmer.classList.remove("hidden");
        event.preventDefault();
       
    }

});