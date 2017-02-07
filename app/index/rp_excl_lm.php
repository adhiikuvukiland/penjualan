<?php
session_start();
	include "../../inc/inc_conn.php";
	include "PHPExcel.php";
	$kode = $_GET['kode_site'];
	$tanggal_awal = $_GET['tgl_awal'];
               $tanggal=substr($tanggal_awal,0,4).substr($tanggal_awal,5,2)."".substr($tanggal_awal,8,2);
               $tanggal_postgres=substr($tanggal_awal,0,4)."-".substr($tanggal_awal,5,2)."-".substr($tanggal_awal,8,2);
			   $tanggal_indo=substr($tanggal_awal,8,2)."/".substr($tanggal_awal,5,2)."/".substr($tanggal_awal,0,4);
	$tanggal_akhir = $_GET['tgl_akhir'];
				$tanggal_postgres2=substr($tanggal_akhir,0,4)."-".substr($tanggal_akhir,5,2)."-".substr($tanggal_akhir,8,2);
			    $tanggal_indo2=substr($tanggal_akhir,8,2)."/".substr($tanggal_akhir,5,2)."/".substr($tanggal_akhir,0,4);
							 
$fn = "YOEL Report List Media ".$tanggal_indo." - ".$tanggal_indo2."";
	$objPHPExcel = new PHPExcel();
        // Set properties
        $objPHPExcel->getProperties()->setCreator("User")
                ->setLastModifiedBy("User")
                ->setTitle("")
                ->setSubject("")
                ->setDescription("")
                ->setKeywords("")
                ->setCategory("");
        //set column width and height
		//$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);
        //$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		//$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(60);
		//$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        //Add some data
        $colArray = array('A','B', 'C', 'D', 'E','F','G','H','I','J','K','L');
        foreach ($colArray as $colId) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($colId)->setAutoSize(true);
        }
		$objPHPExcel->setActiveSheetIndex(0);
		
		$objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('C1', 'YOEL Report List Media')
				->setCellValue('A2', 'No')
				->setCellValue('B2', 'Site')
                ->setCellValue('C2', 'Cabang')
                ->setCellValue('D2', 'Time')
                ->setCellValue('E2', 'Date')
                ->setCellValue('F2', 'POS')
                ->setCellValue('G2', 'TX')
				->setCellValue('H2', 'Cshr Number')
				->setCellValue('I2', 'Pay Code')
				->setCellValue('J2', 'Amount')
				->setCellValue('K2', 'Yogya Vc')
				->setCellValue('L2', 'Sup Vc');
				
		// Ambil data summary
		$i = 1;
		$kondisi="";
		if($kode!='ALL'){
			$kondisi="AND m.site_code='$kode'";
		}$q_sum="SELECT * FROM yoel_transaction_lsmedia m left JOIN branch b on m.site_code=b.site_code WHERE m.tanggal>='$tanggal_postgres' AND m.tanggal <='$tanggal_postgres2' $kondisi";
		//$q_sum="SELECT m.site_code,m.leasing_time,m.termnmbr,m.transnmbr,m.cshrnmbr,m.kodpay,m.cash,m.yogyavc,m.supvc,m.tanggal,m.leasing_date,b.kode_branch,b.nama_branch FROM yoel_transaction_lsmedia m, branch b WHERE m.site_code=b.site_code AND m.tanggal>='$tanggal_postgres' AND m.tanggal <='$tanggal_postgres2' $kondisi ORDER BY m.site_code";
		   //echo $q_sum;
		   $rs_sum=pg_query($q_sum);
		   $rowCount=3;
		   while ($sw_sum=pg_fetch_array($rs_sum)){
		    $tglku = $sw_sum['leasing_date'];
			$tgllsg=substr($tglku,8,2)."/".substr($tglku,5,2)."/".substr($tglku,0,4);
			$tglku2= $sw_sum['tanggal'];
			$tgllsg2=substr($tglku2,8,2)."/".substr($tglku2,5,2)."/".substr($tglku2,0,4);
			//$cashku = intval($sw_sum['cash']);
			//$cash = number_format($cashku);//($r[harga],0,",",".")
			$pos = $sw_sum['termnmbr'];
			//$vcku = intval($sw_sum['yogyavc']);
			//$vc = number_format($vcku);
			//$svcku = intval($sw_sum['supvc']);
			//$svc = number_format($svcku);
            //$kodpayku = intval($sw_sum['kodpay']);
			//$kodpay = number_format($kodpayku);
			$vc = $sw_sum['yogyavc'];
		    $kodpay = $sw_sum['kodpay'];
			$cash = $sw_sum['cash'];
			
		    $objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A' . $rowCount, $i)
                        ->setCellValue('B' . $rowCount, $sw_sum['site_code']) 
						->setCellValue('C' . $rowCount, $sw_sum['kode_branch']."/".$sw_sum['nama_branch'])
                        ->setCellValue('D' . $rowCount, $sw_sum['leasing_time'])
                        ->setCellValue('E' . $rowCount, $tgllsg)
                        ->setCellValue('F' . $rowCount, $pos)
                        ->setCellValue('G' . $rowCount, $sw_sum['transnmbr'])
						->setCellValue('H' . $rowCount, $sw_sum['cshrnmbr'])
						->setCellValue('I' . $rowCount, $kodpay)
						->setCellValue('J' . $rowCount, $cash)
						->setCellValue('K' . $rowCount, $vc)
						->setCellValue('L' . $rowCount, $sw_sum['supvc']);
			$i++;
            $rowCount++;
		}
        // Redirect output to a clients web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$fn.'.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
	?>