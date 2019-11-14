<!--aplica solo a index.php porque no tiene Inicio en el menu-->
<style type="text/css">
            nav> li{
                float:left;
            }
            nav li a {
                text-align: left !important;
            }
            nav li ul{/*caja de contenido de los enlaces*/
                background-color: #BCBEDA !important;
                display:none !important;
                position:absolute;
                width:175px !important;
                text-align: left !important;
                padding-left: -90px !important;
            }
            nav li ul li a{
                background-color: ;
                margin-left: 13px !important;
                width: 160px !important;
                line-height: 200% !important;
            }
            
            nav li:hover > ul{
                display:block  !important;
            }
            
            nav li ul li{
                position:relative;
                padding-left: 5px !important;
            }

            @media screen and (max-width: 800px){
                nav li ul{/*caja de contenido de los enlaces*/
                    background-color: #BCBEDA !important;
                    display:none !important;
                    position:absolute;
                    width:200px !important;
                    text-align: left !important;
                    padding-left: -10px !important;
                }
                nav li ul li a{
                    background-color: ;
                    margin-left: 13px !important;
                    width: 160px !important;
                    line-height: 150% !important;
                } 
    </style>
    <h1>ConsultaMedica.com.ve</h1>
    <label id="ComandoMenu" class="comandoMenu" onclick="mostrarMenu()">Menú</label>
    <nav class="menuResponsive" id="MenuResponsive">
        <ul>
            <li><a href="Proposito.php" >Propósito</a></li>
            <li><a>Buscar</a>
                <ul>
                    <li><a href="directorio.php">Directorio médico</a></li>
                    <li><a href="registro/medicamentos.php">Medicamentos</a></li>
                    <!--<li><a href="../comercio.php">Farmacias</a></li>
                    <li><a href="../comercio.php">Laboratorios</a></li>
                    <li><a href="Instituciones/Centros_Salud.php">Centros de salud</a></li>
                    <li><a href="registro/quirurgicos.php">MMQ</a></li>-->
                </ul>
            </li>
            <li><a href="contactenos.php">Contacto</a></li>
            <li><a href="directorio.php">Directorio médico</a></li>
            <li><a href="Afiliacion.php">Afiliacion</a></li>
            <li><a href="ingresar.php">Ingresar</a></li>
        </ul>
    </nav>   

