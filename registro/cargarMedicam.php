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
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="../Javascript/Ajax_Cancelar.js"></script>
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
                td:nth-of-type(1):before {content: "---";background-color:#bcbeda; width: 94%;}
                td:nth-of-type(2):before { content: "Medicamento"; }
                td:nth-of-type(3):before { content: "Principio activo"; }
                td:nth-of-type(4):before { content: "Laboratorio"; }
                td:nth-of-type(5):before { content: "Presentación"; }
                td:nth-of-type(6):before { content: "Especificaciones"; }
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
            <h3 class="encabezadoSesion_1">Bodega de productos</h3> 
            <div class="cargarMedic_1">
                <div style="padding-bottom: 5%; ">
                    <p style="text-align: center;"><b>Cargar productos</b></p>                    
                    <input type="radio" style="margin-bottom:3%; margin-top: 3%; margin-left: 20%" name="carga" id="Medicamento_6" onclick="CargaMedicamento()" />
                    <label class="" for="Medicamento_6">Medicamento</label>
                    <br><br class="ocultar">
                    <input type="radio" style="margin-bottom:2%; margin-left: 20%" name="carga" id="Mmq"  onclick="CargaMMQ()"/>
                    <label for="Mmq">Material médico quirurgico</label>

                </div>
                <script>
                    function CargaMedicamento(){
                        document.getElementById("Formulario_A").style.display="block";
                        document.getElementById("Formulario_B").style.display="none";
                    }
                    function CargaMMQ(){
                        document.getElementById("Formulario_A").style.display="none";
                        document.getElementById("Formulario_B").style.display="block";
                    }
                </script>

            <div class="Afili_2">
                <form style="display: none" id="Formulario_A" autocomplete="off" class="Afiliacion_0">
                    <fieldset class="Afiliacion_4">
                            <label>Medicamento:</label>
                            <input type="text" style="margin-bottom:2%;" name="nombre_Medicam" id="Nombre"/>
                            <br>
                            <label>Principio activo:</label>
                            <input type="text" style="margin-bottom:2%;" name="principio" id="Principio"/>
                            <br>                       
                            <label>Presentacion:</label>
                            <select class="etiqueta_24" name="presentacion" id="Presentacion">
                                <option></option>
                                <option>Aerosol</option>
                                <option>Ampollas</option>
                                <option>Comprimido</option>
                                <option>Crema</option>
                                <option>Gotas</option>
                                <option>Jarabe</option>
                                <option>Loción</option>
                                <option>Pastilla</option>                                    
                                <option>Parche</option>
                            </select>
                            <br>       
                            <label>Especificaciones:</label>
                            <input type="text" style="margin-bottom:2%;" name="especificacion" id="Especificacion"/>              

                            <input type="button" class="btn_verTodo" style="margin-left:40%; margin-top: 4%;" onclick="llamar_cargarMedicamento(); limpiarFormulario()" value="Cargar"/><!--llamar_cargarMedicamento() se encuentra en Ajax_Cancelar.js y limpiarFormulario() se encuentra Funciones_varias.js-->          
                    </fieldset>  
                </form>  
            </div>
            <div class="Afili_2"> 
                <form style="display: none" id="Formulario_B" autocomplete="off" class="Afiliacion_0">
                    <fieldset class="Afiliacion_4">
                        <select class="quirurgico_2" name="" id="">
                            <option value="sinSeleccion">Seleccione categoría</option>
                            <option>Bata descartable</option>
                            <option>Bisturi</option>
                            <option>Cater</option>
                            <option>Gasa</option>
                            <option>Guantes</option>
                            <option>Inyetadoras</option>
                            <option>Mariposa</option>
                            <option>Sobrecama</option>
                            <option>Supositorio</option>
                            <option>Tapa boca</option>
                            <option>Uniforme descartable</option>
                            <option>Otros</option>
                        </select>
                         <br>       
                        <label style="display: block; text-align: center; height: 20px !important; font-size: 14px;">Especificaciones</label><br>
                        <textarea type="text" style="margin-bottom:2%; margin-top: 0%; width: 90%;" name="especificacion" id="Especificacion"/>  </textarea>            

                        <input type="button" class="btn_verTodo" style="margin-left:40%; margin-top: 4%;" onclick="llamar_cargarQuirurgico()" value="Cargar"/><!--llamar_cargarQuirurgico() no esta diseñada-->                             
                    </fieldset>  
                </form>   
            </div>
            </div>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

            <div class="cargarMedic_2">
                <p class="Inicio_1" style="padding: 0% 1%;">El siguiente listado contiene los productos que usted tiene cargados en el sistema, estarán publicados por 10 dias, pasado ese tiempo puede volver a publicarlos.</p>
                <div id="reemplaza_tabla" style="background-color:; margin-top: 5%; ">
                    <?php
                        //se consulta si se tienen medicinas en la bodega 
                        $Consulta_2="SELECT * FROM medicamentoscargados WHERE ID_PR='$sesion' ORDER BY fecha DESC ";
                        $Recordset_2=mysqli_query($conexion,$Consulta_2);
                        if(mysqli_num_rows($Recordset_2)!= 0){
                    ?>
                            <table style="background-color: ; width: 97%; margin-left: 3%; border-collapse: collapse;">
                                <thead class="">
                                    <tr>
                                        <th class="buscar_3"></th>
                                        <th>Medicamento</th>
                                        <th>Principio activo</th>
                                        <th>presentación</th>
                                        <th>Especificaciones</th>                              
                                        <th style="width: 8%;">Fecha publicación</th>
                                    </tr>
                                </thead>

                            <tbody>
                                <?php  
                                    while($medicamento= mysqli_fetch_array($Recordset_2)){
                                        //se cambia el formato de la fecha a mostrar en pantalla
                                        $fechaFormatoMySQL = $medicamento["fecha"];//se obtiene la fecha en formato MySQL
                                        $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha a d-m-Y
                                    ?>
                                
                                   <tr class="buscar_1">
                                        <td class="buscar_3">...</td>
                                        <td class="buscar_5"><?php echo $medicamento["nombre"];?></td>
                                        <td class="buscar_5"><?php echo $medicamento["principioActivo"];?></td>
                                        <td style="width: 15%;"><?php echo $medicamento["presentacion"];?></td>
                                        <td style="width: 15%;"><?php echo $medicamento["especificaciones"];?></td>
                                        <td class="buscar_4"><?php echo $fechaFormatoPHP;?></td>

                                        <td style="width: 10%;"><?php echo '<a class="paciente" href="EliminarMedicamento.php?ID_Paciente='.$medicamento['ID_PR'].'&ID_MC='.$medicamento['ID_MC'].'" onclick="return Confirmacion()">Eliminar</a>';?></td><!-- se envia al archivo php que elimina el paciente de la BD, pero antes aparece una ventana javascript en un alert que detiene la accion hasta tanto no se confirma; la funcion Confirmacion() se encuentra en Funciones_varias.js-->

                                        <td style="width: 10%;"><?php echo '<a class="paciente" href="actualizarDatos_Basico.php?cedulaPaciente='.$medicamento['ID_PR'].'">Actualizar</a>';?> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ocultar_1"><?php echo "<br>";?></td>
                                    </tr> <?php } ?>
                                </tbody>
                            </table> 
                                <?php 
                          
                    }
                    else{
                        echo "<h3 class='cargarMedic_4'>No tiene productos en su bodega.</h3>";
                    }
                    ?>
                </div> 
            </div>               
        </div>
        <footer>
           <?php
                include("../vista/footer.php")
            ?>
        </footer>
        

        