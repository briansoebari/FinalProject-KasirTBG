<?php
    //menggunakan PhpOffice untuk membantu pembuatan file Excel
    include('koneksi.php');
    require 'vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'ID Transaksi');
    $sheet->setCellValue('C1', 'ID Buku');
    $sheet->setCellValue('D1', 'Qty');
    $sheet->setCellValue('E1', 'Total');

    $query = mysqli_query($koneksi, "select * from transaksi");
    $i = 2;
    $no = 1;
    while($row = mysqli_fetch_array($query)){
        $sheet->setCellValue('A'.$i, $no++);
        $sheet->setCellValue('B'.$i, $row['id_transaksi']);
        $sheet->setCellValue('C'.$i, $row['id_buku']);
        $sheet->setCellValue('D'.$i, $row['qty']);
        $sheet->setCellValue('E'.$i, $row['total']);
        $i++;
    }

    //mengatur style excel
    $styleArray = [
        'borders'=>[
            'allBorders' =>[
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ];

    $i = $i - 1;
    $sheet->getStyle('A1:E'.$i)->applyFromArray($styleArray);

    $writer = new Xlsx($spreadsheet);
    $writer->save('Report Transaksi.xlsx');
?>