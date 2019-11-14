<?php
	include("../conexion/Conexion_BD.php");
  mysqli_query($conexion,"SET NAMES 'utf8'");//es importante esta linea para que los caracteres especiales funcionen, tanto graficamente como logicamente
//----------------------------------------------------------------------------------------------------------------------
     $Especialista= $_GET['val_12'];//recibe el ID_Doctor desde Ajax_Cancelar
     $FechaCita= $_GET['val_13'];//recibe la fecha desde Ajax_Cancelar
     $Turno=$_GET["val_14"];//recibe el turno desde desde Ajax_Cancelar

     //echo $Especialista. "<br>";
     //echo $FechaCita. "<br>";
     //echo $Turno. "<br>";

        
            if(empty($_GET['val_12'])){            
                echo "no inserto el Especialista";
                exit;
            }
           if(empty($_GET['val_13'])){            
                echo "no inserto la fecha de la cita";
                exit;
            }  
            if(empty($_GET['val_14'])){            
                exit ("no inserto el turno de la cita");
            }      
            //Se consulta el turno de atención del Dr.
                //$especialista=$_SESSION["UsuarioDoct"];//se trae a esta pagina el ID_Doctor desde validar Sesion.php
            /*    $Consulta="SELECT turno, ID_Doctor  FROM horarios INNER JOIN doctores_horarios ON horarios.ID_Horario=doctores_horarios.ID_Horario WHERE ID_Doctor ='$Especialista'";
                $Resulset = mysqli_query($conexion,$Consulta);
                          
                  while($TurnoConsulta= mysqli_fetch_array($Resulset)){
                    ?>
                            
                  <option value="<?php echo $TurnoConsulta['turno'];?>">  <?php echo $TurnoConsulta['turno'];?></option>
                  <?php     } */
 //-------------------------------------------------------------------------------------------------------------------- 

//se cambia el formato de la fecha antes de introducira a la base de datos para que mysql la pueda reconocer
    $fechaFormatoMySQL = date("Y-m-d", strtotime($FechaCita));
    //echo $fechaFormatoMySQL;


  //se consulta cuantos pacientes están citados para el dia seleccionado
   $Consulta="SELECT ID_Cita FROM citas WHERE ID_Doctor= '$Especialista' AND fecha ='$fechaFormatoMySQL' AND turno ='$Turno' ";   
	 $Resulset= mysqli_query($conexion,$Consulta);
    $NumPacientes= mysqli_num_rows($Resulset);

     if(($NumPacientes)>5){
          echo  "<b>El cupo maximo de pacientes por dia esta agotado, cambie la hora o la fecha de su cita</b>";         
      }
      else {
                           
          echo "<b>$NumPacientes</b>" . " " . "<b>Pacientes estan por delante de usted</b>";?>    
        
    <?php  } ?>  
 
        
              