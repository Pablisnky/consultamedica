<?php 
	include("conexion/Conexion_BD.php");
	mysqli_query($conexion,"SET NAMES 'utf8'");//es importante esta linea para que los caracteres especiales funcionen, tanto graficamente como logicamente

	$especialista=$_GET["val_9"];//recibe el ID_Doctor desde "llamar_turno()" ejecutado en Ajax.js
	$Consulta="SELECT inicio_mañana, inicia_tarde FROM horarios WHERE ID_Doctor ='$especialista'";
 	$Resulset = mysqli_query($conexion,$Consulta);
	$TurnoConsulta= mysqli_fetch_array($Resulset);


			
 			echo '<select  style="background-color: ; width: 95%;" id="tur"  name="tur_1">';
 			echo '<option value="0">Seleccione Turno</option>'; 
 			if(!empty($TurnoConsulta['inicio_mañana'])){		
          echo '<option value="mañana">  Mañana </option>'; 
      }
      if(!empty($TurnoConsulta['inicia_tarde'])){
			//echo '<option value="0">Seleccione Turno</option>'; 
          echo '<option value="tarde">  tarde </option>'; 
      }




            echo  '</select>';
            	
            	
?>