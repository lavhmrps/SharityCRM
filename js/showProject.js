
function setProjectID(projectID){
	localStorage['projectIDtoShow'] = projectID;
}
function setProjectIDdelete(projectID){
	localStorage['projectIDtoDelete'] = projectID;
}


function getProjectID(){
	var projectID = localStorage['projectIDtoShow'];
	if (!projectID) {
		console.log("alerted from showProject.js getProjectID() function projectID not set " );
		return "NOT SEt alerted from showProject getProjectID() function";
	}else{
		console.log("alerted from showProject.js getProjectID() function projectID  set:  " + projectID);
		return projectID;
	}
}

function showProject(projectID){
	setProjectID(projectID);
	$.ajax({
		type : "POST",
		url : "../phpBackend/localStorageJStoPHP.php",
		dataType : "text",
		data : {"projectIDtoShow" : projectID},
		success : function(response){

			console.log("showProject.js : showProject() : ajax request success: " + response);
		
		},
		error : function(response){

			console.log("showProject.js : showProject() : ajax request error: "  +  response.message);
		
		}
	});
}
function deleteProject(projectID){
	setProjectIDdelete(projectID);
	$.ajax({
		type : "POST",
		url : "../phpBackend/localStorageJStoPHP.php",
		dataType : "text",
		data : {"projectIDtoDelete" : projectID},
		success : function(response){
			console.log("showProject.js : deleteProject() : ajax request success: " + response);
		},
		error : function(response){
			console.log("showProject.js : deleteProject() : ajax request error: "  +  response.message);
		}
	});
}