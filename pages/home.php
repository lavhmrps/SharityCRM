<?php



/*Starter session*/
session_start();

include 'checkSession.php';
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sharity</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/font.css" rel="stylesheet">

  </head>

  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <?php
    include 'header_nav.php';
    ?>

    <div class="col-md-3" id="homebox">

      <?php
      $organizationNr = $_SESSION['organizationNr'];
      $sql = "SELECT * FROM Organization WHERE organizationNr = $organizationNr";
      $result = mysqli_query($connection, $sql);

      if ($result) {
        if (mysqli_num_rows($result) == 1) {
          $row = mysqli_fetch_assoc($result);
          
          echo '<div class="col-md-0"></div>';
          echo '<div class=" text-center">';
          echo "<img src='" . $row['logoURL'] . "' alt='Organisasjonslogo'  id='orgLogo'/>";
          echo '</div>';
          echo '<div class="col-md-0"></div>';


          echo "<img src='" . $row['backgroundimgURL'] . " ' alt='Bakgrunnsbilde' id='orgBackground'/>";
          
          echo '<div class="row">';
            echo '<div class="col-md-6" id="aboutOrgPadding">';
              echo '<p>Orgnr: ' . $row["organizationNr"] . '</p>
                   <p>Telefon: ' . $row["phone"]. '</p>';
              

            echo '</div>';
          
            echo '<div class="col-md-6" id="aboutOrgPadding">';
          
              echo '<p>Kategori: ' . $row["category"]. '</p>
  
                   <p>Kontonummer: ' . $row["accountnumber"] . '</p>';

              echo "</div>";
            echo "</div>";
             echo "<br/>";

          echo '<div class="col-md-12" id="orgInfo">';
          echo '<p>Epost: ' . $row["email"]. '</p>
                <p>Adresse: ' . $row["address"] . ', ' . $row["zipcode"]. ' Poststed?!?</p>
               <p>Nettside: <a href="' . $row["website"]. '">' . $row["website"]. '</a></p><br/>
               ';
          echo '</div>';

          echo '<textarea class="form-control" name="about" id="aboutOrg" rows="4" style="cursor:default;" id="aboutproject" readonly>' . $row["about"] . '</textarea>';


         



        }
      } ?>


      </div>


      <div class="col-md-5" id="homebox">
      <?php
      $sql = "SELECT Donation.*, Project.name FROM Donation INNER JOIN Project ON Donation.projectID = Project.projectID WHERE Project.organizationNr = $organizationNr";
      $result = mysqli_query($connection, $sql);

      if ($result) {
      
        echo "Antall donasjoner: " . mysqli_num_rows($result) . "</br>";
        echo "Antall unike givere?: </br></br></br></br>";
        echo "";
        $sum = 0;
        
        
        while ($row = mysqli_fetch_assoc($result)) {

          echo "Donert til prosjektID: " . $row['projectID'];
          echo "<br/>Sum donert: " . $row['sum'] . " kr";
          echo "<br/>Prosjektnavn: " . $row['name'];
          echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
          
          $sum += $row['sum'];
        }
      echo "<h2>Sum kroner innsammlet: " . $sum;
      } else {
        echo "<h2>Failure</h2>";
      }
      
      
      ?>
      </div>
      

      

    </div>
    <div class="col-md-3" id="homebox">
      <h1><u>Denne mnd</u></h1>
      <h3>Antall donasjoner:</h3>
      <h3>Antall unike givere:</h3>
      <h3>Totalt:</h3>
    </div>
  

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/stickyheader.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
  
  
  </body>
</html>

