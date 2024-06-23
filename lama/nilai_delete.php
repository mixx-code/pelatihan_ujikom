

<?php
include "koneksi.php";
$kd = $_GET['kd'];
$sql = "DELETE From nilai where kd_nilai='$kd'";
$result = mysqli_query($connection, $sql);
if($result){
header('location:nilai_view.php');
}else{
echo "Gagal terhapus";
}
?>