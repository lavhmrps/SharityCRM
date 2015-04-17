<?php
			echo '<input type="text" id="reg_project_input" class="form-control" name="projectName" placeholder="Prosjektnavn" value="' . $name . '" readonly/>
			<input type="file" id="file_background" style="display:none" accept="image/*" name="backgroundimgURL"/>
			<img src="'. $backgroundimgURL.'" id="Projectpreview" alt="Click to upload img" name="preview"/>
			<input type="text" id="reg_project_input" class="form-control" name="country" placeholder="Land" value="' . $country. '" readonly/>
			<input type="text" id="reg_project_input" class="form-control" name="city" placeholder="By" value="' . $city . '" readonly/>
			<input type="text" id="reg_project_input" class="form-control" name="title" placeholder="Prosjekt tittel" value="' . $title . '" readonly/>
			<textarea class="form-control" id="aboutOrg_pt2" rows="5" name="about" placeholder="Prosjektbeskrivelse" readonly>' . $about . '</textarea>


			';

			?>
			<?php 
				echo '<div id="showselectednewsChange"onclick=showSelectedNews(' . $row['projectID'] . ')>';
				echo '<a href="change_projectinfo.php" id="Changebutton" onclick="showProject(' . $row['projectID'] . ')">Endre</a>';
				echo '</div>';
			?>