
// function btnmenuHamb() {
//     var myNav = document.querySelector('.itm-content');
//     var mynavBar = document.querySelector('.navBar');

//     if(myNav.style.display === "none" || mynavBar.style.backgroundColor === "transparent") {
//         myNav.style.display = "block";
//         /*mynavBar.style.backgroundColor = "#0008ff76"*/
//     } else {
//         myNav.style.display = "none";
//         mynavBar.style.backgroundColor = "transparent"
//     }
// }

/*
  STICKER DO HEADER
--------------------------------------------------------------------*/
window.onscroll = function() {mySctiker()};

var header = document.getElementById("hdSticky");
var sticky = header.offsetTop;

function  mySctiker(x) {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
        header.style.opacity = "0";
        header.style.backgroundColor = "red"; 
        //header.style.transition = "10";
    } else {
        header.classList.remove("sticky");
        header.style.opacity = "0";
    }
}


/*
   BOTTOES CONFING.
--------------------------------------------------------------------*/
/*var login = document.querySelector('.hdd-js-lgn');
var registro = document.querySelector('.hdd-js-ins');

login.addEventListener('mouseenter', entro);
login.addEventListener('mouseout', sai);
registro.addEventListener('mouseenter', entrar);
registro.addEventListener('mouseout', sair);

function entro() {
    registro.style.backgroundColor = "transparent";
    registro.style.color = "#222";
    login.style.backgroundColor = "#0008ff";
    login.style.color = "#fff"
}
function sai() {
    registro.style.backgroundColor = "#0008ff";
    registro.style.color = "#fff"
    login.style.backgroundColor = "transparent"
    login.style.color = "#222"
}

function entrar() {
    registro.style.backgroundColor = "transparent";
    registro.style.color = "#222";
    login.style.backgroundColor = "#0008ff";
    login.style.color = "#fff"
}
function sair() {
    registro.style.backgroundColor = "#0008ff";
    registro.style.color = "#fff"
    login.style.backgroundColor = "transparent"
    login.style.color = "#222"
}*/