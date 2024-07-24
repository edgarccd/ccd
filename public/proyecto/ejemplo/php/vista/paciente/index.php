<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/hospital.css" type="text/css">
    <script type="text/javascript" src="../../../js/hospital.js"></script>
    <title>Paciente</title>
</head>

<body>
    <div class="agrupar">
        <header class="cabecera">
            <h1> Hospital General </h1>
        </header>
        <?php
        include('../../menu_interior.php');

         session_start();
         if(isset($_SESSION['usuario'])&&isset($_SESSION['contrasena'])){
        require_once '../../modelo/paciente.php';
        $paciente = new paciente();

        echo "<br> Bienvenido " . $_SESSION['usuario'] . "<br>";
        include('formulario.php');
        include('datos.php');
         }else{
            header("Location: ../../login.php?error=si");
         }
        ?>
        <footer id="pie" class="pie">Desarrollo de Aplicaciones Web Sep - Dic 2023 </footer>
    </div>
</body>

</html>
