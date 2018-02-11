<?php

/**
* Classe responsavel por fazer alterações necessarias na tabela users.
*
* @package inventory_control
* @author  Leonardo <leonardorangel2604@gmail.com>
* @version 1.0 
* @example Classe User 
*/
class User extends model{
	//propriedades do usuario.

	/**
	* Variável receberá o id do usuário $id(int).
	* @access private
	*/
	private $id;

	/**
	* Variável receberá o caminho até a foto do 
	* usurario $photograph(string).
	* @access private
	*/
	private $photograph;

	/**
	* Variável receberá o nome do 
	* usurario $name(string).
	* @access private
	*/
	private $name;

	/**
	* Variável receberá o email do 
	* usurario $email(string).
	* @access private
	*/
	private $email;

	/**
	* Variável receberá a senha do 
	* usurario $password(string).
	* @access private
	*/
	private $password;

	/**
	* Variável receberá a classe do PDO 
	* para conecção com o banco de dados $pdo(PDO).
	* @access private
	*/
	private $pdo;

	/**
	* Variável receberá usuaros do banco de dados $resultQuery(array).
	* @access private
	*/
	private $resultQuery;

	/**
	* Variável receberá o numero de usuarios encontrados
	* no banco de dados $numRows(int).
	* @access private
	*/
	private $numRows;

	/**
	* Variável receberá o numero do id do ultimo usuario inserido
	* no banco de dados $lastInsertId(int).
	* @access private
	*/
	private $lastInsertId;

	//Getters.

	/**
	* Função responsavel por pegar o id do usuario. 
	*
	* @access public 
	* @return retorna o id(int) caso esteja definido, caso o contrario retorna 0.
	*/
	public function getId(){ 
		if(!empty($this->id)){
			return $this->id;	
		}else{
			return 0;
		}       
	}

	/**
	* Função responsavel por pegar a foto do usuario.
	* 
	* @access public 
	* @return retorna photograph(string) caso esteja definido, caso o contrario retorna uma string vazia.
	*/
	public function getPhotograph(){ 
		if(!empty($this->photograph)){
			return $this->$photograph;  
		}else{
			return "";
		}
	}

	/**
	* Função responsavel por pegar o nome do usuario. 
	*
	* @access public 
	* @return retorna o name(string) caso esteja definido, caso o contrario retorna uma string vazia.
	*/
	public function getName(){ 
		if(!empty($this->name)){
			return $this->name;         
		}else{
			return "";
		}
	}

	/**
	* Função responsavel por pegar o email do usuario.
	*
	* @access public 
	* @return retorna o email(string) caso esteja definido, caso o contrario retorna uma string vazia.
	*/
	public function getEmail(){
		if(!empty($this->email)){
			return $this->email;        
		}else{
			return "";
		}
	}

	/**
	* Função responsavel por pegar o retorno de uma query.
	*
	* @access public 
	* @return retorna resultQuery(array) caso esteja definido, caso o contrario retorna um array vazio.
	*/
	public function getResultQuery(){ 
		if(!empty($this->resultQuery)){
			return $this->resultQuery;  
		}else{
			return array();
		}
	}

	/**
	* Função responsavel por pegar o numero de resultados retornado de uma query.
	*
	* @access public 
	* @return retorna numRows(int) caso esteja definido, caso o contrario retorna 0.
	*/
	public function getNumRows(){
		if(!empty($this->numRows)){
			return $this->numRows;      
		}else{
			return 0;
		}
	}

	/**
	* Função responsavel por pegar ultimo id inserido no banco de dados.
	*
	* @access public 
	* @return retorna lastInsertId(int) caso esteja definido, caso o contrario retorna 0.
	*/
	public function getLastIdInsert(){ 
		if(!empty($this->lastInsertId)){
			return $this->lastInsertId; 
		}else{
			return 0;
		}
	}

	//Setters publicos.

	/**
	* Função responsavel por definir o photograph(string).
	*
	* @access public 
	* @return retorna true caso seja definido, caso o contrario retorna false.
	*/
	public function setPhotograph($p){
		$validate = new Validate();
		if(!is_bool($validate->validatePhotograph($p))){
			$this->photograph = $validate->validatePhotograph($p);
			return true;
		}else{
			return false;
		}
	}

	/**
	* Função responsavel por definir o name(string).
	*
	* @access public 
	* @return retorna true caso seja definido, caso o contrario retorna false.
	*/
	public function setName($n){
		$validate = new Validate();
		if(!is_bool($validate->validateName($n))){
			$this->name = $validate->validateName($n);
			return true;
		}else{
			return false;
		}
	}  

	/**
	* Função responsavel por definir o email(string).
	*
	* @access public 
	* @return retorna true caso seja definido, caso o contrario retorna false.
	*/
	public function setEmail($e){
		$validate = new Validate();
		if(!is_bool($validate->validateEmail($e))){
			$this->email = $validate->validateEmail($e);
			return true;
		}else{
			return false;
		}
	} 

	/**
	* Função responsavel por definir o password(md5(string)).
	*
	* @access public 
	* @return retorna true caso seja definido, caso o contrario retorna false.
	*/
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
	/**
	* Função responsavel por definir o resultQuery(array).
	*
	* @access private 
	* @return retorna true caso seja definido, caso o contrario retorna false.
	*/
	private function setResultQuery($result){ $this->resultQuery = $result; }

	/**
	* Função responsavel por definir o numRows(int).
	*
	* @access private 
	* @return retorna true caso seja definido, caso o contrario retorna false.
	*/
	private function setNumRows($num){ $this->numRows = $num;        }

	/**
	* Função responsavel por definir o lastInsertId(int).
	*
	* @access private 
	* @return retorna true caso seja definido, caso o contrario retorna false.
	*/
	private function setLastIdInsert($id){ $this->lastInsertId = $id;    }

	/**
	* Função responsavel por iniciar a conecção com o banco de dados e se for passado o id do usuario
	* já serão definidas as variaveis $id, $photograph, $name, $email e $password.
	*
	* @access public
	* @param $id(int) identificador do usuario
	*/
	public function __construct($id = 0){
		try{
			$this->pdo = new PDO("mysql:dbname=inventory_control;host=localhost;
										charset=utf8", "root", "");
		}catch(PDOException $e){
			echo "Falha: <code>".$e->getMessage()."</code>";
		}

		if($id > 0){
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
			}
		}
	}

	/**
	* Função responsavel por fazer qualquer query que for passada para a função e se a query for 
	* realizada as variaveis $numRow e $resultQuery serão definidas.
	*
	* @access public
	* @param $sql(string) query para ser feita.
	*/
	public function query($sql){
		if(!empty($sql)){
			$db = $this->pdo->query($sql);
			$this->setNumRows($db->rowCount());
			$this->setResultQuery($db->fetchAll(PDO::FETCH_ASSOC));
		}
	}

	/**
	* Função responsavel por editar ou inserir usuários caso as variaveis  
	* $name, $email, $password (obrigatorios no banco de dados) estejam definidas
	* caso o id esteje definido irá atualizar o usuario, caso não esteje irá criar um usuario.
	*
	* @access public
	*/
	public function save(){
		if(!empty($this->name) && !empty($this->email) && !empty($this->password)){
			if($this->getId() == 0){
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

	/**
	* Função responsavel por deletar usuários com base no seu id.
	*
	* @access public
	*/
	public function delete(){
		if($this->getId() > 0){
			$db = $this->pdo->prepare("DELETE FROM `users` WHERE `id` = :id");
			$db->bindValue(":id", $this->id);
			$db->execute();
		}
	}
}
?>