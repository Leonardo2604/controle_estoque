function checkCaptcha(obj){
	var captcha = obj.dataset.captcha; 
	var icon = document.getElementsByClassName('icon')[0];
	var value = obj.value;

	if(value.length == 4){
		if(value == captcha){
			icon.style.backgroundImage = "url('../assets/images/check.png')";
		}else{
			icon.style.backgroundImage = "url('../assets/images/error.png')";
		}
	}

	if(value.length > 4){
		icon.style.backgroundImage = "url('../assets/images/error.png')";
	}

	if(value.length < 1){
		icon.style.backgroundImage = "url('')";
	}

	if(value.length >= 1 && value.length <= 3){
		icon.style.backgroundImage = "url('../assets/images/loading.gif')";
	}
}