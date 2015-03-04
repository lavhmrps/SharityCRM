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
	<!-- Custom CSS -->
	<link href="../css/scrolling-nav.css" rel="stylesheet"/>


	<link href="../css/vegard_main.css" rel="stylesheet"/>



</head>
<body>

	<?php
	include "../pages/header_nav.php";
	?>

	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="col-md-12 text-center" id="reg_pt2_head">


		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 text-center">
				<h1 style="color:black">Legg til nytt prosjekt</h1>
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">


				<input type="text" id="reg_project_input" class="form-control" name="projectName" placeholder="Prosjektnavn"/>
				<input type="file" id="file_background" style="display:none" accept="image/*" name="backgroundimgURL" />

				<img src="../img/default.png" id="preview" alt="Click to upload img" name="preview" />
				<input type="text" id="reg_project_input" class="form-control" name="country" placeholder="Land"/>
				<input type="text" id="reg_project_input" class="form-control" name="city" placeholder="By"/>
				<input type="text" id="reg_project_input" class="form-control" name="title" placeholder="Prosjekt tittel"/>
				<textarea class="form-control" id="aboutOrg_pt2" rows="5" name="about" placeholder="Prosjektbeskrivelse" ></textarea>
				<button  class="btn btn-success" name="registerProject">
					Registrer prosjekt
				</button>


			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	<div class="col-md-3"></div>
	<div class="col-md-12" id="somespace"></div>
</div>

<script src="../js/stickyheader.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>

<script type="text/javascript">

	$("button[name=registerProject]").click(function(){
		insertProject();
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

function insertProject(){
	var name = $("input[name=projectName]").val();
	var country = $("input[name=country]").val();
	var city = $("input[name=city]").val();
	var title = $("input[name=title]").val();
	var about = $("textarea[name=about]").val();
	

	
	var ok = 1;

	if(name ===""){
		alert("skriv navn på projsketet");
		ok = 0;
	}
	if(country == ""){
		alert("skriv land");
		ok = 0;
	}
	if(country == ""){
		alert("skriv by");
		ok = 0;
	}
	if(title == ""){
		ok = 0;
		alert("Skriv tittel");
	}
	if(about == ""){
		ok = 0;
		alert("Skriv beskrivelse");
	}

	if(ok == 0){
		return;
	}

	var json = {
		"name" : name,
		"title" : title,
		"about" : about,
		"country" : country, 
		"city" : city
	};

	json = JSON.stringify(json);




	$.ajax({
		type : "POST",
		dataType: "text",
		url : "../phpBackend/insertProject.php",
		data: {"project" : json},
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
		url: '../phpBackend/insertBackgroundimgProject.php', // point to server-side PHP script
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
	$("input[name=projectName]").val("");
	$("input[name=country]").val("");
	$("input[name=city]").val("");
	$("input[name=title]").val("");
	$("textarea[name=about]").val("");
	
}


</script>	