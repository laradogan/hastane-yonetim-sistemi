<?php
setcookie('cookie_name', 'cookie_value');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>HASTA EKLE</title>
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
	background-color:#D7DCE2;
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

</style>

</head>
<body>
<div class="sidebar">
<div class="sidebarTop">Özel Nobel Hastanesi</div>
<br>
<div class="info">
	<img class="avatar"src="img/royal.jpg">
	<div class="infog">

		<span class="infoName">Lara D</span>
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
<span><a href="main.php" style="text-decoration:none; color: white;">Anasayfa</a></span>
<span></span>
<input type="text">
</div>
<div class="headermenu">

</div>
</div>
<div class="icerik">
	<div class="container">
		<div class="col-md-6">

	<form action="hasta_ekle_vt.php" method="POST">
	

	<label><b>Hasta ID</b></label>
	<input class="form-control" type="text" name="hasta_id">
	
	
	<label><b>Hasta Adı</b></label>
	<input class="form-control" type="text" name="hasta_ad">
	
	
	<label><b>Hasta Soyadı</b></label>
	<input  class="form-control" type="text" name="hasta_soyad">
	
	
	<label><b>Doğum Tarihi</b></label>
	<input class="form-control" type="text" name="hasta_dogum_tarihi">
	
	
	<label><b>Tetkik ID</b></label>
	<input class="form-control" type="text" name="tetkik_id">
	
	<br>
	

	<button class="form-control btn btn-warning" type="submit">Kaydet</button>
		







	</form>
	</div>
	</div>
	
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
