<?php
$sql = "SELECT * FROM organization WHERE organizationNr = $organizationNr";
$result = mysqli_query($connection, $sql);
if($result){
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
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
        echo '<div class="col-md-10" id="registration_pt2_margin">';
        echo "<div class='row'>";
        echo "<div class='col-md-2'>";
        echo '<label id="registerorglabel">Adresse</label>';
        echo "</div>";
        echo "<div class='col-md-10 text-right spanpadding'>";
        echo "<span hidden name='title' class='errorspan'>Kun bokstaver, tall og mellomrom</span>";
        echo "</div>";
        echo "</div>";
        echo '<input type="text" class="form-control" name="address" id="reg_pt2_input" value="'.$address.'" />';

        echo '</div>';
        echo '<div class="col-md-2" id="registration_pt2_margin2">';
        echo "<div class='row'>";
        echo "<div class='col-md-4'>";
        echo '<label id="registerorglabel">Postnr</label>';
        echo "</div>";
        echo "<div class='col-md-8 text-right spanpadding'>";
        echo "<span hidden name='title' class='errorspan'>4 tall</span>";
        echo "</div>";
        echo "</div>";
        echo '<input type="tel" class="form-control" name="zipcode" id="reg_pt2_inputZipcode" value="'.$zipcode.'"/>';

        echo '</div>';
        echo "<div class='row'>";
        echo "<div class='col-md-3'>";
        echo '<label id="registerorglabel">Telefonnummer</label>';
        echo "</div>";
        echo "<div class='col-md-9 text-right spanpadding'>";
        echo "<span hidden name='title' class='errorspan'>Kun akkurat 8 siffer</span>";
        echo "</div>";
        echo "</div>";
        echo '<input type="tel" class="form-control" name="phone" id="reg_pt2_input" value="'.$phone.'" />';
        echo "<div class='row'>";
        echo "<div class='col-md-3'>";
        echo '<label id="registerorglabel">Epost</label>';
        echo "</div>";
        echo "<div class='col-md-9 text-right spanpadding'>";
        echo "<span hidden name='title' class='errorspan'>Ugyldig epost</span>";
        echo "</div>";
        echo "</div>";
        echo '<input type="email" class="form-control" name="email" id="reg_pt2_input" value="'.$email.'"/>';
        echo "<div class='row'>";
        echo "<div class='col-md-3'>";
        echo '<label id="registerorglabel">Nettside</label>';
        echo "</div>";
        echo "<div class='col-md-9 text-right spanpadding'>";
        echo "<span hidden name='title' class='errorspan'>Følg dette formatet: eksempel.no</span>";
        echo "</div>";
        echo "</div>";
        echo '<input type="text" class="form-control" name="website" id="reg_pt2_input" value="'.$website.'" />';
        echo "<div class='row'>";
        echo "<div class='col-md-3'>";
        echo '<label id="registerorglabel">Kontonummer</label>';
        echo "</div>";
        echo "<div class='col-md-9 text-right spanpadding'>";
        echo "<span hidden name='title' class='errorspan'>Kun akkurat 11 siffer</span>";
        echo "</div>";
        echo "</div>";
        echo '<input type="tel" class="form-control" name="accountnumber" id="reg_pt2_input" value="'.$accountnumber.'"/>';
        echo '<label id="registerorglabel">Kategori</label><div class="regOrgDropdown">
        <select class="orgbtn1" name="category">
        <option value="NULL">Velg kategori</option>
        <option value="Humanitært" >Humanitært</option>
        <option value="Dyrevern" >Dyrevern</option>
        <option value="Forskning" >Forskning</option>
        <option value="Fundraising" >Fundraising</option>
        </select>
        </div>';
        echo "<div class='row'>";
        echo "<div class='col-md-4'>";
        echo '<label id="registerorglabel">Om organisasjonen</label>';
        echo "</div>";
        echo "<div class='col-md-8 text-right spanpadding'>";
        echo "<span hidden name='title' class='errorspan'>Minimum 20 og maks 300 tegn</span>";
        echo "</div>";
        echo "</div>";
        echo '<textarea class="form-control" id="aboutOrg_pt2" rows="5" name="about" id="aboutOrg"  >'.$about.'</textarea>';
        echo '
        <label>Bakgrunnsbilde</label>
        <input type="file" id="file_background" style="display:none" accept="image/*" name="backgroundimgURL" />
        <img src="../img/default.png" id="preview"  alt="Click to upload img" name="preview" />
        ';
        


        echo '
        <label>Logo</label>
        <input type="file" id="file_logo" style="display:none" accept="image/*" name="logoURL" />
        <img src="../img/default.png" id="previewLogo"  alt="Click to upload img" name="previewLogo" />
        ';



        echo '
        <button  class="btn btn-success" name="complete_registration">
        Oppdater
        </button>
        <button  class="btn btn-success" name="complete_registration" onclick="skip()">
        Gå videre
        </button>
        ';

    }
}
?>