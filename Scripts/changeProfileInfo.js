let changeEmailButton, changePasswordButton;
let emailForm, passwordForm;
let changeProfileInfo, changeProfileInfoContainer;
let viewingPanel = false;

window.addEventListener("load", () => {
    changeEmailButton = document.getElementById("change-email-button");
    changePasswordButton = document.getElementById("change-password-button");
    emailForm = document.getElementById("change-email-form");
    passwordForm = document.getElementById("change-password-form");
    changeProfileInfo = document.getElementById("change-profile-info");
    changeProfileInfoContainer = changeProfileInfo.children[0];

    changeEmailButton.addEventListener("click", () => { showPanel(emailForm); });
    changePasswordButton.addEventListener("click", () => { showPanel(passwordForm); });
});

window.addEventListener("click", (event) => {
    if(viewingPanel && event.target.id == changeProfileInfo.id) hidePanel();
});

window.addEventListener("wheel", () => {
    document.body.style.overflow = (viewingPanel) ? "hidden" : "visible";
});

window.addEventListener("keydown", (event) => {
    if(!viewingPanel) return;
    if(event.key.toUpperCase() == "ESCAPE" || event.key.toUpperCase() == "ESC") hidePanel();
});

function showPanel(formElement) {
    formElement.style.display = "flex";
    changeProfileInfo.style.visibility = "visible";
    viewingPanel = true;
}

function hidePanel() {
    emailForm.style.display = "none";
    passwordForm.style.display = "none";
    changeProfileInfo.style.visibility = "hidden";
    viewingPanel = false;
}