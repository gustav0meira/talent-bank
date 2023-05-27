<?php $pageName = 'Vagas'; ?>
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
				<button class="topModule right">📂  Vagas Arquivadas</button>
				<button class="topModule right">📄  Nova Vaga</button>
			</div>
			<div class="col-12">
				<div class="module">
					<div id="vagasAbertas" style="height: 200px; width:500px;" class="ag-theme-material custom-scrollbar"></div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/ag-grid-community/dist/ag-grid-community.min.noStyle.js"></script>
<script>
function AcoesCellRenderer(params) {
  const linkView = document.createElement('a');
  linkView.style.margin = "0px";
  linkView.style.color = "#666";
  linkView.style.backgroundColor = "transparent";
  linkView.style.border = "none";
  linkView.style.cursor = "pointer";
  linkView.href = './view/?id=' + params.data.id;
  const iconView = document.createElement('span');
  iconView.classList.add('fa-regular', 'fa-eye');
  linkView.appendChild(iconView);

  const linkEdit = document.createElement('a');
  linkEdit.style.margin = "0px";
  linkEdit.style.color = "#666";
  linkEdit.style.backgroundColor = "transparent";
  linkEdit.style.border = "none";
  linkEdit.style.cursor = "pointer";
  linkEdit.href = './edit/?id=' + params.data.id;
  const iconEdit = document.createElement('span');
  iconEdit.classList.add('fa-regular', 'fa-edit');
  linkEdit.appendChild(iconEdit);

  const linkTrash = document.createElement('a');
  linkTrash.style.margin = "0px";
  linkTrash.style.color = "#666";
  linkTrash.style.backgroundColor = "transparent";
  linkTrash.style.border = "none";
  linkTrash.style.cursor = "pointer";
  linkTrash.href = './trash/?id=' + params.data.id;
  const iconTrash = document.createElement('span');
  iconTrash.classList.add('fa-regular', 'fa-trash-can');
  linkTrash.appendChild(iconTrash);

  linkTrash.addEventListener('click', function (event) {
    event.preventDefault(); // Evita o redirecionamento padrão do link

    const confirmDelete = confirm("Tem certeza de que deseja excluir este registro?");
    if (confirmDelete) {
      // Adicione aqui o código para realizar a exclusão do registro
      window.location.href = linkTrash.href;
    }
  });

  const container = document.createElement('div');
  container.appendChild(linkView);
  container.appendChild(linkEdit);
  container.appendChild(linkTrash);

  return container;
}

const columnDefs = [
  { field: 'id', filter: true, headerName: '#' },
  { field: 'titulo', filter: true, width: 300, headerName: 'Título' },
  { field: 'salario', filter: true, headerName: 'Salário' },
  { field: 'local', filter: true, headerName: 'Localização' },
  { field: 'modalidade', filter: true, headerName: 'Modalidade' },
  {
    field: 'acoes',
    filter: false,
    headerName: 'Ações',
    cellRenderer: 'AcoesCellRenderer',
    width: 100,
    cellRendererParams: {
      onClick: function (id) {
        console.log('Botão VER clicado para a linha com ID:', id);
        // Adicione o código para realizar a ação desejada ao clicar no botão
      }
    }
  },
  { field: 'status', filter: true, headerName: 'Status' },
];

const rowData = [
  <?php
  $consulta = "SELECT * FROM vagas";
  $con = $conn->query($consulta) or die($conn->error);
  while($dado = $con->fetch_array()) { ?> 

    {
      id: "<?php echo $dado['id'] ?>",
      titulo: "<?php echo $dado['titulo'] ?>",
      salario: "<?php echo $dado['salario'] ?>",
      local: "<?php echo $dado['local'] ?>",
      modalidade: "<?php echo $dado['modalidade'] ?>",
      status: "<?php echo $dado['status'] ?>"
    },

  <?php } ?>
];

const gridOptions = {
  columnDefs: columnDefs,
  rowData: rowData,
  components: {
    AcoesCellRenderer: AcoesCellRenderer
  },
  defaultColDef: {
    resizable: true,
    filter: true,
    sortable: true,
    flex: 1,
    minWidth: 100
  }
};

document.addEventListener('DOMContentLoaded', () => {
  const gridDiv = document.querySelector('#vagasAbertas');
  new agGrid.Grid(gridDiv, gridOptions);
});
</script>
</html>
