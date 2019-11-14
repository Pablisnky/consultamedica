<!--Encabezado de todas las páginas que estan asociadas a una cuenta de paciente-->
    <div id="header_01">
        <h1 class="header_02">ConsultaMedica.com.ve</h1>
    </div>
    <div id="header_03">
        <?php
            //Consulta para para colocar el nombre y apellido del paciente que abre sesión
            $consulta_1="SELECT nombre_pacient, apellido_pacient, cedula_pacient FROM pacientes_registrados WHERE ID_PR= '$sesion' ";
            $Recorset_1=mysqli_query($conexion,$consulta_1);
            $Paciente_Datos= mysqli_fetch_array($Recorset_1);
                         
            $Cedula=  $Paciente_Datos['cedula_pacient'];//se obtiene la cedula del paciente
            //echo "<p>Cedula Nº: " . $Cedula;
        ?>
        <!--Se muestra el nombre del paciente en pantalla-->
        <input class="usuarioDoctor" readonly="readonly" type="text" name="nombrePaciente" value="<?php echo "Paciente: " . $Paciente_Datos['nombre_pacient'] . ' ' . $Paciente_Datos['apellido_pacient'] ;?>">
    </div>
    <label for="" id="ComandoMenu" class="comandoMenu" onclick="mostrarMenu()">Menu</label>
    <nav class="menuResponsive" id="MenuResponsive">
        <ul>
            <li><a href="../planBasico/CerrarSesion.php">Cerrar Sesión</a></li>
            <li><a href="pacienteRegistrado.php">Consultas</a></li>            
            <li><a href="pacienteTratamientos.php" >Tratamientos</a></li>
            <li><a href="pacient_medicam.php">Laboratorio</a></li>
            <li><a href="directorio_2.php">Solicitar cita</a></li>
            <!-- <li><a href="mostrarPerfilPaciente.php">Mi perfil</a></li> -->
        </ul>        
    </nav>