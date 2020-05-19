<!DOCTYPE html>
<html>
<?php
    include_once("config.php");

$result = mysqli_query($conn, "SELECT Monthname(bulan) as bulan,siupBesar,
    siupMenengah,siupKecil,siupMikro FROM data ORDER BY MONTH(bulan)");

$bulan="";
$siupBesar="";
$siupMenengah="";
$siupKecil="";
$siupMikro="";
while($res = mysqli_fetch_array($result)){
    $bulan=$bulan."'".$res['bulan']."',";
    $siupBesar=$siupBesar."'".$res['siupBesar']."',";
    $siupMenengah=$siupMenengah."'".$res['siupMenengah']."',";
    $siupKecil=$siupKecil."'".$res['siupKecil']."',";
    $siupMikro=$siupMikro."'".$res['siupMikro']."',";
}
echo "<script class='code-js' id='code-js'>
var data = {
    categories: [$bulan],
    series: [
        {
            name: 'Siup Besar',
            data: [$siupBesar]
        },
        {
            name: 'Siup Menengah',
            data: [$siupMenengah]
        },
        {
            name: 'Siup Kecil',
            data: [$siupKecil]
        },
        {
            name: 'Siup Mikro',
            data: [$siupMikro]
        }
    ]
};
</script>";
?>
<head lang="kr">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <title>Grafik Kedua Saya</title>
    <link rel="stylesheet" type="text/css" href="./dist/tui-chart.css" />
    <link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/codemirror.css'/>
    <link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/lint/lint.css'/>
    <link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/theme/neo.css'/>
    <link rel="stylesheet" type="text/css" href="./css/example.css" />
</head>
<body>
<div class='wrap'>
    <div class='code-html' id='code-html'>
        <div id='chart-area'></div>
    </div>
</div>
<script type='text/javascript' src='https://uicdn.toast.com/tui.chart/latest/raphael.js'></script>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/core-js/2.5.7/core.js'></script>
<script src='./dist/tui-chart.js'></script>
<script class='code-js' id='code-js'>
var container = document.getElementById('chart-area');
var data = {
    categories: ['Januari','Februari','Maret','April','May','Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November','Desember',],
    series: [
        {
            name: 'Siup Besar',
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1]
        },
        {
            name: 'Siup Menengah',
            data: [2, 4, 5, 4, 7, 10, 0, 5, 7, 2, 6, 3]
        },
        {
            name: 'Siup Kecil',
            data: [13, 21, 21, 23, 26, 32, 15, 23, 32, 26, 25, 19]
        },
        {
            name: 'Siup Mikro',
            data: [4, 7, 5, 6, 7, 6, 4, 10, 8, 3, 3, 1]
        }
    ]
};
var options = {
    chart: {
        width: 1160,
        height: 650,
        title: 'Data SIUP Kota Batu 2016',
    },
    yAxis: {
        title: 'Data'
    },
    xAxis: {
        title: 'Bulan',
        min: 0,
        max: 40,
    },
     series: {
         showLabel: true
     }
};
var theme = {
    series: {
        colors: [
            '#83b14e', '#458a3f', '#295ba0', '#2a4175', '#289399',
            '#289399', '#617178', '#8a9a9a', '#516f7d', '#dddddd'
        ]
    }
};

// For apply theme

// tui.chart.registerTheme('myTheme', theme);
// options.theme = 'myTheme';

tui.chart.lineChart(container, data, options);
</script>

<!--For tutorial page-->
<script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/codemirror.js'></script>
<script src='//ajax.aspnetcdn.com/ajax/jshint/r07/jshint.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/edit/matchbrackets.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/selection/active-line.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/mode/javascript/javascript.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/lint/lint.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/lint/javascript-lint.js'></script>
<script src='./js/example.js'></script>

</body>
</html>
