<?php $pageName = 'Nova Vaga'; ?>
<?php require_once('../../app/config.php'); ?>
<?php require_once('../../app/vars.php'); ?>
<?php require_once('../../app/cdn.php'); ?>
<?php require_once('../../app/menu.php'); ?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $pageName ?> | <?php echo $appName ?></title>

	<link rel="stylesheet" type="text/css" href="style.css">

	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
	<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			// Adiciona a máscara de dinheiro ao campo de salário
			var salarioInput = document.querySelector('input[name="salario"]');
			var cleave = new Cleave(salarioInput, {
				numeral: true,
				numeralThousandsGroupStyle: 'thousand',
				numeralDecimalScale: 2,
				prefix: 'R$ ',
				delimiter: '.',
				numeralDecimalMark: ','
			});
		});
	</script>

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-6">
				<label class="align title"><i class="fa-regular fa-folder"></i>   > <a href="../">Vagas</a> >   <?php echo $pageName ?></label>
			</div>
			<div class="col-6">
				<button form="newVacancy" class="topModule right">🛟  Salvar</button>
				<a href="../"><button class="topModule back right">📝  Cancelar</button></a>
			</div>
			<div class="col-12">
				<form method="POST" action="./verify.php" id="newVacancy">
					<div class="module">
						<div class="row">
							<div class="col-12">
								<label>Título da Vaga:</label><br>
								<input required type="text" placeholder="Título da vaga" name="titulo" id="myInput"><br>
							</div>
							<div class="col-4">
								<label>Local:</label><br>
								<input placeholder="Local da vaga" type="text" name="local"><br>
							</div>
							<div class="col-4">
								<label>Modalidade:</label><br>
								<select required name="modalidade">
									<option>Híbrido</option>
									<option>Presencial</option>
									<option>Home Office</option>
								</select><br>
							</div>
							<div class="col-4">
								<label>Tipo de Contrato:</label><br>
								<select required name="tipoContrato">
									<option>Tempo integral</option>
									<option>Tempo parcial</option>
									<option>Temporário</option>
									<option>Estágio</option>
									<option>Autônomo/Freelancer</option>
									<option>Terceirizado</option>
									<option>Intermitente</option>
								</select><br>
							</div>
							<div class="col-4">
								<label>Nível de Carreira:</label><br>
								<select required name="nivelCarreira">
									<option>Estágio</option>
									<option>Júnior</option>
									<option>Pleno</option>
									<option>Pleno - Sênior</option>
									<option>Sênior</option>
									<option>Especialista</option>
									<option>Liderança</option>
								</select><br>
							</div>
							<div class="col-4">
								<label>Data Limite:</label><br>
								<input required type="date" name="dataLimite"><br>
							</div>
							<div class="col-4">
								<label>Salário:</label><br>
								<input type="text" name="salario"><br>
							</div>
							<div class="col-12">
								<label>Descrição da Vaga:</label><br>
								<div id="editor"></div>
							    <input type="hidden" name="editor" id="hiddenInput">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script>

var quill = new Quill('#editor', {
	theme: 'snow'
});

var form = document.querySelector("form");
var hiddenInput = document.querySelector('#hiddenInput');

form.addEventListener('submit', function(e){
	hiddenInput.value = quill.root.innerHTML;
});

</script>
</html>
