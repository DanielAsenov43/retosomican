let image;

window.addEventListener("load", () => {
    image = document.getElementById("image");
    let cropper = new Cropper.default(image, {
        aspectRatio: 1
    });

    console.log(cropper.CROPPER_IMAGE);
});


