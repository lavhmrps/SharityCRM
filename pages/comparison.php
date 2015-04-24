<?php
session_start();

include '../phpBackend/checkSession.php';
include '../phpBackend/connect.php';

?>

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
                    color:"#F7464A",
                    highlight: "#FF5A5E",
                    label: "Yellow"
                },
                {
                    value: 2,
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

                                if(res1 == 0 && res2 == 0){

                                    /*myDoughnut.segments[0].value = 0;
                                    myDoughnut.segments[1].value = 0;
                                    myDoughnut.update();*/
                                    myDoughnut.destroy();

                                    /*var ctx = document.getElementById("myChartLine").getContext("2d");
                                    myLineChart = new Chart(ctx).Line(data, options);
                                    
                                    myDoughnut.font="15px Georgia";
                                    myDoughnut.fillText("Både " + date1 + " og " + date2 + " er 0!",10,50);*/
                                }else{
                                    myDoughnut.segments[0].value = res2;
                                    myDoughnut.segments[1].value = res1;
                                    myDoughnut.update();
                                }
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

                                if(res1 == 0 && res2 == 0){
                                    var c=document.getElementById("statistikk1");
                                    var ctx=c.getContext("2d");

                                    ctx.font="15px Georgia";
                                    ctx.fillText("Både " + date1 + " og " + date2 + " er 0!",10,50);
                                }else{
                                    myDoughnut.segments[0].value = res2;
                                    myDoughnut.segments[1].value = res1;
                                    myDoughnut.update();
                                }
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

                                if(res1 == 0 && res2 == 0){
                                    var c=document.getElementById("statistikk1");
                                    var ctx=c.getContext("2d");

                                    ctx.font="15px Georgia";
                                    ctx.fillText("Både " + date1 + " og " + date2 + " er 0!",10,50);
                                }else{
                                    myDoughnut.segments[0].value = res2;
                                    myDoughnut.segments[1].value = res1;
                                    myDoughnut.update();
                                }
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
                    color:"#F7464A",
                    highlight: "#FF5A5E",
                    label: "Yellow"
                },
                {
                    value: 1,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "Green"
                }
            ]
            var ctx = $('#statistikk2').get(0).getContext("2d");
            var myDoughnut = new Chart(ctx).Doughnut(data,{
                animation:true,
                showTooltips: false,
                percentageInnerCutout : 70,
                segmentShowStroke : false,
                onAnimationComplete: function() {
                    var canvasWidthvar = $('#statistikk2').width();
                    var canvasHeight = $('#statistikk2').height();
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

                                if(res1 == 0 && res2 == 0){
                                    var c=document.getElementById("statistikk2");
                                    var ctx=c.getContext("2d");

                                    ctx.font="15px Georgia";
                                    ctx.fillText("Både " + date1 + " og " + date2 + " er 0!",10,50);
                                }else{
                                    myDoughnut.segments[0].value = res2;
                                    myDoughnut.segments[1].value = res1;
                                    myDoughnut.update();
                                }
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

                                if(res1 == 0 && res2 == 0){
                                    var c=document.getElementById("statistikk2");
                                    var ctx=c.getContext("2d");

                                    ctx.font="15px Georgia";
                                    ctx.fillText("Både " + date1 + " og " + date2 + " er 0!",10,50);
                                }else{
                                    myDoughnut.segments[0].value = res2;
                                    myDoughnut.segments[1].value = res1;
                                    myDoughnut.update();
                                }
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

                                if(res1 == 0 && res2 == 0){
                                    var c=document.getElementById("statistikk2");
                                    var ctx=c.getContext("2d");

                                    ctx.font="15px Georgia";
                                    ctx.fillText("Både " + date1 + " og " + date2 + " er 0!",10,50);
                                }else{
                                    myDoughnut.segments[0].value = res2;
                                    myDoughnut.segments[1].value = res1;
                                    myDoughnut.update();
                                }
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
                    color:"#F7464A",
                    highlight: "#FF5A5E",
                    label: "Yellow"
                },
                {
                    value: 1,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "Green"
                }
            ]
            var ctx = $('#statistikk3').get(0).getContext("2d");
            var myDoughnut = new Chart(ctx).Doughnut(data,{
                animation:true,
                showTooltips: false,
                percentageInnerCutout : 70,
                segmentShowStroke : false,
                onAnimationComplete: function() {
                    var canvasWidthvar = $('#statistikk3').width();
                    var canvasHeight = $('#statistikk3').height();
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

                                if(res1 == 0 && res2 == 0){
                                    var c=document.getElementById("statistikk3");
                                    var ctx=c.getContext("2d");

                                    ctx.font="15px Georgia";
                                    ctx.fillText("Både " + date1 + " og " + date2 + " er 0!",10,50);
                                }else{
                                    myDoughnut.segments[0].value = res2;
                                    myDoughnut.segments[1].value = res1;
                                    myDoughnut.update();
                                }
                                    
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

                                if(res1 == 0 && res2 == 0){
                                    var c=document.getElementById("statistikk3");
                                    var ctx=c.getContext("2d");

                                    ctx.font="15px Georgia";
                                    ctx.fillText("Både " + date1 + " og " + date2 + " er 0!",10,50);
                                }else{
                                    myDoughnut.segments[0].value = res2;
                                    myDoughnut.segments[1].value = res1;
                                    myDoughnut.update();
                                }
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

                                if(res1 == 0 && res2 == 0){
                                    var c=document.getElementById("statistikk3");
                                    var ctx=c.getContext("2d");

                                    ctx.font="15px Georgia";
                                    ctx.fillText("Både " + date1 + " og " + date2 + " er 0!",10,50);
                                }else{
                                    myDoughnut.segments[0].value = res2;
                                    myDoughnut.segments[1].value = res1;
                                    myDoughnut.update();
                                }
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
                    color:"#F7464A",
                    highlight: "#FF5A5E",
                    label: "Yellow"
                },
                {
                    value: 1,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "Green"
                }
            ]
            var ctx = $('#statistikk4').get(0).getContext("2d");
            var myDoughnut = new Chart(ctx).Doughnut(data,{
                animation:true,
                showTooltips: false,
                percentageInnerCutout : 70,
                segmentShowStroke : false,
                onAnimationComplete: function() {
                    var canvasWidthvar = $('#statistikk4').width();
                    var canvasHeight = $('#statistikk4').height();
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

                                if(res1 == 0 && res2 == 0){
                                    var c=document.getElementById("statistikk4");
                                    var ctx=c.getContext("2d");

                                    ctx.font="15px Georgia";
                                    ctx.fillText("Både " + date1 + " og " + date2 + " er 0!",10,50);
                                }else{
                                    myDoughnut.segments[0].value = res2;
                                    myDoughnut.segments[1].value = res1;
                                    myDoughnut.update();
                                }
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

                                if(res1 == 0 && res2 == 0){
                                    var c=document.getElementById("statistikk4");
                                    var ctx=c.getContext("2d");

                                    ctx.font="15px Georgia";
                                    ctx.fillText("Både " + date1 + " og " + date2 + " er 0!",10,50);
                                }else{
                                    myDoughnut.segments[0].value = res2;
                                    myDoughnut.segments[1].value = res1;
                                    myDoughnut.update();
                                }
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

                                if(res1 == 0 && res2 == 0){
                                    var c=document.getElementById("statistikk4");
                                    var ctx=c.getContext("2d");

                                    ctx.font="15px Georgia";
                                    ctx.fillText("Både " + date1 + " og " + date2 + " er 0!",10,50);
                                }else{
                                    myDoughnut.segments[0].value = res2;
                                    myDoughnut.segments[1].value = res1;
                                    myDoughnut.update();
                                }
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
                    color:"#F7464A",
                    highlight: "#FF5A5E",
                    label: "Yellow"
                },
                {
                    value: 1,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "Green"
                }
            ]
            var ctx = $('#statistikk5').get(0).getContext("2d");
            var myDoughnut = new Chart(ctx).Doughnut(data,{
                animation:true,
                showTooltips: false,
                percentageInnerCutout : 70,
                segmentShowStroke : false,
                onAnimationComplete: function() {
                    var canvasWidthvar = $('#statistikk5').width();
                    var canvasHeight = $('#statistikk5').height();
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

                                if(res1 == 0 && res2 == 0){
                                    var c=document.getElementById("statistikk5");
                                    var ctx=c.getContext("2d");

                                    ctx.font="15px Georgia";
                                    ctx.fillText("Både " + date1 + " og " + date2 + " er 0!",10,50);
                                }else{
                                    myDoughnut.segments[0].value = res2;
                                    myDoughnut.segments[1].value = res1;
                                    myDoughnut.update();
                                }
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

                                if(res1 == 0 && res2 == 0){
                                    var c=document.getElementById("statistikk5");
                                    var ctx=c.getContext("2d");

                                    ctx.font="15px Georgia";
                                    ctx.fillText("Både " + date1 + " og " + date2 + " er 0!",10,50);
                                }else{
                                    myDoughnut.segments[0].value = res2;
                                    myDoughnut.segments[1].value = res1;
                                    myDoughnut.update();
                                }
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

                                if(res1 == 0 && res2 == 0){
                                    var c=document.getElementById("statistikk5");
                                    var ctx=c.getContext("2d");

                                    ctx.font="15px Georgia";
                                    ctx.fillText("Både " + date1 + " og " + date2 + " er 0!",10,50);
                                }else{
                                    myDoughnut.segments[0].value = res2;
                                    myDoughnut.segments[1].value = res1;
                                    myDoughnut.update();
                                }
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
                    color:"#F7464A",
                    highlight: "#FF5A5E",
                    label: "Yellow"
                },
                {
                    value: 1,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "Green"
                }
            ]
            var ctx = $('#statistikk6').get(0).getContext("2d");
            var myDoughnut = new Chart(ctx).Doughnut(data,{
                animation:true,
                showTooltips: false,
                percentageInnerCutout : 70,
                segmentShowStroke : false,
                onAnimationComplete: function() {
                    var canvasWidthvar = $('#statistikk6').width();
                    var canvasHeight = $('#statistikk6').height();
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

                                if(res1 == 0 && res2 == 0){
                                    /*var c=document.getElementById("statistikk6");
                                    var ctx=c.getContext("2d");*/

                                    myDoughnut.font="15px Georgia";
                                    myDoughnut.fillText("Både " + date1 + " og " + date2 + " er 0!",10,50);
                                }else{
                                    myDoughnut.segments[0].value = res2;
                                    myDoughnut.segments[1].value = res1;
                                    myDoughnut.update();
                                }
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

                                if(res1 == 0 && res2 == 0){
                                    var c=document.getElementById("statistikk6");
                                    var ctx=c.getContext("2d");

                                    ctx.font="15px Georgia";
                                    ctx.fillText("Både " + date1 + " og " + date2 + " er 0!",10,50);
                                }else{
                                    myDoughnut.segments[0].value = res2;
                                    myDoughnut.segments[1].value = res1;
                                    myDoughnut.update();
                                }
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

                                if(res1 == 0 && res2 == 0){
                                    var c=document.getElementById("statistikk6");
                                    var ctx=c.getContext("2d");

                                    ctx.font="15px Georgia";
                                    ctx.fillText("Både " + date1 + " og " + date2 + " er 0!",10,50);
                                }else{
                                    myDoughnut.segments[0].value = res2;
                                    myDoughnut.segments[1].value = res1;
                                    myDoughnut.update();
                                }
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