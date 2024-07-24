<section class="seccion">
    <div id="registros">
        <?php
        $res = $paciente->consultar_todos();
        ?>
        <table>
            <tr>
                <th>ID</th>
                <th>NSS</th>
                <th>Nombre</th>
                <th>Apellido Pat</th>
                <th>Apellido Mat</th>
                <th>Fecha</th>
                <th></th>
                <th></th>
            </tr>
            <?php
            foreach ($res as $pc) {
            ?>
                <tr>
                    <td><?php echo $pc->id_paciente ?></td>
                    <td><?php echo $pc->nss ?></td>
                    <td><?php echo $pc->nombre ?></td>
                    <td><?php echo $pc->apellido_pat ?></td>
                    <td><?php echo $pc->apellido_mat ?></td>
                    <td><?php echo $pc->fecha_nacimiento ?></td>
                    <td><a href="../../controlador/paciente_controlador.php?id=<?php echo $pc->id_paciente ?>&opcion=4&&cargado=1">Cargar</a></td>
                    <td><a href="../../controlador/paciente_controlador.php?id=<?php echo $pc->id_paciente ?>&opcion=2">Borrar</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

</section>