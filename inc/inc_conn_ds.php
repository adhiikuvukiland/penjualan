<?php
$db_server ="localhost";
$port= '5432';
$db_user="dashboard";
$db_pwd="dashboardteam";
$db_name="dashboard";

$koneksi=pg_connect("host=localhost port=5432 dbname=$db_name user=$db_user password=$db_pwd");

if (!($koneksi))
{
    die("Database Tidak Dapat Di Akses!!.");
}
else
{
   // echo "berhasil !!";
}
?>