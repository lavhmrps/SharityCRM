$(document).ready(function(){
    $.ajax({
        url : "../phpBackend/getCategoryOrganization.php",
        success : function(response){
            $('select[name=category]').val(response);
        }
    });
});
$('button[name=update_info]').click(function(){
    var phone = $('input[name=phone]').val();
    var address = $('input[name=address]').val();
    var zipcode = $('input[name=zipcode]').val();
    var website = $('input[name=website]').val();
    var accountnumber = $('input[name=accountnumber]').val();
    var email = $('input[name=email]').val();
    var about = $('textarea[name=about]').val();
    var category = $('select[name=category]').val();
    $('input[name=phone]').removeClass('empty_input');
    $('input[name=address]').removeClass('empty_input');
    $('input[name=zipcode]').removeClass('empty_input');
    $('input[name=website]').removeClass('empty_input');
    $('input[name=accountnumber]').removeClass('empty_input');
    $('input[name=email]').removeClass('empty_input');
    $('textarea[name=about]').removeClass('empty_input');
    $('select[name=category]').removeClass('empty_input');
    var ok = 1;
    if(phone == ""){
        $('input[name=phone]').addClass('empty_input');
        ok = 0;
    }
    if(address == ""){
        $('input[name=address]').addClass('empty_input');
        ok = 0;
    }
    if(zipcode == ""){
        $('input[name=zipcode]').addClass('empty_input');
        ok= 0;
    }
    if(website == ""){
        $('input[name=website]').addClass('empty_input');
        ok = 0;
    }
    if(accountnumber == "" || accountnumber.length != 11){
        $('input[name=accountnumber]').addClass('empty_input');
        ok = 0;
    }
    if(email == ""){
        $('input[name=email]').addClass('empty_input');
        ok = 0;
    }
    if(about == ""){
        $('textarea[name=about]').addClass('empty_input');
        ok = 0; 
    }
    if(category == "NULL"){
        $('select[name=category]').addClass('empty_input');
        ok = 0;
    }
    if(ok == 0){
        alert("Fyll inn alle felters, informasjon kan gå tapt, trykk ok for å samtykke");
    }
    var json = {
        'phone' : phone,
        'address' : address,
        'zipcode' : zipcode,
        'website' : website,
        'accountnumber' : accountnumber,
        'email' : email,
        'about' : about,
        'category' : category
    };
    json = JSON.stringify(json);
    alert();
    $.ajax({
        type: "POST",
        dataType : "text",
        url : "../phpBackend/updateOrganization.php",
        data : {"organization" : json},
        success : function(response){
            if(response == "OK"){
                console.log("Successful ajax request from change_orginfo.js calling to updateOrganization.php " + response);
                window.location.replace("../pages/home.php");
            }
        },
        error : function(response){
            console.log("changeorginfor.js error feil fra update organization.php feil i ajax request");
        }
    });
});