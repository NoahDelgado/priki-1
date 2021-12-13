require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// go to domain page on change
dpdDomain.addEventListener('change', function () {
    window.location = '/domain/'+dpdDomain.value
})

// Accordions
document.querySelectorAll('.toggling').forEach(function(el) {
    el.addEventListener('click', function (evt) {
        document.getElementById('toggled'+el.dataset.toggleid).classList.toggle('d-none')
    })
});
