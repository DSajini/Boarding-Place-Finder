<?php 
    include('connect.php');


   
    session_start();
        if(!isset($_SESSION['uname'])){
            echo "<script>location.href='signin_form.html'</script>";
        }

        else{
            $uname=$_SESSION['uname'];
            $regNoQuery = "SELECT Reg_No FROM owner_table WHERE username1 = '".$uname."'";
            $regNoResult=mysqli_query($link,$regNoQuery);
        
            while($rows=mysqli_fetch_assoc($regNoResult)){
                $owner_reg_no_val =  $rows['Reg_No'];
            }
           
            $address1_val = $_POST['address1'];
            $address2_val = $_POST['address2'];
            $address3_val = $_POST['address3'];
            $province_val = $_POST['province'];
            $town_val = $_POST['town'];
            $placeType_val = $_POST['placeType'];
            $gender_val = $_POST['gender'];
            $peopleType_val = $_POST['peopleType'];

            if(($address1_val  ==null)||($address2_val==null)||($address3_val==null)||($province_val==null)||($town_val==null)||($placeType_val ==null)||($gender_val==null)||($peopleType_val==null)){
                echo "<script>alert('All fields are required')</script>";
                echo "<script>location.href='addPlace_form.html'</script>";
            }
        
                  
               
            $insertquery = "INSERT INTO boarding_place_table (Owner_Reg_No,Address1, Address2, Address3, Province, Town, Place_Type, People_Gender, People_Type) VALUES ('$owner_reg_no_val','$address1_val','$address2_val','$address3_val','$province_val','$town_val','$placeType_val','$gender_val','$peopleType_val')";
            
            echo "<script>alert('Place was added sucessfully.')</script>";
            include 'addPlace_form.php';

            if(!mysqli_query($link,$insertquery)){
                die('Error:'.mysqli_error($link));
            }

        }

?>
