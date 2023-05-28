<?php $pageName = 'E-mail'; ?>
<?php require_once('../app/config.php'); ?>
<?php require_once('../app/vars.php'); ?>
<?php require_once('../app/cdn.php'); ?>
<?php require_once('../app/menu.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $pageName ?> | <?php echo $appName ?></title>

	<script src="https://cdn.jsdelivr.net/npm/ag-grid-community/dist/ag-grid-community.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ag-grid-community/dist/styles/ag-theme-material.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-6">
				<label class="align title"><i class="fa-regular fa-folder"></i>   >   <?php echo $pageName ?></label>
			</div>
			<div class="col-6">
				<a href="./novo/"><button class="topModule right">📩  Novo E-mail</button></a>
        <a href="./adicionar/"><button class="topModule right">✉️  Adicionar E-mail</button></a>
			</div>
			<div class="col-12">
				<div class="module">

				</div>
			</div>
		</div>
	</div>
</body>
</html>
