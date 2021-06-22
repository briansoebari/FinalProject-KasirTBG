<?php
    include 'koneksi.php';

    //memasukkan data dari inputan form sebelumnya

    $id_transaksi = $_POST['id_transaksi'];
    $id_buku = $_POST['id_buku'];
    $qty = $_POST['qty'];
    $p =mysqli_query($koneksi, "SELECT * FROM barang where id_buku = '".$id_buku."'");
    $r = mysqli_fetch_array($p);
    $harga_buku = $r['harga_buku'];
    $total = $qty * $harga_buku;
    $query = "INSERT INTO transaksi VALUES('$id_transaksi', '$id_buku','$qty','$total')";

    $input = mysqli_query($koneksi, $query);
    if(isset($input)){
        echo "berhasil";
    header("location:transaksi.php");
    }else{
    header("location:transaksi.php");    
    }
?>