<?php
    class Conexion{
        /*protected $dbh;

        protected function Conexion(){
            try{
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=taller2","root","");
                return $conectar;
            }catch(Exception $e){
                print "¡Error BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        public function set_names(){
			return $this->dbh->query("SET NAMES 'utf8'");
        }
*/

    static public function conectar(){

        $link = new PDO("mysql:host=localhost;dbname=taller2",
                        "root",
                        "");

        $link->exec("set names utf8");

        return $link;

    }
    }
?>