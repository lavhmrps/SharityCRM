$("#uploadimg").click(function() {
		$("#file1").trigger('click');
	});


$(document).ready(function() { 
	$.ajax({
		url : '../phpBackend/autoInsertBackgroundimg.php',
		dataType: 'text',
		success : function(response){
			setImage(response);
		}

	});



	$("input:file").change(function (){
		var fileName = $(this).val();
		$(".filename").html(fileName);
		insertBackground();


	});




	function setImage(url){
		$("img[name=imagePreview]").attr("src",url);
	}

	
	function insertBackground(){

		try{
			var file_data_background = $('#photoimg').prop('files')[0];  
		}catch(error){
			console.log(error.message);
		}




		if(file_data_background != undefined){
			var form_data_background = new FormData();                  
			form_data_background.append('file_background', file_data_background);
			$.ajax({
	        url: '../phpBackend/autoInsertBackgroundimg.php', // point to server-side PHP script 
	        datatype: 'text',  // what to expect back from the PHP script, if anything
	        cache: false,
	        contentType: false,
	        processData: false,
	        data: form_data_background,                         
	        type: 'POST',
	        success: function(response){
	        	setImage(response);
	        },
	        error : function(response){
	        	console.log(response.message);
	        }
	    });

		}

	}

});