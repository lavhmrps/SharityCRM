 $("input[name=complete_ProjectReg]").click(function(){

 	var name = $('input[name=name]').val();
 	var title = $('input[name=title]').val();
 	var about = $('textarea[name=about]').val();
 	var country = $('input[name=country]').val();
 	var city = $('input[name=city]').val();


 	if(name == ""){
 		alert("hva heter prosjektet?");
 		return false;
 	}

 	var projectJSON = {
 		"name" : name,
 		"title" : title,
 		"about" : about,
 		"country" : country,
 		"city" : city
 	};

 	projectJSON = JSON.stringify(projectJSON);

 	alert(projectJSON);

 	$.ajax({
 		type: "POST",
 		datatype: "json",
 		url: "insertProject.php",
 		data: {'project' : projectJSON},
 		success: function(response) {
 			if(response == "OK"){
 				clearInput();
 			}

 		},
 		error : function(response){
 			alert(response.message);
 		}
 	});

 	return false;

 	
 }); 


 function clearInput(){
 	var name = $('input[name=name]').val("");
 	var title = $('input[name=title]').val("");
 	var about = $('textarea[name=about]').val("");
 	var country = $('input[name=country]').val("");
 	var city = $('input[name=city]').val("");
 }