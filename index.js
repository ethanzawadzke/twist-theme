//toggle #slide-one's class between .hidden and default
const toggleSlideOne = () => {
    const slideOne = document.querySelector('#slide-one');
    slideOne.classList.toggle('hidden');
}

setInterval(toggleSlideOne, 8000);