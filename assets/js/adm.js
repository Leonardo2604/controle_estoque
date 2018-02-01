window.onload = function(){
	var heightPage = window.innerHeight;
	var heightBody = document.body.scrollHeight;
	var aside = document.getElementById('sidebar').style;
	if(heightBody >= heightPage){
		aside.height = heightBody+'px';	
	}else{
		aside.height = heightPage+'px';
	}
}