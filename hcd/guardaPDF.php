<?php
session_start();//se inicia una sesion
 	include("../conexion/Conexion_BD.php");

	//$sesion=$_SESSION["UsuarioDoct"];//aqui se tiene almacenado el ID_Doctor en $sesion
	$ID_Doctor=$_GET["ID_Doctor"];
	$ID_Publicacion= $_GET["ID_Publicacion"];
	//echo "ID_Publicación= " . $ID_Publicacion . "<br>";
	//echo "ID_Doctor=" . $ID_Doctor;

    $Consulta_2= "SELECT * FROM publicacionesdoctor WHERE ID_Doctor= '$ID_Doctor' AND ID_Publicacion = '$ID_Publicacion' ";
    $Recordset_2=mysqli_query($conexion,$Consulta_2);
    while($Publicaciones= mysqli_fetch_array($Recordset_2)){
                            
        header("content-type: application/pdf ");
        readfile("../perfiles/publicaciones/" . $Publicaciones['NombrePublicacion']);
    }