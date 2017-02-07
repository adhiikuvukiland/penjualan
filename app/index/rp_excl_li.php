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
							 
$fn = "YOEL Report List Item ".$tanggal_indo." - ".$tanggal_indo2."";
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
        $colArray = array('A','B', 'C', 'D', 'E','F','G','H','I','J');
        foreach ($colArray as $colId) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($colId)->setAutoSize(true);
        }
		$objPHPExcel->setActiveSheetIndex(0);
		
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('C1', 'YOEL Report List Item')
					->setCellValue('A2', 'No')
					->setCellValue('B2', 'Site')
					->setCellValue('C2', 'Cabang')
					->setCellValue('D2', 'Date')
					->setCellValue('E2', 'Tx')
					->setCellValue('F2', 'Sp')
					->setCellValue('G2', 'TC')
					->setCellValue('H2', 'Sv')
					->setCellValue('I2', 'Description')
					->setCellValue('J2', 'Price');
				
		// Ambil data summary
		$i = 1;
		$kondisi="";
		if($kode!='ALL'){
			$kondisi="AND l.site_code='$kode'";
		}//$q_sum="SELECT * FROM yoel_transaction_listitem WHERE tanggal>='$tanggal_postgres' AND tanggal <='$tanggal_postgres2' $kondisi";
		$q_sum="SELECT l.site_code,l.leasing_date,l.trans,l.slsp,l.tillcode,l.sv,l.description,l.price,b.kode_branch,b.nama_branch FROM yoel_transaction_listitem l, branch b WHERE l.site_code=b.site_code AND l.tanggal>='$tanggal_postgres' AND l.tanggal <='$tanggal_postgres2' $kondisi";   
		   //echo $q_sum;
		   $rs_sum=pg_query($q_sum);
		   $rowCount=3;
		   while ($sw_sum=pg_fetch_array($rs_sum)){
		   $tglku = $sw_sum['leasing_date'];
		   $tgllsg=substr($tglku,8,2)."/".substr($tglku,5,2)."/".substr($tglku,0,4);
		   $tglku2= $sw_sum['tanggal'];
		   $tgllsg2=substr($tglku2,8,2)."/".substr($tglku2,5,2)."/".substr($tglku2,0,4);
		   $slsp = "'".$sw_sum['slsp'];
		   $tillcode = "'".$sw_sum['tillcode'];
		   $sv = "'".$sw_sum['sv'];      
		   
		   $objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A' . $rowCount, $i)
                        ->setCellValue('B' . $rowCount, $sw_sum['site_code'])
						->setCellValue('C' . $rowCount, $sw_sum['kode_branch']."/".$sw_sum['nama_branch'])
                        ->setCellValue('D' . $rowCount, $tgllsg)
                        ->setCellValue('E' . $rowCount, $sw_sum['trans'])
                        ->setCellValue('F' . $rowCount, $slsp)
                        ->setCellValue('G' . $rowCount, $tillcode)
						->setCellValue('H' . $rowCount, $sv)
						->setCellValue('I' . $rowCount, $sw_sum['description'])
						->setCellValue('J' . $rowCount, $sw_sum['price']);
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