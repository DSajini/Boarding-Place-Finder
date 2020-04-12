<?php
    include('navbar.html');
?>



<div class="text-center">
	<div class="jumbotron">
	    <img src="logo.png" alt="logo" style="width:250px;">
	    <h1>Add a New Place</h1>
    </div>
</div>


<div class="row justify-content-around">
    <div class="card" style="width: 28rem;">
        <div class="card-body">
	  		<div class="text-center">
	  		    <form action ="addPlace.php" method="POST">
		    		<div class="row justify-content-around">
                        <div class="form-group">
							<label for="address1">Address Line 1</label>
							<input  type="text" class="form-control" name ="address1" >
						</div>
                        
                        <div class="form-group">
							<label for="address2">Address Line 2</label>
							<input type="text" class="form-control" name="address2" >
						</div>
					</div>

					<div class="form-group">
						<label for="address3">Address Line 3</label>
						<input type="text" class="form-control" name="address3" >
					</div>
                    
                    <div class="row justify-content-around">
                        <div class="form-group">
							<label for="province">Select Province:</label>
							<select class="form-control" name="province">
								<option disabled selected value> -- select an option -- </option>
								<option>Western Province</option>
								<option>Southern Province</option>
								<option>Sabaragamuwa Province</option>
								<option>Uva Province</option>
								<option>Eastern Province</option>
								<option>Central Province</option>
								<option>North-Western Province</option>
								<option>North-Central Province</option>
								<option>Northern Province</option>
							</select>
                        </div>

                        <div class="form-group">
                            <label for="town">Town</label>
                            <input type="text" class="form-control" name="town" >
                        </div>
                    </div>

					<div class="row justify-content-around">
				  		<div class="form-group">
							<label for="placeType">Select Type of Place:</label>
							<select class="form-control" name="placeType">
								<option disabled selected value> -- select an option -- </option>
								<option>House</option>
								<option>Single Room</option>
								<option>Multiple Rooms</option>
							</select>
				  		</div>

				  		<div class="form-group">
							<label for="gender">Select Gender:</label>
							<select class="form-control" name="gender">
							    <option disabled selected value> -- select an option -- </option>
								<option>Male</option>
								<option>Female</option>
							</select>
                        </div>
                    </div>

                    <div class="row justify-content-around">
                        <div class="form-group">
				    	    <label for="peopleType">Select Type of People:</label>
							<select class="form-control" name="peopleType">
								<option disabled selected value> -- select an option -- </option>
								<option>School Students</option>
								<option>University Students</option>
								<option>Employees</option>
                            </select>
                        </div>
			  		</div>

					<input class="btn btn-primary btn-lg" type="submit" name="submit" value="Add Place" />
						 

				</form>
                
                <br>
			    	
			</div>
		</div>
	</div>	

		
</div>




