<?php
	//datos de configuracion para acceder al servidor de base de datos
    include("conexion/Conexion_BD.php");
//--------------------------------------------------------------------------------------------------------
    $Recibido=$_GET['val_2'];//recibe el ID_Doctor desde AJAX ejecutado en Citas_2.php
    $Consulta="SELECT * FROM horarios  WHERE ID_Doctor = '$Recibido' ";
    $Resulset= mysqli_query($conexion,$Consulta);
          while($horario= mysqli_fetch_array($Resulset)){ 
             if(!empty($horario["inicio_mañana"])){ 
        ?>  
        <table name="horario_mañana">
                        <tr>
                            <td>
                                <?php
                                    echo $horario["inicio_mañana"] . "&nbsp";
                                ?>
                            </td>
                            <td> A&nbsp</td>
                            <td>
                                <?php 
                                    echo $horario["culmina_mañana"] . "&nbsp";
                                ?>
                            </td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>
                                <?php 
                                    $longitud = count($horario);
                                    for ($i=4; $i<10; $i++){
                                    echo  $horario["$i"] . "&nbsp";
                                }?>
                            </td>
                        </tr>
                    </table>                    
                    <?php } 
                        if(!empty($horario["inicia_tarde"])){
                            ?>
                    <br>
                    <table name="horario_tarde" >
                        <tr>
                            <td>
                                <?php 
                                    echo $horario["inicia_tarde"] . "&nbsp";
                                ?>
                            </td>
                            <td> A&nbsp</td>
                            <td>
                                <?php 
                                    echo  $horario["culmina_tarde"] . "&nbsp";
                                ?>
                            </td>
                        </tr>
                    </table>                    
                    <table>
                        <tr>
                            <td>
                                <?php 
                                    $longitud = count($horario);
                                    for ($i=12; $i<18; $i++){
                                    echo  $horario["$i"] . "&nbsp";
                                }?>
                            </td>
                        <tr>
                    </table>  

        <?php }} ?>