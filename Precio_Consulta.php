<?php 
	include("conexion/Conexion_BD.php");
	
	$especialista=$_GET["val_8"];//recibe el ID_Doctor desde AJAX ejecutado en Citas_2.php
	$Consulta="SELECT precio_consulta, sexo FROM doctores WHERE ID_Doctor= '$especialista' ";
 
 	 $Recorset_3=mysqli_query($conexion,$Consulta);
                        while($PrecioConsulta= mysqli_fetch_array($Recorset_3)){
                        
                            if($PrecioConsulta['precio_consulta']==""){
                                if($PrecioConsulta['sexo']=="F"){
                        ?>
                                    <input class="A_10"  type="text" name="precio" readonly="readonly" value="<?php echo 'Consultar precio con la Dra.'; ?>"> 
                                <?php 
                                }
                                else if($PrecioConsulta['sexo']=="M"){
                        ?>
                                    <input class="A_10"  type="text" name="precio" readonly="readonly" value="<?php echo 'Consultar precio con el Dr.'; ?>"> 
                                <?php    
                                }
                            } 
                            else{?>
                                <input class="A_10"  type="text" name="precio" readonly="readonly" value="<?php echo $PrecioConsulta['precio_consulta'];?>"> 
                                <?php
                            }    
                        }
                         mysqli_free_result($Recorset_3); // Liberamos los registros
                        ?>