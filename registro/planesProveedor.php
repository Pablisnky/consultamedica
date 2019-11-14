<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Afiliacion</title>
		<meta charset="utf-8"/>
		<meta name="description" content="Sistema para reservar citas médicas"/>
		<meta name="keywords" content="cita medica, consulta medica, doctor, paciente, consulta medica"/>
		<meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/>
        <link rel="shortcut icon" type="image/png" href="images/logo.png">
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="css/MediaQuery_CitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 800px)" href="css/MediaQuery_CitasMedicas_movilModerno.css"/>
        <link rel="stylesheet" type="text/css" href="fonts/style.css"/><!--galeria de icomoon.io--> 

        <script src="Javascript/Ciudades.js"></script> 
        <script src="Javascript/validar_Campos.js"></script> 
        <script src="Javascript/Funciones_varias.js"></script> 

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat:regular|Indie+Flower|Raleway:400');

            tr:hover{
                background-color:#BEBFDD; 
            }
            td{
                background-color: ;
                text-align: center;
                height: 27px;
            }
            span{
                font-size: 12px; 
            }
            
            @media screen and (max-width: 325px){
                tr:hover{
                    background-color:#F4FCFB;
                }
                th{
                    font-size: 9px !important;
                }
                span{
                    background-color: ;
                    font-size: 10px;
                }
            }

            @media (min-width: 326px) and (max-width: 800px){
                th{
                    font-size: 14px !important;
                }
            }
        </style>         
    </head>	
    <body>
        <div class="Principal">       
            <header class="fixed_1">       
                <?php
                    include("../vista/headerPrincipal_2.php");
                ?>
            </header>            
            <div class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive--> 
                    
            <h3>Planes de afiliación para proveedores</h3> 
            <div class="DocAfiliado">
                <p class="Inicio_8">Ahorre tiempo y dinero con nuestra aplicación.</p>
                <div id="Perfil_09">
                    <a class="btn_publicaciones" name="boton_Publicaciones" href="registroProveedor.php">Registrar cuenta</a>
                </div>
                <p class="Inicio_8"> Registre una cuenta y expanda sus productos a nuevos clientes.</p>
            </div>
           
            <div style=" margin-top: 6%; margin-bottom: 3%;">
                <table id="planes" style="border-collapse: collapse; margin: auto">                    
                    <thead>
                        <th>CARACTERISITICA</th>
                        <th>BASICO</th>
                        <th>ESPECIAL</th>
                    </thead>
                  <!--  <tbody>
                        <tr>
                            <td class="tablaTexto">.</td>
                            <td><span class="icon icon-checkmark"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                        
                        </tr>
                        <tr>
                            <td class="tablaTexto_1">.</td>
                            <td><span class="icon icon-checkmark"></span></td>
                            <td>No aplica</td>
                            <td>No aplica</td>                       
                        </tr>
                        <tr>
                            <td class="tablaTexto_1">Registro limitado de hasta 30 pacientes.</td>
                            <td><span class="icon icon-checkmark"></span></td>
                            <td>No aplica</td>
                            <td>No aplica</td>                     
                        </tr>  
                        <tr>
                            <td class="tablaTexto_1">Notificacion de recordatorio al pacientes, para el cumplimiento de tratamiento prescrito y proxima vista al consultorio.</td>
                            <td><span class="icon icon-checkmark"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                       
                        </tr> 
                        <tr>
                            <td class="tablaTexto_1">Valor agregado a su consulta con notificaciones de recordatorios a sus pacientes por cita agendada.</td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                       
                        </tr> 
                        <tr>
                            <td class="tablaTexto_1">Servicio ilimitado de solicitud de citas.</td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                       
                        </tr>
                        <tr>
                            <td class="tablaTexto_1">Registro hasta 150 pacientes sin costos adicional.</td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                     
                        </tr>
                        <tr>
                            <td class="tablaTexto_1">Registro de Diagnostico y tratamiento farmacologico prescrito a sus pacientes.</td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                     
                        </tr> 
                        <tr>
                            <td class="tablaTexto_1">Diagnostico médico según CIE_10.</td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                      
                        </tr>                             
                        <tr>
                            <td class="tablaTexto_2">Valor agregado a su consulta con notificaciones de recordatorios a sus pacientes para el cumplimiento del tratamiento según posología prescrita.</td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                       
                        </tr> 
                        <tr>
                            <td class="tablaTexto_1">Registro de informe médico e imagenes.</td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                       
                        </tr>   
                        <tr>
                            <td class="tablaTexto_1">Publicaciones de articulos de investigación e información.</td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                       
                        </tr> 
                        <tr>
                            <td class="tablaTexto_1">Registro y graficas de valores de laboratorio.</td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                       
                        </tr> 
                        <tr>
                            <td class="tablaTexto_2">Apertura de cuenta a sus pacientes para entrega de informes médicos, diagnosticos y tratamientos farmacologicos.</td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                       
                        </tr> 
                        <tr>
                            <td class="tablaTexto_1">Soporte para registro hasta 500 de pacientes sin costo adicional.</td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                        
                        </tr> 
                        <tr>
                            <td class="tablaTexto_2">Permiso entre cuentas de afiliados para el intercambio de data clinica de pacientes entre especialistas e instituciones de salud. <span class="Inicio_21">(Estrictamente bajo autorización del especialista)</span></td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                       
                        </tr> 
                         <tr>
                            <td class="tablaTexto_1">Historia médica digital(según especialidad médica).</td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                    
                        </tr>
                       <tr>
                            <td class="tablaTexto_1">Historia médica digital (personalizada según requerimientos) <span>(Ciertas condiciones aplican)</span></td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-cross"></span></td>                     
                        </tr>
                        <tr>
                            <td class="tablaTexto_1">Liberacion de data clinica a los centros de salud afiliados a ConsultaMedica.com.ve <span class="Inicio_21">(Estrictamente bajo autorización del especialista)</span></td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                   
                        </tr>
                        <tr colspan>
                            <td class="tablaTexto" style="margin-top: 3%;">Inversión mensual</td>
                            <td class="afiliado_02"><a href="registroEspecialista.php" class="tablaPrecio">0 Bs.</a></td>
                            <td class="afiliado_02"><a href="registroEspecialista.php" class="tablaPrecio">186 Bs.</a></td>
                            <td class="afiliado_02"><a href="registroEspecialista.php" class="tablaPrecio">372 Bs.</a></td>                 
                        </tr>
                    </tbody>-->
                </table>
            </div>
            <div id="Perfil_09">
                <a class="btn_publicaciones" name="boton_Publicaciones" href="registroProveedor.php">Registrar cuenta</a>
            </div>

            
        </div>     </div>
        <footer>    
            <?php
                include("../vista/footer.php");
            ?>
        </footer>
    </body>
</html>

