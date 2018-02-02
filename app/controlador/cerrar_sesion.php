<?php


session_start();

session_destroy();

/* liberar las variables de sesión registradas*/

unset($_SESSION['id']);
unset($_SESSION['email']);
unset($_SESSION['nombre']);
unset($_SESSION['apellido']);
unset($_SESSION['id_perfil']);
unset($_SESSION['estatus_dato']);


session_unset();

//Redireccionamiento
echo "<script>document.location.href='../../';</script>";

