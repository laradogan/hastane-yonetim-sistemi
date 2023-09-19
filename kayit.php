<?php
setcookie('cookie_name', 'cookie_value');
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>HASTA KAYIT BİLGİSİ</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js">
	</script>
	<style>
		body{
	font-family:'Graphik',Helvetica;
	height:1024px;
	display:flex;
	background:#d2d6de;
}
.sidebar{
	width:15%;
	background-color:#3A3C3B;
	display:flex;
	flex-direction:column;
}
.sidebar .sidebarTop{
	width:100%;
	height:50px;
	background-color:#3A3C3B;
 	color:#fff;
	display:flex;
	align-items:center;
	font-size:24px;
}
.content{
	flex:1;
	background-color:white;
}
.content .header{
width:100%;
height:50px;
background:#59565D;
display:flex;
align-items:center;
padding-left:20px;
box-sizing:border-box;
color:#fff;
justify-content:space-between;
}
.content .header .headermenu ul{
	list-style-type: none;
	padding:0;
	padding-right: 15px;
	margin-top: 10px;
}
.content .header .headermenu li{
	position: relative;
	float: left;
	width: 90px;
}
.content .header .headermenu ul li ul{
	display: none;
}
.content .header .headermenu ul li:hover ul{
	display: block;
}
.content .header .headermenu li a{
	text-decoration: none;
	background-color: #002D72;
	color:white;
	display: block;
	padding: 3px;
	text-align: center;
}
.sidebar .info{
	display:flex;
	width:100%;
}
.avatar{
	width: 40px;
	height: 40px;
	border-radius: 20px;
	margin:5px;

}
.sidebar .info .infoName{
	padding-top:40px;
	color:#FFFFFF;
	align-items:center;
	padding-left:20px;
}
.sidebar .search{
	display:flex;
	color:#FFFFFF;
	margin-left:5px;
}
.sidebar .search .i{
	color:#fff;
	margin-left:20px;
}
.sidebar .analiz{
	display:flex;
	flex-direction:column;
	color:#fff;
	margin-left:20px;
	color: white;
}
.sidebar .analiz :link{
	text-decoration:none;
}

.sidebar .poliklinikler{
	display:flex;
	flex-direction:column;
	color:#fff;
	margin-left:0;
}
.sidebar .poliklinikler ul{
	list-style-type: none;
	padding:0;
	padding-right: 15px;
	margin-top: 10px;
}
.sidebar .poliklinikler li{
	position: relative;
	float: left;
	width: 90px;
	padding-left:15px;
}
.sidebar .poliklinikler ul li ul{
	display: none;
}
.sidebar .poliklinikler ul li:hover ul{
	display: block;
}
.sidebar .poliklinikler li a{
	text-decoration: none;
	display: block;
	padding: 3px;
	text-align: center;
}
.sidebar .doktorlar{
	display:flex;
	flex-direction:column;
	color:#fff;
	margin-left:20px;
	color: white;
}
.sidebar .doktorlar :link{
	text-decoration:none;
}
.sidebar .hakkimizda{
	display:flex;
	flex-direction:column;
	color:#fff;
	margin-left:20px;
	margin-top:5px;
}
.sidebar .hakkimizda :link{
	text-decoration:none;
}
.sidebar .anket{
	display:flex;
	flex-direction:column;
	color:#fff;
	margin-left:20px;
	margin-top:5px;
}
.sidebar .anket :link{
	text-decoration:none;
}
.sidebar .iletisim{
	display:flex;
	flex-direction:column;
	color:#fff;
	margin-left:20px;
	margin-top:5px;
}
.sidebar .iletisim :link{
	text-decoration:none;
}
.sidebar .hastakayit{
	display:flex;
	flex-direction:column;
	color:#fff;
	margin-left:20px;
	margin-top:5px;
}
.sidebar .hastakayit :link{
	text-decoration:none;
}
.sidebar .cagri{
	display:flex;
	flex-direction:column;
	color:#fff;
	margin-left:20px;
	margin-top:5px;
}
.sidebar .cagri :link{
	text-decoration:none;
}
.sidebar .cikis{
	display:flex;
	flex-direction:column;
	color:#fff;
	margin-left:20px;
	margin-top:5px;
}
.sidebar .cikis :link{
	text-decoration:none;
}
.table, tr, td, th{
	border: 1px solid #666;
}
</style>

</head>
<body>
<div class="sidebar">
<div class="sidebarTop">Özel Nobel Hastanesi</div>
<br>
<div class="info">
	<img class="avatar"src="img/royal.jpg">
	<div class="infog">

		<span class="infoName">Lara Doğan </span>
	</div>
</div>
<br>
	<div class="search">
		<input class="arama" type="text" placeholder="Ara...">
		<span>
		<i id="ara" class="fa fa-search" aria-hidden="true"></i>
		</span>
</div>
<br>
<div class="analiz"><a href="sonuc_analiz.php">SONUÇ ANALİZİ</div>
	<hr>
<div class="poliklinikler">
	<ul>
	<li><a href="#">POLİKLİNİKLERİMİZ</a>
	<ul>
	<li><a href="#">Dahiliye</a></li>
	<li><a href="#">KBB</a></li>
	<li><a href="#">Dermatoloji</a></li>
	<li><a href="#">Fizik Tedavi ve Rehabilitasyon</a></li>
	<li><a href="#">Ortopedi</a></li>
	<li><a href="#">Kardiyoloji</a></li>
	<li><a href="#">Nöroloji</a></li>
    <li><a href="#">Göğüs Hastalıkları</a></li>
	<li><a href="#">Kalp Damar Cerrahisi</a></li>
	<li><a href="#">Kadın Doğum</a></li>
	<li><a href="#">Üroloji</a></li>
	<li><a href="#">Genel Cerrahi</a></li>
	<br>
	</ul>
</li>
</ul>
    <div class="hastakayit"><a href="kayit.php">HASTA KAYIT BİLGİSİ</a></div>
    <br>
    <div class="cagri"><a href="cagri.php">ÇAĞRI KAYDI</a></div>
    <br>
	<div class="doktorlar"><a href="doktorlar.php">DOKTORLARIMIZ</a></div>
	<br>
	<div class="hakkimizda"><a href="#">HAKKIMIZDA</a></div>
	<br>
	<div class="anket"><a href="#">ANKETLER</a></div>
	<br>
	<div class="iletisim"><a href="#">İLETİŞİM</a></div>
	<br>
	<div class="cikis"><a href="logout.php">ÇIKIŞ YAP</a></div>
</div>
</div>
<div class="content">
<div class="header">
<div class="headerLeft">
<i></i>
<span><a href="main.php" style="text-decoration:none; color: white;">Anasayfa</span>
<span></span>
<input type="text">
</div>
<div class="headermenu">

</div>
</div>
<div class="icerik">
<table class="table table-bordered  table-hover table-striped table">
    
    <tr>
    	<th>Hasta_ID</th>
        <th> HastaAdı</th>
        <th> Hasta Soyadı</th>
        <th>Doğum Tarihi</th>
        <th>Tetkik Ad</th>
        <th>Tetkik ID</th>
        <th>Sil</th>
        <th>Düzenle</th>
        <th><a href="hasta_ekle.php" class="btn btn-success">Ekle</a></th>
       
    </tr>



<?php 
$baglanti=mysqli_connect("localhost","root","","kds_proje");
	$baglanti->set_charset("utf8");
	$baglanti->query('SET NAMES utf8');

$sorgu = $baglanti->query("SELECT * FROM hasta,tetkik,ek WHERE hasta.hasta_id=ek.hasta_id and ek.tetkik_id=tetkik.tetkik_id order by hasta.hasta_id" ); 

while ($sonuc = $sorgu->fetch_assoc()) { 

$hasta_id = $sonuc['hasta_id']; 
$hasta_ad = $sonuc['hasta_ad'];
$hasta_soyad = $sonuc['hasta_soyad'];
$hasta_dogum_tarihi = $sonuc['hasta_dogum_tarihi'];
$tetkik_id=	$sonuc['tetkik_id'];
$tetkik_ad=	$sonuc['tetkik_ad'];

?>
    
    <tr>
        <td><?php echo $hasta_id; ?></td>
        <td><?php echo $hasta_ad; ?></td>
        <td><?php echo $hasta_soyad; ?></td>
        <td><?php echo $hasta_dogum_tarihi; ?></td>
        <td><?php echo $tetkik_ad; ?></td>
        <td><?php echo $tetkik_id;?></td>
        <td><a href="#" class="btn btn-danger">Sil</a></td>
        <td><a href="#" class="btn btn-primary">Güncelle</a></td>     
    </tr>

<?php 
} 

?>

</table>

</div>

</div>
</div>
</body>
<script>



	$("#ara").click(function(){
	$.post("ara.php",{
	kelime:$(".arama").val()
	},
	function(data,status){
		console.log(data);
	}
	)
});	

</script>
<script>
	$.post("data.php",
	function(data){
		console.log(data);
	});

</script>
</html>








