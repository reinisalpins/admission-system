let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
}

x = () => {
    let alert = document.getElementById("pazinojums");
    alert.style.display = "none";
}

if(window.history.replaceState){
    window.history.replaceState(null, null, window.location.href)
}