var images = ['image2.png','image3.png','image4.png','image1.png'];
var currentIndex = 0;

function changeBodyBackgroundImage() {
    var nextImage = 'url(\'../images/' + images[currentIndex] + '\') no-repeat';
    document.body.style.background = nextImage;
    document.body.style.backgroundSize = 'cover';
    document.body.style.backgroundPosition = 'center';

    currentIndex = (currentIndex + 1) % images.length;
}

setInterval(changeBodyBackgroundImage, 10000);