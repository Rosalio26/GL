
let btnPages = document.querySelector("#carregar_html");
let campPages = document.querySelector("#camp_right_pages");

btnPages.style.background="red";
campPages.style.background="blue";

$(btnPages).click(function() {
    $(campPages).load("dev_web/auladeHtml/pages/introducao.html");
});