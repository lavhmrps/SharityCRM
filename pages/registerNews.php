<?php
session_start();
include '../phpBackend/checkSession.php';
include '../phpBackend/connect.php';
if(isset($_POST['registerNews'])){
	$organizationNr = $_SESSION['organizationNr'];
}
?>

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
	<!-- /Bootstrap Core CSS -->

	<!-- Custom CSS -->
	<link href="../css/scrolling-nav.css" rel="stylesheet"/>
	<link href="../css/main.css" rel="stylesheet"/>

	<!-- Default CSS -->
	<link href="../css/main-theme.css" rel="stylesheet" type="text/css" title="default" />
	<!-- /Default CSS -->

	<!-- Alternate CSS -->
	<link href="../css/alternate-theme-1.css" rel="stylesheet" type="text/css" title="alternate" />
	<link href="../css/alternate-theme-2.css" rel="stylesheet" type="text/css" title="alternate2" />
	<link href="../css/alternate-theme-3.css" rel="stylesheet" type="text/css" title="alternate3" />
	<!-- /Alternate CSS -->
	<!-- /Custom CSS-->

	<!-- Script to change CSS -->
	<script src="../js/styleswitcher.js" type="text/javascript" ></script>
	<!-- End of script -->



</head>
<body>
	<!-- Includes header -->
	<?php
	include "../pages/header_nav.php";
	?>
	<!-- End of header -->


	<div class="container" >

		<div class="col-lg-2 col-md-1 col-xs-0"></div>

		<!-- Box to show all the newsregistration inputs-->
		<div class="col-lg-8 col-md-10 col-xs-12 text-center" id="addprojectcontainer">
			<h1>Opprett nyhet</h1>

			
			<div class="col-lg-12 col-md-12 col-xs-12 text-left">
				<label>Nyhetsbilde</label>
				<input type="file" id="file_background" style="display:none" accept="image/*" name="backgroundimgURL" />

				<img src="../img/default.png" id="preview" alt="Click to upload img" name="preview" />

				<p>
					<?php
					$organizationNr=$_SESSION["organizationNr"];
					$sql = "SELECT projectID, name FROM Project WHERE organizationNr = $organizationNr";
					$result = mysqli_query($connection, $sql);
					if ($result) {
						echo "<label>Velg prosjekt</label>";
						echo "<select id='selectproject' name='projectID'>";
						echo "<option value='NULL'>Velg prosjekt</option>";
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<option value=" . $row['projectID'] . ">" . $row['name'] . "</option>";
						}
						echo "</select>";
					} else {
						echo "<h2>Failure</h2>";
					}
					?>
				</p>

				<div class="row">
					<div class="col-md-9">
						<label>Nyhetsoverskrift</label>
					</div>
					<div class="col-md-3 spanpadding">
						<span hidden name="newsHeader" class="errorspan">Kun bokstaver og tall</span>  
					</div>
				</div>
				<input type="text" id="reg_news_input" class="form-control" name="newsHeader" placeholder=""/>

				<div class="row">
					<div class="col-md-8">
						<label id="newslabelmargin">Nyhetstekst</label>
					</div>
					<div class="col-md-4 spanpadding2">
						<span hidden name="title" class="errorspan">Minimum 20 tegn og maks 300 tegn</span>  
					</div>
				</div>

				<textarea class="form-control" id="aboutnews" rows="5" name="newsText" placeholder="Nyhetstekst" ></textarea>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-xs-6">
						<button  class="btn" name="insertNews" id="main-themebtn2">
							Registrer nyhet
						</button>
					</div>
					<div class="col-lg-6 col-md-6 col-xs-6">
						<button  class="btn" name="back" id="main-themebtn">
							Avbryt
						</button> <!-- Go back to last site -->
					</div>
				</div>


			</div>
			
			

		</div>
		<!-- End of news registration -->

		<div class="col-lg-2 col-md-1 col-xs-0"></div>
		<div class="col-md-12" id="somespace"> </div>
	</div>

	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>
<!-- Script to register if everything is typed right based on the standards we want -->
<!-- And to add the news to the database -->
<script type="text/javascript">
	
	var OKheader = false;

	$('input[name=newsHeader]').on("keyup keydown keypress", function(e){
		if(e.type == "keyup" || e.type == "keydown" || e.type == "keypress"){
			var pattern = /^[0-9-ÆØÅæøåAa-åA-Å ]+$/;

			var reference = 'input[name='+this.name+']';
			var errorRef = 'span[name='+this.name+']';

			OKheader = checkInput(reference, pattern, errorRef);
		}
	});


	function checkInput(ref, pattern, errorRef){

		var string = $(ref).val();

		if(string == ""){
			$(ref).css('color', 'black');
			$(errorRef).prop("hidden", true);
			return false;
		}

		if(string.match(pattern)){

			$(ref).css('color', 'black');
			$(errorRef).prop("hidden", true);
			return true;

		}else{

			$(ref).css('color', 'red');
			$(errorRef).prop("hidden", false);
			return false;
		}
		if(string == ""){
			$(ref).css('color', 'black');
			$(errorRef).prop("hidden", true);
			return false;
		}


	}




	$("button[name=insertNews]").click(function(){
		if(OKheader){
			insertNews();
		}else{
			alert("Feil input");
		}
		
	});

	$("#preview").click(function(){
		$("#file_background").trigger("click");
	});

//triggered when user selects image to upload
$("#file_background").change(function(){
	previewImage(this);
});

function previewImage(input) {
	if (input.files && input.files[0]) {
		var fileReader = new FileReader();

		fileReader.onload = function (e) {
			$('img[name=preview]').attr('src', e.target.result);
			$("img[name=preview]").show();
		}

		fileReader.readAsDataURL(input.files[0]);
	}
}

function insertNews(){
	var projectID = $("select[name=projectID]").val();
	var title = $("input[name=newsHeader]").val();
	var txt = $("textarea[name=newsText]").val();

	var ok = 1;

	$('select[name=projectID]').removeClass('empty_input');
	$('input[name=newsHeader]').removeClass('empty_input');
	$('textarea[name=newsText]').removeClass('empty_input');

	if(projectID ==="NULL"){
		$('select[name=projectID]').addClass("empty_input");
		ok = 0;
	}
	if(title == ""){
		$('input[name=newsHeader]').addClass('empty_input');
		ok = 0;
	}
	if(txt == ""){
		$('textarea[name=newsText]').addClass('empty_input');
		ok = 0;
		
	}

	if(ok == 0){
		return;
	}

	var json = {
		"projectID" : projectID,
		"title" : title,
		"txt" : txt

	};

	json = JSON.stringify(json);



	$.ajax({
		type : "POST",
		dataType: "text",
		url : "../phpBackend/insertNews.php",
		data: {"news" : json},
		success : function(response){
			if(response == "OK"){
				try{
					var file_data_background = $('input[name=backgroundimgURL]').prop('files')[0];
				}catch(error){
					alert(error.message);
				}
				if(file_data_background != undefined){
					insertBackground(file_data_background);
				}
				clearInput();
			}
		}
	});

}

//ajax request to .php script (insertBackgroundimgProject.php) to insert image into database
function insertBackground(file_data_background){	
	var form_data_background = new FormData();
	form_data_background.append('file_background', file_data_background);
	$.ajax({
		url: '../phpBackend/insertBackgroundimgNews.php', // point to server-side PHP script
		datatype: 'text', // what to expect back from the PHP script, if anything
		cache: false,
		contentType: false,
		processData: false,
		data: form_data_background,
		type: 'POST',
		success: function(response){
			var image = $("#file_background");
			image.replaceWith( image = image.clone( true ) );
			$("img[name=preview]").attr("src", "../img/default.png");

		},
		error : function(response){
			alert(" insertNews.js : insertBackground ajax request ERROR : " + response);
			console.log(response.message);
		}
	});
}

function clearInput(){
	$("select[name=projectID]").val("NULL");
	$("input[name=newsHeader]").val("");
	$("textarea[name=newsText]").val("");
	
}


</script>	
<!-- End of script -->