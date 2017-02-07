<?php
session_start();
if (empty($_SESSION['username'])){
	echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../../index.html'</script>";	
} else {
	include "../../koneksi.php";
$class11="<li class=active>";
  include "header.php";
}
?>
    <div class="content-wrapper">
    <section class="content-header">
      <h1>
        UBAH PASSWORD
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="user.php"><i class="fa fa-dashboard"></i> User</a></li>
        <li class="active">Ubah Password</li>
      </ol>
      <br>
      <table width="900">
            <tr>
            <td width="250"><div class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4></td> 
            <td align="left" width="30"> - </td>
            <td align="left" width="620"> <h4><div id="output" class="jam" ></div></h4></td>
            </tr>
            </table>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div>
          <div class="box box-info">
            <div class="box-body">
                      <?php
                        $query = pg_query("SELECT * FROM userlogin WHERE username='$_GET[kd]'");
                        $data  = pg_fetch_array($query);
                        $status = $data['status'];
                      ?>
                <form action="edit_user_action.php" method="post">
                  <table class="table table-condensed">
                  <tr>
                      <td><label for="username">Username</label></td>
                      <td><input name="username" type="text" class="form-control" id="username" value="<?php echo $data['username'];?>" readonly/></td>
                    </tr>
                    <tr>
                      <td><label for="password">Password</label></td>
                      <td><input name="password" type="password" class="form-control" id="password" value="<?php echo $data['password'];?>" required/></td>
                    </tr>
                    <tr>
                      <td><label for="kode_site">Kode Site</label></td>
                      <td><input name="kode_site" type="text" class="form-control" id="kode_site" value="<?php echo $data['kode_site'];?>" required/></td>
                    </tr>
                    <tr>
                      <td><label for="role">Status</label></td>
                      <td><select name="status" class="form-control">
                        <option value="0" <?php if ($status=="0") { echo "SELECTED"; } ?> > Administrator</option>
												<option value="1" <?php if ($status=="1") { echo "SELECTED"; } ?> > Regional</option>
                        <option value="2" <?php if ($status=="2") { echo "SELECTED"; } ?> > User</option>
                      </select>
                    </tr>
                    <tr>
                      <td><input type="submit" value="Simpan Data"  class="btn btn-sm btn-success"/>&nbsp;<a href="user.php" class="btn btn-sm btn-primary">Kembali</a></td>
                      </tr>
                  </table>
                </form>
              </div>
        </div>
      </div>
    </section>
  </div>
<?php
include"footer.php";
?>
</html>
