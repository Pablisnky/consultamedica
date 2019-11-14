<!--Encabezado de todas las páginas que estan dentro de la cuenta de usuario de un proveedor-->
    
        <div id="header_01">
            <h1 class="header_02">ConsultaMedica.com.ve</h1>
        </div>
        <div id="header_03">
                    <?php
                        //Consulta para para colocar el nombre y apellido del Dr que abre sesión
                        $consulta_1="SELECT nombre_Proveedor, apellido_Proveedor FROM proveedores WHERE ID_Provedor= '$sesionProveedor' ";
                        $Recorset_1=mysqli_query($conexion,$consulta_1);
                        $Proveedor_Datos= mysqli_fetch_array($Recorset_1);
                         
                                ?>
                                <input class="usuarioDoctor" readonly="readonly" type="text" name="NombreProveedor" value="<?php echo $Proveedor_Datos['nombre_Proveedor'] . ' ' . $Proveedor_Datos['apellido_Proveedor'] ;?>">
        </div>
        