<?php
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="data siswa.xlsx"');
header('Cache-Control: max-age=0');

$excel = new Excel();
$sheet = $excel->getActiveSheet();

// properti
$excel->getProperties()
	->setCreator('Heru Rusdianto')
	->setLastModifiedBy('Heru Rusdianto')
	->setTitle('Data Siswa')
	->setSubject('Data Siswa')
	->setDescription('Data Siswa ' . $sekolah->nama);

// font
$excel->getDefaultStyle()->getFont()->setName('Helvetica Neue')->setSize(12);

// page setup
$sheet->getPageSetup()
	->setHorizontalCentered(true)
	->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4)
	->setRowsToRepeatAtTopByStartAndEnd(5, 5);

// grid lines
$sheet->setShowGridlines(false);

// margins
$sheet->getPageMargins()
	->setTop(1)
	->setRight(0.75)
	->setLeft(0.75)
	->setBottom(1);

// nama sheet
$sheet->setTitle(date('d-m-Y'));

// nama sekolah dan judul
$style = array(
	'font' => array('size' => 25, 'bold' => true),
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
	)
);
$sheet->getStyle('A1:A2')->applyFromArray($style);
unset($style);

// alamat sekolah
$style = array(
	'font' => array('size' => 12, 'bold' => true),
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
	)
);
$sheet->getStyle('A3')->applyFromArray($style);
unset($style);

// border alamat
$style = array(
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
	'borders' => array(
		'bottom' => array(
			'style' => PHPExcel_Style_Border::BORDER_DOUBLE
		)
	)
);
$sheet->getStyle('A3:F3')->applyFromArray($style);
unset($style);

// header
$sheet
	->setCellValue('A1', $sekolah->nama)
	->setCellValue('A2', 'DATA SISWA')
	->setCellValue('A3', $sekolah->alamat)
	->mergeCells('A1:F1')
	->mergeCells('A2:F2')
	->mergeCells('A3:F3');

// header tabel
$style = array(
	'font' => array('size' => 10, 'bold' => true),
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		'wrapText' => true
	),
	'borders' => array(
		'allborders' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN
		)
	)
);
$sheet->getStyle('A5:F5')->applyFromArray($style);
$sheet
	->setCellValue('A5', 'No')
	->setCellValue('B5', 'NIS')
	->setCellValue('C5', 'Nama')
	->setCellValue('D5', 'Kelas')
	->setCellValue('E5', 'Telp')
	->setCellValue('F5', 'Alamat');
unset($style);

// data tabel
$style = array(
	'font' => array('size' => 10),
	'alignment' => array(
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
	'borders' => array(
		'allborders' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN
		)
	)
);
$sheet->getStyle('A6:F' . (count($siswa) + 5))->applyFromArray($style);
$sheet->getStyle('A6:F' . (count($siswa) + 5))->getAlignment()->setWrapText(true);
$sheet->getStyle('A6:F' . (count($siswa) + 5))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('C6:C' . (count($siswa) + 5))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
$sheet->getStyle('F6:F' . (count($siswa) + 5))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
$sheet->getStyle('A6:A' . (count($siswa) + 5))->getNumberFormat()->setFormatCode('#,##0');

// lebar kolom
$sheet->getColumnDimension('A')->setWidth(5);
$sheet->getColumnDimension('B')->setWidth(10);
$sheet->getColumnDimension('C')->setWidth(20);
$sheet->getColumnDimension('D')->setWidth(10); 
$sheet->getColumnDimension('E')->setWidth(12);
$sheet->getColumnDimension('F')->setWidth(15);  

$i = 0;
foreach ($siswa as $data) {
	$i++;

	// alignment
	$alamat = ($data->alamat) ? PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY : PHPExcel_Style_Alignment::HORIZONTAL_CENTER;
	$sheet->getStyle('F' . ($i + 5))->getAlignment()->setHorizontal($alamat);

	$sheet
		->setCellValue('A' . ($i + 5), $i)
		->setCellValue('B' . ($i + 5), $data->nis)
		->setCellValue('C' . ($i + 5), $data->nama)
		->setCellValue('D' . ($i + 5), $data->kelas)
		->setCellValue('E' . ($i + 5), ($data->telp) ?: '-')
		->setCellValue('F' . ($i + 5), ($data->alamat) ?: '-');
}
unset($style);

// buat dan simpan
$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
$objWriter->save('php://output');

exit;