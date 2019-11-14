<?php 
    //Se verifica si se realizó login para entrar en este  archivo
    include("../Clases/VerificaDr.php");
    //Se conecta a la base de datos
    include("../conexion/Conexion_BD.php");
    //Desactiva errores en servidor remoto y activa en servidor local
    include("../Clases/muestraError.php");
    //Se busca que tipo de plan tienen el Dr.
    include("../Clases/planAfiliado.php");

    $Cedula= $_POST["cedula"];
    //echo $Cedula;
?> 

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Cargar Pacientes</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Historia clinica de pacientes en Venezuela"/>
        <meta name="keywords" content="reporte medico,historia clinica, "/>
        <meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_CitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="../Javascript/validar_Campos.js"></script> 
        <script src="../Javascript/Funciones_varias.js"></script>
        <script src="../Javascript/Municipios.js"></script> 
        <script src="../Javascript/Municipios_Nac.js"></script> 
        <script src="../Javascript/parroquias.js"></script> 
        <script src="../Javascript/parroquias_Nac.js"></script> 
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", autofocusCargarPaciente, false);//autofocusContacto() se encuentra en Funciones_varias.js
            document.addEventListener("keydown", valida_LongitudTelefono, false);//validaLongitud() se encuentra en Funciones_varias.js 
            document.addEventListener("keyup", valida_LongitudTelefono, false);//validaLongitud() se encuentra en Funciones_varias.js   
        </script>
    </head>     
    <body>
        <header class="fixed_1"><!--  -->
            <?php
                include("../header/headerDoctor.php");
            ?>         
        </header>
        <div onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
            <h3 class="encabezadoSesion_1">Nuevo paciente</h3>   
            <div class="cargarPaciente_1">
                <div class="cargarPaciente_3">
                    <a class="buttonCuatro" onclick="return Advertencia()" href="RegistroPacientes.php">Volver</a><!--la función Advertencia() se encuentra al final del archivo-->

                    <label class="buttonCuatro" for="BotonGuardar">Guardar</label>   
                </div>
            </div>
            <?php        

            if(!isset($_POST["botonGuardar"])){//sino se a pulsado el boton guardar de este archivo se recibe la varible $Cedula y se entra en el formulario         
            
                //verifica si el paciente ya existe dentro del sistema
                $Consulta= " SELECT * FROM pacientes_registrados WHERE cedula_pacient= '$Cedula' "; 
                $Resulset=mysqli_query($conexion,$Consulta);
                $Contador= mysqli_num_rows($Resulset);
                if($Contador == 1){//El paciente existe en el sistema, el formulario se muestra relleno
                    $DirConsulta= mysqli_fetch_array($Resulset);


                    //Cambiar formato de fecha.                    
                    $fechaFormatoMySQL = $DirConsulta['fechaNacimiento_pacient'];//se obtiene la fecha en formato MySQL
                    $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y

                    ?>
                    <div  class="cargarPaciente_2">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                    <fieldset class="historia_2" >
                        <legend>Datos del Paciente</legend>
                        
                        <label class="etiqueta_5">Nombre</label>
                        <input  type="text" name="nombre_Paciente" readonly="readonly" value="<?php echo $DirConsulta['nombre_pacient'];?>">
                        <br class="ocultar">
                        <label class="etiqueta_6" for="ApellidoPaciente" >Apellido</label>
                        <input type="text" name="apellido_Paciente" readonly="readonly" value="<?php echo $DirConsulta['apellido_pacient'];?>">
                        <br>
                        <label class="etiqueta_5">Cedula</label>
                        <input type="text" name="cedula_Paciente" readonly="readonly" value="<?php echo $DirConsulta['cedula_pacient'];?>">
                        <br class="ocultar">                     
                        <label class="etiqueta_6">Telefono</label>
                        <input type="text" name="telefono" readonly="readonly" value="<?php echo $DirConsulta['telefono_pacient'];?>">
                        <br>                 
                        <label class="etiqueta_5">Nacionalidad</label>
                        <input type="text" name="nacionalidad_Paciente" readonly="readonly" value="<?php echo $DirConsulta['nacionalidad_pacient'];?>">
                        <br class="ocultar"> 
                        <label class="etiqueta_6">Estado Civil</label>
                        <select class="registro_01" name="estadoCivil_Paciente" readonly="readonly">
                            <option><?php echo $DirConsulta['estadoCivil_pacient'];?></option>
                        </select>
                        <br class="ocultar"> 
                        <label class="etiqueta_5">Fecha Nacimiento</label>
                        <input type="text" name="fechaNacimiento_Paciente" readonly="readonly" value="<?php echo $fechaFormatoPHP;?>">                          
                        <label class="etiqueta_6">Edad</label>
                        <input type="text" name="edadOculta" readonly="readonly" value="<?php echo $DirConsulta['edad_pacient'];?>" >
                        <br> 
                        <label class="etiqueta_5">Grupo Sanguineo</label>
                        <select class="registro_01" name="grupoSanguineo" readonly="readonly">
                            <option><?php echo $DirConsulta['grupoSanguineo_pacient'];?></option>
                        </select>
                        <br class="ocultar">
                        <label class="etiqueta_6">Sexo</label>
                        <select class="registro_01" name="sexo_Paciente" readonly="readonly">
                            <option><?php echo $DirConsulta['sexo_pacient'];?></option>
                        </select>
                        <br>       
                        <label class="etiqueta_5">Grado de Instrucción</label>
                        <select class="registro_01"  name="gradoInstruccion" readonly="readonly">
                            <option><?php echo $DirConsulta['gradoInstruccion'];?></option>
                        </select>
                        <br class="ocultar">    
                        <label class="etiqueta_6">Ocupación</label>
                        <input type="text" name="ocupacion" readonly="readonly" value="<?php echo $DirConsulta['ocupacion'];?>">
                        <br>                            
                        <label class="etiqueta_5">Religion</label>
                        <input type="text" name="religion"  readonly="readonly" value="<?php echo $DirConsulta['religion'];?>">
                        <br class="ocultar">    
                        <label class="etiqueta_6">Correo electronico</label>
                        <input type="text" name="correo" readonly="readonly" value="<?php echo $DirConsulta['correo_pacient'];?>">
                        <label class="etiqueta_5">Nº Hijos</label>
                        <input type="text" name="hijos" id="Hijos" readonly="readonly" value="<?php echo $Pacient['hijos'];?>">

                        <hr style="margin: 1% auto;">
                        
                        <div style="background-color: ; width: 45%; float: left;">
                            <label class="etiqueta_5" style="width: 45%;">Lugar de Residencia</label>
                            <br><br>
                                <label class="etiqueta_23">Estado</label>
                                <select class="etiqueta_24" name="estadoResidencia" readonly="readonly"> 
                                        <option><?php echo $DirConsulta['estado_Residencia'];?></option>
                                </select>
                            <br>
                            <label class="etiqueta_23">Municipio</label>
                            <select  class="etiqueta_24" name="municipioResidencia" readonly="readonly"> 
                                <option><?php echo $DirConsulta['municipio_Residencia'];?></option>      
                            </select>                       
                            <br>
                            <label class="etiqueta_23">Parroquia</label>
                            <select  class="etiqueta_24" name="parroquiaResidencia" readonly="readonly"> 
                                <option><?php echo $DirConsulta['parroquia_Residencia'];?></option>                        
                            </select>
                        </div>
                        <div style="background-color: ;width: 45%; float: right; margin-right: 6.5%;">
                            <label class="etiqueta_5" style="width: 40%;">Lugar Nacimiento</label> 
                            <br><br>
                            <label class="etiqueta_25">Estado</label>
                            <select class="etiqueta_24" name="estadoNacimiento" readonly="readonly"> 
                                    <option><?php echo $DirConsulta['estado_Nacimiento'];?></option>
                            </select>
                            <br >
                            <label class="etiqueta_25">Municipio</label>
                            <select  class="etiqueta_24" name="municipioNacimiento" readonly="readonly">
                                    <option><?php echo $DirConsulta['municipio_Nacimiento'];?></option>      
                            </select>                      
                            <br>
                            <label class="etiqueta_25">Parroquia</label>
                            <select  class="etiqueta_24" name="parroquiaNacimiento" readonly="readonly"> 
                                <option><?php echo $DirConsulta['parroquia_Nacimiento'];?></option>
                            </select>
                        </div>
                        <label class="etiqueta_12">Especifique dirección actual</label>                    
                        <textarea  class="etiqueta_11" rows="3"  name=direccion readonly="readonly"><?php echo $DirConsulta['direccion_Actual'];?></textarea>
                        
                        <br>
                        <label class="etiqueta_12">En caso de emergencia</label>
                        <textarea  class="etiqueta_11" rows="3" name="emergencia" readonly="readonly"><?php echo $DirConsulta['emergencia_pacient'];?></textarea>
                    </fieldset>  
                        <br> 
                        <input type="text" id="Doctor" name="doctor" hidden value="<?php echo $especialista=$_SESSION["UsuarioDoct"];?>"> 
                        <input type="submit" hidden id="BotonGuardar" name="botonGuardar"  >
                </form>    
            
            <footer>
                <?php
                    include("../header/footer.php");
                ?>
            </footer>
</div>






                <?php 
            }
            else{//El paciente no existe en el sistema, el formulario se muestra vacio  
                ?>

                <div class="cargarPaciente_2">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" id="FormDoc" name="formDoc" autocomplete="off" >

                        <fieldset class="historia_2">
                        <legend>Datos del Paciente</legend>
                        <span class="obligatorio">Todos los campos obligatorios</span><br><br>
                        
                        <label class="etiqueta_5" >Nombre</label>
                        <input  type="text" name="nombre_Paciente"  id="NombrePaciente">
                        <br class="ocultar">
                        <label class="etiqueta_6" for="ApellidoPaciente" >Apellido</label>
                        <input type="text" name="apellido_Paciente"  id="ApellidoPaciente" >
                        <br>
                        <label class="etiqueta_5">Cedula</label>
                        <input type="text" name="cedula_Paciente"  id="CedulaPaciente" value="<?php echo $Cedula;?>" onfocus="limpiar()">
                        <br class="ocultar">                     
                        <label class="etiqueta_6">Telefono</label>
                        <input type="text" name="telefono" id="TelefonoPaciente" onblur="validarFormatotelefono(this.value)" >
                        <br>                 
                        <label class="etiqueta_5">Nacionalidad</label>
                        <input type="text" name="nacionalidad_Paciente" id="NacionalidadPaciente" >
                        <br class="ocultar"> 
                        <label class="etiqueta_6">Estado Civil</label>
                        <select class="registro_01" name="estadoCivil_Paciente" id="EstadoCivilPaciente" >
                            <option></option>
                            <option>Soltero</option>
                            <option>Casado</option>
                            <option>Divorciado</option>
                            <option>Viudo</option>
                        </select>
                        <br class="ocultar"> 
                        <label class="etiqueta_5">Fecha Nacimiento</label>
                        <input type="text" name="fechaNacimiento_Paciente" id="FechaNacimientoPaciente" onblur="validarFormatoFecha(this.value); setTimeout(llamar_calculaEdad_2(this.value),200)" placeholder="00-00-0000" autocomplete="off" > <!-- la funcion llamar_calculaEdad() se encentra en Ajax_Cancelar.js-->
                         
                        <label class="etiqueta_6">Edad</label>
                        <div id="Edad"  class="edad_2">&nbsp;</div><!--recibe desde calculoEdad.php la edad del paciente-->              
                        <!--Se pasa el valor del DIV que contiene la edad a un INPUT oculto, este ultimo es quien manda la edad a la BD-->
                        <script type="text/javascript">
                            document.forms["formDoc"].onsubmit = function(){
                                var texto = document.getElementById("EdadOculta").value = document.getElementById("Edad").innerHTML;
                                //alert(texto);
                            }  
                        </script>
                        <input type="text" hidden name="edadOculta" id="EdadOculta" >
                        <br> 
                        <label class="etiqueta_5">Grupo Sanguineo</label>
                        <select class="registro_01" name="grupoSanguineo" id="Sangre" >
                            <option></option>
                            <option>O -</option>
                            <option>O +</option>
                            <option>A -</option>
                            <option>A +</option>
                            <option>B -</option>
                            <option>B +</option>
                            <option>AB -</option>
                            <option>AB +</option>
                        </select>
                        <br class="ocultar">
                        <label class="etiqueta_6">Sexo</label>
                        <select class="registro_01" name="sexo_Paciente" id="SexoPaciente" >
                            <option></option>
                            <option>Femenino</option>
                            <option>Masculino</option>
                        </select>
                        <br>       
                        <label class="etiqueta_5">Grado de Instrucción</label>
                        <select class="registro_01"  name="gradoInstruccion" id="GradoInstruccion" >
                            <option></option>
                            <option>Primaria</option>
                            <option>Bachiller</option>
                            <option>Universitario</option>
                            <option>Maestría</option>
                            <option>Doctorado</option>                            
                            <option>Sin estudio</option>
                        </select>
                        <br class="ocultar">    
                        <label class="etiqueta_6">Ocupación</label>
                        <input type="text" name="ocupacion" id="Ocupacion" >
                        <br>                            
                        <label class="etiqueta_5">Religion</label>
                        <input type="text" name="religion"  id="Religion" >
                        <br class="ocultar">    
                        <label class="etiqueta_6">Correo electronico</label>
                        <input type="text" name="correo" id="Correo"  onfocus="limpiar_2()" onblur="correo_3();"><!--limpiar_2() y correo_3() se encuentran al final de este archivo-->
                        <label class="etiqueta_5">Nº Hijos</label>
                        <input type="text" name="hijos" id="Hijos">

                        <hr style="margin: 1% auto;">
                        
                        <div style="background-color: ; width: 45%; float: left;">
                            <label class="etiqueta_5" style="width: 45%;">Lugar de Residencia</label>
                            <br><br>
                                <label class="etiqueta_23">Estado</label>
                                <select class="etiqueta_24" name="estadoResidencia" id="Estado_Res"  onchange="SeleccionarMunicipio(this.form)"><!--SeleccionarMunicipio() se encuentra en Municipios.js-->
                                        <option></option>
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
                            <select  class="etiqueta_24" name="municipioResidencia" id="Municipio_Res"  onchange="SeleccionarParroquia(this.form)"> <!--esta funcion se encuentra en parroquias.js-->
                                    <option></option>      
                            </select>                       
                            <br>
                            <label class="etiqueta_23">Parroquia</label>
                            <select  class="etiqueta_24" name="parroquiaResidencia" id="Parroquia_Res" > 
                                <option></option>                        
                            </select>
                        </div>
                        <div style="background-color: ;width: 45%; float: right; margin-right: 6.5%;">
                            <label class="etiqueta_5" style="width: 40%;">Lugar Nacimiento</label> 
                            <br><br>
                            <label class="etiqueta_25">Estado</label>
                            <select class="etiqueta_26" name="estadoNacimiento" id="Estado_Nac"  onchange="SeleccionarMunicipio_Nac(this.form)"> 
                                    <option></option>
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
                            <br >
                            <label class="etiqueta_25">Municipio</label>
                            <select  class="etiqueta_26" name="municipioNacimiento" id="Municipio_Nac"  onchange="SeleccionarParroquia_Nac(this.form)"> <!--esta funcion se encuentra en Municipios.js-->
                                    <option></option>      
                            </select>                      
                            <br>
                            <label class="etiqueta_25">Parroquia</label>
                            <select  class="etiqueta_26" name="parroquiaNacimiento" id="Parroquia_Nac" > 
                                <option></option>
                            </select>
                        </div>
                        <label class="etiqueta_12">Especifique dirección actual</label>                    
                        <textarea  class="etiqueta_11" rows="3"  name=direccion id="Direccion" ></textarea>
                        
                        <br>
                        <label class="etiqueta_12">En caso de emergencia</label>
                        <textarea  class="etiqueta_11" rows="3" name="emergencia" id="Emergencia" ></textarea>
                    </fieldset>  

                        <br> 
                        <input type="text" id="Doctor" name="doctor" hidden value="<?php echo $especialista=$_SESSION["UsuarioDoct"];?>"> <!--se envia el ID del doctor a Ajax_Cancelar.js para agendar citaonclick=" return validar_06();" return validar_08()"-->
                        <input type="submit" hidden id="BotonGuardar" name="botonGuardar"  onclick=""><!-- se encuentra en validar_Campos.jsreturn validar_08()-->
                </form>    
            </div>
        </div>
            <footer>
                <?php
                    include("../header/footer.php");
                ?>
            </footer>
        </div> 
        <?php } ?>
                
    </div>
    </body>
</html>


<?php
    }
    else{//si se ha pulsado el boton guardar, se reciben los datos del nuevo paciente desde este mismo formulario.
            $NombrePacient= $_POST["nombre_Paciente"];
            $ApellidoPacient= $_POST["apellido_Paciente"];
            $CedulaPacient= $_POST["cedula_Paciente"];
            $FechaNacimiento= $_POST["fechaNacimiento_Paciente"];
            $Edad= $_POST["edadOculta"];
            $Sexo= $_POST["sexo_Paciente"];
            $Correo= $_POST["correo"];
            $Hijos= $_POST["hijos"];
            $Nacionalidad= $_POST["nacionalidad_Paciente"];
            $EstadoCivil=  $_POST["estadoCivil_Paciente"];
            $Sangre= $_POST["grupoSanguineo"];
            $Telefono= $_POST["telefono"];
            $Estado_Res= $_POST["estadoResidencia"];
            $Municipio_Res= $_POST["municipioResidencia"];
            $Parroquia_Res= $_POST["parroquiaResidencia"];
            $Estado_Nac= $_POST["estadoNacimiento"];
            $Municipio_Nac= $_POST["municipioNacimiento"];
            $Parroquia_Nac= $_POST["parroquiaNacimiento"];
            $Direccion= $_POST["direccion"];
            $Emergencia= $_POST["emergencia"];
            $GradoInstruccion= $_POST["gradoInstruccion"];
            $Ocupacion= $_POST["ocupacion"];
            $Religion=  $_POST["religion"];

            // echo "Nombre: " . $NombrePacient ."<br>";
            // echo "Apellido: " . $ApellidoPacient ."<br>";
            // echo "Cedula: " . $CedulaPacient ."<br>";
            // echo "Nacimiento: " . $FechaNacimiento ."<br>";
            // echo "Edad: " . $Edad . "<br>";
            // echo "Sexo: " . $Sexo . "<br>";
            // echo "Correo: " . $Correo ."<br>";
            // echo "Nacionalidad: " . $Nacionalidad . "<br>";
            // echo "Estado civil: " . $EstadoCivil . "<br>";
            // echo "Sangre: " . $Sangre . "<br>";
            // echo "Telefono: " . $Telefono . "<br>";
            // echo "Est Res: " . $Estado_Res ."<br>";
            // echo "Muni Res: " . $Municipio_Res ."<br>";
            // echo "Par Res: " . $Parroquia_Res ."<br>";
            // echo "Estado nac: " . $Estado_Nac ."<br>";
            // echo "Mun nac: " . $Municipio_Nac ."<br>";
            // echo "Par Nac: " . $Parroquia_Nac ."<br>";
            // echo "Direccion: " . $Direccion . "<br>";
            // echo "Emergencia: " . $Emergencia . "<br>";
            // echo "Grado instrucción: " . $GradoInstruccion ."<br>";
            // echo "Ocupacion: " . $Ocupacion . "<br>";
            // echo "Religion: " . $Religion . "<br>";

            //se cambia el formato de la fecha a Y-m-d antes de insertarlo en la BD
            $fechaFormatoMySQL = date("Y-m-d", strtotime($FechaNacimiento));

//Se guardan los datos recibidos en la tabla pacientes registrados
    $Insertar_1=" INSERT INTO pacientes_registrados(nombre_pacient, apellido_pacient, cedula_pacient, fechaNacimiento_pacient, edad_pacient, sexo_pacient, correo_pacient, nacionalidad_pacient, estadoCivil_pacient, grupoSanguineo_pacient, telefono_pacient, estado_Residencia, municipio_Residencia, parroquia_Residencia, estado_Nacimiento, municipio_Nacimiento, parroquia_Nacimiento, direccion_Actual, emergencia_pacient,  gradoInstruccion, ocupacion, religion) VALUES('$NombrePacient', '$ApellidoPacient', '$CedulaPacient', '$fechaFormatoMySQL', '$Edad', '$Sexo', '$Correo', '$Nacionalidad', '$EstadoCivil', '$Sangre', '$Telefono', '$Estado_Res', '$Municipio_Res', '$Parroquia_Res', '$Estado_Nac', '$Municipio_Nac', '$Parroquia_Nac', '$Direccion', '$Emergencia', '$GradoInstruccion', '$Ocupacion', '$Religion')"; 
        
    mysqli_query($conexion,$Insertar_1);

//se busca el ID_PR del paciente recien insertado en la BD para insertarlo en la tabla doctores_pacientesRegistrados y asi poder relacionar al paciente con el Dr.
    $Consulta= "SELECT ID_PR FROM pacientes_registrados ORDER BY ID_PR DESC LIMIT 1 ";
    $Recordset= mysqli_query($conexion,$Consulta); 
    $paciente= mysqli_fetch_array($Recordset);
    $ID_PacienteRegistrado= $paciente["ID_PR"];

    $Insertar_2=" INSERT INTO doctores_pacientesregistrados(ID_Doctor, ID_PR) VALUES('$sesion','$ID_PacienteRegistrado')";

    mysqli_query($conexion,$Insertar_2);

    //se redirecciona a la pagina RegistroPacientes_Basico.php
   echo '<script type="text/javascript">window.location.href="RegistroPacientes.php";</script>'; 

} ?>

<script type="text/javascript">
    function Advertencia(){
        if(confirm("No ha guardado los cambios, si sale de esta página perdera los datos introducidos")==true){
            //alert('Salir');
            return true;
        }
        else{
            //alert('Cancelo la salida');
            return false;
        }
    }

//Mascara de entrada para el telefono
    TelefonoPaciente.addEventListener("input", function(){
      if (this.value.length == 4){
          this.value += "-"; 
      }
      else if  (this.value.length == 8){
          this.value += ".";  
      }
      else if  (this.value.length == 11){
          this.value += ".";  
      }
    }, false);

//Validar el formato de telefono
    function validarFormatotelefono(campo){
        var RegExPattern = /^\d{4}\-\d{3}\.\d{2}\.\d{2}$/;
        if((campo.match(RegExPattern)) && (campo!='')){
            return true;
        }
        else{
            alert("Telefono con formato incorrecto");
            document.getElementById("TelefonoPaciente").value = "";
            return true;
        }
    }

//Mascara de entrada para la fecha
    FechaNacimientoPaciente.addEventListener("input", function(){
      if (this.value.length == 2){
          this.value += "-"; 
      }
      else if  (this.value.length == 5){
          this.value += "-";  
      }
    }, false);

//Validar el formato de la fecha
    function validarFormatoFecha(campo){
        if(document.getElementById("TelefonoPaciente").value==""){
            document.getElementById("TelefonoPaciente").focus();
            document.getElementById("FechaNacimientoPaciente").value = "";
            return false;
        }   
        else{
            var RegExPattern = /^\d{2}\-\d{2}\-\d{4}$/;
            if((campo.match(RegExPattern)) && (campo!='')){
                return true;
            }
            else{
                alert("Fecha con formato incorrecto");
                document.getElementById("FechaNacimientoPaciente").value = "";
            }
        }
    }

//Validar el formato del correo
    function correo_3(){   
        campo = event.target;
        var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        if(emailRegex.test(campo.value)) {      
            return true;
        } 
        else{
            alert("Correo no valido");      
            document.getElementById("Correo").style.backgroundColor="red"; 
            document.getElementById("Correo").value = "";
        }
    }

    function limpiar_2(){
        document.getElementById("Correo").value = "";        
        document.getElementById("Correo").style.backgroundColor = "white"; 
      document.getElementById("Correo").style.color="black";
    } 
</script>
