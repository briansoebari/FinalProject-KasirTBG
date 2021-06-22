<?php
    //memakai dompdf untuk membantu membuat file PDF
    include('koneksi.php');
    require_once("dompdf/autoload.inc.php");
    use Dompdf\Dompdf;
    
    $dompdf = new Dompdf();
    $query  = mysqli_query($koneksi, "select * from transaksi");
    $html   = '<center><h3>Daftar Transaksi</h3></center><hr/><br/>';
    $html   .= '<table border="1" width="100%">
                <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>ID Buku</th>
                <th>Qty</th>
                <th>Total</th>
                </tr>';
    $no     = 1;

    while($row = mysqli_fetch_array($query))
        {
            $html   .= "<tr>
            <td>".$no."</td
            <td>".$row['id_transaksi']."</td>
            <td>".$row['id_buku']."</td>
            <td>".$row['qty']."</td>
            <td>".$row['total']."</td>
            </tr>";
        }
    
    //sesi untuk mengatur ukuran dan tata letak cetak PDF
    $html   .= "</html>";
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4','potrait');
    $dompdf->render();
    $dompdf->stream('Report Transaksi.pdf');
?>