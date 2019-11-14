	<?php
    //Muestra las publicaiones del Dr. 
        session_start();//se inicia una sesion

        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
        
        include("../conexion/Conexion_BD.php");

        $ID_Doctor= $_GET["CodigoDoctor"];//Se recibe desde 03.php
        //echo "ID_Doctor= " . $ID_Doctor . "<br>";
    ?>
   <!DOCTYPE html>
    <html lang="es">
    <head>
        <title>Publicaciones</title>
        <meta charset="utf-8"/>
        <meta name="description" content="perfil de doctor, direccion de consultorio, horario de consulta, telefono, directorio medico"/>
        <meta name="keywords" content="consulta, horario, perfil doctor"/>
        <meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_CitasMedicas.css"/> 

        <script src="../Javascript/Funciones_varias.js"></script> 

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower');
        </style> 
    </head>
    <body>
        <header>
            <a href="../index.html"><h1>ConsultaMedica.com.ve</h1></a> 
            <input type="checkbox" id="MenuRes">
                <label for="" id="ComandoMenu" class="comandoMenu" onclick="mostrarMenu()">Menu</label>
                <nav class="menuResponsive" id="MenuResponsive">
                <ul>
                    <li class="listaMostrar"><a href="../index.html">Inicio</a>
                    <li><a href="../Proposito.php">Propósito</a></li>
                    <li><a href="../Afiliacion.php">Planes</a></li>
                    <li class="listaOculta"><a href="../Beneficios.php">Beneficios</a></li>
                    <li><a href="../contactenos.php">Contacto</a></li>
                    <li class="listaOculta"><a href="../Citas_2.php">Pedir Cita</a></li>
                    <li><a href="../Cancelar.php">Cancelar Cita</a></li>
                    <li><a href="../directorio.php">Directorio</a></li>
                    <li><a href="../preguntas.php">FAQ</a></li>
                    <li><a href="../DoctorAfiliado.php">Afiliados</a></li>
                </ul>
             </nav>
        </header>     
            
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    
        <div class="Principal" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
            <div style=" background-color:; margin-bottom: -10%; margin-top: 1%; width: 100%; border-bottom: solid; border-width: 1px;">
                <?php 
                $consulta_1="SELECT ID_Doctor,nombre_doctor,apellido_doctor, especialidad,sexo, fotografia FROM doctores INNER JOIN especialidades ON doctores.ID_Especialidad=especialidades.ID_Especialidad WHERE ID_Doctor= '$ID_Doctor' ";
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

            <div id="Perfil_00" style="margin-bottom: 0%;">              
                <div id="Perfil_1">
                    <div class="imagen_Div">
                       <img class="imagen" src="../images/<?php echo $Doctor_Datos['fotografia'];?>">
                    </div>

                    <div id="Perfil_05" style="margin-top: 10%;">
                        <div id="Perfil_06">
                            <a class="btn_publicaciones" name="boton_PerfilDoctor" href="javascript:history.back()">Ver Perfil</a>
                        </div> 
                       <!--<div id="Perfil_07">
                            <a style="padding:3.8% 9%;" name="boton_SubirArchivo" href="subirPublicaciones_Basico.php">Pedir Cita</a> 
                        </div> -->
                    </div>
                </div>
            </div>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

                <div class="publicaciones_02">
                    <h3 style="margin-bottom: 0%;">Publicaciones</h3>
                        <div style="background-color: ; display: flex; justify-content:center; padding: 1% 2%;">    
                            <?php
                            $Consulta_2= "SELECT * FROM publicacionesdoctor WHERE ID_Doctor= '$ID_Doctor' ";
                            $Recordset_2=mysqli_query($conexion,$Consulta_2);
                            if(mysqli_num_rows($Recordset_2) > 0){
                                while($Publicaciones= mysqli_fetch_array($Recordset_2)){

                                    $NombreArchivo= $Publicaciones['NombrePublicacion'];
                                    $ID_Publicacion= $Publicaciones["ID_Publicacion"];
                                    $Descripcion =$Publicaciones['DescripcionPublicacion'];

                                    //echo $Publicaciones["ID_Publicacion"] . "<br>";
                                    //echo $Publicaciones['ID_Doctor'] . "<br>";
                                    //echo '<a href="guardaPDF.php">' .  $contenido , '</a>' . "<br>";
                                    //echo $Publicaciones['tipoPublicacion'] . "<br>";
                                
                            ?>
                            
                                <div style="background-color: ; border-style: solid; border-width: 1px; box-sizing: border-box; height: 100px; width: 90%; text-align: center; margin: 2.5% 2%;">
                                    
                                    <a  class=publicacion_01 href="../planBasico/guardaPDF.php?ID_Doctor=<?php echo $ID_Doctor?>&ID_Publicacion=<?php echo $ID_Publicacion?>"><?php echo $Descripcion ?></a>
                                </div>             
                                <?php
                                }
                            }
                            else{
                                echo "No hay publicaciones.";
                            }
                                 ?>
                    </div>
                
            </div>
        </div>
                       
   

              
    
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
            
       
        <footer style=" background-color:#BEBFDD; height: 100px; position: relative;  margin-top: 15%; ">
                <div style="background-color: ; bottom: 5%; position: absolute; width: 100%;">
                    <p class="p_2">Sitio web desarrollado por Pablo Cabeza, San Felipe_Yaracuy_Venezuela (+58) 0424-516.59.38</p>
                </div> 
        </footer>    
        
</body>
</html>