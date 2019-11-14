<?php 
	include("../conexion/Conexion_BD.php");
    
    //Se reciben todos los datos desde Ajax_Cancelar.js
	$Correo= $_GET["correo"];
	//echo $Correo . "<br>";

        
    //Si no se selecciona nada que buscar, sale un mensaje.
    if(isset ($Correo)){//Si esta declarada (si existe)
        //se ejecuta la consulta segun el criterio
        $Consulta= "SELECT * FROM pacientes_registrados WHERE correo_pacient= '$Correo'"; 
        $Resulset=mysqli_query($conexion,$Consulta);
        $Contador= mysqli_num_rows($Resulset);

        if($Contador == 0){
            return false;
        }
        else{
            echo "Ya existe";
        }  
    }