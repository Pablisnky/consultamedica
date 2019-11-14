<?php   
    session_start();  //Se reaunada la sesion abierta en validarSesion.php
    /*$verifica = 1906;  
    $_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica*/

    //Oculta todos los errores, desactivarlo para funcionamiento en local y activarlo para remoto
    //error_reporting(0);

   
            if(!isset($_SESSION["UsuarioPaciente"])){//sino esta declarada la variable $_SESSION devuelve a DoctorAfiliado.php, con esto se garantiza que se hizo login, esta $_SESSION se creó en validarSesion.php
                header("location:../DoctorAfiliado.php");           
            }else
            {
                //aqui se almacena el ID_Paciente que se obtuvo en validarSesion.php
                $sesion= $_SESSION["UsuarioPaciente"];
                //echo "<p>ID_Paciente=  $sesion</p>" . "<br>";
            
                include("../conexion/Conexion_BD.php");
            }
?> 

<!DOCTYPE html>
<html lang="es">
    <head>
    	<title>Directorio</title>
    	<meta http-equiv="content-type"  content="text/html"; charset="utf-8"/>
    	<meta name="description" content="Directorio medico, listado de doctores"/>
    	<meta name="keywords" content="directorio, lista, doctores, especialidades"/>
    	<meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     	    
        <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_CitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" href="../css/hint_CSS/hint.css"><!--Formato de barra de abecedario-->
        <link rel="shortcut icon" type="image/png" href="../images/logo.png"> 
            
        <script src="../Javascript/Funciones_varias.js"></script>

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');

            a{
                cursor: pointer;
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
        <h3 class="encabezadoSesion_1">Directorio Médico</h3>        
            <section>  
                <div>  
                    <div id="Directorio_5">
                        <form action="Directorio.php" method="POST">
                         <!--   <label  class="Inicio_1" style="color:black; width: 280px; background-color:; display: inline-block;"> Seleccione un estado</label>
                            <select name="estado" id="Directorio_4" style="width:280px; font-size: 13px;" onchange="this.form.submit()"> 
                                <option>No Aplica en modo Demo</option>
                                <option>San Felipe</option>
                                <option>Yaritagua</option>
                                <option>Cabudare</option>
                                <option>Valencia</option>
                                <option>Los Teques</option>
                                <option></option>
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
                            </select>-->
                        </form>  
                    </div>
                    <div class="ocultarCelda"><!--alfabeto del directorio-->
                        <ul style=" display: flex; list-style: none; justify-content: space-between; ">
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
                            <li><span class="hint--top hint--info hint--rounded" data-hint="Odontólogo Oftalmólogo Otorrino"><a href="#marcadorO">O</a></span></span></li>
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
                    <hr style="margin-top: 1%;"> 

                    <div id="Directorio_00";>
                        <a name="marcadorA" ></a>
                        <div class="directorio">                  
                        <p class="color">Alergólogo</p>
                                <?php
                                include("../conexion/Conexion_BD.php");

                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 10 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>



                        <a name="marcadorA" class="ancla_1"></a>
                        <div class="directorio" style="margin-left: ">
                            <p class="color">Anestesiólogo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 36 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>


                        <a name="marcadorA" ></a>
                        <div class="directorio">                  
                        <p class="color">Angiólogo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 21  ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
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
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 1 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
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
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 37 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>


                        <a name="marcadorD" class="ancla_1"></a>
                        <div class="directorio">
                        <p class="color">Dermatólogo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 4 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>

                        <a name="marcadorF" class="ancla_1"></a>
                        <div class="directorio">               
                        <p class="color">Fisiatra</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 9 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
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
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 17 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
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
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 11 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
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
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 7 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
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
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 20 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
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
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 12 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
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
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 5 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
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
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad=26 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>

                        <a name="marcadorN" class="ancla_1"></a>
                        <div class="directorio">
                        <p class="color">Neurólogo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 6 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
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
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 8 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
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
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 19 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
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
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 16 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
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
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 15 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
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
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 33 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
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
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 13 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
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
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 3 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>


                        <a name="marcadorT" class=""></a>
                        <div class="directorio">                               
                        <p class="color">Traumatólogo</p>
                                <?php
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 18 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
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
                                $Consulta="SELECT ID_Doctor, nombre_doctor, apellido_doctor FROM doctores WHERE ID_Especialidad= 14 ORDER BY nombre_doctor ASC ";
                                $Recordset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Recordset) != 0){
                                    while($Directorio= mysqli_fetch_array($Recordset)){
                                        $nombre= $Directorio["nombre_doctor"];
                                        $apellido= $Directorio["apellido_doctor"];
                                        $ID_Doctor=$Directorio["ID_Doctor"];
                                        echo "<a href='03_2.php?ID_Doctor=$ID_Doctor'>" . $nombre . " " . $apellido .  " " .  "</a>" ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                                    }
                                }
                                else{
                                    echo "<span class='sinRegistros'>Sin registros</span>";
                                }
                            ?> 
                        </div>
                    </div>
            
            </section> 
        </div>
        <footer>
            <?php
                include("../vista/footer.php");
            ?>
        </footer>
    </body>
</html>

<script type="text/javascript"  src="../Javascript/menu.js"></script>
<script type="text/javascript">
function cerrar(){//esta funcion es llamada desde este archivo, abre la ventana del directorio desde la sesion del paciente    

        close();  
    }
</script>