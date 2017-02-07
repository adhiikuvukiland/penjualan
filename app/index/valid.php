<?php
include "../../inc/inc_conn.php";
	$class2="<li class=active>";
    include "../../inc/header.php";
	include"../../inc/inc_function.php";
?>
  <!-- Stylesheets -->
  <!--<link rel="stylesheet" href="../../global/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../global/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="../../assets/css/site.min.css">-->
  <!-- Plugins -->
  <!--<link rel="stylesheet" href="../../global/vendor/formvalidation/formValidation.css">
  <link rel="stylesheet" href="../../assets/examples/css/forms/validation.css">-->
  <!-- Fonts -->
  <!--<link rel="stylesheet" href="../../../global/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="../../global/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>-->
<body>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Produk
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
					<button type="button" class="btn btn-sm bg-maroon" data-toggle="modal" data-target="#myModal"><i class='fa fa-arrow-circle-right'></i>Tambah Produk</button>
				<!--<a href='add_regional.php' data-toggle="modal" data-target="#myModal" class="btn btn-sm bg-maroon">Tambah Produk<i class='fa fa-arrow-circle-right'></a></i>--></div>
              <?php $tampil=mysql_query("select * from m_brg"); ?>
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
				  <th>Jenis Barang</th>
				  <th>Harga Jual</th>
				  <th>Jumlah</th>
				  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
				  $no = 1;
				  while($data=mysql_fetch_array($tampil))
                    { ?>
                    <tr>
					  <?php $data['id'];?>
					<td><?php echo $no++ ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['jenis']; ?></td>
					<td><?php echo $data['harga']; ?></td>
					<td><?php echo $data['jumlah']; ?></td>
                  <?php
					  echo'<td><a class="btn btn-xs btn-success" href="dtl_prod.php?hal=detail&kd='.$data['id'].'"><i class="fa fa-user"></i> Detail</a> <a class="btn btn-xs btn-primary" href="update_prod.php?hal=edit&kd='.$data['id'].'"><i class="fa fa-edit"></i> Edit</a>'; ?>
				  <?php
					  echo"<a class='btn btn-xs btn-danger' onclick='deleteFile(\"".$data['id']."\");' ><i class='fa fa-eraser'></i> Hapus</a></td></tr>";
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
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
      </div>
	  <div class="box box-info">
		<div class="modal-body">
		  <form id="exampleFullForm" autocomplete="off">
            <div class="row row-lg">
              <div class="col-lg-6 form-horizontal">
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Username
                    <span class="required">*</span>
                  </label>
                  <div class=" col-lg-12 col-sm-9">
                    <input type="text" class="form-control" name="username" placeholder="John Fish"
                    required="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Email
                    <span class="required">*</span>
                  </label>
                  <div class="col-lg-12 col-sm-9">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="icon wb-envelope" aria-hidden="true"></i>
                      </span>
                      <input type="email" class="form-control" name="email" placeholder="email@email.com"
                      required="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Password
                    <span class="required">*</span>
                  </label>
                  <div class="col-lg-12 col-sm-9">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="icon wb-lock" aria-hidden="true"></i>
                      </span>
                      <input type="password" class="form-control" name="password" placeholder="Min length 8"
                      required="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Birthday
                    <span class="required">*</span>
                  </label>
                  <div class="col-lg-12 col-sm-9">
                    <input type="text" class="form-control" name="birthday" placeholder="YYYY/MM/DD"
                    required="" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">GitHub</label>
                  <div class="col-lg-12 col-sm-9">
                    <input type="url" class="form-control" name="github" placeholder="https://github.com/amazingSurge">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Company</label>
                  <div class="col-lg-12 col-sm-9">
                    <select class="form-control" id="company" name="company" required="">
                      <option value="">Choose a Company</option>
                      <option value="apple">Apple</option>
                      <option value="google">Google</option>
                      <option value="microsoft">Microsoft</option>
                      <option value="yahoo">Yahoo</option>
                    </select>
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
      <!-- Panel Full Example -->
      <!--<div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Full Example
            <span class="panel-desc">Basic validation will display a label with the error after the form
              control. </span>
          </h3>
        </div>
        <div class="panel-body">
          <form id="exampleFullForm" autocomplete="off">
            <div class="row row-lg">
              <div class="col-lg-6 form-horizontal">
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Username
                    <span class="required">*</span>
                  </label>
                  <div class=" col-lg-12 col-sm-9">
                    <input type="text" class="form-control" name="username" placeholder="John Fish"
                    required="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Email
                    <span class="required">*</span>
                  </label>
                  <div class="col-lg-12 col-sm-9">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="icon wb-envelope" aria-hidden="true"></i>
                      </span>
                      <input type="email" class="form-control" name="email" placeholder="email@email.com"
                      required="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Password
                    <span class="required">*</span>
                  </label>
                  <div class="col-lg-12 col-sm-9">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="icon wb-lock" aria-hidden="true"></i>
                      </span>
                      <input type="password" class="form-control" name="password" placeholder="Min length 8"
                      required="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Birthday
                    <span class="required">*</span>
                  </label>
                  <div class="col-lg-12 col-sm-9">
                    <input type="text" class="form-control" name="birthday" placeholder="YYYY/MM/DD"
                    required="" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">GitHub</label>
                  <div class="col-lg-12 col-sm-9">
                    <input type="url" class="form-control" name="github" placeholder="https://github.com/amazingSurge">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Company</label>
                  <div class="col-lg-12 col-sm-9">
                    <select class="form-control" id="company" name="company" required="">
                      <option value="">Choose a Company</option>
                      <option value="apple">Apple</option>
                      <option value="google">Google</option>
                      <option value="microsoft">Microsoft</option>
                      <option value="yahoo">Yahoo</option>
                    </select>
                  </div>
                </div>
              </div>-->
              <!--<div class="col-lg-6 form-horizontal">
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Remark Admin is
                    <span class="required">*</span>
                  </label>
                  <div class="col-lg-12 col-sm-9">
                    <div class="input-group">
                      <div>
                        <div class="radio-custom radio-primary">
                          <input type="radio" id="inputAwesome" name="porto_is" value="awesome" required="">
                          <label for="inputAwesome">Awesome</label>
                        </div>
                      </div>
                      <div>
                        <div class="radio-custom radio-primary">
                          <input type="radio" id="inputVeryAwesome" name="porto_is" value="very-awesome">
                          <label for="inputVeryAwesome">Very Awesome</label>
                        </div>
                      </div>
                      <div>
                        <div class="radio-custom radio-primary">
                          <input type="radio" id="inputUltraAwesome" name="porto_is" value="ultra-awesome">
                          <label for="inputUltraAwesome">Ultra Awesome</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">I will use it for
                    <span class="required">*</span>
                  </label>
                  <div class="col-lg-12 col-sm-9">
                    <div class="input-group">
                      <div>
                        <div class="checkbox-custom checkbox-primary">
                          <input type="checkbox" id="inputForProject" name="for[]" value="project" required="">
                          <label for="inputForProject">My Project</label>
                        </div>
                      </div>
                      <div>
                        <div class="checkbox-custom checkbox-primary">
                          <input type="checkbox" id="inputForWebsite" name="for[]" value="website">
                          <label for="inputForWebsite">My Website</label>
                        </div>
                      </div>
                      <div>
                        <div class="checkbox-custom checkbox-primary">
                          <input type="checkbox" id="inputForAll" name="for[]" value="all">
                          <label for="inputForAll">All things I do</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Skills
                    <span class="required">*</span>
                  </label>
                  <div class="col-lg-12 col-sm-9">
                    <textarea class="form-control" name="skills" rows="3" placeholder="Describe your skills"
                    required=""></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-sm-3 control-label">Browsers</label>
                  <div class="col-lg-12 col-sm-9">
                    <select class="form-control" id="browsers" name="browsers" title="Please select at least one browser"
                    size="5" multiple="multiple" required="">
                      <option value="chrome">Chrome / Safari</option>
                      <option value="ff">Firefox</option>
                      <option value="ie">Internet Explorer</option>
                      <option value="opera">Opera</option>
                    </select>
                  </div>
                </div>
              </div>-->
              <!--<div class="form-group col-xs-12 text-right padding-top-m">
                <button type="submit" class="btn btn-primary" id="validateButton1">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>-->
      <!-- End Panel Full Example -->
  <!-- Core  -->
  <script src="../../global/vendor/jquery/jquery.js"></script>
  <script src="../../global/vendor/bootstrap/bootstrap.js"></script>
  <!-- Plugins -->
  <script src="../../global/vendor/formvalidation/formValidation.min.js"></script>
  <script src="../../global/vendor/formvalidation/framework/bootstrap.min.js"></script>
  <!-- Scripts -->
  <script src="../../assets/examples/js/forms/validation.js"></script>
</body>
</html>