<?php
		session_start();


			if ($_SESSION['username'] == "")
				header('Location: admin_login.php');
				
		include 'include/config.php';
		if ($_SESSION['username'] == "admin")
		include("include/header_admin.php");
		
?>
<?php
    if(isset($_POST["register"]) && $_POST["register"]=="Add Doctor"){
        $name= $_POST["name"];
        $address=$_POST["address"];
       $specialist= $_POST["specialist"];

        $query = "insert into doctor (doctor_name, address,specialist) ".
        "values('".$name."', '".$address."','".$specialist."'); ";
        $result = mysqli_query($con,$query);
        if($result != null){
                echo "data added successfully";
        }
    
    }

  


?>

<div id="pagename">Add Doctor</div>
<br /><br />

<form action="<?php echo 'add_doctor.php';?>" method="post">
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
            <td>Specialist</td>
            <td><input type="text" name="specialist" value="" required/></td>
        </tr>
    
        <tr>
            <td colspan="2"><input type="submit" name="register" value="Add Doctor" /></td>
        </tr>

    </table>
</form>

<?php
include 'include/footer.php'
?>

