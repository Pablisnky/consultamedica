<?php   
    session_start();  //Se reaunada la sesion abierta en validarSesion.php
?> 

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Historia Clinica Digital</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Historia clinica de pacientes en Venezuela"/>
        <meta name="keywords" content="reporte medico,historia clinica, "/>
        <meta name="author" content="Pablo Cabeza"/>

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../Javascript/CalendarioJQwery.js"></script> 
        
        <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">
    </head>
    <h1 style="cursor: default;">ConsultaMedica.com.ve</h1>
        <?php
        $sesion=$_SESSION["UsuarioDoct"];//Se introduce el ID_Doctor por medio de $_SESSION
        //echo $sesion;
        if(!isset($_GET["Diagnostico"])){//si $_GET["Diagnostico"] no esta declarada, viene de HistoriasClinicas.php
           ?>  
            <form action="VisitasConsultorio.php" method="POST">
                <fieldset id="NuevoRegistro_0">
                    <legend>Nuevo registro médico</legend> 
                        <label class="etiqueta_6">Fecha</label>
                        <input type="text" name="fecha" value="<?php echo  date('d-m-y');?>" readonly="readonly" >
                        <br><br>
                        <label class="etiqueta_6"  >Diagnostico <span style="cursor: pointer; font-weight: bolder;" onclick="CIE_10()";>CIE-10</span><!--funcion CIE_10 esta al final de este archivo-->
                        <textarea rows="3" cols="90" name="tratamiento" id="Tratamiento"> 
                        </textarea></label>
                       
                        <br>
                        <label class="etiqueta_6">Tratamiento
                            <textarea rows="3" cols="90" name="tratamiento" id="Tratamiento" style="text-align: left;"> 
                            </textarea>
                        </label>
                        <br>
                        <label class="etiqueta_6">Observación
                            <textarea rows="3" cols="90" name="observacion" id="Observacion" style="text-align: left;"> 
                            </textarea>
                        </label>
                        <br><br><hr  color="#040652" size="2" width="97%" align="left" >
                        <br>
                        <input type="submit" value="Registar" name="Registrar">                
                        <br>         
                </fieldset>
            </form>
            <?php }
                else{//si $_GET["Diagnostico"] esta declarada, viene de cie_10.php
                ?>
                <form action="VisitasConsultorio.php" method="POST">
                <fieldset id="NuevoRegistro_0">
                    <legend>Nuevo registro médico</legend>  
                        <label class="etiqueta_6">Fecha</label>
                        <input type="text" name="fechaCita" value="<?php echo  date('d-m-y');?>" readonly="readonly" > 
                        <br><br>
                        <label class="etiqueta_6"  >Diagnostico - <span style="cursor: pointer; font-weight: bolder;" onclick="CIE_10()"; >CIE-10</span><!--funcion CIE_10 esta al final de este archivo-->
                        <?php 
                            echo "<textarea rows=3 cols=90 type=text name='E' readonly='readonly'>" . $_GET['Diagnostico'] .  
                            "</textarea>";//se recive desde cie_10.php por medio de un enlance el diagnostico
                        ?>
                        </label>                  
                        <br>
                        <label class="etiqueta_6">Tratamiento
                        <textarea rows="3" cols="90" name="tratamiento" id="Tratamiento"> 
                        </textarea></label>
                        <br>
                        <label class="etiqueta_6">Observacón
                            <textarea rows="3" cols="90" name="observacion" id="Observacion"> 
                            </textarea>
                        </label>
                        <br><br><hr  color="#040652" size="2" width="97%" align="left" ><br>
                        <input type="submit" value="Registar" name="Registrar">                
                        <br>         
                </fieldset>
            </form>
           <?php     }



             ?>

            <script type="text/javascript">
                function CIE_10(){
                    window.open("cie_10.php","Registro","width=1100px,height=600px,scrollbars=NO,left=120px");
                }
            </script>
    