<?php
$this->registerJsFile("https://www.google.com/jsapi", ['position' => 1]);
$a1 = 1000;
$this->registerJs(" 
      function drawMap() {
        var data = google.visualization.arrayToDataTable([
          ['จังหวัด', 'จำนวน'],
          ['Bangkok', 2000],
          ['Phitsanulok', 2000],
          ['Phare', 1000],
          ['Nakonratchasrima', 1000],
          
        ]);

        var options = {};
        options['dataMode'] = 'regions';
        options['region']='TH';
        options['width']='1100px';
        options['height']='450px';
        options['showZoomOut']=true;

        var container = document.getElementById('regions_div');
        var geomap = new google.visualization.GeoMap(container);

        geomap.draw(data, options);
      };
        google.load(\"visualization\", \"1\", {packages:[\"geomap\"]});
      google.setOnLoadCallback(drawMap);

     ", yii\web\View::POS_HEAD);
?>



<div id="regions_div" ></div>