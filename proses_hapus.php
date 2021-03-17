<?php
include "koneksi.php";
$nis=$_GET['nia'];
$query="SELECT * FROM siswa WHERE nis='".$nis."'";
$sql=mysqli_query($conext, $query);
$data=mysqli_fetch_array($sql);

if(is_file("images/".$data['foto']"))
	unlink("images/".$data['foto']'");
$query2="DELETE FROM siswa WHERE nis='".$nis."'";
$sql2=mysqli_query($connet, $query2);
if($sql2){

	header("locaton:index.php");
}else{
	echo "Data gagal dihapus. <a href='index.php'>Kembali</a>";
}
?>