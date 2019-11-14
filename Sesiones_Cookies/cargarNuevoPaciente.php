<?php
ini_set('display_errors', 1); //muestra los errore en php, activar en etapa de desarrollo (1) desactivar en etapa de producción (0)
          

            $Cpaciente= $_SESSION["Cedula"];
        //se reciben los datos cargarPaciente.php desde este mismo formulario.
            $NombrePacient= $_POST["nombre_Paciente"];
            $ApellidoPacient= $_POST["apellido_Paciente"];
            $CedulaPacient= $_POST["cedula_Paciente"];
            $Edad= $_POST["edad_Paciente"];
            $Sexo= $_POST["sexo_Paciente"];
            $Nacionalidad= $_POST["nacionalidad_Paciente"];
            $EstadoCivil=  $_POST["estadoCivil_Paciente"];
            $Nacimiento= $_POST["lugarNacimiento_Paciente"];
            $FechaNacimiento= $_POST["fechaNacimiento_Paciente"];
            $Residencia= $_POST["residencia_Paciente"];
            $Sangre= $_POST["grupoSanguineo"];
            $Telefono= $_POST["telefono"];
            $Estado= $_POST["estado"];
            $Municipio= $_POST["municipio"];
            $Parroquia= $_POST["parroquia"];
            $Direccion= $_POST["direccion"];
            $Emergencia= $_POST["emergencia"];

           // echo $NombrePacient ."<br>";
           // echo $ApellidoPacient ."<br>";
           // echo $CedulaPacient ."<br>";
           // echo $Edad ."<br>";
           // echo $Sexo ."<br>";
           // echo $Nacionalidad ."<br>";
           // echo $EstadoCivil ."<br>";
           // echo $Nacimiento ."<br>";
           // echo $FechaNacimiento ."<br>";
           // echo $Residencia ."<br>";
           // echo $Sangre ."<br>";
           // echo $Telefono ."<br>";
           // echo $Estado ."<br>";
           // echo $Municipio ."<br>";
           // echo $Parroquia ."<br>";= ==,=,=,=,
           // echo $Direccion ."<br>";=,=,=,=,=,=
           // echo $Emergencia ."<br>";===== 

    $Actualizar=" INSERT INTO pacientes_registrados(ID_Doctor, nombre_pacient, apellido_pacient, cedula_pacient, edad_pacient, sexo_pacient, nacionalidad_pacient, estadoCivil_pacient, lugarNacimiento_pacient, fechaNacimiento_pacient, lugarResidencia_pacient, grupoSanguineo_pacient, telefono_pacient, estado_pacient, municipio_pacient, parroquia_pacient, direccion_pacient, emergencia_pacient) VALUES('$sesion', '$NombrePacient','$ApellidoPacient','$CedulaPacient','$Edad','$Sexo','$Nacionalidad','$EstadoCivil','$Nacimiento','$FechaNacimiento','$Residencia','$Sangre','$Telefono','$Estado','$Municipio','$Parroquia','$Direccion','$Emergencia')";

    mysqli_query($conexion,$Actualizar);


          include("../conexion/Conexion_BD.php");
          mysqli_query($conexion,"SET NAMES 'utf8' ");
          //con CURDATE() se introduce automaticamente la fecha actual del servidor MySQL
          $Insertar=" INSERT INTO diagnostico( fecha, diagnostico, Cedula_Paciente, ID_Doctor, observaciones) VALUES( CURDATE(), '$Diagnostico', '$Cedula','$ID_Doctor','$Observaciones')";

          mysqli_query($conexion,$Insertar);
          header("location: HistoriasClinicas.php?cedula_pacient=". $Cedula);