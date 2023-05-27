<style>
	body{
		margin: 0px !important;
	}
	div.leftbarAdmin{
		background: #151E33;
		height: 100vh;
		width: 16vw;
		z-index: 1 !important;
		position: fixed;
		top: 0;
		left: 0;
	}
	div.barAdmin{
		padding: 20px;
		font-family: Poppins;
		font-weight: 300;
		color: #fff;
		font-size: 14px;
	}
	.adminLogo{
		width: 35%;
		margin-top: 20px;
		text-align: center;
		margin-bottom: 20px;
	}
	hr{
		color: #FFFFFF30;
	}
	.linkAdmin{
		color: white;
		padding: 20px;
		background: #FFFFFF10;
		border-radius: 15px;
		font-weight: 300;
		margin-bottom: 10px;
		cursor: pointer !important;
		transition: all 300ms;
	}
	.ativo{
		background: #FFFFFF30 !important;
	}
	.linkAdmin:hover{
		background: #FFFFFF20;
	}
	.linkAdmin label{
		cursor: pointer !important;
	}
	.linkProfile{
		background: white;
		padding: 10px;
		border-radius: 15px;
	}
	.profilePicture{
		width: 40px;
		height: 40px;
		background-size: cover !important;
		background-position: center center !important;
		float: right;
	}
	.name_profilePicture{
		color: #000000;
		float: left;
	}
</style>

<div class="leftbarAdmin">
	<div class="barAdmin">
		<div class="logo">
			<center>
				<img class="adminLogo" src="<?php echo $appLocal ?>/assets/logo.png">
				<hr>
				<div class="linkProfile">
					<div class="row">
						<div class="col-4">
							<center>	
								<div style="background: url('https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg');" class="profilePicture"></div>
							</center>
						</div>
						<div class="col-sm">
							<label class="name_profilePicture align">Gustavo</label>
						</div>
					</div>
				</div>
				<hr>
			</center>
		</div>

		<!-- link -->
		<a href="<?php echo $appLocal ?>/painel/">
			<div class="linkAdmin <?php if ($pageName == 'Painel'){echo 'ativo';} ?>">
				<div class="row">
					<div style="text-align: center;" class="col-3">
						<i class="fa-solid fa-chart-pie align"></i>
					</div>
					<div class="col-sm">
						<label class="title_linkAdmin">Painel</label>
					</div>
				</div>
			</div>
		</a>

		<!-- link -->
		<a href="<?php echo $appLocal ?>/vagas/">
			<div class="linkAdmin <?php if ($pageName == 'Vagas'){echo 'ativo';} ?>">
				<div class="row">
					<div style="text-align: center;" class="col-3">
						<i class="fa-regular fa-folder-open align"></i>
					</div>
					<div class="col-sm">
						<label class="title_linkAdmin">Vagas</label>
					</div>
				</div>
			</div>
		</a>

		<!-- link -->
		<a href="<?php echo $appLocal ?>/">
			<div class="linkAdmin <?php if ($pageName == 'Currículos'){echo 'ativo';} ?>">
				<div class="row">
					<div style="text-align: center;" class="col-3">
						<i class="fa-solid fa-paperclip align"></i>
					</div>
					<div class="col-sm">
						<label class="title_linkAdmin">Currículos</label>
					</div>
				</div>
			</div>
		</a>

		<!-- link -->
		<a href="<?php echo $appLocal ?>/">
			<div class="linkAdmin <?php if ($pageName == 'Colaboradores'){echo 'ativo';} ?>">
				<div class="row">
					<div style="text-align: center;" class="col-3">
						<i class="fa-regular fa-address-card align"></i>
					</div>
					<div class="col-sm">
						<label class="title_linkAdmin">Colaboradores</label>
					</div>
				</div>
			</div>
		</a>

	</div>
</div>

<style>
	body{

	}
	.no_a{
		text-decoration-color: none !important;
		color: #444;
		text-decoration: none;
	}
	.topMenu{
		position: absolute;
		width: 100%;
		top: 0;
		left: 0;
		background: transparent;
		color: #333 !important;
		z-index: 0;
		padding: 20px;
		padding-right: 5%;
	}
	.minha-conta svg{
		cursor: pointer !important;
	}
	.minha-conta{
		margin-left: 20px;
	}
</style>

<div class="topMenu">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				
			</div>
			<div class="col-6">
				<div class="right">
					<a class="no_a" href="#">
						<i class="fa-regular fa-bell"></i>
					</a>
					<a class="no_a" href="#">
						<i class="fa-regular fa-user minha-conta"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>