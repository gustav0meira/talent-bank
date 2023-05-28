<?php $pageName = 'Home'; ?>
<?php require_once('app/config.php'); ?>
<?php require_once('app/vars.php'); ?>
<?php require_once('app/cdn.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $pageName ?> | <?php echo $appName ?></title>
	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<center>
					<div class="menu">
						<a href="#" class="menu_item"><label>Home</label></a>
						<a href="#" class="menu_item"><label>Quem Somos</label></a>
						<a href="#" class="menu_item"><label>Cases</label></a>
						<a href="#" class="menu_item"><label>Empresas</label></a>
					</div>
				</center>
			</div>
			<div class="col-sm">
				<div class="align">
					<center>
						<img class="logo" src="assets/logo.png">
						<h1>Descubra oportunidades incríveis!</h1>
						<p>Encontre a vaga perfeita na sua área e envie o seu currículo hoje mesmo!</p>
						<div class="search">
							<div class="row">
								<div class="col-10">
									<input class="left" type="text" name="searchVacancy" placeholder="Procure oportunidades...">
								</div>
								<div class="col-sm">
									<button class="right"><i class="fa-solid fa-magnifying-glass"></i></button>
								</div>
							</div>
						</div>
					</center>
				</div>
			</div>
			<div class="col-12">
				<label class="copy">Todos os direitos reservados à <?php echo $appName ?> ©</label>
			</div>
		</div>
	</div>
</body>
</html>
