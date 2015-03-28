<?php
session_start();

include '../phpBackend/checkSession.php';
include '../phpBackend/connect.php';

?>

<html>
<head>
    <title></title>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="../js/Chart.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sharity</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Custom CSS -->
    <link href="../css/scrolling-nav.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../css/index.css" />
    <link rel="stylesheet" type="text/css" href="../css/list_project.css">
    <link href="../css/main.css" rel="stylesheet"/>
    <link href="../css/fonts.css" rel="stylesheet"/>
    <link href="http://www.eyecon.ro/bootstrap-datepicker/css/datepicker.css" type="text/css" rel="stylesheet"/>
    
    <link href="../css/main-theme.css" rel="stylesheet" type="text/css" title="default" />
    <link href="../css/alternate-theme-1.css" rel="stylesheet" type="text/css" title="alternate" />
    <link href="../css/alternate-theme-2.css" rel="stylesheet" type="text/css" title="alternate2" />
    <link href="../css/alternate-theme-3.css" rel="stylesheet" type="text/css" title="alternate3" />

    <script src="../js/styleswitcher.js" type="text/javascript" ></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    
    
    
    <script>
    $(document).ready(function(){
        $('button[name=day]').click(function(){
            day();
        });
        
        $('#datepicker').datepicker({
                format: "yyyy-mm-dd",
                weekStart: 1,
                language: "no",
                todayHighlight: true
        });

        function day(){
            var day = $('input[name=date]').val();
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("out").innerHTML = xmlhttp.responseText;
                }
            }

            xmlhttp.open("GET", "../phpBackend/OrgStat/followersDay.php?date=" + day, true);
            xmlhttp.send();
        }
    });
    </script>


</head>

<body>

<?php
    include 'header_nav.php';
?>

    <div class="container">
        <div>
            <div class="col-md-3"></div>

            <div class="col-md-6 text-center" id="">
                <div class="row">
                    <div class="input-append date" id="datepicker" data-date-format="yyyy-mm-dd">
                        <input class="span2" size="16" name="date" type="text" readonly="readonly" />
                        <span class="add-on"><i class="icon-calendar"></i></span>
                    </div>


                </div>

                <div class="row">
                    <button type="submit" class="btn" name="day" id="searchbtn">
                            Dag
                    </button>        
                </div>
                <div class="row">
                    <span id="out"></span>      
                </div>

            </div>
        </div>
    </div>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script><script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js" type="text/javascript" ></script>
    <script type="text/javascript">
            // When the document is ready
        
    </script> 

</body>
</html>