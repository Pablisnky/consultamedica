<?php
	include("conexion/Conexion_BD.php");
  mysqli_query($conexion,"SET NAMES 'utf8'");//es importante esta linea para que los caracteres especiales funcionen, tanto graficamente como logicamente
//----------------------------------------------------------------------------------------------------------------------
  //recibe el datos desde citas_2Autofill.php por medio de Ajax_Cancelar
     $Especialista= $_GET['val_12'];//recibe el ID_Doctor desde citas_2Autofill.php por medio de Ajax_Cancelar
     $FechaCita= $_GET['val_13'];//recibe la fecha desde Ajax_Cancelar
     $Turno=$_GET["val_14"];//recibe el turno desde desde Ajax_Cancelar

     //echo "El ID_Doctor= " . $Especialista. "<br>";
     // echo "La fecha de la cita= " . $FechaCita. "<br>";
     // echo "El turno de la cita= " . $Turno. "<br>";
        
            if(empty($_GET['val_12'])){            
                echo "no inserto el Especialista";
                exit;
            }
           if(empty($_GET['val_13'])){            
                echo "no inserto la fecha de la cita";
                exit;
            }  
            if(empty($_GET['val_14'])){            
                echo "no inserto el turno de la cita";
                exit;
            }      
 //-------------------------------------------------------------------------------------------------------------------- 
//se cambia el formato de la fecha antes de introducira a la base de datos para que mysql la pueda reconocer
    $fechaFormatoMySQL = date("Y-m-d", strtotime($FechaCita));
    // echo "Fecha formato MySQL: " .  $fechaFormatoMySQL . "<br>"; 

    //Se consulta si hay pacientes citados para un dia determinado.
   $Consulta= "SELECT ID_Cita FROM citas WHERE ID_Doctor= '$Especialista' AND fecha ='$fechaFormatoMySQL' AND turno ='$Turno' ";   
   $Resulset= mysqli_query($conexion,$Consulta);
    $NumPacientes= mysqli_num_rows($Resulset);//indica la cantidad de registros encontrados en la BD

    if(($NumPacientes)>5){
          echo  "<b>El cupo maximo de pacientes por dia esta agotado, cambie la hora o la fecha de su cita</b>";         
    }
    else{
        echo "<b>$NumPacientes</b>" . " " . "<b>Pacientes estan por delante de usted</b>";?>
         <style>
            #n110_tapa{
              display: none;          
            }

        </style>
        
    <?php  } ?>  
 