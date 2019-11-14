<!DOCTYPE html>
<html lang="es">
    <head>

    <script src="../Javascript/Funciones_varias.js"></script>

    </head>

    <style type="text/css">
    table{/**/
        width: auto; 
        margin-left: 0%;
        right: 0%;  
        background-color:#F4FCFB;
        padding: 0% 1%;
    }
    td a{
        font-size: 14px;
        line-height: 150%;
        font-weight: normal;
    }
    th{
        width: 100px;
        text-align: center;
        color: #040652;
        background-color: #BEBFDD;
    }
    td{
        text-align: center;
        vertical-align: top    
    }
    td a:hover{
        background-color: #BEBFDD;
        padding: 0% 11%;
    }


    @media screen and (max-width: 800px) {
     table {
        background-color: ;
        display: block;
        overflow-x: auto;
     }
     th, td{
        background-color: ;
        width: 200px;
        width:200px !important;
    }
    td a{
        background-color: ;
        font-size:13px;
        line-height: 250%;
    }
    td a:hover{
        background-color: #BEBFDD;
        padding: 0% 0%;
    }
 }
        </style>


            <ul>
                <li>
                    <ul>
                        <li>

                <?php                
                     $Consulta_2="SELECT * FROM pacientes_registrados LEFT JOIN historico_visitas ON pacientes_registrados.cedula_pacient=historico_visitas.cedula_paciente WHERE cedula_pacient='$Paciente' ";
                    $Recordset_2=mysqli_query($conexion,$Consulta_2);      
                    $MiPaciente_5= mysqli_fetch_array($Recordset_2);

                    //se cambia el formato de la fecha a d-m-Y
                    $fechaFormatoMySQL=$MiPaciente_5["fechaNacimiento_pacient"];
                    $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));

                ?>

            <div class="antecedentes">                
                            <table>
                                <thead>
                                    <th>ENERO</th>  
                                    <th>FEBRERO</th>
                                    <th>MARZO</th>
                                    <th>ABRIL</th>
                                    <th>MAYO</th>
                                    <th>JUNIO</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><!--ENERO-->
                                            <?php
                                            //echo $Paciente;
                                                $Consulta_3="SELECT DISTINCT  DISTINCT fecha, Cedula_Paciente  FROM diagnostico WHERE Cedula_Paciente='$Paciente' AND ID_Doctor='$sesion' AND fecha BETWEEN '2018-01-01' AND '2018-01-31' ORDER BY fecha ";
                                                $Recordset_2=mysqli_query($conexion,$Consulta_3);      
                                                while($MiPaciente_1= mysqli_fetch_array($Recordset_2)){
                                                   //echo $MiPaciente_1["fecha"]; 

                                                    //se cambia el formato de la fecha
                                                    $fechaFormatoMySQL_1 = $MiPaciente_1["fecha"];//se obtiene la fecha en formato MySQL
                                                    $fechaFormatoPHP_1 = date("d-m-Y", strtotime($fechaFormatoMySQL_1));//se cambia el formato de la fecha d-m-Y
                                                    //echo $fechaFormatoPHP;

                                                    echo '<a href="diagnostico.php?fecha='.  $MiPaciente_1["fecha"] . '&cedula='.$MiPaciente_1["Cedula_Paciente"] . '">'.$fechaFormatoPHP_1 . '</a>' . "<br>"; //al parecer no hacenviar la cedula porque ya se tenie en aquel archivo por via $_SESSION
                                                }
                                                if(mysqli_num_rows($Recordset_2)==0){
                                                    echo "El paciente no tiene registros";
                                                }
                                            ?> 
                                        </td>
                                        <td><!--FEBRERO-->
                                            <?php
                                                $Consulta_4="SELECT DISTINCT  DISTINCT fecha, Cedula_Paciente  FROM diagnostico WHERE Cedula_Paciente='$Paciente' AND ID_Doctor='$sesion' AND fecha BETWEEN '2018-02-01' AND '2018-02-28' ";
                                                $Recordset_4=mysqli_query($conexion,$Consulta_4);      
                                                while($MiPaciente_2= mysqli_fetch_array($Recordset_4)){
                                                   //echo $MiPaciente["fecha"]; 

                                                    $fechaFormatoMySQL_2 = $MiPaciente_2["fecha"];//se obtiene la fecha en formato MySQL
                                                    $fechaFormatoPHP_2 = date("d-m-Y", strtotime($fechaFormatoMySQL_2));//se cambia el formato de la fecha d-m-Y
                                                    //echo $fechaFormatoPHP;

                                                    echo '<a href="diagnostico.php?fecha='.$MiPaciente_2["fecha"].'&cedula='.$MiPaciente_2["Cedula_Paciente"].'">'.$fechaFormatoPHP_2.'</a>' . "<br>"; 
                                                }
                                                if(mysqli_num_rows($Recordset_4)==0){
                                                    echo "El paciente no tiene registros";
                                                }
                                            ?> 
                                        </td>
                                        <td><!--MARZO-->
                                            <?php
                                                $Consulta_4="SELECT DISTINCT  DISTINCT fecha, Cedula_Paciente  FROM diagnostico WHERE Cedula_Paciente='$Paciente' AND ID_Doctor='$sesion' AND fecha BETWEEN '2018-03-01' AND '2018-03-31' ";
                                                $Recordset_4=mysqli_query($conexion,$Consulta_4);      
                                                while($MiPaciente_2= mysqli_fetch_array($Recordset_4)){
                                                   //echo $MiPaciente["fecha_visita"]; 

                                                    $fechaFormatoMySQL = $MiPaciente_2["fecha"];//se obtiene la fecha en formato MySQL
                                                    $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y
                                                    //echo $fechaFormatoPHP;

                                                    echo '<a href="diagnostico.php?fecha='.$MiPaciente_2["fecha"].'&cedula='.$MiPaciente_2["Cedula_Paciente"].'">'.$fechaFormatoPHP.'</a>' . "<br>"; 
                                                }
                                                if(mysqli_num_rows($Recordset_4)==0){
                                                    echo "El paciente no tiene registros";
                                                }
                                            ?> 
                                        </td>
                                        <td><!--ABRIL-->
                                            <?php
                                                $Consulta_4="SELECT DISTINCT fecha, Cedula_Paciente FROM diagnostico WHERE Cedula_Paciente='$Paciente' AND ID_Doctor='$sesion' AND fecha BETWEEN '2018-04-01' AND '2018-04-30' ";
                                                $Recordset_4=mysqli_query($conexion,$Consulta_4);      
                                                while($MiPaciente_2= mysqli_fetch_array($Recordset_4)){
                                                   //echo $MiPaciente["fecha_visita"]; 

                                                    $fechaFormatoMySQL = $MiPaciente_2["fecha"];//se obtiene la fecha en formato MySQL
                                                    $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y
                                                    //echo $fechaFormatoPHP;

                                                    echo '<a href="diagnostico.php?fecha='.$MiPaciente_2["fecha"].'&cedula='.$MiPaciente_2["Cedula_Paciente"].'">'.$fechaFormatoPHP.'</a>' . "<br>"; 
                                                }
                                                if(mysqli_num_rows($Recordset_4)==0){
                                                    echo "El paciente no tiene registros";
                                                }
                                            ?> 
                                        </td>
                                        <td><!--MAYO-->
                                            <?php
                                                $Consulta_4="SELECT DISTINCT fecha, Cedula_Paciente FROM diagnostico WHERE Cedula_Paciente='$Paciente' AND ID_Doctor='$sesion' AND fecha BETWEEN '2018-05-01' AND '2018-05-31' ";
                                                $Recordset_4=mysqli_query($conexion,$Consulta_4);      
                                                while($MiPaciente_2= mysqli_fetch_array($Recordset_4)){
                                                   //echo $MiPaciente["fecha_visita"]; 

                                                    $fechaFormatoMySQL = $MiPaciente_2["fecha"];//se obtiene la fecha en formato MySQL
                                                    $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y
                                                    //echo $fechaFormatoPHP;

                                                    echo '<a href="diagnostico.php?fecha='.$MiPaciente_2["fecha"].'&cedula='.$MiPaciente_2["Cedula_Paciente"].'">'.$fechaFormatoPHP.'</a>' . "<br>"; 
                                                }
                                                if(mysqli_num_rows($Recordset_4)==0){
                                                    echo "El paciente no tiene registros";
                                                }
                                            ?> 
                                        </td>
                                        <td><!--JUNIO-->
                                            <?php
                                                $Consulta_4="SELECT DISTINCT fecha, Cedula_Paciente FROM diagnostico WHERE Cedula_Paciente='$Paciente' AND ID_Doctor='$sesion' AND fecha BETWEEN '2018-06-01' AND '2018-06-30' ";
                                                $Recordset_4=mysqli_query($conexion,$Consulta_4);      
                                                while($MiPaciente_2= mysqli_fetch_array($Recordset_4)){
                                                   //echo $MiPaciente["fecha_visita"]; 

                                                    $fechaFormatoMySQL = $MiPaciente_2["fecha"];//se obtiene la fecha en formato MySQL
                                                    $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y
                                                    //echo $fechaFormatoPHP;

                                                    echo '<a href="diagnostico.php?fecha='.$MiPaciente_2["fecha"].'&cedula='.$MiPaciente_2["Cedula_Paciente"].'">'.$fechaFormatoPHP.'</a>' . "<br>"; 
                                                }
                                                if(mysqli_num_rows($Recordset_4)==0){
                                                    echo "El paciente no tiene registros";
                                                }
                                            ?> 
                                        </td>
                                    </tr>
                                    
                                    <thead>
                                        <th>JULIO</th>  
                                        <th>AGOSTO</th>
                                        <th>SEPTIEMBRE</th>
                                        <th>OCTUBRE</th>
                                        <th>NOVIEMBRE</th>
                                        <th>DICIEMBRE</th>
                                    </thead>
                                        <td><!--JULIO-->
                                            <?php
                                                $Consulta_4="SELECT DISTINCT fecha, Cedula_Paciente FROM diagnostico WHERE Cedula_Paciente='$Paciente' AND ID_Doctor='$sesion' AND fecha BETWEEN '2018-07-01' AND '2018-07-31' ";
                                                $Recordset_4=mysqli_query($conexion,$Consulta_4);      
                                                while($MiPaciente_2= mysqli_fetch_array($Recordset_4)){
                                                   //echo $MiPaciente["fecha_visita"]; 

                                                    $fechaFormatoMySQL = $MiPaciente_2["fecha"];//se obtiene la fecha en formato MySQL
                                                    $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y
                                                    //echo $fechaFormatoPHP;

                                                    echo '<a href="diagnostico.php?fecha='.$MiPaciente_2["fecha"].'&cedula='.$MiPaciente_2["Cedula_Paciente"].'">'.$fechaFormatoPHP.'</a>' . "<br>"; 
                                                }
                                                if(mysqli_num_rows($Recordset_4)==0){
                                                    echo "El paciente no tiene registros";
                                                }
                                            ?> 
                                        </td>
                                        <td><!--AGOSTO-->
                                            <?php
                                                $Consulta_4="SELECT DISTINCT fecha, Cedula_Paciente FROM diagnostico WHERE Cedula_Paciente='$Paciente' AND ID_Doctor='$sesion' AND fecha BETWEEN '2018-08-01' AND '2018-08-31' ";
                                                $Recordset_4=mysqli_query($conexion,$Consulta_4);      
                                                while($MiPaciente_2= mysqli_fetch_array($Recordset_4)){
                                                   //echo $MiPaciente["fecha_visita"]; 

                                                    $fechaFormatoMySQL = $MiPaciente_2["fecha"];//se obtiene la fecha en formato MySQL
                                                    $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y
                                                    //echo $fechaFormatoPHP;

                                                    echo '<a href="diagnostico.php?fecha='.$MiPaciente_2["fecha"].'&cedula='.$MiPaciente_2["Cedula_Paciente"].'">'.$fechaFormatoPHP.'</a>' . "<br>"; 
                                                }
                                                if(mysqli_num_rows($Recordset_4)==0){
                                                    echo "El paciente no tiene registros";
                                                }
                                            ?> 
                                        </td>
                                        <td><!--SEPTIEMBRE-->
                                            <?php
                                                $Consulta_4="SELECT DISTINCT fecha, Cedula_Paciente FROM diagnostico WHERE Cedula_Paciente='$Paciente' AND ID_Doctor='$sesion' AND fecha BETWEEN '2018-09-01' AND '2018-09-30' ";
                                                $Recordset_4=mysqli_query($conexion,$Consulta_4);      
                                                while($MiPaciente_2= mysqli_fetch_array($Recordset_4)){
                                                   //echo $MiPaciente["fecha_visita"]; 

                                                    $fechaFormatoMySQL = $MiPaciente_2["fecha"];//se obtiene la fecha en formato MySQL
                                                    $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y
                                                    //echo $fechaFormatoPHP;

                                                    echo '<a href="diagnostico.php?fecha='.$MiPaciente_2["fecha"].'&cedula='.$MiPaciente_2["Cedula_Paciente"].'">'.$fechaFormatoPHP.'</a>' . "<br>"; 
                                                }
                                                if(mysqli_num_rows($Recordset_4)==0){
                                                    echo "El paciente no tiene registros";
                                                }
                                            ?> 
                                        </td>
                                        <td><!--OCTUBRE-->
                                            <?php
                                                $Consulta_4="SELECT DISTINCT fecha, Cedula_Paciente FROM diagnostico WHERE Cedula_Paciente='$Paciente' AND ID_Doctor='$sesion' AND fecha BETWEEN '2018-10-01' AND '2018-10-31' ";
                                                $Recordset_4=mysqli_query($conexion,$Consulta_4);      
                                                while($MiPaciente_2= mysqli_fetch_array($Recordset_4)){
                                                   //echo $MiPaciente["fecha_visita"]; 

                                                    $fechaFormatoMySQL = $MiPaciente_2["fecha"];//se obtiene la fecha en formato MySQL
                                                    $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y
                                                    //echo $fechaFormatoPHP;

                                                    echo '<a href="diagnostico.php?fecha='.$MiPaciente_2["fecha"].'&cedula='.$MiPaciente_2["Cedula_Paciente"].'">'.$fechaFormatoPHP.'</a>' . "<br>"; 
                                                }
                                                if(mysqli_num_rows($Recordset_4)==0){
                                                    echo "El paciente no tiene registros";
                                                }
                                            ?> 
                                        </td>

                                </tbody>
                            </table>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    