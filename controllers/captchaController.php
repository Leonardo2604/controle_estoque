<?php
/**
* 
*/
class captchaController extends controller{
	
	public function index(){
		if(!isset($_SESSION['captcha'])){
			$_SESSION['captcha'] = $this->generateCod(4);
		}
	}

	public function changeCaptchaByLink(){
		$_SESSION['captcha'] = $this->generateCod(4);
		header('Location: '.BASE_URL.'user/login');
	}

	public function changeCaptcha(){
		$_SESSION['captcha'] = $this->generateCod(4);
	}

	private function generateCod($qtdLetras){
		$letters = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j',
		 				 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 
		 				 'u', 'v', 'x', 'w', 'y', 'z', 0, 1, 2, 3, 4, 5, 6, 
		 				 7, 8, 9);
		$word = '';
		for ($i=0; $i < $qtdLetras; $i++) { 
			$lottery = rand(0, count($letters)-1);
			$w = $letters[$lottery];
			if(is_string($w)){
				$n = rand(0, 10);
				if($n < 4){
					$w = strtoupper($w);
				}
			}
			$word .= $w." ";
		}
		return $word;
	}
}
?>