<?php 	//1. Include Koneksi
include '../../config/configuration.php';

//2. Buat kondisi untuk memisahkan aksinya
if ($_GET['aksi'] == 'tambah') {
// FUNGSI AUTO CODE
$formatKode= "PM-". date("ymd")."/"; //PM-190406/01
$query=$db->query("SELECT MAX(id_pm) as maxid FROM pemeriksaan_rj WHERE id_pm LIKE '$formatKode%'");
$result=$query->fetch_array();
$maxid=$result['maxid'];
$no_urut=substr($maxid, -2);
$new_urut = $no_urut + 1;
$id_pm=$formatKode.sprintf("%02s", $new_urut);
//AKSI TAMBAH (INSERT)
//2. tampung data dari form
$id_tenagamedis = $_POST['id_tenagamedis'];
$id_rj = $_POST['id_rj'];
$diagnosa = $_POST['diagnosa'];
$terapi = $_POST['terapi'];
//4. Buat query insert
$db->query("INSERT INTO pemeriksaan_rj SET id_pm='$id_pm',id_tenagamedis='$id_tenagamedis', id_rj='$id_rj',diagnosa='$diagnosa',terapi='$terapi");
//5. Redirect / arahkan ke halaman awal
header("location:../../index.php?menu=pemeriksaan_rj");