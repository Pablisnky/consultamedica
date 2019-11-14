<!--Encabezado de las páginas del CIE_10-->

    <header class="fixed_1" >
                <div style="width: 75%; float: left; border-right-color: white; border-right-style: solid;border-right-width: 1px; box-sizing: border-box;">
                    <h1 style="cursor: default; font-size: 3vw; height: 60%; padding: 1% 0%; box-sizing: border-box; text-align: center; padding-left: 2%">ConsultaMedica.com.ve</h1>
                </div>
                <div style="float: right;  width: 25%;">
                    <?php
                            //Consulta para para colocar el nombre y apellido del Dr que abre sesión
                            $consulta_1="SELECT nombre_doctor, apellido_doctor, sexo FROM doctores WHERE ID_Doctor= '$sesion' ";
                            $Recorset_1=mysqli_query($conexion,$consulta_1);
                            $Doctor_Datos= mysqli_fetch_array($Recorset_1);

                                if($Doctor_Datos["sexo"] == "F"){//femenino
                        ?>
                                    <input class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="Dra. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                    <?php } 
                                else if($Doctor_Datos["sexo"] == "M"){ //Masculino 
                                 ?>  
                                    <input class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="Dr. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                    <?php }
                                else if($Doctor_Datos["sexo"] == ""){ //No especificó
                                ?>
                                <input  class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="<?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                    <?php }                             
                        ?>
                </div>
                <nav class="n41">
                    <label class="cie_1" onclick="cerrar()">Salir CIE_10</label>
                    <label class="cie_1" for="BotonEnviar" >Cargar diagnostico</label><!--Se encuentra al final del archivo-->                  
                </nav>
        </header>