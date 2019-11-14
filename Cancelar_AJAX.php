<?php
//Se verifica si el usuario quería memorizar su cuenta en este ordenador, si hizo click en "recordar datos en este equipo" en principal.php
    
    $Usuario= $_GET['val_11'];//se recibe Nº de cedula desde Ajax_Cancelar.js
    $Clave= $_GET["val_22"];//se recibe contraseña desde Ajax_Cancelar.js
    $Recordar= $_GET["val_23"];//se recibe si se presionó checkbox para recordar
    //echo "Usuario: " . $Usuario . "<br>";
    //echo "Contraseña: " . $Clave . "<br>";
    //echo "Recordar: " . $Recordar . "<br>";

    include("conexion/Conexion_BD.php");

    //se comprueba el usuario y contraseña y se saca el numero de cedula de la BD
    $Consulta_1="SELECT * FROM usuario_paciente INNER JOIN pacientes_registrados ON usuario_paciente.ID_PR=pacientes_registrados.ID_PR WHERE usuarioPaciente = '$Usuario' AND clavePaciente ='$Clave' ";
    $Recordset_1 = mysqli_query($conexion,$Consulta_1);
    $Paciente= mysqli_fetch_array($Recordset_1);
    $PacienteCancela= $Paciente["cedula_pacient"];
    $ID_PR= $Paciente['ID_PR'];
    //echo "Cedula: " . $PacienteCancela;


  /*  if($_GET["val_23"]){// si se dio checked para recordar datos desde Cancelar.php  
        //echo "Recordar Cookie= " . $_GET["val_23"] . "<br>";
        
        //1) creo una marca aleatoria en el registro de este usuario
        //alimentamos el generador de aleatorios
        mt_srand (time());
        //generamos un número aleatorio
        $aleatorio = mt_rand(1000000,999999999);
        //echo "Nº aleatorio= " . $aleatorio . "<br>"; 
        //2) meto la marca aleatoria en el registro correspondiente al usuario
        $Actualizar=" UPDATE usuario_paciente SET Aleatorio='$aleatorio' WHERE ID_PR= '$ID_PR' ";
        mysqli_query($conexion,$Actualizar);

        //3) ahora meto una cookie en el ordenador del usuario con el identificador del usuario y la cookie alporque el usuario marca la casilla de recordar
        //setcookie("id_paciente", $Paciente["ID_PR"], time()+(60));//segundos*minutos*horas*dias
        //setcookie("marcaAleatoria", $aleatorio, time()+(60*60*24*365));
    }
    else{
        echo "no se quiere recordar";
    }*/
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta name="description" content=""/>
        <meta name="keywords" content=""/>
        <meta name="author" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="shortcut icon" type="image/png" href="images/logo.png">
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="css/MediaQuery_CitasMedicas.css"> 

        <script src="Javascript/Funciones_varias.js"></script> 

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');

            @media screen and (max-width: 800px){
                table, thead, tbody, th, td, tr{
                    display: block;  
                    /*background: #bcbeda;*/
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
                    padding-left: 30%;
                    width: 70%;
                    font-size: 14px;
                }
                td:before{
                    background-color: ;
                    font-size: 14px;
                    position: absolute;
                    top: 0;
                    left: 6px;
                    padding-right: 3px;
                    font-weight: bold;
                    color:#040652;
                    white-space: nowrap;
                }
                td:nth-of-type(1):before {content: "---";background-color:#bcbeda; width: 94%;}
                td:nth-of-type(2):before { content: "Fecha"; }
                td:nth-of-type(3):before { content: "Turno"; }
                td:nth-of-type(4):before { content: "Especialista"; }
                td:nth-of-type(5):before { content: "Nombre"; }
                td:nth-of-type(6):before { content: "Eliminar"; margin-top: 3%; }
                .buscar_1:hover{
                    background-color: white;
                }
                .buscar_2{
                    line-height: 150%
                }
                .textoCelda_4A{/*buscarMedicamentoContacto.php*/ 
                background-color:;
                font-size: 14px ;
                width: 50% !important; 
                }
            }

        </style> 
    </head>


<?php    
	

    //Se muestra las citas que el usuario a pedido
    $Consulta_2="SELECT ID_Cita,nombre, apellido, cedula_Identidad, fecha, turno, nombre_doctor,apellido_doctor, especialidad FROM citas INNER JOIN doctores ON citas.ID_Doctor=doctores.ID_Doctor INNER JOIN especialidades ON doctores.ID_Especialidad=especialidades.ID_Especialidad WHERE cedula_Identidad='$PacienteCancela' AND fecha>=curdate() ORDER BY fecha DESC";
    $Recordset_2= mysqli_query($conexion,$Consulta_2); 
    if(mysqli_num_rows($Recordset_2)!=0){
                    ?>                      
                    <table style="width: 100%;"> 
                            <thead>
                                <tr>
                                    <th class="celdas_th">Fecha</th>
                                    <th class="celdas_th">Turno</th>
                                    <th class="celdas_th">Especialidad</th>
                                    <th class="celdas_th" colspan="2">Doctor</th>
                                </tr>
                            </thead>
                    <?php
                    while($paciente_3= mysqli_fetch_array($Recordset_2)){  
                         //se cambia el formato de la fecha a d-m-Y
                        $fechaFormatoMySQL=$paciente_3["fecha"];
                        $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));
                        ?>
                            <tr>
                                <td class="buscar_3">...</td>
                                <td class="a4"><?php echo $fechaFormatoPHP;?></td>
                                <td class="a4"><?php echo $paciente_3["turno"];?></td>
                                <td class="a4"><?php echo $paciente_3["especialidad"];?></td>
                                <td class="a4"><?php echo $paciente_3["nombre_doctor"] . " " . $paciente_3["apellido_doctor"];?></td>
                                <td class="a4"></td>
                                <td class="a4"><?php echo '<a class="paciente_1" href="EliminarCita.php?CitaEliminar='.$paciente_3['ID_Cita'].'"  onclick="return Confirmacion()">Eliminar</a>';?></td>
                            </tr>
                            <tr><td><?php echo "<br>";?></td></tr>
                       

                        <?php 
                    }  ?></table><?php
                    echo "<a class='buttonCuatro' style='margin:5% auto; display: block;' href='javascript:history.go(0)'>Limpiar</a>";
                        
                }
                else{
                    echo "<h3> Usted no tiene citas pendientes.</h3>";
                    echo "<a class='buttonCuatro' style='margin:5% auto; display: block;' href='javascript:history.go(0)'>Limpiar</a>";
                }
                
// ---------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------



           
                    
