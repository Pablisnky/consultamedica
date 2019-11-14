
<style type="text/css">
    table{/**/
        width: 100%; 
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
        </style>


            <ul>
                <li>
                    <ul>
                        <li>
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
                                        <td>
                                            <?php
                                            //echo $Paciente;
                                                $Consulta_3="SELECT * FROM historico_visitas WHERE cedula_paciente='$Paciente' AND fecha_visita BETWEEN '2018-01-01' AND '2018-01-31' ";
                                                $Recordset_2=mysqli_query($conexion,$Consulta_3);      
                                                while($MiPaciente_1= mysqli_fetch_array($Recordset_2)){
                                                   //echo $MiPaciente_1["fecha_visita"]; 

                                                    //se cambia el formato de la fecha
                                                    $fechaFormatoMySQL = $MiPaciente_1["fecha_visita"];//se obtiene la fecha en formato MySQL
                                                    $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y
                                                    //echo $fechaFormatoPHP;

                                                    echo '<a href="muestraHistoria.php?fecha='.$MiPaciente_1["fecha_visita"].'&cedula='.$MiPaciente_1["cedula_paciente"].'">'.$fechaFormatoPHP.'</a>' . "<br>"; //al parecer no hacenviar la cedula porque ya se tenie en aquel archivo por via $_SESSION
                                                }
                                                if(mysqli_num_rows($Recordset_2)==0){
                                                    echo "El paciente no tiene registros";
                                                }
                                            ?> 
                                        </td>
                                        <td>
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
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <thead>
                                        <th>JULIO</th>  
                                        <th>AGOSTO</th>
                                        <th>SEPTIEMBRE</th>
                                        <th>OCTUBRE</th>
                                        <th>NOVIEMBRE</th>
                                        <th>DICIEMBRE</th>
                                    </thead>
                                </tbody>
                            </table>
                        </li>
                    </ul>
                </li>
            </ul>
               
    