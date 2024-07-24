<?php
require_once "../modelo/paciente.php";

if (isset($_REQUEST['opcion'])) {
        $opcion = $_REQUEST['opcion'];
        echo $opcion;
        switch ($opcion) {
                case 1: //altas
                        if (
                                isset($_REQUEST['nss']) and isset($_REQUEST['nombre']) and isset($_REQUEST['apellidoPat'])
                                and isset($_REQUEST['apellidoMat']) and isset($_REQUEST['fecha'])
                        ) {
                                $paciente = new paciente();
                                $paciente->nss = $_REQUEST['nss'];
                                $paciente->nombre = $_REQUEST['nombre'];
                                $paciente->apellidoP = $_REQUEST['apellidoPat'];
                                $paciente->apellidoM = $_REQUEST['apellidoMat'];
                                $paciente->fecha = $_REQUEST['fecha'];
                                $resultado = $paciente->insertar();
                                header('Location: ../../php/vista/paciente/');
                        }
                        break;
                case 2: //bajas
                        if (isset($_REQUEST['id'])) {
                                $paciente = new paciente();
                                $paciente->id = $_REQUEST['id'];
                                $resultado = $paciente->borrar();
                                header('Location: ../../php/vista/paciente/');
                        }
                        break;
                case 3: //consultar por nss
                        if (isset($_REQUEST['nss'])) {
                                $paciente = new paciente();
                                $paciente->nss = $_REQUEST['nss'];
                                $resultado = $paciente->consultar_por_nss();
                                $resultado = $resultado[0];
                                echo "hola" . $resultado->nombre;
                                header('Location: ../../php/vista/paciente/index.php?id=' . $resultado->id_paciente . '&nss=' . $resultado->nss . '&nombre=' . $resultado->nombre . '&ape_pat=' . $resultado->apellido_pat . '&ape_mat=' . $resultado->apellido_mat . '&fecha=' . $resultado->fecha_nacimiento . '&opcion=5');
                        }
                        break;
                case 4: //consultar por id
                        if (isset($_REQUEST['id'])) {
                                $paciente = new paciente();
                                $paciente->id = $_REQUEST['id'];
                                $resultado = $paciente->consultar_por_id();
                                $resultado = $resultado[0];
                                echo "hola" . $resultado->nombre;
                                header('Location: ../../php/vista/paciente/index.php?id=' . $resultado->id_paciente . '&nss=' . $resultado->nss . '&nombre=' . $resultado->nombre . '&ape_pat=' . $resultado->apellido_pat . '&ape_mat=' . $resultado->apellido_mat . '&fecha=' . $resultado->fecha_nacimiento . '&opcion=5');
                        }
                        break;
                case 5: //actualizar
                        if (
                                isset($_REQUEST['id']) and isset($_REQUEST['nss']) and isset($_REQUEST['nombre']) and isset($_REQUEST['apellidoPat'])
                                and isset($_REQUEST['apellidoMat']) and isset($_REQUEST['fecha'])
                        ) {
                                $paciente = new paciente();
                                $paciente->id = $_REQUEST['id'];
                                $paciente->nss = $_REQUEST['nss'];
                                $paciente->apellidoP = $_REQUEST['apellidoPat'];
                                $paciente->apellidoM = $_REQUEST['apellidoMat'];
                                $paciente->nombre = $_REQUEST['nombre'];
                                $paciente->fecha = $_REQUEST['fecha'];
                                $resultado = $paciente->actualizar();
                                header('Location: ../../php/vista/paciente/index.php?id=' . $_REQUEST['id'] . '&nss=' . $_REQUEST['nss'] . '&nombre=' . $_REQUEST['nombre'] . '&ape_pat=' . $_REQUEST['apellidoPat'] . '&ape_mat=' . $_REQUEST['apellidoMat'] . '&fecha=' . $_REQUEST['fecha'] . '&opcion=5');
                        }

                        break;
                default:
                        header('Location: ../../php/vista/paciente/index.php?opcion=1');
                        break;
        }
}
