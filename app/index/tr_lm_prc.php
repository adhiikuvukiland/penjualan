<?php
session_start();
if (empty($_SESSION['username'])){
	echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../../index.html'</script>";
	session_destroy();
} else {
	include "../../inc/inc_conn.php";
	$class3="<li class=active>";
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
        <b>REPORT TRANSACTION LIST MEDIA</b></h1>
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
						<div class='text-right'>
							<a href="rp_excl_lm.php?tgl_awal=<?php echo $_POST['tgl_awal'];?>&tgl_akhir=<?php echo $_POST['tgl_akhir']; ?>&kode_site=<?php echo $_POST['site_code']; ?>" class="btn btn-sm btn-excel-pdf">Export To Excel &nbsp;<img src="../../asset/dist/img/excel.ico" width="28px"></i></a>
						</div>
						<div>
							<div class="box box-info">
									<div class="box-body">
										<table id="example1" class="table table-bordered table-striped table-hover list display">
											<thead>
												<tr>
													<th>No.</th>
													<th>Site</th>
													<th>Cabang</th>
													<th>Time</th>
													<th>Date</th>
													<th>POS</th>
													<th>TX</th>
													<th>Cshr Number</th>
													<th>Pay Code</th>
													<th>Amount</th>
													<th>Yogya Vc</th>
													<th>Sup Vc</th>
													<!--<th>Date</th>-->
												</tr>
											</thead>
											<tbody>
												<?php
												$i = 1;
												$kondisi="";
													if($kode!='ALL'){
														$kondisi="AND m.site_code='$kode'";
													}$q_sum="SELECT * FROM yoel_transaction_lsmedia m left JOIN branch b on m.site_code=b.site_code WHERE m.tanggal>='$tanggal_postgres' AND m.tanggal <='$tanggal_postgres2' $kondisi";
													//$q_sum="SELECT m.site_code,m.leasing_time,m.termnmbr,m.transnmbr,m.cshrnmbr,m.kodpay,m.cash,m.yogyavc,m.supvc,m.tanggal,m.leasing_date,b.kode_branch,b.nama_branch FROM yoel_transaction_lsmedia m, branch b WHERE m.site_code=b.site_code AND m.tanggal>='$tanggal_postgres' AND m.tanggal <='$tanggal_postgres2' $kondisi";
													   //echo $q_sum;
													    $rs_sum=pg_query($q_sum);
													   while ($sw_sum=pg_fetch_array($rs_sum)){
													   $tglku = $sw_sum['leasing_date'];
													   $tgllsg=substr($tglku,8,2)."/".substr($tglku,5,2)."/".substr($tglku,0,4);
													   $tglku2= $sw_sum['tanggal'];
													   $tgllsg2=substr($tglku2,8,2)."/".substr($tglku2,5,2)."/".substr($tglku2,0,4);
													   $cashku = intval($sw_sum['cash']);
													   $cash = number_format($cashku,0,",",".");//($r[harga],0,",",".")
													   $pos = $sw_sum['termnmbr'];
													   $vcku = intval($sw_sum['yogyavc']);
													   $vc = number_format($vcku,0,",",".");
													   $svcku = intval($sw_sum['supvc']);
													   $svc = number_format($svcku);
												?>
												<tr>
													<td><?php echo $i?></td>
													<td><?php echo $sw_sum['site_code']; ?></td>
													<td><?php echo $sw_sum['kode_branch']."/".$sw_sum['nama_branch'];?></td>
													<td><?php echo $sw_sum['leasing_time']; ?></td>
													<td><?php echo $tgllsg; ?></td>
													<td align="right"><?php echo $pos.",-";?></td>
													<td><?php echo $sw_sum['transnmbr'];?></td>
													<td><?php echo $sw_sum['cshrnmbr'];?></td>
													<td><?php echo $sw_sum['kodpay'];?></td>
													<td align="right"><?php echo "Rp ". $cash.",-";?></td>
													<td align="right"><?php echo "Rp ".$vc.",-";?></td>
													<td><?php echo $sw_sum['supvc'];?></td>
													<?php  ?>
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