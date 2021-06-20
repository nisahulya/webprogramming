<?php
require_once("../connect.php");

unset($_SESSION["User"]);
session_destroy();

header("Location:home.php");
exit();
?>