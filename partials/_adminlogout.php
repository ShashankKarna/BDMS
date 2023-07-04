<?php

session_start();


session_unset();
session_destroy();
header("location: /BDMS/adminlogin.php");

?>