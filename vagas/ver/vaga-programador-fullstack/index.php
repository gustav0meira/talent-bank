<?php

include_once('../../../app/config.php');

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
    .none{
    	display: none !important;
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
				<a href="#"><button class="topModule right">💻 Sita da Empresa</button></a>
				<a href="#"><button class="topModule right">📑 Enviar Currículo</button></a>
			</div>
			<div class="col-12">
				<div class="module">
					<div class="row">
						<div class="col-12">
							<label>Local: <?php echo ($local != null) ? $local : '<span class="none">N/A</span>'; ?></label><br><br>
							<label>Modalidade: <?php echo ($modalidade != null) ? $modalidade : '<span class="none">N/A</span>'; ?></label><br><br>
							<label>Tipo do Contrato: <?php echo ($tipoContrato != null) ? $tipoContrato : '<span class="none">N/A</span>'; ?></label><br><br>
							<label>Nível de Carreira: <?php echo ($nivelCarreira != null) ? $nivelCarreira : '<span class="none">N/A</span>'; ?></label><br><br>
							<label>Encerramento do Processo: <?php echo ($dataLimite != null) ? date('d/m/Y', strtotime($dataLimite)) : '<span class="none">N/A</span>'; ?></label><br><br>
							<label>Salário: R$ <?php echo ($salario != null) ? number_format($salario, 2, ',', '.') : '<span class="none">N/A</span>'; ?></label><br><br>
							<hr>
							<?php echo $descricao ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
