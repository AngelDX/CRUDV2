<?php  
    include_once('../business/ClienteMa.php');
    $cliente=new ClienteMa();
    $data=$cliente->listar();
?>
<div class="row">
		<div class="col-sm-12">
			<table class="table table-striped table-bordered table-hover">
			<tr>
				<th>Nro.</th>
				<th>Nombre y Apellidos</th>
				<th>DNI</th>
				<th>Celular</th>
				<th>Direccion</th>
				<th>Procedencia</th>
				<th colspan="2">Opciones</th>
			</tr>
		<?php
			$i=0;
			foreach ($data as $cli){
		?>
				<tr>
					<td><?php echo ++$i; ?></td>
					<td><?php echo $cli->getNombre(); ?></td>
					<td><?php echo $cli->getDni(); ?></td>
                                        <td><?php echo $cli->getCelular(); ?></td>
                                        <td><?php echo $cli->getDireccion(); ?></td>
                                        <td><?php echo $cli->getLugar(); ?></td>
					<td><a href="#"><span class="glyphicon glyphicon-pencil" onclick="editar(<?php echo $cli->getId(); ?>)"></span></a></td>
                                        <td><a href="#"><span class="glyphicon glyphicon-remove" onclick="eliminar(<?php echo $cli->getId(); ?>)"></span></a></td>
				</tr>
				
		<?php } ?>
		</table>
		<p>Total registros encontrados: <?=$i?></p>
		</div>
	</div>
<script>
	var eliminar=function(codigo){
		if(confirm("¿se va eliminar el registro?")){
			$.post("business/crud.php",{id:codigo,opt:"del"},function(data){
		      $('#mensaje').html(data).fadeIn('slow').fadeOut(4000);
		      $('#listar').load("views/list.php").fadeIn('slow');
		    });
		}
		return false;		
	}

	var editar=function(codigo){
		$('#formulario').load("views/edit.php",{id:codigo}).slideDown('slow');
	}
</script>