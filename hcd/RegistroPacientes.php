<?php
    // Se verifica si se realizó login para entrar en este  archivo
    include("../Clases/VerificaDr.php");
    //Se conecta a la base de datos
    include("../conexion/Conexion_BD.php");
    include("../Clases/muestraError.php");

    // se busca que tipo de plan tienen el Dr.
    $Consulta= "SELECT * FROM doctores INNER JOIN usuario_doctor ON doctores.ID_Doctor=usuario_doctor.ID_Doctor WHERE doctores.ID_Doctor= '$sesion'";
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
		<title>Registro Pacientes</title>
		<meta charset="utf-8"/>
		<meta name="description" content="listado de pacientes por medico y formulario de registro de pacientes"/>
		<meta name="keywords" content="pacientes, registro"/>
		<meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1000px)" href="../css/MediaQuery_CitasMedicas_Tablet.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 1001px) and (max-width: 1300px)" href="../css/MediaQuery_CitasMedicas_1280px.css">
        <link rel="stylesheet" type="text/css" href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="../Javascript/validar_Campos.js"></script> 
        <script src="../Javascript/Funciones_varias.js"></script> 
        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="../Javascript/ajaxBuscador.js"></script>
        
        <style>
            td {
                width: 100px;
            }
            table{
                border-collapse: collapse;
            }
        </style>          
    </head>	    
    <body>
        <div>
            <header class="fixed_1"><!--  -->
                <?php
                    include("../header/headerDoctor.php")
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
                                        $CedulaRegistrados= $paciente["cedula_pacient"];

                                        if($Plan == "Ini"){
                                            $Enviar_1="HistoriasClinicas.php?cedula_pacient=$CedulaRegistrados";
                                        }
                                        else if($Plan == "Bas"){
                                            $Enviar_1 ="HistoriasClinicas.php?cedula_pacient=$CedulaRegistrados";
                                        }
                                        else if($Plan == "Esp")
                                            $Enviar_1 ="HistoriasClinicas.php?cedula_pacient=$CedulaRegistrados";     
                                    ?>
                                    <table>
                                        <tr>
                                            <td class="tabla_2A"><a class="cargaPaciente" href="<?php echo $Enviar_1;?>"><?php echo $paciente["nombre_pacient"];?></a></td>

                                            <td class="tabla_2A"><a class="cargaPaciente" href="<?php echo $Enviar_1;?>"><?php echo $paciente["apellido_pacient"];?></a></td>

                                            <td class="tabla_2B"><a class="cargaPaciente" href="<?php echo $Enviar_1;?>"><?php echo $paciente["cedula_pacient"];?></a></td>
                                             
                                            <td class="ocultarCelda"><a class="paciente" href="EliminarPaciente.php?ID_Paciente=<?php echo $paciente['ID_PR'];?>&cedulaPaciente=<?php echo $paciente['cedula_pacient'];?>" onclick="return Confirmacion()">Eliminar</a></td><!-- se envia al archivo php que elimina el paciente de la BD, pero antes aparece una ventana javascript en un alert que detiene la accion hasta tanto no se confirma; la funcion Confirmacion() se encuentra en Funciones_varias.js-->

                                            <td class="ocultarCelda"><a class="paciente" href="actualizarDatos.php?cedulaPaciente=<?php echo $paciente['cedula_pacient'];?>">Actualizar</a> 
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
                    <form action="cargarPaciente.php" method="POST" autocomplete="off"> 
                        <fieldset class="Afiliacion_4" style="background-color: #F4FCFB; border-radius: 15px;">
                            <label class="etiqueta_34">Introduzca el número de cedula</label>
                            <br>
                            <input class="etiqueta_35" type="text" name="cedula"><!--llamar_VerificarCedula() esta en ajaxBuscador.js-->
                            <input style="margin: auto; display: block;" type="submit" id="BotonGuardar" value="Enviar" onclick="">
                        </fieldset>
                    </form>       
                </div>    
            </div> 
        </div>
        <div id="Tapa_2" onclick="quitarTapa_2()"></div><!--Este Div es la parte oscura, quitarTapa_2() esta al final de este archivo-->
        <footer style="clear: left;">
            <?php
                include("../header/footer.php");
            ?>
        </footer>
    </body>
</html>


    <script src="../Javascript/ajaxBuscador.js"></script><!--Si se coloca en el head no funciona-->

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
  
