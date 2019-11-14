<?php
    session_start();//se inicia una sesion para almacenar una variable.
    
    //Se conecta a la base de datos
    include("../conexion/Conexion_BD.php");
    //Configura la capacidad de mostrar errores.
    include("../Clases/muestraError.php");

    $DoctorCifrado= $_GET["ID_Doctor"];//Recibe el ID_Doctor(cifrado) desde directorio.php
    // echo "ID_DoctorCifrado= " . $DoctorCifrado . "<br>";   

    //se revierte el cifrado para obtener la llave y el ID_Doctor
    $Doctor = base64_decode($DoctorCifrado);
    // echo "llave y ID_Doctor: " . $Doctor . "<br>";

    //Se sustrae la llave del valor cifrado para que quede el ID_Doctor
    $Llave= iconv_substr($Doctor,6) ;
    //echo "ID_Doctor: " . $Llave_2;

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
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css"/>  
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1001px)" href="../css/MediaQuery_CitasMedicas_Tablet.css"/>
        <link rel="stylesheet" type="text/css" href="../iconos/icono_telefono_correo/telefonos_correo.css"/><!--galeria de icomoon.io-->
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">
        
        <script src="../Javascript/Funciones_varias.js"></script> 
        <script type="text/javascript">
            //Ajuste el texto del texarea donde va el nombre del centro medico
            function resize_1(){
                var text = document.getElementById('CentroMedico');
                    text.style.height = 'auto';
                    text.style.height = text.scrollHeight+'px';
            }


            //Ajuste el texto del texarea donde va la direccion del consultorio
            function resize_2(){
                var text = document.getElementById('Direccion');
                    text.style.height = 'auto';
                    text.style.height = text.scrollHeight+'px';
            }


            //Ajuste el texto del texarea donde va el perfil profesional del dr.
            function resize_3(){
                var text = document.getElementById('PerfilProfesional');
                    text.style.height = 'auto';
                    text.style.height = text.scrollHeight+'px';
            }
        </script>
    </head>
            
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
    <body onload="resize_1();  resize_2();  resize_3()"> 
        <form method="POST" action="Citas_2Autofill.php" name="consulta">
        <header class="fixed_1">
            <?php 
                include("../header/headerPrincipal_2.php");
            ?>
        
            <div class="encabezado_03 ">
                <?php 
                $consulta_1="SELECT ID_Doctor,nombre_doctor,apellido_doctor, especialidad, sexo, fotografia FROM doctores INNER JOIN especialidades ON doctores.ID_Especialidad=especialidades.ID_Especialidad WHERE ID_Doctor= '$Llave' ";
                $Recorset_1=mysqli_query($conexion,$consulta_1);
                while($Doctor_Datos= mysqli_fetch_array($Recorset_1)){
                    if($Doctor_Datos["sexo"] == "F"){//Femenino
                        ?>
                        <input class="A_03" readonly="readonly" type="text" name="NombreDoctor" value="Dra. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                        <?php 
                    } 
                    else if($Doctor_Datos["sexo"] == "M"){//Masculino
                        ?>  
                        <input  class="A_03" readonly="readonly" type="text" name="NombreDoctor" value="Dr. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                        <?php 
                    } 
                    if($Doctor_Datos["sexo"] == ""){ //No especifico el sexo
                        ?>  
                        <input  class="A_03" readonly="readonly" type="text" name="NombreDoctor" value="<?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                        <?php 
                    } ?>


                    <input class="A_04" readonly="readonly" type="text" name="especialidad"  value="<?php echo $Doctor_Datos['especialidad'];?>"><input  type="text" hidden name="codigoDoctor" id="Doctor" value="<?php echo $Doctor_Datos['ID_Doctor'];?>">
                
            </div>
        </header>
    <div class="ocultarMenu_3" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  --><!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- Fotografia -->

            <div id="Perfil_00">                  
                <div id="Perfil_1">
                    <div class="imagen_Div">
                       <img class="imagen" src="../images/<?php echo $Doctor_Datos['fotografia'];?>">
                    </div>
                    <?php 
                } 
                //mysqli_free_result($Recorset_1);// Liberamos los registros  
                ?>
                    <div id="Perfil_05">
                       <!-- <div id="Perfil_06">
                            <a class="btn_publicaciones" name="boton_Publicaciones" href="mostrarPublicaciones.php?CodigoDoctor=<?php echo $Doctor ?>">Publicaciones</a>
                        </div> -->
                        <div id="Perfil_07">
                            <input style=" color:rgba(194, 245, 19,1);" class="botones" type="submit" value="Pedir cita" >
                        </div>
                    </div>
                </div>
            </div> 

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  --><!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!--Ubicación-->
            
            <div class="contenedor_03"> 
                <div id="Perfil_01"><!--HTML sin cortar el codigo PHP, otra manera de combinar ambos codigos-->
                    <?php
                    $Consulta_2="SELECT ID_Doctor,estado,ciudad FROM doctores WHERE ID_Doctor= '$Llave' ";
                    $Recorset_2=mysqli_query($conexion,$Consulta_2);
                    while($Ubicacion=mysqli_fetch_array($Recorset_2)){
                        //la unica razon por la que se toma el ID_Doctor de esta consulta es para enviarlo a Citas_2Autofill
                        $_SESSION["ID_Doctor"]= $Ubicacion[0];
                               ?>
                        <p class="Inicio_2">Ubicación</p>
                        <input class="A_05" type="text" name="estado" readonly="readonly" value="<?php echo $Ubicacion['estado'];?>">
                        <input class="A_05" type="text" name="ciudad" readonly="readonly" value="<?php echo $Ubicacion['ciudad'];?>">
                   <?php } 
                   mysqli_free_result($Recorset_2); // Liberamos los registros        
                    ?>
                </div>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  --><!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- Contactos -->

                <div id="Perfil_01"><!--HTML sin cortar el codigo PHP, otra manera de combinar ambos codigos-->
                    <?php
                    $Consulta_2="SELECT telefono_consultorio, telefono_movil, correo FROM doctores WHERE ID_Doctor= '$Llave' ";
                    $Recordset_2=mysqli_query($conexion,$Consulta_2);
                    while($Telefono=mysqli_fetch_array($Recordset_2)){
                    ?>
                        <p class="Inicio_2">Contacto</p>
                        <div class="telefonos_03">
                            <div class="telefono_03A">
                                <span class="icon-phone A_05A" title="Teléfono Consultorio"></span>
                                <input class="A_05" type="text" name="telefono_movil" readonly="readonly" value="<?php echo $Telefono['telefono_consultorio'];?>">
                            </div>
                            <div class="telefono_03B">
                                <span class="icon-mobile A_05A" title="Teléfono Movil"></span>
                                <input class="A_05" type="text" name="telefono_consultorio" readonly="readonly" value="<?php echo $Telefono['telefono_movil'];?>">
                            </div>
                        </div>
                        <div class="telefono_03C">
                            <span class="icon-envelop A_05A" title="Correo Electrónico"></span>
                            <input class="A_05A"  readonly="readonly" value="<?php echo $Telefono['correo'];?>">
                        </div>

                   <?php } 
                   mysqli_free_result($Recordset_2); //Liberamos los registros        
                    ?>
                    <br>
                </div>
                <br class="saltoLinea"><br class="saltoLinea"><br class="saltoLinea"><br class="saltoLinea"><br class="saltoLinea">

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  --><!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- Precio consulta -->
                <div id="Perfil_01B">
                        <?php
                        $Consulta_3="SELECT precio_consulta, sexo FROM doctores WHERE ID_Doctor= '$Llave' ";
                        $Recorset_3=mysqli_query($conexion,$Consulta_3);
                        while($PrecioConsulta= mysqli_fetch_array($Recorset_3)){
                        ?>     
                            <p class="Inicio_2">Costo de la consulta</p>
                        <?php
                            if($PrecioConsulta['precio_consulta']==""){
                                if($PrecioConsulta['sexo']=="F"){
                        ?>
                                    <input class="A_05"  type="text" name="precio" readonly="readonly" value="<?php echo 'Consultar precio con la Dra.'; ?>"> 
                                <?php 
                                }
                                else if($PrecioConsulta['sexo']=="M"){
                        ?>
                                    <input class="A_05"  type="text" name="precio" readonly="readonly" value="<?php echo 'Consultar precio con el Dr.'; ?>"> 
                                <?php    
                                }
                            } 
                            else{?>
                                <input class="A_05"  type="text" name="precio" readonly="readonly" value="<?php echo $PrecioConsulta['precio_consulta'];?>"> 
                                <?php
                            }    
                        }
                         mysqli_free_result($Recorset_3); // Liberamos los registros
                        ?>
                </div>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  --><!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- Centro médico -->
                <div id="Perfil_01A">
                        <?php
                            $Consulta_4="SELECT clinica, direccion, consultorio FROM direcciones WHERE ID_Doctor ='$Llave'";
                            $Recordset_4= mysqli_query($conexion,$Consulta_4);
                        ?>   
                    <p class="Inicio_2">Centro médico</p>  
                        <?php
                            while($DirConsulta= mysqli_fetch_array($Recordset_4)){ 
                        ?> 
                            <textarea class="A_06" id="CentroMedico" readonly="readonly"><?php echo $DirConsulta['clinica'];?></textarea>
                            <input class="A_07"  type="text" readonly="readonly" name="consultorio" value="<?php echo "Consultorio " . $DirConsulta['consultorio'];?>">     
                        <?php } 
                        mysqli_free_result($Recordset_4); //Liberamos los registros
                        ?>
                </div>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  --><!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- direccion -->
                <div id="Perfil_08">
                        <?php
                            $Consulta_4="SELECT clinica, direccion, consultorio FROM direcciones WHERE ID_Doctor ='$Llave'";
                            $Recordset_4= mysqli_query($conexion,$Consulta_4);
                        ?>   
                    <p class="Inicio_2">Dirección</p>  
                        <?php
                            while($DirConsulta= mysqli_fetch_array($Recordset_4)){ 
                        ?> 
                            <textarea class="A_06" id="Direccion" readonly="readonly"><?php echo $DirConsulta['direccion'];?></textarea> 
                        <?php } 
                        mysqli_free_result($Recordset_4); // Liberamos los registros
                        ?>
                </div>


<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  --><!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- Horario consulta -->
                <div id="Perfil_04"> 
                    <?php
                        $Consulta_5="SELECT * FROM horarios WHERE ID_Doctor = '$Llave' ";
                        $Recorset_5= mysqli_query($conexion,$Consulta_5);
                    ?>
                    <p class="Inicio_2">Horario de consulta</p>
                    <?php
                        while($horario= mysqli_fetch_array($Recorset_5)){ 
                            if(!empty($horario["inicio_mañana"])){
                    ?>  
                    <div>                 
                        <table id="Horario_Mañana"  style="margin: auto;">
                            <tr>
                                <td>
                                    <?php
                                        echo $horario["inicio_mañana"] . "&nbsp";
                                    ?>
                                </td>
                                <td> A&nbsp</td>
                                <td >
                                    <?php 
                                        echo $horario["culmina_mañana"] . "&nbsp";
                                    ?>
                                </td>
                            </tr>
                        </table>
                        <table style="margin: auto;">
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
                        <table name="horario_tarde" style="margin: auto;">
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
                        <table style="margin: auto;">
                            <tr>
                                <td>
                                    <?php 
                                        $longitud = count($horario);
                                        for ($i=12; $i<18; $i++){
                                        echo  $horario["$i"] . "&nbsp";
                                    }?>
                                </td>
                            </tr>
                        </table>  
                    </div> 
                        <?php                                              
                     } }
                        mysqli_free_result($Recorset_5); // Liberamos los registros
                       // mysqli_close($conexion); // Cerramos la conexion con la base de datos
                     ?>
                </div>
            </div>
            </div> 
        </form>  
      </div> 

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  --><!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
           
            <div id="Perfil_2">
                <input class="Perfil_2a" readonly="readonly" type="text" name="perfilDoctor" value="Perfil profesional">
                <?php
                            $Consulta_6="SELECT * FROM perfil_doctor WHERE ID_Doctor = '$Llave' ";
                            $Recordset_6= mysqli_query($conexion,$Consulta_6);
                            while($PerfilDoctor= mysqli_fetch_array($Recordset_6)){
                        ?>

                        <textarea class="A_09" readonly="readonly" id="PerfilProfesional"><?php echo $PerfilDoctor['Perfil'];?></textarea>
                        <?php
                    } ?>
            </div>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  --><!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

            <div id="Perfil_3">
                 <input class="Perfil_2a" readonly="readonly" type="text" name="servicioDoctor" value="Servicios profesionales">
                        <ul>  
                            <?php
                                $Consulta_6="SELECT * FROM perfil_doctor WHERE ID_Doctor = '$Llave' ";
                                $Recordset_6= mysqli_query($conexion,$Consulta_6);
                                while($PerfilDoctor= mysqli_fetch_array($Recordset_6)){
                            
                            if(!empty($PerfilDoctor['servicio_1'])){
                            ?>
                                <li class="A_08"  type="text" name="servicioUno"><?php echo $PerfilDoctor['servicio_1'];?></li>
                            <?php } 

                            if(!empty($PerfilDoctor['servicio_2'])){
                            ?>
                                <li class="A_08"  type="text" name="servicioUno"><?php echo $PerfilDoctor['servicio_2'];?></li>
                            <?php } 

                            if(!empty($PerfilDoctor['servicio_3'])){
                            ?>
                                <li class="A_08"  type="text" name="servicioUno"><?php echo $PerfilDoctor['servicio_3'];?></li>
                            <?php } 

                            if(!empty($PerfilDoctor['servicio_4'])){
                            ?>
                                <li class="A_08"  type="text" name="servicioUno"><?php echo $PerfilDoctor['servicio_4'];?></li>
                            <?php } 

                            if(!empty($PerfilDoctor['servicio_5'])){
                            ?>
                                <li class="A_08"  type="text" name="servicioUno"><?php echo $PerfilDoctor['servicio_5'];?></li>
                            <?php } 

                            if(!empty($PerfilDoctor['servicio_6'])){
                            ?>
                                <li class="A_08"  type="text" name="servicioUno"><?php echo $PerfilDoctor['servicio_6'];?></li>
                            <?php }  ?>
                        </ul>
                <?php } ?>       
            </div> 
       
        <footer>   
            <?php
                include("../header/footer.php");
            ?>
        </footer>    
        
</body>
</html>