<?php 
	require ('seguridad.php'); 
	$nivelusuario=$_SESSION['permisos'];
?>
<?php
    require 'des_header.php';
	require 'Usuario.php';
    require 'bd.php';
    require 'Alumno.php';
	
	if($nivelusuario == 1){
		require("menu_administrador.php");
	}
	else{
		require "menu_maestro.php";
	}
    
    $alumno = new Alumno(); //Creamos un objeto
		   
    //Creamos un formulario en el cual mostramos los alumnos y el combo dinámico de los grupos.
    echo"<form action=TestAlumno.php method=POST>";
		echo"<div id='page-wrapper'><div class='row'><div class='col-lg-12'><h1 class='page-header'></h1></div>
				<div class='col-lg-6'><div class='panel panel-default'>
				<div class='panel-heading' align='center'><b>ASIGNAR MATERIAS A MAESTROS</b></div><div class='panel-body'>
				<div class='table-responsive'>
					<table class='table'><tbody>";
						$alumno->muestraAlumnosGrupos();//alumnos ya sea asignados o desasignados de un grupo.
						$alumno->muestraGrupos();//Mostramos el combo dinámico.								
		echo"<input type=hidden name=add_alu_grup>";//formulario 'add_alu_grup'.
		echo"<center><input type=submit value=Agregar><p><br></p>";
    echo"</form>";
	
    if(isset($_REQUEST['add_alu_grup'])){//Sólo si recibe el elemento del formulario.
        $cuantos = $_REQUEST['cuantos'];//Recibimos la cantidad de alumnos.
		echo"<div class='alert alert-success'><center><b>ALUMNOS ASIGNADOS CORRECTAMENTE</b></center></div>
			<meta content='.5' http-equiv='REFRESH'></meta>";
			for($y = 0; $y < $cuantos; $y++){//Repetimos el proceso hasta $cuantos.
				@$al = $_REQUEST["al$y"];//Recibimos el checkbox de la posición [$y].
					if($al != ""){//Va a llamar al método asignaGrupos sólo si el checkbox está lleno.
						$alumno->asignaGrupos($al, $_REQUEST['grupo']);
					}
			}
    }

    if(isset($_REQUEST['id'])){//Sólo si recibe el id a eliminar 'desasignar'.
        $alumno->desasignaGrupos($_REQUEST['id']); //Mandamos llamar al método desasignaGrupos.
		echo"<div class='alert alert-warning'><center><b>ALUMNOS DESASIGNADOS CORRECTAMENTE</b></center></div>";
    }	
    echo"</table>";
?>