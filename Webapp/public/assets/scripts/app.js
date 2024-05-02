function updateColorPicked(colorId, color) {
    document.getElementById('calendarColorPicked').value = colorId;
    //indicateur
    const indicator = document.getElementById("pickedIndicator");
    // Supprimer toutes les classes bg-* de l'élément indicator
    indicator.className = "input-group-text";
    // Ajouter la classe bg-{color} correspondante
    indicator.classList.add("bg-" + color);
}