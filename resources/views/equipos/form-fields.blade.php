<div class="form-floating mb-3">
    <input type="text" class="form-control text-uppercase" id="nombre" name="nombre" placeholder="Nombre" maxlength="50"
         required>
    <label for="nombre">Nombre del equipo ( Max 50 Caracteres) </label>
</div>

<div class="form-floating mb-3">
    <input type="textarea" name="comentarios" id="comentarios" class="form-control text-uppercase"
        placeholder="Comentarios" required>
    <label for="comentarios">Comentarios</label>
</div>

<x-select-proyecto />
