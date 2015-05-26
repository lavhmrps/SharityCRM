
$("#clear").on("click", function () {
	$("#file_background").replaceWith( file_background = file_background.clone( true ) );
});


$("#registerphonebutton").click(function(){
	var title = $('input[name=title]').val();
	var txt = $('textarea[name=txt]').val();
	var projectID = $('select[name=projectID]').val();
	if(projectID == "NULL"){
	
		console.log("Feil: Alert fra insertNews.js prosjektID er NULL");
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
		url: "../phpBackend/insertNews.php",
		data: {'news' : newsJSON},
		success: function (response) {
			console.log(response);
			if(response == "OK"){
				insertBackground();
				clearInputs();
			}else{
				console.log("ERROR: Alert fra insertNews.js Feil ved insert til MySQL database");
			}
		},
		error: function (error) {
			console.log(error);
		}
	});
//}
insertBackground();
return false;
});
function insertBackground(){
	try{
		var file_data_background = $('input[name=backgroundimgURL]').prop('files')[0];
	}catch(error){
		alert(error.message);
	}
	if(file_data_background != undefined){
		alert("insertNews.js : FIL ER VALGT");
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
	console.log("Bakgrunnsbilde: " + response);
},
error : function(response){

	console.log(response.message);
}
});
		return false;
	}
}
function clearInputs(){
	$('input[name=title]').val("");
	$('textarea[name=txt]').val("");
	$('select[name=projectID]').val("NULL");
	$("img[name=imagePreview]").attr("src", "../img/default.png");
	$('#clear').trigger('click');
}