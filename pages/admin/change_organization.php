<?php
include '../../phpBackend/CheckAdminSession.php';
?>

<?php
    //include '../phpBackend/connect.php';
    //include '../phpBackend/hash.php';
$connection = mysqli_connect("localhost", "root", "", "database") or die("Kunne ikke koble til database");

function insertInto($connection, $sql) {
  if (mysqli_query($connection, $sql) === TRUE) {
    return "OK";
  }else{
    return mysqli_error($connection);
        //sjekk om det er duplicate entry !
  }
}

function better_crypt($input, $rounds = 7)
{
  $salt = "";
  $salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
  for($i=0; $i < 22; $i++) {
    $salt .= $salt_chars[array_rand($salt_chars)];
  }
  return crypt($input, sprintf('$2a$%02d$', $rounds) . $salt);
}

?>

<!DOCTYPE html>
<html>
<head>

	<title>Admin</title>
	

	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/Admin.css" rel="stylesheet">


  <!--Importerer jQuery biblioteket for å kunne bruke jQuery metoder-->
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>



  <!--Importerer upadetOrganization fra ../js/updateOrganization.js-->
  <script type="text/javascript" src="../../js/updateOrganization.js"></script>
</head>

<body>

  <?php
  include 'adminHeader_nav.php';
  ?>




  <div class="container">

    <div class="col-md-3"></div>

    <div class="col-md-6 text-center" id="">
      <div class="row">
        <form action="" method="post">
          <div class="col-md-10"> 
            <input type="text" name="orgnr" class="form-control" id="orgnt" placeholder="Søk.."/>
          </div>
          <div class="col-md-2">
            <button type="submit" class="btn" name="submit" id="searchbtn">
              Søk
            </button>
          </div>
        </form>
      </div>
    </div>
    
  </div>



  <!-- Bare putt infoen som ble funnet ved søket i databasen inn her inntil videre.. så fikser jeg utseende senere. B :)-->
<?php		
if(isset($_POST['submit'])){
  $orgnr = $_POST['orgnr'];


  $sql = "SELECT * FROM Organization WHERE organizationNr = '$orgnr'";
  $result = mysqli_query($connection, $sql);

  if($result){

   if(mysqli_num_rows($result) == 1){

    $row = mysqli_fetch_assoc($result);
    echo "<h1>" . $row['name'] . "</h1>";

                                //$name = $row['name'];
    $category = $row['category'];
    $phone = $row['phone'];
    $address = $row['address'];
    $zipcode = $row['zipcode'];
    $logoURL = $row['logoURL'];
    $backgroundimgURL = $row['backgroundimgURL'];
    $website = $row['website'];
    $accountnumber = $row['accountnumber'];
    $email = $row['email'];
    $about = $row['about'];
                                //$password = $row['password'];

                                //echo "<label>Navn</label>";
                                //echo '<input type="text" class="form-control" name="name" id="change_org" placeholder="" value="' . $name . '"/>';

    echo "<label>Adresse</label>";
    echo '<input type="text" class="form-control" name="address" id="change_org" placeholder="" value="' . $address . '"/>';

    echo "<label>Postnummer</label>";
    echo '<input type="tel" class="form-control" name="zipcode" id="change_org" placeholder="" value="' . $zipcode . '"/>';

    echo "<label>Telefonnummer</label>";
    echo '<input type="tel" class="form-control" name="phone" id="change_org" placeholder="" value = "' . $phone . '"/>';

    echo "<label>E-postadresse</label>";
    echo '<input type="email" class="form-control" name="email" id="change_org" placeholder="" value="'. $email . '"/>';

    echo "<label>Link til hjemmeside</label>";
    echo '<input type="text" class="form-control" name="website" id="change_org" placeholder="" value="' . $website . '"/>';

    echo "<label>Kontonummer</label>";
    echo '<input type="tel" class="form-control" name="accountnumber" id="change_org" placeholder="" value="' . $accountnumber . '"/>';

                                //echo "<label>Passord</label>";
                                //echo '<input type="tel" class="form-control" name="password" id="change_org" placeholder="" value=""/>';

                                //echo "<label>Gjenta passord</label>";
                                //echo '<input type="tel" class="form-control" name="repeat_password" id="change_org" placeholder="" value=""/>';

    echo "<label>Velg kategori</label>";
    echo '<div class="regOrgDropdown">
    <select class="orgbtn1" name="category">
      <option value="NULL"></option>
      <option value="Humanitært" >Humanitært</option>
      <option value="Dyrevern" >Dyrevern</option>
      <option value="Forskning" >Forskning</option>
      <option value="Fundraising" >Fundraising</option>
    </select>
  </div>';

  echo '
  <button  class="btn btn-success" name="update_info">
    Oppdater informasjon
  </button>';
                                /*
                            	echo "<label>Beskrivelse av organisasjonen</label>";
                            	echo '<textarea class="form-control" id="aboutOrg_pt2" rows="5" name="about" id="aboutOrg" placeholder="Om organisasjonen">' . $about . '</textarea>';
                            	echo '
                            	<button class="btn bluebtn" name="backgroundimgURLbutton">
                            	Last opp bakgrunnsbilde
                            	</button>
                            	<form enctype="multipart/form-data">
                            	<input type="file" name="backgroundimgURL" style="display:none">
                            	</form> 
                            	';
                            	echo '
                            	<button  class="btn bluebtn" name="logoURLbutton">
                            	Last opp logo
                            	</button>
                            	<form enctype="multipart/form-data">
                            	<input type="file" name="logoURL" style="display:none">
                            	</form> 
                            	';
                                */




                            }
                          }
                        }
                        ?>	


                      </div>

                      <div class="col-md-3"></div>

                    </div>


                    <!-- jQuery -->
                    <script src="js/jquery.js"></script>
                    <!--Check login information-->
                    <script src="checkLogin.js"></script>
                    <!-- Bootstrap Core JavaScript -->
                    <script src="../js/bootstrap.min.js"></script>
                    <!--Sript for insert organization to database through AJAX request-->
                    <script src="../js/updateOrganization.js"></script>

                  </body>


                  </html>