<?php
        // Se recibntodas las variables enviadas por medio de un ciclo foreach desde Anamnesis.php 
        foreach($_POST as $nombre_campo => $valor){ 
               $asignacion_1 = "\$" . $nombre_campo . " = '" . $valor . "';";
               echo $asignacion_1 . "<br>";
            }

        include("../conexion/Conexion_BD.php");

        //Se guardan los datos recibidos en la tabla pacientes registrados
        $Insertar_1=" INSERT INTO anamnesis() VALUES()";    
        mysqli_query($conexion,$Insertar_1);





       ?>