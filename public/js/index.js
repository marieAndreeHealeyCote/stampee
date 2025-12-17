import Magnifier from "./components/Magnifier.js";
// Fonctions 
/**
 * Fonction appelée au chargement de la page
 */
function initialiser() {
    const img = document.getElementById('zoom-stamp');
    if (img != null) {
        new Magnifier(img, 3);
    }
}

// Execution du code
initialiser();
