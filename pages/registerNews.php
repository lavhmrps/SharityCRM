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


	<div class="container" id="addprojectcontainer">
		<div class="col-lg-11 col-md-11 col-xs-12 text-center">
			<h1>Legg til en nyhet</h1>

			<div class="col-lg-6 col-md-6 col-xs-6 text-left">
				<div class="col-lg-12 col-md-12 col-xs-12">
					<p>
						<?php
						$organizationNr=$_SESSION["organizationNr"];
						$sql = "SELECT projectID, name FROM Project WHERE organizationNr = $organizationNr";
						$result = mysqli_query($connection, $sql);
						if ($result) {
							echo "<label>Velg prosjekt</label>";
							echo "<select name='projectID'>";
							echo "<option value='NULL'></option>";
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<option value=" . $row['projectID'] . ">" . $row['name'] . "</option>";
							}
							echo "</select>";
						} else {
							echo "<h2>Failure</h2>";
						}
						?>
					</p>
					<label>Nyhetsbilde</label>
					<input type="file" id="file_background" style="display:none" accept="image/*" name="backgroundimgURL" />

					<img src="../img/default.png" id="preview" alt="Click to upload img" name="preview" />

					<button  class="btn" name="back" id="main-themebtn">
						Tilbake
					</button> <!-- Go back to last site -->


				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-xs-6 text-left">
				<div class="col-lg-12 col-md-12 col-xs-12">

					<label>Nyhetsoverskrift</label>
					<input type="text" id="reg_news_input" class="form-control" name="newsHeader" placeholder=""/>
					<label>Nyhetstekst</label>
					<textarea class="form-control" id="aboutOrg_pt2" rows="5" name="newsText" placeholder="Nyhetstekst" ></textarea>
					<button  class="btn" name="insertNews" id="main-themebtn">
						Publiser nyhet
					</button>

				</div>
			</div>

		</div>
		<div class="col-md-12" id="somespace"></div>
	</div>





	

<script src="../js/stickyheader.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>

<script type="text/javascript">

	$("button[name=insertNews]").click(function(){
		insertNews();
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