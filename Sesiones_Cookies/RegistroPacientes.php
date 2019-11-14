<?php   
    session_start();  //Se reaunada la sesion abierta en validarSesion.php
    $verifica = 1906;  
    $_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica
?> 

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Registro Pacientes</title>
		<meta charset="utf-8"/>
		<meta name="description" content="listado de pacientes por medico y formulario de registro de pacientes"/>
		<meta name="keywords" content="pacientes, registro"/>
		<meta name="author" content="Pablo Cabeza"/>
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="../Javascript/validar_Campos.js"></script> 
        <script src="../Javascript/Funciones_varias.js"></script> 
        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="../Javascript/ajaxBuscador.js"></script>
        

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');

            table a:link {color: blue;}
            table a:visited {color: blue;}
            table a:active {color: blue;}
            td {width: 100px;}
            tr:hover{background-color:#BEBFDD; }/*Cambio de color por cada registro de la tabla*/
            table{border-collapse: collapse}


        </style>         
        <?php
            if(!isset($_SESSION["UsuarioDoct"])){//sino hay nada almacenado en la variable superglobal $_SESSION devuelve a 
                header("location:../DoctorAfiliado.php");           
           }

            $sesion=$_SESSION["UsuarioDoct"];//aqui se tiene almacenado el ID_Doctor en una variable superglobal
            include("../conexion/Conexion_BD.php");
            mysqli_query($conexion,"SET NAMES 'utf8'");
?>
    </head>	    
    <body>
    <div>
        <header class="fixed_1" >
            <div style="width: 75%; float: left; border-right-color: white; border-right-style: solid;border-right-width: 1px; box-sizing: border-box;">
                <h1 style="cursor: default; font-size: 3vw; height: 60%; padding: 1% 0%; box-sizing: border-box; text-align: center; padding-left: 2%">ConsultaMedica.com.ve</h1>
            </div>
            <div style="float: right;  width: 25%;">
                <?php
                    //Consulta para para colocar el nombre y apellido del Dr que abre sesión
                    $consulta_1="SELECT nombre_doctor, apellido_doctor, sexo FROM doctores WHERE ID_Doctor= '$sesion' ";
                    $Recordset_1=mysqli_query($conexion,$consulta_1);
                    $Doctor_Datos= mysqli_fetch_array($Recordset_1);
                        if($Doctor_Datos["sexo"] == "F"){//femenino
                    ?>
                            <input class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="Dra. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                            <?php } 
                                else if($Doctor_Datos["sexo"] == "M"){//Masculino 
                                ?>  
                                    <input class="usuarioDoctor" readonly="readonly" type="text" required name="NombreDoctor" value="Dr. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                    <?php }
                                else if($Doctor_Datos["sexo"] == ""){//No especificó
                                ?>
                                <input  class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="<?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                    <?php } 
                    ?>
            </div>
            <nav class="n41">
                <div class="n44"><a href="CerrarSesion.php">Cerrar Sesión</a></div>
                <div class="n44"><a href="InicioSesion.php" >Consulta</a></div>
                <div class="n44"><a href="RegistroPacientes.php" class="activa"> Mis pacientes</a></div>
                <div class="n44"><a href="ReporteMensual.php">Morbilidad</a></div>   
                <div class="n44"><a href="HistoriasClinicas_2.php">HCD</a></div>   
                <div class="n44"><a href="mostrarPerfilDoctor.php">Mi perfil</a></div>           
            </nav>
        </header>

        <section style="margin-top: 10%; background-color:">
            <!--<h3 style="margin-bottom: 2.5%;">Pacientes Registrados</h3>-->
            <div id="sesion_3" style="background-color: ">        
                <p style="text-align: center; margin-bottom: 3%;" class="Inicio_1">Mis Pacientes</p>
                <a class="cargaPaciente" href="cargarPaciente.php">Cargar Nuevo Paciente</a>
                <div id="carga">
                    <?php
                        $Consulta_2="SELECT ID_PR,nombre_pacient, apellido_pacient, cedula_pacient FROM pacientes_registrados WHERE ID_Doctor='$sesion' ORDER BY nombre_pacient ";
                        $Recordset_2=mysqli_query($conexion,$Consulta_2);      
                        while($paciente= mysqli_fetch_array($Recordset_2)){
                    ?>
                        <table border-collapse: collapse>
                           <tr>
                                <td><?php echo $paciente["nombre_pacient"];?></td>
                                <td><?php echo $paciente["apellido_pacient"];?></td>
                                <td><?php echo $paciente["cedula_pacient"];?></td>
                                <td width="50px"></td>
                                <td><?php echo '<a class="paciente" href="HistoriasClinicas.php?cedula_pacient='.$paciente['cedula_pacient'].'">Ver</a>';?> 
                                </td>
                                <td><?php echo '<a class="paciente" href="EliminarPaciente.php?ID_Pacient='.$paciente['ID_PR'].'" onclick="return Confirmacion()">Eliminar</a>';?></td><!-- se envia al archivo php que elimina el paciente de la BD, pero antes aparece una ventana javascript en un alert que detiene la accion hasta tanto no se confirma; la funcion Confirmacion() se encuentra en Funciones_varias.js-->

                                <td><?php echo '<a class="paciente" href="actualizarDatos.php?cedulaPaciente='.$paciente['cedula_pacient'].'">Actualizar</a>';?> </td>
                            </tr>
                            <tr>
                                <td><?php echo "<br>";?></td>
                            </tr>
                        </table>
                    <?php }  ?> 
                </div>        
            </div>

            <div style="background-color: ; width: 50%; float: right; box-sizing: border-box; ">      
            <p style="text-align: center; margin-bottom: 3%;" class="Inicio_1">Buscador</p>
                <p style="background-color:;margin-bottom: 3%;  text-align: center;">Seleccione un patron para realizar la busqueda</p>

                <div style="  margin-bottom: 5%; padding-right: 0%; background-color: ">
                    <form>
                        <fieldset style="background-color: ; border-radius: 15px; width: 55%; margin: auto; padding: 2% 1%;">
                            <label style="width: 31%; float: left;  background-color: ; ">Cedula</label>
                            <input style="margin-bottom: 1.5%; width: 49%;" type="text" id="Cedula" >
                            <input style="background-color: ; width: 16%;" type="button" value="Buscar" onclick="llamar_Cedula()"><!--llamar_Cedula esta en ajaxBuscador.js-->

                            <label style="width: 31%; float: left;  background-color: ; ">Nº de registro</label>
                            <input style="margin-bottom: 1.5%; width: 49%;" type="text" id="" >
                            <input style="background-color: ; width: 16%;" type="button" value="Buscar" onclick="llamar_Historia()">
                            <hr style=" background-color: #040652; margin-bottom: 5%; margin-top: 1%; height: 1px;"><!--llamar_Historia no se encuentra definida-->
                            
                            <label style="width: 25%; float: left; margin-left: 9%; background-color:; ">Nombre</label>
                            <input style="background-color:; margin-bottom: 1.5%;" type="text" onkeyup="llamar_Nombre(this.value)"><!--llamar_Nombre esta en ajaxBuscador.js-->
                            <br>
                            <label style="width: 25%; float: left;  margin-left: 9%; background-color:; ">Apellido</label>
                            <input style="margin-bottom: 1.5%;" type="text"  onkeyup="llamar_Apellido(this.value)"><br><!--llamar_Apellido esta en ajaxBuscador.js-->                             
                        </fieldset> 
                         
                    </form>
                        <input type="text" id="Especialista" hidden value="<?php echo $sesion; ?>">

                        <div style="background-color:;margin: auto; width: 50%; margin-top: 1%;  display: flex; justify-content: center; ">
                            <a class="buttonCuatro" style="margin: auto; display: block;" href="javascript:history.go(0)">Limpiar</a>
                        </div>
                        
                </div>              
            </div>
        </section>
    </div>     
    <footer style="margin-top:20%;position: relative;  ">
        <nav class="n41">
            <div class="n44"><a href="CerrarSesion.php">Cerrar Sesión</a></div>
            <div class="n44"><a href="InicioSesion.php">Consulta</a></div>
            <div class="n44"><a href="RegistroPacientes.php" class="activa"> Mis pacientes</a></div>
            <div class="n44"><a href="ReporteMensual.php">Reporte</a></div>  
            <div class="n44"><a href="HistoriasClinicas_2.php">HCD</a></div>          
        </nav>
        <div style="background-color: ; bottom: 0pt; position: absolute; width: 100%;">
                <p class="p_2">Sitio web desarrollado por Pablo Cabeza, San Felipe_Yaracuy_Venezuela_(+58) 0424-516.59.38</p>
            </div>
        </footer>
</body>
</html>


    <script src="../Javascript/ajaxBuscador.js"></script><!-- si el script se coloca en el head no funciona-->
  
