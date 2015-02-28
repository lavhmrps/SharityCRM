/*$("button[name=backgroundimgURLbutton]").click(function () {
    $("input[name=backgroundimgURL]").trigger('click');
});

$('button[name=complete_registration]').click( function() {
    var file_data = $('input[name=backgroundimgURL]').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data)
    alert(form_data);                             
    $.ajax({
                url: 'insertImg.php', // point to server-side PHP script 
                datatype: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'POST',
                success: function(response){
                    alert(response); // display response from the PHP script, if any
                }
     });
});

*/

