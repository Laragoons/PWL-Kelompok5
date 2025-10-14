const tanggalTerpilihElement = document.getElementById('tanggal-terpilih');
const dropdownLinks = document.querySelectorAll('.dropdown-menu a');
const dropdownToggle = document.getElementById('tanggal-toggle');

dropdownLinks.forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault();

        const teksTampilan = this.getAttribute('data-value');
        tanggalTerpilihElement.textContent = teksTampilan;
        dropdownToggle.checked = false;

        const tanggalUntukPHP = this.getAttribute('data-api-date');
        kirimDataKePHP(tanggalUntukPHP);
    });
});

function kirimDataKePHP(tanggal) {
    const formData = new FormData();
    formData.append('tanggal', tanggal);

    fetch('proses.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log('Sukses:', data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}