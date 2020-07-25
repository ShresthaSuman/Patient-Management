<?php
		session_start();


			if ($_SESSION['username'] == "")
				header('Location: admin_login.php');
				
		include 'include/config.php';
		if ($_SESSION['username'] == "admin")
		include("include/header_admin.php");
		
?>
<?php
    if(isset($_POST["register"]) && $_POST["register"]=="Add Patient"){
        $name= $_POST["name"];
        $address=$_POST["address"];
        $age=$_POST["age"];
        $weight= $_POST["weight"];
        $phone_number= $_POST["phone_no"];
        $visitedDate= $_POST["visited_date"];
        $gender= $_POST["gender"];

        $query = "insert into patient (name, address,gender,age, weight,phone_number,visited_date) ".
        "values('".$name."', '".$address."','".$gender."', '".$age."', '".$weight."','".$phone_number."','".$visitedDate."'); ";
        $result = mysqli_query($con,$query);
        if($result != null){
                echo "data added successfully";
        }
        $query = "set @last_id = last_insert_id(); ";
    	$result = mysqli_query($con,$query);
	
         $query = "insert into medical (patient_id) values (@last_id); ";
        $result = mysqli_query($con,$query);
        
        
        
    }

  


?>

<div id="pagename">Add Patient</div>
<br /><br />

<form action="<?php echo 'add_patient.php';?>" method="post">
    <table class="formshade" border="0" width="50%" cellspacing="0" cellpadding="5">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="" required/></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td>Address</td>
            <td><input type="text" name="address" value="" required/></td>
        </tr>
    
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Age</td>
            <td><input type="number" name="age" min="1" value="" required/></td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Weight</td>
            <td><input type="number" name="weight" value="" required/>KG</td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>


        <tr>
            <td>Phone No.</td>
            <td><input type="text" name="phone_no" value="" required/></td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Visited Date</td>
          <td>  <input type="date" name="visited_date"></td>
        </tr>
        
        <tr> 
            <td>
             Select Gender
            </td>
             <td>
              <input type="radio" name="gender" value="male" checked> Male<br>
              <input type="radio" name="gender" value="female"> Female<br>
             </td>
        </tr>

    
        <tr>
            <td colspan="2"><input type="submit" name="register" value="Add Patient" /></td>
        </tr>

    </table>
</form>

<?php
include 'include/footer.php'
?>

