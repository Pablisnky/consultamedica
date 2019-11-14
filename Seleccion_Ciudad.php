<?php 
//alimenta el select de las ciudades en Citas_2.php

    //Oculta todos los errores, desactivarlo para funcionamiento en local y activarlo para remoto
    //error_reporting(0);

	include("conexion/Conexion_BD.php");
	$Especialidad=$_GET["val_5"];//recibe desde Ajax.js invocado en Citas_2.php al seleccionar una especialidads
	
	$Consulta="SELECT  DISTINCT ciudad FROM ciudades INNER JOIN ciudades_especialidades ON ciudades.ID_Ciudad=ciudades_especialidades.ID_Ciudad WHERE ID_Especialidad ='$Especialidad'";
	$Resulset = mysqli_query($conexion,$Consulta);    		
    while($Ciudad= mysqli_fetch_array($Resulset)){	
    	echo '<select style="width: 95%;" id="Captura_2" name="captura_2" onchange="llamar_especialista()">';// la función llamar_especialisata() se encuentra en Ajax.js    Captura_2, almacena el ID_Ciudad y captura_2, el nombre de la ciudad.
    	echo '<option value="0"> Seleccione Ciudad </option>';
	    echo '<option value="'.$Ciudad['ciudad'].'">'.$Ciudad['ciudad'] .' </option>'; 
		echo  '</select>';
	}
?>
	                	
							
							
		                  
								