<?php  
    session_start();  //Se reaunada la sesion abierta en validarSesion.php
    /*$verifica = 1906;  
    $_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica*/

    //Muestra todos los errores, desactivarlo para funcionamiento en local y activarlo para remoto
    //error_reporting(0);
    
    if(!isset($_SESSION["ID_Proveedor"])){//sino esta declarada la variable $_SESSION devuelve a registroDeOferta.php, con esto se garantiza que se hizo login, esta $_SESSION se creó en validarProveedor.php
        header("location:../../registro/registroDeOferta.php");           
    }
    else
    {
        $sesionProveedor=$_SESSION["ID_Proveedor"];//aqui se almacena el ID del proveedor en $sesion
        // echo "ID_Proveedor= " . $sesionProveedor;
            
        include("../../conexion/Conexion_BD.php");
    }
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
        
        <link rel="stylesheet" type="text/css" href="../../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../../css/MediaQuery_CitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../../css/MediaQuery_CitasMedicas_movilModerno.css"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:700');
        
            .a2:hover{
                color: white;
            }
            tr:hover{
                background-color:#BEBFDD; 
            }

            @media screen and (max-width: 325px){
                table, thead, tbody, th, td, tr{
                    display: block;        
                    /*background: #bcbeda;*/
                }
                thead tr{
                    background-color: ;
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
                    top: 0;/**/
                    left: 6px;
                    padding-right: 10px;
                    white-space: nowrap;
                }
                td:nth-of-type(1):before {content: "---";background-color:#BCBEDA; width: 123%;}
                td:nth-of-type(2):before { content: "Medicamento"; }
                td:nth-of-type(3):before { content: "Principio activo"; }
                td:nth-of-type(4):before { content: "Presentación"; }
                td:nth-of-type(5):before { content: "Especificaciones"; }
                td:nth-of-type(6):before { content: "Precio"; }
                td:nth-of-type(7):before { content: ""; }
                .buscar_1:hover{
                    background-color: white;
                }
                .buscar_2{
                    line-height: 150%
                }
                .textoCelda_4A, .textoCelda_4B{
                    background-color:;
                    font-size: 14px ;
                    width: 50% !important; 
                }
                .textoCelda_4C{
                    background-color: ;
                    text-align: left;
                }
            }

            @media (min-width: 326px) and (max-width: 800px){/*aplicaría en cualquier medio con dimensiones entre 800 y 1300 píxeles.*/
                table, thead, tbody, th, td, tr{
                    display: block;        
                    /*background: #bcbeda;*/
                }
                thead tr{
                    background-color: ;
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
                    font-size: 17px;
                }
                td:before{
                    background-color: ;
                    font-size: 17px;
                    position: absolute;
                    top: 0;/**/
                    left: 6px;
                    padding-right: 10px;
                    white-space: nowrap;
                }
                td:nth-of-type(1):before {content: "---";background-color:#BCBEDA; width: 123%;}
                td:nth-of-type(2):before { content: "Medicamento"; }
                td:nth-of-type(3):before { content: "Principio activo"; }
                td:nth-of-type(4):before { content: "Presentación"; }
                td:nth-of-type(5):before { content: "Especificaciones"; }
                td:nth-of-type(6):before { content: "Precio"; }
                td:nth-of-type(7):before { content: ""; }
                .buscar_1:hover{
                    background-color: white;
                }
                .buscar_2{
                    line-height: 150%
                }
                .textoCelda_4A, .textoCelda_4B, .textoCelda_4, .textoCelda_4C{
                    background-color:;
                    font-size: 17px ;
                    width: 50% !important; 
                }
                .textoCelda_4C{
                    background-color: ;
                    text-align: left;
                }
            }
        </style>        
    </head>     
    <body style="height: 86%"> 
        <div style=" min-height: 85%;">
            <header class="fixed_1">
                <?php
                     include("../../vista/headerProveedor.php")
                ?>            
            </header>
            <div onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->  
                <h3 class="encabezadoSesion_1">Medicinas ofertadas</h3>  
                <div style="margin: auto; background-color: red; width: 100%;">
                    <form>                               
                        <br class="ocultar">
                        <label class="etiqueta_21 ocultar_2">Nombre medicina</label>
                        <input class="etiqueta_22 ocultar_2" type="text" onkeyup="llamar_CitaNombre(this.value)"><!--llamar_CitaNombre esta en ajaxBuscador.js-->
                        <label class="etiqueta_21 ocultar_2">Principio activo</label>
                        <input class="etiqueta_22 ocultar_2" type="text" onkeyup="llamar_CitaApellido(this.value)"><!--llamar_Apellido esta en ajaxBuscador.js-->          
                    </form>
                    <div id="carga_3"></div><!-- Recibe la respuesta de las busuqedas solicitas por medio de las funciones llamar_CitaCedula(); llamar_CitaNombre(); llamar_CitaApellido-->
                    <hr style=" background-color: #040652; margin-bottom: 1%; margin-top: 1%; height: 1px;">
                    <input type="text" id="Especialista" hidden value="<?php echo $sesion; ?>">
                </div>
                
                <?php

                include("../../conexion/Conexion_BD.php");
                    
                //consulta que ubica los medicamentos ofertados por un proveedor
                $Consulta=  "SELECT * FROM medicamentos_ofrecidos INNER JOIN medicamentofrecido_proveedor ON medicamentos_ofrecidos.ID_Proveedor=medicamentofrecido_proveedor.ID_Proveedor WHERE medicamentos_ofrecidos.ID_Proveedor = $sesionProveedor  ORDER BY medicamentos_ofrecidos.fecha_oferta DESC ";
                $Recordset= mysqli_query($conexion,$Consulta);
                if(mysqli_num_rows($Recordset) != 0){ ?>
                    <div style="width: 90%; margin: auto;">
                        <table style="border-collapse: collapse; width: 100%; ">
                            <thead>
                                <tr>
                                    <th class="buscar_3"></th>
                                    <th>Medicamento</th>
                                    <th>Principio activo</th>
                                    <th>Presentación</th>
                                    <th>Especificaciones</th>                              
                                    <th style="text-align: center;">Precio</th>
                                    <th style="background-color: #040652; width: 0px; padding: 1px;"></th>
                                    <th style="background-color: #040652; width: 0px; padding: 1px;"></th>
                                </tr>
                            </thead>
                                    <?php
                            while($medicamento= mysqli_fetch_array($Recordset)){
                                //se cambia el formato de la fecha a mostrar en pantalla
                            /*   $fechaFormatoMySQL = $medicamento["fecha_oferta"];//se obtiene la fecha en formato MySQL
                               $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha a d-m-Y
                            */    ?>
                                <tbody class="buscar_2">
                                    <tr class="buscar_1">
                                        <td class="buscar_3">...</td>
                                        <td class="textoCelda_4"><?php echo $medicamento["nombre_Medic"];?></td>                         
                                        <td class="textoCelda_4"><?php echo $medicamento["principio_Activo"];?></td>   
                                        <td class="textoCelda_4"><?php echo $medicamento["presentacion_Medic"];?></td>
                                        <td class="textoCelda_4"><?php echo $medicamento["especificaciones_Medic"];?></td> 
                                        <td class="textoCelda_4"><?php echo $medicamento["precio_Medic"];?></td>
                                        <td style="background-color:; width: 0px; padding: 1px;"></td>

                                        <td class="textoCelda_4">ELiminar</td>


                                    </tr>
                                </tbody> 
                                        <?php 
                            } ?>
                        </table> 
                    </div>  <?php 
                }
                else{
                    echo "<h3>Sin resultados.</h3>";
                    echo "<a class='buttonCuatro' style='margin:auto' href='javascript:history.go(0)'>Limpiar</a>";
                }
                 ?> 
                   
            </div>       
        </div>
        <footer>
            <?php
                include("../../vista/footer.php");
            ?>
        </footer>
    </body>
</html>


         

<?php

 
    
        // <hr id="linea" style=" background-color: #040652; margin-bottom: 5%; height: 1px; margin-top: 3%;">

