<?php
ini_set('display_errors', 1); //muestra los errore en php, activar en etapa de desarrollo (1) desactivar en etapa de producción (0)
          //Datos recibidos desde muestraHistoria_2.php
            $ID_Doctor= $_POST["doctor"];
            $Cedula= $_POST["cedula"];
            $fecha= $_POST["fecha"];
            $Motivo= $_POST["motivoConsulta"];
            $Enfermedad= $_POST["enfermedadActual"];
            $E_Funcional= $_POST["examenFuncional"];
            $Piel= $_POST["piel"];
            $Cabeza= $_POST["cabeza"];
            $Ojos= $_POST["ojos"];
            $FondoOjos= $_POST["fondoOjos"];
            $Oidos=  $_POST["oidos"];
            $Nariz= $_POST["nariz"];
            $Boca= $_POST["boca"];
            $Faringe= $_POST["faringe"];
            $Cuello= $_POST["cuello"];
            $Ganglios= $_POST["ganglios"];
            $Torax= $_POST["torax"];
            $Mamas= $_POST["mamas"];
            $Respiratorio= $_POST["respiratorio"];
            $Cardiovascular= $_POST["cardiovascular"];
            $Pulso= $_POST["pulso"];
            $Abdomen= $_POST["abdomen"];
            $Genitales= $_POST["genitales"];
            $Osteoarticular= $_POST["osteoarticular"];
            $Extremidades= $_POST["extremidades"];
            $Neurológico= $_POST["neurológico"];


            //echo $ID_Doctor . "<br>";
            //echo $Cedula . "<br>";
            //echo $fecha . "<br>";
            //echo $Motivo . "<br>";
            //echo $Enfermedad . "<br>";
            //echo $E_Funcional . "<br>";
            //echo $Piel . "<br>";
            //echo $Cabeza . "<br>";
            //echo $Ojos . "<br>";
            //echo $FondoOjos . "<br>";
            //echo $Oidos . "<br>";
            //echo $Nariz . "<br>";
            //echo $Boca . "<br>";
            //echo $Faringe . "<br>";
            //echo $Cuello . "<br>";
            //echo $Ganglios . "<br>";
            //echo $Torax . "<br>";
            //echo $Mamas . "<br>";
            //echo $Respiratorio . "<br>";
            //echo $Cardiovascular . "<br>";
            //echo $Pulso . "<br>";
            //echo $Abdomen . "<br>";
            //echo $Genitales . "<br>";
            //echo $Osteoarticular . "<br>";
            //echo $Extremidades . "<br>";
            //echo $Neurológico . "<br>";


          include("../conexion/Conexion_BD.php");
          mysqli_query($conexion,"SET NAMES 'utf8' ");
          $Insertar=" INSERT INTO historico_visitas(ID_Doctor, cedula_paciente, fecha_visita, motivo_consulta, enfermedad_actual, examen_funcional, piel, cabeza, ojos, fondo_ojos, oidos,  nariz, boca, faringe, cuello, ganglios, torax,  mamas, respiratorio, cardiovascular, pulso, Abdomen, genitales, osteoarticular, extremidades, neurologico ) VALUES('$ID_Doctor', '$Cedula', '$fecha', '$Motivo','$Enfermedad','$E_Funcional','$Piel','$Cabeza','$Ojos','$FondoOjos','$Oidos','$Nariz','$Boca','$Faringe','$Cuello','$Ganglios','$Torax','$Mamas','$Respiratorio','$Cardiovascular','$Pulso', '$Abdomen','$Genitales','$Osteoarticular','$Extremidades','$Neurológico')";

          mysqli_query($conexion,$Insertar);
          header("location: HistoriasClinicas.php?cedula_pacient=". $Cedula);