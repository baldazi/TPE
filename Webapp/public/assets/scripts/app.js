function updateColorPicked(colorId, color) {
    document.getElementById('calendarColorPicked').value = colorId;
    //indicateur
    const indicator = document.getElementById("pickedIndicator");
    // Supprimer toutes les classes bg-* de l'élément indicator
    indicator.className = "input-group-text";
    // Ajouter la classe bg-{color} correspondante
    indicator.classList.add("bg-" + color);
}

function updateSkin(color, id) {

    document.body.className = `skin-${color}`;

    const formData = new FormData();
    formData.append('color-id', id);

    fetch('/main/picktheme', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            console.log('Success:', data);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}




