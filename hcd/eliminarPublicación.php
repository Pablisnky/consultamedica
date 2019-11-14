<?php   
session_start();  
$verifica = 1906;  
$_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica

                
    include("../conexion/Conexion_BD.php");

    $ID_Publicacion= $_GET["ID_Publicacion"];//se recibe desde mostrarPublicaciones_Basico.php
    //echo "EL ID_Publicacion= " . $ID_Publicacion . "<br>";

    if(!empty($_GET["ID_Publicacion"])){ 

        $consulta= mysqli_query($conexion, "DELETE FROM publicacionesdoctor WHERE ID_Publicacion='$ID_Publicacion' ");

        if($consulta){
            //echo "Se elimino";
    		header("location:mostrarPublicaciones.php");
    	}
    	else{
    		echo "Surgio un problema";
    	}
    }
?> 