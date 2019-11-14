<?php
    $Consulta= "SELECT * FROM doctores INNER JOIN usuario_doctor ON doctores.ID_Doctor=usuario_doctor.ID_Doctor WHERE doctores.ID_Doctor='$sesion'";
    $Recordset= mysqli_query($conexion,$Consulta);
    $DatosDoctor= mysqli_fetch_array($Recordset);
    $PlanAfiliado= $DatosDoctor["planAfiliado"]; //se obtiene el plan afiliado del doctor.
    // echo "EL plan del Dr es: " . $PlanAfiliado . "<br>";

    switch($PlanAfiliado){
        case 'Ini':
            $Plan= "Ini";
        break;
        case 'Bas':
            $Plan= "Bas";
        break;
        case 'Esp':
            $Plan= "Esp";
        break;
    } 
?>