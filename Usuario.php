<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Theme Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <!--LIBRERIA JQUERY-->
      <link href="libreria/css/redmond/jquery-ui-1.10.4.custom.css">
      <script src="libreria/js/jquery-1.10.2.js"></script>
      <script src="libreria/js/jquery-ui-1.10.4.custom.js"></script>
      <!---->
  </head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 18/09/14
 * Time: 07:47 PM
 */
class Usuario {
    private $Id;
    private $Nombre;
    private $ApellidoPaterno;
    private $ApellidoMaterno;
    private $Telefono;
    private $Calle;
    private $NumeroExterior;
    private $NumeroInterior;
    private $Colonia;
    private $Municipio;
    private $Estado;
    private $CP;
    private $Correo;
    private $Usuario;
    private $Contrasena;
    private $Nivel;
    private $Estatus;


    public function createUsuario($nombre,$apellidop,$apellidom,$nivel){
        $Insert="INSERT INTO usuario(Nombre,ApellidoPaterno,ApellidoMaterno,Nivel,Estatus) VALUES('$nombre','$apellidop','$apellidom','$nivel',1)";
        $queryInsert=mysql_query($Insert) or die ("Error al generar la inserción".mysql_error());
		echo"<div class='alert alert-success'><center><b>REGISTRO AGREGADO CORRECTAMENTE</b></center></div>
			<meta content='2' http-equiv='REFRESH'></meta>";
    }
    public function deleteUsuario($id){
        $Delete="DELETE FROM usuario WHERE Id = $id";
        $queryDelete=mysql_query($Delete) or die ("Error al eliminar registro".mysql_error());
		echo"<div class='alert alert-danger'><center><b>REGISTRO $id ELIMINADO CORRECTAMENTE</b></center></div>
			<meta content='2' http-equiv='REFRESH'></meta>";
    }
    public function updateUsuario($id,$nombre,$apellidop,$apellidom,$nivel){
        $Update="UPDATE usuario SET Nombre='$nombre',ApellidoPaterno='$apellidop',ApellidoMaterno='$apellidom',Nivel='$nivel'
                  WHERE Id = $id";
        $queryUpdate=mysql_query($Update) or die ("Error al modificar".mysql_error());
		echo"<div class='alert alert-info'><center><b>REGISTRO $id MODIFICADO CORRECTAMENTE</b></center></div>
		<meta content='2' http-equiv='REFRESH'></meta>";
    }
    public function readUsuarioS($id){
        $sql01 = "SELECT * FROM usuario WHERE Id=$id ORDER BY ApellidoPaterno ASC";
        $result01 = mysql_query($sql01) or die ("Error $sql01") ;
        echo"<div class=table-responsive>";
        echo"<table class=\"table table-striped\">";
        echo"<tr><td colspan='5' align='center'><strong>CONSULTA USUARIO ESPECIFICO</strong></td></tr>";
        echo"<tr><td>ID</td><td>NOMBRE</td><td>A PATERNO</td><td>A MATERNO</td><td>ESTATUS</td></tr>";
        while($field = mysql_fetch_array($result01)){
            $this->Id = $field['Id'];
            $this->Nombre = $field['Nombre'];
            $this->ApellidoPaterno = $field['ApellidoPaterno'];
            $this->ApellidoMaterno = $field['ApellidoPaterno'];
            $this->Nivel = $field['Nivel'];
            switch($this->Nivel){
                case 1:
                    $type ="Administrador";
                    break;
                case 2:
                    $type ="Maestro";
                    break;
                case 3;
                    $type ="Alumno";
                    break;
            }
            echo"<tr><td>$this->Id</td><td>$this->Nombre</td><td>$this->ApellidoPaterno</td><td>$this->ApellidoMaterno</td><td>$this->Nivel</td></tr>";
        }
        echo"</table>";
        echo"</div>";
    }
    public function readUsuarioG(){
        $sql01 = "SELECT * FROM usuario WHERE Estatus=1 ORDER BY ApellidoPaterno ASC";
        $result01 = mysql_query($sql01) or die ("Error $sql01") ;

        echo"<div class=table-responsive>";
        echo"<table class=\"table table-striped\">";
        echo"<tr><td colspan='5' align='center'><strong>Lista de usuario</strong></td></tr>";
        echo"<tr><td>ID</td><td>NOMBRE</td><td>A PATERNO</td><td>A MATERNO</td><td>ESTATUS</td></tr>";
        while($field = mysql_fetch_array($result01)){
            $this->Id = $field['Id'];
            $this->Nombre = $field['Nombre'];
            $this->ApellidoPaterno = $field['ApellidoPaterno'];
            $this->ApellidoMaterno = $field['ApellidoPaterno'];
            $this->Nivel = $field['Nivel'];
            switch($this->Nivel){
                case 1:
                    $type ="Administrador";
                    break;
                case 2:
                    $type ="Maestro";
                    break;
                case 3;
                    $type ="Alumno";
                    break;
            }
            echo"<tr><td>$this->Id</td><td>$this->Nombre</td><td>$this->ApellidoPaterno</td><td>$this->ApellidoMaterno</td><td>$this->Nivel</td></tr>";
        }
        echo"</table>";
        echo"</div>";
    }
}
?>
</body>
</html>
