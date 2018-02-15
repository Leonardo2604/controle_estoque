<?php
/**
* 
*/
class userController extends controller{
	
	public function index(){
		
	}

	public function login(){
		$dados = array();
		$captcha = new captchaController();
		$captcha->index();
		$error = 0;
		$captcha_code = explode(" ", $_SESSION['captcha']);
		$captcha_code = implode("", $captcha_code);

		if(!isset($_SESSION['attempts'])){
			$_SESSION['attempts'] = 0;
		}
		if(isset($_POST['send'])){
			if(isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){
				$email = addslashes($_POST['email']);
				$password = md5(addslashes($_POST['password']));
				$u = new User();

				if($_SESSION['attempts'] > 2){
					if(isset($_POST['cod']) && !empty($_POST['cod'])){
						$cod = $_POST['cod'];
						if($cod == $captcha_code){
							if($u->login($email, $password)){
								header('Location: '.BASE_URL);
								unset($_SESSION['attempts']);
							}else{
								$_SESSION['attempts'] += 1;
								$error = 1;		
							}
						}else{
							$error = 3;
						}

						$captcha->changeCaptcha();
					}else{
						$error = 4;
					}
				}else{
					if($u->login($email, $password)){
						header('Location: '.BASE_URL);
						unset($_SESSION['attempts']);
					}else{
						$_SESSION['attempts'] += 1;
						$error = 1;		
					}
				}
			}else{
				$error = 2;
			}
		}
		$dados['error'] = $error;
		$dados['captcha'] = $captcha_code;
		$this->loadView('login', $dados);
	}

	public function cadaster(){
		$dados = array();
		$this->loadView('cadaster', $dados);
	}

	public function logout(){
		unset($_SESSION['user_id']);
		header('Location: '.BASE_URL.'user/login');
	}
}
?>