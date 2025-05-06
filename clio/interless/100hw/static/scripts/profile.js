

function showFlet() {
	var blockFlet = document.querySelector('.block-flet').style.display = 'block';
	document.addEventListener('click', closeFletOut, true);
}

function closeFlet() {
	var blockFlet = document.querySelector('.block-flet').style.display = 'none';
	document.addEventListener('click', closeFletOut, true);
}

function closeFletOut(event) {
	var blockFlet = document.querySelector('.block-flet');
	if (!blockFlet.contains(event.target) && event.target.tagName !== 'BUTTON') {
		closeFlet();
	}
}

function goBack() {
    window.history.back();
}

var backBtn = document.querySelectorAll('.btn-back');

backBtn.forEach(button => {
    button.addEventListener('click', goBack);
});