console.log('test');

//Get the Elements (PopOver Div and Images)
const images = Array.from(document.querySelectorAll('.productImages'));
const popOverDiv = document.querySelector('.popOverDiv');

//Loop though images and check if the mouseenter event and change the class of the corresponding image that is hovered
images.forEach((image) => {
    image.removeAttribute('data-popover-target');
    image.addEventListener('mouseenter', () => {
        console.log(image);
        image.setAttribute('data-popover-target', 'popover-company-profile');
        console.log(image);
    })
});