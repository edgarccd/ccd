<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/hospital.css" type="text/css">
    <title>Hospital General</title>
</head>

<body>
    <?php
    $usuario = "Alumno";
    $contrasena = "12345678";
    if (isset($_POST["usr"]) && isset($_POST["pwd"])) {
        if ($usuario == $_POST["usr"] && $contrasena == $_POST["pwd"]) {
            session_start();
            $_SESSION['usuario'] = $_POST['usr'];
            $_SESSION['contrasena'] = $_POST['pwd'];
        } else {
            header("Location: ./login.php?error=si");
        }
    }
    ?>
    <div class="agrupar">
        <header class="cabecera">
            <h1> Hospital General </h1>
        </header>
        <?php
        include('menu_interior.php');
        ?>
        <div id="inicioAplicacion">
            <section>
                <article>
                    <?php echo "<br> Bienvenido " . $_SESSION['usuario'] . "<br>"; ?>
                </article>

                <article>

                </article>
            </section>
            <aside>
                <blockquote>

                </blockquote>

                <blockquote>

                </blockquote>
            </aside>
        </div>
        <footer id="pie" class="pie">Desarrollo de Aplicaciones Web Sep - Dic 2023</footer>

    </div>
</body>

</html>
