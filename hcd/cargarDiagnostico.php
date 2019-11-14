<?php
     //muestra los errore en php, activar en etapa de desarrollo, desactivar en etapa de producción.
     include("../Clases/muestraError.php");
     
     //Datos recibidos desde diagnostico_2.php
          $Cedula= $_POST["cedula_Paciente"];
          $ID_Doctor= $_POST["doctor"];
          $Motivo= $_POST["motivo"];
          $Diagnostico= $_POST["diagnostico"];
          $DiagnosticoDescripcion= $_POST["diagnosticoDescripcion"];
          $Tratamiento_1= $_POST["tratamiento_1"];
          $Tratamiento_2= $_POST["tratamiento_2"];
          $RecibeTratamiento_1= $_POST["recibeTratamiento_1"];
          $RecibeTratamiento_2= $_POST["recibeTratamiento_2"];
          $Posologia= $_POST["posologia"];
            
          //echo "Cedula: " . $Cedula . "<br>";
          //echo "ID_Doctor: " . $ID_Doctor . "<br>"; 
          //echo "DiagnosticoDescripcion: " . $DiagnosticoDescripcion . "<br>"; 
          //echo "Tratamiento_1: " . $Tratamiento_1 . "<br>"; 
          //echo "RecibeTratamiento_1: " . $RecibeTratamiento_1 . "<br>"; 
          //echo "Tratamiento_2: " . $Tratamiento_2 . "<br>"; 
          //echo "recibeTratamiento_2: " . $RecibeTratamiento_2 . "<br>"; 
          //echo "posologia: " . $Posologia . "<br>"; 


          include("../conexion/Conexion_BD.php");

          //con CURDATE() se introduce automaticamente la fecha actual del servidor MySQL 
          $Consulta="INSERT INTO diagnostico(ID_Doctor, Cedula_Paciente, fecha, motivoConsulta, diagnostico_1, diagnosticoDescripcion, tratamiento_1, tratamiento_2, recibeTratamiento_1, recibeTratamiento_2, posologia) VALUES('$ID_Doctor', '$Cedula', CURDATE(), '$Motivo', '$Diagnostico', '$DiagnosticoDescripcion', '$Tratamiento_1', '$Tratamiento_2', '$RecibeTratamiento_1', '$RecibeTratamiento_2', '$Posologia')";
          mysqli_query($conexion,$Consulta);
          header("location: HistoriasClinicas.php?cedula_pacient=". $Cedula);
