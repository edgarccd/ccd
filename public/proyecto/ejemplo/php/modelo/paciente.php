<?php
require_once "Conexion_db.php";
require_once "CRUD.php";

class paciente implements CRUD{

public $id;
public $nss;
public $nombre;
public $apellidoP;
public $apellidoM;
public $fecha;

public function setIdPaciente($id_paciente){
    $this->id = $id_paciente;
}

public function _construct(){
    $this->id=0;
    $this->nss="none";
    $this->nombre="none";
    $this->apellidoP="none";
    $this->apellidoM="none";
    $this->fecha="01/01/2000";
}

public function setNss($nss){
    $this->nss = $nss;
}

public function setNombre($nombre){
    $this->nombre = $nombre;
}

public function setApellidoPat($apellido_pat){
    $this->apellidoP = $apellido_pat;
}

public function setApellidoMat($apellido_mat){
    $this->apellidoM = $apellido_mat;
}

public function setFechaNac($fecha_nacimiento){
    $this->fecha = $fecha_nacimiento;
}

public function getIdPaciente(){
    return $this->id;
}

public function getNss(){
    return $this->nss;
}

public function getNombre(){
    return $this->nombre;
}

public function getApellidoPat(){
    return $this->apellidoP;
}

public function getApellidoMat(){
    return $this->apellidoM;
}

public function getFecha(){
    return $this->fecha;
}  

public function insertar()
{   
    $conexion = new config_db;
    $conexion->conexion();
    $conn = $conexion->get_conn();   
    $sql = $conn->prepare("INSERT INTO paciente(nss,apellido_pat,apellido_mat,nombre,fecha_nacimiento)
                            VALUES (:nss,  :apePat, :apeMat,:nombre, :fecha)");
   $sql->bindparam(":nss",$this->nss);
   $sql->bindparam(":apePat",$this->apellidoP);
   $sql->bindparam(":apeMat",$this->apellidoM);
   $sql->bindparam(":nombre",$this->nombre);
   $sql->bindparam(":fecha",$this->fecha);
   $resultado = $sql->execute();
   $conexion->desconexion();
   if ($resultado) {
       return 1;
   } else {
       return 0;
   }
}


public function borrar()
{
    $conexion = new config_db;
    $conexion->conexion();

    $conn = $conexion->get_conn();
    $sql = $conn->prepare("DELETE FROM paciente where id_paciente=:id");


        //Le daremos valores a los atrivutos de la clase
        $sql->bindparam(":id", $this->id);
        //Haremos que se ejecute la linea de codigo
        $resultado = $sql->execute();

        //Terminamos la conexion
        $conexion->desconexion();
        if ($resultado) {
            return 1;
        } else {
            return 0;
        }
}

public function actualizar()
{
    $conexion = new config_db;
    $conexion->conexion();

    $conn = $conexion->get_conn();
    
    $sql = $conn->prepare("UPDATE paciente 
                                SET nss=:nss, apellido_pat=:apellidoPat, apellido_mat=:apellidoMat, nombre=:nombre, fecha_nacimiento=:fechaNac where id_paciente=:id");


    //Le daremos valores a los atrivutos de la clase
    $sql->bindparam(":id", $this->id);
    $sql->bindparam(":nss", $this->nss);
    $sql->bindparam(":apellidoPat", $this->apellidoP);
    $sql->bindparam(":apellidoMat", $this->apellidoM);
    $sql->bindparam(":nombre", $this->nombre);
    $sql->bindparam(":fechaNac", $this->fecha);
    
    //Haremos que se ejecute la linea de codigo
    $resultado = $sql->execute();

    //Terminamos la conexion
    $conexion->desconexion();
    if ($resultado) {
        return 1;
    } else {
        return 0;
    }
}

public function consultar_por_id()
{
    $conexion = new Config_db();
    $conexion->conexion();
    $conn = $conexion->get_conn();
    $sql = $conn->prepare("SELECT * FROM paciente where id_paciente=:id");
    $sql->bindParam(":id",$this->id);
    $sql->setFetchMode(PDO::FETCH_OBJ);
    $sql->execute();
    $conexion->desconexion();
    return $sql->fetchAll();       
}

public function consultar_por_nss(){
    $conexion = new Config_db();
    $conexion->conexion();
    $conn = $conexion->get_conn();
    $sql = $conn->prepare("SELECT * FROM paciente where NSS=:nss");
    $sql->bindParam(":nss",$this->nss);
    $sql->setFetchMode(PDO::FETCH_OBJ);
    $sql->execute();
    $conexion->desconexion();
    return $sql->fetchAll();   
}

public function consultar_todos()
{
    $conexion = new Config_db();
        $conexion->conexion();
        $conn = $conexion->get_conn();
        $sql = $conn->prepare("SELECT * FROM paciente");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute();
        $conexion->desconexion();
        return $sql->fetchAll(); 
}
}
