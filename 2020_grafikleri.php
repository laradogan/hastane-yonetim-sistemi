<?php

require'baglan.php';

$cagri = "SELECT cagri_kaydi.plaka_no as plaka, COUNT(cagri_kaydi.kayit_id) as kayit_sayisi
FROM cagri_kaydi
WHERE cagri_kaydi.tarih<'2021-01-01' AND cagri_kaydi.tarih>'2020-01-01'
GROUP BY cagri_kaydi.plaka_no";
$kat = $baglan->query($cagri);

$poliklinik="SELECT poliklinik.poliklinik_ad as poliklinik,COUNT(hasta.hasta_id) as hasta_sayisi
FROM hasta,doktor,poliklinik,tetkik,hasta_tetkik
WHERE hasta.doktor_id=doktor.doktor_id AND doktor.poliklinik_id=poliklinik.poliklinik_id AND hasta.hasta_id=hasta_tetkik.hasta_id AND tetkik.tetkik_id=hasta_tetkik.tetkik_id AND hasta_tetkik.tetkik_tarih<'2021-01-01' AND hasta_tetkik.tetkik_tarih>'2020-01-01'
GROUP BY poliklinik.poliklinik_id";
$mik= $baglan->query($poliklinik);

?>

<!DOCTYPE html>
<html>
<head>
	<title>2020 YILI Grafikleri</title>
	<script src="https://www.gstatic.com/charts/loader.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<style>
h1{
	text-align: center;
}

	</style>
	<button type="button" class="btn btn-danger btn-sm" style="margin-left: 5px; margin-top: 10px;"><a href="main.php">Geri</a></button>
  <h1>2020 YILI ANALİZLERİ</h1>


</head>
<body>
  <center>
  <div class="col-sm-12 col-md-6">
  <div id="piechart" style=" width: 500px; height: 700px;"></div>
  </div>
    </script>
 <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Plaka', 'Kayıt Sayısı'],

          <?php
            while($row = $kat->fetch_assoc()){
                echo "['".$row["plaka"]."',".$row["kayit_sayisi"]."],";
            }



          ?>
        ]);

        var options = {
          title: 'Ambulans Plakaları ve Çağrı Oranları',
          backgroundColor:'white',
          colors:['red','blue']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    </center>
    <center>
<div id="chart_div" class="chart" style="width: 900px; height:600px;"></div>
  <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['poliklinik', 'hasta Oranı',],
        <?php
            while($row = $mik->fetch_assoc()){
                echo "['".$row["poliklinik"]."',".$row["hasta_sayisi"]."],";
            }



          ?>
        
      ]);

      var options = {
        title: '2020 Yılı polikliniklere giden Hasta Oranları',
        chartArea: {width: '50%'},
        colors:['orange'],
        hAxis: {
          minValue: 0
        },
        vAxis: {
          title: 'poliklinikler'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
    </script>
  </center>
  <center>
  <table class="table table-bordered table-hover table-striped table-sm table-danger"  style="width: 400px; height: 300px;">
  
    
    <tr>
      <th>Ambulans plaka no</th>
        <th>Dönüş Yapılamayan Çağrı Kaydı Sayısı</th>
        
    </tr>



<?php 
$baglanti=mysqli_connect("localhost","root","","2017469022");
  $baglanti->set_charset("utf8");
  $baglanti->query('SET NAMES utf8');

$sorgu = $baglanti->query("SELECT cagri_verilmeyen.plaka_no,COUNT(cagri_verilmeyen.cagri_id) as cevap_verilmeyen
FROM cagri_verilmeyen
WHERE cagri_verilmeyen.tarih<'2021-01-01' AND cagri_verilmeyen.tarih>'2020-01-01'
GROUP BY cagri_verilmeyen.plaka_no"); 

while ($sonuc = $sorgu->fetch_assoc()) { 
$plaka_no=  $sonuc['plaka_no'];
$cevap_verilmeyen = $sonuc['cevap_verilmeyen']; 



?>
    
    <tr>
      <td><?php echo $plaka_no; ?></td>
        <td><?php echo $cevap_verilmeyen; ?></td>
    
        </tr>

<?php 
} 

?>
</div>
</table>
</center>
<center>
  <table class="table table-bordered table-hover table-striped table-sm table-danger" style="width: 400px; height: 300px; ">
      <tr>
      <th>Poliklinikler</th>
        <th>Poliklinik Dönüş Alamayan Hasta Sayısı</th>
        
    </tr>



<?php 
$baglanti=mysqli_connect("localhost","root","","2017469022");
  $baglanti->set_charset("utf8");
  $baglanti->query('SET NAMES utf8');

$sorgu = $baglanti->query("SELECT poliklinik_cevap_verilmeyen.poliklinik_adi as ad,COUNT(poliklinik_cevap_verilmeyen.cevap_id) as hasta_sayisi
  FROM poliklinik_cevap_verilmeyen WHERE poliklinik_cevap_verilmeyen.tarih='2020-06-06' GROUP BY poliklinik_cevap_verilmeyen.poliklinik_id"); 

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
</table>
</center>


</body>
</html>
