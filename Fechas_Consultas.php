<?php
    session_start();//Se inicia sesion para llamar a la variable almacenada en validarSesion.php
    $FechaConsulta= $_GET["val_21"];
    $sesion=$_SESSION["UsuarioDoct"];//aqui se tiene almacenado el ID_Doctor en una variable supreglobal, se obtiene porque se inicio sesion
        
    //echo "Fecha consulta: " . $FechaConsulta . "<br>";
    //echo "ID_Doctor: " . $sesion . "<br>";;

    //se cambia el formato de la fecha, se recibe en formato php
    $fechaFormatoSQL = date("Y-m-d", strtotime($FechaConsulta));//se cambia el formato de la fecha a d-m-Y
    //echo "Fecha cita: " . $fechaFormatoSQL;

    include("conexion/Conexion_BD.php"); 
?>
<div class="sesion_1" style="width: 100%; background-color: ; margin-left: -1%;">
    <table class="tabla_1" border="1px">
        <tr >
            <!-- <th>ID_PACIENTE</th>-->
            <th></th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>CEDULA</th>
            <th>EDAD</th>
            <th>TELEFONO</th>
            <th>TURNO</th>
        </tr>
            <?php
            //consulta para saber quienes son los pacientes registrados con el Dr. que tienen cita para el dia seleccionado
            $i = 1;
            $Consulta_4="SELECT * FROM citas WHERE fecha='$fechaFormatoSQL' AND ID_Doctor = '$sesion' AND cedula_Identidad IN (SELECT cedula_pacient FROM pacientes_registrados INNER JOIN doctores_pacientesregistrados ON pacientes_registrados.ID_PR=doctores_pacientesregistrados.ID_PR WHERE ID_Doctor= '$sesion')";
            $Recordset_4 = mysqli_query($conexion,$Consulta_4);
        if(mysqli_num_rows($Recordset_4) != 0){
            while($TablaVirtual= mysqli_fetch_array($Recordset_4)){
                $CedulaRegistrados= $TablaVirtual["cedula_Identidad"];
            ?>
                <tr>    
                    <td class="a1"><?php echo $i;?></td>
                    <td class="a2"><?php echo '<a class="a2a" href="HistoriasClinicas_Basico.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["nombre"];?></a></td>
                    <td class="a2"><?php echo '<a class="a2a" href="HistoriasClinicas_Basico.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["apellido"] ; ?></a></td>
                    <td class="a6"><?php echo '<a class="a2a" href="HistoriasClinicas_Basico.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["cedula_Identidad"] ;?></a></td>
                    <td class="a5"><?php echo '<a class="a2a" href="HistoriasClinicas_Basico.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["edad"] ;?></a></td>
                    <td class="a7"><?php echo '<a class="a2a" href="HistoriasClinicas_Basico.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["telefono"]  . "<br>" ;?></a></td> 
                    <td class="a6"><?php echo '<a class="a2a" href="HistoriasClinicas_Basico.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["turno"] ;?></a></td>  
                </tr>        
                    <?php 
                    $i++; 
            }
        } 
                             
                //Consulta para saber quienes son los pacientes para el dia seleccionado que no estan registrados con el doctor
                $i = $i++ ;//variable para enumerar la lista de pacientes en la tabla, comenzara en Nº 1
                $Consulta= "SELECT * FROM citas WHERE fecha='$fechaFormatoSQL' AND ID_Doctor= '$sesion' AND cedula_Identidad NOT IN (SELECT cedula_pacient FROM pacientes_registrados INNER JOIN doctores_pacientesregistrados ON pacientes_registrados.ID_PR=doctores_pacientesregistrados.ID_PR WHERE ID_Doctor = '$sesion')";
                $Resulset = mysqli_query($conexion,$Consulta);
        if(mysqli_num_rows($Resulset) != 0){ 

                //Se consulta los pacientes que se tienen para el dia de hoy-->
                                while($ConsultaDiaria= mysqli_fetch_array($Resulset)){ 
                                   $ConCitas[]=$Consulta;//Se guardan todos los numeros de cedula en un array.
                                   // echo $ConCitas  . "<br>";
                                ?>
                                <tr>           
                                   <!-- <td style="padding:10px"><?php //echo $ConsultaDiaria["ID_Paciente"];?></td>-->
                                    <td class="a1a"><?php echo $i;?></td>
                                    <td class="a2"><?php echo $ConsultaDiaria["nombre"];?></td>
                                    <td class="a2"><?php echo $ConsultaDiaria["apellido"] ; ?></td>
                                    <td class="a6"><?php echo $ConsultaDiaria["cedula_Identidad"] ;?></td>
                                    <td class="a5a"><?php echo $ConsultaDiaria["edad"] ;?></td>
                                    <td class="a7"><?php echo $ConsultaDiaria["telefono"]  . "<br>" ;?></td>
                                    <td class="a6"><?php echo $ConsultaDiaria["turno"] ;?></td>   
                                </tr>        
                                <?php 
                                $i++; } 
                            
        }?>
                            
                            </table><?php
                                    //Consulta para saber sino hay pacientes para el dia de hoy 
                                $Consulta= "SELECT * FROM citas WHERE fecha='$fechaFormatoSQL' AND ID_Doctor = '$sesion'";
                                $Resulset_2 = mysqli_query($conexion,$Consulta);  
                            if(mysqli_num_rows($Resulset_2)==0){                                    
                                    echo "<p class='Inicio_15'>No hay pacientes registrados para el dia seleccionado.</p>";             
                                }         
                            ?>
      </div>


         
          