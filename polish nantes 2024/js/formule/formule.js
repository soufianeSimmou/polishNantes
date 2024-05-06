document.addEventListener('DOMContentLoaded', function () {
    var balise = document.getElementById("formule1");
    var balise2 = document.getElementById("formule2");
    var balise3 = document.getElementById("formule3");

    function addEventListenersToElement(balise) {
        if (balise) { 
            balise.addEventListener('mouseover', function () {
                var enfants = balise.children;
                var enfants_d = enfants[1].children;

                for (var i = 0; i < enfants_d.length; i++) {
                    enfants_d[i].classList.remove("hidden");
                    enfants_d[i].style.transition = "opacity 1s";
                }

                enfants[0].classList.remove("hidden");
                enfants[0].style.transition = "opacity 0.5s";
                enfants[0].style.opacity = "0.75";
            });

            balise.addEventListener('mouseout', function () {
                var enfants = balise.children;
                var enfants_d = enfants[1].children;

                for (var i = 0; i < enfants_d.length; i++) {
                    enfants_d[i].classList.add("hidden");
                    enfants_d[i].style.transition = "opacity 1s";
                }

                enfants[0].style.transition = "opacity 0.5s";
                enfants[0].style.opacity = "0";
            });
        } else {
            console.error("Element not found");
        }
    }

    // Add event listeners to each element
    addEventListenersToElement(balise);
    addEventListenersToElement(balise2);
    addEventListenersToElement(balise3);
});
