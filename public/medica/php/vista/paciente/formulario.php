<section class="seccion">
    <form action="../../controlador/paciente_controlador.php" id="forma" method="post" onsubmit="return validar(event);">
        <table>
            <tr>
                <th colspan=" 2">
                    <h2>Registro de Paciente </h2>
                    <br>
                </th>
            </tr>
            <tr>
                <input type="hidden" name="id" id="id" <?php if (isset($_REQUEST['id'])) { ?> value="<?php echo $_REQUEST['id']; ?>" <?php } else { ?> value="" <?php } ?> />
                <td><label for="nss">NSS</label></td>
                <td><input name="nss" id="nss" type="text" onfocus="entroEnFoco(this)" onblur="salioDeFoco(this); revisarObligatorio(this); revisarLongitud(this, 10);" <?php if (isset($_REQUEST['nss'])) { ?> value="<?php echo $_REQUEST['nss']; ?>" <?php }  ?> /></td>
            </tr>
            <tr>
                <td><label for="nombre">Nombre</label></td>
                <td><input name="nombre" id="nombre" type="text" onfocus="entroEnFoco(this)" onblur="salioDeFoco(this); revisarObligatorio(this); revisarLongitud(this, 4);" <?php if (isset($_REQUEST['nombre'])) { ?> value="<?php echo $_REQUEST['nombre']; ?>" <?php }  ?> /></td>
            </tr>
            <tr>
                <td><label for="apellidoPat">Apellido Paterno</label></td>
                <td><input name="apellidoPat" id="apellidoPat" type="text" onfocus="entroEnFoco(this)" onblur="salioDeFoco(this); revisarObligatorio(this); revisarLongitud(this, 4);" <?php if (isset($_REQUEST['ape_pat'])) { ?> value="<?php echo $_REQUEST['ape_pat']; ?>" <?php }  ?> /></td>
            </tr>
            <tr>
                <td><label for="apellidoMat">Apellido Materno</label></td>
                <td><input name="apellidoMat" id="apellidoMat" type="text" onfocus="entroEnFoco(this)" onblur="salioDeFoco(this); revisarObligatorio(this); revisarLongitud(this, 4);" <?php if (isset($_REQUEST['ape_mat'])) { ?> value="<?php echo $_REQUEST['ape_mat']; ?>" <?php }  ?> /></td>
            </tr>
            <tr>
                <td><label for="fecha">Fecha</label></td>
                <td><input name="fecha" id="fecha" type="date" onfocus="entroEnFoco(this)" onblur="salioDeFoco(this); revisarObligatorio(this);" />
                    <script>
                        document.getElementById("fecha").value = '<?php echo  $_REQUEST['fecha']; ?>';
                    </script>
                </td>
            </tr>
        </table>
        <input type="hidden" name="opcion" id="opcion" <?php if (isset($_REQUEST['opcion'])) { ?> value=" <?php echo $_REQUEST['opcion']; ?>" <?php } else { ?> value="1" <?php } ?> />
        <button id="carPac" name="carPac" type="submit" onclick="cargar();">Buscar por NSS</button>
        <button id="regPac" name="regPac" type="submit" >Guardar</button>
        <button type="submit" onclick="limpiar();">Limpiar</button>
    </form>
</section>
<aside class="columna">
    <blockquote>

    </blockquote>

    <div id="mensaje">
        <h1><?php if (isset($_REQUEST['nss'])) {
                if ($_REQUEST['nss'] == '') {
                    echo "No existe el registro";
                }
            } ?> </h1>
    </div>
</aside>