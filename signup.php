<?php
    include('connect.php');

    $fname_val = $_POST['firstname'];
    $lname_val = $_POST['lastname'];
    $teleno_val = $_POST['teleno'];
    $email_val = $_POST['email'];
    $username_val = $_POST['username'];
    $password1_val = $_POST['password1'];
    $password2_val = $_POST['password2'];


    $checkEmailQuery="SELECT email FROM owner_table WHERE email='".$email_val."'";
    $checkUsernameQuery="SELECT username1 FROM owner_table WHERE username1='".$username_val."'";
    $checkEmailResult = mysqli_query($link, $checkEmailQuery); 
    $checkUsernameResult = mysqli_query($link, $checkUsernameQuery); 
    if(!mysqli_query($link,$checkEmailQuery)){
        die('Error:'.mysqli_error($link));
    }
    if(!mysqli_query($link,$checkUsernameQuery)){
        die('Error:'.mysqli_error($link));
    }


    if (mysqli_num_rows($checkEmailResult) > 0) { //check email existence
   
        echo "<script>alert('This email has already registered.')</script>";
        echo "<script>location.href='signup_form.html'</script>";
    }
     else{
        if (mysqli_num_rows($checkUsernameResult) > 0) {  //check username existence
            echo "<script>alert('This username already exists.')</script>";
            echo "<script>location.href='signup_form.html'</script>";
        }
         else{

            if($password1_val!=$password2_val){   //compare 2 passwords entered
                echo "<script>alert('passwords you entered are different. Please try again.')</script>";
                echo "<script>location.href='signup_form.html'</script>";
            }

            //check all fields are filled
            if(($fname_val ==null)||($lname_val==null)||($teleno_val==null)||($email_val==null)||($username_val==null)||($password1_val ==null)||($password2_val==null)){
                echo "<script>alert('All fields are required')</script>";
                echo "<script>location.href='signup_form.html'</script>";
            }

            //successfully added
            $addQuery = "INSERT INTO owner_table (First_Name, Last_Name, Telephone_No, email, username1, password1) VALUES ('$fname_val','$lname_val','$teleno_val','$email_val','$username_val','$password2_val')";
            if(!mysqli_query($link,$addQuery)){
                die('Error:'.mysqli_error($link));
            }
            echo "<script>alert('Sign up successfull.Please sign in using your username and password')</script>";
            include ('signin_form.html');


            
        }
        
    }


    
    

    


    
    

    


?>
