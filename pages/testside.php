<?php 

	header("Content-type: application/javascript"); 
	session_start();

?>


	$(document).ready(function(){

  var ctx = document.getElementById("this_month").getContext("2d");
  window.myLine = new Chart(ctx).Line(lineChartData, {
    responsive: true,
  });
$(document).ready(function(){
  var canvas = document.getElementById("this_month");

  canvas.style.height = '240px';

});

$.ajax({
        type : "POST",
        dataType : "text",
        data : {'getStats' : "SELECT * FROM subscription WHERE organizationNr = <?php echo $_SESSION['organizationNr'] ?>"},
        url : "../phpBackend/getFollowersYear.php",
        success : function(response){
            alert(response);
        },
        error : function(){
            alert("Naffin");
        }
    });


$("#knapp").click(function(){

    var url = "../phpBackend/";

    alert(url);

    myLine.datasets[0].points[0].value = 200000000;
});


});



var lineChartData = {
    labels : ["Jan","Feb","Mar","Apr","Mai", "Jun","Jul","Aug","Sep","Okt","Nov","Des"],
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
    323
    ]
  }
  ]

}





