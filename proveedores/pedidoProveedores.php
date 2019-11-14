<?php   
    include("../Clases/muestraError.php");
    include("../conexion/Conexion_BD.php"); 
 ?> 
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Pedidos</title>
        <meta http-equiv="content-type"  content="text/html";  charset="utf-8"/>
        <meta name="description" content="Consulta médica, solicitud de citas, directorio medico, perfil de doctor"/>
        <meta name="keywords" content="consulta, medico, doctor, directorio"/>
        <meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1000px)" href="../css/MediaQuery_CitasMedicas_Tablet.css"/>
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="../Javascript/Funciones_varias.js"></script>
        <script src="../Javascript/ajaxBuscador.js"></script>
        <script src="../Javascript/validar_Campos.js"></script>
    </head>    
    <body>
        <header class="fixed_1">
            <?php 
                include("../header/headerPrincipal_2.php");
            ?>
        </header>
        <div class="ocultarMenu" onclick="ocultarMenu()"><!-- contenedor se hace click y se oculta el menu responsive; ocultarMenu() se encuentra en Funciones_varias.js-->  
            <h3>Su pedido</h3> 
            <?php 
            //se genera un numero aleatorio para identificar al cliente, esto se hace para no pedir el numero de cedula al llenar el formulario
            $aleatorioPe = mt_rand(1,99999999);
            // echo "Nº aleatorio: " . $aleatorioPe . "<br>";

                //Se muestra el contenido del array $Pedido, que son los medicamentos seleccionados en medicamentosBuscar.php
               /* echo('<pre>');
                var_dump($datosMedicamentos);
                echo('</pre>');*/

                //se recogen los medicamentos chequeados con el input tipo Check
                $Pedido= $_POST["pedido"];
                
                //se cuentan el numero de elementos del array
                $TotalPedidos = count($Pedido);
                // echo "Total de medicamentos solicitados: " . $TotalPedidos . "<br>";


                //se recorre cada elemento de la tabla virtual para sacar los registros de los medicamentos seleccionados
                for ($i= 0; $i < $TotalPedidos; $i++){   
                    $IDs_Pedidos= $Pedido[$i];  
                    // echo "IDs de articulos Pedidos: " . $IDs_Pedidos . "<br>";                      
                }

                $IDs= implode(",",$Pedido);
                // echo "FInalmente los ID de los pedidos son: " . $IDs . "<br>";

                $Consulta_2= "SELECT SUM(precio_Medic) as mtotal FROM medicamentos_ofrecidos WHERE ID_MO IN (".$IDs.") ";
                $Recordset_2= mysqli_query($conexion,$Consulta_2);
                $total= mysqli_fetch_array($Recordset_2);
                // echo $total["mtotal"];

                // se consulta los medicamentos seleccionados con checked para luego almacenarlos en la BD
                $Consulta= "SELECT * FROM medicamentos_ofrecidos WHERE ID_MO IN (".$IDs.") ";
                $Recordset= mysqli_query($conexion,$Consulta);
            ?>
            <form action="recibePedido.php" method="POST" autocomplete="off"  class="Afiliacion_0">
                <div class="sesion_1A">
                    <table class="tabla_1">
                    <thead>
                        <tr>
                            <th>NOMBRE MEDICAMENTO</th>
                            <th>PRINCIPIO ACTIVO</th>
                            <th>PRESENTACION</th>
                            <th>LABORATORO</th>
                            <th colspan="2">ESPECIFICACIONES</th>  
                            <th></th>                                           
                            <th style="text-align: center;">PRECIO</th>
                        </tr>
                    </thead>
                        <?php
                    while($medicamento= mysqli_fetch_array($Recordset)){

                        $Contenido= implode(",",$medicamento);

                        //se cambia el formato de la fecha a mostrar en pantalla
                        $fechaFormatoMySQL = $medicamento["fecha_oferta"];//se obtiene la fecha en formato MySQL
                        $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha a d-m-Y
                        ?>
                            <tbody class="buscar_2">
                                    <td class="textoCelda_4"><?php echo $medicamento["nombre_Medic"];?></td>                         
                                    <td class="textoCelda_4"><?php echo $medicamento["principio_Activo"];?></td>   
                                    <td class="textoCelda_4"><?php echo $medicamento["presentacion_Medic"];?></td>
                                    <td class="textoCelda_4"><?php echo $medicamento["laboratorio_Medic"];?></td>
                                    <td class="textoCelda_4"><?php echo $medicamento["especificaciones_Medic"];?></td> 
                                    <td colspan="2" class="textoCelda_4E"><?php echo $medicamento["unidades_Medic"];?></td> 
                                    <td class="textoCelda_4C"><?php echo $medicamento["precio_Medic"];?></td>
                                </tr>
                            </tbody> 

                     <?php 
                     //se almacenan los medicamentos pedidos en la BD, por defecto tienen confirmacion false hsta que el usuario envie el formulario
                        $insertar1= "INSERT INTO medicamentos_pedido(ID_MO, aleatorioPedido, nombre, principioActivo, presentacion, laboratorio, especificaciones) VALUES('".$medicamento["ID_MO"]."','$aleatorioPe','".$medicamento["nombre_Medic"]."','".$medicamento["principio_Activo"]."','".$medicamento["presentacion_Medic"]."','".$medicamento["laboratorio_Medic"]."','".$medicamento["especificaciones_Medic"]."')"; 
                        mysqli_query($conexion,$insertar1);
                    }
                    

                    ?>
                    </table>
                    <hr>
                </div>
                <div class="sesion_7">
                    <table  class="tabla_2">
                        <thead>
                            <tr>
                                <th>TOTAL Bs</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input style="margin: auto; display: block;" type="text" name="total" value="<?php echo $total["mtotal"];?>">
                                </td>
                            </tr>
                            
                        </tbody>
                    </table> 
                </div>
                <div class="Afili_3" style="clear: right;">
                    <fieldset class="Afiliacion_4">
                        <legend>Datos del Cliente</legend>
                        <label>Nombre:</label>
                        <input type="text" name="nombre_Cliente" id="Nombre_Cliente">
                        <br>
                        <label>Apellido:</label>
                        <input type="text" name="apellido_Cliente" id="Apellido_Cliente">
                        <br>                     
                        <label>Telefono:</label>
                        <input type="text" name="telefono_Cliente" id="Telefono_Cliente"><!--  se encentra al final de este archivo onblur="validarFormatotelefono(this.value)" onfocus="limpiar_4()"-->
                        <br> 
                        <label>Correo:</label>
                        <input type="text" name="correo_Cliente" id="Correo_Cliente">
                        <br>                       
                        <label>Estado:</label>
                        <select name="estado_Cliente" id="Estado_Cliente"> 
                            <option></option>
                            <option>Amazonas</option>
                            <option>Anzoátegui</option>
                            <option>Apure</option>
                            <option>Aragua</option>
                            <option>Barinas</option>
                            <option>Bolivar</option>
                            <option>Carabobo</option>
                            <option>Cojedes</option>
                            <option>Delta Amacuro</option>
                            <option>Distrito Capital</option>
                            <option>Falcon</option>
                            <option>Guárico</option>
                            <option>Lara</option>
                            <option>Mérida</option>
                            <option>Miranda</option>
                            <option>Monagas</option> 
                            <option>Nueva Esparta</option>
                            <option>Portuguesa</option>
                            <option>Sucre</option>
                            <option>Táchira</option>
                            <option>Trujillo</option>                           
                            <option>Vargas</option>
                            <option>Yaracuy</option>
                            <option>Zulia</option>
                        </select> 
                        <br>                 
                    </fieldset >         
                </div>

                <input style="visibility: hidden;" type="text"  name="aleatorio" value="<?php echo $aleatorioPe;?>">
                <input type="submit" name="total" value="Realizar pedido" onclick="return validar_05()">   

                    <!--<input type="submit" id="Envio" class="btn_verTodo" style="margin:auto; margin-top: 4%;" value="Solicitar" onclick="return validar_11()" />-->
            </form> 
        </div>
        <footer>
            <?php
                include("../header/footer.php")
            ?>
        </footer>
    </body>
</html>
          
      
<!-- $insertar1= "INSERT INTO medicamentos_pedido(aleatorioPedido, nombre, pricipioActivo, presentacion, laboratorio, especificaciones,) VALUES('$Aleatorio','$NombrePe','$PrincipioActPe','$PresentacionPe' ,'$LaboratorioPe','EspecificacionesPe')"; -->
                    <!-- mysqli_query($conexion,$insertar1); -->