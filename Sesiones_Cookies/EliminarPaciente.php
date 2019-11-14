<?php   
session_start();  
$verifica = 1906;  
$_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica

                
    include("../conexion/Conexion_BD.php");
    mysqli_query($conexion,"SET NAMES 'utf8' ");

    $Paciente= $_GET["ID_Pacient"];//se recibe desde RegistroPacientes.php
    //echo $Paciente;

    if(!empty($_GET["ID_Pacient"])){ 

    $consulta= mysqli_query($conexion, "DELETE FROM pacientes_registrados WHERE ID_PR='".$_GET['ID_Pacient']."'");

    if($consulta){
		header("location:RegistroPacientes.php");
		}
	else{
		echo "Surgio un problema";
	}
        }
?> 