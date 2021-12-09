require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// go to domain page on change
dpdDomain.addEventListener('change', function () {
    window.location = '/domain/'+dpdDomain.value
})
