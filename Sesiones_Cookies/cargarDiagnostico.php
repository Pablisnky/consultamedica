<?php
ini_set('display_errors', 1); //muestra los errore en php, activar en etapa de desarrollo (1) desactivar en etapa de producción (0)
          //Datos recibidos desde muestraHistoria_2.php

        //recive los datos de diagnostico.php
            $Cedula= $_POST["cedula_Paciente"];
            $ID_Doctor= $_POST["doctor"];
            $Diagnostico= $_POST["diagnostico"];
            $Observaciones= $_POST["observaciones"];
            
            //echo $ID_Paciente . "<br>";
            //echo $ID_Doctor . "<br>";
            //echo $Cedula . "<br>"; 
            //echo $Observaciones . "<br>"; 


          include("../conexion/Conexion_BD.php");
          mysqli_query($conexion,"SET NAMES 'utf8' ");
          //con CURDATE() se introduce automaticamente la fecha actual del servidor MySQL
          $Insertar=" INSERT INTO diagnostico( fecha, diagnostico, Cedula_Paciente, ID_Doctor, observaciones) VALUES( CURDATE(), '$Diagnostico', '$Cedula','$ID_Doctor','$Observaciones')";

          mysqli_query($conexion,$Insertar);
          header("location: HistoriasClinicas.php?cedula_pacient=". $Cedula);