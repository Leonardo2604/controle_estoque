<!DOCTYPE html>
<html>
<head>
	<title>site</title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/template.css"/>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<body>
	<header>
		<?php 
		$u = new User();
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			$array['userInfo'] = $u->getinfoUser($_SESSION['user_id']);
			$this->loadView('header', $array);
		}else{
			header('Location: '.BASE_URL.'user/logout');
		}
		?>
	</header>
	<section class="row">
		<aside class="col-2">

		</aside>
		<main class="col">
			<?php $this->loadViewInTemplate($viewName, $viewData); ?>
		</main>
	</section>
	<footer>
		...
	</footer>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.3.1.min.js"/></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/popper.min.js"/></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"/></script>
</body>
</html>