// ketika tombol menu di klik

const navbarMenu = document.querySelector(".navbar-menu");
document.querySelector("#btn-menu").onclick = () => {
  navbarMenu.classList.toggle("active");
};

// ketika tombol user di klik
const userMenu = document.querySelector(".user");
document.querySelector("#btn-user").onclick = (e) => {
  userMenu.classList.toggle("active");
  e.preventDefault();
};

// kemudian kita buat menu sidebar ketika di klik di luar menu navbar itu tetutup
const btnMenu = document.querySelector("#btn-menu");
document.addEventListener("click", function (e) {
  if (!btnMenu.contains(e.target) && !navbarMenu.contains(e.target)) {
    navbarMenu.classList.remove("active");
  }
});

// owl crausel produk
$(document).ready(function () {
  $(".hero .owl-carousel").owlCarousel({
    autoplay: true,
    nav: true,
    loop: true,
    dots: true,
    inifinite: true,
    speed: 4000,
    autoplaySpeed: 2500,
    slideToShow: 1,
    items: 1,
    navTex: [
      "<i class='fas fa-angle-left'></i>",
      "<i class='fas fa-angle-right'></i>",
    ],
    navContainer: "#owl-nav",
  });
});
// detail produk owl crausel
$(document).ready(function () {
  $(".detail-produk .owl-carousel").owlCarousel({
    nav: true,
    loop: true,
    dots: true,
    inifinite: true,
    speed: 4000,
    slideToShow: 1,
    items: 1,
    navTex: [
      "<i class='fas fa-angle-left'></i>",
      "<i class='fas fa-angle-right'></i>",
    ],
    navContainer: "#owl-nav",
  });
});

// raja ongkir
$(document).ready(function () {
  $.ajax({
    url: "data_provinsi.php",
    type: "post",
    success: function (data_provinsi) {
      $("select[name=provinsi]").html(data_provinsi);
    },
  });
});
