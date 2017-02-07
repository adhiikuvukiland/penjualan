<?php
//$db_server ="localhost";
//$port= '5432';
//$db_user="nyoman";
//$db_pwd="12345";
//$db_name="dashboard";
//
//$koneksi=pg_connect("host=localhost port=5432 dbname=$db_name user=$db_user password=$db_pwd");
//
//if (!($koneksi))
//{
//    die("Database Tidak Dapat Di Akses!!.");
//}
//else
//{
//   // echo "berhasil !!";
//}
//?>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
mysql_connect("localhost","root","12345");
mysql_select_db("tokoabc");
?>