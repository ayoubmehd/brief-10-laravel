require('./bootstrap');

document.querySelector('#image').addEventListener('change', (event) => {
    document.querySelector('#image-tag').src = URL.createObjectURL(event.target.files[0]);
});