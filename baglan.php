<?php
$baglan=mysqli_connect("localhost","root","","kds_proje");
if(mysqli_connect_errno())
{
	echo "Bağlantı yapılamadı.Veritabanı Hatası".mysql_connect_error();
}

$baglan->set_charset("utf8");
$baglan->query('SET NAMES utf8');
?>
