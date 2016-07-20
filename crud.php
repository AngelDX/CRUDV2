<?php
	mysql_connect('localhost','root','');
	mysql_select_db("hotel");

	$opt=$_REQUEST["opt"];

	if($opt=="add"){
		$nom=$_REQUEST["nombre"];
		$dni=$_REQUEST["dni"];
		$cel=$_REQUEST["celular"];
		$dir=$_REQUEST["direccion"];
		$lug=$_REQUEST["lugar"];

		mysql_query("INSERT INTO cliente values('','$nom','$dni','$cel','$dir','$lug')");
		echo "Los datos registrados satistactoriamente";
	}
	
	if($opt=="del"){
		$id=$_REQUEST["id"];
		mysql_query("DELETE FROM cliente WHERE id=$id");
		echo "El registro se a eliminado satistactoriamente";
	}

	if($opt=="edit"){
		$id=$_REQUEST["id"];
		$nom=$_REQUEST["nombre"];
		$dni=$_REQUEST["dni"];
		$cel=$_REQUEST["celular"];
		$dir=$_REQUEST["direccion"];
		$lug=$_REQUEST["lugar"];

		mysql_query("UPDATE cliente SET nombre='$nom',dni='$dni',celular='$cel',direccion='$dir',lugar='$lug' WHERE id=$id");
		echo "Registro actualizado satistactoriamente";
	}
?>