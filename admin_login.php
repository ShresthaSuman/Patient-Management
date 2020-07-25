
<?php
session_start();
$_SESSION['username']="";
include("include/config.php");

// User login


?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<title>sign in</title>
<style type="text/css">
            body{
              margin:0px;
              width:99.9%;
              font-family: Arial, Helvetica, sans-serif;
              font-size:12px;

            }

            #header{
              background-color:#7D9EB0;
			  box-shadow: 0  7px 24px #808080;
	          margin:0px;
              width:100%;
              height:30px;
              }
             #siteName{
              width:100%;
              height:30px;
              margin:0px;
			  float:left;
			  text-align:center;
	        font-size:23px;
	        font-family: "Times New Roman","Trebuchet MS";
            color:white;
            }
             #main{
              width:100%;
              margin:0px;
			  float:left;
              min-height:600px;
			  text-align:center;
			  
	    	}
            #footer{
				display:inline;
				float:left;
              font-size:15px;
              line-height: 0px;
              padding-bottom:0px;
              margin:0px;
              width:100%;
			  text-align:center;
			  background-color:#7D9EB0;
              box-shadow: 0 -4px 30px -2px #808080;
			}

</style>
</head>

<body>
<div class="container">
<div id="header">
	<div id="siteName">Patient Management System</div>
</div>
    <div id="main">
    <h1 align="center">Admin Login</h1><br>

         <table align="center">
            <tr>
                <td>
        <form id="form1" method="post" action="admin_login.php" name="form1"><br>
            Username:
    		<input type="text" value="" name="username" id="username" required><br><br>
            Password :
	    	<input type="password" name="password" id="password" value="" required><br><br>

    									   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        	<input type="submit" value="Login" name="Login">

        </form>
        	                 </td>
            </tr>
        </table>

<?php
        if(isset($_POST["Login"]) && $_POST["Login"] == "Login"){

    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "SELECT * FROM admin WHERE username='".$username."' AND password='".$password."'";

    $result = mysqli_query($con,$query);

	if(mysqli_num_rows($result)>0){
	  $_SESSION['username']=$username;
    header("location: patient_index.php");

    }
	else{
		echo "<p>Invalid username or password</p>";
	
	}

		}
?>

    </div>

    <div id="footer">
	    <p>copyright &copy; 2013. All rights reserved.</p>
    </div>
</div>
</div>

</body>
</html>