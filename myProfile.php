<?php
include('connect.php');
include('navbar.html');


session_start();
    if(!isset($_SESSION['uname'])){
      echo "<script>location.href='signin_form.html'</script>";
      die();
    }

    else{
      $uname=$_SESSION['uname'];
      $detailsQuery = "SELECT * FROM owner_table WHERE username1='".$uname."'";
      $detailsResult=mysqli_query($link,$detailsQuery);
      
      if(!mysqli_query($link,$detailsQuery)){
          die('Error:'.mysqli_error($link));
      }


/*
      $teleQuery = "UPDATE owner_table SET WHERE username1='".$uname."'";
      $teleResult=mysqli_query($link,$teleQuery);
      
      if(!mysqli_query($link,$teleQuery)){
          die('Error:'.mysqli_error($link));
      }


      */
    }



?>





<div class="text-center">
	<div class="jumbotron">
    <h1>Welcome </h1>
    
    <div class=row>
      <img src="logo.png" alt="logo" style="width:250px;">
    </div>
    
    <div class=row>
      <h2>My Profile</h2>
    </div>
  </div>
</div>


<div class="row justify-content-around">
  <div class="card" style="width: 50rem;">
    <div class="card-body">
      <ul>

          <?php
            while($rows=mysqli_fetch_assoc($detailsResult)){
          ?> 
      
        <li>Reg Number :- <?php echo $rows['Reg_No']?>              </li>
        <li>First Name :- <?php echo $rows['First_Name']?>              </li>
        <li>Last Name :-  <?php echo $rows['Last_Name']?>              </li>
        <li>Telephone Number :- <?php echo $rows['Telephone_No']?>        </li>
        <li>Email :-  <?php echo $rows['email']?>                  </li>

         
        <li>Change Telephone Number </li>
          
          <?php 
            }
          ?>

      </ul>
    </div>
  </div>
</div>


