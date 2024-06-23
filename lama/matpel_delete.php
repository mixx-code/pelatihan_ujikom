

<?php
include "koneksi.php";
$kd = $_GET['kd'];
$sql = "DELETE From matpel where kd_matpel='$kd'";
$result = mysqli_query($connection, $sql);
if($result){
header('location:matpel_view.php');
}else{
echo "Gagal terhapus";
}
?>