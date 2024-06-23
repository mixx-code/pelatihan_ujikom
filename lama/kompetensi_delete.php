
<?php
include "koneksi.php";
$kd = $_GET['kd'];
$sql = "DELETE From kompetensi where kd_kompetensi='$kd'";
$result = mysqli_query($connection, $sql);
if($result){
header('location:kompetensi_view.php');
}else{
echo "Gagal terhapus";
}
?>