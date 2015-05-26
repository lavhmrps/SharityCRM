          $(document).ready(function(){
            $.ajax({
                url : "../phpBackend/getCategoryOrganization.php",
                success : function(response){
                    $('select[name=category]').val(response);
                }
            });
        });

          $('button[name=update_info]').click(function(){
            var name = $('input[name=name]').val();
            var title = $('input[name=title]').val();
            var country = $('input[name=country]').val();
            var city = $('input[name=city]').val();
            var about = $('textarea[name=about]').val();


            $('input[name=name]').removeClass('empty_input');
            $('input[name=title]').removeClass('empty_input');
            $('input[name=country]').removeClass('empty_input');
            $('input[name=city]').removeClass('empty_input');
            $('textarea[name=about]').removeClass('empty_input');




            var ok = 1;

            if(name == ""){
                $('input[name=name]').addClass('empty_input');
                ok = 0;
            }
            if(title == ""){
                $('input[name=title]').addClass('empty_input');
                ok = 0;
            }
            if(country == ""){
                $('input[name=country]').addClass('empty_input');
                ok= 0;
            }
            if(city == ""){
                $('input[name=city]').addClass('empty_input');
                ok = 0;
            }
            if(about == ""){
                $('textarea[name=about]').addClass('empty_input');
                ok = 0; 
            }

            if(ok == 0){
                console.log("Fyll inn alle felter, informasjon kan gå tapt, trykk ok for å samtykke");
            }



            var json = {
                'name' : name,
                'title' : title,
                'country' : country,
                'city' : city,
                'about' : about
            };

            json = JSON.stringify(json);

            $.ajax({
                type: "POST",
                dataType : "text",
                url : "../phpBackend/updateProject.php",
                data : {"project" : json},
                success : function(response){
                    if(response == "OK"){
                        console.log("Successful ajax request from change_projectinfo.js calling to updateProject.php " + response);
                        window.location.replace("../pages/showProjects.php");

                    }else{
                        alert("Response: " + response);
                    }


                },
                error : function(response){
                    console.log("changeorginfor.js error feil fra update organization.php feil i ajax request");
                }

            });

        });

          $("#uploadimg").click(function() {
            $("#file1").trigger('click');
        });

