<?php
	include("../conexion/Conexion_BD.php");

    $Nombre= $_GET["nombre"];//se recibe lo que se escribio en el input de RegistroPacientes_Basico.php, InicioSesion_Basico.php por medio ajaxBuscador.js
    $Especialista=$_GET["val_21"];//se recibe el ID_Doctor desde InicioSesion_Basico por medio de ajaxBUscador.js
    //echo "Buscando por las letras: " . $Nombre . "<br>";
    //echo "ID_Doctor: " . $Especialista . "<br>";


    if(!empty($Nombre)){ 
    	$Persona= mysqli_real_escape_string($conexion,$Nombre);
    	$Consulta=  "SELECT * FROM citas WHERE nombre LIKE '$Persona%' AND ID_Doctor ='$Especialista' AND fecha >=curdate() ORDER BY nombre ASC";
    	$Recordset= mysqli_query($conexion,$Consulta);
        if(mysqli_num_rows($Recordset) != 0){
    	    while($paciente= mysqli_fetch_array($Recordset)){

            //se cambia el formato de la fecha a mostrar en pantalla
            $fechaFormatoMySQL = $paciente["fecha"];//se obtiene la fecha en formato MySQL
            $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha a d-m-Y
            ?>

                    <table class="tabla_1">
                        <tr>
                            <td class="textoCelda_3B"><?php echo $paciente["nombre"];?></td>                         
                            <td class="textoCelda_3"><?php echo $paciente["apellido"];?></td>
                            <td class="textoCelda_3"><?php echo $paciente["cedula_Identidad"];?></td>
                            <td class="textoCelda_3A"><?php echo $fechaFormatoPHP;?></td>           
                        </tr>
                    </table> <?php 
            } 
            echo "<a class='buttonCuatro' style='margin:3% auto' href='InicioSesion.php'>Limpiar</a>";
        }
        else{
            echo "<h3>No se encontraron pacientes</h3>";
            echo "<a class='buttonCuatro' style='margin:auto' href='javascript:history.go(0)'>Limpiar</a>";
        }
    } ?> 
