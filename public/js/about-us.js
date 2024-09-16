// slideshow.js
var slides = document.querySelectorAll('.slide');
var currentSlide = 0;
var slideInterval = setInterval(nextSlide, 3000);

function nextSlide() {
  // Mengatur posisi gambar saat ini ke kanan
  slides[currentSlide].style.left = "100%";
  slides[currentSlide].style.opacity = 0;

  // Menggeser ke gambar selanjutnya
  currentSlide = (currentSlide + 1) % slides.length;

  // Menampilkan gambar selanjutnya dari kiri
  slides[currentSlide].style.left = "0";
  slides[currentSlide].style.opacity = 1;
}
