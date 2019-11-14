<?php
    // Se verifica si se realizó login para entrar en este  archivo
    include("../Clases/VerificaDr.php");
    //Se conecta a la base de datos
    include("../conexion/Conexion_BD.php");
    include("../Clases/muestraError.php");
?> 

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Inicio Sesión</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Consulta médica, solicitud de citas, directorio medico, perfil de doctor"/>
        <meta name="keywords" content="consulta, medico, doctor, directorio"/>
        <meta name="author" content="Pablo Cabeza"/>
        
        <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="../Javascript/Ciudades.js"></script> 
        <script src="../Javascript/Funciones_varias.js"></script>
        <script src="../Javascript/validar_Campos.js"></script>
        <script type="text/javascript">//los eventos son necsarios introducirlos despues del archivo funciones Funciones_varias.js
            document.addEventListener("keydown", contar_1, false); 
            document.addEventListener("keyup", contar_1, false);
            document.addEventListener("keydown", valida_Longitud_2, false);//valida_Longitud_2() se encuentra en Funciones_varias.js 
            document.addEventListener("keyup", valida_Longitud_2, false);//valida_Longitud_2() se encuentra en 
            document.addEventListener("DOMContentLoaded", resize_6, false);
            document.addEventListener("DOMContentLoaded", resize_7, false);
            document.addEventListener("DOMContentLoaded", resize_8, false);  
            document.addEventListener("keydown", valida_LongitudTelefono_1, false);//validaLongitud() se encuentra en Funciones_varias.js 
            document.addEventListener("keyup", valida_LongitudTelefono_1, false);//validaLongitud() se encuentra en Funciones_varias.js 
            document.addEventListener("keydown", valida_LongitudTelefono_2, false);//validaLongitud() se encuentra en Funciones_varias.js 
            document.addEventListener("keyup", valida_LongitudTelefono_2, false);//validaLongitud() se encuentra en Funciones_varias.js   
        </script>          

        <style>
            th{
                font-size: 0.9vw;
            }
            td{
               font-size: 0.85vw;
               box-sizing: border-box;
            }
            .a2{
               font-size: 0.88vw; 
               font-weight:bolder;
               color: #040652;
            }
            .a2:hover{
                color: white;
            }
            tr:hover{background-color:#BEBFDD; }
        </style>         

    </head>     
    <body onload=" resize_1()">
        <header>
            <?php          
                include("../header/headerDoctor.php")
            ?>
        </header>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
        <div> 
            <section style="margin-top: 5%;"> 
                <h3 style="margin-bottom: 2.5%;">Editar perfil</h3>

                <?php
                    $consulta_1="SELECT * FROM doctores INNER JOIN especialidades ON doctores.ID_Especialidad=especialidades.ID_Especialidad  WHERE ID_Doctor= '$sesion' ";
                    $Recorset_1=mysqli_query($conexion,$consulta_1);
                    $Doctor= mysqli_fetch_array($Recorset_1);
                ?>
                
                <form action="perfilDoctor.php" method="POST" enctype="multipart/form-data" name="Afiliacion" autocomplete="off" class="Afiliacion_0">
                    <!--En este formulario se utilizo el enctype correspondiente porque se va a enviar una imagen-->
                    <div style="float: left; width: 40%; margin-left: 10%;">
                        
                        <a id="marcador_01" class="ancla_2"></a>
                        <fieldset class="Afiliacion_4">
                            <legend>Datos personales</legend>
                            <label>Nombre:</label>
                            <input class="etiqueta_32" type="text" name="nombre" id="Nombre" value="<?php echo $Doctor['nombre_doctor'];?>" />
                            <br/>
                            <label>Apellido:</label>
                            <input class="etiqueta_32" type="text" name="apellido" id="Apellido" value="<?php echo $Doctor['apellido_doctor'];?>"/>
                            <br/>
                            <label>Cédula:</label>
                            <input class="etiqueta_32" type="text" name="cedula" id="Cedula" value="<?php echo $Doctor['cedula'];?>"/>
                            <br/>
                            <label>Teléfono movil:</label>
                            <input class="etiqueta_32" type="text" name="telefonoMovil" id="TelefonoMovil" value="<?php echo $Doctor['telefono_movil'];?>"  onclick="limpiarColorTelefonoMovil()"  onblur="validarFormatotelefonoMovil(this.value)"/>
                            <br/>
                            <label>Correo electronico:</label>
                            <input class="etiqueta_32" type="text" name="correo" id="Correo" value="<?php echo $Doctor['correo'];?>"/>
                            <br/>
                            <label>Sexo:</label><br>
                            <label class="etiqueta_1" for="SexoM">Masculino</label>
                            <input type="radio" name="sexo" id="SexoM" value="M" <?php if(($Doctor['sexo'])=='M') print "checked=true"?>/>
                            <br/>
                            <label class="etiqueta_1" for="SexoF">Femenino</label>
                            <input type="radio" name="sexo" id="SexoF" value="F" <?php if(($Doctor['sexo'])=='F') print "checked=true"?>/>
                            <br/>                            
                        </fieldset>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

                        <a id="marcador_02" class="ancla_2"></a>
                        <fieldset class="Afiliacion_4">
                            <legend>Fotografia</legend>
                            <label class="etiqueta_1B">Inserte una imagen no mayor de Kb</label><br><br>
                            <input name="imagen" type="file" value="Seleccione un fotografia" />
                        </fieldset>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
                        
                        <a id="marcador_03" class="ancla_2"></a>
                        <fieldset class="Afiliacion_4">   
                            <legend>Datos de Consulta</legend>
                            <label>Especialidad:</label>
                            <select class="etiqueta_26" name="especialidad" id="Especialidad"/>
                                    <option value="<?php echo $Doctor['ID_Especialidad'];?>"><?php echo $Doctor['especialidad'];?></option>
                                        <?php
                                            $Consulta= "SELECT * FROM especialidades ORDER BY especialidad ASC";
                                            $Recordset= mysqli_query($conexion,$Consulta);
                                            while($especialista= mysqli_fetch_array($Recordset)){
                                                echo '<option value="'.$especialista['ID_Especialidad'].'">'.$especialista['especialidad'] .'</option>'; 
                                            }
                                        ?>
                            </select>
                            <br/>
                            <label>Código registro sanitario:</label>
                            <input class="etiqueta_32" type="text" name="registroSanitario" id="RegistroSanitario"  value="<?php echo $Doctor['RegistroSanitario'];?>" style="text-transform: lowercase;" />
                            <br/>
                            <label>Teléfono consultorio:</label>
                            <input class="etiqueta_32" type="text" name="telefonoConsultorio" id="TelefonoConsultorio" value="<?php echo $Doctor['telefono_consultorio'];?>" onclick="limpiarColorTelefonoConsultorio()"  onblur="validarFormatotelefonoConsultorio(this.value)"/>
                            <br/>
                            <label>Precio consulta:</label>
                            <input class="etiqueta_32" type="text" name="precioConsulta" id="PrecioConsulta" value="<?php echo $Doctor['precio_consulta'];?>"/>
                            <br/>

                            <?php
                                $Consulta_4="SELECT clinica, direccion, consultorio FROM direcciones WHERE ID_Doctor ='$sesion'";
                                $Recorset_4= mysqli_query($conexion,$Consulta_4);
                                while($DirConsulta= mysqli_fetch_array($Recorset_4)){
                            ?>
                                <label>Dirección:</label>
                                <textarea style="margin-left: 0%; margin-right: 0%; width: 49%;" name="direccion" id="Direccion" cols="20"><?php echo $DirConsulta['direccion'];?></textarea>
                                <br/>
                                <label>Centro de salud:</label>
                                <textarea style="margin-left: 0%; margin-right: 0%; width: 49%;" name="clinica" id="CentroSalud"><?php echo $DirConsulta['clinica'];?></textarea>
                                <br/>
                                <label>Consultorio:</label>
                                <textarea style="margin-left: 0%; margin-right: 0%; width: 49%;" name="consultorio"><?php echo $DirConsulta['consultorio'];?></textarea>
                                <br/>
                            <?php } ?>

                            <label>Estado:</label>
                            <select class="etiqueta_26" name="estado" id="Estado"> <!-- esta funcion esta en CIudad.js-->
                                <option value="<?php echo $Doctor['estado'];?>"><?php echo $Doctor['estado'];?></option>
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
                                    <option>Vargas</option>-->
                                    <option>Yaracuy</option>
                                   <option>Zulia</option>
                            </select>                  
                            <br><br>

                            <label>Ciudad:</label>
                            <input class="etiqueta_32" type="text" name="ciudad" id="Ciudad" value="<?php echo $Doctor['ciudad'];?>"> 
                            
                            <hr>
                            <label>Horario</label>

                            <?php
                                $Consulta_5="SELECT * FROM horarios WHERE ID_Doctor = '$sesion' ";
                                $Recordset_5= mysqli_query($conexion,$Consulta_5);
                                $horario= mysqli_fetch_array($Recordset_5);
                            ?>

                            <br><br>
                            <label  style="background-color:;margin-bottom: 2%; font-weight: bold; width: 90%; text-align: center;">Mañana:</label>
                            <br>
                            <label>Inicio</label>
                            <select class="etiqueta_26" name="inicioMañana" id="Ciudad"> 
                                <option><?php echo $horario['inicio_mañana'];?></option>
                                <option></option>
                                <option>06:00 am</option>
                                <option>06:30 am</option>
                                <option>07:00 am</option>
                                <option>07:30 am</option>
                                <option>08:00 am</option>
                                <option>08:30 am</option>
                                <option>09:00 am</option>
                                <option>09:30 am</option>
                                <option>10:00 am</option>
                                <option>10:30 am</option>
                                <option>11:00 am</option>
                                <option>11:30 am</option>
                                <option>12:00 m</option>
                            </select> <br>

                            <label>Culmina</label>  
                            <select class="etiqueta_26" name="culminaMañana" id="Ciudad">
                                <option><?php echo $horario['culmina_mañana'];?></option> 
                                <option></option>
                                <option>09:00 am</option>
                                <option>09:30 am</option>
                                <option>10:00 am</option>
                                <option>10:30 am</option>
                                <option>11:00 am</option>
                                <option>11:30 am</option>
                                <option>12:00 m</option>
                            </select> 
                            <br>
                            <label class="etiqueta_9" for="Lunes_Mañana">lunes</label>
                            <input class="etiqueta_10" type="checkbox" name="lunes_mañana" id="Lunes_Mañana" value="lunes" 
                                    <?php 
                                        if(($horario['lunes_mañana'])=='lunes'){
                                            echo 'checked';
                                    }?> > 
                            <br>                   
                            <label class="etiqueta_9" for="Martes_Mañana">martes</label>
                            <input class="etiqueta_10" type="checkbox" name="martes_mañana" id="Martes_Mañana" value="martes"  <?php if(($horario['martes_mañana'])=='martes') { echo ' checked'; } ?>> <br>
                           
                            <label class="etiqueta_9" for="Miercoles_Mañana">miercoles</label>
                            <input class="etiqueta_10"  type="checkbox" name="miercoles_mañana" id="Miercoles_Mañana" value="miercoles"  <?php if(($horario['miercoles_mañana'])=='miercoles') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Jueves_Mañana">jueves</label>
                            <input class="etiqueta_10"  type="checkbox" name="jueves_mañana" id="Jueves_Mañana" value="jueves" <?php if(($horario['jueves_mañana'])=='jueves') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Viernes_Mañana">viernes</label>
                            <input class="etiqueta_10"  type="checkbox" name="viernes_mañana" id="Viernes_Mañana" value="viernes" <?php if(($horario['viernes_mañana'])=='viernes') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Sabado_Mañana">sabado</label>
                            <input class="etiqueta_10"  type="checkbox" name="sabado_mañana" id="Sabado_Mañana" value="sabado" <?php if(($horario['sabado_mañana'])=='sabado') { echo ' checked'; } ?>> <br>
                           
                            <br>
                            <label style="background-color:;margin-bottom: 2%; font-weight: bold; width: 90%; text-align: center;">Tarde:</label>
                            <br>

                            <label>Inicio</label>
                                <select class="etiqueta_26" name="iniciaTarde" id=""> 
                                    <option><?php echo $horario['inicia_tarde'];?></option>
                                    <option></option>
                                    <option>12:00 m</option>
                                    <option>12:30 pm</option>
                                    <option>01:00 pm</option>
                                    <option>01:30 pm</option>
                                    <option>02:00 pm</option>
                                    <option>02:30 pm</option>
                                    <option>03:00 pm</option>
                                    <option>03:30 pm</option>
                                    <option>04:00 pm</option>
                                    <option>04:30 pm</option>
                                    <option>05:00 pm</option>
                                    <option>05:30 pm</option>
                                    <option>06:00 pm</option>
                                    <option>06:30 pm</option>
                                    <option>07:00 pm</option>
                                    <option>07:30 pm</option>
                                    <option>08:00 pm</option>
                                </select> <br> 
                            <label>Culmina</label>
                                <select class="etiqueta_26" name="culminaTarde" id="Ciudad"> 
                                    <option><?php echo $horario['culmina_tarde'];?></option>
                                    <option></option>
                                    <option>02:00 pm</option>
                                    <option>02:30 pm</option>
                                    <option>03:00 pm</option>
                                    <option>03:30 pm</option>
                                    <option>04:00 pm</option>
                                    <option>04:30 pm</option>
                                    <option>05:00 pm</option>
                                    <option>05:30 pm</option>
                                    <option>06:00 pm</option>
                                    <option>06:30 pm</option>
                                    <option>07:00 pm</option>
                                    <option>07:30 pm</option>
                                    <option>08:00 pm</option>
                                </select>
                            
                            <br>
                            <label class="etiqueta_9" for="Lunes_Tarde">lunes</label>
                            <input class="etiqueta_10" type="checkbox" name="lunes_tarde" id="Lunes_Tarde" value="lunes"  <?php if(($horario['lunes_tarde'])=='lunes') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Martes_Tarde">martes</label>
                            <input class="etiqueta_10" type="checkbox" name="martes_tarde" id="Martes_Tarde" value="martes" <?php if(($horario['martes_tarde'])=='martes') { echo ' checked'; } ?>> <br>
                           
                            <label class="etiqueta_9" for="Miercoles_Tarde">miercoles</label>
                            <input class="etiqueta_10"  type="checkbox" name="miercoles_tarde" id="Miercoles_Tarde" value="miercoles" <?php if(($horario['miercoles_tarde'])=='miercoles') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Jueves_Tarde">jueves</label>
                            <input class="etiqueta_10"  type="checkbox" name="jueves_tarde" id="Jueves_Tarde" value="jueves" <?php if(($horario['jueves_tarde'])=='jueves') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Viernes_Tarde">viernes</label>
                            <input class="etiqueta_10"  type="checkbox" name="viernes_tarde" id="Viernes_Tarde" value="viernes" <?php if(($horario['viernes_tarde'])=='viernes') { echo ' checked'; } ?>> <br>
                            
                            <label class="etiqueta_9" for="Sabado_Tarde">sabado</label>
                            <input class="etiqueta_10"  type="checkbox" name="sabado_tarde" id="Sabado_Tarde" value="sabado" <?php if(($horario['sabado_tarde'])=='sabado') { echo ' checked'; } ?>> <br>
                        </fieldset>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- SERVICIO PROFESIONAL -->

                        <a id="marcador_04" class="ancla_2"></a>
                        <fieldset class="Afiliacion_4">
                            <?php
                                $Consulta_6="SELECT * FROM perfil_doctor WHERE ID_Doctor = '$sesion' ";
                                $Recordset_6= mysqli_query($conexion,$Consulta_6);
                                $PerfilDoctor= mysqli_fetch_array($Recordset_6);
                            ?>
                            <legend>Servicios Profesionales</legend>
                            <label>Especifique un servicio de su consulta a la vez</label><br><br>
                            <textarea style="width: 90%; text-align: left;" name="servicioUno"><?php echo $PerfilDoctor['servicio_1'];?></textarea><br>
                            <textarea style="width: 90%; text-align: left;" name="servicioDos"><?php echo $PerfilDoctor['servicio_2'];?></textarea><br>
                            <textarea style="width: 90%; text-align: left;" name="servicioTres"><?php echo $PerfilDoctor['servicio_3'];?></textarea><br> 
                        </fieldset>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- PERFIL PROFESIONAL -->


                        <a id="marcador_05" class="ancla_2"></a>
                        <fieldset class="Afiliacion_4">
                            <legend>Perfil profesional</legend>
                            <textarea  class="contenido" id="PerfilProf" name="textoPerfil"><?php echo $PerfilDoctor['Perfil'];?></textarea>
                            <input type="text" class="contador" id="Contador_2" name="contadorBD" value="800">
                        </fieldset>


<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- VERIFICACION DE USUARIO -->
                        

                        <a id="marcador_06" class="ancla_2"></a>
                        <fieldset class="Afiliacion_4"> 
                            <?php
                                $Consulta7="SELECT valor_A, valor_B FROM usuario_doctor WHERE  ID_Doctor = '$sesion'";
                                $Resulset7 = mysqli_query($conexion,$Consulta7);
                                $Valores= mysqli_fetch_array($Resulset7);
                            ?>
                            <legend>Verificación de usuario</legend>
                            <input type="checkbox" hidden name="cambiarValores" id="CambiarValor" value="1"><!--esta funcion esta al final del archeivo-->
                            <span style="font-size: 14px; margin-left: 2%; cursor: pointer; color: #040652;" onclick="cambiarValores()">¿Desea Cambiar valor "A" y valor "B"?</span><br><br><!--cambiarValores() se encuentra al final de este archivo--> 
                            <label>Valor alfanumerico "A"</label>
                            <input type="password" name="valorA" id="ValorA" disabled placeholder="4 digitos" value="<?php echo $Valores['valor_A'];?>"><br>
                            <label>Valor alfanumerico "B"</label>
                            <input type="password" name="valorB"  id="ValorB" disabled placeholder="4 digitos" value="<?php echo $Valores['valor_B'];?>">
                            <Hr>
                            <p>Es importante memorizar o guardar en un lugar seguro los valores "A" y "B", los mismos son requeridos para realizar su cambio de clave en un futuro.</p><br><br>
                        </fieldset>
                    </div>


<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                    <!-- INIDCE LATERAL DERECHO -->
                    <div style="background-color:; width: 20%; margin-left: 65%; margin-top: 3%; float: right; position: fixed;">
                        <p style="background-color: #BEBFDD; text-align: center; margin-left: 0%; margin-bottom: 2%; font-size: 18px;">Secciones</p>
                        <a class="marcador" href="#marcador_01">Datos personales</a><br>
                        <a class="marcador" href="#marcador_02">Fotografia</a><br>
                        <a class="marcador" href="#marcador_03">Datos de consulta</a><br>
                        <a class="marcador" href="#marcador_04">Servicios profesionales</a><br>
                        <a class="marcador" href="#marcador_05">Perfil profesional</a><br>
                        <a class="marcador" href="#marcador_06">Verificación de usuario</a>
                    </div>  
                    <div style="background-color:; width: 25%; margin-left: 62.5%; height: 20px; margin-top: 21%; float: right; position: fixed;">
                        <?php
                            $Consulta_8="SELECT mostrar FROM doctores WHERE ID_Doctor = '$sesion' ";
                            $Recordset_8= mysqli_query($conexion,$Consulta_8);
                            $Most= mysqli_fetch_array($Recordset_8);
                        ?>
                        <label for="MostrarPerfil" class="perfil_1" style=""><input type="checkbox" id="MostrarPerfil" name="mostrarPerfil" value="1" checked style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -70px;"  
                        <?php if(($Most['mostrar'])=='1') { echo ' checked'; } ?>>
                        Mostrar perfil en Directorio Médico.</label>
                    </div> 
                    <div id="Perfil_06" style="background-color:; position: fixed; width: 20%; margin-left: 63%; display: flex; justify-content: center; margin-top: 25%">
                        <input type="submit" value= "Guardar" style="width: 30%; margin-right: 14%; color:rgba(194, 245, 19,1);"  onclick="return validar_10()"> 
                        <a style="font-size:13px;  box-sizing:border-box; margin-top:0%;  color:rgba(194, 245, 19,1);" href="mostrarPerfilDoctor.php">Volver</a>         
                    </div>             
                </form>                 
            </section> 
       </div>
       <!-- <footer>   
            <?php
               // include("../header/footer.php");
            ?>
        </footer>-->
    </body>
    </html>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

<script type="text/javascript">
    //Ajusta el texarea según se vaya escribiendo en el mismo
    document.querySelector('#Direccion').addEventListener('keydown', autosize);
                     
    function autosize(){
        var el = this;
        setTimeout(function(){
            el.style.cssText = 'height:auto; padding:0';
            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        },0);
    }

// ----------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------------

    //Ajusta el texarea según se vaya escribiendo en el mismo 
    document.querySelector('#CentroSalud').addEventListener('keydown', autosize);
                     
    function autosize(){
        var el = this;
        setTimeout(function(){
            el.style.cssText = 'height:auto; padding:0';
            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        },0);
    }

// ----------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------------
    //Ajusta el texarea según se vaya escribiendo en el mismo
    document.querySelector('#PerfilProf').addEventListener('keydown', autosize);
             
    function autosize(){
        var el = this;
        setTimeout(function(){
            el.style.cssText = 'height:auto; padding:0';
            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        },0);
    }

// ----------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------------
    //Ajusta el texto recuperado de la BD en el texarea donde va el motivo de la consulta
    function resize_1(){
        var text = document.getElementById('PerfilProf');
            text.style.height = 'auto';
            text.style.height = text.scrollHeight+'px';
    }

// ----------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------------
                           
    function cambiarValores(){
        var A= document.getElementById("CambiarValor");
        var B= document.getElementById("ValorA");
        var C= document.getElementById("ValorB");
        if(A.checked == false){
            B.disabled = false;
            C.disabled = false;
            //B.style.backgroundColor="red";
        }
        else{
            B.disabled = true;
            C.disabled = true;
        }
    }

// ----------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------------

    //Mascara de entrada para el telefono
    TelefonoMovil.addEventListener("input", function(){
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
    avisado=false;
    function validarFormatotelefonoMovil(campo){
        var RegExPattern = /^\d{4}\-\d{3}\.\d{2}\.\d{2}$/;
        if((campo.match(RegExPattern)) && (campo!='')){
            return true;
        }
        else{
            alert("Telefono con formato incorrecto");
            document.getElementById("TelefonoMovil").value = "";
            document.getElementById("TelefonoMovil").style.backgroundColor = 'red'; 
            return false;
        }
    }

// ----------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------------

    //Mascara de entrada para el telefono
    TelefonoConsultorio.addEventListener("input", function(){
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
    avisado=false;
    function validarFormatotelefonoConsultorio(campo){
        var RegExPattern = /^\d{4}\-\d{3}\.\d{2}\.\d{2}$/;
        if((campo.match(RegExPattern)) && (campo!='')){
            return true;
        }
        else{
            alert("Telefono con formato incorrecto");
            document.getElementById("TelefonoConsultorio").value = "";
            document.getElementById("TelefonoConsultorio").style.backgroundColor = 'red'; 
            return false;
        }
    }
       

    function limpiarColorTelefonoMovil(){
        document.getElementById("TelefonoMovil").value = "";        
        document.getElementById("TelefonoMovil").style.backgroundColor = "white";
    }

    function limpiarColorTelefonoConsultorio(){
        document.getElementById("TelefonoConsultorio").value = "";        
        document.getElementById("TelefonoConsultorio").style.backgroundColor = "white";
    }


</script>
