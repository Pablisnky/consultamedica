<?php 
	include("../conexion/Conexion_BD.php");
    
    //Se reciben todos los datos desde Ajax_Cancelar.js
	$Cedula=$_GET["val_20"];
    $Especialista=$_GET["val_21"];

	//echo $Cedula . "<br>";
    //echo $Especialista . "<br>";
?>

<div class="sesion_1" style="width: 100%; background-color: ; margin-left: -1%;">
    <table class="tabla_1" border="1px">
        <tr>
            <th>FECHA</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>CEDULA</th>
            <th>EDAD</th>
            <th>TELEFONO</th>
            <th>TURNO</th>
        </tr>
    
        <?php
        //Si no se selecciona nada que buscar, sale un mensaje.
        if(isset ($Cedula)){//Si esta declarada (si existe)
            //se ejecuta la consulta segun el criterio

            $Consulta= " SELECT * FROM citas WHERE cedula_Identidad= '$Cedula' AND ID_Doctor ='$Especialista' AND fecha >=curdate()"; 
            $Resulset=mysqli_query($conexion,$Consulta);
            $Contador= mysqli_num_rows($Resulset);
            if($Contador== 0){
                echo "<h3>No se encontró paciente registrado<h3>";
                echo "<a class='buttonCuatro' style='margin:auto' href='javascript:history.go(0)'>Limpiar</a>";
            }
        else{
            while($TablaVirtual= mysqli_fetch_array($Resulset)){
                $CedulaRegistrados= $TablaVirtual["cedula_Identidad"];

                //se cambia el formato de la fecha, se recibe en formato php

                $fechaFormatoSQL= $TablaVirtual["fecha"];
                $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoSQL));//se cambia el formato de la fecha a d-m-Y
                //echo "Fecha cita: " . $fechaFormatoSQL;
                ?>
                <tr>    
                    <td class="a2"><?php echo '<a class="a2a"  href="HistoriasClinicas.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $fechaFormatoPHP;?></a></td>
                    <td class="a2"><?php echo '<a class="a2a"  href="HistoriasClinicas.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["nombre"];?></a></td>
                    <td class="a2"><?php echo '<a class="a2a"  href="HistoriasClinicas.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["apellido"] ; ?></a></td>
                    <td class="a6"><?php echo '<a class="a2a" href="HistoriasClinicas.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["cedula_Identidad"] ;?></a></td>
                    <td class="a5"><?php echo '<a class="a2a" href="HistoriasClinicas.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["edad"] ;?></a></td>
                    <td class="a7"><?php echo '<a class="a2a" href="HistoriasClinicas.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["telefono"]  . "<br>" ;?></a></td>
                    <td class="a6"><?php echo '<a class="a2a"  href="HistoriasClinicas.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["turno"] ;?></a></td> 
                </tr> <?php 
            } ?> 
    </table> 
    <br><?php
        }  
    }

            echo "<a class='buttonCuatro' style='margin:auto' href='javascript:history.go(0)'>Limpiar</a>";
            ?>
            <br>
</div>
