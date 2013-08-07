<?php
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="data buku.xlsx"');
header('Cache-Control: max-age=0');

// objek
$excel = new Excel();
$sheet = $excel->getActiveSheet();

// properti
$excel->getProperties()
	->setCreator('Heru Rusdianto')
	->setLastModifiedBy('Heru Rusdianto')
	->setTitle('Data Buku')
	->setSubject('Data Buku')
	->setDescription('Data Buku ' . $sekolah->nama);

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

// logo
$nama_logo = ($sekolah->logo) ?: 'blank.png';
$logo = public_path() . '/foto/sekolah/' . $nama_logo;

// tambah logo
$draw = new PHPExcel_Worksheet_Drawing();
$draw->setName('Logo');
$draw->setDescription('Logo ' . $sekolah->nama);
$draw->setPath($logo);
$draw->setHeight(95);
$draw->setWorksheet($sheet);

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
	->setCellValue('A2', 'DATA BUKU')
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
	->setCellValue('B5', 'Judul')
	->setCellValue('C5', 'Penulis')
	->setCellValue('D5', 'Penerbit')
	->setCellValue('E5', 'Tahun')
	->setCellValue('F5', 'Jumlah');
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
$sheet->getStyle('A6:F' . (count($buku) + 5))->applyFromArray($style);
$sheet->getStyle('A6:F' . (count($buku) + 5))->getAlignment()->setWrapText(true);
$sheet->getStyle('A6:F' . (count($buku) + 5))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('B6:B' . (count($buku) + 5))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
$sheet->getStyle('A6:A' . (count($buku) + 5))->getNumberFormat()->setFormatCode('#,##0');
$sheet->getStyle('F6:F' . (count($buku) + 5))->getNumberFormat()->setFormatCode('#,##0');

// lebar kolom
$sheet->getColumnDimension('A')->setWidth(5);
$sheet->getColumnDimension('B')->setWidth(20);
$sheet->getColumnDimension('C')->setWidth(15);
$sheet->getColumnDimension('D')->setWidth(15); 

$i = 0;
foreach ($buku as $data) {
	$i++;

	// alignment
	$penulis = ($data->penulis) ? PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY : PHPExcel_Style_Alignment::HORIZONTAL_CENTER;
	$penerbit = ($data->penerbit) ? PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY : PHPExcel_Style_Alignment::HORIZONTAL_CENTER;
	$sheet->getStyle('C' . ($i + 5))->getAlignment()->setHorizontal($penulis);
	$sheet->getStyle('D' . ($i + 5))->getAlignment()->setHorizontal($penerbit);

	$sheet
		->setCellValue('A' . ($i + 5), $i)
		->setCellValue('B' . ($i + 5), $data->judul)
		->setCellValue('C' . ($i + 5), ($data->penulis) ?: '-')
		->setCellValue('D' . ($i + 5), ($data->penerbit) ?: '-')
		->setCellValue('E' . ($i + 5), ($data->tahun > 0) ? $data->tahun : '-')
		->setCellValue('F' . ($i + 5), $data->jumlah);
}
unset($style);

// buat dan simpan
$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
$objWriter->save('php://output');

exit;