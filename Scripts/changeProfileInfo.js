// Botones
let changeEmailButton, changePasswordButton, changePhoneNumberButton;
// Formularios
let emailForm, passwordForm, phoneNumberForm;
// Otros elementos
let changeProfileInfo, changeProfileInfoContainer;
// Otras variables
let viewingPanel = false;

// Al cargar la página:
window.addEventListener("load", () => {
    // Inicializar botones
    changeEmailButton = document.getElementById("change-email-button");
    changePasswordButton = document.getElementById("change-password-button");
    changePhoneNumberButton = document.getElementById("add-phone-number-button");
    // Inicializar formularios
    emailForm = document.getElementById("change-email-form");
    passwordForm = document.getElementById("change-password-form");
    phoneNumberForm = document.getElementById("add-phone-number-form");
    // Inicializar el resto de los elementos
    changeProfileInfo = document.getElementById("change-profile-info");
    changeProfileInfoContainer = changeProfileInfo.children[0]; // Obtener el primer elemento hijo

    // Crear eventos al hacer click sobre un botón. Por ejemplo:
    // Al hacer click sobre el botón de cambio de correo, llamar a la función "showPanel()" con el formulario por parámetro
    changeEmailButton.addEventListener("click", () => { showPanel(emailForm); });
    changePasswordButton.addEventListener("click", () => { showPanel(passwordForm); });
    changePhoneNumberButton.addEventListener("click", () => { showPanel(phoneNumberForm); });
});

// FUNCIONES =====================================================
// Función que muestra el panel de cambio de información con el formulario por parámetro.
function showPanel(formElement) {
    formElement.style.display = "flex";
    changeProfileInfo.style.visibility = "visible";
    viewingPanel = true;
}
// Función que oculta el panel
function hidePanel() {
    emailForm.style.display = "none";
    passwordForm.style.display = "none";
    phoneNumberForm.style.display = "none";
    changeProfileInfo.style.visibility = "hidden";
    viewingPanel = false;
}

// EVENTOS ========================================================
// Al hacer click sobre el fondo, ocultar el panel
window.addEventListener("click", (event) => {
    if(viewingPanel && event.target.id == changeProfileInfo.id) hidePanel();
});
// Si tienes el panel abierto, bloquear la rueda del ratón.
window.addEventListener("wheel", () => {
    document.body.style.overflow = (viewingPanel) ? "hidden" : "visible";
});
// Si pulsas la tecla de escape, cerrar el panel
window.addEventListener("keydown", (event) => {
    if(!viewingPanel) return;
    if(event.key.toUpperCase() == "ESCAPE" || event.key.toUpperCase() == "ESC") hidePanel();
});

