<?php   
session_start();  
$verifica = 1906;  
$_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica

    //Se conecta a la base de datos
    include("../conexion/Conexion_BD.php");
    //Desactiva errores en servidor remoto y activa en servidor local
    include("../Clases/muestraError.php");

    $Paciente= $_GET["ID_Paciente"];//se recibe el ID_Paciente desde RegistroPacientes.php
    $Cedula= $_GET["cedulaPaciente"];//se recibe la cedula desde RegistroPacientes.php
    echo "ID_Paciente: " . $Paciente . "<br>";
    echo "Cedula paciente: " . $Cedula . "<br>";

    if(!empty($_GET["ID_Paciente"])){ 
        $Eliminar_1= "DELETE FROM pacientes_registrados WHERE ID_PR= '$Paciente'"; 
        $Eliminado_1= mysqli_query( $conexion, $Eliminar_1); 

        $Eliminar_2=  "DELETE FROM doctores_pacientesregistrados WHERE ID_PR= '$Paciente'"; 
        $Eliminado_2= mysqli_query($conexion, $Eliminar_2);

        $consulta_3= mysqli_query($conexion, "DELETE FROM diagnostico WHERE Cedula_Paciente= '$Cedula'");  

        if($Eliminado_1 AND $Eliminado_2){
    		header("location:RegistroPacientes.php");
    	}
    	else{
    		echo "Surgio un problema";
    	}
    }
?> 