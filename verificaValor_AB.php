<?php 
	include("conexion/Conexion_BD.php");
    
    //Se reciben todos los datos por medio de Ajax_Cancelar.js desde CambiarClave.php
	$Valor_A= $_GET["val_1"];
    $Valor_B= $_GET["val_2"];

	//echo $Valor_A . "<br>";
    //echo $Valor_B . "<br>";
    
    //verifica si los valores A y B son de la cuenta de un paciente
    $Consulta= " SELECT * FROM usuario_doctor WHERE valor_A= '$Valor_A' AND valor_B ='$Valor_B'"; 
    $Resulset= mysqli_query($conexion,$Consulta);
    $Contador= mysqli_num_rows($Resulset);
    if($Contador == 0){
        echo "no mostrar";
    }
    else{
        echo "mostrarDoctor";
    }
                       
                                         
         
