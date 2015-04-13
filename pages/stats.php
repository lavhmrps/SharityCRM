<html>
<head>
	<title></title>

	<link href="../css/bootstrap.min.css" rel="stylesheet"/>
	<link href="../css/datepicker.css" rel="stylesheet"/>

	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="../js/Chart.min.js"></script>
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
	<script>
	$(document).ready(function(){

		var ctx = $('#statistikk').get(0).getContext('2d');
        var myLine = new Chart(ctx).Line(lineChartData, {
            responsive: true
        });

        $('#statistikk').hide();

		$("#money").click(function(){
			if ($('input[name=date]').val() == "") {
				alert("Angi dato!");
			}else{
				showLineChartIncomeYear();
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


	});


	var lineChartData = {
        labels : ["January","February","March","April","May","June","July", "August", "September", "October", "November", "December"],
        datasets : [
        {
            label: "12 mnd",
            fillColor : "rgba(360,720,100,0.2)", //farge under grafen
            strokeColor : "red", //farge på linja
            pointColor : "blue", //farge på prikkene
            pointStrokeColor : "blue", // fage på border til prikkene
            pointHighlightFill : "blue", //farge på prikk on hover
            pointHighlightStroke : "blue", // farge på border til prikk on hover
            data : [0,0,0,0,0,0,0,0,0,0,0,0]
        }
        ]
    }
	</script>
</head>
<body>

	<div class="row">
		<div class="col-md-12" style="background:green; height:150px;">
			<div class="input-append date">
                <input class="span2" name="date" size="16" type="text" id="datepickerYear" readonly="readonly" />
                <span class="add-on"><i class="icon-calendar"></i></span>
            </div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-2" style="background:red; height:650px;">
			<form>
				<input id="money" type="button" value="Kroner donert" class="form-control">
				<br>
				<input type="button" value="Antall donasjoner" class="form-control">
				<br>
				<input type="button" value="Nye følgere" class="form-control">
				
			</form>
		</div>
		<div class="col-md-8" height:650px;">
			<canvas id="statistikk">
			</canvas>
		</div>
		<div class="col-md-2" style="background:yellow; height:650px;">
			<span id="out"></span>  
		</div>
	</div>

</body>
</html>