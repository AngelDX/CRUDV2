<?php
	include_once('../to/ClienteTO.php');
        include_once('../business/ClienteMa.php');
        $cliente=new ClienteTO();
      
	$opt=$_REQUEST["opt"];

	if($opt=="add"){
            $nom=$_REQUEST["nombre"];
            $dni=$_REQUEST["dni"];
            $cel=$_REQUEST["celular"];
            $dir=$_REQUEST["direccion"];
            $lug=$_REQUEST["lugar"];

            $cliente->setNombre($nom);
            $cliente->setDni($dni);
            $cliente->setCelular($cel);
            $cliente->setDireccion($dir);
            $cliente->setLugar($lug);

            $manager=new ClienteMa();
            $manager->nuevo($cliente);
	}
	
	if($opt=="del"){
            $id=$_REQUEST["id"];
            $manager=new ClienteMa();
            $manager->eliminar($id);
	}

	if($opt=="edit"){
            $id=$_REQUEST["id"];
            $nom=$_REQUEST["nombre"];
            $dni=$_REQUEST["dni"];
            $cel=$_REQUEST["celular"];
            $dir=$_REQUEST["direccion"];
            $lug=$_REQUEST["lugar"];

            $cliente->setId($id);
            $cliente->setNombre($nom);
            $cliente->setDni($dni);
            $cliente->setCelular($cel);
            $cliente->setDireccion($dir);
            $cliente->setLugar($lug);

            $manager=new ClienteMa();
            $manager->editar($cliente);
	}
?>