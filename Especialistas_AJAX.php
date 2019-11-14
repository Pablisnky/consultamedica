<?php 
	include("conexion/Conexion_BD.php");

	$especialidad=$_GET["val_1"];//recibe el ID_Especialidad desde Ajax.php
	$ciudad= $_GET["val_6"];//recibe el ID_Ciudad desde AJAX ejectudado en Ajax.php


	
	$Consulta="SELECT ID_Doctor,nombre_doctor,apellido_doctor FROM doctores WHERE ID_Especialidad= '$especialidad' AND ciudad ='$ciudad'";
 	$Resulset=mysqli_query($conexion,$Consulta);
				
		echo '<select  style="width: 95%;" id="Captura"  name="captura_1"  onchange="llamar_PrecioConsulta(); llamar_mostrarHorarios(); llamar_mostrarDireccion(); llamar_Turno()">';// // todas las funciones se encuentran en Ajax.js  Captura, almacena el ID_Doctor
		echo '<option value="0"> Seleccione Especialista </option>';    		
        while($especialista= mysqli_fetch_array($Resulset)){

            	
       	echo '<option value="'.$especialista['ID_Doctor'].'">'.$especialista['nombre_doctor'] .' '.$especialista['apellido_doctor'] .' </option>'; 
        }
        echo  '</select>';
?>

