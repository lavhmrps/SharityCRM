
function setNewsID(newsID){
	localStorage['newsIDtoShow'] = newsID;
}


function getNewsID(){
	var newsID = localStorage['newsIDtoShow'];
    if (!newsID) {
        return "NOT SEt alerted from showNews.js getNewsID() function";
    }else{
    	return newsID;
    }
}

function showSelectedNews(newsID){

	setNewsID(newsID);
	$.ajax({
		type : "POST",
		url : "localStorageJStoPHP.php",
		dataType : "text",
		data : {"newsIDtoShow" : newsID},
		success : function(response){
			alert(response);
		},
		error : function(response){
			alert(response);
		}
	});
}