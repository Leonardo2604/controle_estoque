<?php
/**
* 
*/
class userController extends controller{
	
	public function index(){
		
	}

	public function login(){
		$dados = array();

		$error = 0;
		if(isset($_POST['send'])){
			if(isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){
				$email = addslashes($_POST['email']);
				$password = md5(addslashes($_POST['password']));
				$u = new User();
				if($u->login($email, $password)){
					header('Location: '.BASE_URL);
				}else{
					$error = 1;		
				}
			}else{
				$error = 2;
			}
		}

		$dados['error'] = $error;
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