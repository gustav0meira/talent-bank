<?php

include_once('../../app/config.php');

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM vagas WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

			    $titulo               = $row['titulo'];
			    $local                = $row['local'];
			    $modalidade           = $row['modalidade'];
			    $tipoContrato         = $row['tipo_contrato'];
			    $nivelCarreira        = $row['nivel_carreira'];
			    $dataLimite           = $row['data_limite'];
			    $salario              = $row['salario'];
			    $descricao            = $row['descricao'];

    } else {

        echo "Registro não encontrado.";

    }

    $stmt->close();
    $conn->close();

} else {

    echo "ID não fornecido.";

}
?>

<?php $pageName = $titulo; ?>
<?php require_once('../../../app/vars.php'); ?>
<?php require_once('../../../app/cdn.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $titulo ?> | <?php echo $appName ?></title>
  <style>
    body{
      padding: 50px !important;;
    }
    h3{
      font-family: Poppins !important;
      font-weight: 300 !important;
      color: #333 !important
    }
  </style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-6">
				<h3 class="align title"><?php echo $titulo ?></h3>
			</div>
			<div class="col-6">
				<a href="./arquivadas/"><button class="topModule right">💻 Sita da Empresa</button></a>
			</div>
			<div class="col-12">
				<div class="module">
          <?php print_r($row); ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
