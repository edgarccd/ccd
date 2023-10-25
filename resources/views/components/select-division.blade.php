<div>
   <select name="division_id" id="division_id" class="form-select">
    @foreach($divisiones as $division)
    <option value={{$division->id }}>{{$division->nombre }}</option>
    @endforeach
   </select>
</div>