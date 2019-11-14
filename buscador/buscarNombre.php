<?php
//Busca los pacientes registrado con un doctor en REgistroPacientes_Basico.php
	include("../conexion/Conexion_BD.php");
    mysqli_query($conexion,"SET NAMES 'utf8'");

    $Nombre= $_GET["nombre"];//se recibe lo que se escribio en el input desde ajaxBuscador.js por medio de RegistroPacientes_Basico.php
    $Especialista=$_GET["val_21"];//se recibe el ID_Doctor desde ajaxBUscador.js
    //echo "$Nombre";
    

    if(!empty($Nombre)){ 
    	$Persona= mysqli_real_escape_string($conexion,$Nombre);
    	$Consulta=  "SELECT * FROM pacientes_registrados INNER JOIN doctores_pacientesregistrados ON pacientes_registrados.ID_PR=doctores_pacientesregistrados.ID_PR WHERE nombre_pacient LIKE '$Persona%' AND ID_Doctor ='$Especialista' " ;
    	$Recordset= mysqli_query($conexion,$Consulta);
        if(mysqli_num_rows($Recordset) != 0){
        	while($paciente= mysqli_fetch_array($Recordset)){
        		?>
                        <table border-collapse: collapse>
                           <tr>
                                            <td class="tabla_2A"><?php echo '<a class="cargaPaciente" href="HistoriasClinicas_Gratis.php?cedula_pacient='.$paciente['cedula_pacient'].'"> '. $paciente["nombre_pacient"] .' </a>'?></td>

                                            <td class="tabla_2A"><?php echo '<a class="cargaPaciente" href="HistoriasClinicas_Gratis.php?cedula_pacient='.$paciente['cedula_pacient'].'"> '.  $paciente["apellido_pacient"] .' </a>'?></td>

                                            <td class="tabla_2B"><?php echo  '<a class="cargaPaciente" href="HistoriasClinicas_Gratis.php?cedula_pacient='.$paciente['cedula_pacient'].'"> '.  $paciente["cedula_pacient"] .' </a>'?></td>
                                             
                                            <td class="ocultarCelda"><?php echo '<a class="paciente" href="EliminarPaciente_Gratis.php?ID_Paciente='.$paciente['ID_PR'].'" onclick="return Confirmacion()">Eliminar</a>';?></td><!-- se envia al archivo php que elimina el paciente de la BD, pero antes aparece una ventana javascript en un alert que detiene la accion hasta tanto no se confirma; la funcion Confirmacion() se encuentra en Funciones_varias.js-->

                                            <td class="ocultarCelda"><?php echo '<a class="paciente" href="actualizarDatos_Gratis.php?cedulaPaciente='.$paciente['cedula_pacient'].'">Actualizar</a>';?> 
                                            </td>
                            </tr>
                            <tr>
                                <td><?php echo "<br>";?></td>
                            </tr>
                        </table> <?php 
            } 
        }
        else{
            echo "<h3>No se encontraron pacientes</h3>";
            echo "<a class='buttonCuatro' style='margin:auto' href='javascript:history.go(0)'>Limpiar</a>";
        }
    } ?> 