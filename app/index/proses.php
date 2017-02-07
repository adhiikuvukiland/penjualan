<?php
include "../../inc/inc_conn.php";

$merk = $_POST['merk'];
$jenis = $_POST['jenis'];
$tipe     = $_POST['tipe'];
$supplier = $_POST['supplier'];
$modal = $_POST['modal'];
$jual = $_POST['jual'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];
//alert('".$nama." Berhasil ditambah!');
    $aaa="INSERT INTO m_barang (merk,jenis,tipe,supplier,modal,jual,jumlah,tanggal) VALUES('$merk','$jenis','$tipe','$supplier','$modal','$jual','$jumlah','$tanggal')";
    $qry=mysql_query($aaa);    
        echo " <script language='javascript'>              
                document.location='master_brg.php';
    </script>";
?>
