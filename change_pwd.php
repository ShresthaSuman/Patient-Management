
<?php

session_start();

	if ($_SESSION['username'] == "")
		header('Location: admin_login.php');

include 'include/config.php';
?>

<?php

//Updating user
if(isset($_POST['update']) && $_POST['update'] == "Submit"){

       	$admin_id = $_POST['id'];
        $username = $_POST['username'];
       
        $password = $_POST['password'];

        $query = "UPDATE admin SET  password='".$password."' WHERE id=".$admin_id;
        $result = mysqli_query($con,$query);

        header("Location: admin_login.php");
        }
    
// Retrieving user data
if(isset($_GET['id'])){
    $admin_id = $_GET['id'];
}



if ($_SESSION['username'] == "admin")
include("include/header_admin.php");


$query = "SELECT * FROM admin WHERE id=".$admin_id;
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
?>

<div id="pagename">Change Password and Email</div>

<br /><br />
<form action="change_pwd.php" method="post">
    <input type="hidden" name="id" value="<?php echo $admin_id;?>" />

    <table class="formshade" border="0" width="50%" cellspacing="0" cellpadding="5">
        <tr>
            <td>Username</td>
            <td><?php echo $row['username'];?></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

       

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td>Password</td>
            <td><input type="password" name="password" id="show_pwd" value="<?php echo $row['password'];?>" required/></td>
            
        </tr>
        <tr>
        <td>
        <input type="checkbox" onclick="myFunction()">Show Password
        </td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td colspan="2"><input type="submit" name="update" value="Submit" /></td>
        </tr>

    </table>
</form>
 <?php
include 'include/footer.php'
?>
<script>
function myFunction() {
  var x = document.getElementById("show_pwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>