<?php
		session_start();


			if ($_SESSION['username'] == "")
				header('Location: admin_login.php');
				
		include 'include/config.php';
		if ($_SESSION['username'] == "admin")
		include("include/header_admin.php");
		
?>
<?php
$query = "select * from patient";
if(isset($_GET["search"])) {
	$s=$_GET["search"];
	$query.= " where id like '%".$s."' OR name like '%".$s."' OR  address like '%".$s."%'";	
}
?>

<?php
// Deleting Player
if(isset($_GET['action']) && $_GET['action'] == "delete"){
    $id = $_GET['id'];

	
    $result=mysqli_query($con,"DELETE FROM patient WHERE id=".$id);

	
    header("Location: patient_index.php");
	}

?>
<div id="pagename">Patients Detail</div>
<a href="<?php echo  'add_patient.php';?>"><h3>New Patient</h3></a>
<div id="search">
<form action="patient_index.php">
<input name="search" type="text" placeholder="Field Data"/>
<input type="submit" value="Search" />
</form>
</div>

<div id="table">
<table border="1" width="100%" cellspacing="0" cellpadding="0">
    <tr class="tbheader" >
        <th>Name</th>
        <th>Address</th>
        <th>gender</th>
        <th>Age(Yr)</th>
        <th>Weight</th>
        <th>Phone Number</th>
        <th>Visited date</th>
        <th>Action</th>
    </tr>
<?php
	   $result = mysqli_query($con,$query);

		while($row = mysqli_fetch_array($result))
		{
    ?>
<tr class="tr1">
        <td align="center"><?php echo $row["name"];?></td>
        <td align="center"><?php echo $row["address"];?></td>
        <td align="center"><?php echo $row["gender"];?></td>
        <td align="center"><?php echo $row["age"];?></td>
        <td align="center"><?php echo $row["weight"];?> Kg</td>
        <td align="center"><?php echo $row["phone_number"];?></td>
        <td align="center"><?php echo $row["visited_date"];?></td>

        <td align="center">
            <a href="<?php echo  'detail_patient.php?id='.$row["id"];?>">View Report</a>|
            <a href="<?php echo  'edit_patient.php?id='.$row["id"];?>">Edit</a> |
            <a onClick="javascript: return confirm('Please confirm deletion');" href="<?php echo 'patient_index.php?action=delete&id='.$row["id"];?>">Delete</a>
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