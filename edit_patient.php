<?php
		session_start();
    	if ($_SESSION['username'] == "")
		header('Location: admin_login.php');
				
		include 'include/config.php';
		if ($_SESSION['username'] == "admin")
		include("include/header_admin.php");
        
        
?>
<?php
if(isset($_POST['update']) && $_POST['update'] == "Submit"){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $weight = $_POST['weight'];
    $phone_number = $_POST['phone_no'];
    $visited_date = $_POST['visited_date'];
    $gender = $_POST['gender'];
    $query = "UPDATE patient SET name='".$name."', address='".$address."', age='".$age."', weight='".$weight."',
             phone_number='".$phone_number."', gender='".$gender."' WHERE id=".$id;
    $result = mysqli_query($con,$query);

    header("Location: patient_index.php");
     }

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM patient WHERE id=".$id;
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_object($result);
}
?>

<div id="pagename">Add Patient</div>
<br /><br />

<form action="<?php echo 'edit_patient.php';?>" method="post">
<input type="hidden" name="id" value="<?php echo $id;?>" />
    <table class="formshade" border="0" width="50%" cellspacing="0" cellpadding="5">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo $row->name;?>" required/></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td>Address</td>
            <td><input type="text" name="address" value="<?php echo $row->address;?>" required/></td>
        </tr>
    
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Age</td>
            <td><input type="number" name="age" min="1" value="<?php echo $row->age;?>" required/></td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Weight</td>
            <td><input type="number" name="weight" min="1" value="<?php echo $row->weight;?>" required/></td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>


        <tr>
            <td>Phone No.</td>
            
            <td><input type="text" name="phone_no" value="<?php echo $row->phone_number;?>" required/></td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Visited Date</td>
          <td>  <input type="date" name="visited_date" value="<?php echo $row->visited_date;?>" ></td>
        </tr>
        
        <tr> 
            <td>
             Select Gender
            </td>
             <td>
              <input type="radio" name="gender" value="male" <?php if($row->gender =="male") echo "checked" ?> > Male<br>
              <input type="radio" name="gender" value="female" <?php if($row->gender =="female") echo "checked" ?> > Female<br>
             </td>
        </tr>

    
        <tr>
            <td colspan="2"><input type="submit" name="update" value="Submit" /></td>
        </tr>

    </table>
</form>

<?php
include 'include/footer.php'
?>