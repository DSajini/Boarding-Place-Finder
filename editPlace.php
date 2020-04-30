<?php
include('connect.php');

session_start();
    if(!isset($_SESSION['uname'])){
      echo "<script>location.href='signin_form.html'</script>";
    }

    else{
      $uname=$_SESSION['uname'];
      $placeID_val = $_POST['placeID'];
      //echo $placeID_val;
      


      $PlaceID_val=$_POST['placeID'];
      $address1_val=$_POST['address1'];
      $address2_val=$_POST['address2'];
      $address3_val=$_POST['address3'];
      $province_val=$_POST['province'];
      $town_val=$_POST['town'];
      $placeType_val=$_POST['placeType'];
      $gender_val=$_POST['gender'];
      $peopleType_val=$_POST['peopleType'];
            
       
      $updateQuery = "UPDATE boarding_place_table SET Place_ID= '$PlaceID_val',Address1='$address1_val',Address2='$address2_val',Address3='$address3_val',Province='$province_val',Town='$town_val',Place_Type='$placeType_val',People_Gender='$gender_val',People_Type='$peopleType_val  WHERE Place_ID = '". $placeID_val."'";
      $updateResult=mysqli_query($link,$updateQuery);
    

      if(!mysqli_query($link,$updateQuery)){
        die('Error:'.mysqli_error($link));
      }
    }

    echo "<script>alert('Place was edited sucessfully.')</script>";

?>