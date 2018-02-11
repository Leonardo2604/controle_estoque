<?php
/**
* 
*/
class userController extends controller{
	
	public function index(){
		
	}

	public function login(){
		$dados = array();
		$this->loadView('login', $dados);
	}

	public function cadaster(){
		$dados = array();
		$this->loadView('cadaster', $dados);
	}
}
?>