<?php   
    session_start();  
    $verifica = 1906;  
    $_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica

    //Muestra todos los errores, desactivarlo para funcionamiento en local y activarlo para remoto
    error_reporting(0);
                
    include("../conexion/Conexion_BD.php");

    $Paciente= $_GET["ID_Paciente"];//se recibe desde RegistroPacientes.php
    $Medicamento= $_GET["ID_MC"];//se recibe desde RegistroPacientes.php
    //echo "ID_Paciente= " . $Paciente . "<br>";    
    //echo "ID_Medicamento= " . $Medicamento . "<br>";

    if(!empty($_GET["ID_Paciente"])){ 
        $consulta_1= mysqli_query($conexion, "DELETE FROM medicamentoscargados WHERE ID_PR= '$Paciente' AND ID_MC='$Medicamento'");

        if($consulta_1){
    		header("location:cargarMedicam.php");
    		}
    	else{
    		echo "Surgio un problema";
    	}
    }
?> 