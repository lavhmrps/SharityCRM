            $('button[name=update_info]').click(function(){

            var email = $('input[name=email]').val();
            var emailOld = $('input[name=emailOld]').val();  
            var name = $('input[name=name]').val();         
            var phone = $('input[name=phone]').val();
            var address = $('input[name=address]').val();
            var zip = $('input[name=zip]').val();
            var picURL = $('textarea[name=picURL]').val();
            var password = $('select[name=password]').val();
            var repeat_password = $('select[name=repeat_password]').val();


            $('input[name=email]').removeClass('empty_input');
            $('input[name=emailOld]').removeClass('empty_input');
            $('input[name=name]').removeClass('empty_input');
            $('input[name=phone]').removeClass('empty_input');
            $('input[name=address]').removeClass('empty_input');
            $('input[name=zip]').removeClass('empty_input');
            $('input[name=picURL]').removeClass('empty_input');
            $('input[name=password]').removeClass('empty_input');
            $('input[name=repeat_password]').removeClass('empty_input');


            var ok = 1;

            if(email == ""){
                $('input[name=email]').addClass('empty_input');
                ok = 0;
            }
            if(name == ""){
                $('input[name=name]').addClass('empty_input');
                ok = 0;
            }
            if(password == "" || password != repeat_password){
                $('input[name=password]').addClass('empty_input');
                ok = 0; 
            }
           

            if(ok == 0){
                console.log("Fyll inn alle felters, informasjon kan gå tapt, trykk ok for å samtykke");
            }



            var json = {
                'email' : email,
                'name' : name,
                'phone' : phone,
                'address' : address,
                'zip' : zip,
                'picURL' : picURL,
                'password' : password
            };

            json = JSON.stringify(json);

            $.ajax({
                type: "POST",
                dataType : "text",
                url : "../phpBackend/change_user.php",
                data : {"organization" : json},
                success : function(response){
                    if(response == "OK"){
                        console.log("Successful ajax request from change_user.js calling to change_user.php " + response);
                        window.location.replace("../pages/Admin/change_user.php");

                    }
                },
                error : function(response){
               
                    console.log("changeorginfor.js error feil fra update organization.php feil i ajax request");
                }

            });

        });