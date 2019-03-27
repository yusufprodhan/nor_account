<?php
session_start();
session_destroy();

unset($_SESSION["userid"]);
unset($_SESSION["usertype"]);
header("location:index.php");
?>