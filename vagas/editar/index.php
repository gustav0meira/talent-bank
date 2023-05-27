<?php 
$pageName = 'Editar Vaga';
require_once('../../app/config.php');
require_once('../../app/vars.php');
require_once('../../app/cdn.php');
require_once('../../app/menu.php');

// Verifica se o ID está presente nos parâmetros GET
if (isset($_GET['id'])) {
    // Obtém o ID do parâmetro GET
    $id = $_GET['id'];

    // Prepara a consulta para obter o registro com base no ID
    $stmt = $conn->prepare("SELECT * FROM vagas WHERE id = ?");
    $stmt->bind_param('i', $id);

    // Executa a consulta
    $stmt->execute();

    // Obtém o resultado da consulta
    $result = $stmt->get_result();

    // Se houver um resultado, extrai os dados
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        // Se não houver resultado, redireciona para a página anterior
        header("Location: ../");
        exit();
    }
} else {
    // ID não fornecido nos parâmetros GET, redireciona para a página anterior
    header("Location: ../");
    exit();
}
?>

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
            var salarioInput = document.querySelector('input[name="salario"]');
            var cleave = new Cleave(salarioInput, {
                numeral: true,
                numeralThousandsGroupStyle: 'thousand',
                numeralDecimalScale: 0,
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
                                <input required type="text" placeholder="Título da vaga" name="titulo" id="myInput" value="<?php echo ($data['titulo'] != null) ? htmlspecialchars($data['titulo']) : ''; ?>"><br>
                            </div>
                            <div class="col-4">
                                <label>Local:</label><br>
                                <input placeholder="Local da vaga" type="text" name="local" value="<?php echo ($data['local'] != null) ? htmlspecialchars($data['local']) : ''; ?>"><br>
                            </div>
                            <div class="col-4">
                                <label>Modalidade:</label><br>
                                <select required name="modalidade">
                                    <option <?php echo ($data['modalidade'] == 'Híbrido') ? 'selected' : ''; ?>>Híbrido</option>
                                    <option <?php echo ($data['modalidade'] == 'Presencial') ? 'selected' : ''; ?>>Presencial</option>
                                    <option <?php echo ($data['modalidade'] == 'Home Office') ? 'selected' : ''; ?>>Home Office</option>
                                </select><br>
                            </div>
                            <div class="col-4">
                                <label>Tipo de Contrato:</label><br>
                                <select required name="tipoContrato">
                                    <option <?php echo ($data['tipo_contrato'] == 'Tempo integral') ? 'selected' : ''; ?>>Tempo integral</option>
                                    <option <?php echo ($data['tipo_contrato'] == 'Tempo parcial') ? 'selected' : ''; ?>>Tempo parcial</option>
                                    <option <?php echo ($data['tipo_contrato'] == 'Temporário') ? 'selected' : ''; ?>>Temporário</option>
                                    <option <?php echo ($data['tipo_contrato'] == 'Estágio') ? 'selected' : ''; ?>>Estágio</option>
                                    <option <?php echo ($data['tipo_contrato'] == 'Autônomo/Freelancer') ? 'selected' : ''; ?>>Autônomo/Freelancer</option>
                                    <option <?php echo ($data['tipo_contrato'] == 'Terceirizado') ? 'selected' : ''; ?>>Terceirizado</option>
                                    <option <?php echo ($data['tipo_contrato'] == 'Intermitente') ? 'selected' : ''; ?>>Intermitente</option>
                                </select><br>
                            </div>
                            <div class="col-4">
                                <label>Nível de Carreira:</label><br>
                                <select required name="nivelCarreira">
                                    <option <?php echo ($data['nivel_carreira'] == 'Estágio') ? 'selected' : ''; ?>>Estágio</option>
                                    <option <?php echo ($data['nivel_carreira'] == 'Júnior') ? 'selected' : ''; ?>>Júnior</option>
                                    <option <?php echo ($data['nivel_carreira'] == 'Pleno') ? 'selected' : ''; ?>>Pleno</option>
                                    <option <?php echo ($data['nivel_carreira'] == 'Pleno - Sênior') ? 'selected' : ''; ?>>Pleno - Sênior</option>
                                    <option <?php echo ($data['nivel_carreira'] == 'Sênior') ? 'selected' : ''; ?>>Sênior</option>
                                    <option <?php echo ($data['nivel_carreira'] == 'Especialista') ? 'selected' : ''; ?>>Especialista</option>
                                    <option <?php echo ($data['nivel_carreira'] == 'Liderança') ? 'selected' : ''; ?>>Liderança</option>
                                </select><br>
                            </div>
							<div class="col-4">
							    <label>Data Limite:</label><br>
							    <input required type="date" name="dataLimite" value="<?php echo ($data['data_limite'] != null) ? date('Y-m-d', strtotime($data['data_limite'])) : ''; ?>"><br>
							</div>
                            <div class="col-4">
                                <label>Salário:</label><br>
								<input type="text" name="salario" value="<?php echo ($data['salario'] != null) ? htmlspecialchars(number_format($data['salario'], 2, ',', '.')) : ''; ?>"><br>
                            </div>
                            <div class="col-12">
                                <label>Descrição da Vaga:</label><br>
                                <div id="editor"><?php echo $data['descricao']; ?></div>
                                <input type="hidden" name="editor" id="hiddenInput">
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
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
