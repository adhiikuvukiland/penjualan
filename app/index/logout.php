<?php
session_start();
include("../../inc/inc_conn.php");
unset($_SESSION['username']);
session_destroy();
header("Location:../../index.html");
?>