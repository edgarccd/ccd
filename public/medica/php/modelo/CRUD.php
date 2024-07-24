<?php
interface CRUD
{
    public function insertar();    
    public function borrar();
    public function actualizar();
    public function consultar_por_id();
    public function consultar_todos();
};
?>