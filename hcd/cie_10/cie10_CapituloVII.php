<?php
//Agrega un nuevo documento a la historia medica de un paciente
    session_start(); 

    include("../../conexion/Conexion_BD.php");//conexion a BD
    mysqli_query($conexion,"SET NAMES 'utf8' ");
    
    $Paciente= $_SESSION["cedulaIdentidad"];//se introduce la cedula mediante $_SESSION
    //echo $Paciente . "<br>";

    $sesion=$_SESSION["UsuarioDoct"];//Se introduce el ID_Doctor por medio de $_SESSION
    //echo $sesion;

    $NombreDoctor = mysqli_query($conexion,"SELECT * FROM doctores WHERE ID_Doctor='$sesion'");
                $UsDoctor= mysqli_fetch_row($NombreDoctor);
                $UsDoctor[1]; //se obtiene el nombre del doctor.

  ?>    
  	<head>
  		<link rel="stylesheet" type="text/css" href="../../css/EstilosCitasMedicas.css"/> 
  	</head>     
  	<style type="text/css">
	a{
		background-color: ;
		display:block;
		line-height: 145%;
	}
	a:hover{
		background-color: #BEBFDD;
	}
	.identar_1{
		padding-left: 2%;
		color:#F4FCFB; 
		box-sizing: border-box;
		padding-top: 0%;
		font-size: 1.4vw;
		background-color: #575DCE;
		margin-top: 1%;
		margin-bottom: -1%;
		height: 4%;
	}
	.identar_2{
		margin-left: 0%;
		font-size: 1.3vw;
		margin-top: 1%;
		background-color: #040652;
		color: #F4FCFB;
		padding-left: 3.5%;
	}
	.identar_3{
		margin-left: 6%;
		margin-top: 1%;
		font-size: 1.2vw;
		font-weight: bolder;
	}
	.identar_4{
		background-color: ;
		margin-left: 8%;
		font-size: 1.1vw;
	}
	.identar_5{
		margin-top: ;
		margin-left: 3%;
		font-size: 1.2vw;
	}

</style>     
	<header class="fixed_1" >
                <div style="width: 75%; float: left; border-right-color: white; border-right-style: solid;border-right-width: 1px; box-sizing: border-box;">
                    <h1 style="cursor: default; font-size: 3vw; height: 60%; padding: 1% 0%; box-sizing: border-box; text-align: center; padding-left: 2%">ConsultaMedica.com.co</h1>
                </div>
                <div style="float: right;  width: 25%;">
                    <?php
                            //Consulta para para colocar el nombre y apellido del Dr que abre sesión
                            $consulta_1="SELECT nombre_doctor, apellido_doctor, sexo FROM doctores WHERE ID_Doctor= '$sesion' ";
                            $Recorset_1=mysqli_query($conexion,$consulta_1);
                            $Doctor_Datos= mysqli_fetch_array($Recorset_1);

                                if($Doctor_Datos["sexo"] == "F"){//femenino
                        ?>
                                    <input class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="Dra. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                    <?php } 
                                else if($Doctor_Datos["sexo"] == "M"){ //Masculino 
                                 ?>  
                                    <input class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="Dr. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                    <?php }
                                else if($Doctor_Datos["sexo"] == ""){ //No especificó
                                ?>
                                <input  class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="<?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                    <?php }                             
                        ?>
                </div>
                <nav class="n41">
                    <div class="n44"><a href="../planBasico/CerrarSesion.php">Cerrar Sesión</a></div>
                    <div class="n44"><a href="../planBasico/InicioSesion_Basico.php" >Consulta</a></div>
                    <div class="n44"><a href="../planBasico/RegistroPacientes_Basico.php"> Mis pacientes</a></div>
                    <div class="n44"><a href="../planBasico/ReporteMensual_Basico.php">Estadisticas</a></div>     
                    <div class="n44"><a href="../planBasico/mostrarPerfilDoctor_Basico.php">Mi perfil</a></div>               
                </nav>
        </header>



<h1 style="cursor: default;">ConsultaMedica.com.co</h1>
<h3>CIE_10</h3>
<p style="text-align: center;">Clasificación Internacional de Enfermedades</p>
<p class="Inicio_1">Capítulo VII: Enfermedades del ojo y sus anexos.</p>
<br><br>

	<a class="identar_5" style="margin-top: 2%;" href="#marcador_01">(H00-H06) Trastornos del parpado, aparato lagrimal y órbita</a>
	<a class="identar_5" href="#marcador_02">(H10-H13) Trastornos de la conjuntiva</a>
	<a class="identar_5" href="#marcador_03">(H15-H19) Trastornos de la esclerótica y de la córnea</a>
	<a class="identar_5" href="#marcador_04">(H20-H22) Trastornos del iris y del cuerpo ciliar</a>
	<a class="identar_5" href="#marcador_05">(H25-H28) Trastornos del cristalino</a>
	<a class="identar_5" href="#marcador_06">(H30-H36) Trastornos de la coroides y la retina</a>
	<a class="identar_5" href="#marcador_07">(H40-H42) Glaucomas</a>
	<a class="identar_5" href="#marcador_08">(H43-H45) Trastornos del humor vítreo y del globo ocular</a>
	<a class="identar_5" href="#marcador_09">(H46-H48) Trastornos del nervio óptico y los campos visuales</a>
	<a class="identar_5" href="#marcador_10">(H49-H52) Trastorno de los músculos oculares, de los movimientos binoculares, de la acomodación y la refracción</a>
	<a class="identar_5" href="#marcador_11">(H53-H54) Alteraciones visuales y ceguera</a>
	<a class="identar_5" style="margin-bottom: 10%;"  href="#marcador_12">(H55-H59) Otros trastornos del ojo y anexos</a>





<a id="marcador_01" class="ancla"></a>
	<p class="identar_2" style="margin-top: 3%;">(H00-H06) Trastornos del parpado, aparato lagrimal y órbita</p>
		<a class="identar_3">(H00) Orzuelo y chalazion</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico_3=(H00-H06) Trastornos del parpado, aparato lagrimal y órbita&Diagnostico_2=(H00) Orzuelo y chalazion&Diagnostico_1=(H00.0) Orzuelo y otras inflamaciones profundas del párpado">(H00.0) Orzuelo y otras inflamaciones profundas del párpado</a>



			
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H00.1) Chalazion">(H00.1) Chalazion</a>
		<a class="identar_3">(H01) Otras inflamaciones del párpado</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H01.0) Blefaritis">(H01.0) Blefaritis</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H01.1) Dermatosis no infecciosa del párpado">(H01.1) Dermatosis no infecciosa del párpado</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H01.8) Otras inflamaciones especificadas del párpado">(H01.8) Otras inflamaciones especificadas del párpado</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H01.9) Inflamación del párpado, no especificada">(H01.9) Inflamación del párpado, no especificada</a>
		<a class="identar_3">(H02) Otros trastornos de los párpados</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H02.0) Entropión y triquiasis palpebral">(H02.0) Entropión y triquiasis palpebral</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H02.1) Ectropión del párpado">(H02.1) Ectropión del párpado</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H02.2) Lagoftalmos">(H02.2) Lagoftalmos</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H02.3) Blefarocalasia">(H02.3) Blefarocalasia</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H02.4) Blefaroptosis">(H02.4) Blefaroptosis</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H02.5) Otros trastornos funcionales del párpado">(H02.5) Otros trastornos funcionales del párpado</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H02.6) Xantelasma del párpado">(H02.6) Xantelasma del párpado</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H02.7) Otros trastornos degenerativos del párpado y del área periocular">(H02.7) Otros trastornos degenerativos del párpado y del área periocular</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H02.8) Otros trastornos especificados del párpado">(H02.8) Otros trastornos especificados del párpado</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H02.9) Trastorno del párpado, no especificado">(H02.9) Trastorno del párpado, no especificado</a>
<a class="identar_3">(H03) Trastornos del párpado en enfermedades clasificadas en otra parte</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H03.0) Infección e infestación parasitarias del párpado en enfermedades clasificadas en otra parte">(H03.0) Infección e infestación parasitarias del párpado en enfermedades clasificadas en otra parte</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H03.1) Compromiso del párpado en enfermedades infecciosas clasificadas en otra parte">(H03.1) Compromiso del párpado en enfermedades infecciosas clasificadas en otra parte</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H03.2) Compromiso del párpado en enfermedades clasificadas en otra parte">(H03.2) Compromiso del párpado en enfermedades clasificadas en otra parte</a>
<a class="identar_3">(H04) Trastornos del aparato lagrimal</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H04.0) Dacrioadenitis">(H04.0) Dacrioadenitis</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H04.1) Otros trastornos de la glándula lagrimal">(H04.1) Otros trastornos de la glándula lagrimal</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H04.2) Epífora">(H04.2) Epífora</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H04.3) Inflamación aguda y las no especificadas en otra parte">(H04.3) Inflamación aguda y las no especificadas en otra parte</a>
<a class="identar_4">(H04.4) Inflamación crónica de las vías lagrimales</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H04.5) Estenosis e insuficiencia de las vías lagrimales">(H04.5) Estenosis e insuficiencia de las vías lagrimales</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H04.6) Otros cambios de las vías lagrimales">(H04.6) Otros cambios de las vías lagrimales</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H04.8) Otros trastornos especificados del aparato lagrimal>(H04.8) Otros trastornos especificados del aparato lagrimal</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H04.9) Trastorno del aparato lagrimal, no especificado">(H04.9) Trastorno del aparato lagrimal, no especificado</a>
<a class="identar_3">(H05) Trastornos de la órbita</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H05.0) Inflamación aguda de la órbita">(H05.0) Inflamación aguda de la órbita</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H05.1) Trastornos inflamatorios crónicos de la órbita">(H05.1) Trastornos inflamatorios crónicos de la órbita</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H05.2) Afecciones exoftálmicas">(H05.2) Afecciones exoftálmicas</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H05.3) Deformidad de la órbita">(H05.3) Deformidad de la órbita</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H05.4) Enoftalmía">(H05.4) Enoftalmía</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H05.5) Retención de cuerpo extraño, consecutiva a herida penetrante de la órbita">(H05.5) Retención de cuerpo extraño, consecutiva a herida penetrante de la órbita</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H05.8) Otros trastornos de la órbita">(H05.8) Otros trastornos de la órbita</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H05.9) Trastorno de la órbita, no especificado">(H05.9) Trastorno de la órbita, no especificado</a>
<a class="identar_3">(H06) Trastornos del aparato lagrimal y de la órbita en enfermedades clasificadas en otra parte</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H06.0) Trastornos del aparato lagrimal en enfermedades clasificadas en otra parte">(H06.0) Trastornos del aparato lagrimal en enfermedades clasificadas en otra parte</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H06.1) Infección e infestación parasitarias de la órbita en enfermedades clasificadas en otra parte">(H06.1) Infección e infestación parasitarias de la órbita en enfermedades clasificadas en otra parte</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H06.2) Exoftalmia hipertiroidea">(H06.2) Exoftalmia hipertiroidea</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H06.3) Otros trastornos de la órbita en enfermedades clasificadas en otra parte">(H06.3) Otros trastornos de la órbita en enfermedades clasificadas en otra parte</a>




<a id="marcador_02" class="ancla"></a>
	<p class="identar_2" style="margin-top: 6%;" >(H10-H13) Trastornos de la conjuntiva</p>
		<a class="identar_3">(H10) Conjuntivitis</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H10.0) Conjuntivitis mucopurulenta">(H10.0) Conjuntivitis mucopurulenta</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H10.1) Conjuntivitis atópica aguda">(H10.1) Conjuntivitis atópica aguda</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H10.2) Otras conjuntivitis agudas">(H10.2) Otras conjuntivitis agudas</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H10.3) Conjuntivitis aguda, no especificada">(H10.3) Conjuntivitis aguda, no especificada</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H10.4) Conjuntivitis crónica">(H10.4) Conjuntivitis crónica</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H10.5) Blefaroconjuntivitis">(H10.5) Blefaroconjuntivitis</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H10.8) Otras conjuntivitis">(H10.8) Otras conjuntivitis</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H10.9) Conjuntivitis, no especificada">(H10.9) Conjuntivitis, no especificada</a>
		<a class="identar_3">(H11) Otros trastornos de la conjuntiva</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H11.0) Pterigión">(H11.0) Pterigión</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H11.1) Degeneraciones y depósitos conjuntivales">(H11.1) Degeneraciones y depósitos conjuntivales</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H11.2) Cicatrices conjuntivales">(H11.2) Cicatrices conjuntivales</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H11.3) Hemorragia conjuntival">(H11.3) Hemorragia conjuntival</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H11.4) Otros trastornos vasculares y quistes conjuntivales">(H11.4) Otros trastornos vasculares y quistes conjuntivales</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H11.8) Otros trastornos especificados de la conjuntiva">(H11.8) Otros trastornos especificados de la conjuntiva</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H11.9) Trastorno de la conjuntiva, no especificado">(H11.9) Trastorno de la conjuntiva, no especificado</a>
		<a class="identar_3">(H13) Trastornos de la conjuntiva en enfermedades clasificadas en otra parte</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H13.0) Infección filárica de la conjuntiva">(H13.0) Infección filárica de la conjuntiva</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H13.1) Conjuntivitis en enfermedades infecciosas parasitarias clasificadas en otra parte">(H13.1) Conjuntivitis en enfermedades infecciosas parasitarias clasificadas en otra parte</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H13.2) Conjuntivitis en otras enfermedades clasificadas en otra parte">(H13.2) Conjuntivitis en otras enfermedades clasificadas en otra parte</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H13.3) Penfigoide ocular">(H13.3) Penfigoide ocular</a>
			<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H13.8) Otros trastornos de la conjuntiva en enfermedades clasificadas en otra parte">(H13.8) Otros trastornos de la conjuntiva en enfermedades clasificadas en otra parte</a>


<a id="marcador_03" class="ancla"></a>
<p class="identar_2" style="margin-top: 6%;">(H15-H19) Trastornos de la esclerótica y de la córnea</p>
<a class="identar_3">(H15) Trastornos de la esclerótica</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H15.0) Escleritis">(H15.0) Escleritis</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H15.1) Episcleritis">(H15.1) Episcleritis</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H15.8) Otros trastornos de la esclerótica">(H15.8) Otros trastornos de la esclerótica</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=Ectasia escleral">Ectasia escleral</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=Estafiloma">Estafiloma</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=Excluye: miopia degenerativa (H44.2)">Excluye: miopia degenerativa (H44.2)</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H15.9) Trastorno de la esclerótica, no especificado">(H15.9) Trastorno de la esclerótica, no especificado</a>
<a class="identar_3" href="../diagnostico_Basico_2.php?Diagnostico=(H16) Queratitis">(H16) Queratitis</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H16.0) Úlcera de córnea">(H16.0) Úlcera de córnea</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H16.1) Otras queratitis superficiales sin conjuntivitis">(H16.1) Otras queratitis superficiales sin conjuntivitis</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H16.2) Queratoconjuntivitis">(H16.2) Queratoconjuntivitis</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H16.3) Queratitis intersticial y profunda">(H16.3) Queratitis intersticial y profunda</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H16.4) Neovascularización corneal">(H16.4) Neovascularización corneal</a>
<a class="identar_3">(H17) Cicatrices y opacidades córneales</a>
<a class="identar_3">(H18) Otros trastornos de la córnea</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H18.0) Pigmentaciones y depósitos corneales">(H18.0) Pigmentaciones y depósitos corneales</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H18.1) Queratopatía bullosa">(H18.1) Queratopatía bullosa</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H18.2) Otros edemas corneales">(H18.2) Otros edemas corneales</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H18.3) Cambios en membranas corneales">(H18.3) Cambios en membranas corneales</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H18.4) Degeneración corneal">(H18.4) Degeneración corneal</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H18.5) Distrofias corneales hereditarias">(H18.5) Distrofias corneales hereditarias</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H18.6) Queratocono">(H18.6) Queratocono</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H18.7) Otras deformidades corneales">(H18.7) Otras deformidades corneales</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H18.8) Otros trastornos especificados de córnea">(H18.8) Otros trastornos especificados de córnea</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H18.9) Trastorno de córnea sin especificar">(H18.9) Trastorno de córnea sin especificar</a>
<a class="identar_3">(H19) Trastornos de la esclerótica y la córnea en enfermedades clasificadas en otra parte</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H19.0) Escleritis y Episcleritis en enfermedades clasificadas en otra parte">(H19.0) Escleritis y Episcleritis en enfermedades clasificadas en otra parte</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H19.1) Queratitis y Queratoconjuntivitis herpesviral">(H19.1) Queratitis y Queratoconjuntivitis herpesviral</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H19.2) Queratitis y Queratoconjuntivitis en otras enfermedades infecciosas y parásitas">(H19.2) Queratitis y Queratoconjuntivitis en otras enfermedades infecciosas y parásitas</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H19.3) Queratitis y Queratoconjuntivitis en otras enfermedades clasificadas en otra parte">(H19.3) Queratitis y Queratoconjuntivitis en otras enfermedades clasificadas en otra parte</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H19.8) Otros trastornos de la esclerótica y la córnea en enfermedades clasificadas en otra parte">(H19.8) Otros trastornos de la esclerótica y la córnea en enfermedades clasificadas en otra parte</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(T15.0) Cuerpo extraño en córnea">(T15.0) Cuerpo extraño en córnea</a>


<a id="marcador_04" class="ancla"></a>
<p class="identar_2" style="margin-top: 6%;">(H20-H22) Trastornos del iris y del cuerpo ciliar</p>
<a class="identar_3">(H20) Iridociclitis</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H20.0) Iridociclitis aguda y subaguda">(H20.0) Iridociclitis aguda y subaguda</a>
<a class="identar_3">(H21) Otros trastornos del iris y del cuerpo ciliar</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H21.0) Hifema">(H21.0) Hifema</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H21.1) Otros trastornos vasculares del iris y del cuerpo ciliar">(H21.1) Otros trastornos vasculares del iris y del cuerpo ciliar</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H21.2) Degeneración del iris y el cuerpo ciliar">(H21.2) Degeneración del iris y el cuerpo ciliar</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H21.3) Quiste del iris, del cuerpo ciliar y de la cámara anterior">(H21.3) Quiste del iris, del cuerpo ciliar y de la cámara anterior</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H21.4) Membranas pupilares">(H21.4) Membranas pupilares</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H21.5) Otras adhesiones y disrupciones del iris y del cuerpo ciliar">(H21.5) Otras adhesiones y disrupciones del iris y del cuerpo ciliar</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H21.8) Otros trastornos especificados del iris y del cuerpo ciliar">(H21.8) Otros trastornos especificados del iris y del cuerpo ciliar</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H21.9) Uveítis">(H21.9) Uveítis</a>
<a class="identar_3">(H22) Trastornos del iris y del cuerpo ciliar en enfermedades clasificadas en otra parte</a>


<a id="marcador_05" class="ancla"></a>
<p class="identar_2" style="margin-top: 6%;">(H25-H28) Trastornos del cristalino</p>
<a class="identar_3">(H25) Catarata senil</a>
<a class="identar_3">(H26) Otras cataratas</a>
<a class="identar_3">(H27) Otros trastornos del cristalino</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H27.0) Afaquia">(H27.0) Afaquia</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H27.1) Dislocación del cristalino">(H27.1) Dislocación del cristalino</a>
<a class="identar_3">(H28) Cataratas y otros trastornos del cristalino en enfermedades clasificadas en otra parte</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(Z96.1) Pseudofaquia">(Z96.1) Pseudofaquia</a>


<a id="marcador_06" class="ancla"></a>
<p class="identar_2" style="margin-top: 6%;">(H30-H36) Trastornos de la coroides y la retina</p>
<a class="identar_3">(H30) Inflamación coriorretiniana</a>
<a class="identar_3">(H31) Otros trastornos coroideos
<a class="identar_3">(H32) Trastornos coriorretinales en enfermedades clasificadas en otra parte</a>
<a class="identar_3">(H33) Desprendimiento de retina con ruptura</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H33.1) Retinosquisis y quistes retinales">(H33.1) Retinosquisis y quistes retinales</a>
<a class="identar_3">(H34) Oclusiones vasculares retinales</a>
<a class="identar_3">(H35) Otros trastornos retinianos</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H35.0) Retinopatía de fondo y cambios vasculares retinales">(H35.0) Retinopatía de fondo y cambios vasculares retinales</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H35.1) Retinopatía de la prematuridad">(H35.1) Retinopatía de la prematuridad</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H35.3) Degeneración de la mácula y el polo posterior">(H35.3) Degeneración de la mácula y el polo posterior</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H35.5) Distrofia hereditaria retiniana">(H35.5) Distrofia hereditaria retiniana</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H35.6) Hemorragia retiniana">(H35.6) Hemorragia retiniana</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H35.8) Otros trastornos de la retina especificados">(H35.8) Otros trastornos de la retina especificados</a>
<a class="identar_3">(H36) Trastornos retinianos en enfermedades clasificadas en otra parte</a>


<a id="marcador_07" class="ancla"></a>
<p class="identar_2" style="margin-top: 3%;">(H40-H42) Glaucomas</p>
<a class="identar_3">(H40) Glaucoma</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H40.0) Glaucoma sospechoso">(H40.0) Glaucoma sospechoso</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H40.1) Glaucoma primario de ángulo abierto">(H40.1) Glaucoma primario de ángulo abierto</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H40.2) Glaucoma primario de ángulo cerrado">(H40.2) Glaucoma primario de ángulo cerrado</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H40.3) Glaucoma secundario por trauma ocular">(H40.3) Glaucoma secundario por trauma ocular</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H40.4) Glaucoma secundario por inflamación ocular">(H40.4) Glaucoma secundario por inflamación ocular</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H40.5) Glaucoma secundario por otros trastornos ocular">(H40.5) Glaucoma secundario por otros trastornos ocular</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H40.6) Glaucoma secundario por medicamentos">(H40.6) Glaucoma secundario por medicamentos</a>
<a class="identar_3">(H42) Glaucoma en enfermedades clasificadas en otra parte</a>


<a id="marcador_08" class="ancla"></a>
<p class="identar_2" style="margin-top: 6%;">(H43-H45) Trastornos del humor vítreo y del globo ocular</p>
<a class="identar_3">(H43) Trastornos del humor vítreo</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H43.0) Prolapso vítreo">(H43.0) Prolapso vítreo</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H43.1) Hemorragia vítrea">(H43.1) Hemorragia vítrea</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H43.2) Depósitos cristalinos en el humor vítreo">(H43.2) Depósitos cristalinos en el humor vítreo</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H43.3) Otras opacidades vítreas">(H43.3) Otras opacidades vítreas</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H43.8) Otros trastornos del humor vítreo">(H43.8) Otros trastornos del humor vítreo</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H43.9) Trastorno del humor vítreo sin especificar">(H43.9) Trastorno del humor vítreo sin especificar</a>
<a class="identar_3">(H44) Trastornos del globo ocular</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H44.0) Endoftalmitis purulenta">(H44.0) Endoftalmitis purulenta</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H44.1) Otras endoftalmitis">(H44.1) Otras endoftalmitis</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H44.2) Miopía degenerativa">(H44.2) Miopía degenerativa</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H44.3) Otros trastornos degenerativos del globo ocular">(H44.3) Otros trastornos degenerativos del globo ocular</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H44.4) Hipotonía ocular">(H44.4) Hipotonía ocular</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H44.5) Enfermedades degenerativas del globo ocular">(H44.5) Enfermedades degenerativas del globo ocular</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H44.6) Cuerpo extraño intraocular retenido (viejo) magnético">(H44.6) Cuerpo extraño intraocular retenido (viejo) magnético</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H44.7) Cuerpo extraño intraocular retenido (viejo) no-magnético">(H44.7) Cuerpo extraño intraocular retenido (viejo) no-magnético</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H44.8) Otros trastornos del globo ocular">(H44.8) Otros trastornos del globo ocular</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H44.9) Trastorno del globo ocular sin especificar">(H44.9) Trastorno del globo ocular sin especificar</a>
<a class="identar_3">(H45) Trastornos del cuerpo vítreo y el globo ocular en enfermedades clasificadas en otra parte</a>


<a id="marcador_09" class="ancla"></a>
<p class="identar_2" style="margin-top: 6%;">(H46-H48) Trastornos del nervio óptico y los campos visuales</p>
<a class="identar_3">(H46) Neuritis óptica</a>
<a class="identar_3">(H47) Otros trastornos del segundo nervio óptico y los campos visuales</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H47.1) Papiledema sin especificar">(H47.1) Papiledema sin especificar</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H47.2) Atrofia óptica">(H47.2) Atrofia óptica</a>
<a class="identar_3">(H48) Trastornos del segundo nervio óptico y los campos visuales en enfermedades clasificadas en otra parte</a>


<a id="marcador_10" class="ancla"></a>
<p class="identar_2" style="margin-top: 6%;">(H49-H52) Trastorno de los músculos oculares, de los movimientos binoculares, de la acomodación y la refracción</p>
<a class="identar_3">(H49) Estrabismo paralítico
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H49.0) Parálisis del tercer par craneal (motor ocular común)">(H49.0) Parálisis del tercer par craneal (motor ocular común)</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H49.1) Parálisis del cuarto par craneal (patético o troclear)">(H49.1) Parálisis del cuarto par craneal (patético o troclear)</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H49.2) Parálisis del sexto par craneal(abductor)">(H49.2) Parálisis del sexto par craneal(abductor)</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H49.3) Oftalmoplejia total (externa)">(H49.3) Oftalmoplejia total (externa)</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H49.4) Oftalmoplejia progresiva externa">(H49.4) Oftalmoplejia progresiva externa</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H49.8) Otros estrabismos paralíticos">(H49.8) Otros estrabismos paralíticos</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H49.9) Estrabismo paralítico sin especificar">(H49.9) Estrabismo paralítico sin especificar</a>
<a class="identar_3">(H50) Otros estrabismos</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H50.0) Estrabismo concomitante convergente">(H50.0) Estrabismo concomitante convergente</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H50.1) Estrabismo concomitante divergente">(H50.1) Estrabismo concomitante divergente</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H50.2) Estrabismo vertical">(H50.2) Estrabismo vertical</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H50.3) Heterotropía intermitente">(H50.3) Heterotropía intermitente</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H50.4) Otras heterotropías y heterotropías sin especificar">(H50.4) Otras heterotropías y heterotropías sin especificar</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H50.5) Heteroforia">(H50.5) Heteroforia</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H50.6) Estrabismo mecánica">(H50.6) Estrabismo mecánica</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H50.8) Otros estrabismos especificados">(H50.8) Otros estrabismos especificados</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H50.9) Estrabismos sin especificar">(H50.9) Estrabismos sin especificar</a>
<a class="identar_3">(H51) Otros trastornos del movimiento binocular</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H51.0) Parálisis de la mirada conjugada">(H51.0) Parálisis de la mirada conjugada</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H51.1) Exceso e insuficiencia de convergencia">(H51.1) Exceso e insuficiencia de convergencia</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H51.2) Oftalmoplejia internuclear">(H51.2) Oftalmoplejia internuclear</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H51.8) Otros trastornos del movimiento binocular especificados">(H51.8) Otros trastornos del movimiento binocular especificados</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H51.9) Trastorno del movimiento binocular sin especificar">(H51.9) Trastorno del movimiento binocular sin especificar</a>
<a class="identar_3">(H52) Trastornos de refracción y acomodación</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H52.0) Hipermetropía">(H52.0) Hipermetropía</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H52.1) Miopía">(H52.1) Miopía</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H52.2) Astigmatismo">(H52.2) Astigmatismo</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H52.3) Anisometropía y aniseiconía">(H52.3) Anisometropía y aniseiconía</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H52.4) Presbicia">(H52.4) Presbicia</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H52.5) Trastornos de acomodación">(H52.5) Trastornos de acomodación</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H52.6) Otros trastornos de refracción">(H52.6) Otros trastornos de refracción</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H52.7) Trastorno de refracción sin especificar">(H52.7) Trastorno de refracción sin especificar</a>


<a id="marcador_11" class="ancla"></a>
<p class="identar_2" style="margin-top: 6%;">(H53-H54) Alteraciones visuales y ceguera</p>
<a class="identar_3">(H53) Alteraciones visuales</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H53.0) Ambliopía y anopsia">(H53.0) Ambliopía y anopsia</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H53.1) Alteraciones visuales subjetivas">(H53.1) Alteraciones visuales subjetivas</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H53.2) Diplopía">(H53.2) Diplopía</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H53.3) Otros trastornos de la visión binocular">(H53.3) Otros trastornos de la visión binocular</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H53.4) Defectos del campo visual">(H53.4) Defectos del campo visual</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H53.5) Daltonismo">(H53.5) Daltonismo</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H53.6) Nictalopia">(H53.6) Nictalopia</a>
<a class="identar_3">(H54) Ceguera y baja visión</a>


<a id="marcador_12" class="ancla"></a>
<p class="identar_2" style="margin-top: 6%;">(H55-H59) Otros trastornos del ojo y anexos</p>
<a class="identar_3">(H55) Nistagmo y otros movimientos irregulares del ojo</a>
<a class="identar_3">(H57) Otros trastornos del ojo y anexos</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H57.0) Anomalías de la función pupilar">(H57.0) Anomalías de la función pupilar</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H57.1) Dolor ocular">(H57.1) Dolor ocular</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H57.9) Trastorno del ojo y anexos sin especificar">(H57.9) Trastorno del ojo y anexos sin especificar</a>
<a class="identar_3">(H58) Otros trastornos del ojo y anexos en enfermedades clasificadas en otra parte</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H58.0) Anomalías de la función pupilar en enfermedades clasificadas en otra parte">(H58.0) Anomalías de la función pupilar en enfermedades clasificadas en otra parte</a>
<a class="identar_4" href="../diagnostico_Basico_2.php?Diagnostico=(H59) Trastornos postprocedurales del ojo y anexos no clasificadas en otra parte" style="padding-bottom: 30%;">(H59) Trastornos postprocedurales del ojo y anexos no clasificadas en otra parte</a>