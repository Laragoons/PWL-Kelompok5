document.addEventListener('DOMContentLoaded', function() {
    const confirmButton = document.getElementById('confirm-booking-button');
    const formElement = confirmButton ? confirmButton.closest('form') : null;

    if (formElement) {
        formElement.addEventListener('submit', function(event) {
            event.preventDefault();
            alert("Pesanan sudah terkirim");
        });
    } else if (confirmButton) {
         confirmButton.addEventListener('click', function() {
             alert("Pesanan sudah terkirim");
         });
    }
});