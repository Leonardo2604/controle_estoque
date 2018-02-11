<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/login.css"/>
</head>
<body>
	<div class="row custom-container">
		<div class="col-10 offset-1 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
			<div class="title-form">
				<h1>Login</h1>
			</div>
			<form method="POST">
				<div class="form-group">
					<label for="email">E-mail</label>
					<input type="email" name="email" class="form-control" id="email" required="required" />
				</div>
				<div class="form-group">
					<label for="password">Senha</label>
					<input type="password" name="password" class="form-control" id="password" required="required"/>
				</div>
				<button type="submit" class="btn btn-primary btn-block btn-lg">Entrar</button>
			</form>
		</div>
	</div>

	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.3.1.min.js"/></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/popper.min.js"/></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"/></script>
</body>
</html>