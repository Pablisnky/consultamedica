<?php   
session_start(); 

$verifica = $_SESSION["verifica"];

if ($verifica == 1906){   
    //echo "Entro bien a la sesion"  ."<br>";
    unset($_SESSION['verifica']);
    //se verifica la sesion para evitar que refresquen la pagina que procesa el formulario y asi nos envien multiples veces el formulario; 

      if (count($_POST)>0){ //Solo se ejecutará si ha enviado los datos por formulario.
            
            // captura todos los campos del formulario.
            //Recibe datos desde RegistroPacientes.php
            $NombrePacient= $_POST["nombre_Paciente"];//se recibe ID_Doctor desde
            $ApellidoPacient= $_POST["apellido_Paciente"];//se recibe desde 
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
            $Doctor= $_POST["id_doctor"];

            //echo $NombrePacient ."<br>";
            //echo $ApellidoPacient ."<br>";
            //echo $CedulaPacient ."<br>";
            //echo $Edad ."<br>";
            //echo $Sexo ."<br>";
            //echo $Nacionalidad ."<br>";
            //echo $EstadoCivil ."<br>";
            //echo $Nacimiento ."<br>";
            //echo $FechaNacimiento ."<br>";
            //echo $Residencia ."<br>";
            //echo $Sangre ."<br>";
            //echo $Telefono ."<br>";
            //echo $Estado ."<br>";
            //echo $Municipio ."<br>";
            //echo $Parroquia ."<br>";
            //echo $Direccion ."<br>";
            //echo $Emergencia ."<br>";
            //echo "ID_Doctor= " . $Doctor;

            //insercion de los datos capturados del formulario en la base de datos
            include("../conexion/Conexion_BD.php");
            mysqli_query($conexion,"SET NAMES 'utf8'");

            $insertar= "INSERT INTO pacientes_registrados(ID_Doctor,nombre_pacient, apellido_pacient, cedula_pacient,edad_pacient, sexo_pacient, nacionalidad_pacient, estadoCivil_pacient, lugarNacimiento_pacient, fechaNacimiento_pacient, lugarResidencia_pacient, grupoSanguineo_pacient, telefono_pacient, estado_pacient, municipio_pacient, parroquia_pacient, direccion_pacient, emergencia_pacient)


             VALUES('$Doctor','$NombrePacient','$ApellidoPacient','$CedulaPacient','$Edad', '$Sexo', '$Nacionalidad','$EstadoCivil','$Nacimiento','$FechaNacimiento','$Residencia','$Sangre','$Telefono','$Estado','$Municipio','$Parroquia','$Direccion','$Emergencia')";
                
            mysqli_query($conexion,$insertar); 
    
            header("location: RegistroPacientes.php");//no pueden haber nada antes de inicia la sesion arriba, ni lineas, ni espacios en blancos, ni echo, antes de enviar la cabecera no se puede enviar nada. antes de enviar cualquier contenido, envía las cabeceras, y los espacios también son contenido.

         }
                 
    }   
    else{// Si no viene del formulario o trata de recargar pagina los enviamos al formulario 
         
        echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=RegistroPacientes.php'>";  
    } 
?>