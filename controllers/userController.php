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
		$u = new User();
		$imageEdit = false;
		$namePhotograph = '';
		$typePhotograph = '';
		if(isset($_POST['sendData'])){
			if(isset($_POST['name'], $_POST['tel'], $_POST['email'], $_POST['password'], $_FILES['photograph']) && !empty($_POST['name']) && !empty($_POST['tel']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_FILES['photograph']['tmp_name'])){
				$name     = addslashes($_POST['name']);
				$tel      = addslashes($_POST['tel']);
				$email    = addslashes($_POST['email']);
				$password = md5(addslashes($_POST['password']));
				$namePhotograph = md5(time().rand(0, 999)).'.jpg';
				$typePhotograph = $_FILES['photograph']['type'];
				$_FILES['photograph']['name'] = $namePhotograph;
				$u->saveImage($_FILES['photograph']);
				$u->save($namePhotograph, $name, $tel, $email, $password);
				$imageEdit = true;
			}
		}

		if(isset($_POST['sendImg'])){
			$name       = $_POST['img'];
			$type       = $_POST['type'];
			$width      = $_POST['w'];
			$height     = $_POST['h'];
			$positionX  = $_POST['x'];
			$positionY  = $_POST['y'];
			$u->updateImg($name, $type,$width, $height, $positionX, $positionY);
		}
		$dados['imageEdit']      = $imageEdit;
		$dados['namePhotograph'] = $namePhotograph;
		$dados['typePhotograph'] = $typePhotograph;
		$this->loadView('cadaster', $dados);
	}

	public function logout(){
		unset($_SESSION['user_id']);
		header('Location: '.BASE_URL.'user/login');
	}
}
?>