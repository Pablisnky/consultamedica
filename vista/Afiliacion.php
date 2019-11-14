<?php
     include("../Clases/actualizar_precio.php");
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Afiliacion</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Sistema para reservar citas médicas"/>
        <meta name="keywords" content="cita medica, consulta medica, doctor, paciente, consulta medica"/>
        <meta http-equiv="Last-Modified" content="0"/>
        <meta name="author" content="Pablo Cabeza"/>
        <meta name="rating" content="General" /><!-- indica si el contenido es apropiado para menores-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1000px)" href="../css/MediaQuery_CitasMedicas_Tablet.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 1001px) and (max-width: 1300px)" href="../css/MediaQuery_CitasMedicas_1280px.css">
        <link rel="stylesheet" type="text/css" href="../iconos/icono_tilde_exis/style_tilde_exis.css"/><!--galeria icomoon.io  -->
        <link rel="stylesheet" type="text/css" href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'> 
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="../Javascript/Funciones_varias.js"></script> 

        <style>
            td{
                background-color: ;
                text-align: center;
                height: 27px;
            }
            
            @media screen and (max-width: 325px){
                tr:hover{
                    background-color:#F4FCFB;
                }
            }
        </style>         
    </head>	
    <body>
        <div class="Principal">       
            <header class="fixed_1">       
                <?php
                    include("../header/headerPrincipal.php");
                ?>
            </header>            
            <div class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive--> 
                    
            <h3>Planes de afiliación para especialistas</h3> 
            <div class="DocAfiliado">
                <p class="Inicio_8">Ahorre tiempo y dinero con nuestra aplicación.</p>
                <div id="Perfil_09">
                    <a class="btn_publicaciones" name="boton_Publicaciones" href="registroEspecialista.php">Registrar cuenta</a>
                </div>
                <p class="Inicio_8"> Registre una cuenta gratis o amplie sus posibilidades con un plan de pago.</p>
            </div>
           
            <div style="background-color: ; margin-top: 6%; margin-bottom: 3%;">
                <table id="planes" style="border-collapse: ; margin: auto">                    
                    <thead>
                        <th>CARACTERISITICA</th>
                        <th>INICIO</th>
                        <th>BASICO</th>
                        <th>ESPECIAL</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tablaTexto">Directorio médico.</td>
                            <td><span class="icon icon-checkmark"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                        
                        </tr>
                        <tr>
                            <td class="tablaTexto_1">Servicio limitado de solicitud de citas, 30 por mes.</td>
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
                       <!-- <tr>
                            <td class="tablaTexto_1">Notificacion de recordatorio al paciente, para el cumplimiento de tratamiento prescrito y proxima visita al consultorio.</td>
                            <td><span class="icon icon-checkmark"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                       
                        </tr> -->
                        <!--<tr>
                            <td class="tablaTexto_1">Valor agregado a su consulta con notificaciones de recordatorios a sus pacientes por cita agendada.</td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                       
                        </tr> -->
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
                        </tr> <!--Ampliar oferta a informe médico--> 
                        <tr>
                            <td class="tablaTexto_1">Diagnostico médico según CIE_10.</td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                      
                        </tr>                             
                        <!--<tr>
                            <td class="tablaTexto_2">Valor agregado a su consulta con notificaciones de recordatorios a sus pacientes para el cumplimiento del tratamiento según posología prescrita.</td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                       
                        </tr> -->
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
                            <td class="tablaTexto_1">Registro hasta 500 pacientes sin costo adicional.</td>
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
                       <!--  <tr>
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
                        </tr>-->
                        <tr>
                            <td class="tablaTexto_1">Liberacion de data clinica a los centros de salud afiliados a ConsultaMedica.com.ve <span class="Inicio_21">(Estrictamente bajo autorización del especialista)</span></td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-cross"></span></td>
                            <td><span class="icon icon-checkmark"></span></td>                   
                        </tr>
                        <tr colspan>
                            <td class="tablaTexto" style="margin-top: 3%;">Inversión mensual</td>
                            <td class="afiliado_02" style="background-color: "><a href="registroEspecialista.php" class="tablaPrecio">0 Bs.</a><a style='margin: auto; display: block;'  href='registroEspecialista.php' class='buttonCuatro_2'>Comprar</a></td>
                            <td class="afiliado_02"><a href="" class="tablaPrecio">Suspendido</a></td>
                            <td class="afiliado_02"><a href="" class="tablaPrecio">Suspendido</a></td>                 
                        </tr>
                    </tbody>
                </table>
            </div>
                <div id="Perfil_09">
                    <a class="btn_publicaciones" name="boton_Publicaciones" href="registroEspecialista.php">Registrar cuenta</a>
                </div>
                <hr>
            <div id="Perfil_09">
                <form action="../Sesiones_Cookies/validarSesion.php" method="POST">
                    <input type="text" hidden name="usuario" value="Pab">
                    <input type="text" hidden name="clave" value="0110">
                    <input type="submit" value="Ver Demo"/>
                </form>
                <p class="Inicio_6" style="width: 95%; margin: auto;">El Demo, muestra la interfaz de una cuenta de pago del plan básico, los nombres de los pacientes, sus diagnosticos y tratamiento farmacológico son fictisios; del mismo modo aplica para el Dr.</p>
            </div>

            
        </div>     </div>
        <footer>    
            <?php
                include("../header/footer.php");
            ?>
        </footer>
    </body>
</html>

