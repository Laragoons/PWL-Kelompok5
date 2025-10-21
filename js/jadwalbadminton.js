document.addEventListener('DOMContentLoaded', function() {
    const dropdownToggle = document.getElementById('date-dropdown-toggle');
    const dateOptionsList = document.getElementById('date-options');
    const selectedDateElement = document.getElementById('selected-date');

    if (dropdownToggle && dateOptionsList) {
        dropdownToggle.addEventListener('click', function(event) {
            event.stopPropagation();
            dateOptionsList.classList.toggle('show');
        });
    }

    if (dateOptionsList && selectedDateElement) {
        dateOptionsList.addEventListener('click', function(event) {
            if (event.target.tagName === 'A') {
                event.preventDefault();
                const newDate = event.target.getAttribute('data-date');
                selectedDateElement.textContent = newDate;
                dateOptionsList.classList.remove('show');
                console.log('Selected Date:', newDate);
            }
        });
    }

    document.addEventListener('click', function(event) {
        if (dateOptionsList && dateOptionsList.classList.contains('show') && !dropdownToggle.contains(event.target)) {
            dateOptionsList.classList.remove('show');
        }
    });
});