var tel = document.getElementById('tel');
tel.addEventListener('keydown', function(e){
	addMask(e, '(__) ____ - ____');
});