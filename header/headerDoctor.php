<!--Encabezado de todas las páginas que estan dentro de la cuenta de usuario de un doctor-->

    <link rel="stylesheet" type="text/css" href="../iconos/icono_menu/style_menu.css"/><!--galeria de icomoon.io--> 
    
        <div id="header_01">
            <h1 class="header_02">ConsultaMedica.com.ve</h1>
        </div>
        <div id="header_03">
            <?php
            //Consulta para para colocar el nombre y apellido del Dr que abre sesión
                $consulta_1="SELECT nombre_doctor, apellido_doctor, sexo FROM doctores WHERE ID_Doctor= '$sesion' ";
                $Recorset_1=mysqli_query($conexion,$consulta_1);
                $Doctor_Datos= mysqli_fetch_array($Recorset_1);
                     
                if($Doctor_Datos["sexo"] == "F"){//femenino
                    ?>
                    <input class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="Dra. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                        <?php            
                } 
                else if($Doctor_Datos["sexo"] == "M"){ //Masculino 
                    ?>  
                    <input class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="Dr. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                    <?php   
                }
                else if($Doctor_Datos["sexo"] == ""){ //No especificó
                    ?>
                    <input  class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="<?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                    <?php 
                }                             
                    ?>
        </div>

        <label id="ComandoMenu" class="comandoMenu" onclick="mostrarMenu()"><span class="icon-menu"></span></label>
        <nav class="menuResponsive" id="MenuResponsive">
        	<ul>
                <li><a href="CerrarSesion.php">Cerrar Sesión</a></li>
                <li><a href="InicioSesion.php">Citas</a></li>            
                <li><a href="RegistroPacientes.php">Mis pacientes</a></li>
                <li class="listaOculta" ><a href="mostrarPerfilDoctor.php">Mi perfil</a> </li> 
            </ul>        
        </nav>