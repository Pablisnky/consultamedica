<?php 
	include("../conexion/Conexion_BD.php");
    
    //Se reciben todos los datos desde Ajax_Cancelar.js
	$Diagnostico=$_GET["val_31"];
    $Estado=$_GET["val_32"];
    $Municipio=$_GET["val_33"];
    $Parroquia=$_GET["val_34"];
    $Edad=$_GET["val_35"];
    $Sexo=$_GET["val_36"];
    $Mes=$_GET["val_37"];
    $Especialista=$_GET["val_38"];
    $where= "";

	//echo $Cedula . "<br>";
	//echo $Diagnostico . "<br>";
    //echo $Estado . "<br>";
    //echo $Municipio . "<br>";
    //echo $Parroquia . "<br>";
    //echo $Edad . "<br>";
    //echo $Sexo . "<br>";
    //echo $Mes . "<br>";AND empty($Masculino) AND empty($Femenino)
    //echo $Especialista . "<br>";

        
    //Si no se selecciona nada que buscar, sale un mensaje.
    if(empty ($Cedula) && empty ($Diagnostico) && empty ($Estado) && empty ($Municipio) && empty ($Parroquia) && empty ($Edad) && empty ($Sexo) && empty ($Mes)){//Si estan vacios
        echo "<h3>No se aplicaron filtros<h3>";
    }
    else{
        if(!empty($Estado) && empty ($Cedula) && empty ($Diagnostico) && empty ($Municipio) && empty ($Parroquia) && empty ($Edad) && empty ($Sexo) && empty ($Mes) ){//busqueda por estado
            $where="WHERE estado_pacient= '$Estado' AND ID_Doctor ='$Especialista'";  
        }
        else if(!empty($Cedula) && empty ($Sexo) && empty ($Diagnostico) && empty ($Municipio) && empty ($Parroquia) && empty ($Edad) && empty ($Estado) && empty ($Mes)){//busqueda por cedula
            $where="WHERE cedula_pacient= '$Cedula' AND ID_Doctor ='$Especialista'";  
        }
        else if(!empty($Sexo) && empty ($Cedula) && empty ($Diagnostico) && empty ($Municipio) && empty ($Parroquia) && empty ($Edad) && empty ($Estado) && empty ($Mes)){//busqueda por sexo
            $where="WHERE sexo_pacient= '$Sexo' AND ID_Doctor ='$Especialista'";  
        }
        else if(!empty($Estado) && !empty ($Municipio) && empty ($Diagnostico) && empty ($Sexo) && empty ($Parroquia) && empty ($Edad) && empty ($Cedula) && empty ($Mes)){//busqueda por estado y municipio
            $where="WHERE estado_pacient= '$Estado' AND municipio_pacient= '$Municipio' AND ID_Doctor ='$Especialista'";  
        }
        else if(!empty($Estado) && !empty ($Municipio) && !empty ($Parroquia) && empty ($Diagnostico) && empty ($Sexo)  && empty ($Edad) && empty ($Cedula) && empty ($Mes)){//busqueda por estado, municipio y parroquia
            $where="WHERE estado_pacient= '$Estado' AND municipio_pacient= '$Municipio' AND parroquia_pacient= '$Parroquia' AND ID_Doctor ='$Especialista'";  
        }
        else if(!empty($Estado) && !empty($Sexo) && empty ($Cedula) && empty ($Diagnostico) && empty ($Municipio) && empty ($Parroquia) && empty ($Edad)  && empty ($Mes)){//busqueda por estado y sexo
             $where="WHERE estado_pacient= '$Estado' AND sexo_pacient ='$Sexo' AND ID_Doctor ='$Especialista'";  
            }
        else if(!empty($Estado) && !empty($Sexo) && !empty ($Municipio) && empty ($Cedula) && empty ($Diagnostico)  && empty ($Parroquia) && empty ($Edad)  && empty ($Mes)){//busqueda por estado, sexo y municipio
             $where="WHERE estado_pacient= '$Estado' AND sexo_pacient ='$Sexo' AND municipio_pacient ='$Municipio' AND ID_Doctor ='$Especialista'";  
            }
        else if(!empty($Estado) && !empty($Sexo) && !empty($Municipio) && !empty ($Parroquia) && empty ($Cedula) && empty ($Diagnostico)  && empty ($Edad)  && empty ($Mes)){//busqueda por estado, municipio, parroquia y sexo 
            $where="WHERE estado_pacient= '$Estado' AND sexo_pacient ='$Sexo' AND municipio_pacient ='$Municipio' AND parroquia_pacient ='$Parroquia' AND ID_Doctor ='$Especialista'";  
        }
        else{
            exit("<h3>No se encontraron criterios de busqueda</h3>");

        }

        //se ejecuta la consulta segun el criterio
        $Consulta= " SELECT * FROM pacientes_registrados $where ";
        $Resulset=mysqli_query($conexion,$Consulta);
        $Contador= mysqli_num_rows($Resulset);

        //se consulta el porcentaje de pacientes por sexo del total de pacientes de su consulta
        $Consulta_1= "SELECT ROUND(((select count(*) from pacientes_registrados $where) * 100) / (select count(*) from pacientes_registrados WHERE ID_Doctor= '$Especialista'),1)";  //round(consulta,x) especifica el numero de decimales
        $Resulset_1=mysqli_query($conexion,$Consulta_1);
        $Contador_1= mysqli_fetch_array($Resulset_1);
        $Porcentaje=$Contador_1[0];

        if($Contador== 0){
            exit ("<h3>No se encontró paciente registrado<h3>");
        }
        else{
            echo "Pacientes encontrados " .  $Contador;
            echo "<br>";
            echo "Representan el " . $Porcentaje . "% de su consultorio";
            echo "<hr>";
            while($paciente= mysqli_fetch_array($Resulset)){
                ?>
                <table border-collapse: collapse>
                    <tr>

                    </tr>
                    <tr>
                        
                        <td ><?php echo $paciente["nombre_pacient"];?></td>
                        <td ><?php echo $paciente["apellido_pacient"];?></td>
                        <td><?php echo $paciente["cedula_pacient"];?></td>
                        <td width="50px"></td>
                        <td><?php echo '<a class="paciente" href="HistoriasClinicas.php?cedula_pacient='.$paciente['cedula_pacient'].'">Ver</a>';?> 
                        </td>
                        <td><?php echo '<a class="paciente" href="EliminarPaciente.php?ID_Pacient='.$paciente['ID_PR'].'" onclick="return Confirmacion()">Eliminar</a>';?></td>
                        <td><?php echo '<a class="paciente" href="actualizarDatos.php?cedulaPaciente='.$paciente['cedula_pacient'].'">Actualizar</a>';?> </td>
                    </tr>
                    <tr>
                        <td><?php echo "<br>";?></td>
                    </tr>
                </table>
                <?php 
            } 
        }  
    }
    
