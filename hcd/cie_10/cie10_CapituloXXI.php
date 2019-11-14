<?php
//Agrega un nuevo documento a la historia medica de un paciente
    session_start(); 

    include("../../conexion/Conexion_BD.php");//conexion a BD
    
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
  	   
  	<style type="text/css">
		a{
			background-color: ;
			display:block;
			line-height: 145%;
		}
		a:hover{
			background-color: #BEBFDD;
		}
		.identar_check_2{
			margin-left: 3%;
			margin-top: 20px;
			margin-right:0.5%;
			float: left;
			vertical-align:middle;
		}
		.identar_check_3{
			margin-left: 3%;
			margin-top: 19px;
			margin-right:0.5%;
			float: left;
			vertical-align:middle;
		}
		.identar_check_4{
			margin-left: 5%;
			float: left;
			vertical-align:middle;
			margin-top: 5px;
			margin-right:0.5%;
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
			display: block;
			cursor: pointer;
			display:block;
		}
		.identar_3{
			background-color: ;
			margin-left: 0%;
			font-size: 14px;
			line-height: 150%;
			cursor: pointer;
			display:block;
			margin-top: 1%;
			font-weight: bolder;
		}
		.identar_3:hover{
			background-color: #BEBFDD;
		}
		.identar_4{
			background-color: ;
			margin-left: 0%;
			font-size:14px;	
			line-height: 150%;
			cursor: pointer;
			display:block;
			color:#040652;
		}
		.identar_4:hover{
			background-color: #BEBFDD;
		}
		.identar_5{
			margin-top: ;
			margin-left: 3%;
			font-size: 1.2vw;
		}

	</style>  
		
   <script src="../../Javascript/Funciones_varias.js"></script> 
	 
	</head>  
	<body>
		<?php
			include("../../vista/headerCIE_10.php");
		?>

<link rel="stylesheet" type="text/css" href="../../css/EstilosCitasMedicas.css"/> 
<h3 style="margin-top: 10%;" >CIE_10   Capitulo XXI</h3>
<p style="text-align: center;">Clasificación Internacional de Enfermedades</p>
<p class="Inicio_1">Capítulo XXI: Factores que influyen en el estado de salud y contacto con los servicios de salud</p>
<br><br>





<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->


	<a class="identar_5" href="#marcador_01" style="margin-top: 2%;">(Z00- Z13) Pruebas para aclarar o investigar problemas de salud</a>
	<a class="identar_5" href="#marcador_02">(Z20- Z29) Contactos y exposición a enfermedades contagiosas</a>
	<a class="identar_5" href="#marcador_03">(Z30-Z39) Intervenciones relativas a la reproducción</a>
	<a class="identar_5" href="#marcador_04">(Z40-Z54) Personas candidatas a cirugía</a>
	<a class="identar_5" href="#marcador_05">(Z55-Z65) Personas con problemas potenciales psíquicos o psicosociales</a>
	<a class="identar_5" href="#marcador_06">(Z70-Z76) Consultas</a>
	<a class="identar_5" href="#marcador_07" style="margin-bottom: 10%;">(Z80-Z99) Historias</a>

<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->











<a id="marcador_01" class="ancla"></a>
<input type="checkbox" class="identar_check_2"  name="diagnostico[]" id="Z00- Z13" value="<?php echo '';?>">
<label class="identar_2" for="Z00- Z13">(Z00- Z13) Pruebas para aclarar o investigar problemas de salud.</label>
	<input type="checkbox" class="identar_check_3"  name="diagnostico[]" id="Z00" value="<?php echo '';?>">
	<label class="identar_3" for="Z00">(Z00) Examen general e investigación de personas sin quejas o sin diagnóstico informado.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="Z00.0" value="<?php echo '';?>">
		<label class="identar_4" for="Z00.0">(Z00.0) Examen médico general.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="Z00.1" value="<?php echo '';?>">
		<label class="identar_4" for="Z00.1">(Z00.1) Control de salud de rutina del niño.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="Z00.2" value="<?php echo '';?>">
		<label class="identar_4" for="Z00.2">(Z00.2) Examen durante el período de crecimiento rápido en la infancia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="Z00.3" value="<?php echo '';?>">
		<label class="identar_4" for="Z00.3">(Z00.3) Examen del estado de desarrollo del adolescente.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="Z00.4" value="<?php echo '';?>">
		<label class="identar_4" for="Z00.4">(Z00.4) Examen psiquiátrico general, no clasificado en otra parte.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="Z00.5" value="<?php echo '';?>">
		<label class="identar_4" for="Z00.5">(Z00.5) Examen de donante potencial de órgano o tejido.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="Z00.6" value="<?php echo '';?>">
		<label class="identar_4" for="Z00.6">(Z00.6) Examen para comparación y control normales en programa de investigación clínica.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="Z00.8" value="<?php echo '';?>">
		<label class="identar_4" for="Z00.8">(Z00.8) Otros exámenes generales.</label>


	<label class="identar_3" for="Z01">(Z01) Otros exámenes especiales e investigaciones en personas sin quejas o sin diagnóstico informado.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z01.0) Examen de ojos y de la visión.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z01.1) Examen de oídos y de la audición.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z01.2) Examen odontológico.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z01.3) Examen de la presión sanguínea.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z01.4) Examen ginecológico (general) (de rutina).</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z01.5) Pruebas de sensibilización y diagnóstico cutáneo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z01.6) Examen radiológico, no clasificado en otra parte.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z01.7) Examen de laboratorio.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z01.8) Otros exámenes especiales especificados.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z01.9) Examen especial no especificado.</label>
	

	<label class="identar_3" for="Z02">(Z02) Exámenes y contactos para fines administrativos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z02.0) Examen para admisión a instituciones educativas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z02.1) Examen preempleo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z02.2) Examen para admisión a instituciones residenciales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z02.3) Examen para reclutamiento en las fuerzas armadas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z02.4) Examen para obtención de licencia de conducir.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z02.5) Examen para participación en competencias deportivas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z02.6) Examen para fines de seguros.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z02.7) Extensión de certificado médico.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z02.8) Otros exámenes para fines administrativos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z02.9) Examen para fines administrativos, no especificado.</label>


	<label class="identar_3" for="Z03">(Z03) Observación y evaluación médicas por sospecha de enfermedades y afecciones.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z03.0) Observación por sospecha de tuberculosis.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z03.1) Observación por sospecha de tumor maligno.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z03.2) Observación por sospecha de trastorno mental y del comportamiento.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z03.3) Observación por sospecha de trastorno del sistema nervioso.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z03.4) Observación por sospecha de infarto de miocardio.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z03.5) Observación por sospecha de otras enfermedades cardiovasculares.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z03.6) Observación por sospecha de efectos tóxicos de sustancias ingeridas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z03.8) Observación por sospecha de otras enfermedades y afecciones.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z03.9) Observación por sospecha de enfermedad o afección no especificada.</label>


	<label class="identar_3" for="Z04">(Z04) Examen y observación por otras razones.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z04.0) Prueba de alcohol o drogas en la sangre.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z04.1) Examen y observación consecutivos a accidente de transporte.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z04.2) Examen y observación consecutivos a accidente de trabajo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z04.3) Examen y observación consecutivos a otro accidente.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z04.4) Examen y observación consecutivos a denuncia de violación y seducción.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z04.5) Examen y observación consecutivos a otra lesión infligida.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z04.6) Examen psiquiátrico general, solicitado por una autoridad.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z04.8) Examen y observación por otras razones especificadas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z04.9) Examen y observación por razones no especificadas.</label>
	

	<label class="identar_3" for="Z08">(Z08) Examen de seguimiento consecutivo al tratamiento por tumor maligno.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z08.0) Examen de seguimiento consecutivo a cirugía por tumor maligno.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z08.1) Examen de seguimiento consecutivo a radioterapia por tumor maligno.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z08.2) Examen de seguimiento consecutivo a quimioterapia por tumor maligno.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z08.7) Examen de seguimiento consecutivo a tratamiento combinado por tumor maligno.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z08.8) Examen de seguimiento consecutivo a otro tratamiento por tumor maligno.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z08.9) Examen de seguimiento consecutivo a tratamiento no especificado por tumor maligno.</label>


	<label class="identar_3" for="Z09">(Z09) Examen de seguimiento consecutivo a tratamiento por otras afecciones diferentes a tumores malignos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z09.0) Examen de seguimiento consecutivo a cirugía por otras afecciones.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z09.1) Examen de seguimiento consecutivo a radioterapia por otras afecciones.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z09.2) Examen de seguimiento consecutivo a quimioterapia por otras afecciones.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z09.3) Examen de seguimiento consecutivo a psicoterapia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z09.4) Examen de seguimiento consecutivo a tratamiento de fractura.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z09.7) Examen de seguimiento consecutivo a tratamiento combinado por otras afecciones.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z09.8) Examen de seguimiento consecutivo a otro tratamiento por otras afecciones.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z09.9) Examen de seguimiento consecutivo a tratamiento no especificado por otras afecciones.</label>


	<label class="identar_3" for="Z10">(Z10) Control general de salud de rutina de subpoblaciones definidas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z10.0) Examen de salud ocupacional.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z10.1) Control general de salud de rutina de residentes de instituciones.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z10.2) Control general de salud de rutina a miembros de las fuerzas armadas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z10.3) Control general de salud de rutina a integrantes de equipos deportivos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z10.8) Otros controles generales de salud de rutina de otras subpoblaciones definidas.</label>
	

	<label class="identar_3" for="Z11">(Z11) Examen de pesquisa especial para enfermedades infecciosas y parasitarias.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z11.0) Examen de pesquisa especial para enfermedades infecciosas intestinales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z11.1) Examen de pesquisa especial para tuberculosis respiratoria.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z11.2) Examen de pesquisa especial para otras enfermedades bacterianas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z11.3) Examen de pesquisa especial para infecciones de transmisión predominantemente sexual.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z11.4) Examen de pesquisa especial para el virus de la inmunodeficiencia humana [VIH].</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z11.5) Examen de pesquisa especial para otras enfermedades virales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z11.6) Examen de pesquisa especial para otras enfermedades debidas a protozoarios y helmintos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z11.8) Examen de pesquisa especial para otras enfermedades infecciosas y parasitarias especificadas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z11.9) Examen de pesquisa especial para enfermedades infecciosas y parasitarias no especificadas.</label>
	

	<label class="identar_3" for="Z12">(Z12) Examen de pesquisa especial para tumores.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z12.0) Examen de pesquisa especial para tumor de estómago.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z12.1) Examen de pesquisa especial para tumor del intestino.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z12.2) Examen de pesquisa especial para tumores de órganos respiratorios.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z12.3) Examen de pesquisa especial para tumor de la mama.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z12.4) Examen de pesquisa especial para tumor del cuello uterino.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z12.5) Examen de pesquisa especial para tumor de la próstata.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z12.6) Examen de pesquisa especial para tumor de la vejiga.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z12.8) Examen de pesquisa especial para tumores de otros sitios.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z12.9) Examen de pesquisa especial para tumor de sitio no especificado.</label>
	

	<label class="identar_3" for="Z13">(Z13) Examen de pesquisa especial para otras enfermedades y trastornos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z13.0) Examen de pesquisa especial para enfermedades de la sangre y órganos hematopoyéticos y ciertos trastornos del mecanismo de la inmunidad.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z13.1) Examen de pesquisa especial para diabetes mellitus.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z13.2) Examen de pesquisa especial para trastornos de la nutrición.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z13.3) Examen de pesquisa especial para trastornos mentales y del comportamiento.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z13.4) Examen de pesquisa especial para ciertos trastornos del desarrollo en el niño.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z13.5) Examen de pesquisa especial para trastornos del ojo y del oído.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z13.6) Examen de pesquisa especial para trastornos cardiovasculares.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z13.7) Examen de pesquisa especial para malformaciones congénitas, deformidades y anomalías cromosómicas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z13.8) Examen de pesquisa especial para otras enfermedades y trastornos especificados.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z13.9) Examen de pesquisa especial, no especificado.</label>









<a id="marcador_02" class="ancla"></a>
<label class="identar_2" for="Z20- Z29">(Z20- Z29) Contactos y exposición a enfermedades contagiosas.</label>
	<label class="identar_3" for="Z20">(Z20) Contacto con y exposición a enfermedades transmisibles.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z20.0) Contacto con y exposición a enfermedades infecciosas intestinales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z20.1) Contacto con y exposición a tuberculosis.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z20.2) Contacto con y exposición a enfermedades infecciosas con un modo de transmisión predominantemente sexual.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z20.3) Contacto con y exposición a rabia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z20.4) Contacto con y exposición a rubéola.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z20.5) Contacto con y exposición a hepatitis viral.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z20.6) Contacto con y exposición al virus de la inmunodeficiencia humana [VIH].</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z20.7) Contacto con y exposición a pediculosis, acariasis y otras infestaciones.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z20.8) Contacto con y exposición a otras enfermedades transmisibles.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z20.9) Contacto con y exposición a enfermedades transmisibles no especificadas.</label>


	<label class="identar_3" for="Z21">(Z21) Estado de infección asintomática por el virus de la inmunodeficiencia humana [VIH].</label>


	<label class="identar_3" for="Z22">(Z22) Portador de enfermedad infecciosa.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z22.0) Portador de fiebre tifoidea.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z22.1) Portador de otras enfermedades infecciosas intestinales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z22.2) Portador de difteria.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z22.3) Portador de otras enfermedades bacterianas especificadas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z22.4) Portador de enfermedades infecciosas con un modo de transmisión predominantemente sexual.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z22.5) Portador de hepatitis viral.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z22.6) Portador de enfermedad infecciosa debida al virus humano T-linfotrópico tipo 1 [VHTL-1].</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z22.8) Portador de otras enfermedades infecciosas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z22.9) Portador de enfermedad infecciosa no especificada.</label>


	<label class="identar_3" for="Z23">(Z23) Necesidad de inmunización contra enfermedad bacteriana única.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z23.0) Necesidad de inmunización sólo contra el cólera.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z23.1) Necesidad de inmunización sólo contra la tifoidea-paratifoidea [TAB].</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z23.2) Necesidad de inmunización contra la tuberculosis [BCG].</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z23.3) Necesidad de inmunización contra la peste.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z23.4) Necesidad de inmunización contra la tularemia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z23.5) Necesidad de inmunización sólo contra el tétanos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z23.6) Necesidad de inmunización sólo contra la difteria.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z23.7) Necesidad de inmunización sólo contra la tos ferina.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z23.8) Necesidad de inmunización sólo contra otra enfermedad bacteriana.</label>
	

	<label class="identar_3" for="Z24">(Z24) Necesidad de inmunización contra ciertas enfermedades virales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z24.0) Necesidad de inmunización contra la poliomielitis.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z24.1) Necesidad de inmunización contra la encefalitis viral transmitida por artrópodos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z24.2) Necesidad de inmunización contra la rabia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z24.3) Necesidad de inmunización contra la fiebre amarilla.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z24.4) Necesidad de inmunización sólo contra el sarampión.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z24.5) Necesidad de inmunización sólo contra la rubéola.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z24.6) Necesidad de inmunización contra la hepatitis viral.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
	

	<label class="identar_3" for="Z25">(Z25) Necesidad de inmunización contra otras enfermedades virales únicas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z25.0) Necesidad de inmunización sólo contra la parotiditis.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z25.1) Necesidad de inmunización contra la influenza [gripe].</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z25.8) Necesidad de inmunización contra otras enfermedades virales únicas especificadas.</label>
	

	<label class="identar_3" for="Z26">(Z26) Necesidad de inmunización contra otras enfermedades infecciosas únicas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z26.0) Necesidad de inmunización contra la leishmaniasis.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z26.8) Necesidad de inmunización contra otras enfermedades infecciosas únicas especificadas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z26.9) Necesidad de inmunización contra enfermedad infecciosa no especificada.</label>


	<label class="identar_3" for="Z27">(Z27) Necesidad de inmunización contra combinaciones de enfermedades infecciosas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z27.0) Necesidad de inmunización contra el cólera y la tifoidea-paratifoidea [cólera + TAB].</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z27.1) Necesidad de inmunización contra difteria-pertussis-tétanos combinados [DPT].</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z27.2) Necesidad de inmunización contra difteria-pertussis-tétanos y tifoidea- paratifoidea [DPT + TAB].</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z27.3) Necesidad de inmunización contra difteria-pertussis-tétanos y poliomielitis [DPT + polio].</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z27.4) Necesidad de inmunización contra sarampión-parotiditis-rubéola [SPR] [MMR].</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z27.8) Necesidad de inmunización contra otras combinaciones de enfermedades infecciosas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z27.9) Necesidad de inmunización contra combinaciones no especificadas de enfermedades infecciosas.</label>


	<label class="identar_3" for="Z28">(Z28) Inmunización no realizada.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z28.0) Inmunización no realizada por contraindicación.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z28.1) Inmunización no realizada por decisión del paciente, por motivos de creencia o presión de grupo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z28.2) Inmunización no realizada por decisión del paciente, por otras razones y las no especificadas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z28.8) Inmunización no realizada por otras razones.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z28.9) Inmunización no realizada por razón no especificada.</label>


	<label class="identar_3" for="Z29">(Z29) Necesidad de otras medidas profilácticas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z29.0) Aislamiento.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z29.1) Inmunoterapia profiláctica.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z29.2) Otra quimioterapia profiláctica.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z29.8) Otras medidas profilácticas especificadas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z29.9) Medida profiláctica no especificada.</label>









<a id="marcador_03" class="ancla"></a>
<label class="identar_2" for="Z30-Z39">(Z30-Z39) Intervenciones relativas a la reproducción</label>
	<label class="identar_3" for="Z30">(Z30) Atención para la anticoncepción.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z30.0) Consejo y asesoramiento general sobre la anticoncepción.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z30.1) Inserción de dispositivo anticonceptivo (intrauterino).</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z30.2) Esterilización.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z30.3) Extracción menstrual.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z30.4) Supervisión del uso de drogas anticonceptivas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z30.5) Supervisión del uso de dispositivo anticonceptivo (intrauterino).</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z30.8) Otras atenciones especificadas para la anticoncepción.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z30.9) Asistencia para la anticoncepción, no especificada.</label>


	<label class="identar_3" for="Z31">(Z31) Atención para la procreación.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z31.0) Tuboplastia o vasoplastia posterior a esterilización.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z31.1) Inseminación artificial.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z31.2) Fecundación in vitro.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z31.3) Otros métodos de atención para la fecundación.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z31.4) Investigación y prueba para la procreación.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z31.5) Asesoramiento genético.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z31.6) Consejo y asesoramiento general sobre la procreación.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z31.8) Otra atención especificada para la procreación.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z31.9) Atención no especificada relacionada con la procreación.</label>


	<label class="identar_3" for="Z32">(Z32) Examen y prueba del embarazo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z32.0) Embarazo (aún) no confirmado.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z32.1) Embarazo confirmado.</label>


	<label class="identar_3" for="Z33">(Z33) Estado de embarazo, incidental</label>


	<label class="identar_3" for="Z34">(Z34) Supervisión de embarazo normal.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z34.0) Supervisión de primer embarazo normal.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z34.8) Supervisión de otros embarazos normales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z34.9) Supervisión de embarazo normal no especificado.</label>


	<label class="identar_3" for="Z35">(Z35) Supervisión de embarazo de alto riesgo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z35.0) Supervisión de embarazo con historia de esterilidad.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z35.1) Supervisión de embarazo con historia de aborto.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z35.2) Supervisión de embarazo con otro riesgo en la historia obstétrica o reproductiva.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z35.3) Supervisión de embarazo con historia de insuficiente atención prenatal.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z35.4) Supervisión de embarazo con gran multiparidad.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z35.5) Supervisión de primigesta añosa.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z35.6) Supervisión de primigesta muy joven.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z35.7) Supervisión de embarazo de alto riesgo debido a problemas sociales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z35.8) Supervisión de otros embarazos de alto riesgo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z35.9) Supervisión de embarazo de alto riesgo, sin otra especificación.</label>


	<label class="identar_3" for="Z36">(Z36) Investigaciones prenatales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z36.0) Investigación prenatal para anomalías cromosómicas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z36.1) Investigación prenatal para medir niveles elevados de alfafetoproteínas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z36.2) Otras Investigaciones prenatales basadas en amniocentesis.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z36.3) Investigaciónprenatal de malformaciones usando ultrasonido y otros métodos físicos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z36.4) Investigaciónprenatal del retardo del crecimiento fetal usando ultrasonido y otros métodos físicos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z36.5) Investigaciónprenatal para isoinmunización.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z36.8) Otras Investigaciones prenatales específicas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z36.9) Investigaciónprenatal, sin otra especificación.</label>


	<label class="identar_3" for="Z37">(Z37) Producto del parto.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z37.0) Nacido vivo, único.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z37.1) Nacido muerto, único.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z37.2) Gemelos, ambos nacidos vivos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z37.3) Gemelos, un nacido vivo y un nacido muerto.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z37.4) Gemelos, ambos nacidos muertos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z37.5) Otros nacimientos múltiples, todos nacidos vivos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z37.6) Otros nacimientos múltiples, algunos nacidos vivos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z37.7) Otros nacimientos múltiples, todos nacidos muertos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z37.9) Producto del parto no especificado.</label>


	<label class="identar_3" for="Z38">(Z38) Nacidos vivos según lugar de nacimiento.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z38.0) Producto único, nacido en hospita.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z38.1) Producto único, nacido fuera de hospital.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z38.2) Producto único, lugar de nacimiento no especificado.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z38.3) Gemelos, nacidos en hospital.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z38.4) Gemelos, nacidos fuera de hospital.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z38.5) Gemelos, lugar de nacimiento no especificado.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z38.6) Otros nacimientos múltiples, en hospital.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z38.7) Otros nacimientos múltiples, fuera del hospital.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z38.8) Otros nacimientos múltiples, lugar de nacimiento no especificado.</label>


	<label class="identar_3" for="Z39">(Z39) Examen y atención del postparto.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z39.0) Atención y examen inmediatamente después del parto.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z39.1)Atención y examen de madre en período de lactancia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z39.2)Seguimiento postparto, de rutina.</label>










<a id="marcador_04" class="ancla"></a>
<label class="identar_2" for="Z40-Z54">(Z40-Z54) Personas candidatas a cirugía</label>	
		<label class="identar_3" for="Z40">(Z40) Cirugía profiláctica.</label></label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z40.0) Cirugía profiláctica por factores de riesgo relacionados con tumores malignos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z40.8) Otra cirugía profiláctica.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z40.9) Cirugía profiláctica no especificada.</label>

	<label class="identar_3" for="Z41">(Z41) Procedimientos para otros propósitos que no sean los de mejorar el estado de salud.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z41.0) Trasplante de pelo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z41.1) Otras cirugías plásticas por razones estéticas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z41.2) Circuncisión ritual o de rutina.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z41.3) Perforación de la oreja.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z41.8) Otros procedimientos para otros propósitos que no sean los de mejorar el estado de salud.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z41.9) Procedimiento no especificado para otros propósitos que no sean los de mejorar el estado de salud.</label>


	<label class="identar_3" for="Z42">(Z42) Cuidados posteriores a la cirugía plástica.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z42.0) Cuidados posteriores a la cirugía plástica de la cabeza y del cuello.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z42.1) Cuidados posteriores a la cirugía plástica de la mama.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z42.2) Cuidados posteriores a la cirugía plástica de otras partes especificadas del tronco.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z42.3) Cuidados posteriores a la cirugía plástica de las extremidades superiores.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z42.4) Cuidados posteriores a la cirugía plástica de las extremidades inferiores.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z42.8) Cuidados posteriores a la cirugía plástica de otras partes especificadas del cuerpo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z42.9) Cuidados posteriores a la cirugía plástica no especificada.</label>


	<label class="identar_3" for="Z43">(Z43) Atención de orificios artificiales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z43.0) Atención de traqueostomía.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z43.1) Atención de gastrostomía.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z43.2) Atención de ileostomía.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z43.3) Atención de colostomía.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z43.4) Atención de otros orificios artificiales de las vías digestivas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z43.5) Atención de cistostomía.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z43.6) Atención de otros orificios artificiales de las vías urinarias.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z43.7) Atención de vagina artificial.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z43.8) Atención de otros orificios artificiales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z43.9) Atención de orificio artificial no especificado.</label>


	<label class="identar_3" for="Z44">(Z44) Prueba y ajuste de dispositivos protésicos externos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z44.0) Prueba y ajuste de brazo artificial (completo) (parcial).</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z44.1) Prueba y ajuste de pierna artificial (completa) (parcial).</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z44.2) Prueba y ajuste de ojo artificial.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z44.3) Prueba y ajuste de prótesis mamaria externa.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z44.8) Prueba y ajuste de otros dispositivos protésicos externos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z44.9) Prueba y ajuste de dispositivo protésico externo no especificado.</label>


	<label class="identar_3" for="Z45">(Z45) Asistencia y ajuste de dispositivos implantados.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z45.0) Asistencia y ajuste de marcapaso cardíaco.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z45.1) Asistencia y ajuste de bomba de infusión.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z45.2) Asistencia y ajuste de dispositivos de acceso vascular.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z45.3) Asistencia y ajuste de dispositivo auditivo implantado.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z45.8) Asistencia y ajuste de otros dispositivos implantados.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z45.9) Asistencia y ajuste de dispositivo implantado no especificado.</label>


	<label class="identar_3" for="Z46">(Z46) Prueba y ajuste de otros dispositivos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z46.0) Prueba y ajuste de anteojos y lentes de contacto.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z46.1) Prueba y ajuste de audífonos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z46.2) Prueba y ajuste de otros dispositivos relacionados con el sistema nervioso y los sentidos especiales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z46.3) Prueba y ajuste de prótesis dental.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z46.4) Prueba y ajuste de dispositivo ortodóncico.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z46.5) Prueba y ajuste de ileostomía u otro dispositivo intestinal.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z46.6) Prueba y ajuste de dispositivo urinario.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z46.7) Prueba y ajuste de dispositivo ortopédico.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z46.8) Prueba y ajuste de otros dispositivos especificados.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z46.9) Prueba y ajuste de dispositivo no especificado.</label>


	<label class="identar_3" for="Z47">(Z47) Otros cuidados posteriores a la ortopedia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z47.0) Cuidados posteriores a la extracción de placa u otro dispositivo de fijación interna en fractura.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z47.8) Otros cuidados especificados posteriores a la ortopedia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z47.9) Cuidado posterior a la ortopedia, no especificado.</label>


	<label class="identar_3" for="Z48">(Z48) Otros cuidados posteriores a la cirugía.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z48.0) Atención de los apósitos y suturas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z48.8) Otros cuidados especificados posteriores a la cirugía.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z48.9) Cuidado posterior a la cirugía, no especificado.</label>


	<label class="identar_3" for="Z49">(Z49) Cuidados relativos al procedimiento de diálisis.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z49.0) Cuidados preparatorios para diálisis.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z49.1) Diálisis extracorpórea.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z49.2) Otras diálisis.</label>


	<label class="identar_3" for="Z50">(Z50) Atención por el uso de procedimientos de rehabilitación.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z50.0) Rehabilitación cardíaca.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z50.1) Otras terapias físicas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z50.2) Rehabilitación del alcohólico.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z50.3) Rehabilitación del drogadicto.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z50.4) Psicoterapia, no clasificada en otra parte.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z50.5) Terapia del lenguaje.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z50.6) Adiestramiento ortóptico.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z50.7) Terapia ocupacional y rehabilitación vocacional, no clasificada en otra parte.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z50.8) Atención por otros procedimientos de rehabilitación.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z50.9) Atención por procedimiento de rehabilitación, no especificada.</label>


	<label class="identar_3" for="Z51">(Z51) Otra atención médica.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z51.0) Sesión de radioterapia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z51.1) Sesión de quimioterapia por tumor.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z51.2) Otra quimioterapia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z51.3) Transfusión de sangre, sin diagnóstico informado.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z51.4) Atención preparatoria para tratamiento subsecuente, no clasificado en otra parte.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z51.5) Atención paliativa.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z51.6) Desensibilización a alérgenos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z51.8) Otras atenciones médicas especificadas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z51.9) Atención médica, no especificada.</label>


	<label class="identar_3" for="Z52">(Z52) Donantes de órganos y tejidos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z52.0) Donante de sangre.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z52.1) Donante de piel.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z52.2) Donante de hueso.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z52.3) Donante de médula ósea.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z52.4) Donante de riñón.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z52.5) Donante de córnea.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z52.8) Donante de otros órganos o tejidos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z52.9) Donante de órgano o tejido no especificado.</label>


	<label class="identar_3" for="Z53">(Z53) Persona en contacto con los servicios de salud para procedimientos específicos no realizados.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z53.0) Procedimiento no realizado por contraindicación.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z53.1) Procedimiento no realizado por decisión del paciente, por razones de creencia o presión de grupo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z53.2) Procedimiento no realizado por decisión del paciente, por otras razones y las no especificadas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z53.8) Procedimiento no realizado por otras razones.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z53.9) Procedimiento no realizado por razón no especificada.</label>


	<label class="identar_3" for="Z54">(Z54) Convalecencia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z54.0) Convalecencia consecutiva a cirugía.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z54.1) Convalecencia consecutiva a radioterapia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z54.2) Convalecencia consecutiva a quimioterapia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z54.3) Convalecencia consecutiva a psicoterapia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z54.4) Convalecencia consecutiva a tratamiento de fractura.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z54.7) Convalecencia consecutiva a tratamiento combinado.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z54.8) Convalecencia consecutiva a otros tratamientos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z54.9) Convalecencia consecutiva a tratamiento no especificado.</label>









<a id="marcador_05" class="ancla"></a>
<label class="identar_2" for="Z55-Z65">(Z55-Z65) Personas con problemas potenciales psíquicos o psicosociales</label>
	<label class="identar_3" for="Z55">(Z55) Problemas relacionados con la educación y la alfabetización.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z55.0) Problemas relacionados con el analfabetismo o bajo nivel de instrucción.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z55.1). Problemas relacionados con la educación no disponible o inaccesible.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z55.2) Problemas relacionados con la falla en los exámenes.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z55.3) Problemas relacionados con el bajo rendimiento escolar.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z55.4) Problemas relacionados con la inadaptación educacional y desavenencias con maestros y compañeros.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z55.8) Otros problemas relacionados con la educación y la alfabetización.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z55.9) Problema no especificado relacionado con la educación y la alfabetización.</label>


	<label class="identar_3" for="Z56">(Z56) Problemas relacionados con el empleo y el desempleo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z56.0) Problemas relacionados con el desempleo, no especificados.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z56.1) Problemas relacionados con el cambio de empleo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z56.2) Problemas relacionados con amenaza de pérdida del empleo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z56.3) Problemas relacionados con horario estresante de trabajo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z56.4) Problemas relacionados con desavenencias con el jefe y los compa¤eros de trabajo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z56.5) Problemas relacionados con el trabajo incompatible.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z56.6) Otros problemas de tensión física o mental relacionadas con el trabajo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z56.7) Otros problemas y los no especificados relacionados con el empleo.</label>


	<label class="identar_3" for="Z57">(Z57) Exposición a factores de riesgo ocupacional.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z57.1) Exposición ocupacional a la radiación.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z57.2) Exposición ocupacional al polvo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z57.3) Exposición ocupacional a otro contaminante del aire.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z57.4) Exposición ocupacional a agentes tóxicos en agricultura.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z57.5) Exposición ocupacional a agentes tóxicos en otras industrias.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z57.6) Exposición ocupacional a temperatura extrema.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z57.7) Exposición ocupacional a la vibración.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z57.8) Exposición ocupacional a otros factores de riesgo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z57.9) Exposición ocupacional a factor de riesgo no especificado.</label>


	<label class="identar_3" for="Z58">(Z58) Problemas relacionados con el ambiente físico.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z58.0) Exposición al ruido.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z58.1) Exposición al aire contaminado.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z58.2) Exposición al agua contaminada.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z58.3) Exposición al suelo contaminado.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z58.4) Exposición a la radiación.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z58.5) Exposición a otras contaminaciones del ambiente físico.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z58.6) Suministro inadecuado de agua potable.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z58.8) Otros problemas relacionados con el ambiente físico.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z58.9) Problema no especificado relacionado con el ambiente físico.</label>


	<label class="identar_3" for="Z59">(Z59) Problemas relacionados con la vivienda y las circunstancias económicas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z59.0) Problemas relacionados con la falta de vivienda.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z59.1) Problemas relacionados con vivienda inadecuada.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z59.2) Problemas caseros y con vecinos e inquilinos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z59.3) Problemas relacionados con persona que reside en una institución.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z59.4) Problemas relacionados con la falta de alimentos adecuados.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z59.5) Problemas relacionados con pobreza extrema.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z59.6) Problemas relacionados con bajos ingresos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z59.7) Problemas relacionados con seguridad social y sostenimiento insuficientes para el bienestar.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z59.8) Otros problemas relacionados con la vivienda y las circunstancias económicas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z59.9) Problemas no especificados relacionados con la vivienda y las circunstancias económicas.</label>


	<label class="identar_3" for="Z60">(Z60) Problemas relacionados con el ambiente social.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z60.0) Problemas relacionados con el ajuste a las transiciones del ciclo vital.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z60.1) Problemas relacionados con situación familiar atípica.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z60.2) Problemas relacionados con persona que vive sola.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z60.3) Problemas relacionados con la adaptación cultural.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z60.4) Problemas relacionados con exclusión y rechazo social.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z60.5) Problemas relacionados con la discriminación y persecución percibidas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z60.8) Otros problemas relacionados con el ambiente social.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z60.9) Problema no especificado relacionado con el ambiente social.</label>


	<label class="identar_3" for="Z61">(Z61) Problemas relacionados con hechos negativos en la niñez.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z61.0) Problemas relacionados con la pérdida de relación afectiva en la infancia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z61.1) Problemas relacionados con el alejamiento del hogar en la infancia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z61.2) Problemas relacionados con alteración en el patrón de la relación familiar en la infancia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z61.3) Problemas relacionados con eventos que llevaron a la pérdida de la autoestima en la infancia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z61.4) Problemas relacionados con el abuso sexual del niño por persona dentro del grupo de apoyo primario.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z61.5) Problemas relacionados con el abuso sexual del niño por persona ajena al grupo de apoyo primario.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z61.6) Problemas relacionados con abuso físico del niño.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z61.7) Problemas relacionados con experiencias personales atemorizantes en la infancia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z61.8) Problemas relacionados con otras experiencias negativas en la infancia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z61.9) Problemas relacionados con experiencia negativa no especificada en la infancia.</label>


	<label class="identar_3" for="Z62">(Z62) Otros problemas relacionados con la crianza del niño.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z62.0) Problemas relacionados con la supervisión o el control inadecuados de los padres.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z62.1) Problemas relacionados con la sobreprotección de los padres.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z62.2) Problemas relacionados con la crianza en institución.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z62.3) Problemas relacionados con hostilidad y reprobación al niño.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z62.4) Problemas relacionados con el abandono emocional del niño.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z62.5) Otros problemas relacionados con negligencia en la crianza del niño.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z62.6) Problemas relacionados con presiones inapropiadas de los padres y otras anormalidades en la calidad de la crianza.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z62.8) Otros problemas especificados y relacionados con la crianza del niño.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z62.9) Problema no especificado relacionado con la crianza del niño.</label>


	<label class="identar_3" for="Z63">(Z63) Otros problemas relacionados con el grupo primario de apoyo, inclusive circunstancias familiares.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z63.0) Problemas en la relación entre esposos o pareja.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z63.1) Problemas en la relación con los padres y los familiares políticos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z63.2) Problemas relacionados con el apoyo familiar inadecuado.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z63.3) Problemas relacionados con la ausencia de un miembro de la familia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z63.4) Problemas relacionados con la desaparición o muerte de un miembro de la familia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z63.5) Problemas relacionados con la ruptura familiar por separación o divorcio.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z63.6) Problemas relacionados con familiar dependiente, necesitado de cuidado en la casa.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z63.7) Problemas relacionados con otros hechos estresantes que afectan a la familia y al hogar.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z63.8) Otros problemas especificados relacionados con el grupo primario de apoyo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z63.9) Problema no especificado relacionado con el grupo primario de apoyo.</label>


	<label class="identar_3" for="Z64">(Z64) Problemas relacionados con ciertas circunstancias psicosociales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z64.0) Problemas relacionados con embarazo no deseado.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z64.1) Problemas relacionados con la multiparidad.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z64.2) Problemas relacionados con la solicitud o aceptación de intervenciones físicas, nutricionales y químicas, conociendo su riesgo y peligro.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z64.3) Problemas relacionados con la solicitud o aceptación de intervenciones psicológicas o de la conducta, conociendo su riesgo y peligro.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z64.4) Problemas relacionados con el desacuerdo con consejeros.</label>


	<label class="identar_3" for="Z65">(Z65) Problemas relacionados con otras circunstancias psicosociales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z65.0) Problemas relacionados con culpabilidad en procedimientos civiles o criminales sin prisión.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z65.1) Problemas relacionados con prisión y otro encarcelamiento.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z65.2) Problemas relacionados con la liberación de la prisión.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z65.3) Problemas relacionados con otras circunstancias legales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z65.4) Problemas relacionados con víctima de crimen o terrorismo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z65.5) Problemas relacionados con la exposición a desastre, guerra u otras hostilidades.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z65.8) Otros problemas especificados relacionados con circunstancias psicosociales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z65.9) Problemas relacionados con circunstancias psicosociales no especificadas.</label>









<a id="marcador_06" class="ancla"></a>
<label class="identar_2" for="Z70-Z76">(Z70-Z76) Consultas</label>
	<label class="identar_3" for="Z70">(Z70) Consulta relacionada con actitud, conducta u orientación sexual.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z70.0) Consulta relacionada con la actitud sexual.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z70.1) Consulta relacionada con la orientación y conducta sexual del paciente.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z70.2) Consulta relacionada con la orientación y conducta sexual de una tercera persona.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z70.3) Consulta relacionada con preocupaciones combinadas sobre la actitud, la conducta y la orientación sexuales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z70.8) Otras consultas sexuales específicas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z70.9) Consulta sexual, no especificada.</label>


	<label class="identar_3" for="Z71">(Z71) Personas en contacto con los servicios de salud por otras consultas y consejos médicos, no clasificados en otra parte.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z71.0) Persona que consulta en nombre de otra persona.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z71.1) Persona que teme estar enferma, a quien no se hace diagnóstico.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z71.2) Persona que consulta para la explicación de hallazgos de investigación.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z71.3) Consulta para instrucción y vigilancia de la dieta.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z71.4) Consulta para asesoría y vigilancia por abuso de alcohol.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z71.5) Consulta para asesoría y vigilancia por abuso de drogas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z71.6) Consulta para asesoría por abuso de tabaco.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z71.7) Consulta para asesoría sobre el virus de la inmunodeficiencia humana [VIH].</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z71.8) Otras consultas especificadas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z71.9) Consulta, no especificada.</label>


	<label class="identar_3" for="Z72">(Z72) Problemas relacionados con el estilo de vida.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z72.0) Problemas relacionados con el uso del tabaco.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z72.1) Problemas relacionados con el uso del alcohol.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z72.2) Problemas relacionados con el uso de drogas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z72.3) Problemas relacionados con la falta de ejercicio físico.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z72.4) Problemas relacionados con la dieta y h bitos alimentarios inapropiados.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z72.5) Problemas relacionados con la conducta sexual de alto riesgo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z72.6) Problemas relacionados con el juego y las apuestas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z72.8) Otros problemas relacionados con el estilo de vida.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z72.9) Problema no especificado relacionado con el estilo de vida.</label>


	<label class="identar_3" for="Z73">(Z73) Problemas relacionados con dificultades para afrontar la vida.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z73.0) Problemas relacionados con el desgaste profesional (sensación de agotamiento vital).</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z73.1) Problemas relacionados con la acentuación de rasgos de la personalidad.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z73.2) Problemas relacionados con la falta de relajación y descanso.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z73.3) Problemas relacionados con el estrés, no clasificados en otra parte.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z73.4) Problemas relacionados con habilidades sociales inadecuadas, no clasificados en otra parte.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z73.5) Problemas relacionados con el conflicto del rol social, no clasificados en otra parte.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z73.6) Problemas relacionados con la limitación de las actividades debido a discapacidad.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z73.8) Otros problemas relacionados con dificultades con el modo de vida.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z73.9) Problemas no especificados relacionados con dificultades con el modo de vida.</label>


	<label class="identar_3" for="Z74">(Z74) Problemas relacionados con dependencia del prestador de servicios.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z74.0) Problemas relacionados con movilidad reducida.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z74.1) Problemas relacionados con la necesidad de ayuda para el cuidado personal.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z74.2) Problemas relacionados con la necesidad de asistencia domiciliaria y que ningún otro miembro del hogar puede proporcionar.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z74.3) Problemas relacionados con la necesidad de supervisión continua.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z74.8) Otros problemas relacionados con dependencia del prestador de servicios.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z74.9) Problema no especificado relacionado con dependencia del prestador de servicios.</label>


	<label class="identar_3" for="Z75">(Z75) Problemas relacionados con facilidades de atención médica u otros servicios de salud.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z75.0) Problemas relacionados con servicio médico no disponible en el domicilio.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z75.1) Problemas relacionados con persona esperando admisión en una institución apropiada en otro lugar.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z75.2) Problemas relacionados con persona en otro período de espera para investigación y tratamiento.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z75.3) Problemas relacionados con atención de salud no disponible o inaccesible.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z75.4) Problemas relacionados con otros servicios asistenciales no disponibles o inaccesibles.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z75.5) Problemas relacionados con la atención durante vacaciones de la familia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z75.8) Otros problemas relacionados con servicios médicos y de salud.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z75.9) Problema no especificado relacionado con servicios médicos y de salud.</label>


	<label class="identar_3" for="Z76">(Z76) Personas en contacto con los servicios de salud por otras circunstancias.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z76.0) Consulta para repetición de receta.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z76.1) Consulta para atención y supervisión de la salud del ni¤o abandonado.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z76.2) Consulta para atención y supervisión de la salud de otros ni¤os o lactantes sanos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z76.3) Persona sana que acompa¤a al enfermo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z76.4) Otro huésped en servicios de salud.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z76.5) Persona que consulta con simulación consciente [simulador].</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z76.8) Personas en contacto con los servicios de salud en otras circunstancias especificadas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z76.9) Personas en contacto con los servicios de salud en circunstancias no especificadas.</label>









<a id="marcador_07" class="ancla"></a>
<label class="identar_2" for="Z80-Z99">(Z80-Z99) Historias</label>
	<label class="identar_3" for="Z80">(Z80) Historia familiar de tumor maligno.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z80.0) Historia familiar de tumor maligno de órganos digestivos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z80.1) Historia familiar de tumor maligno de tr quea, bronquios y pulmón.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z80.2) Historia familiar de tumor maligno de otros órganos respiratorios e intrator cicos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z80.3) Historia familiar de tumor maligno de mama.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z80.4) Historia familiar de tumor maligno de órganos genitales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z80.5) Historia familiar de tumor maligno de vías urinarias.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z80.6) Historia familiar de leucemia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z80.7) Historia familiar de otros tumores malignos del tejido linfoide, hematopoyético y tejidos relacionados.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z80.8) Historia familiar de tumor maligno de otros órganos o sistemas especificados.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z80.9) Historia familiar de tumor maligno, de sitio no especificado.</label>
	

	<label class="identar_3" for="Z81">(Z81) Historia familiar de trastornos mentales y del comportamiento.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z81.0) Historia familiar de retardo mental.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z81.1) Historia familiar de abuso de alcohol.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z81.2) Historia familiar de abuso del tabaco.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
 		<label class="identar_4" for="">Z81.3) Historia familiar de abuso de otras sustancias psicoactivas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z81.4) Historia familiar de abuso de otras sustancias.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z81.8) Historia familiar de otros trastornos mentales y del comportamiento.</label>


	<label class="identar_3" for="Z82">(Z82) Historia familiar de ciertas discapacidades y enfermedades crónicas incapacitantes.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z82.0) Historia familiar de epilepsia y otras enfermedades del sistema nervioso.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z82.1) Historia familiar de ceguera o pérdida de la visión.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z82.2) Historia familiar de sordera o pérdida de la audición.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z82.3) Historia familiar de apoplejía.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z82.4) Historia familiar de enfermedad isquémica del corazón y otras enfermedades del sistema circulatorio.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z82.5) Historia familiar de asma y de otras enfermedades crónicas de las vías respiratorias inferiores.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z82.6) Historia familiar de artritis y otras enfermedades del sistema osteomuscular y tejido conjuntivo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z82.7) Historia familiar de malformaciones congénitas, deformidades y otras anomalías cromosómicas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z82.8) Historia familiar de otras discapacidades y enfermedades crónicas incapacitantes no clasificadas en otra parte.</label>


	<label class="identar_3" for="Z83">(Z83) Historia familiar de otros trastornos específicos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z83.0) Historia familiar de infección por el virus de la inmunodeficiencia humana [VIH].</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z83.1) Historia familiar de otras enfermedades infecciosas y parasitarias.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z83.2) Historia familiar de enfermedades de la sangre y de los órganos hematopoyéticos y de ciertos trastornos del mecanismo inmunológico.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z83.3) Historia familiar de diabetes mellitus.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z83.4) Historia familiar de otras enfermedades endocrinas, nutricionales y metabólicas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z83.5) Historia familiar de trastornos de los ojos y de los oídos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z83.6) Historia familiar de enfermedades del sistema respiratorio.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z83.7) Historia familiar de enfermedades del sistema digestivo.</label>


	<label class="identar_3" for="Z84">(Z84) Historia familiar de otras afecciones.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z84.0) Historia familiar de enfermedades de la piel y del tejido subcutáneo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z84.1) Historia familiar de trastornos del ri¤ón y del uréter.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z84.2) Historia familiar de otras enfermedades del sistema genitourinario.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z84.3) Historia familiar de consanguinidad.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z84.8) Historia familiar de otras afecciones especificadas.</label>


	<label class="identar_3" for="Z85">(Z85) Historia personal de tumor maligno.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z85.0) Historia personal de tumor maligno de órganos digestivos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z85.1) Historia personal de tumor maligno de tráquea, bronquios y pulmón.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z85.2) Historia personal de tumor maligno de otros órganos respiratorios e intrator cicos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z85.3) Historia personal de tumor maligno de mama.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z85.4) Historia personal de tumor maligno de órganos genitales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z85.5) Historia personal de tumor maligno de vías urinarias.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z85.6) Historia personal de leucemia.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z85.7) Historia personal de otros tumores malignos del tejido linfoide, hematopoyético y tejidos relacionados.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z85.8) Historia personal de tumor maligno de otros órganos y sistemas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z85.9) Historia personal de tumor maligno, de sitio no especificado.</label>


	<label class="identar_3" for="Z86">(Z86) Historia personal de algunas otras enfermedades.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z86.0) Historia personal de otros tumores.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z86.1) Historia personal de enfermedades infecciosas y parasitarias.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z86.2) Historia personal de enfermedades de la sangre y de los órganos hematopoyéticos y de ciertos trastornos del mecanismo inmunológico.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z86.3) Historia personal de enfermedades endocrinas, nutricionales y metabólicas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z86.4) Historia personal de abuso de sustancias psicoactivas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z86.5) Historia personal de otros trastornos mentales o del comportamiento.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z86.6) Historia personal de enfermedades del sistema nervioso y de los órganos de los sentidos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z86.7) Historia personal de enfermedades del sistema circulatorio.</label>
	

	<label class="identar_3" for="Z87">(Z87) Historia personal de otras enfermedades y afecciones.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z87.0) Historia personal de enfermedades del sistema respiratorio.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z87.1) Historia personal de enfermedades del sistema digestivo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z87.2) Historia personal de enfermedades de la piel y del tejido subcut neo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z87.3) Historia personal de enfermedades del sistema osteomuscular y del tejido conjuntivo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z87.4) Historia personal de enfermedades del sistema genitourinario.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z87.5) Historia personal de complicaciones del embarazo, del parto y del puerperio.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z87.6) Historia personal de ciertas afecciones originadas en el período perinatal.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z87.7) Historia personal de malformaciones congénitas, deformidades y anomalías cromosómicas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z87.8) Historia personal de otras afecciones especificadas.</label>


	<label class="identar_3" for="Z88">(Z88) Historia personal de alergia a drogas, medicamentos y sustancias biológicas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z88.0) Historia personal de alergia a penicilina.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z88.1) Historia personal de alergia a otros agentes antibióticos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z88.2) Historia personal de alergia a sulfonamidas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z88.3) Historia personal de alergia a otros agentes antiinfecciosos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z88.4) Historia personal de alergia a agente anestésico.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z88.5) Historia personal de alergia a agente narcótico.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z88.6) Historia personal de alergia a agente analgésico.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z88.7) Historia personal de alergia a suero o vacuna.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z88.8) Historia personal de alergia a otras drogas, medicamentos y sustancias biológicas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z88.9) Historia personal de alergia a drogas, medicamentos y sustancias biológicas no especificadas.</label>


	<label class="identar_3" for="Z89">(Z89) Ausencia adquirida de órganos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z89.0) Ausencia adquirida de dedo(s), [incluido el pulgar], unilateral.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z89.1) Ausencia adquirida de mano y muñeca.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z89.2) Ausencia adquirida de miembro superior por arriba de la muñeca.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z89.3) Ausencia adquirida de ambos miembros superiores [cualquier nivel].</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z89.4) Ausencia adquirida de pie y tobillo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z89.5) Ausencia adquirida de pierna a nivel de o debajo de la rodilla.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z89.6) Ausencia adquirida de pierna por arriba de la rodilla.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z89.7) Ausencia adquirida de ambos miembros inferiores [cualquier nivel, excepto dedos del pie solamente].</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z89.8) Ausencia adquirida de miembros superiores e inferiores [cualquier nivel].</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z89.9) Ausencia adquirida de miembros no especificados.</label>


	<label class="identar_3" for="Z90">(Z90) Ausencia adquirida de órganos, no clasificada en otra parte.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z90.0) Ausencia adquirida de parte de la cabeza y del cuello.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z90.1) Ausencia adquirida de mama(s).</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z90.2) Ausencia adquirida (de parte) del pulmón.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z90.3) Ausencia adquirida de parte del estómago.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z90.4) Ausencia adquirida de otras partes del tubo digestivo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z90.5) Ausencia adquirida de riñón.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z90.6) Ausencia adquirida de otras partes de las vías urinarias.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z90.7) Ausencia adquirida de órgano(s) genital(es).</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z90.8) Ausencia adquirida de otros órganos.</label>


	<label class="identar_3" for="Z91">(Z91) Historia personal de factores de riesgo, no clasificados en otra parte.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z91.0) Historia personal de alergia, no debida a drogas ni a sustancias biológicas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z91.1) Historia personal de incumplimiento del régimen o tratamiento médico.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z91.2) Historia personal de higiene personal deficiente.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z91.3) Historia personal de ciclo sue¤o-vigilia no saludable.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z91.4) Historia personal de trauma psicológico, no clasificado en otra parte.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z91.5) Historia personal de lesión autoinfligida intencionalmente.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z91.6) Historia personal de otro trauma físico.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z91.8) Historia personal de otros factores de riesgo, no clasificados en otra parte.</label>


	<label class="identar_3" for="Z92">(Z92) Historia personal de tratamiento médico.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z92.0) Historia personal de anticoncepción.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z92.1) Historia personal de uso (presente) de anticoagulantes por largo tiempo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z92.2) Historia personal de uso (presente) de otros medicamentos por largo tiempo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z92.3) Historia personal de irradiación.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z92.4) Historia personal de cirugía mayor, no clasificada en otra parte.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z92.5) Historia personal de medidas de rehabilitación.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z92.8) Historia personal de otros tratamientos médicos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z92.9) Historia personal de tratamiento médico no especificado.</label>


	<label class="identar_3" for="Z93">(Z93) Aberturas artificiales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z93.0) Traqueostomía.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z93.1) Gastrostomía.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z93.2) Ileostomía.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z93.3) Colostomía.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z93.4) Otros orificios artificiales del tubo gastrointestinal.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z93.5) Cistostomía.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z93.6) Otros orificios artificiales de las vías urinarias.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z93.8) Otras aberturas artificiales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z93.9) Abertura artificial, no especificada.</label>


	<label class="identar_3" for="Z94">(Z94) Organos y tejidos trasplantados.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z94.0) Trasplante de riñón.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z94.1) Trasplante de corazón.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z94.2) Trasplante de pulmón.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z94.3) Trasplante de corazón y pulmones.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z94.4) Trasplante de hígado.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z94.5) Trasplante de piel.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z94.6) Trasplante de hueso.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z94.7) Trasplante de córnea.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z94.8) Otros órganos y tejidos trasplantados.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z94.9) Organo o tejido trasplantado no especificado.</label>


	<label class="identar_3" for="Z95">(Z95) Presencia de implantes e injertos cardiovasculares.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z95.0) Presencia de marcapaso cardíaco.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z95.1) Presencia de derivación aortocoronaria.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z95.2) Presencia de válvula cardíaca protésica.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z95.3) Presencia de válvula cardíaca xenogénica.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z95.4) Presencia de otros reemplazos de válvula cardíaca.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z95.5) Presencia de angioplastia, injertos y prótesis coronarias.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z95.8) Presencia de otros injertos y prótesis cardiovasculares.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z95.9) Presencia de injertos e implantes cardiovasculares no especificados.</label>


	<label class="identar_3" for="Z96">(Z96) Presencia de otros implantes funcionales.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z96.0) Presencia de implante urogenital.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z96.1) Presencia de lentes intraoculares.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z96.2) Presencia de implantes óticos y auditivos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z96.3) Presencia de laringe artificial.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z96.4) Presencia de implantes endocrinos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z96.5) Presencia de implantes de raíz de diente y de mandíbula.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z96.6) Presencia de implante ortopédico articular.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z96.7) Presencia de otros implantes de tendones y huesos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z96.8) Presencia de otros implantes funcionales especificados.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z96.9) Presencia de implantes funcionales no especificados.</label>


	<label class="identar_3" for="Z97">(Z97) Presencia de otros dispositivos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z97.0) Presencia de ojo artificial.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z97.1) Presencia de miembro artificial (completo) (parcial).</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z97.2) Presencia de dispositivo protésico dental (completo) (parcial).</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z97.3) Presencia de anteojos y lentes de contacto.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z97.4) Presencia de audífono externo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z97.5) Presencia de dispositivo anticonceptivo (intrauterino).</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z97.8) Presencia de otros dispositivos especificados.</label>

	<label class="identar_3" for="Z98">(Z98) Otros estados postquirúrgicos.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z98.0) Estado de derivación intestinal o anastomosis.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z98.1) Estado de artrodesis.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z98.2) Presencia de dispositivo para drenaje de líquido cefalorraquídeo.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z98.8) Otros estados postquirúrgicos especificados.</label>
	

	<label class="identar_3" for="Z99">(Z99) Dependencia de máquinas y dispositivos capacitantes, no clasificada en otra parte.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z99.0) Dependencia de aspirador.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z99.1) Dependencia de respirador.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z99.2) Dependencia de diáisis renal.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z99.3) Dependencia de silla de ruedas.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z99.8) Dependencia de otras máquinas y dispositivos capacitantes.</label>
		<input type="checkbox" class="identar_check_4"  name="diagnostico[]" id="" value="<?php echo '';?>">
		<label class="identar_4" for="">(Z99.9) Dependencia de máquina y dispositivo capacitante, no .</label>

