<?php 
	include("../conexion/Conexion_BD.php");
    
    //Se reciben todos los datos desde Ajax_Cancelar.js
	$Cedula=$_GET["val_20"];
    $Especialista=$_GET["val_21"];

	//echo $Cedula . "<br>";
    //echo $Especialista . "<br>";

        
    //Si no se selecciona nada que buscar, sale un mensaje.
    if(isset ($Cedula)){//Si esta declarada (si existe)
        //se ejecuta la consulta segun el criterio
        $Consulta= " SELECT * FROM pacientes_registrados INNER JOIN doctores_pacientesregistrados ON pacientes_registrados.ID_PR=doctores_pacientesregistrados.ID_PR WHERE cedula_pacient= '$Cedula' AND ID_Doctor ='$Especialista'"; 
        $Resulset=mysqli_query($conexion,$Consulta);
        $Contador= mysqli_num_rows($Resulset);

        if($Contador== 0){
            echo "<h3>No se encontró paciente registrado<h3>";
            echo "<a class='buttonCuatro' style='margin:auto' href='javascript:history.go(0)'>Limpiar</a>";
        }
        else{
            while($paciente= mysqli_fetch_array($Resulset)){
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
                </table>
                <?php 
            } 
        }  
    }