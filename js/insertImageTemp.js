$("#uploadimg").click(function() {
	$("#file_background").trigger('click');
});

$("#clear").click(function(){
	$.ajax({
		url : '../phpBackend/insertImageTemp.php',
		dataType: 'text',
		success : function(response){
			alert("insertImageTemp.js : document ready, ajx request success: response: " + response);

		},
		error: function(error){
			alert("insertImageTemp.js #clear click : ajax request error: " + response.message);
		}

	});
});


$(document).ready(function() { 

	$.ajax({
		url : '../phpBackend/insertImageTemp.php',
		dataType: 'text',
		success : function(response){
			setImage(response);
			alert("insertImageTemp.js : document ready, ajx request success: response: " + response);

		},
		error: function(error){
			alert("insertImageTemp.js document ready function ajax request error : " + error.message);
		}

	});




	$("input[name=backgroundimgURL]").change(function (){
		var fileName = $(this).val();
		$(".filename").html(fileName);

		insertBackground();
	});





	function setImage(url){
		$("img[name=imagePreview]").attr("src","../phpBackend/" + url);
	}

	
	function insertBackground(){

		try{
			var file_data_background = $('#file_background').prop('files')[0];  
		}catch(error){
			alert("ERROR: " + error.message);
		}

		if(file_data_background != undefined){
			var form_data_background = new FormData();                  
			form_data_background.append('file_background', file_data_background);
			$.ajax({
	        url: '../phpBackend/insertImageTemp.php', // point to server-side PHP script 
	        datatype: 'text',  // what to expect back from the PHP script, if anything
	        cache: false,
	        contentType: false,
	        processData: false,
	        data: form_data_background,                         
	        type: 'POST',
	        success: function(response){
	        	alert("insertBackground() from insertImageTemp.js: ajax request success: " + response);
	        	setImage(response);
	        },
	        error : function(response){
	        	console.log(response.message);
	        }
	    });

		}

	}

});