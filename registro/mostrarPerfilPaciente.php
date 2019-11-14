<?php
    session_start();//se inicia una sesion
        
    //muestra todos los errores, desactivarlo para funcionamiento en local y activarlo para remoto
    error_reporting(E_ALL);

    //aqui se almacena el ID_Paciente que se obtuvo en validarSesion.php
        $sesion= $_SESSION["UsuarioPaciente"];
        //echo "<p>ID_Paciente=  $sesion</p>" . "<br>";
                
        include("../conexion/Conexion_BD.php");
 
    if(!isset($_POST["botonActualizar"])){//sino se a pulsado el boton actualizar de este archivo se entra en el formulario   

        $Consulta="SELECT * FROM pacientes_registrados WHERE ID_PR='$sesion' ";
        $Recordset=mysqli_query($conexion,$Consulta);      
        $MiPaciente= mysqli_fetch_array($Recordset);
  
        ?>

        <!DOCTYPE html>
        <html lang="es">
            <head>
        		<title>ConsultaMédica_Perfil</title>
        		<meta charset="utf-8"/>
        		<meta name="description" content="perfil de doctor, direccion de consultorio, horario de consulta, telefono, directorio medico"/>
        		<meta name="keywords" content="consulta, horario, perfil doctor"/>
        		<meta name="author" content="Pablo Cabeza"/>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                
        		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/>
                <link rel="shortcut icon" type="image/png" href="../images/logo.png">
                <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_CitasMedicas.css"/> 


                <script type="text/javascript" src="../Javascript/Municipios.js"></script> 
                <script type="text/javascript" src="../Javascript/parroquias.js"></script>
                <script src="../Javascript/Funciones_varias.js"></script>

                <style>
                    @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower');
                </style> 
            </head>
            <body>
                <header class="fixed_1">
                    <?php
                        include("../vista/headerPaciente.php")
                    ?>
                </header>
                <div class="Principal" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
                    <h3 class="encabezadoSesion_1">Editar perfil</h3> 
                    <div id="Afili">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                            <fieldset id="Afiliacion_4">
                                <legend>Datos de contacto</legend>
                                <label class="etiqueta_23">Teléfono:</label>
                                <input type="text" name="telefono" id="Telefono" value="<?php echo $MiPaciente['telefono_pacient'];?>"/>
                                <br><br>
                                <label class="etiqueta_23">Correo electronico:</label>
                                <input type="text" name="correo" id="Correo" value="<?php echo $MiPaciente['correo_pacient'];?>"/>
                                <br><br>  
                                <label class="etiqueta_23" style="width: 45%;">Lugar de Residencia</label>
                                <br><br>
                                <label class="etiqueta_23">Estado</label>
                                <select class="etiqueta_24" name="estadoResidencia" id="Estado_Res" onchange="SeleccionarMunicipio(this.form)"> 
                                    <option><?php echo $MiPaciente['estado_Residencia'];?></option>
                                    <option>Amazonas</option>
                                    <option>Anzoátegui</option>
                                    <option>Apure</option>
                                    <option>Aragua</option>
                                    <option>Barinas</option>
                                    <option>Bolivar</option>
                                    <option>Carabobo</option>
                                    <option>Cojedes</option>
                                    <option>Delta Amacuro</option>
                                    <option>Distrito Capital</option>
                                    <option>Falcon</option>
                                    <option>Guárico</option>
                                    <option>Lara</option>
                                    <option>Mérida</option>
                                    <option>Miranda</option>
                                    <option>Monagas</option> 
                                    <option>Nueva Esparta</option>
                                    <option>Portuguesa</option>
                                    <option>Sucre</option>
                                    <option>Táchira</option>
                                    <option>Trujillo</option>                           
                                    <option>Vargas</option>
                                    <option>Yaracuy</option>
                                    <option>Zulia</option>
                                </select>
                                <br>
                                <label class="etiqueta_23">Municipio</label>
                                <select  class="etiqueta_24" name="municipioResidencia" id="Municipio_Res" onchange="SeleccionarParroquia(this.form)"> <!--esta funcion se encuentra en Municipios.js-->
                                    <option><?php echo $MiPaciente['municipio_Residencia'];?></option>      
                                </select>                       
                                <br>
                                <label class="etiqueta_23">Parroquia</label>
                                <select  class="etiqueta_24" name="parroquiaResidencia" id="Parroquia_Res"> 
                                    <option><?php echo $MiPaciente['parroquia_Residencia'];?></option>                        
                                </select>     
                            </fieldset>                       
                            <input type="submit" value="Actualizar"  id="BotonActualizar" name="botonActualizar"> 
                        </form>
                    </div>       
                </div>
                <footer>
                    <?php
                        include("../vista/footer.php");
                    ?>
                </footer>         
            </body>
        </html>
        <?php
    }
    else{//si se a pulsado el boton actualizar de este archivo se actualizan los datos
            
            //se reciben los datos de actualización desde este mismo formulario.
            
            $Telefono= $_POST["telefono"];
            $Correo= $_POST["correo"];
            $Estado_Res= $_POST["estadoResidencia"];
            $Municipio_Res= $_POST["municipioResidencia"];
            $Parroquia_Res= $_POST["parroquiaResidencia"];
           
            //echo $Telefono . "<br>";
            //echo $Correo . "<br>";
            //echo $Estado_Res . "<br>";
            //echo $Municipio_Res . "<br>";
            //echo $Parroquia_Res . "<br>";

        $Actualizar=" UPDATE pacientes_registrados SET telefono_pacient='$Telefono', correo_pacient= '$Correo', estado_Residencia='$Estado_Res', municipio_Residencia='$Municipio_Res', parroquia_Residencia='$Parroquia_Res' WHERE ID_PR='$sesion' ";

        mysqli_query($conexion,$Actualizar);

        //se redirecciona a la pagina mostrarPerfilPacientes.php
        //header("location:RegistroPacientes.php");// en este caso no funcina esta sentencia porque hay echos en el codigo antes del header
        echo '<script type="text/javascript">window.location.href="mostrarPerfilPaciente.php";</script>'; 
    }

?>