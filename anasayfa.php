<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<title>EKLEME İŞLEMİ TAMAMLANDI</title>
</head>
<body>
<button class="form-control btn btn-danger" type="submit"><a href="cagri.php">Çağrı Kaydı Bilgisi</a></button>
</body>
</html>








<?php
$baglanti=mysqli_connect("localhost","root","","kds_proje");
	$baglanti->set_charset("utf8");
	$baglanti->query('SET NAMES utf8');

if($baglanti){
if($_POST){
if(strip_tags(trim(isset($_POST["cagri_id"])))){
$cagri_id=$_POST["cagri_id"];
}
if(strip_tags(trim(isset($_POST["cagri_nedeni"])))){
$cagri_nedeni=$_POST["cagri_nedeni"];
}
if(strip_tags(trim(isset($_POST["cagri_kayit_tarihi"])))){
	$tarih=$_POST["cagri_kayit_tarihi"];
}

$sorgu=mysqli_query($baglanti,"INSERT INTO cagri (cagri_id,cagri_nedeni,cagri_kayit_tarihi) VALUES ('".$cagri_id."','".$cagri_nedeni."','".$tarih."')");
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
