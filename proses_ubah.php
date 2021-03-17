<?php
include "koneksi.php";

$nis=$_GET['nis'];
$nama=$_GET['nama'];
$jenis_kelamin=$_GET['jenis_kelamin'];
$telp=$_GET['telp'];
$alamat=$_GET['alamat']

if(isset($_POST['ubah foto'])){

$foto=$_FILES['foto']['name'];
$tmp=$_FILES['foto']['tmp_name'];
$fotobaru=date('dmYHis').$foto;
$path="images/".$fotobaru;

if(move_uploaded_file($tmp, $path)){
	$query="SELECT * FROM siswa WHERE nis='".$nis."'";
	$sql=mysqli_query($connect, $query);
	$data=mysqli_fetch_array($sql);

	if(is_file("images/".$data['foto']))
		unlink("images/".$data['foto']);

$squery="UPDATE siswa SET nama='".$nama."', jenis_kelamin='".$jenis_kelamin."', telp='".$telp."', alamat='".$alamat."', foto='".$fotobaru."' WHERE nis='".$nis."'";
$sql=mysqli_query($connect, $query);

if($sql){
	header("location:index.php");
}else{
	echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
	echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
}
}else{
	echo "Maaf, gambar gagal untuk diupload.";
	echo "<br><a href='from_ubah.php'>Kembali Ke Form</a>";
}
}else{

	$query="UPDATE siswa SET nama='".$nama."', jenis_kelamin='".$jenis_kelamin."', telp='".$telp."', alamat='".$alamat."' WHERE nis='".$nis."'";
	$sql=mysqli_query($connect, $query);

	if($sql){
		header("location:index.php");
	}else{
		echo "Maaf, terjadi kesalahan saat mencoba untuk data ke database.";
		echo "<br><a href='form-ubah.php'>Kembali Ke Form</a>";
	}
}
?>