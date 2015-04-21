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

		$('#datepickerDay1').hide();
		$('#datepickerDay2').hide();
		$('#datepickerMnd1').hide();
		$('#datepickerMnd2').hide();
		$('#datepickerYear1').hide();
		$('#datepickerYear2').hide();

		$('select').change(function(){
                
            var index = $('select').val();
            if(index == 0){
                $('#datepickerDay1').show();
				$('#datepickerDay2').show();
				$('#datepickerMnd1').hide();
				$('#datepickerMnd2').hide();
				$('#datepickerYear1').hide();
				$('#datepickerYear2').hide();
            }
            else if(index == 1){
                $('#datepickerMnd1').show();
				$('#datepickerMnd2').show();
				$('#datepickerDay1').hide();
				$('#datepickerDay2').hide();
				$('#datepickerYear1').hide();
				$('#datepickerYear2').hide();
            }
            else if(index == 2){
                $('#datepickerYear1').show();
				$('#datepickerYear2').show();
				$('#datepickerDay1').hide();
				$('#datepickerDay2').hide();
				$('#datepickerMnd1').hide();
				$('#datepickerMnd2').hide();	
            }
        });



		$('#datepickerDay1').datepicker({
            format: "yyyy-mm-dd",
            weekStart: 1,
            language: "no",
            todayHighlight: true
        });
        $('#datepickerDay1').on('changeDate', function(ev){
            $(this).datepicker('hide');
            day1();
            showChartDay();
        });
        $('#datepickerDay2').datepicker({
            format: "yyyy-mm-dd",
            weekStart: 1,
            language: "no",
            todayHighlight: true
        });
        $('#datepickerDay2').on('changeDate', function(ev){
            $(this).datepicker('hide');
            day2();
        });
        $('#datepickerYear1').datepicker({
            format: "yyyy",
            weekStart: 1,
            startView: 1,
    		minViewMode: 2,
            language: "no",
            todayHighlight: true
        });
        $('#datepickerYear1').on('changeDate', function(ev){
            $(this).datepicker('hide');
            year1();
        });
        $('#datepickerYear2').datepicker({
            format: "yyyy",
            weekStart: 1,
            startView: 1,
    		minViewMode: 2,
            language: "no",
            todayHighlight: true
        });
        $('#datepickerYear2').on('changeDate', function(ev){
            $(this).datepicker('hide');
            year2();
        });

        $('#datepickerMnd1').datepicker({
            format: "yyyy-mm",
            weekStart: 1,
            startView: 0,
            minViewMode: 1,
            language: "no",
            todayHighlight: true
        });
        $('#datepickerMnd1').on('changeDate', function(ev){
            $(this).datepicker('hide');
            mnd1();
        });
        $('#datepickerMnd2').datepicker({
            format: "yyyy-mm",
            weekStart: 1,
            startView: 0,
            minViewMode: 1,
            language: "no",
            todayHighlight: true
        });
        $('#datepickerMnd2').on('changeDate', function(ev){
            $(this).datepicker('hide');
            mnd2();
        });

        $('#backBtn').on('click', function(ev){
        	window.location.replace("../pages/stats.php");
        });







        
        function day1(){
            var day = $('input[name=date]').val();
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("firstDate").innerHTML = xmlhttp.responseText;
                }
            }

            xmlhttp.open("GET", "../phpBackend/OrgStat/day.php?date=" + day, true);
            xmlhttp.send();
        }

        function day2(){
            var day = $('input[name=date2]').val();
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("lastDate").innerHTML = xmlhttp.responseText;
                }
            }

            xmlhttp.open("GET", "../phpBackend/OrgStat/day.php?date=" + day, true);
            xmlhttp.send();
        }

        function mnd1(){
            var day = $('input[name=date3]').val() + '-01';

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function(){
                
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("firstDate").innerHTML = xmlhttp.responseText;
                }
            }

            xmlhttp.open("GET", "../phpBackend/OrgStat/month.php?date=" + day, true);
            xmlhttp.send();
        }

        function mnd2(){
            var day = $('input[name=date4]').val() + '-01';

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function(){
                
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("lastDate").innerHTML = xmlhttp.responseText;
                }
            }

            xmlhttp.open("GET", "../phpBackend/OrgStat/month.php?date=" + day, true);
            xmlhttp.send();
        }

        function year1(){
            var day = $('input[name=date5]').val();
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("firstDate").innerHTML = xmlhttp.responseText;
                }
            }

            xmlhttp.open("GET", "../phpBackend/OrgStat/year.php?date=" + day, true);
            xmlhttp.send();
        }
        function year2(){
            var day = $('input[name=date6]').val();
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("lastDate").innerHTML = xmlhttp.responseText;
                }
            }

            xmlhttp.open("GET", "../phpBackend/OrgStat/year.php?date=" + day, true);
            xmlhttp.send();
        }




		function showChartDay(){

            var data = [
                {
                    value: 100,
                    color:"#F7464A",
                    highlight: "#FF5A5E",
                    label: "Yellow"
                },
                {
                    value: 50,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "Green"
                }
            ]

            var ctx = $('#statistikk1').get(0).getContext("2d");
            var myDoughnut = new Chart(ctx).Doughnut(data,{
                animation:true,
                showTooltips: false,
                percentageInnerCutout : 70,
                segmentShowStroke : false,
                onAnimationComplete: function() {
                    var canvasWidthvar = $('#statistikk1').width();
                    var canvasHeight = $('#statistikk1').height();
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
        }
	});
	</script>

</head>
<body>
	<div class="row">
		<div class="col-md-12" style="background:green; height:150px;">
			<div class="input-append date">
				<button class="button" id="backBtn">Gå tilbake</button>
                <select>
                    <option value="NULL">Velg statistkkktype</option>
                    <option value="0">Dag</option>
                    <option value="1">Mnd</option>
                    <option value="2">År</option>
                </select>

                <input class="span2" name="date" size="16" type="text" id="datepickerDay1" readonly="readonly" />
                <input class="span2" name="date2" size="16" type="text" id="datepickerDay2" readonly="readonly" />
                <input class="span2" name="date3" size="16" type="text" id="datepickerMnd1" readonly="readonly" />
                <input class="span2" name="date4" size="16" type="text" id="datepickerMnd2" readonly="readonly" />
                <input class="span2" name="date5" size="16" type="text" id="datepickerYear1" readonly="readonly" />
                <input class="span2" name="date6" size="16" type="text" id="datepickerYear2" readonly="readonly" />
            </div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-2" id="left" style="background:red; height:650px;">
			<span id="firstDate"></span> 
		</div>
		<div class="col-md-8" id="middle" height:650px;>

			<div class="col-md-4" id="middle" style="background:red;">
				<canvas id="statistikk1">
				</canvas>
				<canvas id="statistikk4">
				</canvas>
			</div>
			<div class="col-md-4" id="middle" style="background:blue;">
				<canvas id="statistikk2">
				</canvas>
				<canvas id="statistikk5">
				</canvas>
			</div>
			<div class="col-md-4" id="middle" style="background:black;">
				<canvas id="statistikk3">
				</canvas>
				<canvas id="statistikk6">
				</canvas>
			</div>
		</div>
		<div class="col-md-2" style="background:yellow; height:650px;">
			<span id="lastDate"></span>  
		</div>
	</div>
</body>
</html>