<div>
   <label for="division_id">División</label>
   <select name="division_id" id="division_id" class="form-select">
      <option value="0">--Seleccionar</option>
    @foreach($divisiones as $division)
    <option value={{$division->id }}>{{$division->nombre }}</option>
    @endforeach
   </select>
</div>