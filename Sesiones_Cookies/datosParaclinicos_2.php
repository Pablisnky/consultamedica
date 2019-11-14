<?php
    session_start(); 

    include("../conexion/Conexion_BD.php");
    mysqli_query($conexion,"SET NAMES 'utf8' ");

    $sesion=$_SESSION["UsuarioDoct"];//Se introduce el ID_Doctor por medio de $_SESSION

    $NombreDoctor = mysqli_query($conexion,"SELECT * FROM doctores WHERE ID_Doctor='$sesion'");
                $UsDoctor= mysqli_fetch_row($NombreDoctor);
                $UsDoctor[1]; //se obtiene el nombre del doctor.

    $Paciente= $_SESSION["cedulaIdentidad"];//se introduce la cedula mediante $_SESSION
    //echo $Paciente . "<br>";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Historia Medica Digital</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Historia clinica de pacientes en Venezuela"/>
        <meta name="keywords" content="reporte medico,historia clinica, "/>
        <meta name="author" content="Pablo Cabeza"/>
        
        <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../Javascript/CalendarioJQwery.js"></script> 
        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="../Javascript/validar_Campos.js"></script> 

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');

            td{
                height: 30px; 
            }
            th{
                font-size: 12px;
            }
            .laTop{
                background-color: ; float: left; width: 14%; margin-top: 0.4%;
            }
            .la{
                background-color: ; display: inline-block; width: 14%;
            }
            .in{
                background-color: ; width: 10%; margin-right: 10%;
            }
            .inBo{
                background-color: ; width: 10%; margin-right: 0%; margin-bottom: 2%;
            }
        </style>  
    </head>
<body>
        <div class="Principal" style="background-color:;">
            <header class="fixed_1"  style="background-color:; padding-bottom: 1%; height: 10%;" >
                <div style="width: 75%; float: left; border-right-color: white; border-right-style: solid;border-right-width: 1px; box-sizing: border-box;">
                    <h1 style="cursor: default; font-size: 3vw; height: 60%; padding: 1% 0%; box-sizing: border-box; text-align: center; padding-left: 2%">ConsultaMedica.com.ve</h1>
                </div>
                <div style="float: right;  width: 25%;">
                    <?php
                        $consulta_1="SELECT ID_Doctor,nombre_doctor,apellido_doctor, especialidad,sexo FROM doctores INNER JOIN especialidades ON doctores.ID_Especialidad=especialidades.ID_Especialidad WHERE ID_Doctor= '$sesion' ";
                        $Recorset_1=mysqli_query($conexion,$consulta_1);
                        while($Doctor_Datos= mysqli_fetch_array($Recorset_1)){
                            if($Doctor_Datos["sexo"] == "M"){//mujer
                    ?>
                                <input class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="Dra. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                <?php } 
                            else{ ?>  
                                <input  class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="Dr. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                <?php
                            }
                        }
                    ?>
                </div>
                <nav class="n41">
                    <div class="n44"><a href="CerrarSesion.php">Cerrar Sesión</a></div>
                    <div class="n44"><a href="InicioSesion.php" >Consulta</a></div>
                    <div class="n44"><a href="RegistroPacientes.php"> Mis pacientes</a></div>
                    <div class="n44"><a href="ReporteMensual.php">Morbilidad</a></div>   
                    <div class="n44"><a href="HistoriasClinicas_2.php" class="activa">HCD</a></div>  
                </nav>
                <div style="background-color: rgba(108, 182, 7, 0.7); width: 31%; margin-left: 0%; text-align: center; display: flex; justify-content: space-between;">  
                    <p style="margin-top:0.5%; margin-left: 2%; background-color: ;   padding-bottom: 0.5%; margin-right: 0%; height: 40%;  display: inline-block;"><a href="muestraHistoria_2.php" style="font-size: 13px; font-weight: bolder;">Valores semiológicos</a></p> 

                    <p style="margin-top: 0.5%; background-color: ;border-bottom-style: solid; border-bottom-color: #040652; border-bottom-width: 2px; height: 40%; display: inline-block; "><a style="font-size: 13px; font-weight: bolder; margin-right: 0%;">Valores paraclinicos</a></p>

                    <p style="margin-top:0.5%;  background-color: ; margin-right: 2%; padding-bottom: 0.5%;  height: 40%;  display: inline-block;"><a href="diagnostico_2.php" style="font-size: 13px;  font-weight: bolder;">Diagnostico</a></p> 
                </div>
            </header>

            <section style="margin-top: 7%;"> 
                <?php
                    $Consulta="SELECT * FROM pacientes INNER JOIN historico_visitas ON pacientes.cedula_Identidad=historico_visitas.cedula_paciente WHERE cedula_paciente ='$Paciente'";
                    $Resulset = mysqli_query($conexion,$Consulta);          
                    $paciente= mysqli_fetch_array($Resulset);
                    $fecha = date("d-m-Y");
                ?>

                <div style="background-color:; float: left; width: 25%; margin-left: 2.5%; margin-top: 2.9%; position: fixed;">
                    <div   style="background-color:;">
                        <fieldset style="border-radius: 15px; padding: 2%">
                            <legend>Paciente</legend>
                            <label style="float: left; width: 35%">Nombre</label>
                            <input style="margin-bottom: 1.5%;" type="text" name="nombre_Paciente" readonly="readonly"  id="NombrePaciente" value="<?php echo $paciente["nombre"];?>"> 
                            <br>                            
                            <label style="float: left; width: 35%">Apellido</label>
                            <input style="margin-bottom: 1.5%;"  class="" type="text" name="apellido_Paciente" readonly="readonly"  id="ApellidoPaciente" value="<?php echo $paciente["apellido"];?>">
                            <br>
                            <label style="float: left; width: 35%">Cedula</label>
                            <input style="margin-bottom: 1.5%;"  type="text" name="cedula_Paciente" value="<?php echo $paciente["cedula_Identidad"];?>">
                            <br>                            
                            <label style="float: left; width: 35%">Fecha</label>
                            <input style="margin-bottom: 1.5%"  type="text" name="fecha_consulta" readonly value="<?php echo $fecha;?>">
                        </fieldset>    
                    </div>                          
                    <div style="background-color:; width: 100%; margin-top: 3%; margin-left: -1.5%; display: flex; justify-content: center; ">                                         
                            <a style="margin: auto; display: block;" href="HistoriasClinicas.php?cedula_pacient=<?php echo $Paciente;?>" class="buttonCuatro" onclick=" return Advertencia()">Volver</a><!-- La función Advertencia se encuentra al final de este archivo-->

                            <label style="margin:auto; display: block;"  for="Cargar" class="buttonCuatro" >Guardar</label>
                    </div> 
                </div>

             <div  style="background-color:; width: 65%; float: right; margin-right: 3%;  position: relative; top: 50px;"> 
                        <form action="recibeDatosParaclinicos.php" method="POST">
                            <label class="laTop">Hb gr/dl</label>
                            <input class="in" type="text" name="Hb">
                            <label class="la">Hto %  </label>
                            <input class="in" type="text" name="Hto"> 
                            <label class="la">Leuc xmm3</label> 
                            <input class="inBo" type="text" name="Leuc">      
                           

                            <label class="laTop">Seg %</label> 
                            <input class="in" type="text" name="Seg">
                            <label class="la">Linf %</label> 
                            <input class="in" type="text" name="Linf"> 
                            <label class="la" >Plt xmm3</label> 
                            <input class="inBo" type="text" name="Plt"> 
                            
                            <label class="laTop">TP seg</label> 
                            <input class="in" type="text" name="TP"> 
                            <label class="la">TPT seg</label>
                            <input class="in" type="text" name="TPT"> 
                            <label class="la">INR</label> 
                            <input class="inBo" type="text" name="INR"> 
                          

                            <label class="laTop">Sodio mmol/lt</label> 
                            <input class="in" type="text" name="Sodio"> 
                            <label class="la">Potasio mmol/lt</label> 
                            <input class="in" type="text" name="Potasio"> 
                            <label class="la">Calcio mg/dl</label>
                            <input class="inBo" type="text" name="Calcio"> 
                            

                            <label class="laTop">Magnesio mg/dl</label> 
                            <input class="in" type="text" name="Magnesio"> 
                            <label class="la">Glic mg/dl</label> 
                            <input class="in" type="text" name="Glic"> 
                            <label class="la">Urea mg/dl</label> 
                            <input class="inBo" type="text" name="Urea">
                            

                            <label class="laTop">Creat mg/dl</label> 
                            <input class="in" type="text" name="Creat"> 
                            <label class="la">HIV</label> 
                            <input class="in" type="text" name="HIV"> 
                            <label class="la">Prot T gr/dl</label>
                            <input class="inBo" type="text" name="Prot">


                            <label class="laTop">Alb gr/dl</label>
                            <input class="in" type="text" name="Alb">  
                            <label class="la">Glob gr/dl</label>
                            <input class="in" type="text" name="Glob">  
                            <label class="la">A/G</label> 
                            <input class="inBo" type="text" name="A_G">


                            <label class="laTop">TGO U/L</label> 
                            <input class="in" type="text" name="TGO"> 
                            <label class="la">TGP U/L</label> 
                            <input class="in" type="text" name="TGP"> 
                            <label class="la">BT mg/dl</label>
                            <input class="inBo" type="text" name="BT"> 


                            <label class="laTop">BI mg/dl</label>
                            <input class="in" type="text" name="BI"> 
                            <label class="la">BD mg/dl</label>
                            <input class="in" type="text" name="BD">  
                            <label class="la">Fosf A.U/L</label>
                            <input class="inBo" type="text" name="Fosf"> 


                            <label class="laTop">Colest T mg/dl</label>
                            <input class="in" type="text" name="Colest">  
                            <label class="la">HDLc</label> 
                            <input class="in" type="text" name="HDLc"> 
                            <label class="la">LDLc</label> 
                            <input class="inBo" type="text" name="LDLc">

                            <label class="laTop">Triglic mg/dl</label> 
                            <input class="in" type="text" name="Triglic"> 
                            <label class="la">VDRL</label>
                            <input class="in" type="text" name="VDRL">
                            <label class="la">Ac. Ur mg/dl</label>
                            <input class="inBo" type="text" name="Ac">
                                                  
                            <label class="laTop">Depur Cr ml/min</label> 
                            <input class="in" type="text" name="Depur">  


                            <label class="" style="background-color: ;margin-top: 5%; width: 20%; display: block;">EKG
                                <textarea rows="3" cols="80" name="ekg"    id="Ekg">
                                </textarea>
                            </label>

                            <label class="" style="background-color: ; width: 20%; display: block;">Rx Tórax
                                <textarea rows="3" cols="80" name="rxTorax"    id="RxTorax">
                                </textarea>
                            </label>

                            <input type="text" name="cedula" value="<?php echo $paciente["cedula_Identidad"];?>" hidden> 
                            <input type="text" name="id_doctor" value="<?php echo $sesion;?>" hidden>

                            <input type="submit" id="Cargar" hidden>
                        </form>
            </div>
        </section>
    </div>
</body>
</html>

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
    </script>