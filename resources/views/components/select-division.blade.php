<div>
   <label for="division_id">División</label>
   <select name="division_id" id="division_id" class="form-select">
      <option selected disabled value="">--Seleccionar--</option>
    @foreach($divisiones as $division)
    <option value={{$division->id }} {{ $attributes }}>{{$division->nombre }}</option>
    @endforeach
   </select>
</div>