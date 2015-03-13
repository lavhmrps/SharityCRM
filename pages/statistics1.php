<!DOCTYPE HTML>
<html>
<head>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Sharity</title>
	<!-- Bootstrap Core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet"/>
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

    <script src="../js/styleswitcher.js" type="text/javascript" ></script>

	<style>

	body{
		background: white;
	}
	#div1{
		width:1200px;
		height:500px;
		border:3px solid blue;
		border-radius: 12px;
		background: white;
	}

	#div2{
		width:590px;
		height:500px;
		border:3px solid blue;
		border-radius: 12px;
		background: white;
	}

	#bilde{
		background: yellow;
		padding:0;
		margin:0;
		width: 50px;
		height:50px;
		overflow: hidden;
	}


	</style>
	<script>
	function allowDrop(ev) {
		ev.preventDefault();
	}

	function drag(ev) {
		ev.dataTransfer.setData("text", ev.target.id);
	}

	function drop(ev) {
		
		ev.preventDefault();
		var data = ev.dataTransfer.getData("text");
		document.getElementById(data).style.height = "100%";
		document.getElementById(data).style.width = "100%";
		document.getElementById(data).style.overflow = "scroll";
	


		document.getElementById(data).style.background = "#FFA500";

		//fjerner var elem = document.getElementById("alt"); fra div
		//fjerner elem.parentNode.removeChild(elem); fra div
		ev.target.appendChild(document.getElementById(data));
	}
	</script>
</head>
<body>

	<?php
		include "../pages/header_nav.php";
	?>

	<h2>Dra den gule firkanten i bunnen, inn i en av de to store firekantene</h2>
	<h2>husk å legge inn session_start osv osv osv</h2>

	<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
	<br/><br/><br/>
	

	<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>


	<br/><br/><br/>
	
	<div id="bilde"  draggable="true" ondragstart="drag(event)">
		<h1>Siste 12 mnd</h1>

		<blockquote><strong><u><i><h3>Inni her kan vi til og med ha draggable JFrame()</h3></i></u></strong></blockquote>
		
		<p>Scroll, for her er det mye skjult</p>
		<p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p><p>Scroll, for her er det mye skjult</p>
	</div>



	<script src="../js/stickyheader.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>

</body>
</html>
