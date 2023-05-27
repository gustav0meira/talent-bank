<?php

	// app
	$appName = 'RecruitEasy';
	$appLocal = 'http://localhost/talent-bank';

	// cores
	$corPrincipal = '#0047AB';
	$corSecundaria = '#005F87';

?>

<style>
	body{
		padding: 75px 50px 0px calc(16vw + 50px);
		font-family: Poppins !important;
		font-weight: 300 !important;
	}
	.noButton{
		background: transparent;
		border: none;
		padding: 0px;
		margin: 0px;
	}
	.align{
		position: relative;
		top: 50%;
		transform: translateY(-50%);
	}
	.right{
		float: right !important;
	}
	.left{

		float: left !important;
	}
	.module{
		background: white;
		padding: 20px;
		border-radius: 15px;
		margin-top: 20px;
		box-shadow: 0px 0px 50px 0px rgba(0,0,0,0.05);
	}
	button.topModule{
		padding: 10px;
		border: 1px solid #1D4F4A;
		background: #1D4F4A;
		color: white;
		border-radius: 15px;
		font-size: 13px;
		margin-left: 20px;
		font-family: Poppins;
		font-weight: 300;
		padding-left: 20px;
		padding-right: 20px;
		transition: all 300ms;
	}
	button.topModule:hover{
		border-color: #091021;
		background: #091021;
	}
	label.title{
		font-weight: 300;
		font-size: 14px;
		color: #555;
	}
	.title svg{
		margin-right: 20px !important;
	}
</style>