
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"  value="{{old('nombre',$proyecto->nombre)}}" required>
    <label for="nombre">Nombre</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control" id="ruta" name="ruta" placeholder="Ruta"  value="{{old('nombre',$proyecto->nombre)}}" required>
    <label for="ruta">Ruta</label>
</div>

<div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="descripcion" name="descripcion" style="height: 100px" required>{{old('descripcion', $proyecto->descripcion)}}</textarea>
  <label for="descripcion">Descipción</label>
</div>



