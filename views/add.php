<h2>Agregar nuevo cliente</h2>
<div class="panel panel-default">
  <div class="panel-body">
  <form role="form" action="business/crud.php" method="post" id="frm">
    <div class="form-group">
      <label>Nombre y Apellidos</label>
      <input type="text" class="form-control" placeholder="Introduce tu Nombre" name="nombre" required>
    </div>
    <div class="form-group">
      <label>Número de DNI</label>
      <input type="number" class="form-control" placeholder="DNI" name="dni">
    </div>
    <div class="form-group">
      <label>Número de Celular</label>
      <input type="number" class="form-control" placeholder="Celular" name="celular">
    </div>
    <div class="form-group">
      <label>Dirección</label>
      <input type="text" class="form-control" placeholder="Dirección" name="direccion">
    </div>
    <div class="form-group">
      <label>Lugar de procedencia</label>
      <select name="lugar" class="form-control">
        <option value="Juliaca">Juliaca</option>
        <option value="Arequipa">Arequipa</option>
        <option value="Tacna">Tacna</option>
        <option value="Lima">Lima</option>
        <option value="Cusco">Cusco</option>
        <option value="Puno">Puno</option>
        <option value="Otro">Otro</option>
      </select>
    </div>
    <input type="hidden" name="opt" value="add">
    <button type="button" class="btn btn-success" id="guardar">Guardar</button>
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
      $.post("business/crud.php", $("#frm").serialize(),function(data){
        $('#mensaje').html(data).fadeIn('slow').fadeOut(4000);
        $('#formulario').slideUp('slow');
        $('#listar').load("views/list.php").fadeIn('slow');
      });
  });
</script>