<?php

include('connect.php');


$enterUsername_val = urldecode($_POST['username']);
$enterPassword_val = urldecode($_POST['password']);

$existQuery= "SELECT username1 FROM owner_table WHERE username1='".$enterUsername_val."' ";
$existResult = mysqli_query($link,$existQuery);

if(!mysqli_query($link,$existQuery)){
    die('Error:'.mysqli_error($link));
}


if (mysqli_num_rows($existResult) > 0) {  //check existentence of the user
    $passwordQuery ="SELECT password1 FROM owner_table WHERE username1='".$enterUsername_val."' ";
    $passwordResult=mysqli_query($link,$passwordQuery);
      
    if(!mysqli_query($link,$passwordQuery)){
        die('Error:'.mysqli_error($link));
    }

    while($rows=mysqli_fetch_assoc($passwordResult)){
        $correctPassword=$rows['password1'];
        echo $correctPassword;
        echo $enterPassword_val;
    }

    session_start();

    if(isset($_SESSION['uname'])){         //is session set
        echo "<h1>Welcome " .$_SESSION['uname']."</h1>";
        echo "<script>location.href='dash.php'</script>";
      
    }
    else{                   // is session not set
        if($enterPassword_val==$correctPassword){   //if password correct
                $_SESSION['uname'] = $enterUsername_val;
                echo "<script>location.href='dash.php'</script>";
                echo "success";
                
          
        }
        else if($enterPassword_val!=$correctPassword){           //if password wrong
            echo "<script>alert('username or password incorrect')</script>";
            echo "<script>location.href='signin_form.html'</script>";
            echo "not success";
                
        

        }
        else {           //other
           
            echo "kill me";
                
        

        }
    
    }




}
else{    //if user does not exists
    echo "<script>alert('This username does not exist')</script>";
    echo "<script>location.href='signin_form.html'</script>";
}

 



















?>
