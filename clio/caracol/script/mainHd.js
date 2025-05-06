// alert('Working');

/*======================================
========Inicio de menu de Slide=========*/
let slideIndex = 0;
showSlides ();

function showSlides() {
    let intSlide;
    let slides = document.getElementsByClassName("slideJes");
    
    for (intSlide = 0; intSlide < slides.length; intSlide++) {
        slides[intSlide].style.display = "none";
    }
    slideIndex ++;
    if (slideIndex > slides.length) {slideIndex = 1}

    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 2990);
}

let couter = 1;
setInterval(function(){
    document.getElementById('radio' + couter).checked = true;
    couter ++;
    if(couter>3) {
        couter = 1;
    }
}, 3000);
/*===Fim menu slide===*/

/*==================================
======Inicio de menu scrollinf======*/
    let itmScrollinf = document.querySelector('.container-inf-slide');
    let itmScrollcont = itmScrollinf.querySelector('.container-itm-slide-inf');

    let itmChilds = Array.from(itmScrollcont.children);
    itmChilds.forEach(itm => {
        let dupleElement = itm.cloneNode(true);
        dupleElement.setAttribute('aria-hidden', true);

        itmScrollcont.appendChild(dupleElement);
    });
    
    // console.log(itmChilds);
/*===Fim menu===*/