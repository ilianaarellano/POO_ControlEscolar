<?php 
	require ('seguridad.php'); 
	$nivelusuario=$_SESSION['permisos'];
?>
<?php
	require 'des_header.php';
	require("bd.php"); 
	require("Materia.php");
	$materia = new Materia();
	
		if($nivelusuario == 1){
			require("menu_administrador.php");
			if(isset($_REQUEST["maestro"])){
				$id=$_REQUEST["maestro"];
			}
			else{
				$id = 0;
			}

			if(isset($_REQUEST["accion"])){
				$accion = $_REQUEST["accion"];
			}
			else{
				$accion = 0;
			}

			if(isset($_REQUEST["materia"])){
				$id_materia = $_REQUEST["materia"];
			}
			else{
				$id_materia = 0;
			}

			switch($accion){
				case 0:
					$materia->seleccionaMaestro($id);
					break;
				case 1:
					$materia->createMaestroMateria($id,$id_materia);
					$materia->seleccionaMaestro($id);
					break;
				case 2:
					$materia->deleteMaestroMateria($id_materia);
					$materia->seleccionaMaestro($id);
					break;
			}
		}
		else{
			require("menu_maestro.php");
			$materia = new Materia();
			$materia->materiasAsignadasMaestro($nivelusuario);
		}
?>