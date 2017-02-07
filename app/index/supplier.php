<?php
//session_start();
//if (empty($_SESSION['username'])){
	//echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../../index.html'</script>";	
//} else {

	include "../../inc/inc_conn.php";
	$class4="<li class=active>";
    include "../../inc/header.php";
	include"../../inc/inc_function.php";
//}
?>	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        SUPPLIER
        <small> Toko ABC</small>
      </h1>
      <ol class="breadcrumb">
        <li> <?php include('../../inc/currentdate.php'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php include('../../inc/clock_lcd.php'); ?></li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div>
          <div class="box box-info">
            <div class="box-body">
			 <div class='text-right'>
				<!-- Button trigger modal -->
					<button type="button" class="btn btn-sm bg-maroon" data-toggle="modal" data-target="#myModal"><i class='fa fa-arrow-circle-right'></i>Tambah Supplier</button>
				<!--<a href='add_regional.php' data-toggle="modal" data-target="#myModal" class="btn btn-sm bg-maroon">Tambah Produk<i class='fa fa-arrow-circle-right'></a></i>--></div>
              <?php $tampil=mysql_query("select * from supplier"); ?>
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Supplier</th>
				  <th>Alamat</th>
				  <th>Kontak Supplier</th>
				  <th>Kontak Pribadi</th>
				  <th>Note</th>
				  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
				  $no = 1;
				  while($data=mysql_fetch_array($tampil))
                    { ?>
                    <tr>
					  <?php $data['s_id'];?>
					<td><?php echo $no++ ?></td>
                    <td><?php echo $data['s_nama']; ?></td>
                    <td><?php echo $data['s_alamat']; ?></td>
					<td><?php echo $data['s_kontak']; ?></td>
					<td><?php echo $data['s_cp']; ?></td>
					<td><?php echo $data['note']; ?></td>
                  <?php
					  echo'<td><a class="btn btn-xs btn-success" href="dtl_prod.php?hal=detail&kd='.$data['s_id'].'"><i class="fa fa-user"></i> Detail</a> <a class="btn btn-xs btn-primary" href="update_prod.php?hal=edit&kd='.$data['id'].'"><i class="fa fa-edit"></i> Edit</a>'; ?>
				  <?php
					  echo"<a class='btn btn-xs btn-danger' onclick='deleteFile(\"".$data['s_id']."\");' ><i class='fa fa-eraser'></i> Hapus</a></td></tr>";
					  echo"</tr>";
					  }
				  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Tambah Supplier</b></h4>
      </div>
	  <div class="box box-info">
		<div class="modal-body">
		  <form id="exampleFullForm" autocomplete="off" action="#" method="POST">
            <div class="row row-lg">
              <div class="col-lg-12 form-horizontal">
                <!--<div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Merk</label>
                  <div class="col-lg-12 col-sm-9">
                    <select class="form-control" id="merk" name="merk" required="">
                      <option value="">Pilih Merk</option>
                      <?php
					//    $tampil=mysql_query("SELECT * FROM merk ORDER BY merk asc");
					//  	  while($data=mysql_fetch_array($tampil))
					//	{
					//    echo "<option value='$data[merk]'> $data[merk] </option>";
					//    }
					  ?>
                    <!--</select>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Jenis Barang</label>
                  <div class="col-lg-12 col-sm-9">
                    <select class="form-control" id="jenis" name="jenis" required="">
                      <option value="">Pilih Jenis</option>-->
                      <?php
					  //  $tampil=mysql_query("SELECT * FROM jenis ORDER BY jenis asc");
					  //	  while($data=mysql_fetch_array($tampil)) {
					  //  echo "<option value='$data[jenis]'> $data[jenis] </option>";
					  //  }
					  ?>
                    <!--</select>
                  </div>
                </div>-->
				<div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Nama Supplier
                    <span class="required"></span>
                  </label>
                  <div class=" col-lg-12 col-sm-9">
                    <input type="text" class="form-control" name="s_nama" id="s_nama" placeholder="PT. BALA BALA BAHAGIA"
                    required="">
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Alamat
                    <span class="required"></span>
                  </label>
                  <div class=" col-lg-12 col-sm-9">
                    <input type="text" class="form-control" name="s_alamat" id="s_alamat" placeholder="Alamat Perusahaan"
                    required="">
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Kontak Supplier
                    <span class="required"></span>
                  </label>
                  <div class=" col-lg-12 col-sm-9">
                    <input type="text" class="form-control" name="s_kontak" id="s_kontak" placeholder="081xxxxxxx"
                    required="">
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Note
                    <span class="required"></span>
                  </label>
                  <div class=" col-lg-12 col-sm-9">
                    <input type="text" class="form-control" name="note" placeholder="Keterangan Tambahan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Tanggal Bergabung
                    <span class="required"></span>
                  </label>
                  <div class="col-lg-12 col-sm-9">
                    <input type="text" class="form-control" name="tanggal" id="tanggal"
                    required="" />
                  </div>
                </div>
              </div>
			</div>
		 <div class="modal-footer">
		  <button type="submit" class="btn btn-success" id="validateButton1">Simpan</button>
		  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
		</div>
	  </div>
    </div>
  </div>
	</div>
</div>
<?php
include"../../inc/footer.php";
?>