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
    $specialist=$_POST['specialist'];
    $query = "UPDATE doctor SET doctor_name='".$name."', address='".$address."',specialist='".$specialist."' WHERE id=".$id;
    $result = mysqli_query($con,$query);

    header("Location: doctor_index.php");
     }

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM doctor WHERE id=".$id;
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_object($result);
}
?>

<div id="pagename">Add Patient</div>
<br /><br />

<form action="<?php echo 'edit_doctor.php';?>" method="post">
<input type="hidden" name="id" value="<?php echo $id;?>" />
    <table class="formshade" border="0" width="50%" cellspacing="0" cellpadding="5">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo $row->doctor_name;?>" required/></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td>Address</td>
            <td><input type="text" name="address" value="<?php echo $row->address;?>" required/></td>
        </tr>
    
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Specialist</td>
            <td><input type="text" name="specialist" value="<?php echo $row->specialist;?>" required/></td>
        </tr>
    
        <tr>
            <td colspan="2"><input type="submit" name="update" value="Submit" /></td>
        </tr>

    </table>
</form>

<?php
include 'include/footer.php'
?>