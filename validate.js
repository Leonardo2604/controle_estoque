var emailOk = false;
var passwordOk = false;

function validationEmail(obj){
	if( obj.value.indexOf('@') == -1 ){
		emailOk = false;
		obj.style.borderColor = "#ff5555";
		return;
	}

	var user = obj.value.substring( 0, obj.value.indexOf('@'));
	var domain = obj.value.substring(obj.value.indexOf('@') + 1);

	if(user.length         >=  1 &&
	   user.search('@')    == -1 &&
	   user.search(' ')    == -1 &&
	   domain.search('@')  == -1 &&
	   domain.search(' ')  == -1 &&
	   domain.search('.')  != -1 &&
	   domain.length       >=  3 &&
	   domain.indexOf('.') >=  1 &&
	   domain.lastIndexOf('.') < domain.length - 1)
	{
		emailOk = true;
		obj.style.borderColor = "#55bb55";
	}else{
		emailOk = false;
		obj.style.borderColor = "#ff5555";
		
	}
}
function validationPassword(obj){
	if(obj.value != ''){
		passwordOk = true;
		obj.style.borderColor = "#55bb55";
	}else{
		emailOk = false;
		obj.style.borderColor = "#ff5555";
	}
}
function validation(){
	if( emailOk && passwordOk ){
		return true;
	}
	return false;
}