<?php   
    session_start();  //Se reaunada la sesion abierta en validarSesion.php
    /*$verifica = 1906;  
    $_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica*/

    //Muestra todos los errores, desactivarlo para funcionamiento en local y activarlo para remoto
    //error_reporting(0);


            if(!isset($_SESSION["UsuarioDoct"])){//sino hay nada almacenado en la variable superglobal $_SESSION devuelve a 
                header("location:../ingresar.php");           
           }
           else{
                $sesion=$_SESSION["UsuarioDoct"];//aqui se tiene almacenado el ID_Doctor en una variable superglobal
               // echo "ID_Doctor= " . $sesion;

                include("../conexion/Conexion_BD.php");
            }
?> 

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Registro Pacientes</title>
		<meta charset="utf-8"/>
		<meta name="description" content="listado de pacientes por medico y formulario de registro de pacientes"/>
		<meta name="keywords" content="pacientes, registro"/>
		<meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 750px)" href="../css/MediaQuery_CitasMedicas_TabletCanaima.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 1001px) and (max-width: 1300px)" href="../css/MediaQuery_CitasMedicas_1280px.css">
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="../Javascript/validar_Campos.js"></script> 
        <script src="../Javascript/Funciones_varias.js"></script> 
        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="../Javascript/ajaxBuscador.js"></script>
        

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');

            td {
                width: 100px;
            }
            tr:hover{/*Cambio de color por cada registro de la tabla*/
                background-color:#BEBFDD;
                }
            table{
                border-collapse: collapse;
            }
        </style>          
    </head>	    
    <body style="height: 83.5%">
        <div style="min-height: 85%;">
            <header class="fixed_1">
                <?php
                    include("../vista/headerDoctor.php")
                ?>
            </header>
            <div onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
                <h3 class="encabezadoSesion_1">Mis pacientes</h3>
                <div>     
                    <form>                              
                        <br class="ocultar">
                        <label class="etiqueta_21 ocultar_2">Nombre</label>
                        <input class="etiqueta_22 ocultar_2" type="text" onkeyup="llamar_Nombre(this.value)"><!--llamar_CitaNombre esta en ajaxBuscador.js-->
                        <label class="etiqueta_21 ocultar_2">Apellido</label>
                        <input class="etiqueta_22 ocultar_2" type="text" onkeyup="llamar_Apellido(this.value)"><!--llamar_Apellido esta en ajaxBuscador.js-->
                        <label class="etiqueta_21 alinear">Cedula</label>
                        <input class="etiqueta_22" type="text" id="Cedula">
                        <input class="etiqueta_29" type="button" value="Buscar" onclick="llamar_Cedula(this.value)"><!--llamar_Cedula esta en ajaxBuscador.js-->                 
                    </form>
                    <hr style=" background-color: #040652; margin-bottom: 3%; margin-top: 1%; height: 1px;">
                    <input type="text" id="Especialista" hidden value="<?php echo $sesion; ?>">               
                </div>

                <div id="sesion_3">        
                    <a class="cargaPaciente_0" onclick="mostrarInputCedula()">Cargar Nuevo Paciente</a><!--mostrarInputCedula() se encuentra al final del archivo-->
                    <div id="carga_2">
                        <?php
                            $Consulta_4="SELECT pacientes_registrados.ID_PR, nombre_pacient, apellido_pacient, cedula_pacient FROM pacientes_registrados INNER JOIN doctores_pacientesregistrados ON pacientes_registrados.ID_PR=doctores_pacientesregistrados.ID_PR WHERE ID_Doctor='$sesion' ORDER BY nombre_pacient ";
                                $Recordset_4=mysqli_query($conexion,$Consulta_4);      
                                while($paciente= mysqli_fetch_array($Recordset_4)){
                                    ?>
                                    <table class="tabla" border-collapse: collapse>
                                       <tr>
                                            <td class="tabla_2A"><?php echo '<a class="cargaPaciente" href="HistoriasClinicas_Basico.php?cedula_pacient='.$paciente['cedula_pacient'].'"> '. $paciente["nombre_pacient"] .' </a>'?></td>

                                            <td class="tabla_2A"><?php echo '<a class="cargaPaciente" href="HistoriasClinicas_Basico.php?cedula_pacient='.$paciente['cedula_pacient'].'"> '.  $paciente["apellido_pacient"] .' </a>'?></td>

                                            <td class="tabla_2B"><?php echo  '<a class="cargaPaciente" href="HistoriasClinicas_Basico.php?cedula_pacient='.$paciente['cedula_pacient'].'"> '.  $paciente["cedula_pacient"] .' </a>'?></td>
                                             
                                            <td class="ocultarCelda"><?php echo '<a class="paciente" href="EliminarPaciente_Basico.php?ID_Paciente='.$paciente['ID_PR'].'" onclick="return Confirmacion()">Eliminar</a>';?></td><!-- se envia al archivo php que elimina el paciente de la BD, pero antes aparece una ventana javascript en un alert que detiene la accion hasta tanto no se confirma; la funcion Confirmacion() se encuentra en Funciones_varias.js-->

                                            <td class="ocultarCelda"><?php echo '<a class="paciente" href="actualizarDatos_Basico.php?cedulaPaciente='.$paciente['cedula_pacient'].'">Actualizar</a>';?> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo "<br>";?></td>
                                        </tr>
                                    </table>
                                <?php 
                            }  ?> 
                    </div>        
                </div>                     
                    <div id="Carga_5">
                        <form action="cargarPaciente_Basico.php" method="POST" autocomplete="off"> 
                            <fieldset class="Afiliacion_4" style="background-color: #F4FCFB; border-radius: 15px;" >
                                <label class="etiqueta_34">Introduzca el número de cedula</label>
                                <br>
                                <input class="etiqueta_35" type="text" name="cedula"><!--llamar_VerificarCedula() esta en ajaxBuscador.js-->
                                <input style="margin: auto; display: block;" type="submit"  id="BotonGuardar" value="Enviar" onclick="">
                            </fieldset>
                        </form>       
                    </div>    
            </div> 
        </div>
        <div id="Tapa_2" onclick="quitarTapa_2()"></div><!--Este Div es la parte oscura, quitarTapa_2() esta al final de este archivo-->
        <footer>
            <?php
                include("../vista/footer.php");
            ?>
        </footer>
    </body>
</html>


    <script src="../Javascript/ajaxBuscador.js"></script><!--si se coloca en el head no funciona-->

    <script>
        function mostrarInputCedula(){
            var A= document.getElementById("Carga_5");
            var B= document.getElementById("Tapa_2");

            if(A.style.display = "none"){
                A.style.display = "block";

                B.style.display = "block";
            }
        }

        function quitarTapa_2(){
            if(document.getElementById("Tapa_2").style.display == "block"){
                document.getElementById("Tapa_2").style.display = "none";
                document.getElementById("Carga_5").style.display = "none";
            }
        }
    </script>
  
