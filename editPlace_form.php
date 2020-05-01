<?php
    include('connect.php');
    include('navbar.html');
    
	
	session_start();
	
	//check session - unset
    if(!isset($_SESSION['uname'])){
      echo "<script>location.href='signin_form.html'</script>";
	}
	
	//check session- set
    else{   
		$uname=$_SESSION['uname'];
        
        $placeID_val = $_POST['placeID'];
		//echo $placeID_val;

		
			echo 'edit';

			$detailsQuery = "SELECT owner_table.Reg_No,boarding_place_table.Address1,boarding_place_table.Address2,boarding_place_table.Address3,boarding_place_table.Province,boarding_place_table.Town,boarding_place_table.Place_Type,boarding_place_table.People_Gender,boarding_place_table.People_Type FROM owner_table,boarding_place_table WHERE boarding_place_table.Place_ID = '". $placeID_val."'  AND owner_table.Reg_No= boarding_place_table.Owner_Reg_No";
			$detailsResult=mysqli_query($link,$detailsQuery);
			while($rows=mysqli_fetch_assoc($detailsResult)){
				$reg_val=$rows['Reg_No'];
				$address1_val=$rows['Address1'];
				$address2_val=$rows['Address2'];
				$address3_val=$rows['Address3'];
				$province_val=$rows['Province'];
				$town_val=$rows['Town'];
				$placeType_val=$rows['Place_Type'];
				$peopleGender_val=$rows['People_Gender'];
				$peopleType_val=$rows['People_Type'];
				
				
			 
	
			}
		   
		   
			if(!mysqli_query($link,$detailsQuery)){
			  die('Error:'.mysqli_error($link));
			}
		  
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	
         
       
	
	
	
	}//end if session check

   


    



    


        

?>


<div class="text-center">
	<div class="jumbotron">
	    <img src="logo.png" alt="logo" style="width:250px;">
	    <h1>Edit / Delete a Place</h1>
    </div>
</div>


<div class="row justify-content-around">
    <div class="card" style="width: 28rem;">
        <div class="card-body">
	  		<div class="text-center">
	  		    <form action ="editPlace.php" method="POST">
                   <div class="form-group">
						<label for="placeID">Place ID</label>
                       	<?php echo ' <input type="text" class="form-control" name="placeID" value=" '.$placeID_val.'  ">';?>
					</div>

                    <div class="row justify-content-around">
                        <div class="form-group">
							<label for="address1">Address Line 1</label>
							<?php echo ' <input  type="text" class="form-control" name ="address1" value=" '.$address1_val.'  ">';?>
						</div>
                        
                        <div class="form-group">
							<label for="address2">Address Line 2</label>
							<?php echo '<input type="text" class="form-control" name="address2" value=" '.$address2_val.'  ">';?>
						</div>
					</div>

					<div class="form-group">
						<label for="address3">Address Line 3</label>
						<?php echo '<input type="text" class="form-control" name="address3" value=" '.$address3_val.'  ">';?>
					</div>
                    
                    <div class="row justify-content-around">
                        <div class="form-group">
							<label for="province">Select Province:</label>
							<select class="form-control" name="province">
                                <option><?php echo $province_val; ?></option>
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
                            <?php echo '<input type="text" class="form-control" name="town" value=" '.$town_val.'  ">';?>
                        </div>
                    </div>

					<div class="row justify-content-around">
				  		<div class="form-group">
							<label for="placeType">Select Type of Place:</label>
							<select class="form-control" name="placeType" value=>
                                <option><?php echo $placeType_val; ?></option>
                                <option>House</option>
								<option>Single Room</option>
								<option>Multiple Rooms</option>
							</select>
				  		</div>

				  		<div class="form-group">
							<label for="gender">Select Gender:</label>
							<select class="form-control" name="gender">
                                <option><?php echo $peopleGender_val; ?></option>
								<option>Male</option>
								<option>Female</option>
							</select>
                        </div>
                    </div>

                    <div class="row justify-content-around">
                        <div class="form-group">
				    	    <label for="peopleType">Select Type of People:</label>
							<select class="form-control" name="peopleType">
                                <option><?php echo $peopleType_val; ?></option>
                                <option>School Students</option>
								<option>University Students</option>
								<option>Employees</option>
                            </select>
                        </div>
			  		</div>

					<input class="btn btn-primary btn-lg" type="submit" name="submit" value="Edit Place" />
						 

				</form>
                
                <br>
			    	
			</div>
		</div>
	</div>	

		
</div>

