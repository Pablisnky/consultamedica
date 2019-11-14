	<?php
    //Muestra el Perfil del Dr. en la sección de usuarios afiliados una vez que el propio Dr. lo ha editado.
        session_start();//se inicia una sesion

        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
        
        include("../conexion/Conexion_BD.php");
        mysqli_query($conexion, "SET NAMES 'utf8'");//es importante esta linea para que los caracteres especiales funcionen, tanto graficamente como logicamente

        $sesion=$_SESSION["UsuarioDoct"];//aqui se tiene almacenado el ID_Doctor en $sesion
        //echo $sesion;
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

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower');
        </style> 
    </head>
    <body>
    <div class="Principal">
        <header>
            <div style=" background-color: ;">
                    <div style=" background-color: ; width: 75%; float: left; border-right-color: white; border-right-style: solid;border-right-width: 1px; box-sizing: border-box;">
                        <h1 style="cursor: default; font-size: 3vw; height: 60%; padding: 1% 0%;  text-align: center; padding-left: 2%">ConsultaMedica.com.ve</h1>
                    </div>
                    <div style="background-color: red; float: right; box-sizing: border-box;  width: 25%;">
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
                </div>
                <nav class="n41">
                    <div class="n44"><a href="CerrarSesion.php">Cerrar Sesión</a></div>
                    <div class="n44"><a href="InicioSesion.php">Consulta</a></div>
                    <div class="n44"><a href="RegistroPacientes.php"> Mis pacientes</a></div>
                    <div class="n44"><a href="ReporteMensual.php">Morbilidad</a></div>   
                    <div class="n44"><a href="HistoriasClinicas_2.php">HCD</a></div> 
                    <div class="n44"><a href="mostrarPerfilDoctor.php" class="activa">Mi perfil</a></div>             
                </nav>
        </header>     
            
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    
        <form name="consulta">
            <div style=" background-color:; width: 100%; border-bottom: solid; border-width: 1px;">
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

            <div id="Perfil_00" style="background-color:;  margin: auto;"> 
                <div id="Perfil_1" style="background-color: ; display: inline-block; margin-top: 13%; ">
                    <div style="background-color: ; width: 80%; margin: auto;">
                       <img class="imagen" src="../images/<?php echo $Doctor_Datos['fotografia'];?>" >
                    </div>
                    <div id="Perfil_06" style="background-color: ; width: 48%; display: inline-block; margin-top: 7%;">
                            <?php echo '<a style="
                                padding:3.8% 9%; color:rgba(194, 245, 19,1);" name="boton_PerfilDoctor" href="MiPerfil.php">Editar</a>';
                            ?>  
                    </div> 
                </div> 
    <!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
                <div id="Perfil_01" style="background-color: ; margin-top: 4%;"><!--HTML sin cortar el codigo PHP, otra manera de combinar ambos codigos-->
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
    <!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
                <div id="Perfil_01"><!--HTML sin cortar el codigo PHP, otra manera de combinar ambos codigos-->
                    <?php
                    $Consulta_3="SELECT telefono_consultorio, telefono_movil FROM doctores WHERE ID_Doctor= '$sesion' ";
                    $Recordset_3=mysqli_query($conexion,$Consulta_3);
                    while($Telefono=mysqli_fetch_array($Recordset_3)){
                    ?>
                        <p class="Inicio_2">Teléfonos:</p>
                        <label class="A_05">Celular:</label>
                        <input class="A_05" type="text" name="estado" readonly="readonly" value="<?php echo $Telefono['telefono_consultorio'];?>"><br>
                        <label class="A_05">Consultorio:</label>
                        <input class="A_05" type="text" name="estado" readonly="readonly" value="<?php echo $Telefono['telefono_movil'];?>">
                   <?php } 
                   mysqli_free_result($Recordset_3); // Liberamos los registros        
                    ?>
                </div>
    <!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////--> 
                <div id="Perfil_01">
                        <?php
                        $Consulta_4="SELECT precio_consulta, sexo FROM doctores WHERE ID_Doctor= '$sesion' ";
                        $Recordset_4=mysqli_query($conexion,$Consulta_4);
                        while($PrecioConsulta= mysqli_fetch_array($Recordset_4)){
                        ?>     
                            <p class="Inicio_2">Costo de la consulta</p>
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
    <!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
                <div id="Perfil_01">
                        <?php
                            $Consulta_5="SELECT clinica, direccion, consultorio FROM direcciones WHERE ID_Doctor ='$sesion'";
                            $Recordset_5= mysqli_query($conexion,$Consulta_5);      
                        ?>   
                    <p class="Inicio_2">Dirección</p>
                        <?php 
                        while($DirConsulta= mysqli_fetch_array($Recordset_5)){
                        ?> 
                        <textarea class="A_07" readonly="readonly"><?php echo $DirConsulta['clinica'];?></textarea>
                        <textarea class="A_08" readonly="readonly"><?php echo $DirConsulta['direccion'];?></textarea> 
                     
                        <!--<input type="text" hidden name="clinica" readonly="readonly" value="<?php echo $DirConsulta['clinica'];?>">-->
                        
                        <input class="A_06"  type="text" name="consultorio" readonly="readonly" value="<?php echo "Consultorio " .  $DirConsulta['consultorio'];?>">     
                        <?php } 
                        mysqli_free_result($Recordset_5); // Liberamos los registros
                        ?>
                </div>
    <!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
                <div id="Perfil_04" style="background-color: "> 
                    <?php
                        $Consulta_6="SELECT * FROM horarios WHERE ID_Doctor = '$sesion' ";
                        $Recordset_6= mysqli_query($conexion,$Consulta_6);
                    ?>
                    <p class="Inicio_2">Horario de consulta</p>
                    <?php
                        while($horario= mysqli_fetch_array($Recordset_6)){ 
                    ?>                    
                    <table name="horario_mañana">
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
                    <table>
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
                    <br>
                    <table name="horario_tarde" >
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
                    <table>
                        <tr>
                            <td>
                                <?php 
                                    $longitud = count($horario);
                                    for ($i=12; $i<18; $i++){
                                    echo  $horario["$i"] . "&nbsp";
                                }?>
                            </td>
                        <tr>
                    </table>   
                    <br>  
                  
                        <?php                                              
                     } 
                        mysqli_free_result($Recordset_6); // Liberamos los registros
                       // mysqli_close($conexion); // Cerramos la conexion con la base de datos
                     ?>
                </div>
                <div id="logo">
                    <!--<img src="../images/logo.png">-->
                </div>

            </div> 
        </form>  
        <hr id="lineaPerfil">  
    
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
            <div id="Perfil_2" style="background-color:;">
                <input class="Perfil_2a" readonly="readonly" type="text" name="NombreDoctor" value="Perfil profesional">
                <?php
                            $Consulta_6="SELECT * FROM perfil_doctor WHERE ID_Doctor = '$sesion' ";
                            $Recordset_6= mysqli_query($conexion,$Consulta_6);
                            while($PerfilDoctor= mysqli_fetch_array($Recordset_6)){
                        ?>

                        <textarea class="A_09" ><?php echo $PerfilDoctor['Perfil'];?></textarea>

                        <input class="Perfil_2a" readonly="readonly" type="text" name="NombreDoctor" value="Servicios profesionales">
                        <ul>  
                            <?php
                            if(!empty($PerfilDoctor['servicio_1'])){
                            ?>
                                <li class="A_06"  type="text" name="servicioUno"><?php echo $PerfilDoctor['servicio_1'];?></li>
                            <?php } 

                            if(!empty($PerfilDoctor['servicio_2'])){
                            ?>
                                <li class="A_06"  type="text" name="servicioUno"><?php echo $PerfilDoctor['servicio_2'];?></li>
                            <?php } 

                            if(!empty($PerfilDoctor['servicio_3'])){
                            ?>
                                <li class="A_06"  type="text" name="servicioUno"><?php echo $PerfilDoctor['servicio_3'];?></li>
                            <?php } 

                            if(!empty($PerfilDoctor['servicio_4'])){
                            ?>
                                <li class="A_06"  type="text" name="servicioUno"><?php echo $PerfilDoctor['servicio_4'];?></li>
                            <?php } 

                            if(!empty($PerfilDoctor['servicio_5'])){
                            ?>
                                <li class="A_06"  type="text" name="servicioUno"><?php echo $PerfilDoctor['servicio_5'];?></li>
                            <?php } 

                            if(!empty($PerfilDoctor['servicio_6'])){
                            ?>
                                <li class="A_06"  type="text" name="servicioUno"><?php echo $PerfilDoctor['servicio_6'];?></li>
                            <?php }  ?>
                        </ul>
                <?php } ?>       
            </div> 
       
        <footer style=" background-color:#BEBFDD; height: 100px; position: relative;  margin-top: 40%; ">
                <div style="background-color: ; bottom: 5%; position: absolute; width: 100%;">
                    <p class="p_2">Sitio web desarrollado por Pablo Cabeza, San Felipe_Yaracuy_Venezuela (+58) 0424-516.59.38</p>
                </div> 
        </footer>    
        
</body>
</html>