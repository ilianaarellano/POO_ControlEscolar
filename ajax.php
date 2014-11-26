<?php 
	require ('seguridad.php'); 
	$nivelusuario=$_SESSION['permisos'];
?>
<?php
	/**
	 * Created by PhpStorm.
	 * User: Migue
	 * Date: 29/09/14
	 * Time: 07:41 PM
	 */
	require 'des_header.php';
	if($nivelusuario == 1){
		require("menu_administrador.php");
	}
	else{
		require "menu_maestro.php";
	}

	require("Usuario.php");
	require("Materia.php");
	require("bd.php");
	$idmaestro=$_POST["combomaestro"];

	$materia = new Materia();
	$materia->datosMaestro($idmaestro);
	$materia->materiasAsignadas($idmaestro);
	$materia->asignarMateriasMaestro($idmaestro);
?>
