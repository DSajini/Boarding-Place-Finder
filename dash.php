<?php
include('connect.php');
include('navbar.html');

session_start();
    if(!isset($_SESSION['uname'])){
      echo "<script>location.href='signin_form.html'</script>";
    }

    else{
      $uname=$_SESSION['uname'];
       
      $regNoQuery = "SELECT Reg_No FROM owner_table WHERE username1 = '".$uname."'";
      $regNoResult=mysqli_query($link,$regNoQuery);
      while($rows=mysqli_fetch_assoc($regNoResult)){
      //echo $rows['Reg_No'];
      }
     
      $placeQuery = "SELECT * FROM boarding_place_table,owner_table WHERE  boarding_place_table.Owner_Reg_No = owner_table.Reg_No AND owner_table.username1='".$uname."'";
     

      $placeResult=mysqli_query($link,$placeQuery);
      
      if(!mysqli_query($link,$placeQuery)){
          die('Error:'.mysqli_error($link));
      }
      if(!mysqli_query($link,$regNoQuery)){
        die('Error:'.mysqli_error($link));
    }
    }

?>

<div class="text-center">
	<div class="jumbotron">
    <div class=row>
      <img src="logo.png" alt="logo" style="width:250px;">
    </div>
    <div class=row>
      <h1>WELCOME 
      
      <?php
        echo($_SESSION['uname']);
      ?>
      
      ...!!! </h1>
    </div>
    
    
    <h2>My Places</h2>
  </div>
</div>


<div class="row justify-content-around">
  <div class="card" style="width: 100rem;">
    <div class="card-body">
	  	<div class="text-center">
	  		<table class="table">
           <thead class="thead-dark">
              <tr>
                <th scope="col">Place ID</th>
                <th scope="col">Address Line 1</th>
                <th scope="col">Address Lind 2</th>
                <th scope="col">Address Line 3</th>
                <th scope="col">Province</th>
                <th scope="col">Town</th>
                <th scope="col">Place Type</th>
                <th scope="col">People Gender</th>
                <th scope="col">People Type</th>
                <th scope="col">Edit/Delete</th>
              </tr>
            </thead>

            <?php
              while($rows=mysqli_fetch_assoc($placeResult)){
            ?>
            
            <tbody>
              <tr>
                <td><?php $value = $rows['Place_Id'];  echo $rows['Place_Id']?></td>
                <td><?php echo $rows['Address1']?></td>
                <td><?php echo $rows['Address2']?></td>
                <td><?php echo $rows['Address3']?></td>
                <td><?php echo $rows['Province']?></td>
                <td><?php echo $rows['Town']?></td>
                <td><?php echo $rows['Place_Type']?></td>
                <td><?php echo $rows['People_Gender']?></td>
                <td><?php echo $rows['People_Type']?></td>
                <td><form action="editPlace_form.php" method="POST"> 
                      <div class="row">
                      <input type="hidden" class="form-control" name="placeID" value="<?php echo $value ?>" >
                      <input class="btn btn-secondary btn-sm" type="submit" name="submit" value="Edit" />
                    </form>


                    <form action="deletePlace.php" method="POST"> 
                      <input type="hidden" class="form-control" name="placeID" value="<?php echo $value ?>" >
                      <input class="btn btn-danger btn-sm" type="submit" name="submit" value="Delete"  />

                    </form>
              </div>
                </td>
              </tr>
            </tbody>

            <?php
              }
            ?>
              
        </table>
            
        <br>
			</div>
		</div>
	</div>	

		
</div>






