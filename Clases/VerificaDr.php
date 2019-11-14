<?php
	session_start();  //Se reanuda la sesion abierta en validarSesion.php
    
    if(!isset($_SESSION["UsuarioDoct"])){//sino esta declarada la variable $_SESSION devuelve a ingresar.php, con esto se garantiza que se hizo login
        header("location:../vista/ingresar.php");           
    }
    else{
        $sesion= $_SESSION["UsuarioDoct"];//aqui se almacena el ID_Doctor en $sesion
        //echo "ID_Doctor= " . $sesion;
    }
?>
