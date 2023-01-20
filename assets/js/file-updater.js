// Candidate Update cvFile
let replaceFileLink = document.querySelector('.replace-file-link');
let keepFileLink = document.querySelector('.keep-file-link');
let storedCv = document.querySelector('#storedCv');
let cvUploader = document.querySelector('#cvUploader');
if (replaceFileLink && keepFileLink && storedCv && cvUploader) {
    replaceFileLink.addEventListener('click', function () {
        cvUploader.style.display = 'flex';
        storedCv.style.display = 'none';
    });
    keepFileLink.addEventListener('click', function () {
        cvUploader.style.display = 'none';
        storedCv.style.display = 'block';
    });
}

// Candidate Update pictureFile
let replacePictureLink = document.querySelector('.replace-picture-link');
let keepPictureLink = document.querySelector('.keep-picture-link');
let storedPicture = document.querySelector('#storedPicture');
let pictureUploader = document.querySelector('#pictureUploader');
if (replacePictureLink && keepPictureLink && storedPicture && pictureUploader) {
    replacePictureLink.addEventListener('click', function () {
        pictureUploader.style.display = 'block';
        storedPicture.style.display = 'none';
    });
    keepPictureLink.addEventListener('click', function () {
        pictureUploader.style.display = 'none';
        storedPicture.style.display = 'block';
    });
}
