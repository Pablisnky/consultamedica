        <?php
                include("../conexion/Conexion_BD.php");//conexion a BD
                mysqli_query($conexion,"SET NAMES 'utf8' ");
        ?>
        <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
                <style>
                   .primero,.segundo {
                        display:none;
                        padding:5px;
                        border:1px solid #ccc;
                        background-color:#f1f1f1;
                        position:relative;
                        width:200px;
                    }
                    #segundo {
                        position:absolute;
                        top:100px;
                    }
                    /* Al pasar el mouse por encima del div mostramos el div con la
                        clase ".primero". Esta clase, tiene que estar dentro del id
                        "primero" para que pueda funcionar
                     */
                    #primero:hover .primero {
                        display:block;
                    }
                    #segundo:hover .segundo {
                        display:block;
                    }
                </style>
                <ul>
                    <li id="primero">
                        <div style="background-color: red" class="primero">
                            <?php 
                                include("tablaFechaAntecedentes.php");
                            ?>

                        </div>
                    </li>
                    <li id="segundo">
                        <div style="background-color: blue" class="segundo">
                            <p>Selecione una fecha</p>
                        </div>
                    </li>
                </ul>