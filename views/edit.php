<?php  
    include_once('../business/ClienteMa.php');
    $id=$_REQUEST['id'];
    $manager=new ClienteMa();
    $cli=$manager->buscarId($id);
?>
<h2>Actualizar cliente</h2>
<div class="panel panel-default">
  <div class="panel-body">
  <form role="form" action="crud.php" method="post" id="frm">
    <div class="form-group">
      <label>Nombre y Apellidos</label>
      <input type="text" class="form-control" name="nombre" value="<?=$cli->getNombre()?>">
    </div>
    <div class="form-group">
      <label>Número de DNI</label>
      <input type="number" class="form-control" name="dni" value="<?=$cli->getDni()?>">
    </div>
    <div class="form-group">
      <label>Número de Celular</label>
      <input type="number" class="form-control" name="celular" value="<?=$cli->getCelular()?>">
    </div>
    <div class="form-group">
      <label>Dirección</label>
      <input type="text" class="form-control" name="direccion" value="<?=$cli->getDireccion()?>">
    </div>
    <div class="form-group">
      <label>Lugar de procedencia</label>
      <select name="lugar" class="form-control">
          <option value="Juliaca" <?=($cli->getLugar()=='Juliaca')?'selected':''?>>Juliaca</option>
        <option value="Arequipa" <?=($cli->getLugar()=='Arequipa')?'selected':''?>>Arequipa</option>
        <option value="Lima" <?=($cli->getLugar()=='Lima')?'selected':''?>>Lima</option>
        <option value="Tacna" <?=($cli->getLugar()=='Tacna')?'selected':''?>>Tacna</option>
        <option value="Cusco" <?=($cli->getLugar()=='Cusco')?'selected':''?>>Cusco</option>
        <option value="Puno" <?=($cli->getLugar()=='Puno')?'selected':''?>>Puno</option>
        <option value="Otro" <?=($cli->getLugar()=='Otro')?'selected':''?>>Otro</option>
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
    $.post( "business/crud.php", $("#frm").serialize(),function(data){
      $('#mensaje').html(data).fadeIn('slow').fadeOut(4000);
      $('#formulario').slideUp('slow');
      $('#listar').load("views/list.php").fadeIn('slow');
    });
  });
</script>