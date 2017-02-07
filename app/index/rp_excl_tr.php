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
							 
$fn = "YOEL Report Transaction ".$tanggal_indo." - ".$tanggal_indo2."";
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
//        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);
        //$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
//        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(60);
//        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        // Add some data
        $colArray = array('A','B', 'C', 'D', 'E','F','G','H','I');
        foreach ($colArray as $colId) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($colId)->setAutoSize(true);
        }
		$objPHPExcel->setActiveSheetIndex(0);
		
		$objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('C1', 'YOEL Report Transaction')
				->setCellValue('A2', 'No')
				->setCellValue('B2', 'Site')
                ->setCellValue('C2', 'Cabang')
                ->setCellValue('D2', 'Pay Code')
                ->setCellValue('E2', 'Date')
                ->setCellValue('F2', 'Time')
                ->setCellValue('G2', 'POS')
				->setCellValue('H2', 'TX')
				->setCellValue('I2', 'Amount');
				
		// Ambil data summary
		$i = 1;
		$kondisi="";
		if($kode!='ALL'){
			$kondisi="AND t.site_code='$kode'";
		}$q_sum="SELECT * FROM yoel_transaction t left JOIN branch b on t.site_code=b.site_code WHERE t.tanggal>='$tanggal_postgres' AND t.tanggal <='$tanggal_postgres2' $kondisi";
		//$q_sum="SELECT m.site_code,m.leasing_time,m.termnmbr,m.transnmbr,m.cshrnmbr,m.kodpay,m.cash,m.yogyavc,m.supvc,m.tanggal,m.leasing_date,b.kode_branch,b.nama_branch FROM yoel_transaction_lsmedia m, branch b WHERE m.site_code=b.site_code AND m.tanggal>='$tanggal_postgres' AND m.tanggal <='$tanggal_postgres2' $kondisi ORDER BY m.site_code";
		   //echo $q_sum;
		   $rs_sum=pg_query($q_sum);
		   $rowCount=3;
		   while ($sw_sum=pg_fetch_array($rs_sum)){
		//    $tglku = $sw_sum['leasing_date'];
		//	$tgllsg=substr($tglku,8,2)."/".substr($tglku,5,2)."/".substr($tglku,0,4);
			$pos = $sw_sum['leasing_termnmbr'];
			$amount = $sw_sum['leasing_amnt'];
			
		    $objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A' . $rowCount, $i)
                        ->setCellValue('B' . $rowCount, $sw_sum['site_code']) 
						->setCellValue('C' . $rowCount, $sw_sum['kode_branch']."/".$sw_sum['nama_branch'])
						->setCellValue('D' . $rowCount, $sw_sum['leasing'])
                        ->setCellValue('E' . $rowCount, $sw_sum['leasing_date'])
                        ->setCellValue('F' . $rowCount, $sw_sum['leasing_time'])
                        ->setCellValue('G' . $rowCount, $pos)
                        ->setCellValue('H' . $rowCount, $sw_sum['leasing_transnmbr'])
						->setCellValue('I' . $rowCount, $amount);
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