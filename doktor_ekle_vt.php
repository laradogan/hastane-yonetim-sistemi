<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<title>EKLEME İŞLEMİ TAMAMLANDI</title>
</head>
<body>
<button class="form-control btn btn-danger" type="submit"><a href="doktorlar.php">ANASAYFA</a></button>
</body>
</html>


<?php
$baglanti=mysqli_connect("localhost","root","","kds_proje");
	$baglanti->set_charset("utf8");
	$baglanti->query('SET NAMES utf8');

if($baglanti){
if($_POST){
if(strip_tags(trim(isset($_POST["doktor_id"])))){
$doktor_id=$_POST["doktor_id"];
}
if(strip_tags(trim(isset($_POST["doktor_ad"])))){
$doktor_ad=$_POST["doktor_ad"];
}
if(strip_tags(trim(isset($_POST["doktor_soyad"])))){
$doktor_soyad=$_POST["doktor_soyad"];
}
if(strip_tags(trim(isset($_POST["doktor_dogum_tarihi"])))){
$doktor_dogum_tarihi=$_POST["doktor_dogumtarihi"];
}
if(strip_tags(trim(isset($_POST["poliklinik_id"])))){
$poliklinik_id=$_POST["poliklinik_id"];
}
}


$sorgu=mysqli_query($baglanti,"INSERT INTO doktor (doktor_id,doktor_ad,doktor_soyad,doktor_dogum_tarihi,poliklinik_id) VALUES ('".$doktor_id."','".$doktor_ad."','".$doktor_soyad."','".$doktor_dogum_tarihi."','".$poliklinik_id."',)");
if($sorgu==TRUE){
echo "Kayıt Başarıyla Eklendi";
}else {
echo "Hata:".$sorgu.$baglan->error;
}
mysqli_close($baglanti);
}else{
echo "Veriler Gelmedi";
}

}else {
die("Bağlantı Sağlanamadı");
};

?>
