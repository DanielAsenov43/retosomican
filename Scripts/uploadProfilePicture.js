

function cropImage(imagePath, downloadName, newX, newY, newWidth, newHeight) {
    let originalImage = new Image();
    originalImage.src = imagePath;
    let canvas = document.getElementById('canvas');
    let ctx = canvas.getContext('2d');

    originalImage.addEventListener('load', function () {
        const originalWidth = originalImage.naturalWidth;
        const originalHeight = originalImage.naturalHeight;
        const aspectRatio = originalWidth / originalHeight;
        if (newHeight === undefined) newHeight = newWidth / aspectRatio;

        canvas.width = newWidth;
        canvas.height = newHeight;
        ctx.drawImage(originalImage, newX, newY, newWidth, newHeight, 0, 0, newWidth, newHeight);
        downloadImage(canvas, downloadName);
    });

}

function downloadImage(downloadName) {
    let tempLink = document.createElement('a');
    tempLink.download = downloadName;
    tempLink.href = document.getElementById('canvas').toDataURL("image/jpeg", 0.9);
    console.log(tempLink);
    //tempLink.click();
}

function saveImage(canvas, name) {
    
    canvas.toBlob((blob) => {
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'canvas-image.png';
        a.click();
        URL.revokeObjectURL(url); // Clean up after download
    }, 'image/png');
}