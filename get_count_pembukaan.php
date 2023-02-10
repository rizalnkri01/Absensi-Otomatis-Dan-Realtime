<?php 
include('koneksi.php');

// mengambil data
$data = mysqli_query($conn,"SELECT * FROM absen_pembukaan");
// menghitung data
$jumlah_data = mysqli_num_rows($data);

// mengambil data_absen
$data_absen = mysqli_query($conn,"SELECT * FROM absen_pembukaan WHERE absen = 1");
// menghitung data_absen
$jumlah_data_absen = mysqli_num_rows($data_absen);

// mengambil data belum absen
$data_belum_absen = mysqli_query($conn,"SELECT * FROM absen_pembukaan WHERE absen = 0");
// menghitung data belum absen
$jumlah_data_belum_absen = mysqli_num_rows($data_belum_absen);

echo json_encode(array("jumlah_data"=>$jumlah_data, "jumlah_data_absen"=>$jumlah_data_absen, "jumlah_data_belum_absen"=>$jumlah_data_belum_absen));

?>