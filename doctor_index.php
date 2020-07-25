<?php
		session_start();


			if ($_SESSION['username'] == "")
				header('Location: admin_login.php');
				
		include 'include/config.php';
		if ($_SESSION['username'] == "admin")
		include("include/header_admin.php");
		
?>
<?php
$query = "select * from doctor";
if(isset($_GET["search"])) {
	$s=$_GET["search"];
  $query.= " where doctor_name like '%".$s."%' OR  address like '%".$s."%'";	
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_array($result);
}
?>

<?php
// Deleting Player
if(isset($_GET['action']) && $_GET['action'] == "delete"){
    $id = $_GET['id'];

	
    $result=mysqli_query($con,"DELETE FROM doctor WHERE id=".$id);

	
    header("Location: patient_index.php");
	}

?>
<div id="pagename">Doctor List</div>
<a href="<?php echo  'add_doctor.php';?>"><h3>Add Doctor</h3></a>
<div id="search">
<form action="doctor_index.php">
<input name="search" type="text" placeholder="Field Data"/>
<input type="submit" value="Search" />
</form>
</div>

<div id="table">
<table border="1" width="100%" cellspacing="0" cellpadding="0">
    <tr class="tbheader" >
        <th>Name</th>
        <th>Address</th>
        <th>Specialist</th>
        <th>Action</th>
    </tr>
<?php
	   $result = mysqli_query($con,$query);

		while($row = mysqli_fetch_array($result))
		{
    ?>
<tr class="tr1">
        <td align="center"><?php echo $row["doctor_name"];?></td>
        <td align="center"><?php echo $row["address"];?></td>
        <td align="center"><?php echo $row["specialist"];?></td>
       

        <td align="center">
            
            <a href="<?php echo  'edit_doctor.php?id='.$row["id"];?>">Edit</a> |
            <a onClick="javascript: return confirm('Please confirm deletion');" href="<?php echo 'doctor_index.php?action=delete&id='.$row["id"];?>">Delete</a>
        </td>
    </tr>
<?php }?>

</table>

<br />

</div>



<?php
include 'include/footer.php';
?>
<style>
    
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
    border-bottom: 1px solid #ddd;
  text-align:centre;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

tr:hover {background-color:rgb(151, 141, 163);




</style>