 $("#registerphonebutton").click(function(){
 	var title = $('input[name=title]').val();
 	var txt = $('textarea[name=txt]').val();
 	var projectID = $('select[name=projectID]').val();
 	
 	if(projectID == "NULL"){
 		alert("Feil: Alert fra insertNews.js prosjektID er NULL");
 		return false; //gi beskjed til brukeren, gjerne med bruk av var validinputs = true/false

 	}

 	var newsJSON = {
 		"title" : title, 
 		"txt" : txt,
 		"projectID" : projectID,
 	};

 	/*
	var status = true;


 	//husk å sjekke hvordan form er satt opp i registerProject.php
 	if(name == ""){
 		alert("Skriv inn namn");
 		//sett farge til raud eller noko slikt
		

		status = false;
 	}
 	else if(title=""){
 		alert("Skriv inn tittel");
 		//sett farge til raud eller noko slikt
 		

 		status = false;
 	}
 	if(abour=""){
 		alert("Skriv om prosjektet");
 		//sett farge til raud eller noko slikt
 		return false;
 	}
 	if(country=""){
 		alert("Kva slags land jobbar dykk i?");
 		//sett farge til raud eller noko slikt
 		return false;
 	}
 	if(city=""){
 		alert("Kva slags by jobbar dykk i?");
 		//sett farge til raud eller noko slikt
 		return false;
 	}*/



 	newsJSON = JSON.stringify(newsJSON);

 	alert(newsJSON);
 	
 	//if(status){
 		$.ajax({
 			type: "POST",
 			dataType: "text",
 			url: "insertNews.php",
 			data: {'news' : newsJSON},
 			success: function (response) {
 				alert(response);
 				if(response == "OK"){
 					clearInputs();
 				}else{
 					alert("ERROR: Alert fra insertNews.js Feil ved insert til MySQL database");
 				}
 			},
 			error: function (error) {
 				alert(error);
 			}
 		});
 	//}

 	

 	return false;


 }); 

function clearInputs(){
 	$('input[name=title]').val("");
 	$('textarea[name=txt]').val("");
 	$('select[name=projectID]').val("NULL");
 	
 }
 

