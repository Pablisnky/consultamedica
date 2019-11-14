<?php
	include("conexion/Conexion_BD.php");	
		
	$eliminar= $_GET['CitaEliminar'];
	$ID_PR= $_GET['ID_Paciente'];
	//echo "ID_Cita: " . $eliminar . "<br>";
	//echo "ID_PR: " . $ID_PR . "<br>";

	if(!isset($ID_PR)){					  
		$Eliminar= mysqli_query($conexion,"DELETE FROM citas WHERE ID_Cita='$eliminar' ");
		if($Eliminar){
			header("location:Cancelar.php");
		}
	}
	else{
		$Eliminar_2= mysqli_query($conexion,"DELETE FROM citas WHERE ID_Cita='$eliminar' ");
			header("location:registro/pacienteRegistrado.php");
	}
?>
	