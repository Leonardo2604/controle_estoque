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

	/**
	* Função responsavel por fazer qualquer query que for passada para a função e se a query for 
	* realizada as variaveis $numRow e $resultQuery serão definidas.
	*
	* @access public
	* @param $sql(string) query para ser feita.
	*/
	public function query($sql){
		if(!empty($sql)){
			$pdo = $this->db->query($sql);
			$this->numRows = $this->db->rowCount();
			$this->resultQuery = $this->db->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	/**
	* Função responsavel por pegar as infromações do usuario com base no seu id
	*
	* @access public
	* @param $id(int)
	* @return $user(array) com as informações do usuario
	*/
	public function getinfoUser($id){
		if(!empty($id)){
			$sql = $this->db->prepare("SELECT * FROM `users` WHERE `id` = :id");
			$sql->bindValue(':id', $id);
			$sql->execute();
			
			if($sql->rowCount() > 0){
				$user = $sql->fetch(PDO::FETCH_ASSOC);
				return $user;
			}
		}
	}

	/**
	* Função responsavel por editar ou inserir usuários caso as variaveis  
	* $name, $email, $password (obrigatorios no banco de dados) estejam definidas
	* caso o id esteje definido irá atualizar o usuario, caso não esteje irá criar um usuario.
	*
	* @access public
	*/
	public function save($photograph, $name, $telephone, $email, $password, $id = 0){
		if($id == 0){
			//criando um novo usuario.
			$sql = $this->db->prepare("INSERT INTO `users` 
									 (`photograph`, `name`, `telephone`, `email`, `password`)
									 VALUES 
									 (:photograph, :name, :telephone, :email, :password)");

			$sql->bindValue(":photograph", $photograph);
			$sql->bindValue(":name",       $name);
			$sql->bindValue(":telephone",  $telephone);
			$sql->bindValue(":email",      $email);
			$sql->bindValue(":password",   $password);
			$sql->execute();
			$this->lastInsertId = $this->db->lastInsertId();
		}else{
			//Atualizando usuario existente.
			$db = $this->db->prepare("UPDATE `users` SET `photograph`  = :photograph,
														  `name`       = :name,
														  `telephone`  = :telephone, 
														  `email`      = :email, 
														  `password`   = :password
														   WHERE `id`  = :id");

			$sql->bindValue(":photograph", $photograph);
			$sql->bindValue(":name",       $name);
			$sql->bindValue(":telephone",  $telephone);
			$sql->bindValue(":email",      $email);
			$sql->bindValue(":password",   $password);
			$sql->bindValue(":id",         $id);
			$sql->execute();
		}
	}

	/**
	* Função responsavel por deletar usuários com base no seu id.
	*
	* @access public
	*/
	public function delete($id){
		if($id > 0){
			$sql = $this->db->prepare("DELETE FROM `users` WHERE `id` = :id");
			$sql->bindValue(":id", $id);
			$sql->execute();
		}
	}

	/**
	* Função responsavel por verificar o email e a senha do usuario
	* caso esteja correto iniciara a sessão $_SESSION['user_id'] 
	* com o id do usuario logado.
	*
	* @access public
	* @param $email(string), md5($password(string)).
	* @return true caso ache um usuario com esse email e senha
	* @return false caso não encontre um usuario com esse email e senha 
	*/	
	public function login($email, $password){
		$sql = $this->db->prepare("SELECT `id` FROM `users` WHERE `email` = :email AND `password` = :password");
		$sql->bindValue(':email',    $email);
		$sql->bindValue(':password', $password);
		$sql->execute();

		if($sql->rowCount() > 0){
			$user_id = $sql->fetch(PDO::FETCH_ASSOC);
			$_SESSION['user_id'] = $user_id['id'];
			return true;
		}else{
			return false;
		}
	}

	/**
	* Função responsavel por salvar a imagem enviada pelo usuario
	*
	* @access public
	* @param $imgInfo(array) contém as informações da imagem enviada
	* @return true caso consiga salvar a imagem
	* @return false caso não consiga salvar a imagem ou a imagem sejá de um tipo não permitido. 
	*/
	public function saveImage($imgInfo){
		$typesAllowed = array('image/jpeg', 'image/jpg', 'image/png');
		if(in_array($imgInfo['type'], $typesAllowed)){
			move_uploaded_file($imgInfo['tmp_name'], 'assets/images/users/'.$imgInfo['name']);
			return true;
		}else{
			return false;
		}
	}

	/**
	* Função responsavel por atualizar a imagem deixando-a com 
	* um aspecto ratio 1
	*
	* @access public
	* @param $name(string) nome da imagem
	* @param $src(string) tipo da imagem
	* @param $width(int) largura da imagem
	* @param $height(int) altura da imagem
	* @param $positionX(int) posição x para começa o corte.
	* @param $positionY(int) posição y para começa o corte.
	*/
	public function updateImg($name, $type, $width, $height, $positionX, $positionY){
		$path = 'assets/images/users/'.$name;

		switch ($type) {
			case 'image/jpeg':
				$img = imagecreatefromjpeg($path);
				break;
			case 'image/png':
				$img = imagecreatefrompng($path);
				break;
		}

		$new = imagecreatetruecolor($width, $height);

		if($type == 'image/png'){
			imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
			imagealphablending($new, false);
			imagesavealpha($new, true);
		}

		imagecopyresampled($new, $img, 0, 0, $positionX, $positionY, $width, $height, $width, $height);

		imagejpeg($new, $path, 80);
	}
}
?>