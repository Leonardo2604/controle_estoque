<?php
/**
* 
*/
class homeController extends controller{
	
	public function index(){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			$dados = array();
			$this->loadTemplate('home', $dados);
		}else{
			header('Location: '.BASE_URL.'user/login');
		}
	}

}
?>