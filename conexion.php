<?php
    class conexion{
        public static function getConexion(){
            $server="localhost";
            $db = "dulceria";
            $user="root";
            $password="Fundamentosweb1&";
            $con="";


            try{
                $con=new PDO("mysql:host=$server;dbname=$db",$user,$password);
                //echo "Se concecto de manera correcrat la conexion";
            }
            catch(PDOException $exp){
                echo ("no se logro conectar correctamente");
            } 
            return $con;
        }

    }
?>