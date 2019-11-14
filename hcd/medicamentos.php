   	<head>
  		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
  	</head>     
  	  
	<header class="fixed_1" >
                <div style="width: 100%; float: left; border-right-color: white; border-right-style: solid;border-right-width: 1px; box-sizing: border-box;">
                    <h1 style="cursor: default; font-size: 5vw; height: 60%; padding: 1% 0%; box-sizing: border-box; text-align: center; padding-left: 2%">ConsultaMedica.com.co</h1>
                </div>
    </header>

<h1 style="cursor: default;">ConsultaMedica.com.co</h1>

<br><br>
<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<script type="text/javascript">
     function valores_1(f, cual){//Esta funcion se encarga de almacenar en un array todos los medicamentos seleccionados es llamada al precionar el boton cargar de este archivo
        todos= new Array(); 
        for(var i = 0,   total = f[cual].length;   i < total; i++)
        if (f[cual][i].checked) todos[todos.length] = f[cual][i].value;
            
            //return todos.join('-');
            //document.write(todos.join("-"));
            window.opener.document.getElementById('RecibeTratamiento_1').innerHTML = todos.join("\n" ); 
        
           this.window.close();
    }


     function valores_2(f, cual){//Esta funcion se encarga de almacenar en un array todos los medicamentos seleccionados es llamada al precionar el boton cargar de este archivo
        todos= new Array(); 
        for(var i = 0,   total = f[cual].length;   i < total; i++)
        if (f[cual][i].checked) todos[todos.length] = f[cual][i].value;
            
            //return todos.join('-');
            //document.write(todos.join("-"));
            window.opener.document.getElementById('RecibeTratamiento_2').value = todos.join("\n" ); 
        
           this.window.close();
    }

    function cerrar(){//esta funcion es llamada desde este archivo
        window.close();
    }

</script>

<div id="Medicina_01">
 <form name="">    <?php
        include("../conexion/Conexion_BD.php");//conexion a BD

//  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
//  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

        if(isset($_GET["ClasificacionFuncion_1"])){
            $FuncionMedicamento= $_GET["ClasificacionFuncion_1"];//se recibe desde diagnostico_Basico_2.php
            //echo "ID_Funcionamiento= " . $FuncionMedicamento . "<br>";

            $Consulta_1=  "SELECT * FROM medicamentosfuncion WHERE funcion = '$FuncionMedicamento' ";
            $Recordset = mysqli_query($conexion, $Consulta_1);
            $Categoria = mysqli_fetch_array($Recordset);
            ?>

            <h3>Farmacos <?php echo $Categoria["funcion"]?></h3>
            <?php
            //Se realiza una consulta para encontrar todos los medicamentos segun la función seleccionada
            $Consulta=  "SELECT Nombre_Medicamento FROM medicamentos INNER JOIN medicamentosfuncion ON medicamentos.ID_Funcion=medicamentosfuncion.ID_Funcion WHERE funcion = '$FuncionMedicamento' ORDER BY Nombre_Medicamento ASC ";
            $Recordset = mysqli_query($conexion, $Consulta);
            if(mysqli_num_rows($Recordset) != 0){
                while($Medicamentos = mysqli_fetch_array($Recordset)){
                ?>
                                                                                   
          
                <div style="background-color: ; width: 50%; float: right;box-sizing: border-box; padding-left: 20%;">
            
                    <input type="checkbox" class="medicina_01" name="medicamento[]" id="<?php echo $Medicamentos["Nombre_Medicamento"];?>" value="<?php echo $Medicamentos['Nombre_Medicamento'];?>">
                    <label for="<?php echo $Medicamentos["Nombre_Medicamento"];?>"><?php echo $Medicamentos["Nombre_Medicamento"];?></label>
                </div>
                
                <?php 
                } 
                ?> 
                 <button style="margin: auto; display: block;" onclick="valores_1(this.form, 'medicamento[]')">Cargar</button>
                 <?php
            } 
            else{
                echo "<p class='Inicio_1' style='margin-bottom:10%;'>No se encontraron registros</p>";
                ?>
                <button style="margin: auto; display: block;" onclick="cerrar()">Volver</button>

                <?php
            } 
        }                  
//  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
//  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

        else if(isset($_GET["ClasificacionFuncion_2"])){
            $FuncionMedicamento= $_GET["ClasificacionFuncion_2"];//se recibe desde diagnostico_Basico_2.php
            //echo "Funcionamiento= " . $FuncionMedicamento . "<br>";

            $Consulta_1=  "SELECT * FROM medicamentosfuncion WHERE funcion = '$FuncionMedicamento' ";
            $Recordset = mysqli_query($conexion, $Consulta_1);
            $Categoria = mysqli_fetch_array($Recordset);
            ?>

            <h3>Farmacos <?php echo $Categoria["funcion"]?></h3>
            <?php
            //Se realiza una consulta para encontrar todos los medicamentos segun la función seleccionada
            $Consulta=  "SELECT Nombre_Medicamento FROM medicamentos INNER JOIN medicamentosfuncion ON medicamentos.ID_Funcion=medicamentosfuncion.ID_Funcion WHERE funcion = '$FuncionMedicamento' ";
            $Recordset = mysqli_query($conexion, $Consulta);
            if(mysqli_num_rows($Recordset) != 0){
                while($Medicamentos = mysqli_fetch_array($Recordset)){
                ?>
                                                                                   
          
                <div style="background-color: ; width: 50%; float: right;box-sizing: border-box; padding-left: 20%;">
            
                    <input type="checkbox" class="medicina_01" name="medicamento[]" id="<?php echo $Medicamentos["Nombre_Medicamento"];?>" value="<?php echo $Medicamentos['Nombre_Medicamento'];?>">
                    <label for="<?php echo $Medicamentos["Nombre_Medicamento"];?>"><?php echo $Medicamentos["Nombre_Medicamento"];?></label>
                </div>
                
                <?php 
                } 
                ?> 
                 <button style="margin: auto; display: block;" onclick="valores_2(this.form, 'medicamento[]')">Cargar</button>
                 <?php
            } 
            else{
                echo "<p class='Inicio_1' style='margin-bottom:10%;'>No se encontraron registros</p>";
                ?>
                <button style="margin: auto; display: block;" onclick="cerrar()">Volver</button>

                <?php
            }
        }                 
            ?>
</form>
</div>
