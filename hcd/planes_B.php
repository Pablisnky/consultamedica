<?php   
    session_start();  //Se reaunada la sesion abierta en validarSesion.php
    /*$verifica = 1906;  
    $_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica*/
      
            if(!isset($_SESSION["UsuarioDoct"])){//sino esta declarada la variable $_SESSION devuelve a DoctorAfiliado.php, con esto se garantiza que se hizo login, esta $_SESSION se creó en validarSesion.php
                header("location:../DoctorAfiliado.php");           
            }else
            {
                $sesion=$_SESSION["UsuarioDoct"];//aqui se almacena el ID_Doctor en $sesion
            
                include("../conexion/Conexion_BD.php");
            }

    include("../Clases/actualizar_precio.php");
        
?> 
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
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1000px)" href="../css/MediaQuery_CitasMedicas_Tablet.css"/> 
        <link rel="stylesheet" type="text/css" href="../iconos/icono_tilde_exis/style_tilde_exis.css"/><!--galeria de icomoon.io-->
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png"> 

        <script src="../Javascript/Funciones_varias.js"></script> 

        <style>
            td{
                background-color: ;
                text-align: center;
                height: 27px;
            }
            span{
                font-size: 12px; 
            }
            @media screen and (max-width: 800px){
                tr:hover{
                    background-color:#F4FCFB;
                }
                span{
                    background-color: ;
                    font-size: 10px;
                }
            }
        </style>         
    </head>	
    <body>
        <div class="Principal">       
            <header class="fixed_1">       
                <?php
                    include("../header/headerDoctor.php");
                ?>
            </header>            
            <div class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->          
                <h3 class="encabezadoSesion_1">Planes de afiliación para especialistas</h3> 
                
                <div class="DocAfiliado">
                    <p class="Inicio_13">Ahorre tiempo y dinero con nuestra aplicación, ampliando sus posibilidades con un plan de pago,</p>
                </div>
           
                <div style=" margin-top: 6%; margin-bottom: 5%;">
                    <table id="planes" style="border-collapse: collapse; margin: auto">                    
                        <thead>
                            <th>CARACTERISITICA</th>
                            <th>BASICO</th>
                            <th>ESPECIAL</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tablaTexto">Directorio médico.</td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>                        
                            </tr>
                            <tr>
                                <td class="tablaTexto_1">Registro de Diagnostico y tratamiento farmacologico prescrito a sus pacientes.</td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>                     
                            </tr> 
                            <tr>
                                <td class="tablaTexto_1">Soporte para registro hasta 150 pacientes sin costos adicional.</td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>                     
                            </tr> 
                            <tr>
                                <td class="tablaTexto_1">Servicio ilimitado de solicitud de citas.</td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>                       
                            </tr>
                            <tr>
                                <td class="tablaTexto_1">Diagnostico médico según CIE_10.</td>
                                <td><span class="icon icon-checkmark"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>                      
                            </tr>     
                            <tr>
                                <td class="tablaTexto_1">Registro de informe médico e imagenes.</td>
                                <td><span class="icon icon-cross"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>                       
                            </tr>   
                            <tr>
                                <td class="tablaTexto_1">Publicaciones de articulos de investigación e información.</td>
                                <td><span class="icon icon-cross"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>                       
                            </tr> 
                            <tr>
                                <td class="tablaTexto_1">Registro y graficas de valores de laboratorio.</td>
                                <td><span class="icon icon-cross"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>                       
                            </tr> 
                            <tr>
                                <td class="tablaTexto_1">Apertura de cuenta a sus pacientes para entrega de informes médicos, diagnosticos y tratamientos farmacologicos.</td>
                                <td><span class="icon icon-cross"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>                       
                            </tr> 
                            <tr>
                                <td class="tablaTexto_1">Permiso entre cuentas de afiliados para el intercambio de data clinica de pacientes entre especialistas e instituciones de salud.</td>
                                <td><span class="icon icon-cross"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>                       
                            </tr> 
                            <tr>
                                <td class="tablaTexto_1">Soporte para registro hasta 500 de pacientes sin costo adicional.</td>
                                <td><span class="icon icon-cross"></span></td>
                                <td><span class="icon icon-checkmark"></span></td>                        
                            </tr> 
                            <tr>
                                <td class="tablaTexto_1">Liberacion de data clinica a los centros de salud afiliados a ConsultaMedica.com.ve <span class="Inicio_21">(Estrictamente bajo autorización certificada por el especialista)</span></td>
                                <td><span class="icon icon-cross"></span></td>
                                <td><span class="icon icon-cross"></span></td>                   
                            </tr>
                            <tr colspan>
                                <td class="tablaTexto" style="margin-top: 3%;">Inversión mensual</td>
                                <td class="afiliado_02"><a href='DataBB_B.php' class="tablaPrecio"><?php echo $PrecioBasico?></a><a style='margin: auto; display: block;'  href='DataBB_B.php' class='buttonCuatro_2'>Comprar</a></td>
                                <td class="afiliado_02"><a href='DataBE_B.php'  class="tablaPrecio"><?php echo $PrecioEspecial?></a><a style='margin: auto; display: block;'  href='DataBE_B.php' class='buttonCuatro_2'>Comprar</a> </td>                 
                            </tr>
                        </tbody>
                    </table>
                </div>    
            </div>    
        </div>
        <footer>    
            <?php
                include("../header/footer.php");
            ?>
        </footer>
    </body>
</html>

