<?php  
	mysql_connect('localhost','root','');
	mysql_select_db("hotel");
	$sql=mysql_query("SELECT * FROM cliente");
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
			while($rs=mysql_fetch_array($sql)){
		?>
				<tr>
					<td><?php echo ++$i; ?></td>
					<td><?php echo $rs['nombre']; ?></td>
					<td><?php echo $rs['dni']; ?></td>
					<td><?php echo $rs['celular']; ?></td>
					<td><?php echo $rs['direccion']; ?></td>
					<td><?php echo $rs['lugar']; ?></td>
					<td><a href="#"><span class="glyphicon glyphicon-pencil" onclick="editar(<?php echo $rs['id']; ?>)"></span></a></td>
					<td><a href="#"><span class="glyphicon glyphicon-remove" onclick="eliminar(<?php echo $rs['id']; ?>)"></span></a></td>
				</tr>
				
		<?php } ?>
		</table>
		<p>Total registros encontrados: <?=$i?></p>
		</div>
	</div>
<script>
	var eliminar=function(codigo){
		$.post("crud.php",{id:codigo,opt:"del"},function(data){
	      $('#mensaje').html(data).fadeIn('slow').fadeOut(4000);
	      $('#listar').load("list.php").fadeIn('slow');
	    });
	}

	var editar=function(codigo){
		console.log(codigo);
		$('#formulario').load("edit.php",{id:codigo}).slideDown('slow');
	}
</script>