<?php
include("dbconnect.php");
include("header.php");
include("function_royen.php");

$tgl_awal = date("Y-m-d");
$tgl_akhir = date("Y-m-d");

$prevN = mktime(0, 0, 0, date("m"), date("d") - 1, date("Y"));
$tgl_awal=date("Y-m-d", $prevN);



$halaman=$_GET["halaman"];

$id_menu=2;
$id_menuku = $usernamesaya."|".$id_menu;
//echo "id : ".$id_menuku;
$nilai_menu= get_menu_scr($id_menuku);
//echo "nilai menu ";$nilai_menu;

$nilai_menu_ronron = explode('|',$nilai_menu);
$status_insert = $nilai_menu_ronron[0];
$status_edit   = $nilai_menu_ronron[1];
$status_delete = $nilai_menu_ronron[2];
$status_read = $nilai_menu_ronron[3];
$menu_status = $nilai_menu_ronron[4];
//echo "<br> nilai : ".$nilai_menu_ronron[0];





	/*
	$id_menu = $_GET["id_menu"];
cek_menu($username_ronron_m,$id_menu);
*/
?>

<html>
<head>


<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
table.imagetable {
        font-family: verdana,arial,sans-serif;
        font-size:11px;
        color:#333333;
        border-width: 1px;
        border-color: #999999;
        border-collapse: collapse;
}
table.imagetable th {
        background:#b5cfd2 url('cell-blue.jpg');
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #999999;
}
table.imagetable td {
        background:#dcddc0 url('cell-grey.jpg');
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #999999;
}
</style>


<script src="jscss/datetimepicker.js" type="text/javascript"></script>
      <link rel='stylesheet' type='text/css' media='all' href='jscss/calendar-system.css' title='system' />
	  <script type='text/javascript' src='jscss/calendar.js'></script>
	  <script type='text/javascript' src='jscss/calendar-id.js'></script>
	  <script type='text/javascript' src='jscss/calendar-setup.js'></script>
	  <script type="text/javascript" src="select_role.js"></script>
	  <script type="text/javascript" src="selectotal.js"></script>
	  
<title>..: dashboard.yogya.com :..</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<link rel="stylesheet" type="text/css" href="jscss/devbook.css">
</title>


<SCRIPT LANGUAGE="JavaScript">
function select(a) {
    var theForm = document.myForm;
    for (i=0; i<theForm.elements.length; i++) {
        if (theForm.elements[i].name=='chkinfo[]')
            theForm.elements[i].checked = a;
    }
}
</script>
	
</head>


<table width="90%" border="0" align=center valign="top" cellspacing=0 cellpadding=0  class=garis_lurus>
    <tr valign="top">
	

    <td width="85%" valign=top>
	<table width="100%"  class="table_left" border=0>
	<tr>
	  <td colspan=10>&nbsp;<img src="images/dashboard2.jpg" width="25" height="23" align="absmiddle"/>
	<span class="judul_menu_black"><strong>AMBIL SALES CABANG</strong></span></td>
	
	</tr>
	<tr><td colspan=10>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	
	
	<tr>
	<td width=2%>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>&nbsp;
	
	</td>
	</tr>
	
	
	<tr>
	<td width=2%>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	
	<table width=80%  class="imagetable">
 
	
	
<?php
$tanggalan         = date("Y-m-d");


echo "<form name='myForm' method=get action='ds_sales_get_proses_yomart.php'>";	

   If  (($status_insert==1) )

//if ($_SESSION['role_ronron_rm'] == 0)
{

	
	echo "<tr> <td colspan=15 align=left width=40% valign=bottom>
	<table border=0 bgcolor=#F3F3F3 class=table3 width=100% align=left>
	<tr><td colspan=5>&nbsp;</td><tr>
	<input type=hidden name=posting_true value='ok'>";
	
				echo "<tr><td align=left width=30%><font style='font-family:verdana, Arial;color:#085855;font-size:15px;'>TANGGAL PROSES </td><td><font class=main_form>: &nbsp;<font class=main_form>
				<input  style='background-color:white; border: solid 1px #6E6E6E;
                                         height: 25px; font-size:13px; vertical-align:1px;color:#cc450a'   type=text size=15 class=FormDisabled name='tgl_awal'  id=tgl_awal readonly value=$tgl_awal ><button type=reset id=btn_tgl_awal class=buttonku><img src=jscss/cal.gif align=absmiddle width=20 height=20 border=0></button></td></tr>";
			    echo '<script type="text/javascript">
			Calendar.setup({
				inputField     :    "tgl_awal",           
				ifFormat       :    "%Y-%m-%d",
				button         :    "btn_tgl_awal",        
				step           :    1
			});
			</script>';
			
			
  echo "<tr><td align=left width=30%><font style='font-family:verdana, Arial;color:#085855;font-size:15px;'>CABANG </td><td><font class=main_form>: &nbsp;<font class=main_form>";

  echo "<select name=sitecode>";
  $cekbr=pg_query("select * from branch where status_branch='M' and mikrotik='Y'  order by site_code");
  while ($rsbr=pg_fetch_array($cekbr))
   {
            echo "<option value=".$rsbr[site_code].">".$rsbr[site_code]." ".$rsbr[kode_branch] ." ".$rsbr[nama_branch]." ( ".$rsbr[ip_branch]." )</option>";
   }

echo "</select>";
	
			
	echo "<tr><td colspan=5>&nbsp;</td></tr>";	

	echo '<tr><td align=left colspan=5>
	<input name="submit" type="submit" id="submit" value=" PROSES!! " class=tombol >
	</td><tr></table>
	</td>
	';
				
				

}

else
{

echo "<table> ";
echo "<tr><td>&nbsp;</td></tr>";
echo "<tr><td> Maaf, Proses hanya digunakan oleh Role Admin !! </td></tr>";
echo "<tr><td>&nbsp;</td></tr>";


}
	
	?>

</table>
	</form>
	</td>
	</tr>
	
	</table>
	</td>
	
    <td width="15%" valign=top>
	<table width="100%"  class="table2" >
	<tr>
	<td align="right" bgcolor="#f7862b">
		<?php
		include("menu_kananku.php");
		?>
	</td>
	</tr>
	</table>
	
	
	</td>
  </tr>
</table>
</body>
</html>




<?php
	include("footer.php");
?>
