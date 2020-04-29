<?php
include('connect.php');

session_start();
    if(!isset($_SESSION['uname'])){
      echo "<script>location.href='signin_form.html'</script>";
    }

    else{
      $uname=$_SESSION['uname'];
      $placeID_val = $_POST['placeID'];
      echo $placeID_val;


      $deleteQuery = "DELETE FROM boarding_place_table WHERE Place_ID = '". $placeID_val."'";
      $deleteResult=mysqli_query($link,$deleteQuery);
     
      
     

      

      if(!mysqli_query($link,$deleteQuery)){
        die('Error:'.mysqli_error($link));
      }

      echo 'successfully deleted';



    }

?>