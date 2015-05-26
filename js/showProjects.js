$(document).ready(function(){
	$(function() {
		$('input[name=projectsearch]').keydown();
	});

	$('input[name=projectsearch]').on("keyup keydown keypress", function(e){


		var searchstring = $('input[name=projectsearch]').val();
		var sql = "SELECT * FROM project WHERE name LIKE '%"+searchstring+"%'";

		$.ajax({
			type : "POST",
			dataType: "json",
			url : "../phpBackend/getProjects.php",
			data : {"sql" : sql},
			success : function(response){
					//alert(response + " " + <?php $_SESSION['organizationNr']?>);

					

					var projectBox = "";					

					for(var i = 0; i < response.length; i++){

						
						

						var url = response[i].backgroundimgURL;


						if(url == null){
							
							url = "http://localhost/SharityCRM/img/noimage.jpg";
						}
						projectBox += '<div class="col-lg-3 col-md-4 col-xs-12" id="projectcontainer">';
						projectBox += '<div class="col-md-12" id="projectcontent">';
						projectBox += "<h2>" + response[i].name + "</h2>";
						projectBox += "<img src='" + url + "' alt='Bakgrunnsbilde' id='showprojectimg'/>";
						projectBox += '</div>';
						projectBox += "<div class='col-md-12' id='bottom'>";
						projectBox += '<a href="../pages/showSelectedProject.php" onclick="showProject(' + response[i].projectID + ')">Vis</a> - ';
						projectBox += '<a href="../pages/change_projectinfo.php" onclick="showProject(' + response[i].projectID +  ')">Endre</a> - ';
						projectBox += '<a href="../pages/deleteProject.php" onclick="deleteProject(' + response[i].projectID + ')">Slett</a>';
						projectBox += '</div>';
						projectBox += '</div>';

					}

					$("#projects").html(projectBox);





					
					
				}
			});
});
});