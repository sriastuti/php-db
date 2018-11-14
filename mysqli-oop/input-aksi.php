<?php 
include 'koneksi.php';
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];

$host->query("INSERT INTO mahasiswa VALUES('','$nama','$alamat')");

header("location:index.php?pesan=input");
?>