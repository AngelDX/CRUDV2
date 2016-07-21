<?php

class Conectar{

	protected $conexion;

    public function con(){
        $conexion=mysql_connect("127.0.0.1", "root","");
        if ($conexion==0) DIE("Lo sentimos, no se ha podido conectar con MySQL: ".mysql_error());
        	$db=mysql_select_db("hotel",$conexion);
        if ($db==0) DIE("Lo sentimos, no se ha podido conectar con la base datos: ");
        return true;
    }

    public function des(){
        if($this->conexion) {
            mysql_close($this->conexion);
        }

    }



}
?>
