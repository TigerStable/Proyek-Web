<?php
session_start();
$_SESSION["loggedin"] = true;
$_SESSION["username"] = "Google User";
header("Location: dashboard.php");
exit;
?>