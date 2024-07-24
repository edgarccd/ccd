<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/hospital.css">
    <title>Inicio</title>
</head>

<body>
    <div class="agrupar">
        <header class="cabecera">
            <h1> Hospital General </h1>
        </header>

        <?php
        include('menu_exterior.php');
        ?>
<div id="login">
        <div id="formaLogin">

            <h1> Bienvenido </h1>
            <form action="./inicio.php" method="post" enctype="application/x-www-form-urlencoded">
                <table>
                    <tr>
                        <td><label for="usr">Usuario: </label></td>
                        <td><input type="text" id="usr" name="usr" onfocus="entroEnFoco(this)" onblur="salioDeFoco(this); revisarObligatorio(this);" /></td>
                    </tr>
                    <tr>
                        <td><label for="pwd">Contraseña: </label></td>
                        <td><input type="password" id="pwd" name="pwd" onfocus="entroEnFoco(this)" onblur="salioDeFoco(this); revisarLongitud(this, 8);" /></td>
                    </tr>
                    <tr><td colspan="2"><br> <input type="submit" value="Ingresar" /></td></tr>
                    <tr><td colspan="2"><br><?php
                error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
                if ($_GET["error"] == "si") {
                    echo "<span style=\"color:#F00; \">VERIFICA TUS DATOS</span>";
                }
                ?></td></tr>
                </table>


            </form>
        </div>
        </div>
        <footer id="pie" class="pie">Desarrollo de Aplicaciones Web - Sep Dic 2023</footer>
    </div>
</body>

</html>
