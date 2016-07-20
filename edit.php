<?php  
  mysql_connect('localhost','root','');
  mysql_select_db("hotel");
  $id=$_REQUEST['id'];
  $sql=mysql_query("SELECT * FROM cliente WHERE id=$id");
  $rs=mysql_fetch_array($sql);
?>
<h2>Actualizar cliente</h2>
<div class="panel panel-default">
  <div class="panel-body">
  <form role="form" action="crud.php" method="post" id="frm">
    <div class="form-group">
      <label>Nombre y Apellidos</label>
      <input type="text" class="form-control" name="nombre" value="<?=$rs['nombre']?>">
    </div>
    <div class="form-group">
      <label>Número de DNI</label>
      <input type="number" class="form-control" name="dni" value="<?=$rs['dni']?>">
    </div>
    <div class="form-group">
      <label>Número de Celular</label>
      <input type="number" class="form-control" name="celular" value="<?=$rs['celular']?>">
    </div>
    <div class="form-group">
      <label>Dirección</label>
      <input type="text" class="form-control" name="direccion" value="<?=$rs['direccion']?>">
    </div>
    <div class="form-group">
      <label>Lugar de procedencia</label>
      <select name="lugar" class="form-control">
        <option value="Juliaca" <?=($rs['lugar']=='Juliaca')?'selected':''?>>Juliaca</option>
        <option value="Arequipa" <?=($rs['lugar']=='Arequipa')?'selected':''?>>Arequipa</option>
        <option value="Lima" <?=($rs['lugar']=='Lima')?'selected':''?>>Lima</option>
        <option value="Tacna" <?=($rs['lugar']=='Tacna')?'selected':''?>>Tacna</option>
        <option value="Cusco" <?=($rs['lugar']=='Cusco')?'selected':''?>>Cusco</option>
        <option value="Puno" <?=($rs['lugar']=='Puno')?'selected':''?>>Puno</option>
        <option value="Otro" <?=($rs['lugar']=='Otro')?'selected':''?>>Otro</option>
      </select>
    </div>
    <input type="hidden" name="opt" value="edit">
    <input type="hidden" name="id" value="<?=$id?>">
    <button type="button" class="btn btn-success" id="guardar">Actualizar</button>
    <button type="button" class="btn btn-default" id="cerrar">Cerrar</button>
</form>
  </div>
</div>

<br>
<script>
  $('#cerrar').click(function(){
    $('#formulario').slideUp('slow');
  });
  $('#guardar').click(function(){
    $.post( "crud.php", $("#frm").serialize(),function(data){
      $('#mensaje').html(data).fadeIn('slow').fadeOut(4000);
      $('#formulario').slideUp('slow');
      $('#listar').load("list.php").fadeIn('slow');
    });
  });
</script>