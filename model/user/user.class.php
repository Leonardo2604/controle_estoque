<?php
require_once "validateUser.class.php";
/**
*Classe responsavel por conectar ao banco de dados e fazer alterações necessarias.
*/
class User{
	//propriedades do usuario.
	private $id;
	private $photograph;
	private $name;
	private $email;
	private $password;

	//propriedades do banco de dados.
	private $pdo;
	private $resultQuery;
	private $numRows;
	private $lastInsertId;

	//Getters.
	public function getId(){ 
		if(!empty($this->id)){
			return $this->id;	
		}else{
			return -1;
		}       
	}
	public function getPhotograph(){ 
		if(!empty($this->photograph)){
			return $this->$photograph;  
		}else{
			return "";
		}
	}
	public function getName(){ 
		if(!empty($this->name)){
			return $this->name;         
		}else{
			return "";
		}
	}
	public function getEmail(){
		if(!empty($this->email)){
			return $this->email;        
		}else{
			return "";
		}
	}
	public function getResultQuery(){ 
		if(!empty($this->resultQuery)){
			return $this->resultQuery;  
		}else{
			return array();
		}
	}
	public function getNumRows(){
		if(!empty($this->numRows)){
			return $this->numRows;      
		}else{
			return 0;
		}
	}
	public function getLastIdInsert(){ 
		if(!empty($this->lastInsertId)){
			return $this->lastInsertId; 
		}else{
			return -1;
		}
	}

	//Setters publicos.
	public function setPhotograph($p){
		$validate = new Validate();
		if(!is_bool($validate->validatePhotograph($p))){
			$this->photograph = $validate->validatePhotograph($p);
			return true;
		}else{
			return false;
		}
	}

	public function setName($n){
		$validate = new Validate();
		if(!is_bool($validate->validateName($n))){
			$this->name = $validate->validateName($n);
			return true;
		}else{
			return false;
		}
	}  

	public function setEmail($e){
		$validate = new Validate();
		if(!is_bool($validate->validateEmail($e))){
			$this->email = $validate->validateEmail($e);
			return true;
		}else{
			return false;
		}
	} 

	public function setPassword($p){
		$validate = new Validate();
		if(!is_bool($validate->validatePassword($p))){
			$this->password = $validate->validatePassword($p);
			return true;
		}else{
			return false;
		}
	}	

	//Setters privados.
	private function setResultQuery($result){ $this->resultQuery = $result; }
	private function setNumRows($num)       { $this->numRows = $num;        }
	private function setLastIdInsert($id)   { $this->lastInsertId = $id;    }

	//Funções da classe para manipulação do Banco.
	public function __construct($id = ""){
		try{
			$this->pdo = new PDO("mysql:dbname=inventory_control;host=localhost;
										charset=utf8", "root", "");
		}catch(PDOException $e){
			echo "Falha: <code>".$e->getMessage()."</code>";
		}

		if(!empty($id)){
			$sql = "SELECT * FROM `users` WHERE `id` = ".$id;
			$this->query($sql);

			if($this->getNumRows() > 0){
				foreach ($this->getResultQuery() as $user) {
					$this->id         = $user['id'];
					$this->photograph = $user['photograph'];
					$this->name       = $user['name'];
					$this->email      = $user['email'];
					$this->password   = $user['password'];
				}
			}else{
				//id errado
				return false;
			}
		}else{
			return;
		}
	}

	//Faz qualquer query
	public function query($sql){
		if(!empty($sql)){
			$db = $this->pdo->query($sql);
			$this->setNumRows($db->rowCount());
			$this->setResultQuery($db->fetchAll(PDO::FETCH_ASSOC));
		}
	}

	//Cria ou atualiza um usuario dependendo do id
	public function save(){
		if(!empty($this->name) && !empty($this->email) && !empty($this->password)){
			if($this->getId() < 0){
				//criando um novo usuario.
				$db = $this->pdo->prepare("INSERT INTO `users` 
										 (`photograph`, `name`, `email`, `password`)
										 VALUES 
										 (:photograph, :name, :email, :password)");

				$db->bindValue(":photograph", $this->photograph);
				$db->bindValue(":name",       $this->name);
				$db->bindValue(":email",      $this->email);
				$db->bindValue(":password",   $this->password);
				$db->execute();
				$this->setLastIdInsert($this->pdo->lastInsertId());
			}else{
				//Atualizando usuario existente.
				$db = $this->pdo->prepare("UPDATE `users` SET `photograph` = :photograph,
															  `name`       = :name, 
															  `email`      = :email, 
															  `password`   = :password
															   WHERE `id`  = :id");

				$db->bindValue(":photograph", $this->photograph);
				$db->bindValue(":name",       $this->name);
				$db->bindValue(":email",      $this->email);
				$db->bindValue(":password",   $this->password);
				$db->bindValue(":id",         $this->id);
				$db->execute();
			}
		}
	}

	//deleta um usuario com baso no id dele
	public function delete(){
		if($this->getId() > 0){
			$db = $this->pdo->prepare("DELETE FROM `users` WHERE `id` = :id");
			$db->bindValue(":id", $this->id);
			$db->execute();
		}
	}
}
?>