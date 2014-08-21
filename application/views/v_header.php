<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Go Mobility</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDroY6Zm8jCQsT8W7Ztt21UAZh9bMIuL7M">
    </script>
    <!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>-->
	<style type="text/css">
	html, body, #map-canvas {
		height: 100%;
		margin: 0px;
		padding: 0px
	}

	#map-canvas {
		height: 400px;
	}

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }
	
	*
	{
		padding:0;
	}

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #34495e;
	}

	.clear
	{
		clear: both;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}

	header nav
	{
		width: 800px;
		margin: 0 auto;
	}
	header ul
	{
		display: table;
		width: 100%;
		padding: 0;
	}

	header li
	{
		list-style-type: none;
		display: table-cell;
		text-align: center;
	}

	#content
	{
		width: 800px;
		margin: 0 auto;
	}

	.bloc
	{
		width: 800px;
		margin: 0 10px 0 0;
		float: left;
		background-color: #bdc3c7;
		padding: 5px;
	}

	.bloc h3
	{
		text-align: center;
	}

	.bloc h4
	{
		width: 125px;
		float: left;
		margin: 0;
	}

	.bloc p
	{
		width: 100px;
		text-align: right;
		float: right;
		margin: 0;
	}

	footer
	{
		width: 500px;
		margin: 0 auto;
	}

	footer ul
	{
		display: table;
		width: 100%;
	}

	footer li
	{
		list-style-type: none;
		display: table-cell;
		text-align: center;
	}

	</style>
</head>
<body>
	<header>
		<nav>
			<ul>
				<?php 
				$url = base_url('jeparticipe');
				echo '<li><a href="">Le Projet</a></li>				
					  <li><a href="#">Vos exp&eacute;riences</a></li>				
					  <li><a href="'.$url.'">Je participe</a></li>';
				?>								
			</ul>
		</nav>
	</header>