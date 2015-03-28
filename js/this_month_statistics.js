

$(document).ready(function(){

  var ctx = document.getElementById("this_month").getContext("2d");
  window.myLine = new Chart(ctx).Line(lineChartData, {
    responsive: true,
    scaleGridLineColor : "#999",
    scaleShowHorizontalLines: true,

    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: false,
  });

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
    url : "../phpBackend/getStatistics.php",
    dataType : "json",
    success : function(response){


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
   localStorage.setItem("january", sumJan);
   localStorage.setItem("february", sumFeb);
   localStorage.setItem("march", sumMar);
   localStorage.setItem("april", sumApr);
   localStorage.setItem("may", sumMay);
   localStorage.setItem("june", sumJun);
   localStorage.setItem("july", sumJul);
   localStorage.setItem("august", sumAug);
   localStorage.setItem("september", sumSep);
   localStorage.setItem("october", sumOkt);
   localStorage.setItem("november", sumNov);
   localStorage.setItem("december", sumDec);



 },
 error : function(){
   alert("Something went worng");
 }
});



});

var lineChartData = {
	labels : ["01","02","03","04","05","06","07", "08", "09", "10", "11", "12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"],
  datasets : [
  {
    label: "12 mnd",
		fillColor : "#1A324C", //farge under grafen
    strokeColor : "#1A324C", //farge på linja
    pointColor : "transparent", //farge på prikkene
    pointStrokeColor : "transparent", // fage på border til prikkene
    pointHighlightFill : "transparent", //farge på prikk on hover
    pointHighlightStroke : "transparent", // farge på border til prikk on hover
    data : [
    322,
    434,
    232,
    343,
    543,
    523,
    765,
    654,
    334,
    554,
    323,
    323,
    323,
    767,
    232,
    232,
    312,
    232,
    322,
    434,
    232,
    343,
    543,
    223,
    765,
    654,
    334,
    554,
    323,
    554,
    554
    ]
  }
  ]

}

