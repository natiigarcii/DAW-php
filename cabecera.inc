<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo $title; ?></title>
	<meta charset="utf-8"/>	
	<meta name="generator" content="Bloc de notas" /> 
	<meta name="author" content="Sergio y Natalia" /> 
	<meta name="keywords" content="HTML5, web" /> 
	<meta name="description" content="Practica DAW" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./responsive.css" title="Estilo de la web responsive">	
	<link rel="alternate stylesheet" type="text/css" href="./accesible.css" title="Estilo de la web accesible">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" type="text/css" href="impresion.css"  media="print"/>
	<link rel="alternate" type="application/rss+xml" title="RSS Feed" href="feed.php" />

</head>
<?php
$link = @mysqli_connect('localhost','root','admin', 'pibd'); 
	if(!$link) {
		echo '<p>Error al conectar con la base de datos: ' . mysqli_connect_error();
		echo '</p>';
	exit;
} 
?>
