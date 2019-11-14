
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
						<td colspan="7" class="calendario_4">FEBRERO</td>
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
						<td></td><!-- Jueves-->
						<td><!-- Viernes -->
							<?php
								if(!empty($Pacient["viernes_mañana"]) || !empty($Pacient["viernes_tarde"])){
									echo "<input id='Fecha_1fe' style='display:none' onclick='transferir_1()' value='01-02-2019'/>";
									echo "<label style='cursor:pointer;' for='Fecha_1fe' onclick='ocultarCalend()'>01</label>";
								}
								else{
									echo "<label class='calendario_2'>01</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["sabado_mañana"]) || !empty($Pacient["sabado_tarde"])){
									echo "<input id='Fecha_2fe' style='display:none' onclick='transferir_2()' value='02-02-2019'/>";
									echo "<label style='cursor:pointer;' for='Fecha_2fe' onclick='ocultarCalend()'>02</label>";
								}
								else{
									echo "<label class='calendario_2'>02</label>";
								}
							;?>
						</td>
					</tr>
					<!-- ///////////////////////////////////////////////////////////////////////////// -->
					<tr>
						<td>
							<?php echo "<label class='calendario_2'>03</label>";?>
						</td> 
						<td>
							<?php
								if(!empty($Pacient["lunes_mañana"]) || !empty($Pacient["lunes_tarde"])){
									echo "<input id='Fecha_4fe' style='display:none' onclick='transferir_4()' value='04-02-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_4fe' onclick='ocultarCalend()'>04</label>";
								}
								else{
									echo "<label class='calendario_2'>04</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["martes_mañana"]) || !empty($Pacient["martes_tarde"])){
									echo "<input id='Fecha_5fe' style='display:none' onclick='transferir_5()' value='05-02-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_5fe' onclick='ocultarCalend()'>05</label>";
								}
								else{
									echo "<label class='calendario_2'>05</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["miercoles_mañana"]) || !empty($Pacient["miercoles_tarde"])){
									echo "<input id='Fecha_6fe' style='display:none' onclick='transferir_6()' value='06-02-2016'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_6fe' onclick='ocultarCalend()'>06</label>";
								}
								else{
									echo "<label class='calendario_2'>06</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["jueves_mañana"]) || !empty($Pacient["jueves_tarde"])){
									echo "<input id='Fecha_7fe' style='display:none' onclick='transferir_7()' value='07-02-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_7fe' onclick='ocultarCalend()'>07</label>";
								}
								else{
									echo "<label class='calendario_2'>07</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["viernes_mañana"]) || !empty($Pacient["viernes_tarde"])){
									echo "<input id='Fecha_8fe' style='display:none' onclick='transferir_8()' value='08-02-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_8fe' onclick='ocultarCalend()'>08</label>";
								}
								else{
									echo "<label class='calendario_2'>08</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["sabado_mañana"]) || !empty($Pacient["sabado_tarde"])){
									echo "<input id='Fecha_9fe' style='display:none' onclick='transferir_9()' value='09-02-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_9fe' onclick='ocultarCalend()'>09</label>";
								}
								else{
									echo "<label class='calendario_2'>09</label>";
								}
							;?>
						</td>
					</tr>
					<!-- ///////////////////////////////////////////////////////////////////////////// -->
					<tr>
						<td>
							<?php echo "<label class='calendario_2'>10</label>";?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["lunes_mañana"]) || !empty($Pacient["lunes_tarde"])){
									echo "<input id='Fecha_11fe' style='display:none' onclick='transferir_11()' value='11-02-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_11fe' onclick='ocultarCalend()'>11</label>";
								}
								else{
									echo "<label class='calendario_2'>11</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["martes_mañana"]) || !empty($Pacient["martes_tarde"])){
									echo "<input id='Fecha_12fe' style='display:none' onclick='transferir_12()' value='12-02-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_12fe' onclick='ocultarCalend()'>12</label>";
								}
								else{
									echo "<label class='calendario_2'>12</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["miercoles_mañana"]) || !empty($Pacient["miercoles_tarde"])){
									echo "<input id='Fecha_13fe' style='display:none' onclick='transferir_13()' value='13-02-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_13fe' onclick='ocultarCalend()'>13</label>";
								}
								else{
									echo "<label class='calendario_2'>13</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["jueves_mañana"]) || !empty($Pacient["jueves_tarde"])){
									echo "<input id='Fecha_14fe' style='display:none' onclick='transferir_14()' value='14-02-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_14fe' onclick='ocultarCalend()'>14</label>";
								}
								else{
									echo "<label class='calendario_2'>14</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["viernes_mañana"]) || !empty($Pacient["viernes_tarde"])){
									echo "<input id='Fecha_15fe' style='display:none' onclick='transferir_15()' value='15-02-2015'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_15fe' onclick='ocultarCalend()'>15</label>";
								}
								else{
									echo "<label class='calendario_2'>15</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["sabado_mañana"]) || !empty($Pacient["sabado_tarde"])){
									echo "<input id='Fecha_16fe' style='display:none' onclick='transferir_16()' value='16-02-1919'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_16fe' onclick='ocultarCalend()'>16</label>";
								}
								else{
									echo "<label class='calendario_2'>16</label>";
								}
							;?>
						</td>
					</tr>
					<!-- ///////////////////////////////////////////////////////////////////////////// -->
					<tr>
						<td>
							<?php echo "<label class='calendario_2'>17</label>";?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["lunes_mañana"]) || !empty($Pacient["lunes_tarde"])){
									echo "<input id='Fecha_18fe' style='display:none' onclick='transferir_18()' value='18-02-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_18fe' onclick='ocultarCalend()'>18</label>";
								}
								else{
									echo "<label class='calendario_2'>18</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["martes_mañana"]) || !empty($Pacient["martes_tarde"])){
									echo "<input id='Fecha_19fe' style='display:none' onclick='transferir_19()' value='19-02-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_19fe' onclick='ocultarCalend()'>19</label>";
								}
								else{
									echo "<label class='calendario_2'>19</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["miercoles_mañana"]) || !empty($Pacient["miercoles_tarde"])){
									echo "<input id='Fecha_20fe' style='display:none' onclick='transferir_20()' value='20-02-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_20fe' onclick='ocultarCalend()'>20</label>";
								}
								else{
									echo "<label class='calendario_2'>20</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["jueves_mañana"]) || !empty($Pacient["jueves_tarde"])){
									echo "<input id='Fecha_21fe' style='display:none' onclick='transferir_21()' value='21-02-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_21fe' onclick='ocultarCalend()'>21</label>";
								}
								else{
									echo "<label class='calendario_2'>21</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["viernes_mañana"]) || !empty($Pacient["viernes_tarde"])){
									echo "<input id='Fecha_22fe' style='display:none' onclick='transferir_22()' value='22-02-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_22fe' onclick='ocultarCalend()'>22</label>";
								}
								else{
									echo "<label class='calendario_2'>22</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["sabado_mañana"]) || !empty($Pacient["sabado_tarde"])){
									echo "<input id='Fecha_23fe' style='display:none' onclick='transferir_23()' value='23-02-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_23fe' onclick='ocultarCalend()'>23</label>";
								}
								else{
									echo "<label class='calendario_2'>23</label>";
								}
							;?>
						</td>
					</tr>
					<!-- ///////////////////////////////////////////////////////////////////////////// -->
					<tr>
						<td>
							<?php echo "<label class='calendario_2'>24</label>";?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["lunes_mañana"]) || !empty($Pacient["lunes_tarde"])){
									echo "<input id='Fecha_25fe' style='display:none' onclick='transferir_25()' value='25-02-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_25fe' onclick='ocultarCalend()'>25</label>";
								}
								else{
									echo "<label class='calendario_2'>25</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["martes_mañana"]) || !empty($Pacient["martes_tarde"])){
									echo "<input id='Fecha_26fe' style='display:none' onclick='transferir_26()' value='26-02-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_26fe' onclick='ocultarCalend()'>26</label>";
								}
								else{
									echo "<label class='calendario_2'>26</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["miercoles_mañana"]) || !empty($Pacient["miercoles_tarde"])){
									echo "<input id='Fecha_27fe' style='display:none' onclick='transferir_27()' value='27-02-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_27fe' onclick='ocultarCalend()'>27</label>";
								}
								else{
									echo "<label class='calendario_2'>27</label>";
								}
							;?>
						</td>
						<td>
							<?php
								if(!empty($Pacient["jueves_mañana"]) || !empty($Pacient["jueves_tarde"])){
									echo "<input id='Fecha_28fe' style='display:none' onclick='transferir_28()' value='28-02-2019'/>";
									echo "<label style='background-color:; cursor:pointer;'  for='Fecha_28fe' onclick='ocultarCalend()'>28</label>";
								}
								else{
									echo "<label class='calendario_2'>28</label>";
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


// Se coloca la fecha seleccionada como valor del input fecha
    function transferir_1(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_1fe").value;
    }
    function transferir_2(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_2fe").value;
    }
    function transferir_3(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_3fe").value;
    }
    function transferir_4(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_4fe").value;
    }
    function transferir_5(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_5fe").value;
    }
    function transferir_6(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_6fe").value;
    }
    function transferir_7(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_7fe").value;
    }
    function transferir_8(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_8fe").value;
    }
    function transferir_9(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_9fe").value;
    }
    function transferir_10(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_10fe").value;
    }
    function transferir_11(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_11fe").value;
    }
    function transferir_12(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_12fe").value;
    }
    function transferir_13(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_13fe").value;
    }
    function transferir_14(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_14fe").value;
    }
    function transferir_15(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_15fe").value;
    }
    function transferir_16(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_16fe").value;
    }
    function transferir_17(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_17fe").value;
    }
    function transferir_18(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_18fe").value;
    }
    function transferir_19(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_19fe").value;
    }
    function transferir_20(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_20fe").value;
    }
    function transferir_21(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_21fe").value;
    }
    function transferir_22(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_22fe").value;
    }
    function transferir_23(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_23fe").value;
    }
    function transferir_24(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_24fe").value;
    }
    function transferir_25(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_25fe").value;
    }
    function transferir_26(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_26fe").value;
    }
    function transferir_27(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_27fe").value;
    }
    function transferir_28(){
    	document.getElementById("Calendario").value = document.getElementById("Fecha_28fe").value;
    }
</script>