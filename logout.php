<?php
session_start();
unset($_SESSION['sesi']);
unset($_SESSION['idadmin']);
session_destroy();
header("Location:login.php");
?>