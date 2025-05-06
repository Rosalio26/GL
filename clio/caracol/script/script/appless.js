
/* *****************DEFINIÇÃO DE VARIAVEIS GLOBAIS PARA OS BUTTOES DEINFORMACAO DE ESTUDOS************** 
********************************************************************************************************/

var backngNav = document.getElementById("navList");
var backngHeader = document.getElementById("header");
var listNav = document.getElementById("listNav");
var mainArea = document.getElementById("main");
// var navBar = document.getElementById("navBar");

mainArea.style.background = "#0d1821"; //#01161e
backngNav.style.background = "#01161e";
//listNav.style.background = "#9ad5d0";

/*
===========PROGRAMACAO===========
=================================*/
var btnProgram = document.getElementById("btn-program").addEventListener("click", programArea);

function programArea() {
  backngHeader.style.background = "#f75c03";
  document.getElementById("lessProgram").style.display= "block";
}

/*
===========ELETRONICA ===========
=================================*/
var btnEletro = document.getElementById("btn-eletronic").addEventListener("click", eletronArea);

function eletronArea() {
  backngHeader.style.background = "green";
  document.getElementById("lessEletro").style.display= "block";
}

/*
===== Desenvolvimento Web =======
=================================*/
var btnDevweb = document.getElementById("btn-devweb").addEventListener("click", devwebArea);

function devwebArea() {
  backngHeader.style.background = "#e63946";
  document.getElementById("lessDevweb").style.display= "block";
}

/*
========== MATEMATICA ===========
=================================*/
var btnMath = document.getElementById("btn-math").addEventListener("click", mathematicArea);

function mathematicArea() {
  backngHeader.style.background = "blue";
  document.getElementById("lessMath").style.display= "block";
}

