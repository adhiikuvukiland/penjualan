<?php
//session_start();
//if (empty($_SESSION['username'])){
	//echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../../index.html'</script>";	
//} else {
	include "../../inc/inc_conn.php";
	$class0="<li class=active>";
    include "../../inc/header.php";
//}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header ds">
      <h1>
        <br>
		<br>
      </h1>
	  <!--<h3>
		APLIKASI PENJUALAN BARANG ELEKTRONIK 
	  </h3>-->
      <ol class="breadcrumb">
        <li> <?php include('../../inc/currentdate.php'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php include('../../inc/clock_lcd.php'); ?></li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12"><a href=master_brg.php>
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text-ds"><b>Produk</b></span>
              <span class="info-box-number"><small></small></span>
            </div>
          </div></a>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12"><a href=sales.php>
          <div class="info-box">
			<span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text-ds"><b>Sales</b></span>
              <span class="info-box-number"></span>
            </div>
          </div>
        </div></a>
		<!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
	
        <div class="col-md-4 col-sm-6 col-xs-12"><a href=supplier.php>
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text-ds"><b>Supplier</b></span>
              <span class="info-box-number"></span>
            </div>
          </div>
        </div></a>
	  </div>
	  <div class="row"><br>
		<div class="col-md-2 col-sm-6 col-xs-12"></div>
        <div class="col-md-4 col-sm-6 col-xs-12"><a href=member.php>
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text-ds"><b>Members</b></span>
              <span class="info-box-number"></span>
            </div>
          </div>
        </div></a>
		<div class="col-md-4 col-sm-6 col-xs-12"><a href=laporan.php>
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text-ds"><b>Laporan</b></span>
              <span class="info-box-number"></span>
            </div>
          </div>
        </div></a>
      </div>
      <!--<div class="row">
        <div class="col-md-8">
 
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Item</th>
                    <th>Status</th>
                    <th>Popularity</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="label label-success">Shipped</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-warning">Pending</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>iPhone 6 Plus</td>
                    <td><span class="label label-danger">Delivered</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-info">Processing</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-warning">Pending</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>iPhone 6 Plus</td>
                    <td><span class="label label-danger">Delivered</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="label label-success">Shipped</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              
            </div>
            
            <div class="box-footer clearfix">
              <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
            
          </div>
          
        </div>
        

        <div class="col-md-4">
          
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Products</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-img">
                    <img src="../asset/dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript::;" class="product-title">Samsung TV
                      <span class="label label-warning pull-right">$1800</span></a>
                        <span class="product-description">
                          Samsung 32" 1080p 60Hz LED Smart HDTV.
                        </span>
                  </div>
                </li>
                
                <li class="item">
                  <div class="product-img">
                    <img src="../asset/dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript::;" class="product-title">Bicycle
                      <span class="label label-info pull-right">$700</span></a>
                        <span class="product-description">
                          26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                        </span>
                  </div>
                </li>
                
                <li class="item">
                  <div class="product-img">
                    <img src="../asset/dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript::;" class="product-title">Xbox One <span class="label label-danger pull-right">$350</span></a>
                        <span class="product-description">
                          Xbox One Console Bundle with Halo Master Chief Collection.
                        </span>
                  </div>
                </li>
                <li class="item">
                  <div class="product-img">
                    <img src="../asset/dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript::;" class="product-title">PlayStation 4
                      <span class="label label-success pull-right">$399</span></a>
                        <span class="product-description">
                          PlayStation 4 500GB Console (PS4)
                        </span>
                  </div>
                </li>
              </ul>
            </div>
            <div class="box-footer text-center">
              <a href="javascript::;" class="uppercase">View All Products</a>
            </div>
          </div>
        </div>
      </div>-->
    </section>
  </div>
<?php
include"../../inc/footer.php";
?>