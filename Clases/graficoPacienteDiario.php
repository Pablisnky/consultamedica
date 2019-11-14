
<div id="MostrarFechas" onclick="location.reload(false);"><!--Muestra la tabla de pacientes para la fecha seleccionada, viene de Fechas_Consultas.php tambien muestra el grafico--> 
    <canvas id="carga"></canvas>
    <script>
        var ctx = document.getElementById("carga").getContext('2d');
        var myChart = new Chart(ctx,{
            type: 'bar',
            data: {
                //labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado","Domingo"],
                labels:[
                    <?php
                    //consulta para realizar el grafico, selecciona los valores del grafico en el eje X
                    $Consulta_2="SELECT COUNT(*) AS 'TotalPacientesPorDia', fecha FROM citas WHERE ID_Doctor=$sesion AND fecha BETWEEN curdate() AND DATE_ADD(NOW(), INTERVAL 10 DAY) GROUP BY fecha";
                    $Recordset_2= mysqli_query($conexion,$Consulta_2);
                    while($Resultado_2= mysqli_fetch_array($Recordset_2)){
                        //se cambia el formato de la fecha
                        $fechaFormatoMySQL_2 = $Resultado_2["fecha"];//se obtiene la fecha en formato MySQL
                        $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL_2));//se cambia el formato a d-m-y 
                         ?> //se cierra php porque los datos que recibe label de chrt.js son cadenas de texto

                        '<?php echo $fechaFormatoPHP ;?>',//esta cadena es la que aparece en el grafico
                        <?php 
                    } ?>
                ],
                datasets: [{
                    label: ' Pacientes',
                    //data: [12, 19, 3, 5, 2, 3, 8],//datos para utilizarlos sin conexion a BD
                    data:[
                        //consulta para realizar el grafico, selecciona los valores del grafico en el eje Y
                        <?php
                        $Consulta_3="SELECT COUNT(*) AS 'PacientePorDia', fecha FROM citas WHERE ID_Doctor=$sesion AND fecha BETWEEN curdate() AND DATE_ADD(NOW(), INTERVAL 10 DAY) GROUP BY fecha";
                        $Recordset_3= mysqli_query($conexion,$Consulta_3);
                        while($Resultado_3= mysqli_fetch_array($Recordset_3)){
                                      
                            ?> //se cierra php porque los datos que recibe lable de chrt.js son cadenas de texto
                            '<?php echo $Resultado_3['PacientePorDia'];?>',//esta cadena es la que aparece en el grafico
                            <?php 
                        } ?>

                    ],
                    backgroundColor: [
                        'rgba(54, 99, 132, 0.2)',
                        'rgba(54, 99, 132, 0.2)',
                        'rgba(54, 99, 132, 0.2)',
                        'rgba(54, 99, 132, 0.2)',
                        'rgba(54, 99, 132, 0.2)',
                        'rgba(54, 99, 132, 0.2)',
                        'rgba(54, 99, 132, 0.2)',
                        'rgba(54, 99, 132, 0.2)',
                        'rgba(54, 99, 132, 0.2)',
                        'rgba(54, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 99, 132, 1)',
                        'rgba(54, 99, 132, 1)',
                        'rgba(54, 99, 132, 1)',
                        'rgba(54, 99, 132, 1)',
                        'rgba(54, 99, 132, 1)',
                        'rgba(54, 99, 132, 1)',
                        'rgba(54, 99, 132, 1)',
                        'rgba(54, 99, 132, 1)',
                        'rgba(54, 99, 132, 1)',
                        'rgba(54, 99, 132, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
</div>