<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/login.css"/>
	<link rel="stylesheet" href="http://jcrop-cdn.tapmodo.com/v2.0.0-RC1/css/Jcrop.css" type="text/css">
</head>
<body>
	<?php if(!$imageEdit): ?>
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
			<div class="form-group">
				<label for="photograph">Foto</label>
				<input type="file" class="form-control-file" id="photograph" name="photograph"/>
			</div>
			<button type="submit" name="sendData" class="btn btn-secondary btn-block btn-lg">Cadastrar</button>
		</form>
	</div>
	<?php else: ?>
	<img src="<?php echo BASE_URL.'assets/images/users/'.$namePhotograph; ?>" id="target" />
	<form method="POST"/>
		<input type="hidden" name="x" id="x" />
		<input type="hidden" name="y" id="y" />
		<input type="hidden" name="w" id="w" />
		<input type="hidden" name="h" id="h" />
		<input type="hidden" name="img" value="<?php echo $namePhotograph; ?>" />
		<input type="hidden" name="type" value="<?php echo $typePhotograph; ?>" />
		<p class="text-center mt-2">
			<input type="submit" name="sendImg" class="btn btn-lg btn-secondary" value="Pronto" />
		</p>
	</form>
	<?php endif; ?>

	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.3.1.min.js"/></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"/></script>
	<script src="http://jcrop-cdn.tapmodo.com/v0.9.12/js/jquery.Jcrop.js"></script>
	<script type="text/javascript">
	  jQuery(function($){

	    $('#target').Jcrop({
		    aspectRatio: 1,
		    bgColor: 'black',
		    bgOpacity: 0.4,
		    minSize: [256, 256],
		    canDrag: true,
		    onSelect: updateCoords
		});

		function updateCoords(c){
			$('#x').val(c.x);
			$('#y').val(c.y);
			$('#w').val(c.w);
			$('#h').val(c.h);
		}
	    
	  });
	</script>
</body>
</html>