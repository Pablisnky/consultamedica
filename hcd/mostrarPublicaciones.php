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
		<title>Publicaciones</title>
		<meta charset="utf-8"/>
		<meta name="description" content="perfil de doctor, direccion de consultorio, horario de consulta, telefono, directorio medico"/>
		<meta name="keywords" content="consulta, horario, perfil doctor"/>
		<meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_CitasMedicas.css"/>
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png"> 

        <script src="../Javascript/Funciones_varias.js"></script> 

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower');
        </style> 
    </head>
    <body>
        <header>
            <?php
                include("../header/headerDoctor.php")
            ?>
        </header>
    
        <div  class="encabezado_03" style="margin-top: 2%;">
            <?php 
            $consulta_1="SELECT ID_Doctor,nombre_doctor,apellido_doctor, especialidad,sexo, fotografia FROM doctores INNER JOIN especialidades ON doctores.ID_Especialidad=especialidades.ID_Especialidad WHERE ID_Doctor= '$sesion' ";
            $Recordset_1=mysqli_query($conexion,$consulta_1);
            $Doctor_Datos= mysqli_fetch_array($Recordset_1);

            if($Doctor_Datos["sexo"] == "F"){//Femenino  ?>
                <input class="A_03" readonly="readonly" type="text" name="NombreDoctor" value="Dra. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">  <?php
            } 
            else if($Doctor_Datos["sexo"] == "M"){ //Masculino  ?>
                <input  class="A_03" readonly="readonly" type="text" name="NombreDoctor" value="Dr. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">  <?php
            } 
            else if($Doctor_Datos["sexo"] == ""){ //No especificó  ?>
                <input  class="A_03" readonly="readonly" type="text" name="NombreDoctor" value="<?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">  <?php
            } ?>

            <input class="A_04" readonly="readonly" type="text" name="especialidad"  value="<?php echo $Doctor_Datos['especialidad'];?>">
            <input  type="text" hidden name="CodigoDoctor" value="<?php echo $Doctor_Datos['ID_Doctor'];?>">
            
            <?php 
            mysqli_free_result($Recordset_1);// Liberamos los registros  
            ?>
        </div>
            
        <div id="Perfil_00" style="margin: auto; width: 30%;"> 
            <div id="Perfil_1" style="background-color: ; width: 100%; display: block; float:left; margin-top: 13%; ">
                <div style="background-color: ; width: 80%; margin: auto;">
                   <img class="imagen" src="../images/<?php echo $Doctor_Datos['fotografia'];?>" >
                </div>
                <div style="background-color: ; width: 70%; margin: auto;">
                    <div id="Perfil_06" style="background-color: ; width: 48%; display: inline-block; margin-top: 7%;">
                        <a style="padding:3.5% 25%; color:rgba(194, 245, 19,1);" name="boton_PerfilDoctor" href="mostrarPerfilDoctor.php">Ver Perfil</a>
                    </div> 
                    <div id="Perfil_06" style="background-color: ; width: 48%; display: inline-block; margin-top: 7%;">
                        <a style="padding:3.8% 9%; color:rgba(194, 245, 19,1);" name="boton_SubirArchivo" href="subirPublicaciones.php">Cargar archivos</a>
                    </div> 
                </div>
            </div> 
        </div>

        <div style="float: right; width: 70%; margin:5% auto;">
            <h3 style="margin-bottom: 0%;">Publicaciones</h3>
            <div style="background-color: ; display: flex; justify-content:center; padding: 1% 2%;">    
                <?php
                $Consulta_2= "SELECT * FROM publicacionesdoctor WHERE ID_Doctor= '$sesion' ";
                $Recordset_2=mysqli_query($conexion,$Consulta_2);
                while($Publicaciones= mysqli_fetch_array($Recordset_2)){
                    $NombreArchivo= $Publicaciones['NombrePublicacion'];
                    $ID_Publicacion= $Publicaciones["ID_Publicacion"];
                    $Descripcion =$Publicaciones['DescripcionPublicacion'];

                    //echo $Publicaciones["ID_Publicacion"] . "<br>";
                    //echo $Publicaciones['ID_Doctor'] . "<br>";
                    //echo '<a href="guardaPDF.php">' .  $contenido , '</a>' . "<br>";
                    //echo $Publicaciones['tipoPublicacion'] . "<br>";        
                    ?> 
                    <div style="background-color: ;position: relative; border-style: solid; border-width: 1px; box-sizing: border-box; height: 200px; width: 200px; text-align: center; margin: 1% 2%;">
                        <p>Publicación.</p>
                        <a href="guardaPDF.php?ID_Doctor=<?php echo $sesion?>&ID_Publicacion=<?php echo $ID_Publicacion?>"><?php echo $Descripcion ?></a>                        
                            
                        <div id="Perfil_06" style="background-color:; bottom: 5%;  position: absolute; width: 100%; display: block;">
                            <a style="color:rgba(194, 245, 19,1);" name="boton_SubirArchivo" href="eliminarPublicación.php?ID_Publicacion=<?php echo $ID_Publicacion?>" onclick="return Confirmacion_2()">Eliminar</a>           
                        </div>
                    </div>  <?php           
                } ?>
            </div>
        </div>

        <footer style="clear: left; margin-top: 35%;">
            <?php
                include("../header/footer.php");
            ?>
        </footer>    
    </body>
</html>