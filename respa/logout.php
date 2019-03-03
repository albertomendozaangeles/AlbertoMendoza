<?php
session_start();
unset($_SESSION["nome"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
header("Location: home.php");

if (!isset($_SESSION['userSession'])) {
	header("Location: /inventario/index.php");
} else if (isset($_SESSION['userSession'])!="") {
	header("Location: home.php");
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['userSession']);
	header("Location: /inventario/index.php");
}