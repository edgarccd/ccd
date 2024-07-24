<?php
    unset($_SESSION['usuario']);
    unset($_SESSION['contrasena']);
    session_write_close();
    header("Location: https://ccd.utj.edu.mx/proyecto/ejemplo");

?>
