<?php
include 'assets/include/connectBDD.php';
session_destroy();
header("Location: index.php");
?>
