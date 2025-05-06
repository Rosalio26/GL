
/*
=================================================
===============Left side Sala(Room)
=================================================
*/

var btnShow = document.querySelector('button#show-hide');
var btnHidden = document.querySelector('button#hide-show');
var gerArea = document.querySelector('div#left-main-sala');
var imgCamp = document.querySelector('div.img-smole-icon');
var contSide = document.querySelector('div.camp-left-side');

function clickHdshow() {
    // imgCamp.style.display = 'none';
    btnShow.style.display = 'none';
    imgCamp.style.display = 'block';
    btnHidden.style.display = 'block';
    gerArea.style.width ='70px';
    contSide.style.display = 'none';
}
function clickHdhidde() {
    btnShow.style.display = 'block';
    imgCamp.style.display = 'none';
    btnHidden.style.display = 'none';
    gerArea.style.width ='400px';
    contSide.style.display = 'block';
}