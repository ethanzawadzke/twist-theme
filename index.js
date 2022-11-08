//toggle #slide-one's class between .hidden and default
const toggleSlideOne = () => {
    const slideOne = document.querySelector('#slide-one');
    slideOne.classList.toggle('hidden');
}

setInterval(toggleSlideOne, 8000);

//hamburger-slideout-menu listener that toggles display 
//of the slideout menu
const hamburger = document.getElementById('hamburger');
const slideOutMenu = document.getElementById('hamburger-slideout-menu');
const xButton = document.getElementById('slideout-menu-x');
const menuLine = document.getCl


hamburger.addEventListener('click', () => {
    slideOutMenu.classList.add('open');
    xButton.classList.add('open');

    //darken the background
    document.querySelector('#main-container').style.opacity = '1';;
});

xButton.addEventListener('click', () => {
    slideOutMenu.classList.remove('open');
    xButton.classList.remove('open');

    document.querySelector('#main-container').style.opacity = '0';
});

let body = document.querySelector('body');

body.addEventListener('click', (e) => {
    console.log(e.target);
    if (e.target != hamburger && e.target != slideOutMenu && e.target != xButton) {
        slideOutMenu.classList.remove('open');
        xButton.classList.remove('open');
        document.querySelector('#main-container').style.opacity = '0';
    }
});

//for every button in the slideout menu, add an event listener onmouseover

const slideOutMenuButtons = document.querySelectorAll('.side-menu-item');

slideOutMenuButtons.forEach((button) => {
    button.addEventListener('mouseover', (e) => {
        console.log(e.target.id);
        const idString = 'line-' + e.target.id;
        console.log(idString);
        const line = document.getElementById(idString);
        line.style.width = '16px';
        line.style['background-color'] = 'rgb(34, 103, 182)';
    });
    button.addEventListener('mouseout', (e) => {
        const idString = 'line-' + e.target.id;
        const line = document.getElementById(idString);
        console.log(e.target);
        line.style.width = '8px';
        line.style['background-color'] = 'black';
    });
});

function scrollToSection(sectionID) {
    var section = document.getElementById(sectionID);
    section.scrollIntoView();
}

body.onscrolld = function() {
    scrollToSection('services-anchor');
}