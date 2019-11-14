
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
	    width: 50px;
	}


	@media (min-width: 326px) and (max-width: 800px){

	.calendario_3 td{
		background-color: rgba(4, 6, 82, 0.1);
		text-align: center;
	    border: 1px solid blue;
	    padding: 3%;
	    width: 50px;
	}
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
						<td colspan="7" class="calendario_4">NOVIEMBRE</td>
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
						<td></td><!-- Martes-->
						<td></td><!-- Miercoles-->	
						<td>
							<?php
								if(!empty($Pacient["jueves_mañana"]) || !empty($Pacient["jueves_tarde"])){
									echo "<input id='Fecha_1' style='display:none' onclick='transferir_1()' value='01-11-2018'/>";
									echo "<label style='cursor:pointer;' for='Fecha_1' onclick='ocultarCalend()'>01</label>";
								}
								else{
									echo "<label class='calendario_2'>01</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["viernes_mañana"]) || !empty($Pacient["viernes_tarde"])){
									echo "<input id='Fecha_2' style='display:none' onclick='transferir_2()' value='02-11-2018'/>";
									echo "<label style='cursor:pointer;' for='Fecha_2' onclick='ocultarCalend()'>02</label>";
								}
								else{
									echo "<label class='calendario_2'>02</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["sabado_mañana"]) || !empty($Pacient["sabado_tarde"])){
									echo "<input id='Fecha_3' style='display:none' onclick='transferir_3()' value='03-11-2018'/>";
									echo "<label style='cursor:pointer;'  for='Fecha_3' onclick='ocultarCalend()'>03</label>";
								}
								else{
									echo "<label class='calendario_2'>03</label>";
								}
							;?>
						</td>
					</tr>
					<!-- ///////////////////////////////////////////////////////////////////////////// -->
					<!-- ///////////////////////////////////////////////////////////////////////////// -->
					<tr>
						<td>
							<?php echo "<label class='calendario_2'>04</label>";?>
						</td> 
						<td>
							<?php
								if(!empty($Pacient["lunes_mañana"]) || !empty($Pacient["lunes_tarde"])){
									echo "<input id='Fecha_8' style='display:none' onclick='transferir_8()' value='05-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_8' onclick='ocultarCalend()'>05</label>";
								}
								else{
									echo "<label class='calendario_2'>05</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["martes_mañana"]) || !empty($Pacient["martes_tarde"])){
									echo "<input id='Fecha_9' style='display:none' onclick='transferir_9()' value='06-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_9' onclick='ocultarCalend()'>06</label>";
								}
								else{
									echo "<label class='calendario_2'>06</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["miercoles_mañana"]) || !empty($Pacient["miercoles_tarde"])){
									echo "<input id='Fecha_7' style='display:none' onclick='transferir_7()' value='07-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_7' onclick='ocultarCalend()'>07</label>";
								}
								else{
									echo "<label class='calendario_2'>07</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["jueves_mañana"]) || !empty($Pacient["jueves_tarde"])){
									echo "<input id='Fecha_8' style='display:none' onclick='transferir_8()' value='08-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_8' onclick='ocultarCalend()'>08</label>";
								}
								else{
									echo "<label class='calendario_2'>08</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["viernes_mañana"]) || !empty($Pacient["viernes_tarde"])){
									echo "<input id='Fecha_9' style='display:none' onclick='transferir_9()' value='09-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_9' onclick='ocultarCalend()'>09</label>";
								}
								else{
									echo "<label class='calendario_2'>09</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["sabado_mañana"]) || !empty($Pacient["sabado_tarde"])){
									echo "<input id='Fecha_10' style='display:none' onclick='transferir_10()' value='10-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_10' onclick='ocultarCalend()'>10</label>";
								}
								else{
									echo "<label class='calendario_2'>10</label>";
								}
							;?>
						</td>
					</tr>
					<!-- ///////////////////////////////////////////////////////////////////////////// -->
					<tr>
						<td>
							<?php echo "<label class='calendario_2'>11</label>";?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["lunes_mañana"]) || !empty($Pacient["lunes_tarde"])){
									echo "<input id='Fecha_12' style='display:none' onclick='transferir_12()' value='12-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_12' onclick='ocultarCalend()'>12</label>";
								}
								else{
									echo "<label class='calendario_2'>12</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["martes_mañana"]) || !empty($Pacient["martes_tarde"])){
									echo "<input id='Fecha_13' style='display:none' onclick='transferir_13()' value='13-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_13' onclick='ocultarCalend()'>13</label>";
								}
								else{
									echo "<label class='calendario_2'>13</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["miercoles_mañana"]) || !empty($Pacient["miercoles_tarde"])){
									echo "<input id='Fecha_14' style='display:none' onclick='transferir_14()' value='14-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_14' onclick='ocultarCalend()'>14</label>";
								}
								else{
									echo "<label class='calendario_2'>14</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["jueves_mañana"]) || !empty($Pacient["jueves_tarde"])){
									echo "<input id='Fecha_15' style='display:none' onclick='transferir_15()' value='15-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_15' onclick='ocultarCalend()'>15</label>";
								}
								else{
									echo "<label class='calendario_2'>15</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["viernes_mañana"]) || !empty($Pacient["viernes_tarde"])){
									echo "<input id='Fecha_16' style='display:none' onclick='transferir_16()' value='16-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_16' onclick='ocultarCalend()'>16</label>";
								}
								else{
									echo "<label class='calendario_2'>16</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["sabado_mañana"]) || !empty($Pacient["sabado_tarde"])){
									echo "<input id='Fecha_17' style='display:none' onclick='transferir_17()' value='17-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_17' onclick='ocultarCalend()'>17</label>";
								}
								else{
									echo "<label class='calendario_2'>17</label>";
								}
							;?>
						</td>
					</tr>
					<!-- ///////////////////////////////////////////////////////////////////////////// -->
					<tr>
						<td>
							<?php echo "<label class='calendario_2'>18</label>";?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["lunes_mañana"]) || !empty($Pacient["lunes_tarde"])){
									echo "<input id='Fecha_19' style='display:none' onclick='transferir_19()' value='19-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_19' onclick='ocultarCalend()'>19</label>";
								}
								else{
									echo "<label class='calendario_2'>19</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["martes_mañana"]) || !empty($Pacient["martes_tarde"])){
									echo "<input id='Fecha_20' style='display:none' onclick='transferir_20()' value='20-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_20' onclick='ocultarCalend()'>20</label>";
								}
								else{
									echo "<label class='calendario_2'>20</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["miercoles_mañana"]) || !empty($Pacient["miercoles_tarde"])){
									echo "<input id='Fecha_21' style='display:none' onclick='transferir_21()' value='21-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_21' onclick='ocultarCalend()'>21</label>";
								}
								else{
									echo "<label class='calendario_2'>21</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["jueves_mañana"]) || !empty($Pacient["jueves_tarde"])){
									echo "<input id='Fecha_22' style='display:none' onclick='transferir_22()' value='22-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_22' onclick='ocultarCalend()'>22</label>";
								}
								else{
									echo "<label class='calendario_2'>22</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["viernes_mañana"]) || !empty($Pacient["viernes_tarde"])){
									echo "<input id='Fecha_23' style='display:none' onclick='transferir_23()' value='23-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_23' onclick='ocultarCalend()'>23</label>";
								}
								else{
									echo "<label class='calendario_2'>23</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["sabado_mañana"]) || !empty($Pacient["sabado_tarde"])){
									echo "<input id='Fecha_24' style='display:none' onclick='transferir_24()' value='24-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_24' onclick='ocultarCalend()'>24</label>";
								}
								else{
									echo "<label class='calendario_2'>24</label>";
								}
							;?>
						</td>
					</tr>
					<!-- ///////////////////////////////////////////////////////////////////////////// -->
					<tr>
						<td>
							<?php echo "<label class='calendario_2'>25</label>";?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["lunes_mañana"]) || !empty($Pacient["lunes_tarde"])){
									echo "<input id='Fecha_26' style='display:none' onclick='transferir_26()' value='26-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_26' onclick='ocultarCalend()'>26</label>";
								}
								else{
									echo "<label class='calendario_2'>26</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["martes_mañana"]) || !empty($Pacient["martes_tarde"])){
									echo "<input id='Fecha_27' style='display:none' onclick='transferir_27()' value='27-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_27' onclick='ocultarCalend()'>27</label>";
								}
								else{
									echo "<label class='calendario_2'>27</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["miercoles_mañana"]) || !empty($Pacient["miercoles_tarde"])){
									echo "<input id='Fecha_28' style='display:none' onclick='transferir_28()' value='28-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_28' onclick='ocultarCalend()'>28</label>";
								}
								else{
									echo "<label class='calendario_2'>28</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["jueves_mañana"]) || !empty($Pacient["jueves_tarde"])){
									echo "<input id='Fecha_29' style='display:none' onclick='transferir_29()' value='29-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_29' onclick='ocultarCalend()'>29</label>";
								}
								else{
									echo "<label class='calendario_2'>29</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["viernes_mañana"]) || !empty($Pacient["viernes_tarde"])){
									echo "<input id='Fecha_30' style='display:none' onclick='transferir_30()' value='30-11-2018'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_30' onclick='ocultarCalend()'>30</label>";
								}
								else{
									echo "<label class='calendario_2'>30</label>";
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

    function transferir_1(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_1").value;
    }
    function transferir_2(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_2").value;
    }
    function transferir_3(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_3").value;
    }
    function transferir_4(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_4").value;
    }
    function transferir_5(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_5").value;
    }
    function transferir_6(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_6").value;
    }
    function transferir_7(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_7").value;
    }
    function transferir_8(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_8").value;
    }
    function transferir_9(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_9").value;
    }
    function transferir_10(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_10").value;
    }
    function transferir_11(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_11").value;
    }
    function transferir_12(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_12").value;
    }
    function transferir_13(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_13").value;
    }
    function transferir_14(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_14").value;
    }
    function transferir_15(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_15").value;
    }
    function transferir_16(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_16").value;
    }
    function transferir_17(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_17").value;
    }
    function transferir_18(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_18").value;
    }
    function transferir_19(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_19").value;
    }
    function transferir_20(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_20").value;
    }
    function transferir_21(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_21").value;
    }
    function transferir_22(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_22").value;
    }
    function transferir_23(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_23").value;
    }
    function transferir_24(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_24").value;
    }
    function transferir_25(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_25").value;
    }
    function transferir_26(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_26").value;
    }
    function transferir_27(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_27").value;
    }
    function transferir_28(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_28").value;
    }
    function transferir_29(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_29").value;
    }
    function transferir_30(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_30").value;
    }
    function transferir_31(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_31").value;
    }
</script>