$(document).ready(function(){
    $.ajax({
        url : "../phpBackend/getCategoryOrganization.php",
        success : function(response){
            $('select[name=category]').val(response);
        }
    });
});

$('button[name=update_info]').click(function(){
    var title = $('input[name=title]').val();
    var txt = $('textarea[name=txt]').val();



    $('input[name=title]').removeClass('empty_input');

    $('textarea[name=txt]').removeClass('empty_input');




    var ok = 1;

    if(title == ""){
        $('input[name=title]').addClass('empty_input');
        ok = 0;
    }

    if(about == ""){
        $('textarea[name=txt]').addClass('empty_input');
        ok = 0; 
    }

    if(ok == 0){
        alert("Fyll inn alle felters, informasjon kan gå tapt, trykk ok for å samtykke");
    }



    var json = {
        'title' : title,
        'txt' : txt
    };

    json = JSON.stringify(json);

    $.ajax({
        type: "POST",
        dataType : "text",
        url : "../phpBackend/updateNews.php",
        data : {"organization" : json},
        success : function(response){
            if(response == "OK"){
                alert("Successful ajax request from change_newsinfo.js calling to updateProject.php " + response);
                window.location.replace("../pages/showNews.php");

            }


        },
        error : function(response){
            alert("changeorginfor.js error feil fra update organization.php feil i ajax request");
        }

    });

});

$("#uploadimg").click(function() {
    $("#file1").trigger('click');
});