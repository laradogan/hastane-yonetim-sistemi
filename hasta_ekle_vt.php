<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<title>EKLEME İŞLEMİ TAMAMLANDI</title>
</head>
<body>
<button class="form-control btn btn-danger" type="submit"><a href="kayit.php">ANASAYFA</a></button>
</body>
</html>



<?php
$baglanti=mysqli_connect("localhost","root","","kds_proje");
	$baglanti->set_charset("utf8");
	$baglanti->query('SET NAMES utf8');

if($baglanti){
if($_POST){
if(strip_tags(trim(isset($_POST["hasta_id"])))){
$hasta_id=$_POST["hasta_id"];
}
	
if(strip_tags(trim(isset($_POST["hasta_ad"])))){
$hasta_ad=$_POST["hasta_ad"];
}
if(strip_tags(trim(isset($_POST["hasta_soyad"])))){
$hasta_soyad=$_POST["hasta_soyad"];
}
if(strip_tags(trim(isset($_POST["hasta_dogum_tarihi"])))){
$hasta_dogum_tarihi=$_POST["hasta_dogum_tarihi"];
}
if(strip_tags(trim(isset($_POST["tetkik_id"])))){
$tetkik_id=$_POST["tetkik_id"];
}

if(strip_tags(trim(isset($_POST["hastane_id"])))){
$hastane_id=$_POST["hastane_id"];
}

$sorgu=mysqli_query($baglanti,
	"INSERT INTO hasta(hasta_id,hasta_ad,hasta_soyad,hasta_dogum_tarihi)
 VALUES ('".$hasta_id."','".$hasta_ad."','".$hasta_soyad."','".$hasta_dogum_tarihi."')");
if($sorgu==TRUE){
echo "Kayıt Başarıyla Eklendi";
}else {
echo "Hata:".$sorgu.$baglanti->error;
}
mysqli_close($baglanti);
}else{
echo "Veriler Gelmedi";
}

}else {
die("Bağlantı Sağlanamadı");
};

?>


