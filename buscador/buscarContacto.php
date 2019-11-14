<?php
    session_start(); 
	include("../conexion/Conexion_BD.php");
    mysqli_query($conexion,"SET NAMES 'utf8'");


    if(!empty($ID_PR)){ 
    	$Consulta=  "SELECT * FROM pacientes_registrados WHERE ID_PR= '$ID_PR' ";
    	$Recordset= mysqli_query($conexion,$Consulta);
        if(mysqli_num_rows($Recordset) != 0){
    	    while($Contacto= mysqli_fetch_array($Recordset)){

            //se cambia el formato de la fecha a mostrar en pantalla
           // $fechaFormatoMySQL = $paciente["fecha"];//se obtiene la fecha en formato MySQL
           // $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha a d-m-Y
            ?>
            <div style=" margin-top: 10%;">

                    <table class="tabla_1">
                        <thead>
                            <tr >
                                <th colspan="5">Datos del contacto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="textoCelda_3"><?php echo $Contacto["nombre_pacient"];?></td>                        
                                <td class="textoCelda_3"><?php echo $Contacto["apellido_pacient"];?></td>
                                <td class="textoCelda_3"><?php echo $Contacto["estado_pacient"];?></td>                       
                                <td class="textoCelda_3"><?php echo $Contacto["parroquia_pacient"];?></td>
                                <td class="textoCelda_3"><?php echo $Contacto["telefono_pacient"];?></td>
                            </tr>
                        </tbody>
                    </table> <?php 

            } 
            echo "<a class='buttonCuatro' style='margin:3% auto; cursor: pointer' onclick='cerrar()'>Salir</a>";
        }
        else{
            echo "<h3>Sin resultados.</h3>";
            echo "<p class='buttonCuatro' style='margin:auto; cursor: pointer' onclick='cerrar()'>Salir</p>";
        }
    } 

    session_unset();      
        session_destroy();


    ?> 
</div>

<script type="text/javascript">
    function cerrar(){
        close();
    }
</script>

   