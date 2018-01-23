<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, user-scalable=0"/>
	<link rel="stylesheet" type="text/css" href="assets/css/style_index.css"/>
	<script type="text/javascript" src="assets/js/validate_login.js"></script>
</head>
<body>
	<section class="login">
		<form method="POST" action="" onsubmit="return validation()">
			<div class="title">Login</div>
			<div class="conteiner">
				<div class="text">E-mail:</div>
				<div class="input_area">
					<input type="email" name="email" onblur="validationEmail(this)" required/>
				</div>
			</div>
			<div class="conteiner">
				<div class="text">Senha:</div>
				<div class="input_area">
					<input type="password" name="password" onblur="validationPassword(this)" required/>
				</div>
			</div>
			<div class="conteiner">
				<input type="checkbox" name="remenber_me"/>Lembre-me
			</div>
			<div class="conteiner">
				<input type="submit" name="send" value="Entrar"/>
			</div>
		</form>
	</section>
</body>
</html>