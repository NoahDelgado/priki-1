require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// go to domain page on change
dpdDomain.addEventListener('change', function () {
    window.location = '/domain/'+dpdDomain.value
})

// "Accordions"
// An element marked as 'toggling' shows/hides another element marked as 'toggled'
// toggling is marked with class .toggling
document.querySelectorAll('.toggling').forEach(function(el) {
    el.addEventListener('click', function (evt) {
        document.getElementById(el.dataset.target).classList.toggle('d-none')
    })
});
