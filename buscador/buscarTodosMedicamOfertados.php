<!-- archivo llamado desde medicamentosBuscar por medio de ajaxBuscador.js -->
<script src="../Javascript/validar_Campos.js"></script>

<style type="text/css">
    @media screen and (max-width: 325px){
        table, thead, tbody, th, td, tr{
            display: block;        
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
        td:nth-of-type(1):before {content: "---";background-color:#BCBEDA; width: 190%;}/*franja azul*/
        td:nth-of-type(2):before { content: "Nombre comercial"; }
        td:nth-of-type(3):before { content: "Principio activo"; }
        td:nth-of-type(4):before { content: "Presentación"; }
        td:nth-of-type(5):before { content: "Laboratorio"; }
        td:nth-of-type(6):before { content: "Especificaciones"; }
        td:nth-of-type(7):before { content: "Cantidad"; }
        td:nth-of-type(8):before { content: "Contacto"; }
        td:nth-of-type(9):before { content: ""; }
        .buscar_1:hover{
            background-color: white;
        }
        .buscar_2{
            line-height: 150%
        }
        .detalle_1, .detalle_2{
            text-align: left; 
        }
        .textoCelda_4A, .textoCelda_4B, .textoCelda_4, .textoCelda_4C{/*div que abarca todo*/
            background-color:;
            font-size: 14px ;
            width: 100% !important;  
            height: 25px;
        }
        .textoCelda_4C{
            background-color: ;
            text-align: left;
        }
    }

    @media (min-width: 326px) and (max-width: 550px){/*aplicaría en cualquier medio con dimensiones entre 800 y 1300 píxeles.*/
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
            padding-left: 55%;
            box-sizing: border-box;
            font-size: 15px;
        }
        td:before{
            background-color:;/*encabezados*/
            font-size: 15px;
            position: absolute;
            top: 0;/**/
            left: 6px;
            padding-right: 15px;
            white-space: nowrap;
        }
        td:nth-of-type(1):before {content: "---";background-color: #BCBEDA; width: 170%;}/*franja azul*/
        td:nth-of-type(2):before { content: "Nombre comercial"; }
        td:nth-of-type(3):before { content: "Principio activo"; }
        td:nth-of-type(4):before { content: "Presentación"; }
        td:nth-of-type(5):before { content: "Laboratorio"; }
        td:nth-of-type(6):before { content: "Especificaciones"; }
        td:nth-of-type(7):before { content: "Cantidad"; }
        td:nth-of-type(8):before { content: "Contacto"; }
        td:nth-of-type(9):before { content: ""; }
        .buscar_1:hover{
            background-color: white;
        }
        .buscar_2{
            line-height: 150%
        }
        .detalle_1, .detalle_2{
            background-color: ;
            text-align: left; 
        }
        .textoCelda_4A, .textoCelda_4B, .textoCelda_4, .textoCelda_4C{/*div que abarca todo*/
            background-color:;
            font-size: 15px ;
            width: 100% !important; 
            height: 30px;
        }
        .textoCelda_4C{
            background-color: ;
            text-align: left;
        }
    }


    @media (min-width: 551px) and (max-width: 1000px){/*aplicaría en cualquier medio con dimensiones entre 800 y 1300 píxeles.*/
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
            font-size: 17px;
        }
        td:before{
            background-color:;/*encabezados*/
            font-size: 17px;
            position: absolute;
            top: 0;/**/
            left: 6px;
            padding-right: 15px;
            white-space: nowrap;
        }
        td:nth-of-type(1):before {content: "---";background-color: #BCBEDA; width: 190%;}/*franja azul*/
        td:nth-of-type(2):before { content: "Nombre comercial"; }
        td:nth-of-type(3):before { content: "Principio activo"; }
        td:nth-of-type(4):before { content: "Presentación"; }
        td:nth-of-type(5):before { content: "Laboratorio"; }
        td:nth-of-type(6):before { content: "Especificaciones"; }
        td:nth-of-type(7):before { content: "Cantidad"; }
        td:nth-of-type(8):before { content: "Contacto"; }
        td:nth-of-type(9):before { content: ""; }
        .buscar_1:hover{
            background-color: white;
        }
        .buscar_2{
            line-height: 150%
        }
        .detalle_1, .detalle_2{
            text-align: left; 
        }
        .textoCelda_4A, .textoCelda_4B, .textoCelda_4, .textoCelda_4C{/*div que abarca todo*/
            background-color:;
            font-size: 16px ;
            width: 100% !important; 
            height: 30px;
        }
        .textoCelda_4C{
            background-color: ;
            text-align: left;
        }
    }
</style>
         
<?php
	include("../conexion/Conexion_BD.php");

    $MarcaParaAjax=$_GET["val_20"];//se recibe la marca desde por medio de ajaxBUscador.js
    //echo "MarcaParaAjax: " . $MarcaParaAjax .#040652 "<br>";
    
    $Consulta=  "SELECT * FROM medicamentos_ofrecidos ORDER BY fecha_oferta DESC";
	$Recordset= mysqli_query($conexion,$Consulta);
    if(mysqli_num_rows($Recordset) != 0){ ?>

    <form action="../proveedores/pedidoProveedores.php" method="POST">
        <table class="tablaOfertados">
            <caption>Medicinas ofertadas</caption>
            <thead>
                <tr>
                    <th class="buscar_3"></th>
                    <th>Nombre comercial</th>
                    <th>Principio activo</th>
                    <th>Presentación</th>
                    <th>Laboratorio</th>
                    <th style=" width: 4% !important;" colspan="2">Especificaciones</th>  
                    <th class="detalle_3" colspan="5">Ofertado por:</th>                          
                </tr>
            </thead>
                    <?php
            while($medicamento= mysqli_fetch_array($Recordset)){
                //se cambia el formato de la fecha a mostrar en pantalla
               $fechaFormatoMySQL = $medicamento["fecha_oferta"];//se obtiene la fecha en formato MySQL
               $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha a d-m-Y
                ?>
                    <tbody class="buscar_2">
                        <tr class="buscar_1">
                            <td class="buscar_3">...</td>
                            <td class="textoCelda_4"><?php echo $medicamento["nombre_Medic"];?></td>                         
                            <td class="textoCelda_4"><?php echo $medicamento["principio_Activo"];?></td>   
                            <td class="textoCelda_4A"><?php echo $medicamento["presentacion_Medic"];?></td>
                            <td class="textoCelda_4"><?php echo $medicamento["laboratorio_Medic"];?></td>
                            <td class="textoCelda_4C"><?php echo $medicamento["especificaciones_Medic"];?></td> 
                            <td  class="textoCelda_4 detalle_2"><?php echo $medicamento["unidades_Medic"];?></td>


                            <td class="textoCelda_4B detalle_4"><?php echo $medicamento["nombre_solicitante"] . " " . $medicamento["apellido_solicitante"];?></td> 
                            <td class="textoCelda_4B"><?php echo $medicamento["telefono_solicitante"];?></td> 
                            <td class="textoCelda_4B"><?php echo $medicamento["estado_solicitante"];?></td>             
                        </tr>
                    </tbody> 
                        
                    <?php } ?>

        </table>
    </form>
           
           <?php 
        }
        else{
            echo "<h3>Sin resultados.</h3>";
            echo "<a class='buttonCuatro' style='margin:auto' href='javascript:history.go(0)'>Limpiar</a>";
        }

     ?> 
        <hr class="linea">

     




