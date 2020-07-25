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

</style>

<?php
		session_start();


			if ($_SESSION['username'] == "")
				header('Location: admin_login.php');
				
		include 'include/config.php';
		if ($_SESSION['username'] == "admin")
		include("include/header_admin.php");
		
?>
<?php
	if(isset($_GET["id"])){
		$patient_id=$_GET["id"];
		$query = "SELECT *FROM medical
				INNER JOIN patient ON patient.id = medical.patient_id 
				WHERE medical.patient_id=".$patient_id;
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
}



?>

<div class="design">

	

	<div class="content">
	<center><H1> Medical Report of <?php echo $row["name"]; ?>	</H1></center>
		<table>
            <tr>
                    <td colspan="4" style="text-align:center; font-size:20px">Personal Information</td>
            </tr>
			<tr>
				<td style='width:50px'>Name:</td>
				<td><?php echo $row["name"];?></td>
				<td>Address:</td>
				<td><?php echo $row["address"];?></td>
			</tr>
			<tr> 
				<td>Age</td>
				<td><?php echo $row["age"];?> year</td>
				<td>Weight:</td>
				<td><?php echo $row["weight"];?> Kg </td>
			</tr>

			<tr>
				<td>Gender:</td>
				<td><?php echo $row["gender"];?></td>
                <td>Phone Number:</td>
				<td><?php echo $row["phone_number"];?></td>
				
			</tr>
			<tr>
				<td colspan="4" style="text-align:center; font-size:20px">Medical  Information</td>
			</tr>
			
			<tr>
				<td style='width:50px'>Check Up Date</td>
				<td><?php echo $row["visited_date"];?></td>
            </tr>
            <tr>
				<td style='width:50px'>Reported On</td>
				<td><?php echo $row["checkup_date"];?></td>
            </tr>

            <tr>
				<td>Supervised By:</td>
				<td>DR. <?php echo $row["doctor_name"];?></td>
			</tr>
			<tr>
				<td style='width:50px'>Test On:</td>
				<td><?php echo $row["title"];?></td>
            </tr>
            <tr>
				<td>Description</td>
				<td><textarea cols="30" rows="5" readonly/><?php echo $row["description"];?></textarea></td>
			</tr>
            <tr>
				<td>Medical Prescription</td>
				<td><textarea cols="30" rows="5" readonly/><?php echo $row["medical_prescription"];?></textarea></td>
			</tr>
			<tr>
				<td style='width:50px'>Status:</td>
				<td><?php echo $row["status"];?></td>
				
			</tr>
		
		



		</table>


	</div>

</div>


<?php include("include/footer.php");?>
