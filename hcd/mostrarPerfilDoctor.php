<?php
    // Se verifica si se realizó login para entrar en este  archivo
    include("../Clases/VerificaDr.php");
    //Se conecta a la base de datos
    include("../conexion/Conexion_BD.php");
    include("../Clases/muestraError.php");

    // se busca que tipo de plan tienen el Dr.
    $Consulta= "SELECT * FROM doctores INNER JOIN usuario_doctor ON doctores.ID_Doctor=usuario_doctor.ID_Doctor WHERE doctores.ID_Doctor='$sesion'";
    $Recordset= mysqli_query($conexion,$Consulta);
    $DatosDoctor= mysqli_fetch_array($Recordset);
    $PlanAfiliado= $DatosDoctor["planAfiliado"]; //se obtiene el plan afiliado del doctor.
    // echo "EL plan del Dr es: " . $PlanAfiliado . "<br>";

    switch($PlanAfiliado){
        case 'Ini':
            $Plan= "Ini";
        break;
        case 'Bas':
            $Plan= "Bas";
        break;
        case 'Esp':
            $Plan= "Esp";
        break;
    }
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
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_CitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" href="../css/iconos_2/telefonos_correo.css"/><!--galeria de icomoon.io-->
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'> 
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script type="text/javascript">
            //Ajuste el texto del texarea donde va el nombre de la clinica del consultorio
            function resize_1(){
                var text = document.getElementById('CentroMedico');
                    text.style.height = 'auto';
                    text.style.height = text.scrollHeight+'px';
            }

            //Ajuste el texto del texarea donde va el perfil profesional del dr.
            function resize_2(){
                var text = document.getElementById('PerfilProfesional_1');
                    text.style.height = 'auto';
                    text.style.height = text.scrollHeight+'px';
            }
        </script>
    </head>
    <body onload="resize_1(); resize_2()">
        <header>
            <?php
                include("../header/headerDoctor.php")
            ?>
        </header>
            
            
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
           
            <div  class="encabezado_03" style=" background-color:;  margin-top: 2%;">
                <?php 
                $consulta_1="SELECT ID_Doctor,nombre_doctor,apellido_doctor, especialidad,sexo, fotografia FROM doctores INNER JOIN especialidades ON doctores.ID_Especialidad=especialidades.ID_Especialidad WHERE ID_Doctor= '$sesion' ";
                $Recordset_1=mysqli_query($conexion,$consulta_1);
                $Doctor_Datos= mysqli_fetch_array($Recordset_1);

                if($Doctor_Datos["sexo"] == "F"){//Femenino
                    ?>
                    <input class="A_03" readonly="readonly" type="text" name="NombreDoctor" value="Dra. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                    <?php } 
                else if($Doctor_Datos["sexo"] == "M"){ //Masculino
                    ?>  
                    <input  class="A_03" readonly="readonly" type="text" name="NombreDoctor" value="Dr. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                <?php } 
                else if($Doctor_Datos["sexo"] == ""){ //No especificó
                    ?>  
                    <input  class="A_03" readonly="readonly" type="text" name="NombreDoctor" value="<?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                <?php } ?>

                    <input class="A_04" readonly="readonly" type="text" name="especialidad"  value="<?php echo $Doctor_Datos['especialidad'];?>">
                    
                    <input  type="text" hidden name="CodigoDoctor" value="<?php echo $Doctor_Datos['ID_Doctor'];?>">
                <?php 
                mysqli_free_result($Recordset_1);// Liberamos los registros  
                ?>
            </div>
            
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- Fotografía -->
        
            <div id="Perfil_00_A"> 
                <div id="Perfil_1">
                    <div  class="imagen_Div">
                       <img class="imagen" src="../images/<?php echo $Doctor_Datos['fotografia'];?>" >
                    </div>
                    <div  id="Perfil_05">
                        <div id="Perfil_06">
                            <a style="padding:3.8% 9%; color:rgba(194, 245, 19,1);" name="boton_PerfilDoctor" href="MiPerfil.php">Editar Perfil</a>
                        </div> 
                        <?php
                            if($Plan == "Ini"){
                                $Enviar_1="Promo.php";
                            }
                            else if($Plan == "Bas"){
                                $Enviar_1 ="mostrarPublicaciones.php";
                            }
                            else if($Plan == "Esp")
                                $Enviar_1 ="HistoriasClinicas.php?cedula_pacient=$CedulaRegistrados";                       
                            ?>
                        <div id="Perfil_06" style="margin-top: 10%;">
                            <a style="padding:3.8% 9%; color:rgba(194, 245, 19,1);" name="boton_SubirArchivo" href="<?php echo $Enviar_1;?>">Publicaciones</a>
                        </div> 
                    </div>
                </div> 
            </div>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- Ubicación -->

            <div class="contenedor_03_A" style="background-color: ">  
                <div id="Perfil_01"><!--HTML sin cortar el codigo PHP, otra manera de combinar ambos codigos-->
                    
                    <?php
                    $Consulta_2="SELECT ID_Doctor,estado,ciudad FROM doctores WHERE ID_Doctor= '$sesion' ";
                    $Recordset_2=mysqli_query($conexion,$Consulta_2);
                    while($Ubicacion=mysqli_fetch_array($Recordset_2)){
                        //la unica razon por la que se toma el ID_Doctor de esta consulta es para enviarlo a 
                        $_SESSION["ID_Doctor"]= $Ubicacion[0];
                    ?>
                        <p class="Inicio_2">Ubicación</p>
                        <input class="A_05" type="text" name="estado" readonly="readonly" value="<?php echo $Ubicacion['estado'];?>">
                        <input class="A_05" type="text" name="ciudad" readonly="readonly" value="<?php echo $Ubicacion['ciudad'];?>">
                   <?php } 
                   mysqli_free_result($Recordset_2); // Liberamos los registros        
                    ?>
                </div>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- Contactos -->

                <div id="Perfil_01"><!--HTML sin cortar el codigo PHP, otra manera de combinar ambos codigos-->
                    <p class="Inicio_2">Contacto</p>
                    <?php
                    $Consulta_3="SELECT telefono_consultorio, telefono_movil, correo FROM doctores WHERE ID_Doctor= '$sesion' ";
                    $Recordset_3=mysqli_query($conexion,$Consulta_3);
                    while($Telefono=mysqli_fetch_array($Recordset_3)){
                    ?>
                    <div class="telefonos_03">
                        <div class="telefono_03A">
                                <span class="icon-phone A_05A" title="Teléfono Consultorio"></span>
                            <input class="A_05" type="text" name="telefono_movil" readonly="readonly" value="<?php echo $Telefono['telefono_consultorio'];?>"><br>
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
                   mysqli_free_result($Recordset_3); // Liberamos los registros        
                    ?>
                </div>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->


                <div id="Perfil_01B">
                        <p class="Inicio_2">Costo de la consulta</p>
                        <?php
                        $Consulta_4="SELECT precio_consulta, sexo FROM doctores WHERE ID_Doctor= '$sesion' ";
                        $Recordset_4=mysqli_query($conexion,$Consulta_4);
                        while($PrecioConsulta= mysqli_fetch_array($Recordset_4)){
                        ?>     
                        
                        <?php
                            if($PrecioConsulta['precio_consulta'] ==""){
                                if($PrecioConsulta['sexo'] == "F"){
                        ?>
                                    <input class="A_05"  type="text" name="precio" readonly="readonly" value="<?php echo 'Consultar precio con la Dra.'; ?>"> 
                                <?php 
                                }
                                else if($PrecioConsulta['sexo'] == "M"){
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
                         mysqli_free_result($Recordset_4); // Liberamos los registros
                        ?>
                </div>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->



                 <div id="Perfil_01A">
                        <?php
                            $Consulta_4="SELECT clinica, direccion, consultorio FROM direcciones WHERE ID_Doctor ='$sesion'";
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

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

                <div id="Perfil_08">
                    <p class="Inicio_2">Dirección</p>
                        <?php
                            $Consulta_5="SELECT clinica, direccion, consultorio FROM direcciones WHERE ID_Doctor ='$sesion'";
                            $Recordset_5= mysqli_query($conexion,$Consulta_5);       
                            while($DirConsulta= mysqli_fetch_array($Recordset_5)){
                        ?> 
                            <textarea class="A_06" readonly="readonly"><?php echo $DirConsulta['direccion'];?></textarea> 
                        <?php } 
                        mysqli_free_result($Recordset_5); // Liberamos los registros
                        ?>
                </div>


<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

                <div id="Perfil_04"> 
                    <p class="Inicio_2">Horario de consulta</p>
                    <?php
                        $Consulta_6="SELECT * FROM horarios WHERE ID_Doctor = '$sesion' ";
                        $Recordset_6= mysqli_query($conexion,$Consulta_6);
                        while($horario= mysqli_fetch_array($Recordset_6)){ 
                            if(!empty($horario["inicio_mañana"])){
                    ?>                    
                    <table style="margin: auto;" name="horario_mañana">
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
                    <table style="margin: auto;" name="horario_tarde" >
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
                    <?php } 
                  
                                                                    
                     } 
                        mysqli_free_result($Recordset_6); // Liberamos los registros
                       // mysqli_close($conexion); // Cerramos la conexion con la base de datos
                     ?>
                </div>
                <div id="logo">
                    <!--<img src="../images/logo.png">-->
                </div>

            </div> 
    </div>
    
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
      
            <div id="Perfil_2" style="">
                <input class="Perfil_2a" readonly="readonly" type="text" name="perfilDoctor" value="Perfil profesional">
                        <?php
                            $Consulta_6="SELECT * FROM perfil_doctor WHERE ID_Doctor = '$sesion' ";
                            $Recordset_6= mysqli_query($conexion,$Consulta_6);
                            while($PerfilDoctor= mysqli_fetch_array($Recordset_6)){
                        ?>
                <textarea class="A_09" id="PerfilProfesional_1" ><?php echo $PerfilDoctor['Perfil'];?></textarea>
            </div>

            <div id="Perfil_3">
                <input class="Perfil_2a" readonly="readonly" type="text" name="NombreDoctor" value="Servicios profesionales">
                        <ul>  
                            <?php
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
                            <?php } 

                            if(!empty($PerfilDoctor['servicio_7'])){
                            ?>
                                <li class="A_08"  type="text" name="servicioUno"><?php echo $PerfilDoctor['servicio_7'];?></li>
                            <?php }  

                            if(!empty($PerfilDoctor['servicio_8'])){
                            ?>
                                <li class="A_08"  type="text" name="servicioUno"><?php echo $PerfilDoctor['servicio_8'];?></li>
                            <?php }  

                            if(!empty($PerfilDoctor['servicio_9'])){
                            ?>
                                <li class="A_08"  type="text" name="servicioUno"><?php echo $PerfilDoctor['servicio_9'];?></li>
                            <?php }  

                            if(!empty($PerfilDoctor['servicio_10'])){
                            ?>
                                <li class="A_08"  type="text" name="servicioUno"><?php echo $PerfilDoctor['servicio_10'];?></li>
                            <?php } 
                            ?> 

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