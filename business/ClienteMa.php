<?php 
include_once('../business/conectar.php');
include_once('../to/ClienteTO.php');

class ClienteMa{

	public function listar(){
		$objeto=new conectar();
		$objeto->con();

		$sql=mysql_query("SELECT * FROM cliente");
                $cont=0;
		$data=array();
		while($rs=mysql_fetch_array($sql)){
                    $to=new ClienteTO();
                    $to->setId($rs['id']);
                    $to->setNombre($rs['nombre']);
                    $to->setDni($rs['dni']);
                    $to->setCelular($rs['celular']);
                    $to->setDireccion($rs['direccion']);
                    $to->setLugar($rs['lugar']);
                    
                    $data[$cont++]=$to;
		}
                $objeto->des();
                return $data;
	}
        
        public function nuevo(ClienteTO $cli){
            $objeto=new conectar();
            $objeto->con();
            $sql="INSERT INTO cliente values('','".$cli->getNombre()."','".$cli->getDni()."',"
                    . "'".$cli->getCelular()."','".$cli->getDireccion()."','".$cli->getLugar()."')";
            if(mysql_query($sql)){
                echo "Los datos registrados satistactoriamente";
            }else{
                echo "Error: no se puedo agregar...";
            } 
            $objeto->des();
        }
        
        public function eliminar($id){
            $objeto=new conectar();
            $objeto->con();
            $sql="DELETE FROM cliente WHERE id=$id";
            if(mysql_query($sql)){
                echo "El registro se a eliminado satistactoriamente";
            }else {
                echo "Error: No se pudo eliminar...";
            }
        }
        
        public function editar(ClienteTO $cli){
            $objeto=new conectar();
            $objeto->con();
            $sql="UPDATE cliente SET nombre='".$cli->getNombre()."',dni='".$cli->getDni()."',celular='".$cli->getCelular()."',"
                    . "direccion='".$cli->getDireccion()."',lugar='".$cli->getLugar()."' WHERE id=".$cli->getId()."";
            
            if(mysql_query($sql)){
                echo "Los datos registrados satistactoriamente";
            }else{
                echo "Error: no se puedo agregar...";
            } 
            $objeto->des();
        }
        
        public function buscarId($id){
		$objeto=new conectar();
		$objeto->con();
                
		$sql=mysql_query("SELECT * FROM cliente WHERE id=$id");
                
		while($rs=mysql_fetch_array($sql)){
                    $to=new ClienteTO();
                    $to->setId($rs['id']);
                    $to->setNombre($rs['nombre']);
                    $to->setDni($rs['dni']);
                    $to->setCelular($rs['celular']);
                    $to->setDireccion($rs['direccion']);
                    $to->setLugar($rs['lugar']);
		}
                $objeto->des();
                return $to;
	}
}

?>