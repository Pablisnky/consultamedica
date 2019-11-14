<?php   
	session_start();  
	$verifica = 1906;  
	$_SESSION["verifica"] = $verifica; 
	// Se crea esta sesion para impedir que se acceda a la pagina que procesa el formulario, porque esa pagina pedira el valor de $verifica, y a su vez, la sesion impide que se recargue el formulario mandadolo varias veces a la base de datos

    //Oculta todos los errores, desactivarlo para funcionamiento en local y activarlo para remoto
    //error_reporting(0); 

	$ID_Doctor= $_POST["codigoDoctor"];//se recibe el ID_Doctor desde 03.php
	//echo "ID_Doctor= " . $ID_Doctor . "<br>";
?>   

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>ConsultaMedica_Reservación</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Reservacion de citas medicas"/>
		<meta name="keywords" content="consulta, citas, reservacion, reservaciones, consulta, medico"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/>	
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css">
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/>  
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1000px)" href="../css/MediaQuery_CitasMedicas_Tablet.css"/> 	
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
		<link rel="shortcut icon" type="image/png" href="../images/logo.png">

		<script src="../Javascript/Especialidades.js"></script>
		<script src="../Javascript/Seleccionar_ciudad.js"></script>
		<script src="../Javascript/Seleccionar_hora.js"></script>
		<script src="../Javascript/validar_Campos.js"></script> 
		<script src="../Javascript/Reservaciones_A.js"></script> 
		<script src="../Javascript/Funciones_varias.js"></script>
        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script type="text/javascript">
            document.addEventListener("keydown", valida_LongitudTelefono, false);//validaLongitud() se encuentra en Funciones_varias.js 
            document.addEventListener("keyup", valida_LongitudTelefono, false);//validaLongitud() se encuentra en Funciones_varias.js 
		</script>
        <style>
			li{
				list-style:none;
				cursor: pointer;
			}
		    nav> li{
		        float:left;
		        list-style:none;
            }
		    nav li a {
	            text-align: left !important;
		    }
		    nav li ul{/*caja de contenidode los enlaces*/
	            background-color: #BCBEDA  !important;
		        display:none !important;
		        position:absolute;
                width:80% !important;
		        text-align: left !important;
		        padding-left: 5% !important;
                padding-top: 3%;
		        z-index: 30
		    }            
            nav li:hover > ul{
		        display:block  !important;
		    }            
            nav li ul li{
		        background-color: ;
		      	width: 100%;
                position:relative;
		        font-size: 14px;
		        padding-bottom: 3%;
            }          
		            nav li ul li:hover{
		            	color: white;
		            }

		            @media screen and (max-width: 325px){
		                nav ul li ul{/*caja de contenido de los enlaces*/
		                    background-color: #BCBEDA !important ;
		                    display:none !important;
		                    position:absolute;
		                    width: 150px !important;
		                    text-align: left !important;
		                    padding-left: 10px !important;
		                    line-height: 250% !important;
		                    z-index: 3000;
		                }
		                nav li ul li a{
		                    background-color:;
		                    margin-left: 13px !important;
		                } 
		                nav li ul li:hover{
		                    background-color:;
		                    color: white;
		                }           
			            nav li ul li{
			            	background-color: ;
			                padding-top: 2%;
			                font-size: 16px;
		            	}      
		            }

		            @media (min-width: 326px) and (max-width: 800px){
		                nav ul li ul{/*caja de contenido #BCBEDA de los enlaces*/
		                    background-color:;
		                    display:none !important;
		                    position:absolute;
		                    width: 150px !important;
		                    text-align: left !important;
		                    padding-left: 10px !important;
		                    line-height: 250% !important;
		                    z-index: 3000;
		                }
		                nav li ul li a{
		                    background-color:;
		                    margin-left: 15px !important;
		                } 
		                nav li ul li:hover{
		                    background-color:;
		                    color: white;
		                }           
			            nav li ul li{
			            	background-color: ;
			                padding-top: 2%;
			                font-size: 18px;
		            	}      
		            }
		            .aparecer{
		            	display: none;
		            	margin-top: -15%;
		            }
        </style>
    </head>
	<body>	
			<header class="fixed_1">				
	        	<?php
	            	include("../header/headerPrincipal.php");
	        	?>
	        </header>
			<div class="ocultarMenu" onclick="ocultarMenu()" style="height: 70%; margin-bottom: 8%;"><!--en este contenedor se hace click y se oculta el menu responsive-->
				<h3>Solicitud de cita médica</h3>
				<div id="n80">
					<h3 style="margin-bottom: 10%;">1</h3>
					<div id="n80_principal">
        	           	<span class="medio">Especialidad</span>
						<br>
						<br>
                        <textarea style="background-color: ; text-align: center; overflow: hidden; height: 45px; padding: 0%; width: 95%; border-style: none; margin:1%;" name="Enviar_2" readonly="readonly"><?php echo $_POST['especialidad'];?></textarea><!--Recibe datos desde 03.php -->                
   
                      	<span id="n001">Ciudad</span>
						<div id="MostrarCiudad">
	                        <input style=" background-color: ; width: 95%; border-style: none;"  type="text" name="Enviar_3" readonly="readonly"  value="<?php echo $_POST['ciudad'];?>"><!--Recibe datos desde 03.php -->  
                        </div>                   

                        <span id="n002">Especialista</span>
                      	<!--Recibe datos desde 03.php -->
                      	<!--El input se encuentra lineas abajo dentro del formulario--> 

                        <span id="n003">Costo de consulta</span>
                        <div id="MostrarSalario_2"><!--Recibe datos desde 03.php --> 
                            <input style="width: 90%; border-style: none;"  type="text" readonly="readonly"  name="Enviar_4" value="<?php echo $_POST['precio'];?>">
                        </div> 
                            <!--Recibe datos desde 03.php -->  
                    </div>
                </div>      

				<!-- HORARIO DE LA CONSULTA (2)-->                         
                <div id="n90">
                  	<h3 style="margin-bottom: 6.5%;">2</h3>
					<div id="n90_principal">
                      	<span class="medio">Horarios de consulta</span>
							                
                        <div id="MostrarHorarios"> 
                      		<?php
              				include("../conexion/Conexion_BD.php");

					        $Consulta_1="SELECT * FROM horarios  WHERE ID_Doctor='$ID_Doctor'";
					       	$Resulset_1= mysqli_query($conexion,$Consulta_1);

					        while($horario= mysqli_fetch_array($Resulset_1)){ 
                            	if(!empty($horario["inicio_mañana"])){  ?>					     			                  
					                <table>
					                    <tr>
					                        <td>
					                        	<?php
					                            echo $horario["inicio_mañana"] . "&nbsp";
					                        	?>
					                        </td>
					                        <td> A&nbsp</td>
					                        <td >
					                            <?php 
				                                echo $horario["culmina_mañana"] . "&nbsp";
					                            ?>
					                        </td>
					               		</tr>
					                </table>
					                <table>
					                    <tr>
					                        <td>
						           	            <?php 
					                            $longitud = count($horario);
		                                        for ($i=4; $i<10; $i++){
						                        	echo  $horario["$i"] . "&nbsp";
						                        }  ?>
					                        </td>
					                    </tr>
					                </table> 
	                    			<?php 
	                    		} 
	                        	if(!empty($horario["inicia_tarde"])){  ?>
				                    <br>  
					                <table name="horario_tarde">
					                    <tr>
		                                    <td>
					                            <?php 
					                            echo $horario["inicia_tarde"] . "&nbsp";
					                            ?>
					                        </td>
			                                <td> A&nbsp</td>
					                        <td>
						                        <?php 
					                            echo  $horario["culmina_tarde"] . "&nbsp";
			                                    ?>
					                        </td>
					                    </tr>
					                </table>
					                <table>
					                    <tr>
					                        <td>
					                            <?php 
					                                $longitud = count($horario);
					                                for ($i=12; $i<18; $i++){
					                                	echo  $horario["$i"] . "&nbsp";
					                                }  ?>
					                        </td>
					                    </tr>
					                </table>  
						    				<?php 
						        }
						    } ?>
                    	</div>

						<!-- DIRECCION CENTRO CLINICO -->
                       	<span id="n3">Centro Clinico</span>
                       	<div id="MostrarDireccionAutofill">
                       		<?php                     			
                       		$Doct=$_SESSION["ID_Doctor"];
                       		$Consulta_2="SELECT clinica, direccion, consultorio FROM direcciones WHERE ID_Doctor = '$ID_Doctor' ";
                  			$Resulset_2= mysqli_query($conexion,$Consulta_2);
				          	while($DirConsulta= mysqli_fetch_array($Resulset_2)){ ?>
						          
						        <table>
						        	<tr>
						        		<td style="text-align: left; margin-bottom: 2%; display: block;"><?php echo $DirConsulta['clinica'];?></td>
						        	</tr>
						        	<tr>
						        		<td style="text-align: left; margin-bottom: 2%; display: block;"><?php echo $DirConsulta['direccion'];?></td>
						        	</tr>         
						            <tr>
						                <td style="text-align: left;"><?php echo"Consultorio " . $DirConsulta['consultorio'];?></td>
						            </tr>   
						        </table>

						        <?php } ?>
                       	</div>
                    </div>
                </div>

				<!-- FECHA Y TURNO (3)-->
	            <div id="n100">
	                	<h3 style="margin-bottom: 10%;">3</h3>
						<div id="n100_principal">
		                  	<span class="medio" >Fecha de la cita</span>
							<br><br>
							<!-- <label onclick="llamar_calendario()">Octubre</label> -->
							<div style="padding: 5%;">								
								<nav>
								  	<ul>
								  		<li class="menu_Meses">Seleccione una fecha
										    <ul class="menu_Secundario">
									            <li onclick="llamar_calendario_1();">Enero</li><br><!--llamar_calendario_1() se encuentra en Ajax_Cancelar.js-->
										        <li onclick="llamar_calendario_2()">Febrero</li><br><!--llamar_calendario_2() se encuentra en Ajax_Cancelar.js-->
										    </ul>
									    </li>
							        </ul>
							    </nav>
	    						<div id="RespuestaCalendario_1" style="background-color:; display:none ;"></div><!--recibe respuesta de Ajax-->
	    						<div id="RespuestaCalendario_2" style="background-color:; display:none;"></div><!--recibe respuesta de Ajax-->

								<input  style="visibility: hidden;" readonly="readonly" type="text" id="Calendario" name="fechaCita" form="pacient" >

	    						<div id="Aparecer_1" class="aparecer"><!--esta oculto, aparece cuando se seleciona un mes, muestra el calendario de ese mes-->
									<?php
										include("CalendarioEnero.php");			
									?>	
	    						</div>
	    						<div id="Aparecer_2" class="aparecer"><!--esta oculto, aparece cuando se seleciona un mes, muestra el calendario de ese mes-->
									<?php
										include("CalendarioFebrero.php");			
									?>	
		    					</div>

	    						<script type="text/javascript">
		    						//se detecte el cambio en el div que recibe la respuesta de ajax, para hacer aparecer el calendario
		    						document.getElementById("RespuestaCalendario_1").addEventListener("DOMNodeInserted", handler_1, true);
		    						document.getElementById("RespuestaCalendario_2").addEventListener("DOMNodeInserted", handler_2, true);
	 
									function handler_1(){
										document.getElementById("Aparecer_1").style.display="block";//Muestra el div que contiene el calendario			
										document.getElementById("Calendario").style.visibility="visible";//Muestra el input con la fecha seleccionada
									}
									function handler_2(){
										document.getElementById("Aparecer_2").style.display="block";//Muestra el div que contiene el calendario			
										document.getElementById("Calendario").style.visibility="visible";//Muestra el input con la fecha seleccionada
									}
		    					</script>
							</div>
							<br>            
							<br> 
							<hr> 
	       					<!-- el select del turno esta dentro del formulario lineas abajo -->
							<span class="textoVerificar" onclick="llamar_NumPacientesAutofill()">Verifique disponibilidad de ser atendido.<!--la funcion llamar_NumPacientesAutofill() se encuentra en Ajax_Cancelar.js-->
							</span>
							<br>
						 	<div id="MostrarPacientes"></div><!-- Muestra respuesta dese Ajax -->
						</div>
				</div>

				<!-- FORMULARIO DE DATOS PERSONALES (4)-->
				<div id="n110">
					<h3 style="margin-bottom: 10%;">4</h3>
					<div id="n110_principal">
						<span class="medio">Datos personales</span>
						<br>
						<br>
						<form action="../pacientes.php" method="post" name="pacient" id="pacient" class="" autocomplete="off">
							<label for="nombre">Nombre</label><br>
							<input style="width: 95%;" type="text" name="nombre" id="Nombre"/>
							<br>	
							<label for="apellido">Apellido</label><br>
							<input style="width: 95%;" type="text" name="apellido" id="Apellido"/>
							<br>
							<label for="cedula">Cédula</label><br>
							<input style="width: 95%;" type="text" name="cedula" id="Cedula"/>
							<br> 
							<label for="Edad">Edad</label><br>
		                    <input style="width: 95%;" type="text" name="edad" id="Edad"/>
							<br> 
		                    <label for="telefono">Teléfono</label><br>
	                        <input style="width: 95%;" type="text" name="telefono" id="Telefono" placeholder="solo números" onblur="validarFormatotelefono(this.value)"/>
							<br>
							<input class="btn" type="submit" value="Enviar Datos"  onclick=""> 	<!-- return validar_02()-->		
							<div id="MostrarDoctor_2">
								<textarea style="width: 95%; text-align: center; padding: 0%; margin-top: 0%; margin-left: 0%; height: 45px; border-style: none;" type="text" readonly="readonly"><?php echo $_POST['NombreDoctor'];?></textarea>
								<input style="visibility: hidden" type="text" name="captura_1" id="Doctor" value="<?php echo $ID_Doctor;?>">
								<!-- lo recibe desde 03.php -->
			                </div>	
								<?php
							//Se consulta los dias de consulta del Dr.
							$Consulta_3="SELECT inicio_mañana, inicia_tarde FROM horarios WHERE ID_Doctor ='$ID_Doctor'";
							$Resulset = mysqli_query($conexion,$Consulta_3);
							$TurnoConsulta= mysqli_fetch_array($Resulset);

						 		echo '<select  class="citas_4" id="Tur_1" name="tur_1">';//Captura, almacena el ID_Doctor
								echo '<option value="0">Seleccione Turno</option>'; 
						 		if(!empty($TurnoConsulta['inicio_mañana'])){		
						       		echo '<option value="mañana">  Mañana </option>'; 
					            }
					            if(!empty($TurnoConsulta['inicia_tarde'])){
									//echo '<option value="0">Seleccione Turno</option>'; 
					           		echo '<option value="tarde">tarde</option>'; 
					            }
					           	echo  '</select>';
								?>
			                 <br>								
						</form>
					</div>
					<div id="n110_tapa" onclick="advertencia_2()"></div><!--la función advertencia_2() se encuentra en Funciones_varias.js-->
				</div>
			</div>
			<footer style="clear: left;">	
	        	<?php
	            	include("../header/footer.php");
	        	?> 
        	</footer> 
	</body>
</html>

<script type="text/javascript">
//ocultar el calendario haciendo click en cualquier parte del el documento
document.addEventListener("click", function(e){
	//obtiendo informacion del DOM para  
	var clic = e.target;
	if(Aparecer_1.style.display == "block" && clic != Aparecer_1){
		Aparecer_1.style.display = "none";
	}
	else if(Aparecer_2.style.display == "block" && clic != Aparecer_2){
		Aparecer_2.style.display = "none";
	}
},
false);

//Mascara de entrada para el telefono
    Telefono.addEventListener("input", function(){
      if (this.value.length == 4){
          this.value += "-"; 
      }
      else if  (this.value.length == 8){
          this.value += ".";  
      }
      else if  (this.value.length == 11){
          this.value += ".";  
      }
    }, false);


//Validar el formato de telefono
    function validarFormatotelefono(campo){
        var RegExPattern = /^\d{4}\-\d{3}\.\d{2}\.\d{2}$/;
        if((campo.match(RegExPattern)) && (campo!='')){
            return true;
        }
        else{
            alert("Telefono con formato incorrecto");
            document.getElementById("Telefono").value = "";            
            return true;
        }
    }
</script>