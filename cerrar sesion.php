<?php
	session_start();
	session_unset();//borra los valores
	session_destroy();//destruye las sesiones
	
	print"<meta http-equiv='refresh' content='0; url=index.php'>";

?>