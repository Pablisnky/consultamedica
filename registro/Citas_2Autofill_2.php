<?php   
	session_start();  
	$verifica_3 = 1910;  
	$_SESSION["verifica_3"] = $verifica_3;  

	$ID_Doctor= $_POST["codigoDoctor"];//se recibe el ID_Doctor desde 03.php
	//echo "ID_Doctor= " . $ID_Doctor . "<br>";

	//aqui se almacena el ID_Paciente que se obtuvo en validarSesion.php
    $sesion= $_SESSION["UsuarioPaciente"];
    //echo "<p>ID_Paciente=  $sesion</p>";
            
    include("../conexion/Conexion_BD.php");
?>   
<!--Sesion para impedir que se acceda a la pagina que procesa el formulario, porque esa pagina pedira el valor de $verifica, y a su vez, la sesion impide que se recargue el formulario mandadolo varias veces a la base de datos-->


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
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
		<link rel="shortcut icon" type="image/png" href="../images/logo.png">
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_CitasMedicas.css"> 

  		<script src="https://code.jquery.com/jquery-1.12.4.js"></script><!--Libreria del Calendario-->
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script><!--Libreria del Calendario-->
  		<script src="../Javascript/CalendarioJQwery.js"></script><!--Formato Calendario-->
		<script src="../Javascript/Especialidades.js"></script>
		<script src="../Javascript/Seleccionar_ciudad.js"></script>
		<script src="../Javascript/Seleccionar_hora.js"></script>
		<script src="../Javascript/validar_Campos.js"></script> 
		<script src="../Javascript/Reservaciones_A.js"></script> 
		<script src="../Javascript/Funciones_varias.js"></script>
        <script src="../Javascript/Ajax_Cancelar.js"></script>

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:700');
        </style>
    </head>
	<body onload="autofocus()"> 
		<div style="background-color: ; min-height: 78.6%;"> 
        <header class="fixed_1">
            <?php
                include("../vista/headerPaciente.php")
            ?>   
        </header>
			<div onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
				<h3 class="encabezadoSesion_1">Solicitud de cita médica</h3> 
					<div id="n80">
						<h3 style="margin-bottom: 10%; ">1</h3>
						<div id="n80_principal">
        	            	<span class="medio">Especialidades medicas</span>
							<br>
							<br>
                            <input style="width: 95%; border-style: none;margin-top:3%;"  type="text" name="Enviar_2" readonly="readonly"  value="<?php echo $_POST['especialidad'];?>"><!--Recibe datos desde 03.php -->                
                           	<span id="n001">Ciudad</span>

							<div id="MostrarCiudad">
	                          	<input style=" background-color: ; width: 95%; border-style: none; "  type="text" name="Enviar_3" readonly="readonly"  value="<?php echo $_POST['ciudad'];?>"><!--Recibe datos desde 03.php -->  
                           	</div>                   

                           	<span id="n002">Especialista</span>
                           	<!--Recibe datos desde 03.php -->
                           	<!--Se encuentra lineas abajo dentro del formulario--> 

                           	<span id="n003">Costo de consulta</span>
                            <div id="MostrarSalario_2"><!--Recibe datos desde 03.php --> 
                            	
                            <input style="width: 90%; border-style: none;"  type="text" readonly="readonly"  name="Enviar_4" value="<?php echo $_POST['precio'];?>">
                            </div> 
                            <!--Recibe datos desde 03.php -->  
                       	</div>
                    </div>                               

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
	        	
                    <div id="n90">
                    	<h3 style="margin-bottom: 6.5%;">2</h3>
						<div id="n90_principal">
                          	<span class="medio">Horarios de consulta</span>
							                
                       		<div id="MostrarHorarios"> 
                       			<?php
					           		$Consulta_1="SELECT * FROM horarios  WHERE ID_Doctor='$ID_Doctor'";
					            	$Resulset_1= mysqli_query($conexion,$Consulta_1);

					            	while($horario= mysqli_fetch_array($Resulset_1)){ 
                            			if(!empty($horario["inicio_mañana"])){
					        				?>                  
					                        <table >
					                            <tr >
					                                <td >
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
					                                    }?>
					                                </td>
					                            </tr>
					                        </table> 
	                    						<?php 
	                    				} 
	                        			if(!empty($horario["inicia_tarde"])){
	                    					?>
				                    		<br>  
					                        <table name="horario_tarde" >
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
					                                    }?>
					                                </td>
					                            </tr>
					                        </table>  
						        				<?php 
						        		}
						    		} ?>
                    	</div>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

                       	<span id="n3">Centro Clinico</span>
                       	<div id="MostrarDireccionAutofill">
                       		<?php                     			
                       		$Doct=$_SESSION["ID_Doctor"];
                       		$Consulta_2="SELECT clinica, direccion, consultorio FROM direcciones WHERE ID_Doctor = '$ID_Doctor' ";
                       		$Resulset_2= mysqli_query($conexion,$Consulta_2);

						    while($DirConsulta= mysqli_fetch_array($Resulset_2)){ 
						       	?>  
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
						        	<?php 
					        } ?>
                   		</div>
                   	</div>
                </div>
                
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

	                <div id="n100_A">
	                	<h3 style="margin-bottom: 10%;">3</h3>
						<div id="n100_principal">
		                  	<span class="medio">Datos del paciente</span>
							<br>
							<form action="pacientes.php" method="post" name="pacient" enctype="" id="pacient" autocomplete="off">	 <?php
									$Consulta_1="SELECT * FROM pacientes_registrados WHERE ID_PR='$sesion'";
					            	$Resulset_1= mysqli_query($conexion,$Consulta_1);
					            	$Paciente= mysqli_fetch_array($Resulset_1);
					            ?>               	
								<label for="nombre" class="medio_4A">Nombre</label>
								<input class="medio_5" type="text" name="nombre" id="Nombre" readonly="readonly" value="<?php echo $Paciente['nombre_pacient'];?>"  />
	
								<label for="apellido" class="medio_4">Apellido</label>
								<input class="medio_5" type="text" name="apellido" id="Apellido" readonly="readonly" value="<?php echo $Paciente['apellido_pacient'];?>"  />

								<label for="cedula" class="medio_4">Cédula</label>
								<input class="medio_5" type="text" name="cedula" id="Cedula" readonly="readonly" value="<?php echo $Paciente['cedula_pacient'];?>" />
 
								<label for="Edad" class="medio_4">Edad</label>
		                        <input class="medio_5" type="text" name="edad" id="Edad" readonly="readonly" value="<?php echo $Paciente['edad_pacient'];?>" />
 
		                        <label for="telefono" class="medio_4">Teléfono</label>
	                            <input class="medio_5" type="text" name="telefono" id="Telefono" readonly="readonly" value="<?php echo $Paciente['telefono_pacient'];?>" />
								
								<div id="MostrarDoctor_3">
									<input style="width: 95%; border-style: none;" type="text" readonly="readonly" value="<?php echo $_POST['NombreDoctor'];?>">

									<input type="text" hidden name="captura_1"  id="Doctor" value="<?php echo $ID_Doctor;?>">
								<!--lo recibe desde 03.php-->
			                    </div>	        	
							<br>								
						</div>
					</div>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
				
					<div id="n110">
						<h3 style="margin-bottom: 10%;">4</h3>
						<div id="n110_principal">
							<span class="medio">Fecha de la cita</span>
							<br>
	    					<input  class="fecha" type="text"  id="Calendario_CM" form="pacient" placeholder="Seleccione una fecha" name="fechaCita" tabindex="7">
							<br>            
							<br>
							<br>            
                         	<span id="n001">Hora de  la cita</span>

							<?php
							mysqli_query($conexion,"SET NAMES 'utf8'");
							$Consulta_3="SELECT inicio_mañana, inicia_tarde FROM horarios WHERE ID_Doctor ='$ID_Doctor'";
							$Resulset = mysqli_query($conexion,$Consulta_3);
							$TurnoConsulta= mysqli_fetch_array($Resulset);

							 	echo '<select  class="citas_3" id="Tur_1" name="tur_1">';//Captura, almacena el ID_Doctor
										echo '<option value=""> Seleccione Turno </option>'; 
						 			if(!empty($TurnoConsulta['inicio_mañana'])){		
						           		echo '<option value="mañana">  Mañana </option>'; 
						            }
						            if(!empty($TurnoConsulta['inicia_tarde'])){
										//echo '<option value="0">Seleccione Turno</option>'; 
						           		echo '<option value="tarde">  tarde </option>'; 
					            	}

					            echo  '</select>';
							?>

		       				<hr id="Turno">
							<span class="textoVerificar" style="cursor: pointer; text-decoration: underline" onclick="llamar_NumPacientesAutofill_2()">Verifique disponibilidad de ser atendido.<!--la funcion llamar_NumPacientesAutofill() se encuentra en Ajax_Cancelar.js-->
							</span>
							<br>							
						 	<div id="MostrarPacientes_2"></div><!-- recibe desde NumPaciemtes_2.php el numero de pacientes esperando turno-->
						 	<input  class="btn_2" type="submit" value="Solicitar cita"  onclick="return validar_07()"> 
						 </form>
						</div>
					</div>
				</div>
			</div></div>
			 <footer>   
	            <?php
	                include("../vista/footer.php");
	            ?>
        	</footer> 
		</div>
	</body>
</html>

<script type="text/javascript">
function cerrar(){//esta funcion es llamada desde este archivo, abre la ventana del directorio desde la sesion del paciente    

        close();  
    }
</script>