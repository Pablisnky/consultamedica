<?php 
	include("../conexion/Conexion_BD.php");
    
    //Se reciben todos los datos desde Ajax_Cancelar.js
	$Cedula= $_GET["cedula"];
	//echo $Cedula . "<br>";

        
    //Si no se selecciona nada que buscar, sale un mensaje.
    if(isset ($Cedula)){//Si esta declarada (si existe)
        //se ejecuta la consulta segun el criterio
        $Consulta= "SELECT * FROM pacientes_registrados WHERE cedula_pacient= '$Cedula'"; 
        $Resulset=mysqli_query($conexion,$Consulta);
        $Contador= mysqli_num_rows($Resulset);

        if($Contador == 0){
            return false;
        }
        else{
            echo "Ya existe";
        }  
    }