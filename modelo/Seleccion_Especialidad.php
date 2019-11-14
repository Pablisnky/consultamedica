<?php 
	//Oculta todos los errores, desactivarlo para funcionamiento en local y activarlo para remoto
    //error_reporting(0);

	include("conexion/Conexion_BD.php");

	//se consultan las especialidades disponibles en el sistema
	$Ar_Especialidades =array();
    $Consulta= "SELECT ID_Especialidad,especialidad FROM especialidades WHERE ID_Especialidad IN (1, 8, 19) ORDER BY especialidad ASC";
    $Resulset = mysqli_query($conexion, $Consulta);
	while($Doctores= mysqli_fetch_array($Resulset)){ 
		$Ar_Especialidades[] = $Doctores;
	} 
//--------------------------------------------------------------------------------------------------------------------------

?>
	                	
							
							