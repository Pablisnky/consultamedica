
<style>
	.calendario_0{
		background-color: #F4FCFB;
		display: block;
		position: absolute;
		z-index: 300000 !important;
	}
	.calendario_2{
		color:rgba(86, 101, 115, 0.5);
	}
	.calendario_3 td{
		background-color: rgba(4, 6, 82, 0.1);
		text-align: center;
	    border: 1px solid blue;
	    padding: 4%;
	    width: 30px;
	}
</style>

<?php
	//Consulta para tomar los dias que el Dr pasa consulta
	$Consulta= "SELECT * FROM horarios WHERE ID_Doctor = '$ID_Doctor' ";
	$Recordset=mysqli_query($conexion,$Consulta);      
	$Pacient= mysqli_fetch_array($Recordset);		 
?>
<table class="calendario_0" id="Calendario_0">
				<thead>
					<tr>
						<td colspan="7" class="calendario_4">ENERO</td>
					</tr>
					<tr>
						<th>Do</th>
						<th>Lu</th>
						<th>Ma</th>
						<th>Mi</th>
						<th>Ju</th>
						<th>Vi</th>
						<th>Sa</th>
					</tr>
				</thead>
				<tbody class="calendario_3">
					<tr>	
						<td></td><!-- Domingo-->
						<td></td><!-- Lunes-->
						<td><!-- Martes -->
							<?php
								if(!empty($Pacient["martes_mañana"]) || !empty($Pacient["martes_tarde"])){
									echo "<input id='Fecha_1' style='display:none' onclick='transferir_1en()' value='01-01-2019'/>";
									echo "<label style='cursor:pointer;' for='Fecha_1' onclick='ocultarCalend()'>01</label>";
								}
								else{
									echo "<label class='calendario_2'>01</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["miercoles_mañana"]) || !empty($Pacient["miercoles_tarde"])){
									echo "<input id='Fecha_2' style='display:none' onclick='transferir_2en()' value='02-01-2019'/>";
									echo "<label style='cursor:pointer;' for='Fecha_2' onclick='ocultarCalend()'>02</label>";
								}
								else{
									echo "<label class='calendario_2'>02</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["jueves_mañana"]) || !empty($Pacient["jueves_tarde"])){
									echo "<input id='Fecha_3' style='display:none' onclick='transferir_3en()' value='03-01-2019'/>";
									echo "<label style='cursor:pointer;'  for='Fecha_3' onclick='ocultarCalend()'>03</label>";
								}
								else{
									echo "<label class='calendario_2'>03</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["viernes_mañana"]) || !empty($Pacient["viernes_tarde"])){
									echo "<input id='Fecha_4' style='display:none' onclick='transferir_4en()' value='04-01-2019'/>";
									echo "<label style='cursor:pointer;'  for='Fecha_4' onclick='ocultarCalend()'>04</label>";
								}
								else{
									echo "<label class='calendario_2'>04</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["sabado_mañana"]) || !empty($Pacient["sabado_tarde"])){
									echo "<input id='Fecha_5' style='display:none' onclick='transferir_5en()' value='05-01-2019'/>";
									echo "<label style='cursor:pointer;'  for='Fecha_5' onclick='ocultarCalend()'>05</label>";
								}
								else{
									echo "<label class='calendario_2'>05</label>";
								}
							;?>
						</td>
					</tr>
					<!-- ///////////////////////////////////////////////////////////////////////////// -->
					<tr>
						<td>
							<?php echo "<label class='calendario_2'>06</label>";?>
						</td> 
						<td>
							<?php
								if(!empty($Pacient["lunes_mañana"]) || !empty($Pacient["lunes_tarde"])){
									echo "<input id='Fecha_7' style='display:none' onclick='transferir_7en()' value='07-01-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_7' onclick='ocultarCalend()'>07</label>";
								}
								else{
									echo "<label class='calendario_2'>07</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["martes_mañana"]) || !empty($Pacient["martes_tarde"])){
									echo "<input id='Fecha_8' style='display:none' onclick='transferir_8en()' value='08-01-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_8' onclick='ocultarCalend()'>08</label>";
								}
								else{
									echo "<label class='calendario_2'>08</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["miercoles_mañana"]) || !empty($Pacient["miercoles_tarde"])){
									echo "<input id='Fecha_9' style='display:none' onclick='transferir_9en()' value='09-01-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_9' onclick='ocultarCalend()'>09</label>";
								}
								else{
									echo "<label class='calendario_2'>09</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["jueves_mañana"]) || !empty($Pacient["jueves_tarde"])){
									echo "<input id='Fecha_10' style='display:none' onclick='transferir_10en()' value='10-01-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_10' onclick='ocultarCalend()'>10</label>";
								}
								else{
									echo "<label class='calendario_2'>10</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["viernes_mañana"]) || !empty($Pacient["viernes_tarde"])){
									echo "<input id='Fecha_11' style='display:none' onclick='transferir_11en()' value='11-01-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_11' onclick='ocultarCalend()'>11</label>";
								}
								else{
									echo "<label class='calendario_2'>11</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["sabado_mañana"]) || !empty($Pacient["sabado_tarde"])){
									echo "<input id='Fecha_12' style='display:none' onclick='transferir_12en()' value='12-01-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_12' onclick='ocultarCalend()'>12</label>";
								}
								else{
									echo "<label class='calendario_2'>12</label>";
								}
							;?>
						</td>
					</tr>
					<!-- ///////////////////////////////////////////////////////////////////////////// -->
					<tr>
						<td>
							<?php echo "<label class='calendario_2'>13</label>";?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["lunes_mañana"]) || !empty($Pacient["lunes_tarde"])){
									echo "<input id='Fecha_14' style='display:none' onclick='transferir_14en()' value='14-01-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_14' onclick='ocultarCalend()'>14</label>";
								}
								else{
									echo "<label class='calendario_2'>14</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["martes_mañana"]) || !empty($Pacient["martes_tarde"])){
									echo "<input id='Fecha_15' style='display:none' onclick='transferir_15en()' value='15-01-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_15' onclick='ocultarCalend()'>15</label>";
								}
								else{
									echo "<label class='calendario_2'>15</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["miercoles_mañana"]) || !empty($Pacient["miercoles_tarde"])){
									echo "<input id='Fecha_16' style='display:none' onclick='transferir_16en()' value='16-01-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_16' onclick='ocultarCalend()'>16</label>";
								}
								else{
									echo "<label class='calendario_2'>16</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["jueves_mañana"]) || !empty($Pacient["jueves_tarde"])){
									echo "<input id='Fecha_17' style='display:none' onclick='transferir_17en()' value='17-01-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_17' onclick='ocultarCalend()'>17</label>";
								}
								else{
									echo "<label class='calendario_2'>17</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["viernes_mañana"]) || !empty($Pacient["viernes_tarde"])){
									echo "<input id='Fecha_18' style='display:none' onclick='transferir_18en()' value='18-01-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_18' onclick='ocultarCalend()'>18</label>";
								}
								else{
									echo "<label class='calendario_2'>18</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["sabado_mañana"]) || !empty($Pacient["sabado_tarde"])){
									echo "<input id='Fecha_19' style='display:none' onclick='transferir_19en()' value='19-01-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_19' onclick='ocultarCalend()'>19</label>";
								}
								else{
									echo "<label class='calendario_2'>19</label>";
								}
							;?>
						</td>
					</tr>
					<!-- ///////////////////////////////////////////////////////////////////////////// -->
					<tr>
						<td>
							<?php echo "<label class='calendario_2'>20</label>";?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["lunes_mañana"]) || !empty($Pacient["lunes_tarde"])){
									echo "<input id='Fecha_21' style='display:none' onclick='transferir_21en()' value='21-01-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_21' onclick='ocultarCalend()'>21</label>";
								}
								else{
									echo "<label class='calendario_2'>21</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["martes_mañana"]) || !empty($Pacient["martes_tarde"])){
									echo "<input id='Fecha_22' style='display:none' onclick='transferir_22en()' value='22-01-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_22' onclick='ocultarCalend()'>22</label>";
								}
								else{
									echo "<label class='calendario_2'>22</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["miercoles_mañana"]) || !empty($Pacient["miercoles_tarde"])){
									echo "<input id='Fecha_23' style='display:none' onclick='transferir_23en()' value='23-01-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_23' onclick='ocultarCalend()'>23</label>";
								}
								else{
									echo "<label class='calendario_2'>23</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["jueves_mañana"]) || !empty($Pacient["jueves_tarde"])){
									echo "<input id='Fecha_24' style='display:none' onclick='transferir_24en()' value='24-01-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_24' onclick='ocultarCalend()'>24</label>";
								}
								else{
									echo "<label class='calendario_2'>24</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["viernes_mañana"]) || !empty($Pacient["viernes_tarde"])){
									echo "<input id='Fecha_25' style='display:none' onclick='transferir_25en()' value='25-01-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_25' onclick='ocultarCalend()'>25</label>";
								}
								else{
									echo "<label class='calendario_2'>25</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["sabado_mañana"]) || !empty($Pacient["sabado_tarde"])){
									echo "<input id='Fecha_26' style='display:none' onclick='transferir_26en()' value='26-01/2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_26' onclick='ocultarCalend()'>26</label>";
								}
								else{
									echo "<label class='calendario_2'>26</label>";
								}
							;?>
						</td>
					</tr>
					<!-- ///////////////////////////////////////////////////////////////////////////// -->
					<tr>
						<td>
							<?php echo "<label class='calendario_2'>27</label>";?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["lunes_mañana"]) || !empty($Pacient["lunes_tarde"])){
									echo "<input id='Fecha_28' style='display:none' onclick='transferir_28en()' value='28-01-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_28' onclick='ocultarCalend()'>28</label>";
								}
								else{
									echo "<label class='calendario_2'>28</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["martes_mañana"]) || !empty($Pacient["martes_tarde"])){
									echo "<input id='Fecha_29' style='display:none' onclick='transferir_29en()' value='29-01-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_29' onclick='ocultarCalend()'>29</label>";
								}
								else{
									echo "<label class='calendario_2'>29</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["miercoles_mañana"]) || !empty($Pacient["miercoles_tarde"])){
									echo "<input id='Fecha_30' style='display:none' onclick='transferir_30en()' value='30-01-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_30' onclick='ocultarCalend()'>30</label>";
								}
								else{
									echo "<label class='calendario_2'>30</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["jueves_mañana"]) || !empty($Pacient["jueves_tarde"])){
									echo "<input id='Fecha_31' style='display:none' onclick='transferir_31en()' value='31-01-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_31' onclick='ocultarCalend()'>31</label>";
								}
								else{
									echo "<label class='calendario_2'>31</label>";
								}
							;?>
						</td>
					</tr>
				</tbody>
			</table> 

<script type="text/javascript">
	//cuando se coloque el foco en el input de la fecha, se muestra el calendario
    Calendario.addEventListener("focus",mostrarCalendario, true);

    function mostrarCalendario(){
    	var A= document.getElementById("Calendario_0"); 
    	A.style.display = "block";
    }
    function ocultarCalend(){
    	var A= document.getElementById("Calendario_0"); 
    	A.style.display = "none";

    }

    function transferir_1en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_1").value;
    }
    function transferir_2en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_2").value;
    }
    function transferir_3en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_3").value;
    }
    function transferir_4en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_4").value;
    }
    function transferir_5en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_5").value;
    }
    function transferir_6en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_6").value;
    }
    function transferir_7en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_7").value;
    }
    function transferir_8en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_8").value;
    }
    function transferir_9en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_9").value;
    }
    function transferir_10en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_10").value;
    }
    function transferir_11en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_11").value;
    }
    function transferir_12en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_12").value;
    }
    function transferir_13en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_13").value;
    }
    function transferir_14en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_14").value;
    }
    function transferir_15en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_15").value;
    }
    function transferir_16en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_16").value;
    }
    function transferir_17en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_17").value;
    }
    function transferir_18en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_18").value;
    }
    function transferir_19en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_19").value;
    }
    function transferir_20en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_20").value;
    }
    function transferir_21en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_21").value;
    }
    function transferir_22en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_22").value;
    }
    function transferir_23en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_23").value;
    }
    function transferir_24en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_24").value;
    }
    function transferir_25en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_25").value;
    }
    function transferir_26en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_26").value;
    }
    function transferir_27en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_27").value;
    }
    function transferir_28en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_28").value;
    }
    function transferir_29en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_29").value;
    }
    function transferir_30en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_30").value;
    }
    function transferir_31en(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_31").value;
    }
</script>