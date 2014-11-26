<?php
/**
 * Created by PhpStorm.
 * User: Iliana
 * Date: 7/10/14
 * Time: 12:10 PM
 */
class Login{
    private $user;
    private $password;
    private $status;

    public function validarUsuario($getuser,$getpassword)
    {
        $sql="CALL validateLogin('$getuser','$getpassword')";
        $consulta=mysql_query($sql) or die ("Error al validar informacion");
		$cuantos=mysql_num_rows($consulta);
			if($cuantos>0){
				$estatus=mysql_result($consulta,0,'Estatus');
				if($estatus==1){
					$id=mysql_result($consulta,0,'Id');
					$nivel=mysql_result($consulta,0,'Nivel');
					echo"<form method='POST' action='login2.php' name='frm'>";
						echo"<input type='hidden' name='_id' value=$id>";						
						echo"<input type='hidden' name='_nivel' value=$nivel>";										
					echo"</form>";
					echo"<script language='JavaScript'>document.frm.submit();</script>";
				}
				else{
					echo"<div class='alert alert-warning' role='alert'><center><b>USUARIO INACTIVO</b></center></div>";
				}
			}
			else{
				echo"<div class='alert alert-danger' role='alert'><center><b>DATOS INCORRECTOS</b></center></div>";
			}
    }
	
	public function acceso(){
		$id=$_POST['_id'];
		$nivel=$_POST['_nivel'];

		session_start();
		$_SESSION['clave']=$id;
		$_SESSION['permisos']=$nivel;
		if($id != "" and $nivel==1){
			print"<meta http-equiv='refresh' content='0; url=TestUsuario.php'>";
		} 
		else
			if($id != "" and $nivel==2){
				print"<meta http-equiv='refresh' content='0; url=TestMateria.php'>";
			}
			else{
				print"<meta http-equiv='refresh' content='0; url=index.php'>";
			}
	}

	public function seguridad(){
		session_start();
		@$id2=$_SESSION ['clave'];
		@$nivel2=$_SESSION ['permisos'];
		if($id2 == "" or $nivel2 == ""){
			print"<meta http-equiv='refresh' content='0; url=index.php'>";
			exit;
		}
	}
    

    public function mostrarFormulario()
    {
        echo"<div class=table-responsive>";
        echo"<table class=\"table table-striped\">";
        echo"<form  id=frmdo name=frmdo>";
        echo"<tr><td>Usuario:</td><td><input type=text name=usuario></td>";
        echo"<tr><td>Contraseña:</td><td><input type=password name=password></td>";
        echo"<tr><td colspan=2 align='center'><input type=submit name=Entrar value=Entrar id=Entrar></td></tr>";
        echo"</table>";
        echo"</div>";
        echo"</form>";
        echo"<div id=ajax></div>";
		echo'<script type="text/javascript">
    $(function(){
        $("#Entrar").click(function(){
            $.ajax({
                type: "POST",
                url: "valida.php",
                data: $("#frmdo").serialize(),
                success: function(data)
                {
                    $("#ajax").html(data);

                }
            });
            return false;
        });
    });
</script>';
    }
	/*
    public function accesos(){

	*/ /*
        if($id=="")
        {
            print"<meta http-equiv='refresh' content='0;
		url=index'>";
            exit;
        }
		*/

    }
    
?>
