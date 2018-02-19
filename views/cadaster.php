<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/login.css"/>
	<link rel="stylesheet" href="http://jcrop-cdn.tapmodo.com/v2.0.0-RC1/css/Jcrop.css" type="text/css">
</head>
<body>
	<div class="mx-auto custom-container">
		<div class="title-form">
			<h1>Cadastre-se</h1>
		</div>
		<form method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Nome</label>
				<input type="text" name="name" class="form-control" id="name" required="required" />
			</div>
			<div class="form-group">
				<label for="tel">Telefone</label>
				<input type="text" name="tel" class="form-control" id="tel" required="required" />
			</div>
			<div class="form-group">
				<label for="email">E-mail</label>
				<input type="email" name="email" class="form-control" id="email" required="required" />
			</div>
			<div class="form-group">
				<label for="password">Senha</label>
				<input type="password" name="password" class="form-control" id="password" required="required"/>
			</div>
			<button type="submit" name="sendData" class="btn btn-secondary btn-block btn-lg">Cadastrar</button>
		</form>
	</div>
</body>
</html>