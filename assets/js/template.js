$(function(){
	if(document.body.scrollHeight > (window.innerHeight - 56)){
		$('aside').css({
			'height': document.body.scrollHeight
		});
	}else{
		$('aside').css({
			'height': (window.innerHeight - 56)
		});
	}
});