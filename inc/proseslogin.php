<html>
	<head>
		<link rel="stylesheet" href="../sweetalert/sweetalert.css">
		<link rel="stylesheet" href="../asset/bootstrap/css/bootstrap.min.css">
		<script src="../sweetalert/sweetalert.js"></script>
		<script>
		function gagal() {
				swal({
						title: "Login failed, username and password you entered did not match.",
						text: "",
						type: "error",
						showCancelButton: false,
						confirmButtonClass: "btn-danger",
						confirmButtonText: "OK",
						closeOnConfirm: false
					},
					function() {
						window.location.href = '../index.html';
					});
			}
		</script>
    </head>
<body>
<?php
include "inc_conn.php";
$username 		= pg_escape_string($_POST['username']);
$password 		= pg_escape_string($_POST['password']);

$query 			= pg_query("SELECT * FROM yoel_user WHERE username='$username' AND password='$password'");
$data 			= pg_fetch_array($query);

if (pg_num_rows($query)>0){
		session_start();
		$_SESSION['username']					= $data['username'];
		$_SESSION['status']						= $data['status'];
		$level 									= $_SESSION['status'];
				switch ($level){
						case 0:
										echo"<script>document.location='../app/index/tr_li.php';</script>";
								break;
				}
						}	else {
										echo"<script>gagal()</script>";
				}	
?>
<style>
#loader {
		margin-top:300px;
}
</style>
</body>
</html>