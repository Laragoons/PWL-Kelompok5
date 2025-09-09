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