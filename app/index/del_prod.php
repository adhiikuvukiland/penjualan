<html>
	<head>
  <link rel="stylesheet" href="../../asset/sweetalert/sweetalert.css">
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <script src="../../asset/sweetalert/sweetalert.js"></script>
  </head>
<body>

<?php
include "../../inc/inc_conn.php";
include"../../inc/inc_function.php";

$id 	= $_GET['id'];

$query = mysql_query("DELETE FROM barang WHERE id='$id'");
if ($query){
	echo "<script>konfirmasihapus();</script>";	
} else {
	echo "<script>gagalhapus();</script>";	
}
?>
</body>

</html>