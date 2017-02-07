<?php
//session_start();
include"koneksi.php";
$tanggal_awal = $_POST['tgl_awal'];
               $tanggal=substr($tanggal_awal,0,4).substr($tanggal_awal,5,2)."".substr($tanggal_awal,8,2);
               $tanggal_postgres=substr($tanggal_awal,0,4)."-".substr($tanggal_awal,5,2)."-".substr($tanggal_awal,8,2);
							 $tanggal_indo=substr($tanggal_awal,8,2)."/".substr($tanggal_awal,5,2)."/".substr($tanggal_awal,0,4);
							 
$tanggal_akhir = $_POST['tgl_akhir'];
               $tanggal_postgres2=substr($tanggal_akhir,0,4)."-".substr($tanggal_akhir,5,2)."-".substr($tanggal_akhir,8,2);
							 $tanggal_indo2=substr($tanggal_akhir,8,2)."/".substr($tanggal_akhir,5,2)."/".substr($tanggal_akhir,0,4);

              //$status = $_SESSION['status'];
							
              $site_code = $_POST['site_code'];
              $tgl = $tanggal_awal;

              $tgl_int = strtotime($tgl) ;
                  $tgl_akhir_int = strtotime($tanggal_akhir);
									$found = true;
                  while ($tgl_int <= $tgl_akhir_int && $found){
                    $qry ="SELECT tanggal FROM yoel_transaction where tanggal='$tgl' AND site_code='$site_code'";
										$row = pg_query($qry);
										if(pg_num_rows($row)==0){
											$found = false;
											
										}
										$tgl_int = strtotime("+1 day",$tgl_int);
                    $tgl = date('Y-m-d',$tgl_int);
                  }
						echo $tanggal_awal; echo $tanggal_akhir;			
									if($found){
										$loc="Location:tr_prc.php?tgl_awal=$tanggal_awal&tgl_akhir=$tanggal_akhir&site_code=$site_code";
									}
									else{
										$loc="Location:tr_prc.php?site_code=$site_code";
									}
									
                  header($loc);
                  ?>