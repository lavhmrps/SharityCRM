
function setNewsID(newsID){
	alert("setNewsID(newsID) showNews.js newsID ->" + newsID);
	localStorage['newsIDtoShow'] = newsID;
}


function getNewsID(){
	var newsID = localStorage['newsIDtoShow'];
    if (!newsID) {
        alert ("NOT SEt alerted from showNews.js getNewsID() function");
        return "NOT SEt alerted from showNews.js getNewsID() function";
    }else{
    	alert("showNews.js getNewsID() newsID er satt: " + newsID);
    	return newsID;
    }
}

function showSelectedNews(newsID){
	alert("showNews.js showSelectedNews(newsID) -> newsID mottatt: " + newsID);
	setNewsID(newsID);
	$.ajax({
		type : "POST",
		url : "../phpBackend/localStorageJStoPHP.php",
		dataType : "text",
		data : {"newsIDtoShow" : newsID},
		success : function(response){
			alert("showNews.js : showSelectedNews() : ajax request success: " + response);
		},
		error : function(response){
			alert("showNews.js : showSelectedNews() : ajax request error: "  +  response.message);
		}
	});
}