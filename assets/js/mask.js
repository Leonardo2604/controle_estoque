function addMask(e, mask){
	var tel = e.target;

	if(e.keyCode == 8 || tel.value.length >= mask.length){ return; }

	var digit = 0;
	var number = mask.split('');
	var textTel = clearMask(tel.value, mask);

	if(tel.maxLength == -1){
		tel.maxLength = number.length;
	}

	for (var i = 0; i < number.length; i++) {
		if(mask[i] == '_'){
			number[i] = textTel[digit];
			digit += 1;
		}

		if(digit > textTel.length){
			number[i] = '';
		}
	}

	tel.value = number.join('');
}

function clearMask(text, mask){
	var newText = new Array();
	var array = new Array();

	for (var i = 0; i < mask.length; i++) {
		if(mask[i] != '_'){
			array.push(mask[i]);
		}
	}

	array.push('_');

	for (var i = 0; i < text.length; i++) {
		if(array.indexOf(text[i]) == -1){
			// se o item não for o da mascara add ele a nova string
			newText.push(text[i]);
		}
	}

	return newText.join('');
}