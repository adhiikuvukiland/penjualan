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
<!--tombol tambah -->
	<script src="../../asset/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
	<link href="../../asset/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
	
	<script src="../../asset/SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
	<link href="../../asset/SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />

	<div class="content-wrapper">
     <section class="content-header">
      <h1>
        <b>Data Barang</b>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li> <?php include('../../inc/currentdate.php'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php include('../../inc/clock_lcd.php'); ?></li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div>
          <div class="box box-info"><br>
            <div class="box-body">
							<?php
							$qry="SELECT site_code FROM branch ORDER BY site_code ASC";
							$data2=pg_query($qry);
							?>
							<form action="tr_prc.php" method="POST">
							<p>
							<div class=col-xs-2>
									<label for="tgl_awal">START DATE: </label>
								</div>
								<div class=col-xs-3>
										<input name='tgl_awal' type='text' class='form-control' id='tgl_awal' <?php echo" value=".$tgl_awal." "; ?> ><button type=reset id=btn_tgl_awal><img src=../../asset/dist/calendar/cal2.gif align=absmiddle width=20 height=20 border=0></button>
								</div>
							</p>
							<div class=col-xs-1></div>
							<p>
								<div class=col-xs-2>
									<label for="tgl_awal">END DATE: </label>
								</div>
								<div class=col-xs-3>
										<input name='tgl_akhir' type='text' class='form-control' id='tgl_akhir' <?php echo" value=".$tgl_akhir." "; ?> ><button type=reset id=btn_tgl_akhir><img src=../../asset/dist/calendar/cal2.gif align=absmiddle width=20 height=20 border=0></button>
								</div>
							</p>
							<p>
								<div class=col-xs-2>
									<label for=kode_site>SITE:</label>
								</div>
								<div class=col-xs-3>
										<span id="spryselect1">
											<select name="site_code" class="form-control">
												<option value='' readonly> Select Site </option>
												<option value='ALL'> ALL </option>
													<?php	while($hsl=pg_fetch_array($data2)) { 
													echo "<option value='$hsl[site_code]'> ".$hsl['site_code']."</option>";
													} ?>
											</select><center>
									<span class=selectRequiredMsg>Site Must Selected!</span></span>
								</div>
									</center>
							</p>
								<div class=col-xs-8><br>
									<button type="submit" class="btn btn-info pull-left">PROCESS</button>
								</div>
              </form>
            </div>              
          </div>
          </div>
        </div>
      </div>
    </section>
  </div>
				<script>
			var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
			var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
			var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
				</script>
				<script>
				Calendar.setup({
				inputField     :    "tgl_awal",           
				ifFormat       :    "%Y-%m-%d",
				button         :    "btn_tgl_awal",        
				step           :    1
			});
			</script>
				<script>
				Calendar.setup({
				inputField     :    "tgl_akhir",           
				ifFormat       :    "%Y-%m-%d",
				button         :    "btn_tgl_akhir",        
				step           :    1
			});
			</script>
<?php
include"../../inc/footer.php";
?>
</html>
