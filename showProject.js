
function setProjectID(projectID){
	localStorage['projectIDtoShow'] = projectID;
}


function getProjectID(){
	var projectID = localStorage['projectIDtoShow'];
    if (!projectID) {
        return "NOT SEt alerted from showProject getProjectID() function";
    }else{
    	return projectID;
    }
}

function showProject(projectID){
	setProjectID(projectID);
	$.ajax({
		type : "POST",
		url : "localStorageJStoPHP.php",
		dataType : "text",
		data : {"projectID" : projectID},
		success : function(response){
			alert(response);
		},
		error : function(response){
			alert(response);
		}
	});
}