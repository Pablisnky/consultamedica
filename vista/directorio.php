<?php
    include("../Clases/muestraError.php");
?>

<!DOCTYPE html>
<html lang="es">
    <head>
		<title>Directorio médico</title>
    	<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
    	<meta name="description" content="Directorio médico, listado de doctores"/>
    	<meta name="keywords" content="directorio médico, doctores, especialidades"/>
    	<meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     	    
        <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1000px)" href="../css/MediaQuery_CitasMedicas_Tablet.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 1001px) and (max-width: 1300px)" href="../css/MediaQuery_CitasMedicas_1280px.css">
        <link rel="stylesheet" type="text/css" href="../css/hint_CSS/hint.css"><!--Formato de barra de abecedario-->
        <link rel="stylesheet" type="text/css" href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'> 
        <link rel="shortcut icon" type="image/png" href="../images/logo.png"> 
            
        <script src="../Javascript/Funciones_varias.js"></script>
        <!--Al final del archivo existen otros archivos .js agregados-->

        <style>
            a{
                cursor: /*pointer*/;
            }
        </style>            
    </head>	
        <body>
            <?php
                if(!isset($_POST["estado"])){// si no Hemos recibido el Estado, se muestra la ventana modal 
                $variableip="II_Entrada";          
            ?>
            <div class="modal">
                <a href="../index.php?V_1=<?php echo base64_encode($variableip);?>"><h2>ConsultaMedica.com.ve</h2></a>
                <p class="Inicio_19">Directorio Médico</p>
                <div>
                    <p class="Inicio_18">Seleccione un Estado.</p>
                    <br> 
                    <div id="Directorio_5">
                        <form action="directorio.php" method="POST">
                            <select class="Inicio_20" name="estado" id="Directorio_4" onchange="this.form.submit()"> 
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
                        </form> 
                    </div>
                </div>  
                <a class="salir" href="../index.php?V_1=<?php echo base64_encode($variableip);?>">Salir</a>
            </div>
            <?php 
        }
        else{//Hemos recibido el Estado, no aparece la ventana modal
            $Estado= $_POST["estado"];
        ?>
            <header>    
                <?php
                    include("../header/headerPrincipal.php");
                ?>
            </header>        
            <div class="Principal" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->    
                    <div> 
                        <nav id="Menu" style=" text-align: center; width: 95%; margin: auto;"><!--alfabeto del directorio, en el archivo menu.js esta el código para fijar el abecedario a la parte superior-->
                            <h3 class="directorio_02">Directorio Médico</h3>
                                <?php
                            if($Estado == "Distrito Capital"){ ?>
                                <p class="Inicio_13"><?php echo $Estado;?><a href="directorio.php">(Cambiar)</a></p>
                                <?php
                            } 
                            else{ ?>  
                                <p class="Inicio_13">Estado <?php echo $Estado;?><a href="directorio.php"> (Cambiar)</a></p>
                                <?php 
                            } ?>
                            <div class="ocultarAlfabeto">
                                <ul style="background:; display: flex; list-style: none; justify-content: space-between; ">
                                    <li><span class="hint--top-right hint--info hint--rounded" data-hint="Alergólogo Anestesiólogo Angiólogo"><a href="#marcadorA">A</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorB">B</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint="Cardiólogo, Cirujano Plástico"><a href="#marcadorC">C</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint="Dermatólogo"><a href="#marcadorD">D</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorE">E</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint="Fisiátra"><a href="#marcadorF">F</a></span></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint="Gastroenterólogo, Geriatra, Ginecologo, Gineco-Obstetra"><a href="#marcadorG">G</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorH">H</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint="Imagenólogo Internista"><a href="#marcadorI">I</a></span></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorJ">J</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorK">K</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorL">L</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorM">M</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint="Neurocirujano Neurólogo"><a href="#marcadorN">N</a></span></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorÑ">Ñ</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint="Odontólogo Oftalmólogo Oncólogo Otorrino"><a href="#marcadorO">O</a></span></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint="Pediatra Psicologo Psquiatra Psicopedagogo"><a href="#marcadorP">P</a></span></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorQ">Q</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorR">R</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorS">S</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint="Traumatólogo"><a href="#marcadorT">T</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint="Urológo"><a href="#marcadorU">U</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorV">V</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorW">W</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorX">X</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorY">Y</a></span></li>
                                    <li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorZ">Z</a></span></li>
                                </ul>
                            </div>
                        </nav>
                    <hr style="margin-top: 1%;"> 

                    <div id="Directorio_00">
                        <a name="marcadorA"></a>
                        <div class="directorio">                  
                            <p class="color">Alergólogo</p>
                                <?php
                                include("../conexion/Conexion_BD.php");

                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 10 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                } ?> 
                        </div>
                      
                        <div class="directorio" style="margin-left: ">
                            <a name="marcadorA" class="ancla_1"></a>
                            <p class="color">Anestesiólogo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 36 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>


                        <div class="directorio">                  
                            <p class="color">Angiólogo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 21 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>



                        <a name="marcadorC" class="ancla_1"></a>
                        <div class="directorio">
                            <p class="color">Cardiólogo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 1 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor);                                 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>


                        <div class="directorio">
                        <p class="color">Cirujano Plástico</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 35 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>


                        <div class="directorio">
                        <p class="color">Cirujano Pediatra</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 36 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>


                        
                        <div class="directorio">
                        <a name="marcadorD" class="ancla_1"></a>
                        <p class="color">Dermatólogo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 4 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>

                        
                        <div class="directorio">  
                        <a name="marcadorF" class="ancla_1"></a>             
                        <p class="color">Fisiatra</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 9 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>

                        <div class="directorio">
                        <a name="marcadorG" class="ancla_1"></a>
                        <p class="color">Gastroenterólogo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 17 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>                
                       
                        <div class="directorio">
                        <p class="color">Geriatra</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 11 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>



                        <div class="directorio">
                        <p class="color">Ginecólogo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 7 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>



                        <div class="directorio">
                        <p class="color">Gineco_obstetra</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 20 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>


                        <a name="marcadorI" class="ancla_1"></a>
                        <div class="directorio">
                        <p class="color">Imagenólogo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 12 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>


                        <div class="directorio">
                        <p class="color">Internista</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 5 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>


                        <a name="marcadorN" class="ancla_1"></a>
                        <div class="directorio">
                        <p class="color">Neurocirujano</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad=26 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>

                        <div class="directorio">
                        <p class="color">Neurólogo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 6 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>

                        <div class="directorio">
                        <p class="color">Nutricionista</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 27 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>


                        <a name="marcadorO" class="ancla_1"></a>
                        <div class="directorio">               
                        <p class="color">Odontólogo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 8 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>


                        <div class="directorio">
                        <p class="color">Oftalmólogo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 19 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>

                        <div class="directorio">
                        <p class="color">Oncólogo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 29 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>

                        <div class="directorio">
                        <p class="color">Otorrino</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 16 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>


                        <a name="marcadorP" class="ancla_1"></a>
                        <div class="directorio">               
                        <p class="color">Pediatra</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 15 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>

                        
                        <div class="directorio">               
                        <p class="color">Pediatra Puericultor/Cardiólogo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 37 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>


                        <div class="directorio">
                        <p class="color">Psicólogo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 33 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>


                        <div class="directorio">
                        <p class="color">Psicopedagogo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 13 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>


                        <div class="directorio">
                        <p class="color">Psiquiatra</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 3 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>


                        <a name="marcadorT" class=""></a>
                        <div class="directorio">                               
                        <p class="color">Toxicólogo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 31 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>




                        <div class="directorio">                               
                        <p class="color">Traumatólogo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 18 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>


                        <a name="marcadorU" class=""></a>
                        <div class="directorio">                               
                        <p class="color">Urológo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 14 AND estado= '$Estado' AND mostrar= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        $Key= "qwerty";
                                        $ID_DoctorCifrado= base64_encode($Key . $ID_Doctor); 
                                        echo "<a class='directorio_3' href='perfil_Dir.php?ID_Doctor=$ID_DoctorCifrado'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>
                    </div>
            </div>
        </div>
        <footer>          
            <?php
                include("../header/footer.php");
            ?>  
        </footer>
        <?php } ?>
    </body>
</html>
<!--si se llama la funcion desde el head no funciona-->
<script type="text/javascript"  src="Javascript/menu.js"></script>