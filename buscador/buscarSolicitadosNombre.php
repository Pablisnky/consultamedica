<style type="text/css">
    @media screen and (max-width: 325px){
        table, thead, tbody, th, td, tr{
            display: block;        
        }
        thead tr{
            position: absolute;
            top: -9999px;
            left: -9999px;
        }
        tr{
            margin: 0 0 1rem 0;
        }      
        tr:nth-child(odd){
            /*background: #bcbeda;*/
        }    
        td{
            background-color: ;
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
            width: 50%;
            font-size: 14px;
        }
        td:before{
            background-color: ;
            font-size: 14px;
            position: absolute;
            top: 0;
            left: 6px;
            padding-right: 10px;
            white-space: nowrap;
        }
        td:nth-of-type(1):before {content: "---";background-color:#bcbeda; width: 127%;}
        td:nth-of-type(2):before { content: "Medicamento"; }
        td:nth-of-type(3):before { content: "Principio activo"; }
        td:nth-of-type(4):before { content: "Presentación"; }
        td:nth-of-type(5):before { content: "Especificaciones"; }
        td:nth-of-type(6):before { content: "Fecha publicación"; }
        td:nth-of-type(7):before { content: ""; }
        td:nth-of-type(8):before { content: "Solicitado por:"; }
        .buscar_1:hover{
            background-color: white;
        }
        .buscar_2{
            line-height: 150%
        }
        .textoCelda_4A, .textoCelda_4B{
        background-color:;
        font-size: 14px ;
        width: 50% !important; 
        }
        .textoCelda_4C{ 
            background-color: ;
            text-align: left;
        }
    }

    @media (min-width: 326px) and (max-width: 800px){/*aplicaría en cualquier medio con dimensiones entre 800 y 1300 píxeles.*/
        table, thead, tbody, th, td, tr{
            display: block;        
            /*background: #bcbeda;*/
        }
        thead tr{
            background-color: ;
            position: absolute;
            top: -9999px;
            left: -9999px;
        }
        tr{
            margin: 0 0 1rem 0;
        }      
        tr:nth-child(odd){
            /*background: #bcbeda;*/
        }    
        td{
            background-color: ;
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
            width: 50%;
            font-size: 17px;
        }
        td:before{
            background-color: ;
            font-size: 17px;
            position: absolute;
            top: 0;/**/
            left: 6px;
            padding-right: 10px;
            white-space: nowrap;
        }
        td:nth-of-type(1):before {content: "---";background-color:#BCBEDA; width: 123%;}
        td:nth-of-type(2):before { content: "Medicamento"; }
        td:nth-of-type(3):before { content: "Principio activo"; }
        td:nth-of-type(4):before { content: "Presentación"; }
        td:nth-of-type(5):before { content: "Especificaciones"; }
        td:nth-of-type(6):before { content: "Fecha publicación"; }
        td:nth-of-type(7):before { content: ""; }
        td:nth-of-type(8):before { content: "Solicitado por:"; }
        .buscar_1:hover{
            background-color: white;
        }
        .buscar_2{
            line-height: 150%
        }
        .textoCelda_4A, .textoCelda_4B, .textoCelda_4, .textoCelda_4C{
            background-color:;
            font-size: 17px ;
            width: 50% !important; 
        }
        .textoCelda_4C{
            background-color: ;
            text-align: left;
        }
    }
</style>
<?php
    session_start();
	include("../conexion/Conexion_BD.php");

    $Nombre= $_GET["nombre"];//se recibe lo que se escribio en el input desde ajaxBuscador.js
    $ID_Paciente=$_GET["val_21"];//se recibe el ID_Paciente desde ajaxBUscador.js
    //echo "Buscando por las letras: " . $Nombre . "<br>";
    //echo "ID_Doctor: " . $Especialista . "<br>";

    if(!empty($Nombre)){ 
    	$Persona= mysqli_real_escape_string($conexion,$Nombre);
    	$Consulta=  "SELECT * FROM  medicamentos_solicitados INNER JOIN solicitantes ON medicamentos_solicitados.aleatorioSolicitante=solicitantes.aleatorio_Solicitante WHERE nombre LIKE '$Persona%'  ORDER BY nombre ASC";
    	$Recordset= mysqli_query($conexion,$Consulta);
        if(mysqli_num_rows($Recordset) != 0){

            ?>                    
                    <table style="border-collapse: collapse; width: 100%;">
                        <thead>
                            <tr>
                                <th class="buscar_3"></th>
                                <th>Medicamento</th>
                                <th>Principio activo</th>
                                <th>presentación</th>
                                <th>Especificaciones</th>                              
                                <th style="text-align: center;">Fecha publicación</th>
                                <th style="background-color: #040652; width: 0px; padding: 1px;"></th>
                                <th colspan="4">Solicitado por:</th>
                            </tr>
                        </thead>
                    <?php
            while($medicamento= mysqli_fetch_array($Recordset)){
                //se cambia el formato de la fecha a mostrar en pantalla
               $fechaFormatoMySQL = $medicamento["fecha_solicitud"];//se obtiene la fecha en formato MySQL
               $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha a d-m-Y
            ?>
                        <tbody class="buscar_2">
                            <tr class="buscar_1">
                                <td class="buscar_3">...</td>
                                <td class="textoCelda_4"><?php echo $medicamento["nombre"];?></td>                         
                                <td class="textoCelda_4"><?php echo $medicamento["principioActivo"];?></td>  
                                <td class="textoCelda_4"><?php echo $medicamento["presentacion"];?></td>
                                <td class="textoCelda_4C"><?php echo $medicamento["especificaciones"];?></td>            
                                <td class="textoCelda_4C"><?php echo $fechaFormatoPHP;?></td>
                                <td style="background-color:; width: 0px; padding: 1px;"></td>

                                <td class="textoCelda_4A"><?php echo $medicamento["nombreSolicitante"] . " " . $medicamento["apellido"];?></td> 
                                <td class="textoCelda_4B"><?php echo $medicamento["estado"];?></td> 
                                <td class="textoCelda_4B" style="width: 15%;"><?php echo $medicamento["telefono"];?></td>

                            </tr>
                        </tbody> 
                        <?php } ?>
                    </table> <?php 

             
            echo "<a class='buttonCuatro' style='margin:3% auto' href='javascript:history.go(0)'>Limpiar</a>";
        }
        else{
            echo "<h3>Sin resultados.</h3>";
            echo "<a class='buttonCuatro' style='margin:auto' href='javascript:history.go(0)'>Limpiar</a>";
        }
    } ?> 
        <hr id="linea" style=" background-color: #040652; margin-bottom: 5%; height: 1px; margin-top: 3%;">
