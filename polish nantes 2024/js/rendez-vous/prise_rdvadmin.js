var step = 0;
var categorie = 0;

document.addEventListener("DOMContentLoaded", function () {
  
    const menu = document.getElementsByClassName("menu");
    const rdv_statue = document.getElementById("rdv_statue");
    const rdv_historique = document.getElementById("rdv_historique");
    
  
    rdv_historique.classList.add("hidden");
    menu[0].style.backgroundColor = "white";
    menu[0].children[1].style.color = "black";
    menu[0].addEventListener("click", function () {
        
        rdv_statue.classList.remove("hidden");
        rdv_historique.classList.add("hidden");
    });

    menu[1].addEventListener("click", function () {
        rdv_statue.classList.add("hidden");
        rdv_historique.classList.remove("hidden");
    });
    menu[2].addEventListener("click", function () {
        var nouvelleURL = "../../include/module/destroy_session.php";

        // Effectuez la redirection de la page
        window.location.href = nouvelleURL;
    });
  
    
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


const modifierButton = document.querySelectorAll('.fancy[data-statut]');

modifierButton.forEach(button => {
    button.addEventListener('click', function () {
        const idRendezVous = this.getAttribute('data-statut');

        // Envoyez une requête AJAX vers le serveur pour mettre à jour le rendez-vous
        fetch('../../classe/update_rendez_vous.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ idRendezVous: idRendezVous }),
        })
        .then(response => response.json())
        .then(data => {
            // Gérez la réponse si nécessaire (peut être vide si la mise à jour réussit)
            console.log(data);

            // Actualisez la page ou mettez à jour l'interface utilisateur après la mise à jour
            // Par exemple, vous pouvez recharger la liste des rendez-vous
            window.location.reload();
        })
        .catch(error => {
            console.error('Erreur lors de la mise à jour du rendez-vous:', error);
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


   