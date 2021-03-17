let gallery = document.querySelector('.gallery');

let galleryImg = gallery.querySelectorAll('.gallery-img');
let galleryview = gallery.querySelectorAll('.gallery-img-view');
let exitview = gallery.querySelectorAll('.foto-close');
let nextPhoto = gallery.querySelectorAll('.foto-forward');
let prevPhoto = gallery.querySelectorAll('.foto-back');
let currentImg = 0;
for (let i = 0; i < galleryImg.length; i++) {

    galleryImg[i].addEventListener('click', () => {
        let img = galleryImg[i].nextElementSibling;
        img.classList.toggle('displaynone');
        currentImg = i;
    });

}

for (let exitfoto of exitview) {
    exitfoto.addEventListener('click', () => {
        currentImg = 0;
        for (let viewcheck of galleryview) {

            if (!viewcheck.classList.contains('displaynone')) {
                viewcheck.classList.toggle('displaynone');
            }
        }
    });
}

for (let forward of nextPhoto) {




    forward.addEventListener('click', () => {
        galleryview[currentImg].classList.toggle('displaynone');
        currentImg++;
        galleryview[currentImg].classList.toggle('displaynone');
    });
}

for (let back of prevPhoto) {

    back.addEventListener('click', () => {
        galleryview[currentImg].classList.toggle('displaynone');
        currentImg--;
        galleryview[currentImg].classList.toggle('displaynone');
    });

}





// for (let view of galleryview){

// let nextimg=view.querySelector('.foto-forward');


// }