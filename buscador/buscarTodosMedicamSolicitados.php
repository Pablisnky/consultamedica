<!-- archivo llamado desde medicamentosSolicitar por medio de ajaxBuscador.js -->
<style type="text/css">
    @media screen and (max-width: 325px){
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
            font-size: 14px;
        }
        td:before{
            background-color: ;
            font-size: 14px;
            position: absolute;
            top: 0;/**/
            left: 6px;
            padding-right: 10px;
            white-space: nowrap;
        }
        td:nth-of-type(1):before {content: "---";background-color:#BCBEDA; width: 185%;}
        td:nth-of-type(2):before { content: "Medicamento"; }
        td:nth-of-type(3):before { content: "Principio activo"; }
        td:nth-of-type(4):before { content: "Presentación"; }
        td:nth-of-type(5):before { content: "Especificaciones"; }
        td:nth-of-type(6):before { content: "Fecha publicación"; }
        td:nth-of-type(7):before { content: "Solicitado por:"; }
        .buscar_1:hover{
            background-color: white;
        }
        .buscar_2{
            background-color: ;
            line-height: 150%
        }
        .textoCelda_4,.textoCelda_4A, .textoCelda_4B{
            background-color:;
            font-size: 14px ;
            width: 100% !important; 
        }
        .textoCelda_4C{
            background-color: ;
            text-align: left;
            width: 100% !important;
            font-size: 14px ;
        }
    }

    @media (min-width: 326px) and (max-width: 800px){/*aplicaría en cualquier medio con dimensiones entre 326 y 800 píxeles.*/
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
        td:nth-of-type(1):before {content: "---";background-color:#BCBEDA; width: 185%;}
        td:nth-of-type(2):before { content: "Medicamento"; }
        td:nth-of-type(3):before { content: "Principio activo"; }
        td:nth-of-type(4):before { content: "Presentación"; }
        td:nth-of-type(5):before { content: "Especificaciones"; }
        td:nth-of-type(6):before { content: "Fecha publicación"; }
        td:nth-of-type(7):before { content: "Solicitado por:"; }
        .buscar_1:hover{
            background-color: white;
        }
        .buscar_2{
            line-height: 150%
        }
        .textoCelda_4A, .textoCelda_4B, .textoCelda_4, .textoCelda_4C{
            background-color:;
            font-size: 17px ;
            width: 100% !important; 
        }
        .textoCelda_4C{
            background-color: ;
            text-align: left;
        }
    }
</style>
         

<?php
	include("../conexion/Conexion_BD.php");

    $MarcaParaAjax=$_GET["val_20"];//se recibe el Cedula desde por medio de ajaxBUscador.js
    //echo "MarcaParaAjax: " . $MarcaParaAjax . "<br>";
 
    $Consulta=  "SELECT * FROM medicamentos_solicitados";
	$Recordset= mysqli_query($conexion,$Consulta);
    if(mysqli_num_rows($Recordset) != 0){?>
        <table style="border-collapse: collapse; width: 100%;">
            <thead>
                <tr>
                    <th class="buscar_3"></th>
                    <th>Nombre comercial</th>
                    <th>Principio activo</th>
                    <th>Presentación</th>
                    <th>Especificaciones</th>                              
                    <th style="text-align: center;">Fecha publicación</th>
                    <th colspan="4" class="detalle_4">Solicitado por:</th>
                </tr>
            </thead>
                <?php
                while($medicamento= mysqli_fetch_array($Recordset)){
                    //se cambia el formato de la fecha a mostrar en pantalla
                    $fechaFormatoMySQL = $medicamento["fecha_solicitud"];//se obtiene la fecha en formato MySQL
                    $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha a d-m-Y
                    // echo "Fecha de solicitud: " . $fechaFormatoPHP;
                ?>
                <tbody class="buscar_2">
                    <tr class="buscar_1">
                        <td class="buscar_3">...</td>
                        <td class="textoCelda_4"><?php echo $medicamento["nombre_MedSol"];?></td>                         
                        <td class="textoCelda_4"><?php echo $medicamento["principio_MedSol"];?></td>   
                        <td class="textoCelda_4"><?php echo $medicamento["presentacion_MedSol"];?></td>
                        <td class="textoCelda_4"><?php echo $medicamento["especificacion_MedSol"];?></td> 
                        <td class="textoCelda_4C"><?php echo $fechaFormatoPHP;?></td>

                        <td class="textoCelda_4A detalle_4"><?php echo $medicamento["nombre_solicitante"] . " " . $medicamento["apellido_solicitante"];?></td> 
                        <td class="textoCelda_4B" style="width: 15%;"><?php echo $medicamento["telefono_solicitante"];?></td>
                        <td class="textoCelda_4B"><?php echo $medicamento["estado_solicitante"];?></td> 

                    </tr>
                </tbody> 
                        <?php 
            } ?>
        </table> <?php 

        }
        else{
            echo "<h3>Sin resultados en la busqueda.</h3>";
            echo "<a class='buttonCuatro' style='margin:auto' href='javascript:history.go(0)'>Limpiar</a>";
        }
     ?> 
        <hr id="linea" style=" background-color: #040652; margin-bottom: 5%; height: 1px; margin-top: 3%;">



