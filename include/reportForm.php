<div class="container">
			<form id="caseForm" class="wow fadeInUp" data-wow-delay="1.0s" action="process.php" enctype="multipart/form-data">
				<div class="row">
					<input type="hidden" name="caseSubmit">
					<div class="col-md-4">
						<div class="form-group">
   							 <label>Name :</label>
    							<input type="text" class="form-control" name="caseName" placeholder="Enter Name" required>
						  </div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
   							 <label>Father Name :</label>
    							<input type="text" class="form-control" name="fatherName" placeholder="Enter Father Name">
						  </div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
   							 <label>Current Age :</label>
    						 <select class="form-control" name="age" required>
    						 	<option value=''>Select Age</option>
    						 	<?php 
    						 		for ($i=1; $i <=75 ; $i++) { 
    						 			echo "<option value='{$i}'>{$i}</option>";
    						 		}
    						 	?>
   							 	
   							 </select>
						  </div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
   							 <label>Gender :</label>
    						 <select class="form-control" name="gender" required>
    						 	<option value=''>Gender</option>
   							 	<option value='Male'>Male</option>
   							 	<option value='Female'>Female</option>
   							 </select>
   							 
						  </div>	  
					</div>
					<div class="col-md-2">
						<div class="form-group">
   							 <label>Eye Color :</label>
    						 <select class="form-control" name="eyeColor">
    						 	<option value=''>Eye Color</option>
   							 	<option value='Blue'>Blue</option>
   							 	<option value='Hazal'>Hazal</option>
   							 	<option value='Green'>Green</option>
   							 	<option value='Brown'>Brown</option>
   							 	<option value='Black'>black</option>
   							 </select>
   							 <p  class="text-dark">Optional</p>

						  </div>

					</div>
					<div class="col-md-2">
						<div class="form-group">
   							 <label>Hair Color :</label>
    						 <select class="form-control" name="hairColor">
    						 	<option value=''>Hair Color</option>
   							 	<option value='Dark Brown'>Dark Brown</option>
   							 	<option value='Brown'>Brown</option>
   							 	<option value='Blonde'>Blonde</option>
   							 	<option value='Black'>Black</option>
   							 </select>
   							 <p  class="text-dark">Optional</p>
						  </div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
   							 <label>Mental Health :</label>
    						 <select class="form-control" name="mHealth" required/>
    						 	<option value=''>Mental Health</option>
   							 	<option value='Normal'>Normal</option>
   							 	<option value='Disturb'>Disturb</option>
   							 </select>
						  </div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
   							 <label>Disability</label>
    						 <select class="form-control" name="disability" required/>
    						 	<option value=''>Disability</option>
   							 	<option value='Yes'>Yes</option>
   							 	<option value='No'>No</option>
   							 </select>
						  </div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
   							 <label>Identification Mark :</label>
    							<input type="text" class="form-control" name="idenMark" id="idenMark" placeholder="Enter Identification">
    							<p class="text-dark">Optional</p>
						  </div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
   							 <label>Region - Province :</label>
    							<select class="form-control" name="caseProvince" required/>
    								<option value=''>Region - Province</option>
   							 	<?php
   							 	$sqlPro = "SELECT * FROM provinces";
   							 	$result = myQuery($sqlPro);

   							 	while ($row = myFetchArray($result)) {
   							 		echo "<option value='{$row['P_Name']}'>{$row['P_Name']}</option>";
   							 	}

   							 	?>
   							 	
   							 </select>
						  </div>
						 
					</div>
					<div class="col-md-4">
						<div class="form-group">
   							 <label>City :</label>
   							 <select class="form-control" name="caseCity" required/>
   							 	<option value=''>City</option>
   							 	<?php
   							 	$sqlCity = "SELECT * FROM cities";
   							 	$result = myQuery($sqlCity);

   							 	while ($row = myFetchArray($result)) {
   							 		echo "<option value='{$row['C_Name']}'>{$row['C_Name']}</option>";
   							 	}

   							 	?>
   							 	
   							 </select>
						  </div>
						  
					</div>
					<div class="col-md-4">
						<div class="form-group">
   							 <label>District :</label>
   							 <select class="form-control" name="caseDistrict" required/>
   							 	<option value=''>District</option>
   							 	<?php
   							 	$sqlDis = "SELECT * FROM districts";
   							 	$result = myQuery($sqlDis);

   							 	while ($row = myFetchArray($result)) {
   							 		echo "<option value='{$row['D_Name']}'>{$row['D_Name']}</option>";
   							 	}

   							 	?>
   							 	
   							 </select>
						  </div>
						  
					</div>
					<div class="col-md-12">
						<div class="col-md-4 mx-auto">
          				   <label>Upload Picture :</label>
          				 		<input  type="file" name="caseImg" id="caseImg" class="btn btn-success" required/>
					        <p id="imgError" class="text-dark"></p>
					    </div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
   							 <label>Reporter Name :</label>
    							<input type="text" class="form-control" name="caseReporter" placeholder="Enter Reporter Name" required/>
						  </div>
						  
					</div>
					<div class="col-md-4">
						<div class="form-group">
   							 <label>Relation :</label>
    						 <select class="form-control" name="crType" required/>
    						 	<option value=''>Relation</option>
   							 	<option value='Father'>Father</option>
   							 	<option value='Mother'>Mother</option>
   							 	<option value='Brother'>Brother</option>
   							 	<option value='Sister'>Sister</option>
   							 	<option value='Uncle'>Uncle</option>
   							 	<option value='Aunt'>Aunt</option>
   							 	<option value='Cousin'>Cousin</option>
   							 	<option value='Other'>Other</option>
   							 	
   							 </select>
						  </div>
						  
					</div>
					<div class="col-md-4">
						<div class="form-group">
   							 <label>Phone :</label>
    							<input type="text" class="form-control" name="casePhone" placeholder="Enter Phone Number" required/>
						  </div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
   							 <label>Address 1:</label>
  								<textarea class="form-control" rows="2" name="caseAdd1" required/></textarea>
						 </div>	 
					</div>
					<div class="col-md-4">
						<div class="form-group">
   							 <label>Address 2:</label>
  								<textarea class="form-control" rows="2" name="caseAdd2" ></textarea>
    							<p class="text-dark">Optional</p>
						 </div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
   							 <label>About Case:</label>
  								<textarea class="form-control" rows="2" name="caseAbout"></textarea>
						 
						 </div>
					</div>

					<div class="col-md-4 mx-auto text-center">
					<button type="submit" class="btn btn-success">Submit</button>
					<button type="reset" class="btn btn-warning">Reset</button>
					</div>
				</div>
			</form>			
		</div>