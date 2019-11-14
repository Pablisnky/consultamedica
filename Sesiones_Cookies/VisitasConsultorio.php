<?php
    session_start();  

	//$Fecha=  date('Y-m-d');
    $Diagnostico= $_POST["E"];
    $Tratamiento= $_POST["tratamiento"];
    $Paciente= $_SESSION["cedulaIdentidad"];//se recibe la cedula desde HistoriasClinica.php
    $Observacion= $_POST["observacion"];

   // echo "fecha= " . $Fecha . "<br>";
  //  echo "diagnostico= " . $Diagnostico . "<br>";
   // echo "tratamiento= " . $Tratamiento . "<br>";
   // echo "cedula= " . $Paciente . "<br>";
   // echo "Observaciones= " . $Observacion;

    include("../conexion/Conexion_BD.php");
	mysqli_query($conexion,"SET NAMES 'utf8'");

      	$insertar1= "INSERT INTO historico_visitas( cedula_paciente, observaciones,Tratamiento,Notas) VALUES('$Paciente','$Diagnostico','$Tratamiento','$Observacion')";
    
    mysqli_query($conexion,$insertar1);

    
  ?>  
  <body onload="cerrar()">
        <script type="text/javascript">
            function cerrar(){
                window.close();
            }
        </script>

   



   










