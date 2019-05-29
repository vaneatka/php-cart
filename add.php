<?php
// start session
session_start();

// scriem in session
$pid = $_GET["pid"];
$_SESSION["cart"][]=$pid;
// redirect on main
header("location: index.php");

?>
