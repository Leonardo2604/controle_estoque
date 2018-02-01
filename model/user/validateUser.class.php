<?php
/**
*Classe responsavel por validar cada variavel da classe User. 
*/
class Validate{

	public function validateId($id){
		if(!empty($id) && is_int($id) && $id > 0){
			$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
			return $id;
		}else{
			return false;
		}
	}

	public function validatePhotograph($photo){
		if(is_string($photo)){
			$photo = filter_var($photo, FILTER_SANITIZE_MAGIC_QUOTES,
									  FILTER_SANITIZE_STRING);
			return $photo;
		}else{
			return false;
		}
	}
	
	public function validateName($text){
		if(!empty($text) && is_string($text)){
			$text = filter_var($text, FILTER_SANITIZE_MAGIC_QUOTES,
									  FILTER_SANITIZE_STRING);
			return $text;
		}else{
			return false;
		}
	}

	public function validateEmail($email){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			$email = filter_var($email, FILTER_SANITIZE_MAGIC_QUOTES,
									    FILTER_SANITIZE_EMAIL);
			return $email;
		}else{
			return false;
		}
	}

	public function validatePassword($password){
		if(!empty($password) && is_string($password)){
			$password = filter_var($password, FILTER_SANITIZE_MAGIC_QUOTES);
			return md5($password);
		}else{
			return false;
		}
	}
}
?>