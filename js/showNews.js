
function setNewsID(newsID){
	
	console.log("setNewsID(newsID) showNews.js newsID ->" + newsID);
	localStorage['newsIDtoShow'] = newsID;
}

function setNewsIDtoDelete(newsID){
	console.log("setNewsIDtoDelete(newsID) showNews.js newsID ->" + newsID);
	localStorage['newsIDtoDelete'] = newsID;
}


function getNewsID(){
	var newsID = localStorage['newsIDtoShow'];
	if (!newsID) {
		console.log("NOT SEt alerted from showNews.js getNewsID() function");
		return "NOT SEt alerted from showNews.js getNewsID() function";
	}else{
		console.log("showNews.js getNewsID() newsID er satt: " + newsID);
		return newsID;
	}
}

function showSelectedNews(newsID){
	console.log("showNews.js showSelectedNews(newsID) -> newsID mottatt: " + newsID);
	setNewsID(newsID);
	$.ajax({
		type : "POST",
		url : "../phpBackend/localStorageJStoPHP.php",
		dataType : "text",
		data : {"newsIDtoShow" : newsID},
		success : function(response){
			console.log("showNews.js : showSelectedNews() : ajax request success: " + response);
		},
		error : function(response){
			console.log("showNews.js : showSelectedNews() : ajax request error: "  +  response.message);
		}
	});
}
function deleteNews(newsID){
	console.log("showNews.js deleteNews(newsID) -> newsID mottatt: " + newsID);
	setNewsIDtoDelete(newsID);
	$.ajax({
		type : "POST",
		url : "../phpBackend/localStorageJStoPHP.php",
		dataType : "text",
		data : {"newsIDtoDelete" : newsID},
		success : function(response){
			console.log("showNews.js : deleteNews() : ajax request success: " + response);
		},
		error : function(response){
			console.log("showNews.js : deleteNews() : ajax request error: "  +  response.message);
		}
	});
}
$(document).ready(function(){
	$(function() {
		$('input[name=projectsearch]').keydown();
	});
	$('input[name=projectsearch]').on("keyup keydown keypress", function(e){
		var searchstring = $('input[name=projectsearch]').val();
		var sql = "SELECT * FROM news WHERE title LIKE '%"+searchstring+"%'";
		$.ajax({
			type : "POST",
			dataType: "json",
			url : "../phpBackend/getNews.php",
			data : {"sql" : sql},
			success : function(response){
				var projectBox = "";					
				for(var i = 0; i < response.length; i++){

					projectBox += '<div class="col-lg-3 col-md-3 col-xs-2" id="projectcontainer">';
					projectBox += '<div class="col-md-12" id="projectcontent">';
					projectBox += "<h2>" + response[i].title + "</h2>";


					var url = response[i].backgroundimgURL;


					if(url == null){
						
						projectBox += "<img src='http://localhost/SharityCRM/img/noimage.jpg' alt='Bakgrunnsbilde' id='showprojectimg'/>";
					}else{
						projectBox += "<img src='" + response[i].backgroundimgURL + "' alt='Bakgrunnsbilde' id='showprojectimg'/>";
					}
				
					projectBox += '</div>';
					projectBox += "<div class='col-md-12' id='bottom'>";
					projectBox += '<a href="../pages/showSelectedNews.php" onclick="showSelectedNews(' + response[i].newsID + ')">Vis</a> - ';
					projectBox += '<a href="../pages/change_newsinfo.php" onclick="showSelectedNews(' + response[i].newsID +  ')">Endre</a> - ';
					projectBox += '<a href="../pages/deleteNews.php" onclick="deleteNews(' + response[i].newsID + ')">Slett</a>';
					projectBox += '</div>';
					projectBox += '</div>';
				}
				$("#news").html(projectBox);	
			}
		});
});
});