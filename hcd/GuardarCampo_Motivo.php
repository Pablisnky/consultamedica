<?php 
	include("../conexion/Conexion_BD.php");

	$Motivo=$_GET["val_1"];//recibe el Motivo de la consulta desde Ajax.php
	$ID_Doctor= $_GET["val_2"];//recibe el ID_Doctor desde AJAX ejectudado en Ajax.php
	$Cedula=$_GET["val_3"];//recibe la cedula del paciente desde AJAX ejectudado en Ajax.php
	//echo "Motivo de consulta= " . $Motivo . "<br>";
	//echo "ID_Doctor= " . $ID_Doctor . "<br>";
	//echo "Cedula paciente= " . $Cedula . "<br>";

	$Consulta="INSERT INTO diagnostico(fecha, Cedula_Paciente, ID_Doctor, motivoConsulta) VALUES(CURDATE(),'$Cedula', '$ID_Doctor','$Motivo')";
 	mysqli_query($conexion,$Consulta);
				
		//echo $Motivo;
?>

