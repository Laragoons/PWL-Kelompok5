document.addEventListener('DOMContentLoaded', function() {
    const dropdownToggle = document.getElementById('date-dropdown-toggle');
    const dateOptionsList = document.getElementById('date-options');

    if (dropdownToggle && dateOptionsList) {
        dropdownToggle.addEventListener('click', function(event) {
            event.stopPropagation();
            dateOptionsList.classList.toggle('show');
        });
    }

    document.addEventListener('click', function(event) {
        if (dateOptionsList && dateOptionsList.classList.contains('show') && !dropdownToggle.contains(event.target)) {
            dateOptionsList.classList.remove('show');
        }
    });
});