<?php
require_once("../connect.php");

unset($_SESSION["Staff"]);
session_destroy();

header("Location:home.php");
exit();
?>