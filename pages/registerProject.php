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


	<link href="../css/main.css" rel="stylesheet"/>
	<link href="../css/main-theme.css" rel="stylesheet" type="text/css" title="default" />
	<link href="../css/alternate-theme-1.css" rel="stylesheet" type="text/css" title="alternate" />
	<link href="../css/alternate-theme-2.css" rel="stylesheet" type="text/css" title="alternate2" />
	<link href="../css/alternate-theme-3.css" rel="stylesheet" type="text/css" title="alternate3" />

	<script src="../js/styleswitcher.js" type="text/javascript" ></script>



</head>
<body>

	<?php
	include "../pages/header_nav.php";
	?>

	<script>

		
		
	</script>


	<div class="container" >
		<div class="col-lg-2 col-md-1 col-xs-0"></div>
		<div class="col-lg-8 col-md-10 col-xs-12 text-center" id="addprojectcontainer">
			<h1>Opprett prosjekt</h1>
			
			<div class="col-lg-12 col-md-12 col-xs-12 text-left">
				<label>Bakgrunnsbilde</label>
				<input type="file" id="file_background" style="display:none" accept="image/*" name="backgroundimgURL"/>
				<img src="../img/default.png" id="preview" alt="Click to upload img" name="preview" />
				<label name="projectlabel" id="projectlabelmargin">Prosjektnavn</label>
				<input type="text" id="reg_project_input" class="form-control" name="projectName" placeholder=""/>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-xs-6">
						<label name="countrylabel" id="projectlabelmargin">Land</label>
						<input type="text" id="reg_project_input" class="form-control" name="country" placeholder=""/>
					</div>
					<div class="col-lg-6 col-md-6 col-xs-6">
						<label name="citylabel" id="projectlabelmargin">By</label>
						<input type="text" id="reg_project_input" class="form-control" name="city" placeholder=""/>
					</div>
				</div>
				<label name="titlelabel" id="projectlabelmargin">Tittel</label>
				<input type="text" id="reg_project_input" class="form-control" name="title" placeholder=""/>



				<label name="aboutlabel">Beskrivelse av prosjektet</label>
				<textarea class="form-control" id="aboutnews" rows="5" name="about" placeholder="" ></textarea>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-xs-6">
						<button  class="btn" name="registerProject" id="main-themebtn2">
							Registrer prosjekt
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


		<div class="col-md-12" id="somespace"></div>
	</div>


	
	
</div>

<script src="../js/stickyheader.js"></script>

<!-- Bootstrap Core JavaScript -->
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

	$('input[name=projectName]').removeClass('empty_input');
	$('input[name=country]').removeClass('empty_input');
	$('input[name=city]').removeClass('empty_input');
	$('input[name=title]').removeClass('empty_input');
	$('textarea[name=about]').removeClass('empty_input');

	

	if(name ===""){
		$('input[name=projectName]').addClass('empty_input');
		
		ok = 0;
	}
	if(country == ""){
		$('input[name=country]').addClass('empty_input');
		ok = 0;
	}
	if(city == ""){
		$('input[name=city]').addClass('empty_input');

		ok = 0;
	}
	if(title == ""){
		$('input[name=title]').addClass('empty_input');
		ok = 0;
	}
	if(about == ""){
		$('textarea[name=about]').addClass('empty_input');
		ok = 0;
		
	}

	if(ok == 0){
		return false;
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