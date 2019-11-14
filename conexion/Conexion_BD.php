<?php
    require_once "constantesLocal.php";

    //se instacia la clase mysqli(); que es una clase que viene con PHP y conecta directamente a la BD mediante su metodo constructor
    //Esta forma de conectarse funciona bien, se va a cambiar por otra forma más segura como POO,
       $conexion = new mysqli(HOSTING, USUARIO, PASSWORD, NOMBRE_BD);

        mysqli_query($conexion, 'SET NAMES "' . CHARSET . '"');

        //Si tenemos un posible error en la conexión lo mostramos
        if(mysqli_connect_errno()){
            printf("Falló conexión a la base de datos: %s\n", mysqli_connect_error());
            exit();
        }
   
/* Esta conexion aparece en la clase Bº 13 de Cesar Cancino Zapata "Taller PHP_ManosenelCodigo"
    abstract class Conectar{
        private $mysqli;
        public function conectar(){
            $this->mysqli= new mysqli("HOSTING", "USUARIO", "PASSWORD");
            $this->mysqli->select_db(NOMBRE_BD);
            return $this->mysqli;
        }
        public function setNames(){
            return $this->mysqli->query("SET NAMES 'UTF-8'");
        }
    }*/


//------------------------------------------------------------------------------
/*if (!function_exists('ejecutarConsulta')) {
    function ejecutarConsulta($sql) {
        global $conexion;
        $query = $conexion->query($sql);

        return $query;
    }

    function ejecutarConsultaSimpleFila($sql) {
        global $conexion;
        $query = $conexion->query($sql);
        $row   = $query->fetch_assoc();

        return $row;
    }

    function ejecutarConsulta_retornarID($sql) {
        global $conexion;
        $query = $conexion->query($sql);

        return $conexion->insert_id;
    }

    function limpiarCadena($str) {
        global $conexion;
        $str = mysqli_real_escape_string($conexion, trim($str));

        return htmlspecialchars($str);
    }
}*/
?>