<?php

require'baglan.php';

$cagri = "SELECT ambulans.plaka as Plaka, COUNT(cagri.cagri_id) as 'Çağrı Sayısı'
FROM cagri, ambulans, has_amblns
WHERE cagri.cagri_kayit_tarihi<'2021-01-01' AND cagri.cagri_kayit_tarihi>'2020-01-01' AND ambulans.plaka=has_amblns.plaka AND has_amblns.cagri_id=cagri.cagri_id
GROUP BY ambulans.plaka";
$kat = $baglan->query($cagri);

$poliklinik="SELECT poliklinik.poliklinik_ad as poliklinik,COUNT(hasta.hasta_id) as hasta_sayisi
FROM hasta,doktor,poliklinik,tetkik,hasta_tetkik
WHERE hasta.doktor_id=doktor.doktor_id AND doktor.poliklinik_id=poliklinik.poliklinik_id AND hasta.hasta_id=hasta_tetkik.hasta_id AND tetkik.tetkik_id=hasta_tetkik.tetkik_id AND hasta_tetkik.tetkik_tarih<'2019-01-01' AND hasta_tetkik.tetkik_tarih>'2018-01-01'
GROUP BY poliklinik.poliklinik_id";
$mik= $baglan->query($poliklinik);

?>

<!DOCTYPE html>
<html>
<head>
  <title>2018 YILI Grafikleri</title>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <style>
h1{
  text-align: center;
}

  </style>
  <button type="button" class="btn btn-danger btn-sm" style="margin-left: 5px; margin-top: 10px;"><a href="main.php">Geri</a></button>
  <h1>2018 YILI ANALİZLERİ</h1>

  <script>
    window.onload = function () {
    
    var chart = new CanvasJS.Chart("chartContainer", {
        exportEnabled: true,
        animationEnabled: true,
        title:{
            text: "Ambulans Plakaları ve Çağrı Oranları"
        },
        legend:{
            cursor: "pointer",
            itemclick: explodePie
        },
        data: [{
            type: "pie",
            showInLegend: true,
            toolTipContent: "{name}: <strong>{y}%</strong>",
            indexLabel: "{name} - {y}%",
            dataPoints: [
                { y: 26, name: "42AA35", exploded: true },
                { y: 20, name: "Medical Aid" },
                { y: 5, name: "Debt/Capital" },
                { y: 3, name: "Elected Officials" },
                { y: 7, name: "University" },
                { y: 17, name: "Executive" },
                { y: 22, name: "Other Local Assistance"}
            ]
        }]
    });
    chart.render();
    }
    
    function explodePie (e) {
        if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
        } else {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
        }
        e.chart.render();
    
    }
    </script>

</head>
<body>
  <center>
<div class="col-sm-12 col-md-6">
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
  </div>
  </center>
  <center>
<div id="chart_div" style="width: 900px; height:600px;"></div>
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
        title: '2018 Yılı polikliniklere giden Hasta Oranları',
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
$baglanti=mysqli_connect("localhost","root","","kds_proje");
  $baglanti->set_charset("utf8");
  $baglanti->query('SET NAMES utf8');

$sorgu = $baglanti->query("SELECT cagri_verilmeyen.plaka_no,COUNT(cagri_verilmeyen.cagri_id) as cevap_verilmeyen
FROM cagri_verilmeyen
WHERE cagri_verilmeyen.tarih<'2019-01-01' AND cagri_verilmeyen.tarih>'2018-01-01'
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
$baglanti=mysqli_connect("localhost","root","","kds_proje");
  $baglanti->set_charset("utf8");
  $baglanti->query('SET NAMES utf8');

$sorgu = $baglanti->query("SELECT poliklinik_cevap_verilmeyen.poliklinik_adi as ad,COUNT(poliklinik_cevap_verilmeyen.cevap_id) as hasta_sayisi
  FROM poliklinik_cevap_verilmeyen WHERE poliklinik_cevap_verilmeyen.tarih='2018-06-06' GROUP BY poliklinik_cevap_verilmeyen.poliklinik_id"); 

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

