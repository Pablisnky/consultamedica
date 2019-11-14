<?php 
	include("../conexion/Conexion_BD.php");
    
    //Se reciben todos los datos desde Ajax_Cancelar.js
	$Quirurgico= $_GET["val_1"];
	//echo $Quirurgico . "<br>";
        
    //Si no se selecciona nada que buscar, sale un mensaje.
    if(isset($Quirurgico) AND $Quirurgico != "sinSeleccion"){//Si esta declarada (si existe)
        //se ejecuta la consulta segun el criterio
        $Consulta= " SELECT * FROM quirurgico WHERE categoria= '$Quirurgico'"; 
        $Resulset=mysqli_query($conexion,$Consulta);
        $Contador= mysqli_num_rows($Resulset);
        if($Contador== 0){
            echo "<h3>No se encontraron insumos en esta categoría<h3>";
            exit ("<a class='buttonCuatro' style='margin:auto' href='javascript:history.go(0)'>Limpiar</a>");
        }
        else{
            while($Quirurgico= mysqli_fetch_array($Resulset)){
                ?>
                <table border-collapse: collapse>
                    <tr>
                        <td ><?php echo $Quirurgico[""];?></td>
                        <td ><?php echo $Quirurgico["descripcion"];?></td>
                        <td><?php echo $Quirurgico["especificaciones"];?></td>
                    </tr>
                    <tr>
                        <td><?php echo "<br>";?></td>
                    </tr>
                </table>
                <?php 
            } 
        }
    }
    else{
        echo "<h3>Debe seleccionar una categoría</h3>";
        echo "<a class='buttonCuatro' style='margin:auto' href='javascript:history.go(0)'>Limpiar</a>";
    }  
    