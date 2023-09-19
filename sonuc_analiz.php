<?php
require'baglan.php';


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <style>
  body{
    background-color: #D7DCE2;
    text-align:center; 
    position: absolute;
    left: 400px;
    width: 600px;
    height: 400px;
  }
    
 
  </style>
</head>
<body>
 <button type="button" class="btn btn-danger btn-sm" style="margin-left: -1350px; margin-top: 10px;"><a href="main.php">Geri</a></button>

<div class="container">


<h4> Toplam Doluluk Oranı En Fazla Olan 2 Poliklinik</h4>
<table class="table table-condensed table-bordered table-hover" style="width: 600px; height: 90px; border:2px;">
<thead>
<tr>
<th>Poliklinik Adı</th>
<th>Hasta Sayısı</th>

</tr>
</thead>
<tbody>
<?php 
$baglanti=mysqli_connect("localhost","root","","kds_proje");
  $baglanti->set_charset("utf8");
  $baglanti->query('SET NAMES utf8');

$sorgu = $baglanti->query("SELECT poliklinik.poliklinik_ad as ad,COUNT(hasta.hasta_id) as hasta_sayisi
FROM hasta,poliklinik,randevu
WHERE randevu.poliklinik_id=poliklinik.poliklinik_id AND randevu.hasta_id=hasta.hasta_id  
GROUP BY poliklinik.poliklinik_id
ORDER BY hasta_sayisi DESC 
LIMIT 2"); 

while ($sonuc = $sorgu->fetch_assoc()) { 
$ad=  $sonuc['ad'];
$hasta_sayisi = $sonuc['hasta_sayisi']; 



?>
    
    <tr>
      <td><?php echo $ad; ?></td>
        <td><?php echo $hasta_sayisi; ?></td>
    
        </tr>

<?php 
} 

?>
</div>
</tbody>
</table>

<h4>Toplam Doluluk Oranı En Az Olan Poliklinik</h4>
<table class="table table-condensed table-bordered table-hover" style="width: 600px; height: 90px; border:2px;">
<thead>
<tr>
<th>Poliklinik Adı</th>
<th>Hasta Sayısı</th>

</tr>
</thead>
<tbody>
<?php 
$baglanti=mysqli_connect("localhost","root","","kds_proje");
  $baglanti->set_charset("utf8");
  $baglanti->query('SET NAMES utf8');

$sorgu = $baglanti->query("SELECT poliklinik.poliklinik_ad as ad,COUNT(hasta.hasta_id) as hasta_sayisi
FROM poliklinik,hasta,randevu
WHERE poliklinik.poliklinik_id=randevu.poliklinik_id AND hasta.hasta_id=randevu.hasta_id
GROUP BY poliklinik.poliklinik_id
HAVING hasta_sayisi=(SELECT MIN(toplam) FROM(SELECT COUNT(hasta.hasta_id) as toplam 
FROM poliklinik,hasta,randevu 
WHERE poliklinik.poliklinik_id=randevu.poliklinik_id AND hasta.hasta_id=randevu.hasta_id 
GROUP BY poliklinik.poliklinik_id) as sonuc)"); 

while ($sonuc = $sorgu->fetch_assoc()) { 
$ad= $sonuc['ad'];
$hasta_sayisi = $sonuc['hasta_sayisi']; 



?>
    
    <tr>
      <td><?php echo $ad; ?></td>
        <td><?php echo $hasta_sayisi; ?></td>
    
        </tr>

<?php 
} 

?>
</div>
</tbody>
</table>

<br>

<h4> Toplamda En Fazla Yapılan 2 Tetkik</h4>
<table class="table table-condensed table-bordered table-hover" style="width: 600px; height: 90px; border:2px;">
<thead>
<tr>
<th>Tetkik Adı</th>
<th>Hasta Sayısı</th>

</tr>
</thead>
<tbody>
<?php 
$baglanti=mysqli_connect("localhost","root","","kds_proje");
  $baglanti->set_charset("utf8");
  $baglanti->query('SET NAMES utf8');

$sorgu = $baglanti->query("SELECT tetkik.tetkik_ad as ad,COUNT(hasta.hasta_id) as hasta_sayisi
FROM tetkik,ek,hasta
WHERE tetkik.tetkik_id=ek.tetkik_id AND ek.hasta_id=hasta.hasta_id
GROUP BY tetkik.tetkik_id
ORDER BY hasta_sayisi DESC
LIMIT 2"); 

while ($sonuc = $sorgu->fetch_assoc()) { 
$ad=  $sonuc['ad'];
$hasta_sayisi = $sonuc['hasta_sayisi']; 



?>
    
    <tr>
      <td><?php echo $ad; ?></td>
        <td><?php echo $hasta_sayisi; ?></td>
    
        </tr>

<?php 
} 

?>
</div>
</tbody>
</table>

<h4> Toplamda En Az Yapılan Tetkik</h4>
<table class="table table-condensed table-bordered table-hover" style="width: 600px; height: 90px; border:2px;">
<thead>
<tr>
<th>Tetkik Adı</th>
<th>Hasta Sayısı</th>

</tr>
</thead>
<tbody>
<?php 
$baglanti=mysqli_connect("localhost","root","","kds_proje");
  $baglanti->set_charset("utf8");
  $baglanti->query('SET NAMES utf8');

$sorgu = $baglanti->query("SELECT tetkik.tetkik_ad as ad,COUNT(hasta.hasta_id) as hasta_sayisi
FROM tetkik,ek,hasta 
WHERE tetkik.tetkik_id=ek.tetkik_id AND hasta.hasta_id=ek.hasta_id
GROUP BY tetkik.tetkik_id
HAVING hasta_sayisi=(SELECT MIN(toplam) FROM(SELECT COUNT(hasta.hasta_id) as toplam FROM tetkik,ek,hasta WHERE tetkik.tetkik_id=ek.tetkik_id AND hasta.hasta_id=ek.hasta_id
GROUP BY tetkik.tetkik_id) as sonuc)"); 

while ($sonuc = $sorgu->fetch_assoc()) { 
$ad=  $sonuc['ad'];
$hasta_sayisi = $sonuc['hasta_sayisi']; 



?>
    
    <tr>
      <td><?php echo $ad; ?></td>
        <td><?php echo $hasta_sayisi; ?></td>
    
        </tr>

<?php 
} 

?>
</div>
</tbody>
</table>


<br>
<br>

<h4> Başvurup Hizmet Alamayan Poliklinikler </h4>
<p style="color: red;">Buna göre karşılaştırma yapılıp hangi poliklinikten açmamız için adımlar atılsın.</p>
<table class="table table-condensed table-bordered table-hover" id="table_2" style="width: 600px; height: 90px; border:2px;">
<thead>
<tr>
<th>Poliklinik Adı</th>
<th>Hasta Sayısı</th>

</tr>
</thead>
<tbody>
<?php 
$baglanti=mysqli_connect("localhost","root","","kds_proje");
  $baglanti->set_charset("utf8");
  $baglanti->query('SET NAMES utf8');

$sorgu = $baglanti->query("SELECT poliklinik_cevapsiz.poliklinik_adi as ad,COUNT(poliklinik_cevapsiz.cevap_id) as hasta_sayisi
FROM poliklinik_cevapsiz
GROUP BY poliklinik_cevapsiz.poliklinik_id
ORDER BY hasta_sayisi DESC
LIMIT 2"); 

while ($sonuc = $sorgu->fetch_assoc()) { 
$ad=  $sonuc['ad'];
$hasta_sayisi = $sonuc['hasta_sayisi']; 



?>
    
    <tr>
      <td><?php echo $ad; ?></td>
        <td><?php echo $hasta_sayisi; ?></td>
    
        </tr>

<?php 
} 

?>
</div>
</tbody>
</table>

</div>




    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <div id="bar_div"></div>
<script type="text/javascript">
       google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Yıllar', '2018', '2019', '2020'],
          ['10A7132',  165,      938,         522],
          ['10B7135',  135,      1120,        599]
        ]);

        var options = {
          title : 'Çağrı Kaydı Oranları',
          vAxis: {title: 'Oranlar'},
          hAxis: {title: 'Ambulans Plakaları'},
          colors:['red','blue','orange'],
      seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('bar_div'));
        chart.draw(data, options);
      }
  </script>

<br>
<br>

      <script type="text/javascript">
       google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Yıllar', '2018', '2019', '2020'],
          ['10A7132',  9,      18,         26],
          ['10B7135',  7,      16,        21]
        ]);

        var options = {
          title : 'Çağrı Kaydı Oranları',
          vAxis: {title: 'Oranlar'},
          hAxis: {title: 'Ambulans Plakaları'},
          colors:['red','blue','orange'],
      seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('bar_div'));
        chart.draw(data, options);
      }
  </script>
  <p style="color: red;">Daha çok hastaya ulaşmak için çalışmalara başlansın...</p>
   <div id="column_div"></div>
  <script type="text/javascript">
     google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Yıllar', '2018', '2019', '2020'],
          ['10A7132',  11,      28,         32],
          ['10B7135',  6,      22,        35]
        ]);

        var options = {
          title : 'Cevap Verilmeyen Çağrı Kaydı Oranları',
          vAxis: {title: 'Oranlar'},
          hAxis: {title: 'Ambulans Plakaları'},
          colors:['red','blue','orange'],
      seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('column_div'));
        chart.draw(data, options);
      }


</script> 


	
	


</body> 
</html>
</body>
</html>
