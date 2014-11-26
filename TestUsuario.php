<?php require ('seguridad.php');
	$nivelusuario=$_SESSION['permisos'];
 ?>
<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 18/09/14
 * Time: 07:47 PM
 */
	require 'des_header.php';
		if($nivelusuario == 1){
			require("menu_administrador.php");
		}
		else{
			require "menu_maestro.php";
		}
require ("Usuario.php");
require ("bd.php");
$usuario = new usuario;
//$usuario->readUsuarioG();
if(isset($_POST["submit"]))
{
    switch($_POST["submit"])
    {
        case "Entrar":
            $nombre=$_POST['nombre'];
            $app=$_POST['app'];
            $apm=$_POST['apm'];
            $usuario->createUsuario("$nombre","$app","$apm",$_POST['nivel']);
            break;
        case "Limpiar":
            $usuario->deleteUsuario("$_POST[ide]");
            break;
    }
}
?>
	<div id='page-wrapper'><div class='row'><div class='col-lg-12'><h1 class='page-header'></h1></div>
		<div class='col-lg-6'><div class='panel panel-default'>
		<div class='panel-heading' align='center'><b>ADMINISTRADOR DE USUARIOS</b></div><div class='panel-body'>
		<div class='table-responsive'>
			<table class='table'><tbody>
				<form name='alumno' action='TestUsuario.php' method='POST'>
						<tr>
							<td>Nombre(s):</td>
							<td><input type="text" name="nombre"></td>
						</tr>
						<tr>
							<td>Apellido Paterno:</td>
							<td><input type="text" name="app"></td>
						</tr>
						<tr>
							 <td>Apellido Materno:</td>
							 <td><input type="text" name="apm"></td>
						</tr>
						<tr>
							<td>Nivel:</td>
							<td><select name="nivel">
									<option value="1">Administrador</option>
									<option value="2">Maestro</option>
									<option value="3">Alumno</option>
									</select>
							</td>
						</tr>
						<tr><td colspan="2" align="center"><input type="submit" name="submit" value="Agregar"></td></tr>
						<tr>
							<td>ID:<input type="text" name="ide" placeholder="Eliminar"></td>
							<td><input type="submit" name="submit" value="Eliminar"></td>
						</tr>
						<tr>
							<td>ID:<input type="text" name="idm" placeholder="Modificar"></td>
							<td><input type="submit" name="submit" value="Modificar"> </td>
						</tr>
						<tr>
							<td>ID:<input type="text" name="idc" placeholder="Consultar"></td>
							<td><input type="submit" name="submit" value="Consultar"> </td>
						</tr>
					</table>
				</form>
		</div>
<?php
require ("bd.php");
$usuario = new usuario;
//$usuario->readUsuarioG();

if(isset($_POST["submit"]))
{
    switch($_POST["submit"])
    {
        case "Agregar":
            $nombre=$_POST['nombre'];
            $app=$_POST['app'];
            $apm=$_POST['apm'];
            $usuario->createUsuario("$nombre","$app","$apm",$_POST['nivel']);

            break;
        case "Eliminar":
            $usuario->deleteUsuario("$_POST[ide]");

            break;
        case "Modificar":
            $nombre=$_POST['nombre'];
            $app=$_POST['app'];
            $apm=$_POST['apm'];
            $usuario->updateUsuario("$_POST[idm]","$nombre","$app","$apm",$_POST['nivel']);

            break;
        case "Consultar":

            $usuario->readUsuarioS("$_POST[idc]");

            break;
    }
unset($_REQUEST);
}
?>

