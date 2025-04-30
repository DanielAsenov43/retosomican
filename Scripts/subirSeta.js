function previewImage() {
    const file = document.getElementById("myfile").files[0];
    const preview = document.getElementById("imagePreview");
    const reader = new FileReader();

    reader.onloadend = function () {
        const img = document.createElement("img");
        img.src = reader.result;
        // Limpia el contenedor antes de agregar la nueva imagen
        preview.innerHTML = '';
        preview.appendChild(img);
    };

    if (file) {
        reader.readAsDataURL(file); // Lee el archivo como URL de datos
    } else {
        preview.innerHTML = ''; // Si no hay archivo, limpia el contenedor
    }
}
// Asocia el evento de cambio de archivo al input
window.onload = function () {
    document.getElementById("myfile").addEventListener("change", previewImage);
}