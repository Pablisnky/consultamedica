<!--Este archivo rellena la tabla donde aparecen las fechas donde el paciente tiene registro medico-->
        <div class="n126" style="background-color:; ">
            <div id="Enero" class="n44" style="float: left; margin: 1% 1%; background-color:; margin-bottom: 5%; text-align: center;"> 
                <P><b>Enero</b></P>  
                <?php
                    
                    $Consulta_3="SELECT * FROM historico_visitas WHERE cedula_paciente='$Paciente' AND fecha_visita BETWEEN '2018-01-01' AND '2018-01-31' ";
                    $Recordset_2=mysqli_query($conexion,$Consulta_3);      
                    while($MiPaciente_1= mysqli_fetch_array($Recordset_2)){
                       //echo $MiPaciente_1["fecha_visita"]; 

                        //se cambia el formato de la fecha
                        $fechaFormatoMySQL = $MiPaciente_1["fecha_visita"];//se obtiene la fecha en formato MySQL
                        $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y
                        //echo $fechaFormatoPHP;

                        echo '<a href="muestraHistoria.php?fecha='.$MiPaciente_1["fecha_visita"].'&cedula='.$MiPaciente_1["cedula_paciente"].'">'.$fechaFormatoPHP.'</a>' . "<br>"; //al parecer no hace falta enviar la cedula porque ya se tiene en aquel archivo por via $_SESSION
                    }
                    if(mysqli_num_rows($Recordset_2)==0){
                        echo "El paciente no tiene registros";
                    }
                ?> 
            </div>

            
            <div id="Febrero" class="n44" style="float: left; margin: 1% 1%; background-color:; text-align: center; "> 
                <P><b>Febrero</b></P>  
                <?php
                                
                    $Consulta_4="SELECT * FROM historico_visitas WHERE cedula_paciente='$Paciente' AND fecha_visita BETWEEN '2018-02-01' AND '2018-02-28' ";
                    $Recordset_4=mysqli_query($conexion,$Consulta_4);      
                    while($MiPaciente_2= mysqli_fetch_array($Recordset_4)){
                       //echo $MiPaciente["fecha_visita"]; 

                        $fechaFormatoMySQL = $MiPaciente_2["fecha_visita"];//se obtiene la fecha en formato MySQL
                        $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y
                        //echo $fechaFormatoPHP;

                        echo '<a href="muestraHistoria.php?fecha='.$MiPaciente_2["fecha_visita"].'&cedula='.$MiPaciente_2["cedula_paciente"].'">'.$fechaFormatoPHP.'</a>' . "<br>"; 
                    }
                    if(mysqli_num_rows($Recordset_4)==0){
                        echo "El paciente no tiene registros";
                    }
                ?> 
            </div>
            <div id="Marzo" class="n44" style="float: left; margin: 1% 1%; background-color: ; text-align: center;"> 
                <P><b>Marzo</b></P>  
            </div>
            <div id="Abril" class="n44" style="float: left; margin: 1% 1%; background-color: ; text-align: center; "> 
                <P><b>Abril</b></P> 
            </div>
            <div id="Mayo" class="n44" style="float: left; margin: 1% 1%; background-color: ; text-align: center; "> 
                <P><b>Mayo</b></P>  
            </div>
            <div id="Junio" class="n44" style="float: left; margin: 1% 1%; background-color: ; text-align: center; "> 
                <P><b>Junio</b></P> 
            </div>
        </div>


        <div class="n126" style="background-color: ; ">
            <div id="Julio" class="n44" style="float: left; margin: 1% 1%; background-color: ; text-align: center; "> 
                <P><b>Julio</b></P> 
            </div>
            <div id="Agosto" class="n44" style="float: left; margin: 1% 1%; background-color: ; text-align: center; "> 
                <P><b>Agosto</b></P>  
            </div>
            <div id="Septiembre" class="n44" style="float: left; margin: 1% 1%; background-color: ; text-align: center; "> 
                <P><b>Setiembre</b></P>
            </div>
            <div id="Octubre" class="n44" style="float: left; margin: 1% 1%; background-color: ; text-align: center; "> 
                <P><b>Octubre</b></P>  
            </div>
            <div id="Noviembre" class="n44" style="float: left; margin: 1% 1%; background-color: ; text-align: center; "> 
                <P><b>Noviembre</b></P>  
            </div>
            <div id="Diciembre" class="n44" style="float: left; margin: 1% 1%; background-color:; text-align: center; "> 
                <P><b>Diciembre</b></P>  
            </div>       
        </div>    