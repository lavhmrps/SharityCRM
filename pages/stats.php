<?php
session_start();

include '../phpBackend/checkSession.php';
include '../phpBackend/connect.php';

?>

<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sharity</title>
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Custom CSS -->
    <link href="../css/scrolling-nav.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet"/>
    <link href="../css/fonts.css" rel="stylesheet"/>
    <link href="../css/main-theme.css" rel="stylesheet" type="text/css" title="default" />
    <link href="../css/alternate-theme-1.css" rel="stylesheet" type="text/css" title="alternate" />
    <link href="../css/alternate-theme-2.css" rel="stylesheet" type="text/css" title="alternate2" />
    <link href="../css/alternate-theme-3.css" rel="stylesheet" type="text/css" title="alternate3" />
    <link href="../css/datepicker.css" rel="stylesheet"/>

    <!-- Scripts -->
    <script src="../js/styleswitcher.js" type="text/javascript" ></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="../js/Chart.min.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script><script>
    $(document).ready(function(){

      var ctx = $('#statistikk').get(0).getContext('2d');
      var myLine = new Chart(ctx).Line(lineChartData, {
        responsive: true,
        scaleGridLineColor : "#999",
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines: false,
    });
      $(document).ready(function(){
  var canvas = document.getElementById("statistikk");

  canvas.style.width = '755px';

});



      $('#statistikk').hide();
      $('#incomeYear').hide();
      $('#donationsYear').hide();
      $('#followersYear').hide();
      $('#incomeMnd').hide();
      $('#donationsMnd').hide();
      $('#followersMnd').hide();
      $('input[name=date]').hide();
      $('input[name=date2]').hide();
      $('input[name=date3]').hide();


      $('select').change(function(){

        var index = $('select').val();
        if(index == 0){
            $('input[name=date3]').show();
            $('input[name=date]').hide();
            $('input[name=date2]').hide();
            $('#left').hide();
            $('#middle').hide();
            $('#out').hide();
        }
        else if(index == 1){
            $('input[name=date2]').show();
            $('input[name=date]').hide();
            $('input[name=date3]').hide();
            $('#left').show();
            $('#middle').show();
            $('#incomeYear').hide();
            $('#donationsYear').hide();
            $('#followersYear').hide();
            $('#out').hide();
        }
        else if(index == 2){
            $('input[name=date]').show();
            $('input[name=date2]').hide();
            $('input[name=date3]').hide();
            $('#left').show();
            $('#middle').show();
            $('#incomeMnd').hide();
            $('#donationsMnd').hide();
            $('#followersMnd').hide();
            $('#out').hide();
        }
        else if(index == 3){
            window.location.replace("../pages/comparison.php");
        }
    });

$("#incomeYear").click(function(){
   if ($('input[name=date]').val() == ""){
    alert("Angi dato!");
}else{
    showLineChartIncomeYear();
    $('#statistikk').show();
}
});

$("#donationsYear").click(function(){
    if ($('input[name=date]').val() == ""){
        alert("Angi dato!");
    }else{
        showLineChartDonationsYear();
        $('#statistikk').show();
    }
});

$("#followersYear").click(function(){
    if ($('input[name=date]').val() == ""){
        alert("Angi dato!");
    }else{
        showLineChartFollowersYear();
        $('#statistikk').show();
    }
});

$('#datepickerYear').datepicker({
    format: "yyyy",
    weekStart: 1,
    startView: 1,
    minViewMode: 2,
    language: "no",
    todayHighlight: true
});
$('#datepickerYear').on('changeDate', function(ev){
    $(this).datepicker('hide');
    year();
    $('#statistikk').hide();
    $('#incomeYear').show();
    $('#donationsYear').show();
    $('#followersYear').show();
    $('#out').show();
});

$('#datepickerMnd').datepicker({
    format: "yyyy-mm",
    weekStart: 1,
    startView: 0,
    minViewMode: 1,
    language: "no",
    todayHighlight: true
});
$('#datepickerMnd').on('changeDate', function(ev){
    $(this).datepicker('hide');
    mnd();
    $('#statistikk').hide();
    $('#incomeMnd').show();
    $('#donationsMnd').show();
    $('#followersMnd').show();
    $('#out').show();
});

$('#datepickerDay').datepicker({
    format: "yyyy-mm-dd",
    weekStart: 1,
    startView: 0,
    minViewMode: 0,
    language: "no",
    todayHighlight: true
});
$('#datepickerDay').on('changeDate', function(ev){
    $(this).datepicker('hide');
    day();
    $('#statistikk').hide();
    $('#out').show();
});

function day(){
    var day = $('input[name=date3]').val();
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("out").innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open("GET", "../phpBackend/OrgStat/day.php?date=" + day, true);
    xmlhttp.send();
}

function mnd(){
    var day = $('input[name=date2]').val() + '-01';

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("out").innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open("GET", "../phpBackend/OrgStat/month.php?date=" + day, true);
    xmlhttp.send();
}

function year(){
    var day = $('input[name=date]').val();
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("out").innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open("GET", "../phpBackend/OrgStat/year.php?date=" + day, true);
    xmlhttp.send();
}


function showLineChartIncomeYear(){

    var day = $('input[name=date]').val();

    var sumJan = 0;
    var sumFeb = 0;
    var sumMar = 0;
    var sumApr = 0;
    var sumMay = 0;
    var sumJun = 0;
    var sumJul = 0;
    var sumAug = 0;
    var sumSep = 0;
    var sumOkt = 0;
    var sumNov = 0;
    var sumDec = 0;

    $.ajax({
        url : "../phpBackend/getStatistics.php?date=" + day,
        dataType : "json",
        success : function(response){
            var sum = 0;
            var content = "";

            for(var i = 0; i < response.length; i++){
                var y = parseInt(response[i]['date'].substring(0, 4));
                var m = parseInt(response[i]['date'].substring(5, 7));
                var d = parseInt(response[i]['date'].substring(8, 10));

                switch(m){
                    case 1:
                    sumJan += parseInt(response[i]['sum']);
                    break;
                    case 2:
                    sumFeb += parseInt(response[i]['sum']);
                    break;
                    case 3:
                    sumMar += parseInt(response[i]['sum']);
                    break;
                    case 4:
                    sumApr += parseInt(response[i]['sum']);
                    break;
                    case 5:
                    sumMay += parseInt(response[i]['sum']);
                    break;
                    case 6:
                    sumJun += parseInt(response[i]['sum']);
                    break;
                    case 7:
                    sumJul += parseInt(response[i]['sum']);
                    break;
                    case 8:
                    sumAug += parseInt(response[i]['sum']);
                    break;
                    case 9:
                    sumSep += parseInt(response[i]['sum']);
                    break;
                    case 10:
                    sumOkt += parseInt(response[i]['sum']);
                    break;
                    case 11:
                    sumNov += parseInt(response[i]['sum']);
                    break;
                    case 12:
                    sumDec += parseInt(response[i]['sum']);
                    break;
                }
            }

            myLine.datasets[0].points[0].value = sumJan;
            myLine.datasets[0].points[1].value = sumFeb;
            myLine.datasets[0].points[2].value = sumMar;
            myLine.datasets[0].points[3].value = sumApr;
            myLine.datasets[0].points[4].value = sumMay;
            myLine.datasets[0].points[5].value = sumJun;
            myLine.datasets[0].points[6].value = sumJul;
            myLine.datasets[0].points[7].value = sumAug;
            myLine.datasets[0].points[8].value = sumSep;
            myLine.datasets[0].points[9].value = sumOkt;
            myLine.datasets[0].points[10].value = sumNov;
            myLine.datasets[0].points[11].value = sumDec;
                    // Would update the first dataset
                    myLine.update();

                },
                error : function(){
                    alert("Something went worng");
                }
            });   
}

function showLineChartDonationsYear(){
    var day = $('input[name=date]').val();

    var sumJan = 0;
    var sumFeb = 0;
    var sumMar = 0;
    var sumApr = 0;
    var sumMay = 0;
    var sumJun = 0;
    var sumJul = 0;
    var sumAug = 0;
    var sumSep = 0;
    var sumOkt = 0;
    var sumNov = 0;
    var sumDec = 0;

    $.ajax({
        url : "../phpBackend/getStatistics.php?date=" + day,
        dataType : "json",
        success : function(response){
            var sum = 0;
            var content = "";

            for(var i = 0; i < response.length; i++){
                var y = parseInt(response[i]['date'].substring(0, 4));
                var m = parseInt(response[i]['date'].substring(5, 7));
                var d = parseInt(response[i]['date'].substring(8, 10));

                switch(m){
                    case 1:
                    sumJan += 1;
                    break;
                    case 2:
                    sumFeb += 1;
                    break;
                    case 3:
                    sumMar += 1;
                    break;
                    case 4:
                    sumApr += 1;
                    break;
                    case 5:
                    sumMay += 1;
                    break;
                    case 6:
                    sumJun += 1;
                    break;
                    case 7:
                    sumJul += 1;
                    break;
                    case 8:
                    sumAug += 1;
                    break;
                    case 9:
                    sumSep += 1;
                    break;
                    case 10:
                    sumOkt += 1;
                    break;
                    case 11:
                    sumNov += 1;
                    break;
                    case 12:
                    sumDec += 1;
                    break;
                }
            }

            myLine.datasets[0].points[0].value = sumJan;
            myLine.datasets[0].points[1].value = sumFeb;
            myLine.datasets[0].points[2].value = sumMar;
            myLine.datasets[0].points[3].value = sumApr;
            myLine.datasets[0].points[4].value = sumMay;
            myLine.datasets[0].points[5].value = sumJun;
            myLine.datasets[0].points[6].value = sumJul;
            myLine.datasets[0].points[7].value = sumAug;
            myLine.datasets[0].points[8].value = sumSep;
            myLine.datasets[0].points[9].value = sumOkt;
            myLine.datasets[0].points[10].value = sumNov;
            myLine.datasets[0].points[11].value = sumDec;
                    // Would update the first dataset
                    myLine.update();

                },
                error : function(){
                    alert("Something went wrong");
                }
            });  
}

function showLineChartFollowersYear(){

    var day = $('input[name=date]').val();

    var sumJan = 0;
    var sumFeb = 0;
    var sumMar = 0;
    var sumApr = 0;
    var sumMay = 0;
    var sumJun = 0;
    var sumJul = 0;
    var sumAug = 0;
    var sumSep = 0;
    var sumOkt = 0;
    var sumNov = 0;
    var sumDec = 0;

    $.ajax({
        url : "../phpBackend/getFollowers.php?date=" + day,
        dataType : "json",
        success : function(response){
            var sum = 0;
            var content = "";

            for(var i = 0; i < response.length; i++){
                var y = parseInt(response[i]['date'].substring(0, 4));
                var m = parseInt(response[i]['date'].substring(5, 7));
                var d = parseInt(response[i]['date'].substring(8, 10));

                switch(m){
                    case 1:
                    sumJan += 1;
                    break;
                    case 2:
                    sumFeb += 1;
                    break;
                    case 3:
                    sumMar += 1;
                    break;
                    case 4:
                    sumApr += 1;
                    break;
                    case 5:
                    sumMay += 1;
                    break;
                    case 6:
                    sumJun += 1;
                    break;
                    case 7:
                    sumJul += 1;
                    break;
                    case 8:
                    sumAug += 1;
                    break;
                    case 9:
                    sumSep += 1;
                    break;
                    case 10:
                    sumOkt += 1;
                    break;
                    case 11:
                    sumNov += 1;
                    break;
                    case 12:
                    sumDec += 1;
                    break;
                }
            }

            myLine.datasets[0].points[0].value = sumJan;
            myLine.datasets[0].points[1].value = sumFeb;
            myLine.datasets[0].points[2].value = sumMar;
            myLine.datasets[0].points[3].value = sumApr;
            myLine.datasets[0].points[4].value = sumMay;
            myLine.datasets[0].points[5].value = sumJun;
            myLine.datasets[0].points[6].value = sumJul;
            myLine.datasets[0].points[7].value = sumAug;
            myLine.datasets[0].points[8].value = sumSep;
            myLine.datasets[0].points[9].value = sumOkt;
            myLine.datasets[0].points[10].value = sumNov;
            myLine.datasets[0].points[11].value = sumDec;
                    // Would update the first dataset
                    myLine.update();

                },
                error : function(){
                    alert("Something went wrong");
                }
            });  
}

function showLineChartIncomeMnd(){
}

function showLineChartDonationsMnd(){
}

function showLineChartFollowersMnd(){
}


});


var lineChartData = {
    labels : ["January","February","March","April","May","June","July", "August", "September", "October", "November", "December"],
    datasets : [
    {
        label: "12 mnd",
        fillColor : "#1A324C", //farge under grafen
        strokeColor : "#1A324C", //farge på linja
        pointColor : "#fff", //farge på prikkene
        pointStrokeColor : "1A324C", // farge på border til prikkene
        pointHighlightFill : "green", //farge på prikk on hover
        pointHighlightStroke : "1A324C", // farge på border til prikk on hover
    data : [0,0,0,0,0,0,0,0,0,0,0,0]
}
]
}
var lineChartDataJan = {
    labels : ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"],
    datasets : [
    {
        label: "12 mnd",
                fillColor : "#1A324C", //farge under grafen
    strokeColor : "#1A324C", //farge på linja
    pointColor : "#fff", //farge på prikkene
    pointStrokeColor : "1A324C", // farge på border til prikkene
    pointHighlightFill : "green", //farge på prikk on hover
    pointHighlightStroke : "1A324C", // farge på border til prikk on hover
    data : [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]

}
]
}
var lineChartDataFeb29 = {
    labels : ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29"],
    datasets : [
    {
        label: "12 mnd",
        fillColor : "#1A324C", //farge under grafen
    strokeColor : "#1A324C", //farge på linja
   pointColor : "#fff", //farge på prikkene
    pointStrokeColor : "1A324C", // farge på border til prikkene
    pointHighlightFill : "green", //farge på prikk on hover
    pointHighlightStroke : "1A324C", // farge på border til prikk on hover
    data : [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]

}
]
}
var lineChartDataFeb = {
    labels : ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28"],
    datasets : [
    {
        label: "12 mnd",
            fillColor : "#1A324C", //farge under grafen
    strokeColor : "#1A324C", //farge på linja
    pointColor : "#fff", //farge på prikkene
    pointStrokeColor : "1A324C", // farge på border til prikkene
    pointHighlightFill : "green", //farge på prikk on hover
    pointHighlightStroke : "1A324C", // farge på border til prikk on hover
    data : [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]

}
]
}
var lineChartDataMar = {
    labels : ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"],
    datasets : [
    {
        label: "12 mnd",
        fillColor : "#1A324C", //farge under grafen
    strokeColor : "#1A324C", //farge på linja
    pointColor : "#fff", //farge på prikkene
    pointStrokeColor : "1A324C", // farge på border til prikkene
    pointHighlightFill : "green", //farge på prikk on hover
    pointHighlightStroke : "1A324C", // farge på border til prikk on hover
    data : [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]

}
]
}
var lineChartDataApr = {
    labels : ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"],
    datasets : [
    {
        label: "12 mnd",
        fillColor : "#1A324C", //farge under grafen
    strokeColor : "#1A324C", //farge på linja
    pointColor : "#fff", //farge på prikkene
    pointStrokeColor : "1A324C", // farge på border til prikkene
    pointHighlightFill : "green", //farge på prikk on hover
    pointHighlightStroke : "1A324C", // farge på border til prikk on hover
    data : [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]

}
]
}
var lineChartDataMay = {
    labels : ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"],
    datasets : [
    {
        label: "12 mnd",
         fillColor : "#1A324C", //farge under grafen
    strokeColor : "#1A324C", //farge på linja
    pointColor : "#fff", //farge på prikkene
    pointStrokeColor : "1A324C", // farge på border til prikkene
    pointHighlightFill : "green", //farge på prikk on hover
    pointHighlightStroke : "1A324C", // farge på border til prikk on hover
    data : [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]

}
]
}
var lineChartDataJun = {
    labels : ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"],
    datasets : [
    {
        label: "12 mnd",
        fillColor : "#1A324C", //farge under grafen
    strokeColor : "#1A324C", //farge på linja
    pointColor : "#fff", //farge på prikkene
    pointStrokeColor : "1A324C", // farge på border til prikkene
    pointHighlightFill : "green", //farge på prikk on hover
    pointHighlightStroke : "1A324C", // farge på border til prikk on hover
    data : [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]

}
]
}
var lineChartDataJul = {
    labels : ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"],
    datasets : [
    {
        label: "12 mnd",
           fillColor : "#1A324C", //farge under grafen
    strokeColor : "#1A324C", //farge på linja
    pointColor : "#fff", //farge på prikkene
    pointStrokeColor : "1A324C", // farge på border til prikkene
    pointHighlightFill : "green", //farge på prikk on hover
    pointHighlightStroke : "1A324C", // farge på border til prikk on hover
    data : [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]

}
]
}
var lineChartDataAug = {
    labels : ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"],
    datasets : [
    {
        label: "12 mnd",
        fillColor : "#1A324C", //farge under grafen
    strokeColor : "#1A324C", //farge på linja
    pointColor : "#fff", //farge på prikkene
    pointStrokeColor : "1A324C", // farge på border til prikkene
    pointHighlightFill : "green", //farge på prikk on hover
    pointHighlightStroke : "1A324C", // farge på border til prikk on hover
    data : [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]

}
]
}
var lineChartDataSep = {
    labels : ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"],
    datasets : [
    {
        label: "12 mnd",
         fillColor : "#1A324C", //farge under grafen
    strokeColor : "#1A324C", //farge på linja
    pointColor : "#fff", //farge på prikkene
    pointStrokeColor : "1A324C", // farge på border til prikkene
    pointHighlightFill : "green", //farge på prikk on hover
    pointHighlightStroke : "1A324C", // farge på border til prikk on hover
    data : [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]

}
]
}
var lineChartDataOkt = {
    labels : ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"],
    datasets : [
    {
        label: "12 mnd",
        fillColor : "#1A324C", //farge under grafen
    strokeColor : "#1A324C", //farge på linja
    pointColor : "#fff", //farge på prikkene
    pointStrokeColor : "1A324C", // farge på border til prikkene
    pointHighlightFill : "green", //farge på prikk on hover
    pointHighlightStroke : "1A324C", // farge på border til prikk on hover
    data : [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]

}
]
}
var lineChartDataNov = {
    labels : ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"],
    datasets : [
    {
        label: "12 mnd",
        fillColor : "#1A324C", //farge under grafen
    strokeColor : "#1A324C", //farge på linja
   pointColor : "#fff", //farge på prikkene
    pointStrokeColor : "1A324C", // farge på border til prikkene
    pointHighlightFill : "green", //farge på prikk on hover
    pointHighlightStroke : "1A324C", // farge på border til prikk on hover
    data : [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]

}
]
}
var lineChartDataDec = {
    labels : ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"],
    datasets : [
    {
        label: "12 mnd",
        fillColor : "#1A324C", //farge under grafen
    strokeColor : "#1A324C", //farge på linja
    pointColor : "#fff", //farge på prikkene
    pointStrokeColor : "1A324C", // farge på border til prikkene
    pointHighlightFill : "green", //farge på prikk on hover
    pointHighlightStroke : "1A324C", // farge på border til prikk on hover
    data : [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]

}
]
}
</script>
</head>
<body>
    <?php
    include 'header_nav.php';
    ?>
    <div class="container">

        <div class="col-md-12" id="statschooser">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
               <div class="input-append date">
                <div class="col-md-6">


                    <select id="choosecriteria">
                        <option value="NULL">Velg statistikktype</option>
                        <option value="0">Dag</option>
                        <option value="1">Mnd</option>
                        <option value="2">År</option>
                        <option value="3">Sammenlign</option>
                    </select>
                </div>
                <div class="col-md-3" id="inputdatepadding">
                    <input class="span2" name="date" size="16" type="text" id="datepickerYear" readonly="readonly" />
                    <input class="span2" name="date2" size="16" type="text" id="datepickerMnd" readonly="readonly" />
                    <input class="span2" name="date3" size="16" type="text" id="datepickerDay" readonly="readonly" />
                </div>
                <div class="col-md-3" id="inputdatepadding">
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

    <div class="row" id="statschooser">
        <div class="col-md-3"></div>
        <div class="col-md-2">
            <input id="incomeYear" type="button" value="Kroner donert" class="form-control">
            <input id="incomeMnd" type="button" value="Kroner donert" class="form-control">
        </div>
        <div class="col-md-2">
            <input id="donationsYear" type="button" value="Antall donasjoner" class="form-control">
            <input id="donationsMnd" type="button" value="Antall donasjoner" class="form-control">
        </div>
        <div class="col-md-2">
            <input id="followersYear" type="button" value="Nye følgere" class="form-control">
            <input id="followersMnd" type="button" value="Nye følgere" class="form-control">
        </div>
        <div class="col-md-3"></div>
    </div>


    <div class="col-md-8" id="statbox-1">
       <canvas id="statistikk">
       </canvas>
   </div>


   <div class="col-md-4" id="statbox-2">

       <span id="out"></span> 

   </div>
</div>
</div>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>