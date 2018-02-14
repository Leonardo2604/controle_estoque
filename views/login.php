<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/login.css"/>
</head>
<body>
	<div class="mx-auto custom-container border border-secundary rounded">
		<div class="title-form">
			<h1>Login</h1>
		</div>
		<?php if($error == 1): ?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			Email e/ou senha estão errados.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php elseif($error == 2): ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Por favor preencha todos os campos.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php elseif($error == 3): ?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			Captch errado.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php elseif($error == 4): ?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			Preencha o captcha.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php endif; ?>
		<form method="POST">
			<div class="form-group">
				<label for="email">E-mail</label>
				<input type="email" name="email" class="form-control" id="email" required="required" />
			</div>
			<div class="form-group">
				<label for="password">Senha</label>
				<input type="password" name="password" class="form-control" id="password" required="required"/>
			</div>
			<?php if($_SESSION['attempts'] > 2): ?>
			<div class="form-group">
				<img src="<?php echo BASE_URL.'views/captcha.php'; ?>" class="mx-auto mb-4 d-block" height="100"/>
				<input type="text" name="cod" class="form-control"/>
				<p class="text-center">
					<a href="<?php echo BASE_URL.'captcha/changeCaptchaByLink'; ?>" />Trocar código</a>
				</p>
			</div>
			<?php endif; ?>
			<button type="submit" name="send" class="btn btn-secondary btn-block btn-lg">Entrar</button>
		</form>
	</div>

	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.3.1.min.js"/></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"/></script>
</body>
</html>