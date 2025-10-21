const images = [
  "gambar/basket slide.png",
  "gambar/futsal slide.png",
  "gambar/Voli Slide.png"
];

let index = 0;
const slideshowImg = document.getElementById("slideshow");
const indicators = document.querySelectorAll(".bentukload div");

function changeImage() {
  index = (index + 1) % images.length;
  slideshowImg.src = images[index];

  indicators.forEach(dot => {
    dot.classList.remove("panjang");
    dot.classList.add("bulat");
  });

  indicators[index].classList.remove("bulat");
  indicators[index].classList.add("panjang");
}

setInterval(changeImage, 3000);

document.addEventListener('DOMContentLoaded', function() {
    const dropdownToggle = document.querySelector('.dropdown-toggle');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    if (dropdownToggle && dropdownMenu) {
        dropdownToggle.addEventListener('click', function(event) {
            event.preventDefault();
            dropdownMenu.classList.toggle('show');
        });

        document.addEventListener('click', function(event) {
            if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    }
});