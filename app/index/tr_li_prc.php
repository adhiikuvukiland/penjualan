<?php
session_start();
if (empty($_SESSION['username'])){
	echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../../index.html'</script>";
	session_destroy();
} else {
	include "../../inc/inc_conn.php";
	$class2="<li class=active>";
  include "../../inc/header.php";
}
$tanggal_awal = $_POST['tgl_awal'];
               $tanggal=substr($tanggal_awal,0,4).substr($tanggal_awal,5,2)."".substr($tanggal_awal,8,2);
               $tanggal_postgres=substr($tanggal_awal,0,4)."-".substr($tanggal_awal,5,2)."-".substr($tanggal_awal,8,2);
							 $tanggal_indo=substr($tanggal_awal,8,2)."/".substr($tanggal_awal,5,2)."/".substr($tanggal_awal,0,4);
							 
$tanggal_akhir = $_POST['tgl_akhir'];
               $tanggal_postgres2=substr($tanggal_akhir,0,4)."-".substr($tanggal_akhir,5,2)."-".substr($tanggal_akhir,8,2);
							 $tanggal_indo2=substr($tanggal_akhir,8,2)."/".substr($tanggal_akhir,5,2)."/".substr($tanggal_akhir,0,4);
							 ?>
	<?php
		$kode = $_POST['site_code'];
?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<section class="content-header">
				<h1> 
        <b>REPORT TRANSACTION LIST ITEM</b></h1>
				<small></small>
				</h1>
				<ol class="breadcrumb">
					<h5><b>&nbsp;&nbsp; <?php echo "RESULT DATE: $tanggal_indo - $tanggal_indo2 <br>&nbsp&nbsp SITE: $kode </b></h5>"; ?>
				</ol>
				<br>
				<table width="900">
					<tr>
						<td width="250">
							<div class="Tanggal">
								<h8>
									<script language="JavaScript">
										document.write(tanggallengkap);
									</script>
							</div>
							</h8>
						</td>
						<td align="left" width="30"> - </td>
						<td align="left" width="620">
							<h8>
								<div id="output" class="jam"></div>
							</h8>
						</td>
					</tr>
				</table>
			</section>

			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div>
							<div class='text-right'>
								<a href="rp_excl_li.php?tgl_awal=<?php echo $_POST['tgl_awal'];?>&tgl_akhir=<?php echo $_POST['tgl_akhir']; ?>&kode_site=<?php echo $_POST['site_code']; ?>" class="btn btn-sm btn-excel-pdf">Export To Excel &nbsp;<img src="../../asset/dist/img/excel.ico" width="28px"></i></a>
							</div>
							<div class="box box-info">
									<div class="box-body">
										<table id="example1" class="table table-bordered table-striped table-hover list display">
											<thead>
												<tr>
													<th>NO.</th>
													<th>SITE</th>
													<th>CABANG</th>
													<th>DATE</th>
													<th>TX</th>
													<th>SP</th>
													<th>TC</th>
													<th>SV</th>
													<th>DESCRIPTION</th>
													<th>PRICE</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$i= 1;
												$kondisi="";
													if($kode!='ALL'){
														$kondisi="AND l.site_code='$kode'";
													}//$q_sum="SELECT * FROM yoel_transaction_listitem WHERE tanggal>='$tanggal_postgres' AND tanggal <='$tanggal_postgres2' $kondisi";
													$q_sum="SELECT l.site_code,l.leasing_date,l.trans,l.slsp,l.tillcode,l.sv,l.description,l.price,b.kode_branch,b.nama_branch FROM yoel_transaction_listitem l, branch b WHERE l.site_code=b.site_code AND l.tanggal>='$tanggal_postgres' AND l.tanggal <='$tanggal_postgres2' $kondisi";
													   //echo $q_sum;
													   $rs_sum=pg_query($q_sum);
													   while ($sw_sum=pg_fetch_array($rs_sum)){
													   $tglku = $sw_sum['leasing_date'];
													   $tgllsg=substr($tglku,8,2)."/".substr($tglku,5,2)."/".substr($tglku,0,4);
													   $priceku = intval($sw_sum['price']);
													   $price = number_format($priceku,0,",",".");
													   $tcku = intval($sw_sum['tillcode']);
													   $tc = number_format($tcku,0,",",".");
													   ?>
												<tr>
													<td><?php echo $i?></td>
													<td><?php echo $sw_sum['site_code']; ?></td>
													<td><?php echo $sw_sum['kode_branch']."/".$sw_sum['nama_branch'];?></td>
													<td><?php echo $tgllsg; ?></td>
													<td><?php echo $sw_sum['trans']; ?></td>
													<td><?php echo $sw_sum['slsp'];?></td>
													<td align="right"><?php echo $sw_sum['tillcode'];?></td>
													<td><?php echo $sw_sum['sv'];?></td>
													<td><?php echo $sw_sum['description'];?></td>
													<td align="right"><?php echo "Rp ". $price.",-";?></td>
													<?php $i++; } ?>	
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
<?php
include"../../inc/footer.php";
?>