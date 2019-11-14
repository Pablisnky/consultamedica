<!--Encabezado de todas las páginas que no estan dentro de una cuenta de usuario y que se encuentren un nivel atras de la carpeta raiz-->
    <style type="text/css">
            nav li{
                float:left;
            }
            nav li a {
                text-align: left !important;
            }
            nav li ul{/*caja de contenido de los enlaces#BCBEDA*/
                background-color: yellow !important;
                display:none !important;
                position:absolute;
                width:400px !important;
                text-align: left !important;
                padding-left: -90px !important;
            }
            nav li ul li a{
                background-color: blue;
                margin-left: 13px !important;
                width: 160px !important;
                line-height: 200% !important;
            }
            nav li:hover ul{
                display:block  !important;
            }
            nav li ul li{
                position:relative; 
                padding-left: 5px !important;
            }
    </style>

    <link rel="stylesheet" type="text/css" href="../iconos/icono_menu/style_menu.css"/><!--galeria de icomoon.io-->

    <?php  
        $variableip="II_Entrada";
    ?>
    
    <a class="enlace_desactivado" href="../index.php?V_1=<?php echo base64_encode($variableip);?>"><h1 class="index_3">ConsultaMedica.com.ve</h1></a>
    <label id="ComandoMenu" class="comandoMenu" onclick="mostrarMenu()"><span class="icon-menu"></span></label>
    <nav class="menuResponsive" id="MenuResponsive">
        <ul>
            <li><a href="../index.php?V_1=<?php echo base64_encode($variableip);?>">Inicio</a>
            <li><a href="../vista/Proposito.php" >Propósito</a></li>
            <li><a href="../vista/medicamentos.php">Medicamentos</a></li>
            <li><a href="../vista/contactenos.php">Contacto</a></li>
            <li><a href="../vista/directorio.php">Directorio médico</a></li>
            <li><a href="../vista/Afiliacion.php">Afiliacion</a></li>
            <li><a href="../vista/ingresar.php">Ingresar</a></li>
        </ul>
    </nav>   