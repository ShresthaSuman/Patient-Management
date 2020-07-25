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
    $doctorname=$_POST['doctor_name'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $prescription = $_POST['prescription'];
    $checkup_date = $_POST['checkup_date'];
    $status = $_POST['status'];
    $query = "UPDATE  medical SET doctor_name='".$doctorname."' , title='".$title."',description='".$description."',
     medical_prescription='".$prescription."', checkup_date='".$checkup_date."',status='".$status."'
              WHERE id=".$id;
    $result = mysqli_query($con,$query);

    header("Location: medical_index.php");
     }



 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT *from medical WHERE id=".$id;
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_object($result);
    

}

        $query="SELECT name from patient where id=" .$row->patient_id;
        $result = mysqli_query($con,$query);
        $name = mysqli_fetch_object($result);



?>


<div id="pagename"><?php echo $name->name ?> Medical report</div>

<br /><br />
<form action="<?php echo 'edit_medical.php';?>" method="post">
    <input type="hidden" name="id" value="<?php echo $id;?>" />
   

    <table class="formshade" border="0" width="50%" cellspacing="0" cellpadding="5">
            <tr>
            <td>Doctor Name</td>
            <td><select name="doctor_name" id="doctor_id" required>
                            <option value="" >Select...</option>
                            <?php

                                $result = mysqli_query($con,"select id, doctor_name from doctor order by doctor_name");

                                while($rows = mysqli_fetch_array($result)) {
                            ?>
                                <option value="<?php echo $rows["doctor_name"];?>" <?php if($rows['doctor_name'] == $row->doctor_name) echo "selected"?> >
									<?php echo $rows['doctor_name']?>
                                </option>
                            <?php
                                }
                            ?>
               </select></td>
             </tr>
             <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Title</td>
            <td><input type="text" name="title"  value="<?php echo $row->title;?>" required/></td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Description</td>
            <td><textarea  name="description"  rows="10" columns="500"  required><?php echo $row->description;?></textarea></td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Prescription</td>
            <td><textarea  name="prescription" rows="10" columns="500"  required><?php echo $row->medical_prescription;?></textarea></td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Checkup date</td>
            <td><input type="date" name="checkup_date" value="<?php echo $row->checkup_date;?>" required/></td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
           
        <tr> 
            <td>
             Status
            </td>
             <td>
              <input type="radio" name="status" value="checkout" <?php if($row->status=="checkout") echo "checked" ?> checked > Checkout<br>
              <input type="radio" name="status" value="checkin" <?php if($row->status =="checkin") echo "checked" ?> > Checkin<br>
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

  