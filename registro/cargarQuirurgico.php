<?php
//aqui se almacena el ID_Paciente que se obtuvo en validarSesion.php
session_start();

    //Oculta todos los errores, desactivarlo para funcionamiento en local y activarlo para remoto
    //error_reporting(0);

    $sesion= $_SESSION["UsuarioPaciente"];
    //echo "ID_Paciente=  $sesion";
          
    include("../conexion/Conexion_BD.php");

    //if(!isset($_POST["botonActualizar"])){//sino se a pulsado el boton actualizar de este archivo se recibe la varible $Paciente y se entra en el formulario
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Inicio Sesión</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Consulta médica, solicitud de citas, directorio medico, perfil de doctor"/>
        <meta name="keywords" content="consulta, medico, doctor, directorio"/>
        <meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_CitasMedicas.css"/>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../Javascript/CalendarioJQwery.js"></script>  
        <script src="../Javascript/CalendarioJQwery_2.js"></script>
        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <script src="../Javascript/Funciones_varias.js"></script>
        <script src="../Javascript/ajaxBuscador.js"></script>

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');

            @media screen and (max-width: 800px){
                table, thead, tbody, th, td, tr{
                    display: block;        
                    /*background: #bcbeda;*/
                }
                thead tr{
                    position: absolute;
                    top: -9999px;
                    left: -9999px;
                }
                tr{
                    margin: 0 0 1rem 0;
                }      
                tr:nth-child(odd){
                    /*background: #bcbeda;*/
                }    
                td{
                    background-color: ;
                    border: none;
                    border-bottom: 1px solid #eee;
                    position: relative;
                    padding-left: 50%;
                    width: 50%;
                    font-size: 14px;
                }
                td:before{
                    background-color: ;
                    font-size: 14px;
                    position: absolute;
                    top: 0;
                    left: 6px;
                    padding-right: 10px;
                    white-space: nowrap;
                }
                td:nth-of-type(1):before {content: "---";background-color:#bcbeda; width: 90%;}
                td:nth-of-type(2):before { content: "Medicamento"; }
                td:nth-of-type(3):before { content: "Principio activo"; }
                td:nth-of-type(4):before { content: "Presentación"; }
                td:nth-of-type(5):before { content: "Especificaciones"; }
                td:nth-of-type(6):before { content: "Cantidad"; }
                td:nth-of-type(7):before { content: "Fecha publicación"; }
                td:nth-of-type(8):before { content: ""; }
                .buscar_1:hover{
                    background-color: white;
                }
                .buscar_2{
                    line-height: 150%
                }
                .textoCelda_4A{/*buscarMedicamentoContacto.php*/ 
                background-color:;
                font-size: 14px ;
                width: 50% !important; 
                }
            }
        </style> 

    </head>     
    <body>
            <header class="fixed_1">
                <?php
                    include("../vista/headerPaciente.php")
                ?>      
            </header>
            
            <div class="Principal" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
                <h3 class="encabezadoSesion_1">Bodega de material médico quirurgico</h3> 
                <div class="cargarMedic_1">
                    <form>
                            <fieldset id="Afiliacion_4" style="background-color: ;">
                                <legend>Cargar</legend>
                                <label class="etiqueta">Nombre del medicamento:</label>
                                <input type="text" style="margin-bottom:2%;" name="nombre_Medicam" id="Nombre"/>
                                <br><br class="ocultar">
                                <label class="etiqueta">Principio activo:</label>
                                <input type="text" style="margin-bottom:2%;" name="principio" id="Principio"/>
                                
                                <label class="etiqueta">Presentacion:</label>
                                <select style="margin-bottom:2%;" name="presentacion" id="Presentacion">
                                    <option></option>
                                    <option>Aerosol</option>
                                    <option>Ampollas</option>
                                    <option>Comprimido</option>
                                    <option>Crema</option>
                                    <option>Jarabe</option>
                                    <option>Loción</option>
                                    <option>Pastilla</option>                                    
                                    <option>Parche</option>
                                </select>
                                
                                <label class="etiqueta">Especificaciones:</label>
                                <input type="text" style="margin-bottom:2%;" name="especificacion" id="Especificacion"/>
                                
                                <label class="etiqueta">Cantidad:</label>
                                <input type="text" style="margin-bottom:0%;" name="cantidad" id="Cantidad"/>                    

                                <input type="button" class="btn_verTodo" style="margin-left:40%; margin-top: 4%;" onclick="llamar_cargarMedicamento()" value="Cargar"/><!--llamar_cargarMedicamento() se encuentra en Ajax_Cancelar.js-->                             
                            </fieldset>  
                    </form>   
                </div>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

                <div class="cargarMedic_2" style="background-color: ;">
                    <p class="Inicio_1" style="padding: 0% 1%;">El siguiente listado contiene los medicamentos que usted tiene cargados en el sistema, recuerde mantener su bodega de medicamentos actualizada.</p>
                    <div id="reemplaza_tabla" style="background-color:; margin-top: 5%; ">
                        <?php
                        //se consulta si se tienen medicinas en la bodega 
                        $Consulta_2="SELECT * FROM medicamentoscargados WHERE ID_PR='$sesion' ORDER BY fecha DESC ";
                        $Recordset_2=mysqli_query($conexion,$Consulta_2);
                        if(mysqli_num_rows($Recordset_2)!= 0){   
                            while($medicamento= mysqli_fetch_array($Recordset_2)){
                                ?>
                                
                                <table style="background-color: ; width: 97%; margin-left: 3%; border-collapse: collapse;">
                                       <thead class="cargarMedic_3">
                                            <tr>
                                                <th class="buscar_3"></th>
                                                <th>Medicamento</th>
                                                <th>Principio activo</th>
                                                <th>presentación</th>
                                                <th>Especificaciones</th>
                                                <th style="width: 8%;">Cantidad</th>                                
                                                <th style="width: 8%;">Fecha publicación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <tr>
                                                <td class="buscar_3">...</td>
                                                <td style="width: 25%;"><?php echo $medicamento["nombre"];?></td>
                                                <td style="width: 25%;"><?php echo $medicamento["principioActivo"];?></td>
                                                <td style="width: 15%;"><?php echo $medicamento["presentacion"];?></td>
                                                <td><?php echo $medicamento["especificaciones"];?></td>
                                                <td style="width: 5%;"><?php echo $medicamento["cantidad"];?></td>
                                                <td style="width: 5%;"><?php echo $medicamento["cantidad"];?></td>

                                                <td style="width: 10%;"><?php echo '<a class="paciente" href="EliminarMedicamento.php?ID_Paciente='.$medicamento['ID_PR'].'&ID_MC='.$medicamento['ID_MC'].'" onclick="return Confirmacion()">Eliminar</a>';?></td><!-- se envia al archivo php que elimina el paciente de la BD, pero antes aparece una ventana javascript en un alert que detiene la accion hasta tanto no se confirma; la funcion Confirmacion() se encuentra en Funciones_varias.js-->

                                                <td style="width: 10%;"><?php echo '<a class="paciente" href="actualizarDatos_Basico.php?cedulaPaciente='.$medicamento['ID_PR'].'">Actualizar</a>';?> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ocultar_1"><?php echo "<br>";?></td>
                                            </tr>
                                        </tbody>
                                </table> 
                                <?php 
                            }  
                        }
                        else{
                            echo "<h3>No tiene productos en su Bodega de medicamentos.</h3>";
                        }
                        ?>
                        </div> 
                </div>        
                
            </div>
       
        <footer style=" background-color:#BEBFDD; height: 100px; position: relative; margin-top: 5%; ">
                <div style="background-color: ; bottom: 5%; margin-left: 0%; position: absolute; width: 100%;">
                    <p class="p_2">Sitio web desarrollado por Pablo Cabeza, Villa del Rosario_Norte de Santander (+57) 301 7178677</p>
                </div> 
        </footer>
        
        