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
            if(index == 0){ //day
            	$('#datepickerDay1').show();
            	$('#datepickerDay2').show();
            	$('#datepickerMnd1').hide();
            	$('#datepickerMnd2').hide();
            	$('#datepickerYear1').hide();
            	$('#datepickerYear2').hide();
            	localStorage.setItem('type','0');
            }
            else if(index == 1){ //month
            	$('#datepickerMnd1').show();
            	$('#datepickerMnd2').show();
            	$('#datepickerDay1').hide();
            	$('#datepickerDay2').hide();
            	$('#datepickerYear1').hide();
            	$('#datepickerYear2').hide();
            	localStorage.setItem('type','1');
            }
            else if(index == 2){ //year
            	$('#datepickerYear1').show();
            	$('#datepickerYear2').show();
            	$('#datepickerDay1').hide();
            	$('#datepickerDay2').hide();
            	$('#datepickerMnd1').hide();
            	$('#datepickerMnd2').hide();
            	localStorage.setItem('type','2');	
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
	if ($('input[name=date2]').val() != "") {
		showChart1();
		showChart2();
		showChart3();
		showChart4();
		showChart5();
		showChart6();
	}
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
	if ($('input[name=date]').val() != "") {
		showChart1();
		showChart2();
		showChart3();
		showChart4();
		showChart5();
		showChart6();
	}
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
	if ($('input[name=date6]').val() != "") {
		showChart1();
		showChart2();
		showChart3();
		showChart4();
		showChart5();
		showChart6();
	}
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
	if ($('input[name=date5]').val() != "") {
		showChart1();
		showChart2();
		showChart3();
		showChart4();
		showChart5();
		showChart6();
	}
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
	if ($('input[name=date4]').val() != "") {
		showChart1();
		showChart2();
		showChart3();
		showChart4();
		showChart5();
		showChart6();
	}
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
	if ($('input[name=date3]').val() != "") {
		showChart1();
		showChart2();
		showChart3();
		showChart4();
		showChart5();
		showChart6();
	}
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

function showChart1(){

	var data = [
            {
                value: 1,
                color:"#1AA24C",
                highlight: "#1AD24C",
                label: "Valg 2"
            },
            {
                value: 1,
        color: "#000000",
        highlight: "#333333",
        label: "Valg 1"
            }
            ]

	var ctx = $('#statistikk1').get(0).getContext("2d");
	var myDoughnut = new Chart(ctx).Doughnut(data,{
		animation:true,
		showTooltips: true,
		percentageInnerCutout : 0,
		segmentShowStroke : true
	});

	var res1;
	var res2;
	var x = localStorage.getItem('type');
            if(x == 0){ //day

            	var date1 = $('input[name=date]').val();
            	var date2 = $('input[name=date2]').val();
            	$.ajax({
            		url: '../phpBackend/doughnut.php?date='+ date1 + '&num=' + 1,
            		success: function(data) {
            			res1 = parseInt(data);
            			$.ajax({
            				url: '../phpBackend/doughnut.php?date='+ date2 + '&num=' + 1,
            				success: function(data) {
            					res2 = parseInt(data);

            					myDoughnut.segments[0].value = res2;
            					myDoughnut.segments[1].value = res1;
            					myDoughnut.update();

            					$("#followersFirstDate").text(res1);
            					$("#followersLastDate").text(res2);

            				},
            			});
            		},
            	});    
            }else if(x == 1){ //month
            	var date1 = $('input[name=date3]').val() + '-01';
            	var date2 = $('input[name=date4]').val() + '-01';
            	$.ajax({
            		url: '../phpBackend/doughnut.php?date='+ date1 + '&num=' + 2,
            		success: function(data) {
            			res1 = parseInt(data);
            			$.ajax({
            				url: '../phpBackend/doughnut.php?date='+ date2 + '&num=' + 2,
            				success: function(data) {
            					res2 = parseInt(data);

            					myDoughnut.segments[0].value = res2;
            					myDoughnut.segments[1].value = res1;
            					myDoughnut.update(); 


            					$("#followersFirstDate").text(res1);
            					$("#followersLastDate").text(res2); 

            				},
            			});
            		},
            	});
            }else if(x == 2){ //year
            	var date1 = $('input[name=date5]').val();
            	var date2 = $('input[name=date6]').val();
            	$.ajax({
            		url: '../phpBackend/doughnut.php?date='+ date1 + '&num=' + 3,
            		success: function(data) {
            			res1 = parseInt(data);
            			$.ajax({
            				url: '../phpBackend/doughnut.php?date='+ date2 + '&num=' + 3,
            				success: function(data) {
            					res2 = parseInt(data);

            					myDoughnut.segments[0].value = res2;
            					myDoughnut.segments[1].value = res1;
            					myDoughnut.update();

            					$("#followersFirstDate").text(res1);
            					$("#followersLastDate").text(res2); 
            				},
            			});
            		},
            	});
            } 
        }

        function showChart2(){

        	var data = [
        	{
        		value: 1,
        		color:"#1AA24C",
        		highlight: "#1AD24C",
        		label: "Valg 2"
        	},
        	{
        		value: 1,
        color: "#000000",
        highlight: "#333333",
        label: "Valg 1"

        	}
        	]

        	var ctx = $('#statistikk2').get(0).getContext("2d");
        	var myDoughnut = new Chart(ctx).Doughnut(data,{
        		animation:true,
        		showTooltips: true,
        		percentageInnerCutout : 0,
        		segmentShowStroke : true
        	});

        	var res1;
        	var res2;
        	var x = localStorage.getItem('type');
            if(x == 0){ //day

            	var date1 = $('input[name=date]').val();
            	var date2 = $('input[name=date2]').val();
            	$.ajax({
            		url: '../phpBackend/doughnut.php?date='+ date1 + '&num=' + 4,
            		success: function(data) {
            			res1 = parseInt(data);
            			$.ajax({
            				url: '../phpBackend/doughnut.php?date='+ date2 + '&num=' + 4,
            				success: function(data) {
            					res2 = parseInt(data);

            					myDoughnut.segments[0].value = res2;
            					myDoughnut.segments[1].value = res1;
            					myDoughnut.update();

            					$("#donationsFirstDate").text(res1);
            					$("#donationsLastDate").text(res2); 

            				},
            			});
            		},
            	});
            }else if(x == 1){ //month
            	var date1 = $('input[name=date3]').val() + '-01';
            	var date2 = $('input[name=date4]').val() + '-01';
            	$.ajax({
            		url: '../phpBackend/doughnut.php?date='+ date1 + '&num=' + 5,
            		success: function(data) {
            			res1 = parseInt(data);
            			$.ajax({
            				url: '../phpBackend/doughnut.php?date='+ date2 + '&num=' + 5,
            				success: function(data) {
            					res2 = parseInt(data);

            					myDoughnut.segments[0].value = res2;
            					myDoughnut.segments[1].value = res1;
            					myDoughnut.update();

            					$("#donationsFirstDate").text(res1);
            					$("#donationsLastDate").text(res2);
            				},
            			});
            		},
            	});
            }else if(x == 2){ //year
            	var date1 = $('input[name=date5]').val();
            	var date2 = $('input[name=date6]').val();
            	$.ajax({
            		url: '../phpBackend/doughnut.php?date='+ date1 + '&num=' + 6,
            		success: function(data) {
            			res1 = parseInt(data);
            			$.ajax({
            				url: '../phpBackend/doughnut.php?date='+ date2 + '&num=' + 6,
            				success: function(data) {
            					res2 = parseInt(data);

            					myDoughnut.segments[0].value = res2;
            					myDoughnut.segments[1].value = res1;
            					myDoughnut.update();

            					$("#donationsFirstDate").text(res1);
            					$("#donationsLastDate").text(res2);
            				},
            			});
            		},
            	});
            } 
        }

        function showChart3(){


        	var data = [
            {
                value: 1,
                color:"#1AA24C",
                highlight: "#1AD24C",
                label: "Valg 2"
            },
            {
                value: 1,
        color: "#000000",
        highlight: "#333333",
        label: "Valg 1"
            }
            ]
        	var ctx = $('#statistikk3').get(0).getContext("2d");
        	var myDoughnut = new Chart(ctx).Doughnut(data,{
        		animation:true,
        		showTooltips: true,
        		percentageInnerCutout : 0,
        		segmentShowStroke : true
        	});

        	var res1;
        	var res2;
        	var x = localStorage.getItem('type');
            if(x == 0){ //day

            	var date1 = $('input[name=date]').val();
            	var date2 = $('input[name=date2]').val();
            	$.ajax({
            		url: '../phpBackend/doughnut.php?date='+ date1 + '&num=' + 7,
            		success: function(data) {
            			res1 = parseInt(data);
            			$.ajax({
            				url: '../phpBackend/doughnut.php?date='+ date2 + '&num=' + 7,
            				success: function(data) {
            					res2 = parseInt(data);

            					myDoughnut.segments[0].value = res2;
            					myDoughnut.segments[1].value = res1;
            					myDoughnut.update();  

            					$("#moneyDonatedFirstDate").text(res1 + ",-");
            					$("#moneyDonatedLastDate").text(res2 + ",-"); 

            				},
            			});
            		},
            	}); 
            }else if(x == 1){ //month
            	var date1 = $('input[name=date3]').val() + '-01';
            	var date2 = $('input[name=date4]').val() + '-01';
            	$.ajax({
            		url: '../phpBackend/doughnut.php?date='+ date1 + '&num=' + 8,
            		success: function(data) {
            			res1 = parseInt(data);
            			$.ajax({
            				url: '../phpBackend/doughnut.php?date='+ date2 + '&num=' + 8,
            				success: function(data) {
            					res2 = parseInt(data);

            					myDoughnut.segments[0].value = res2;
            					myDoughnut.segments[1].value = res1;
            					myDoughnut.update();

            					$("#moneyDonatedFirstDate").text(res1 + ",-");
            					$("#moneyDonatedLastDate").text(res2 + ",-"); 
            				},
            			});
            		},
            	});
            }else if(x == 2){ //year
            	var date1 = $('input[name=date5]').val();
            	var date2 = $('input[name=date6]').val();
            	$.ajax({
            		url: '../phpBackend/doughnut.php?date='+ date1 + '&num=' + 9,
            		success: function(data) {
            			res1 = parseInt(data);
            			$.ajax({
            				url: '../phpBackend/doughnut.php?date='+ date2 + '&num=' + 9,
            				success: function(data) {
            					res2 = parseInt(data);

            					myDoughnut.segments[0].value = res2;
            					myDoughnut.segments[1].value = res1;
            					myDoughnut.update();

            					$("#moneyDonatedFirstDate").text(res1 + ",-");
            					$("#moneyDonatedLastDate").text(res2 + ",-"); 
            				},
            			});
            		},
            	});
            } 
        }

        function showChart4(){

        	var data = [
            {
                value: 1,
                color:"#1AA24C",
                highlight: "#1AD24C",
                label: "Valg 2"
            },
            {
                value: 1,
        color: "#000000",
        highlight: "#333333",
        label: "Valg 1"
            }
            ]
        	var ctx = $('#statistikk4').get(0).getContext("2d");
        	var myDoughnut = new Chart(ctx).Doughnut(data,{
        		animation:true,
        		showTooltips: true,
        		percentageInnerCutout : 0,
        		segmentShowStroke : true
        	});

        	var res1;
        	var res2;
        	var x = localStorage.getItem('type');
            if(x == 0){ //day

            	var date1 = $('input[name=date]').val();
            	var date2 = $('input[name=date2]').val();
            	$.ajax({
            		url: '../phpBackend/doughnut.php?date='+ date1 + '&num=' + 10,
            		success: function(data) {
            			res1 = parseInt(data);
            			$.ajax({
            				url: '../phpBackend/doughnut.php?date='+ date2 + '&num=' + 10,
            				success: function(data) {
            					res2 = parseInt(data);

            					myDoughnut.segments[0].value = res2;
            					myDoughnut.segments[1].value = res1;
            					myDoughnut.update();


            					$("#averageDonationFirstDate").text(res1 + ",-");
            					$("#averageDonationLastDate").text(res2 + ",-");

            				},
            			});
            		},
            	});
            }else if(x == 1){ //month
            	var date1 = $('input[name=date3]').val() + '-01';
            	var date2 = $('input[name=date4]').val() + '-01';
            	$.ajax({
            		url: '../phpBackend/doughnut.php?date='+ date1 + '&num=' + 11,
            		success: function(data) {
            			res1 = parseInt(data);
            			$.ajax({
            				url: '../phpBackend/doughnut.php?date='+ date2 + '&num=' + 11,
            				success: function(data) {
            					res2 = parseInt(data);

            					myDoughnut.segments[0].value = res2;
            					myDoughnut.segments[1].value = res1;
            					myDoughnut.update();

            					$("#averageDonationFirstDate").text(res1 + ",-");
            					$("#averageDonationLastDate").text(res2 + ",-");
            				},
            			});
            		},
            	});
            }else if(x == 2){ //year
            	var date1 = $('input[name=date5]').val();
            	var date2 = $('input[name=date6]').val();
            	$.ajax({
            		url: '../phpBackend/doughnut.php?date='+ date1 + '&num=' + 12,
            		success: function(data) {
            			res1 = parseInt(data);
            			$.ajax({
            				url: '../phpBackend/doughnut.php?date='+ date2 + '&num=' + 12,
            				success: function(data) {
            					res2 = parseInt(data);

            					myDoughnut.segments[0].value = res2;
            					myDoughnut.segments[1].value = res1;
            					myDoughnut.update();

            					$("#averageDonationFirstDate").text(res1 + ",-");
            					$("#averageDonationLastDate").text(res2 + ",-");
            				},
            			});
            		},
            	});
            } 
        }

        function showChart5(){
        	var data = [
            {
                value: 1,
                color:"#1AA24C",
                highlight: "#1AD24C",
                label: "Valg 2"
            },
            {
                value: 1,
        color: "#000000",
        highlight: "#333333",
        label: "Valg 1"
            }
            ]

        	var ctx = $('#statistikk5').get(0).getContext("2d");
        	var myDoughnut = new Chart(ctx).Doughnut(data,{
        		animation:true,
        		showTooltips: true,
        		percentageInnerCutout : 0,
        		segmentShowStroke : true
        	});

        	var res1;
        	var res2;
        	var x = localStorage.getItem('type');
            if(x == 0){ //day
            	var date1 = $('input[name=date]').val();
            	var date2 = $('input[name=date2]').val();
            	$.ajax({
            		url: '../phpBackend/doughnut.php?date='+ date1 + '&num=' + 13,
            		success: function(data) {
            			res1 = parseInt(data);
            			$.ajax({
            				url: '../phpBackend/doughnut.php?date='+ date2 + '&num=' + 13,
            				success: function(data) {
            					res2 = parseInt(data);

            					myDoughnut.segments[0].value = res2;
            					myDoughnut.segments[1].value = res1;
            					myDoughnut.update();


            					$("#newsFirstDate").text(res1);
            					$("#newsLastDate").text(res2);

            				},
            			});
            		},
            	});    
            }else if(x == 1){ //month
            	var date1 = $('input[name=date3]').val() + '-01';
            	var date2 = $('input[name=date4]').val() + '-01';
            	$.ajax({
            		url: '../phpBackend/doughnut.php?date='+ date1 + '&num=' + 14,
            		success: function(data) {
            			res1 = parseInt(data);
            			$.ajax({
            				url: '../phpBackend/doughnut.php?date='+ date2 + '&num=' + 14,
            				success: function(data) {
            					res2 = parseInt(data);

            					myDoughnut.segments[0].value = res2;
            					myDoughnut.segments[1].value = res1;
            					myDoughnut.update();

            					$("#newsFirstDate").text(res1);
            					$("#newsLastDate").text(res2);
            				},
            			});
            		},
            	});
            }else if(x == 2){ //year
            	var date1 = $('input[name=date5]').val();
            	var date2 = $('input[name=date6]').val();
            	$.ajax({
            		url: '../phpBackend/doughnut.php?date='+ date1 + '&num=' + 15,
            		success: function(data) {
            			res1 = parseInt(data);
            			$.ajax({
            				url: '../phpBackend/doughnut.php?date='+ date2 + '&num=' + 15,
            				success: function(data) {
            					res2 = parseInt(data);

            					myDoughnut.segments[0].value = res2;
            					myDoughnut.segments[1].value = res1;
            					myDoughnut.update();

            					$("#newsFirstDate").text(res1);
            					$("#newsLastDate").text(res2);
            				},
            			});
            		},
            	});
            } 
        }

        function showChart6(){
        	var data = [
            {
                value: 1,
                color:"#1AA24C",
                highlight: "#1AD24C",
                label: "Valg 2"
            },
            {
                value: 1,
        color: "#000000",
        highlight: "#333333",
        label: "Valg 1"
            }
            ]

        	var ctx = $('#statistikk6').get(0).getContext("2d");
        	var myDoughnut = new Chart(ctx).Doughnut(data,{
        		animation:true,
        		showTooltips: true,
        		percentageInnerCutout : 0,
        		segmentShowStroke : true
        	});

        	var res1;
        	var res2;
        	var x = localStorage.getItem('type');
            if(x == 0){ //day

            	var date1 = $('input[name=date]').val();
            	var date2 = $('input[name=date2]').val();
            	$.ajax({
            		url: '../phpBackend/doughnut.php?date='+ date1 + '&num=' + 16,
            		success: function(data) {
            			res1 = parseInt(data);
            			$.ajax({
            				url: '../phpBackend/doughnut.php?date='+ date2 + '&num=' + 16,
            				success: function(data) {
            					res2 = parseInt(data);

            					myDoughnut.segments[0].value = res2;
            					myDoughnut.segments[1].value = res1;
            					myDoughnut.update();


            					$("#prosjectsFirstDate").text(res1);
            					$("#prosjectsLastDate").text(res2);

            				},
            			});
            		},
            	});
            }else if(x == 1){ //month
            	var date1 = $('input[name=date3]').val() + '-01';
            	var date2 = $('input[name=date4]').val() + '-01';
            	$.ajax({
            		url: '../phpBackend/doughnut.php?date='+ date1 + '&num=' + 17,
            		success: function(data) {
            			res1 = parseInt(data);
            			$.ajax({
            				url: '../phpBackend/doughnut.php?date='+ date2 + '&num=' + 17,
            				success: function(data) {
            					res2 = parseInt(data);

            					myDoughnut.segments[0].value = res2;
            					myDoughnut.segments[1].value = res1;
            					myDoughnut.update();

            					$("#prosjectsFirstDate").text(res1);
            					$("#prosjectsLastDate").text(res2);
            				},
            			});
            		},
            	});
            }else if(x == 2){ //year
            	var date1 = $('input[name=date5]').val();
            	var date2 = $('input[name=date6]').val();
            	$.ajax({
            		url: '../phpBackend/doughnut.php?date='+ date1 + '&num=' + 18,
            		success: function(data) {
            			res1 = parseInt(data);
            			$.ajax({
            				url: '../phpBackend/doughnut.php?date='+ date2 + '&num=' + 18,
            				success: function(data) {
            					res2 = parseInt(data);

            					myDoughnut.segments[0].value = res2;
            					myDoughnut.segments[1].value = res1;
            					myDoughnut.update();

            					$("#prosjectsFirstDate").text(res1);
            					$("#prosjectsLastDate").text(res2);
            				},
            			});
            		},
            	});
            } 
        }
    });
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
						<option value="NULL">Hva vil du sammenligne? </option>
						<option value="0">Dager</option>
						<option value="1">Måneder</option>
						<option value="2">År</option>
					</select>
					</div>
					<div class="col-md-3" id="inputdatepadding">
					<input class="span2" name="date" size="16" type="text" id="datepickerDay1" readonly="readonly" placeholder="Dag 1" />
					<input class="span2" name="date3" size="16" type="text" id="datepickerMnd1" readonly="readonly" placeholder="Måned 1" />
					<input class="span2" name="date5" size="16" type="text" id="datepickerYear1" readonly="readonly" placeholder="År 1" />
					</div>
					<div class="col-md-3" id="inputdatepadding">
					<input class="span2" name="date2" size="16" type="text" id="datepickerDay2" readonly="readonly" placeholder="Dag 2" />
					<input class="span2" name="date4" size="16" type="text" id="datepickerMnd2" readonly="readonly" placeholder="Måned 2" />
					<input class="span2" name="date6" size="16" type="text" id="datepickerYear2" readonly="readonly" placeholder="År 2"/>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>


		<div class="col-md-12">
			<div class="row">

				<div class="col-md-4" id="statbox3">
					<h2>Nye følgere</h2>
					<div class="row">
						<div class="col-md-2">
							<span id="followersFirstDate"></span> 
						</div>
						<div class="col-md-8">
							<canvas id="statistikk1">
							</canvas>
						</div>
						<div class="col-md-2">
							<span id="followersLastDate"></span> 
						</div>
					</div>
				</div>

				<div class="col-md-4" id="statbox3">
					<h2>Donasjoner</h2>
					<div class="col-md-2">
						<span id="donationsFirstDate"></span> 
					</div>
					<div class="col-md-8">
						<canvas class="" id="statistikk2">
						</canvas>
					</div>
					<div class="col-md-2">
						<span id="donationsLastDate"></span> 
					</div>
				</div>

				<div class="col-md-4" id="statbox3">
					<h2>Kroner donert</h2>
					<div class="col-md-2">
						<span id="moneyDonatedFirstDate"></span> 
					</div>
					<div class="col-md-8">
						<canvas id="statistikk3">
						</canvas>
					</div>
					<div class="col-md-2">
						<span id="moneyDonatedLastDate"></span> 
					</div>
				</div>


			</div>
			
		</div>


		<div class="col-md-12">
			<div class="row">
				
				<div class="col-md-4" id="statbox3">
					<h2>Gjennomsnittdonasjon</h2>
					<div class="col-md-2">
						<span id="averageDonationFirstDate"></span> 
					</div>
					<div class="col-md-8">
						<canvas id="statistikk4">
						</canvas>
					</div>
					<div class="col-md-2">
						<span id="averageDonationLastDate"></span> 
					</div>
				</div>

				<div class="col-md-4" id="statbox3">
					<h2>Nye nyheter</h2>
					<div class="col-md-2">
						<span id="newsFirstDate"></span> 
					</div>
					<div class="col-md-8">
						<canvas id="statistikk5">
						</canvas>
					</div>
					<div class="col-md-2">
						<span id="newsLastDate"></span> 
					</div>
				</div>

				<div class="col-md-4" id="statbox3">
					<h2>Nye prosjekter</h2>
					<div class="col-md-2">
						<span id="prosjectsFirstDate"></span> 
					</div>
					<div class="col-md-8">
						<canvas id="statistikk6">
						</canvas>
					</div>
					<div class="col-md-2">
						<span id="prosjectsLastDate"></span> 
					</div>
				</div>
			</div>
		</div>


		<!-- Written stats-->
		<div class="col-md-12 text-center" id="statstext">

			<h2>Skriftlig statistikk</h2>
			<div class="col-md-6 text-left" id="statbox2">
                <div class="col-md-5"></div>
                <div class="col-md-7">
				<span id="firstDate"></span> 
                </div>
			</div>

			<div class="col-md-6 text-left" id="statbox2">
				<div class="col-md-4"></div>
                <div class="col-md-8">
                <span id="lastDate"></span> 
                </div>
			</div>

		</div>
	   <!-- /written stats -->

</div>


<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>