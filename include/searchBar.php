<div class="container">
	

	<div class="col-md-10 searchBox wow fadeIn mx-auto" data-wow-delay='0.2s'>
		<div>
			<h1 class="myHeader">Search Your Case</h1>
		</div>
		<div class="separator_left"></div>

		<form class="row" method="POST" action="search.php">
			<div class="col-md-6 form-group">
				<label class="control-label formLabel" for="inputDefault">By Name</label>
				<input class="form-control" type="text" name="searchName" placeholder="e.g Imran">
			</div>
			<div class="col-md-6 form-group">
				<label class="control-label formLabel" for="inputDefault">By Age</label>
				<input class="form-control" type="number" name="searchAge" placeholder="e.g 15">
			</div>
			<div class="col-md-6 form-group">
				<label class="control-label formLabel" for="inputDefault">By City</label>
				<select class="form-control" name="searchCity">
					<option>Select City</option>
					<option>Peshawar</option>
					<option>Islamabad</option>
					<option>Lahore</option>
					<option>karachi</option>
					<option>Quetta</option>
					<option>faisalabad</option>
					<option>Mardan</option>
				</select>
			</div>
			<div class="col-md-6 form-group">
				<label class="control-label formLabel" for="inputDefault">By Province</label>
				<select class="form-control" name="searchPro">
					<option>Select Province</option>
					<option>Panjab</option>
					<option>Khyber Pakhtunkhwa</option>
					<option>Balochistan</option>
					<option>Sindh</option>
					<option>Gilgit Baltistan</option>
					<option>Azad Kashmir</option>
				</select>
			</div>
			<div class="col-md-6 mx-auto text-center">
				<input type="submit" class="btn formSubmit" name="searchCase" value="Search">
			</div>
		</form>
	</div>
</div>
