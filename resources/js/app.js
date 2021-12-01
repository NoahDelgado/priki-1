require('./bootstrap');

// Reload page on filter value change
numDays.addEventListener('change', function () {
    window.location='/home/'+numDays.value
})
