<?php
session_start();

include '../phpBackend/checkSession.php';
include '../phpBackend/connect.php';

?>

<html>
<head>
    <title></title>
    

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sharity</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../css/datepicker.css" rel="stylesheet"/>

    <!-- Custom CSS -->
    <link href="../css/scrolling-nav.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../css/index.css" />
    <link rel="stylesheet" type="text/css" href="../css/list_project.css">
    <link href="../css/main.css" rel="stylesheet"/>
    <link href="../css/fonts.css" rel="stylesheet"/>
    
    
    <link href="../css/main-theme.css" rel="stylesheet" type="text/css" title="default" />
    <link href="../css/alternate-theme-1.css" rel="stylesheet" type="text/css" title="alternate" />
    <link href="../css/alternate-theme-2.css" rel="stylesheet" type="text/css" title="alternate2" />
    <link href="../css/alternate-theme-3.css" rel="stylesheet" type="text/css" title="alternate3" />

    <script src="../js/Chart.min.js"></script>
    
    <script type="text/javascript" src="../js/styleswitcher.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    

    <script>
    $(document).ready(function(){
        $("p").hide();

        $("p").click(function(){
            alert("Her kommer sammenligning av dag/måned/år!");
            showChartDay();
        });
        $('#datepicker').datepicker({
                format: "yyyy-mm-dd",
                weekStart: 1,
                language: "no",
                todayHighlight: true
        });
        $('#datepicker').on('changeDate', function(ev){
            $(this).datepicker('hide');
            day();
            week();
            month();
            allTime();
            $("p").show();
        });

        function day(){
            var day = $('input[name=date]').val();
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("out").innerHTML = xmlhttp.responseText;
                }
            }

            xmlhttp.open("GET", "../phpBackend/OrgStat/followersDay.php?date=" + day, true);
            xmlhttp.send();
        }

        function week(){
            var day = $('input[name=date]').val();
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("out2").innerHTML = xmlhttp.responseText;
                }
            }

            xmlhttp.open("GET", "../phpBackend/OrgStat/month.php?date=" + day, true);
            xmlhttp.send();
        }

        function month(){
            var day = $('input[name=date]').val();
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("out3").innerHTML = xmlhttp.responseText;
                }
            }

            xmlhttp.open("GET", "../phpBackend/OrgStat/year.php?date=" + day, true);
            xmlhttp.send();
        }

        function allTime(){
            var day = $('input[name=date]').val();
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("out4").innerHTML = xmlhttp.responseText;
                }
            }

            xmlhttp.open("GET", "../phpBackend/OrgStat/allTime.php");
            xmlhttp.send();
        }

        function showChartDay(){

            alert("HerErJeg!");

            var data = [
                {
                    value: 100,
                    color:"#F7464A",
                    highlight: "#FF5A5E",
                    label: "Red"
                },
                {
                    value: 50,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "Green"
                }
            ]

            var ctx = $('#myChart').get(0).getContext("2d");
            var myDoughnut = new Chart(ctx).Doughnut(data,{
                animation:true,
                showTooltips: false,
                percentageInnerCutout : 70,
                segmentShowStroke : false,
                onAnimationComplete: function() {
                    var canvasWidthvar = $('#myChart').width();
                    var canvasHeight = $('#myChart').height();
                    var constant = 114;
                    var fontsize = (canvasHeight/constant).toFixed(2);
                    //ctx.font="2.8em Verdana";
                    ctx.font=fontsize +"em Verdana";
                    ctx.textBaseline="middle"; 
                    var total = 0;
                    $.each(data,function() {
                        total += parseInt(this.value,10);
                    });
                    var tpercentage = ((data[0].value/total)*100).toFixed(2)+"%";
                    var textWidth = ctx.measureText(tpercentage).width;
              
                    var txtPosx = Math.round((canvasWidthvar - textWidth)/2);
                    ctx.fillText(tpercentage, txtPosx, canvasHeight/2);
                }
            });

            
            
            /*new Chart(ctx).Doughnut(data, {
                animateScale: true,
                onAnimationComplete: function() {
                    ctx.fillText(data[0].value + "%", 100 - 20, 100, 200);
                }
            });*/

            /*new Chart(ctx).Doughnut(data, {
                onAnimationComplete: function() {
                    ctx.fillText(data[0].value + "%", 100 - 20, 100, 200);
                }
            });*/
        }
    });
    </script>


</head>

<body>

<?php
    include 'header_nav.php';
?>

    <div class="container">
        <div>

            <div class="input-append date">
                <input class="span2" name="date" size="16" type="text" id="datepicker" readonly="readonly" />
                <span class="add-on"><i class="icon-calendar"></i></span>
            </div>   

            <div class="col-md-3 text-center" id="statistics">
                <div class="row">
                    <span><h4>Dag:</h4></span>
                    <span id="out"></span>      
                    <span id="sDay"><p>Sammenlign</p></span>
                </div>

            </div>
            <div class="col-md-3 text-center" id="statistics">
                <div class="row">
                    <span><h4>Måned:</h4></span>
                    <span id="out2"></span>
                    <span id="sMonth"><p>Sammenlign</p></span> 
                </div>
            </div>
            <div class="col-md-3 text-center" id="statistics">
                <div class="row">
                    <span><h4>År:</h4></span>
                    <span id="out3"></span>
                    <span id="sYear"><p>Sammenlign</p></span>  
                </div>
            </div>
            <div class="col-md-3 text-center" id="statistics">
                <div class="row">
                    <span><h4>Hele tiden:</h4></span>
                    <span id="out4"></span>      
                </div>
            </div>
            <div class="col-md-3 text-center">
                <canvas id="myChart"></canvas>
            </div>
        </div>

        

    </div>

</body>
</html>