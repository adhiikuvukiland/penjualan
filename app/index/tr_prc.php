<?php
//session_start();
//if (empty($_SESSION['username'])){
//	echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../../index.html'</script>";
//	session_destroy();
//} else {
//	include "../../inc/inc_conn.php";
//	$class1="<li class=active>";
  include "../../inc/header.php";
//}
							 ?>
	<?php
		$kode = $_POST['site_code'];
?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<section class="content-header">
				<h1> 
        <b>REPORT TRANSACTION</b></h1>
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
								</h8>
							</div>
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
								<a href="rp_excl_tr.php?tgl_awal=<?php echo $_POST['tgl_awal'];?>&tgl_akhir=<?php echo $_POST['tgl_akhir']; ?>&kode_site=<?php echo $_POST['site_code']; ?>" class="btn btn-sm btn-excel-pdf">Export To Excel &nbsp;<img src="../../asset/dist/img/excel.ico" width="28px"></i></a>
							</div>
						<div>
							<div class="box box-info">
									<div class="box-body">
										<table id="example1" class="table table-bordered table-striped table-hover list display">
											<thead>
												<tr>
													<th>NO</th>
													<th>Site</th>
													<th>Cabang</th>
													<th>PAY CODE</th>
													<th>Date</th>
													<th>Time</th>
													<th>POS</th>
													<th>TX</th>
													<th>AMOUNT</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$i = 1;
												$kondisi="";
													if($kode!='ALL'){
														$kondisi="AND t.site_code='$kode'";
													}
													$q_sum="SELECT * FROM yoel_transaction t left JOIN branch b on t.site_code=b.site_code WHERE t.tanggal>='$tanggal_postgres' AND t.tanggal <='$tanggal_postgres2' $kondisi";
													   //echo $q_sum;
													   $rs_sum=pg_query($q_sum);
													   while ($sw_sum=pg_fetch_array($rs_sum)){
														$pos = $sw_sum['leasing_termnmbr'];
														$amountku = intval($sw_sum['leasing_amnt']);
													    $amount = number_format($amountku,0,",",".");//($r[harga],0,",",".")
												?>
												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $sw_sum['site_code']; ?></td>
													<td><?php echo $sw_sum['kode_branch']."/".$sw_sum['nama_branch'];?></td>
													<td><?php echo $sw_sum['leasing']; ?></td>
													<td><?php echo $sw_sum['leasing_date']; ?></td>
													<td><?php echo $sw_sum['leasing_time'];?></td>
													<td align="right"><?php echo $pos.",-";?></td>
													<td><?php echo $sw_sum['leasing_transnmbr'];?></td>
													<td align="right"><?php echo "Rp ". $amount.",-";?></td>
													<?php
														$i++;
															} ?>	
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