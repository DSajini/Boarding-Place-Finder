<?php
    include('connect.php');
    include('findHeader.html');

    $response = array();
    $product = array();
    


    if (isset($_POST['province'])){
      $province_val = $_POST['province'];
    }
    else{
      $province_val = null;
    }
    if (isset($_POST['town'])){
      $town_val = $_POST['town'];
    }
    else{
      $town_val = null;
    }
    if (isset($_POST['gender'])){
      $gender_val = $_POST['gender'];;
    }
    else{
      $gender_val = null;
    }
    if (isset($_POST['placeType'])){
      $placeType_val = $_POST['placeType'];
    }
    else{
      $placeType_val = null;
    } 
    if (isset($_POST['peopleType'])){
      $peopleType_val  = $_POST['peopleType'];
    }
    else{
      $peopleType_val  = null;
    }
    //all null
    if(($province_val == null)&&($town_val == null)&&($gender_val==null)&&($placeType_val == null)&&($peopleType_val  == null)){
      echo "<script>alert('Enter at least one criteria')</script>";
      echo "<script>location.href='find_form.html'</script>";
    }

    //all set
    if ((isset($_POST['province']))&&(isset($_POST['town']))&&(isset($_POST['gender']))&&(isset($_POST['placeType']))&&(isset($_POST['peopleType']))){
      $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Province= '$province_val' AND boarding_place_table.Town='$town_val' AND boarding_place_table.People_Gender='$gender_val' AND boarding_place_table.Place_Type='$placeType_val' AND boarding_place_table.People_Type='$peopleType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
    } 
    // 4 missing only 1 have
    else if (($province_val!=null)&&($town_val == null)&&($gender_val==null)&&($placeType_val == null)&&($peopleType_val  == null)){
      $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Province= '$province_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
    }
    else if (($province_val==null)&&($town_val != null)&&($gender_val==null)&&($placeType_val == null)&&($peopleType_val  == null)){
      $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Town='$town_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No "; 
    }
    else if (($province_val==null)&&($town_val == null)&&($gender_val!=null)&&($placeType_val == null)&&($peopleType_val  == null)){
      $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.People_Gender='$gender_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
    }
    else if (($province_val==null)&&($town_val == null)&&($gender_val==null)&&($placeType_val != null)&&($peopleType_val  == null)){
      $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Place_Type='$placeType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
    }
    else if (($province_val==null)&&($town_val == null)&&($gender_val==null)&&($placeType_val == null)&&($peopleType_val  != null)){
      $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.People_Type='$peopleType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
    }
   //3 missing 2 have
    else if (($province_val!=null)&&($town_val != null)&&($gender_val==null)&&($placeType_val == null)&&($peopleType_val  == null)){
      $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Province= '$province_val' AND boarding_place_table.Town='$town_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";  
    }
    else if (($province_val!=null)&&($town_val == null)&&($gender_val!=null)&&($placeType_val == null)&&($peopleType_val  == null)){
      $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Province= '$province_val' AND boarding_place_table.People_Gender='$gender_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
    }
    else if (($province_val!=null)&&($town_val == null)&&($gender_val==null)&&($placeType_val != null)&&($peopleType_val  == null)){
      $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Province= '$province_val' AND boarding_place_table.Place_Type='$placeType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
    }
    else if (($province_val!=null)&&($town_val == null)&&($gender_val==null)&&($placeType_val == null)&&($peopleType_val  != null)){
      $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Province= '$province_val' AND boarding_place_table.People_Type='$peopleType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
    }
    else if (($province_val==null)&&($town_val != null)&&($gender_val!=null)&&($placeType_val == null)&&($peopleType_val  == null)){
      $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Town='$town_val' AND boarding_place_table.People_Gender='$gender_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
    }
    else if (($province_val==null)&&($town_val != null)&&($gender_val==null)&&($placeType_val != null)&&($peopleType_val  == null)){
      $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Town='$town_val' AND boarding_place_table.Place_Type='$placeType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
    }
    else if (($province_val==null)&&($town_val != null)&&($gender_val==null)&&($placeType_val == null)&&($peopleType_val  != null)){
      $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Town='$town_val' AND boarding_place_table.People_Type='$peopleType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
    }
    else if (($province_val==null)&&($town_val == null)&&($gender_val!=null)&&($placeType_val != null)&&($peopleType_val  == null)){
      $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.People_Gender='$gender_val' AND boarding_place_table.Place_Type='$placeType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
    }
    else if (($province_val==null)&&($town_val == null)&&($gender_val!=null)&&($placeType_val == null)&&($peopleType_val  != null)){
      $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.People_Gender='$gender_val' AND boarding_place_table.People_Type='$peopleType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
    }
    else if (($province_val==null)&&($town_val == null)&&($gender_val==null)&&($placeType_val != null)&&($peopleType_val  != null)){
      $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Place_Type='$placeType_val' AND boarding_place_table.People_Type='$peopleType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
    }

  //2 missing 3 have
  else if (($province_val==null)&&($town_val == null)&&($gender_val!=null)&&($placeType_val != null)&&($peopleType_val  != null)){
    $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.People_Gender='$gender_val' AND boarding_place_table.Place_Type='$placeType_val' AND boarding_place_table.People_Type='$peopleType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
  }
  else if (($province_val==null)&&($town_val != null)&&($gender_val==null)&&($placeType_val != null)&&($peopleType_val  != null)){
    $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Town='$town_val' AND boarding_place_table.Place_Type='$placeType_val' AND boarding_place_table.People_Type='$peopleType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
  }
  else if (($province_val==null)&&($town_val != null)&&($gender_val!=null)&&($placeType_val == null)&&($peopleType_val  != null)){
    $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Town='$town_val' AND boarding_place_table.People_Gender='$gender_val' AND boarding_place_table.People_Type='$peopleType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
  }
  else if (($province_val==null)&&($town_val != null)&&($gender_val!=null)&&($placeType_val != null)&&($peopleType_val  == null)){
    $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Town='$town_val' AND boarding_place_table.People_Gender='$gender_val' AND boarding_place_table.Place_Type='$placeType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
  }
  else if (($province_val!=null)&&($town_val == null)&&($gender_val==null)&&($placeType_val != null)&&($peopleType_val  != null)){
    $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Province= '$province_val' AND boarding_place_table.Place_Type='$placeType_val' AND boarding_place_table.People_Type='$peopleType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
  }
  else if (($province_val!=null)&&($town_val == null)&&($gender_val!=null)&&($placeType_val == null)&&($peopleType_val  != null)){
    $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Province= '$province_val' AND boarding_place_table.People_Gender='$gender_val' AND boarding_place_table.People_Type='$peopleType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
  }
  else if (($province_val!=null)&&($town_val == null)&&($gender_val!=null)&&($placeType_val != null)&&($peopleType_val  == null)){
    $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Province= '$province_val' AND boarding_place_table.People_Gender='$gender_val' AND boarding_place_table.Place_Type='$placeType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
  }
  else if (($province_val!=null)&&($town_val != null)&&($gender_val==null)&&($placeType_val == null)&&($peopleType_val  != null)){
    $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Province= '$province_val' AND boarding_place_table.Town='$town_val' AND boarding_place_table.People_Type='$peopleType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
  }
  else if (($province_val!=null)&&($town_val != null)&&($gender_val==null)&&($placeType_val != null)&&($peopleType_val  == null)){
    $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Province= '$province_val' AND boarding_place_table.Town='$town_val' AND boarding_place_table.Place_Type='$placeType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
  }
  else if (($province_val!=null)&&($town_val != null)&&($gender_val!=null)&&($placeType_val == null)&&($peopleType_val  == null)){
    $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Province= '$province_val' AND boarding_place_table.Town='$town_val' AND boarding_place_table.People_Gender='$gender_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
  }

  //1 missing 4 have
  else if (($province_val==null)&&($town_val != null)&&($gender_val!=null)&&($placeType_val != null)&&($peopleType_val  != null)){
    $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Town='$town_val' AND boarding_place_table.People_Gender='$gender_val' AND boarding_place_table.Place_Type='$placeType_val' AND boarding_place_table.People_Type='$peopleType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
  }
//error----------------------------------------------------------------------------------
  else if (($province_val!=null)&&($town_val == null)&&($gender_val!=null)&&($placeType_val != null)&&($peopleType_val  != null)){
    $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Province= '$province_val' AND boarding_place_table.People_Gender='$gender_val' AND boarding_place_table.Place_Type='$placeType_val' AND boarding_place_table.People_Type='$peopleType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
  }

 //error----------------------------------------------------------------------------------



  else if (($province_val!=null)&&($town_val != null)&&($gender_val==null)&&($placeType_val != null)&&($peopleType_val  != null)){
    $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Province= '$province_val' AND boarding_place_table.Town='$town_val' AND boarding_place_table.Place_Type='$placeType_val' AND boarding_place_table.People_Type='$peopleType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
  }
  else if (($province_val!=null)&&($town_val != null)&&($gender_val!=null)&&($placeType_val == null)&&($peopleType_val  != null)){
    $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Province= '$province_val' AND boarding_place_table.Town='$town_val' AND boarding_place_table.People_Gender='$gender_val' AND boarding_place_table.People_Type='$peopleType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
  }
  else if (($province_val!=null)&&($town_val != null)&&($gender_val!=null)&&($placeType_val != null)&&($peopleType_val  == null)){
    $findQuery1 = "SELECT boarding_place_table.address1,boarding_place_table.address2,boarding_place_table.address3,owner_table.First_Name,owner_table.Last_Name,owner_table.Telephone_No FROM owner_table,boarding_place_table WHERE boarding_place_table.Province= '$province_val' AND boarding_place_table.Town='$town_val' AND boarding_place_table.People_Gender='$gender_val' AND boarding_place_table.Place_Type='$placeType_val' AND boarding_place_table.Owner_Reg_No=owner_table.Reg_No ";
  }





   

     
     
    

   





    $findResult1=mysqli_query($link,$findQuery1); 
    
    if (mysqli_num_rows($findResult1) == 0) {
      echo 'No places Found. Try again with less criterias';
    } 
    else{


    echo 'your requirements  : ';
    echo $province_val;
    echo ' ';
    echo  $town_val;
    echo ' ';
    echo  $gender_val;
    echo ' ';
    echo $placeType_val;
    echo ' ';
    echo $peopleType_val;


    
      echo '<div class="row justify-content-around">
  <div class="card" style="width: 100rem;">
    <div class="card-body">
	  	<div class="text-center">
	  		<table class="table">
           <thead class="thead-dark">
              <tr>
                <th scope="col">Address Line 1</th>
                <th scope="col">Address Line 2</th>
                <th scope="col">Address Line 3</th>
                <th scope="col">Owner Name</th>
                <th scope="col">Telephone No</th>
              </tr>
            </thead>';

            
              while($rows=mysqli_fetch_assoc($findResult1)){
           
            
                echo'<tbody>
              <tr>
               
                <td>';
                echo $rows['address1'];
                $product['address1'] = $rows['address1'];
                echo '</td>';

                echo '<td>';
                echo $rows['address2'];
                $product['address2'] =  $rows['address2'];
                echo '</td>';

                echo '<td>';
                echo $rows['address3'];
                $product['address3'] =  $rows['address3'];
                echo '</td>';

                echo '<td>';
                echo $rows['First_Name'];
                $product['firstname'] =  $rows['First_Name']; 
                echo ' ';
                echo $rows['Last_Name'];
                $product['lastname'] =  $rows['Last_Name']; 
                echo '</td>';

                echo '<td>';
                echo $rows['Telephone_No'];
                $product['teleno'] =  $rows['Telephone_No']; 
                echo '</td>';

                $response= json_encode($product);
           
            
                foreach ($product as $i => $value) {
                  unset($product[$i]);
                }

                echo '
                
              </tr>
            </tbody>';

            //echo $response;echo '<br>';  
              }
           
                 
        echo'</table>
        
            
        <br>
			</div>
		</div>
	</div>	

		
</div>';


    }






?>
