<?php
    // Se verifica si se realizó login para entrar en este  archivo
    include("../Clases/VerificaDr.php");
    //Se conecta a la base de datos
    include("../conexion/Conexion_BD.php");
    include("../Clases/muestraError.php");
    
    $Paciente= $_SESSION["cedulaIdentidad"];//se introduce la cedula mediante $_SESSION
    //echo $Paciente . "<br>";

    $NombreDoctor = mysqli_query($conexion,"SELECT * FROM doctores WHERE ID_Doctor='$sesion'");
    $UsDoctor= mysqli_fetch_row($NombreDoctor);
    $UsDoctor[1]; //se obtiene el nombre del doctor.

    date_default_timezone_set('America/Caracas');
    $fecha=date("Y-m-d");//para guardar la fecha en MySQL y no haya problema con el formato 

    $fechaMostrar=date("d-m-Y");//para mostrar la fecha del registro medico que se va a realizar    
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Historia Clinica Digital</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Historia clinica de pacientes en Venezuela"/>
        <meta name="keywords" content="reporte medico,historia clinica, "/>
        <meta name="author" content="Pablo Cabeza"/>
        
        <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas_lista.css"/> 
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../Javascript/CalendarioJQwery.js"></script> 
        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="../Javascript/validar_Campos.js"></script> 
        <script src="../Javascript/Funciones_varias.js"></script>
        <script src="../Javascript/AjaxBuscador.js"></script> 
        <script src="../Javascript/Ajax.js"></script> 
        <script src="../Javascript/textArea.js"></script> 

        <style>
            li{
                list-style: none;
            }
            textarea {
                resize: vertical;/*no esta funcionanado, de pronto es porque la version del navegador no soporta esta regla*/
            }
        </style> 
    </head>
    <body onload="autofocusMotivo()"><!--autofocusMotivo se encuentra en Funciones_varias.js-->
        <div class="Principal" style="background-color: ">
            <header class="fixed_1"">
                <?php
                    include("../header/headerDoctor.php")
                ?>
                <div style="background-color: rgba(244, 248, 6, 0.7); width: 31%; margin-left: 0%; text-align: center;">  
                    <p style="margin-top:0.5%;  background-color: ; font-weight: bolder;  border-bottom-style: solid; border-bottom-color: #040652; border-bottom-width: 2px; padding-bottom: 0.5%; margin-right: 5%; height: 40%; display: inline-block;"><a style="cursor: default;">Ingrese datos</a></p> 
                </div>
            </header>
             <!--   <div style="background-color: rgba(108, 182, 7, 0.7); width: 31%; margin-top: 7%; margin-bottom: -10%; z-index: 3000; margin-left: 0%; text-align: center; display: flex; justify-content: space-between;">  
                    <p style="margin-top:0.5%; margin-left: 2%; background-color: ; color:#FE0202;   padding-bottom: 0.5%; margin-right: 0%; height: 40%;  display: inline-block;"><a href="Promo_Basico.php" style=" font-size: 13px; font-weight: bolder;">Valores semiológicos</a></p> 

                    <p style="margin-top: 0.5%; background-color: ; height: 40%; display: inline-block; "><a style="font-size: 13px; font-weight: bolder; margin-right: 0%;" href="Promo_Basico.php">Valores paraclinicos</a></p>

                    <p style="margin-top:0.5%;  background-color: ;  border-bottom-style: solid; border-bottom-color: #040652; border-bottom-width: 2px;margin-right: 2%; padding-bottom: 0.5%;  height: 40%;  display: inline-block;"><a   style="font-size: 13px; cursor: default;  font-weight: bolder;">Diagnostico</a></p> 
                </div>-->

        

        <section style="margin-top: 7%;">            
                <?php
                    $Consulta="SELECT * FROM pacientes_registrados WHERE cedula_pacient ='$Paciente' ";
                    $Resulset = mysqli_query($conexion,$Consulta);          
                    $paciente= mysqli_fetch_array($Resulset);

                ?>
                <div style="background-color: ; float: left; width: 25%; margin-left: 2.5%; position: fixed; margin-top: 3%;">
                    <div style="background-color:;">
                        <br>
                        <fieldset style="border-radius: 15px; padding: 2%">
                            <legend>Paciente</legend>
                            <label class="etiqueta_19">Nombre</label>
                            <input style="margin-bottom: 1.5%;"  type="text" name="nombre_Paciente" readonly="readonly"  id="NombrePaciente" value="<?php echo $paciente['nombre_pacient'];?>" > 
                            <br>
                            <label class="etiqueta_19">Apellido</label>
                            <input style="margin-bottom: 1.5%;" class="" type="text" name="apellido_Paciente" readonly="readonly"  id="ApellidoPaciente" value="<?php echo $paciente['apellido_pacient'];?>" >
                            <br>
                            <label class="etiqueta_19">Cedula</label>
                            <input style="margin-bottom: 1.5%;" type="text" name="cedula_Paciente" value="<?php echo $paciente['cedula_pacient'];?>">
                            <br>
                            <label class="etiqueta_19">Fecha</label>
                            <input style="margin-bottom: 1.5%;" type="text" name="fecha_consulta" readonly value="<?php echo $fechaMostrar;?>">  
                        </fieldset>
                    </div>
                    <div style="background-color:; width: 100%; margin-top: 3%; margin-left: -1.5%; display: flex; justify-content: center; ">                                         
                            <a style="margin: auto; display: block;" href="HistoriasClinicas.php?cedula_pacient=<?php echo $Paciente;?>" class="buttonCuatro" onclick=" return Advertencia()">Volver</a><!-- La función Advertencia se encuentra al final de este archivo-->

                            <label style="margin:auto; display: block;" for="BotonCargar" class="buttonCuatro" >Guardar</label>
                    </div> 
                   </div>



         <div style="background-color:; padding-bottom: 5%; width: 65%; float: right; margin-right: 4%;  position: relative; margin-top: 3%;">
            <form action="cargarDiagnostico.php" method="POST" name="form_5">
                <fieldset class="historia_2">
                    <legend>Nuevo diagnostico</legend>
                  
                    <label class="diagnostico_2"><b>Motivo de consulta</b></label>    
                    <textarea  class="diagnostico_1" name="motivo" id="Motivo" onblur="modificarTexto()" ></textarea><!---la funcion modificarTexto() esta al final del archivo-->
                    
                 
                     <label class="diagnostico_2"><b>Diagnostico</b>   
                        
                        <p style="color: rgba(4, 6, 82,0.5); display: inline; cursor: pointer;" id="MuestraTextoCie_10" onclick="anuncioTexto()"> CIE_10.</p>
                        <p style="color:  rgb(4, 6, 82); display: none; cursor: pointer;" id="MuestraTextoCie_10_2" onclick="AbreCie_10()"> CIE_10.</p>
                    </label>
                     <!---la funcion AbreCie_10() esta al final del archivo-->

                    <!--Div que esta sobre la palabra CIE_10 e impide que se vea al 100% 
                    <div id="TapaCie_10" style="width: 65px; height: 35px; background-color:rgba(244, 252, 251, 0.7); position: absolute; top: 182px; left: 100px;"></div>  la funcion anuncioTapa() esta al final del archivo-->
                     

                    <textarea class="diagnostico_1" name="diagnostico" id="Diagnostico" readonly="readonly" ></textarea><!-- Recibe respuesta desde cie_10_CapituloXXXXXXX.php -->

                    <textarea style="display: none" class="diagnostico_1" name="diagnosticoDescripcion" id="DiagnosticoDescripcion" ></textarea>

                   
                    <label class="diagnostico_2"><b>Tratamiento farmacológico (Medicamentos según su función)</b></label> 
                        <div id="TratamientosMedicados" style="margin-top: 2%">
                            <div id="TratamientosMedicados_1" class="tra_Medicados_1">         
                                <select class="tratamiento" name="tratamiento_1" id="Tratamiento_1" onchange="SeleccionarMedicamento()"><!--esta funcion se encuentra al final del archivo-->
                                    <option>Seleccione farmaco</option>
                                    <?php
                                        $Consulta =" SELECT * FROM medicamentosfuncion";
                                        $Recordset = mysqli_query($conexion, $Consulta);
                                        while($Medicamentos = mysqli_fetch_array($Recordset)){
                                            ?>
                                            <option value="<?php echo $Medicamentos['funcion'];?>"><?php echo $Medicamentos["funcion"];?></option>
                                            <?php 
                                        }
                                            ?>
                                </select> 

                                <textarea class="diagnostico_2" readonly="readonly" name="recibeTratamiento_1" id="RecibeTratamiento_1"></textarea><!--recibe la respuesta desde la ventana hijo que se abre por medio de la funcion SeleccionarMedicamento()-->              
                            </div>

                            <div id="TratamientosMedicados_2"  class="tra_Medicados_2">
                                <select class="tratamiento" name="tratamiento_2" id="Tratamiento_2" onchange="SeleccionarMedicamento_2()"><!--esta funcion se encuentra al final del archivo-->
                                    <option>Seleccione farmaco</option>
                                    <?php
                                        $Consulta =" SELECT * FROM medicamentosfuncion";
                                        $Recordset = mysqli_query($conexion, $Consulta);
                                        while($Medicamentos = mysqli_fetch_array($Recordset)){
                                            ?>
                                            <option value="<?php echo $Medicamentos['funcion'];?>"><?php echo $Medicamentos["funcion"];?></option>
                                            <?php 
                                        }
                                            ?>
                                </select>                       
                                
                                <textarea class="diagnostico_2"  name="recibeTratamiento_2" id="RecibeTratamiento_2"></textarea>           
                            </div>
                        </div>


                        <label class="diagnostico_2"><b>Posología</b></label>                  
                        <textarea class="diagnostico_1"  rows="3" name="posologia" id="Posologia"></textarea> 

                     
                        <input type="text" hidden name="cedula_Paciente" id="Cedula_Paciente" value="<?php echo $paciente['cedula_pacient'];?>">
                        <input type="text" hidden name="doctor" id="ID_Doctor" value="<?php echo $sesion; ?>"> 

                    <input type="submit" hidden id="BotonCargar">
                </fieldset>
            </form>
        </div>



<!--  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!--  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

        <script type="text/javascript">
            function Advertencia(){
               if(confirm("No ha guardado los cambios, si sale de esta página perdera los datos introducidos")==true){
                        //alert('Salir');
                        return true;
               }
               else{
                    //alert('Cancelo la salida');
                    return false;
               }
            }

            function anuncioTexto(){
                var A = document.getElementById("TapaCie_10");
                alert("Debe introducir el motivo de la consulta");

          
            }
            
            function modificarTexto(){                
                var A = document.getElementById("MuestraTextoCie_10");
                var B = document.getElementById("MuestraTextoCie_10_2");

                    if(document.form_5.motivo.value.length>10){
                        A.style.display="none";
                        B.style.display="inline";
                    }
                    else{                        
                        A.style.display="inline";
                        B.style.display="none";
                    }
            }
            

            function SeleccionarMedicamento(){//esta funcion es llamada desde este archivo, toma el valor seleccionado en el select
                var A = document.getElementById("Tratamiento_1");
                Funcion_1=A.value;                       
                      
                window.open("medicamentos.php?ClasificacionFuncion_1=" + Funcion_1, "funcion", "width=800px,height=600px,left=300px");  
            }

            function SeleccionarMedicamento_2(){//esta funcion es llamada desde este archivo
                var A = document.getElementById("Tratamiento_2");
                Funcion_2=A.value;                       
                                                
                window.open("medicamentos.php?ClasificacionFuncion_2=" + Funcion_2, "funcion", "width=800px,height=600px,left=300px");  
            }
               
            function AbreCie_10(){//esta funcion es llamada desde este archivo, muestra un nuevo div para describir el diagnostico y abre la ventana del cie_10
                var B = document.getElementById("DiagnosticoDescripcion");           
                B.style.display="block";        

                window.open("cie_10/cie10.php", "cie_10", "width=1360px,height=700px,left=10px");  
            }

//ajusta texarea al tamaño del contenido a medida que se va escribiendo en diagnostico_Basico_2.php
    var textarea = document.querySelector('#Motivo');
    textarea.addEventListener('keydown', autosize);
                     
    function autosize(){
        var el = this;
        setTimeout(function(){
            el.style.cssText = 'height:auto; padding:1';
            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        },0);
    }

// -----------------------------------------------------------------------------------------------------
//ajusta texarea al tamaño del contenido a medida que se va escribiendo en contacenos.php  RecibeTratamiento_2
 var textarea = document.querySelector('#Posologia');
    textarea.addEventListener('keydown', autosize);
                     
    function autosize(){
        var el = this;
        setTimeout(function(){
            el.style.cssText = 'height:auto; padding:1';
            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        },0);
    }

// -----------------------------------------------------------------------------------------------------
//ajusta texarea al tamaño del contenido a medida que se va escribiendo en contacenos.php  
 var textarea = document.querySelector('#RecibeTratamiento_2');
    textarea.addEventListener('keydown', autosize);
                     
    function autosize(){
        var el = this;
        setTimeout(function(){
            el.style.cssText = 'height:auto; padding:1';
            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        },0);
    }
        </script>

               