var menu = document.getElementById("burger");
var menu_phone = document.getElementById("menu_phone");
var isClicked = false;

menu.addEventListener("click", function(event) {
    if (!isClicked && menu_phone.classList.contains("hidden")) {
        isClicked = true;
        menu_phone.classList.remove("hidden");
        document.body.style.overflow = "hidden"; // Bloquer le scroll
    } else if (!isClicked) {
        isClicked = true;
        menu_phone.classList.add("hidden");
        document.body.style.overflow = ""; // Débloquer le scroll
    }

    // Réinitialiser la variable isClicked après avoir effectué l'action
    setTimeout(function() {
        isClicked = false;
    }, 0);
});
