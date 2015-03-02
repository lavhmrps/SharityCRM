$(function() {
	$( "#draggable" ).draggable();
	$("#menubar").draggable();
  //$( "#draggable" ).resizable();
});


var graph;
var xPadding = 30;
var yPadding = 30;

var data = { values:[
	{ X: "Jan", Y: 43 },
	{ X: "Feb", Y: 46 },
	{ X: "Mar", Y: 32 },
	{ X: "Apr", Y: 34 },
	{ X: "Mai", Y: 33 },
	{ X: "Jun", Y: 36 },
	{ X: "Jul", Y: 27 },
	{ X: "Aug", Y: 29 },
	{ X: "Sep", Y: 43 },
	{ X: "Okt", Y: 54 },
	{ X: "Nov", Y: 61 },
	{ X: "Des", Y: 57 },
	]};




	function getMaxY() {
		var max = 0;

		for(var i = 0; i < data.values.length; i ++) {
			if(data.values[i].Y > max) {
				max = data.values[i].Y;
			}
		}

		max += 10 - max % 10;
		return max;
	}


	function getXPixel(val) {
		return ((graph.width() - xPadding) / data.values.length) * val + (xPadding * 1.5);
	}

	function getYPixel(val) {
		return graph.height() - (((graph.height() - yPadding) / getMaxY()) * val) - yPadding;
	}

	$(document).ready(function() {
		graph = $('#graph');
		var c = graph[0].getContext('2d');            

		c.lineWidth = 2;
		c.strokeStyle = '#007ec5';
		c.font = 'italic 15pt sans-serif';
		c.textAlign = "center";


		c.beginPath();
		c.moveTo(xPadding, 0);
		c.lineTo(xPadding, graph.height() - yPadding);
		c.lineTo(graph.width(), graph.height() - yPadding);
		c.stroke();


		for(var i = 0; i < data.values.length; i ++) {
			c.fillText(data.values[i].X, getXPixel(i), graph.height() - yPadding + 20);
		}


		c.textAlign = "right"
		c.textBaseline = "middle";

		for(var i = 0; i < getMaxY(); i += 10) {
			c.fillText(i, xPadding - 10, getYPixel(i));
		}

		c.strokeStyle = '#ff6961';


		c.beginPath();
		c.moveTo(getXPixel(0), getYPixel(data.values[0].Y));
		for(var i = 1; i < data.values.length; i ++) {
			c.lineTo(getXPixel(i), getYPixel(data.values[i].Y));
		}
		c.stroke();


		c.fillStyle = '#007ec5';

		for(var i = 0; i < data.values.length; i ++) {  
			c.beginPath();
			c.arc(getXPixel(i), getYPixel(data.values[i].Y), 4, 0, Math.PI * 2, true);

			c.fill();
		}
	});




$(document).ready(function(){

	$("#draggable").hide();


	$("#close").click(function(){
		$("#draggable").hide();
		$('#showlast12months').show();
	});

	$('#showlast12months').click(function(){
		$("#draggable").show();
      $("#draggable").css("z-index", 200000); //div som vises sist skal alltid ha størst z-index
      //prøv å hente ut z-index fra de andre vinduene og pluss på 1
      $(this).hide();
  });
	
	$("#maximize").click(function(){
		$("#draggable").css("height", "550px");
		$("#draggable").css("width", "1010px");
		$('#graph').show();


	});

	$('#minimize').click(function(){

		$('#graph').hide();
		$("#draggable").css("height", "20px");
		
	});

	

	$("#draggable" ).mousedown(function() {

		$(this).css("cursor", "grabbing");
	});

	$("#draggable" ).mouseup(function() {

		$(this).css("cursor", "grab");
	});

	$("#menubar" ).mousedown(function() {

		$(this).css("cursor", "grabbing");
	});

	$("#menubar" ).mouseup(function() {

		$(this).css("cursor", "grab");
	});
	

	$("#framebar" ).mousedown(function() {

		$(this).css("cursor", "grabbing");
	});

	$("#framebar" ).mouseup(function() {

		$(this).css("cursor", "grab");
	});







});