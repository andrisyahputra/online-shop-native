// ketika tombol menu di klik

const navbarMenu = document.querySelector('.navbar-menu');
document.querySelector('#btn-menu').onclick = () => {
    navbarMenu.classList.toggle('active');
}

// kemudian kita buat menu sidebar ketika di klik di luar menu navbar itu tetutup
const btnMenu = document.querySelector('#btn-menu');
document.addEventListener('click', function(e){
    if(!btnMenu.contains(e.target) && !navbarMenu.contains(e.target)){
        navbarMenu.classList.remove('active');
    };
})