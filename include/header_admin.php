<html>
    <head>
        <title>
        </title>
        <style type="text/css">
            body{
              margin:0px;
              width:99.9%;
              font-family: Arial, Helvetica, sans-serif;
              font-size:12px;

            }
            a{
              text-decoration: none;
            }

            #header{
              background-color:#7D9EB0;
			  box-shadow: 0  7px 24px #808080;
	          margin:0px;
              width:100%;
              height:30px;
			  /*border:1px solid #000;*/

            }

            #welcome{
              line-height:30px;
              text-indent:15px;
              margin:0px;
              width:22%;
              height: 30px;
              float:left;
			  }
            #welcome a{
              text-decoration: none;
              color:white;
              font-size:15px
              }
            #siteName{
              width:72%;
              height:30px;
              margin:0px;
			  float:left;
			  text-indent:250px;
	        font-size:23px;
	        font-family: "Times New Roman","Trebuchet MS";
            color:white;


            }
			#logout{
			  float:left;
			}
			#logout img{
				padding-left:20px;
				padding-top:5px;
				padding-top:5px;
			  width:20px;
			  height:20px;
			}

            #main{
              width:100%;
              margin:0px;
			  float:left;
			  /*border:1px solid #000;*/


            }
            #sidebar{
				background-color:#808080;
				box-shadow: 8px 0 26px -3px #808080;
				display:inline;
              width:22%;
              margin:0px;
			  float:left;
			  min-height:600px;
			  /* border-right:1px solid #000;*/

            }
			#sidebar a{
			display:block;
			padding:0px;
			border-bottom:1px dotted #FDFDF0;
			text-decoration:none;
			color:#FDFDF0;
			}
			#sidebar a:hover{
			color:#CDAA7D;
			}

			ul li{
			  padding: 5px;
              font-size:14px;
			  
			}
			.sidebar_header{list-style:none;
						font-size:18px;
						color:white;
			}
            #content{
              margin:0%;
              width:77%;
			  float:left;
			  min-height:600px;
			  display:inline;
			}
			#pagename{font-size:20px;
            width:70%;
			float:left;
			}
            
			#content-body{
				padding:5px;
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
			}
			/*  tables  */


			table{
			 border-color: white;
			  }
			
			.tbheader{
			  background-color: #CDC8B1;
			}
			.tr1{
			  background-color: #ECF1EF;
			}
			
			
			




        </style>
    </head>
    <body>
	<div class="container">
    <div id="header">
        <div id="welcome"><a href="first.php">Welcome:<?php echo $_SESSION['username']?></a></div>
        <div id="siteName">Patient Management System</div>
        <div id="logout"><a href="admin_login.php"><img src="include/logout.png" alt="logout"></a>
        </div>

    </div>
    <div id="main">
        <div id="sidebar">
        	<ul>
                <li class="sidebar_header"> 
                <ul>
                
                <?php
				$query = "select * from admin where username='".$_SESSION['username']."'";

					$result = mysqli_query($con,$query);
					while($row = mysqli_fetch_array($result))
					{
				?>
				    <li><a href="<?php echo  'change_pwd.php?id='.$row["id"];?>">Change Password</a></li>
					
      
				<?php }?>
                </ul>
                </li>
                <li class="sidebar_header">Section :
                    <ul>
                    	<li><a href="patient_index.php">Patient Personal Record</a>	</li>

                    	<li><a href="medical_index.php">Patient Medical Record </a></li>
						
                    	<li><a href="doctor_index.php">Doctor Record</a></li>
                	</ul>
                </li>
            </ul>
        </div>

        <div id="content">
        	<div id="content-body">
