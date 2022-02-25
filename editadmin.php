<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
?>
<html lang = "eng">
	<head>
	<title>Physio Ap-MS</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
	</head>
<body>
	<?php include "include/header.php"; ?>
	<?php include "include/sidebar.php"; ?>
	<div id = "content">
		<br />
		<br />
		<br />
		<div class = "panel panel-success">	
		<?php
		 include "include/config.php"; 
		    $sql="SELECT * FROM admin WHERE id='".$_GET['id']."'";
		  $write =$conn->query($sql) or die(mysqli_error($db_connect));
		 // print_r($sql); exit;
		    $row=$write->fetch_array();
		    $id=$row['id'];
		    $fname=$row['firstname'];
		    $lname=$row['lastname'];
		    $mname=$row['middlename'];
		    $username =$row['username'];
		    $phone =$row['phone'];
		    $idno =$row['idno'];
		    $bank =$row['dob'];
		    $bbranch =$row['gender'];

		?>
			<div class = "panel-heading">
				<label>UPDATE ADMIN</label>
				<a href = "admin.php" class = "btn btn-sm btn-info" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<div class = "panel-body">
				<form id = "form_user" method = "POST" enctype = "multi-part/form-data">
					<div class = "panel panel-default" style = "width:60%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
		<input type ="hidden" name="id" value="<?php echo  $id;?>">
		<div class="form-group">
            <span style="color:red;">*</span><b>First Name</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="text" name="fname" value="<?php echo  $fname;?>" class="form-control" pattern="[A-Za-z]{1,20}" title="Enter characters only">
        </div>
         <div class="form-group">
            <span style="color:red;">*</span><b>Middle Name</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="text" name="mname" value="<?php echo  $mname;?>" class="form-control" pattern="[A-Za-z]{1,20}" title="Enter characters only">
        </div>
        <div class="form-group">&nbsp;&nbsp;&nbsp;
            <span style="color:red;">*</span><b>Last Name</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="text" name="lname" value="<?php echo  $lname;?>" class="form-control" pattern="[A-Za-z]{1,20}" title="Enter characters only">
        </div>
         <div class="form-group">&nbsp;&nbsp;&nbsp;
           <span style="color:red;">*</span><b>Email Address</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="email" name="username" value="<?php echo  $username;?>"  class="form-control">
        </div>
        <div class="form-group">&nbsp;&nbsp;&nbsp;
            <span style="color:red;">*</span><b>Phone Number</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="text" name="phone" value="<?php echo  $phone;?>" required="" class="form-control" pattern="[0-9]{9,12}" title="Enter numerics characters only">
        </div>
        <div class="form-group">&nbsp;&nbsp;&nbsp;
            <span style="color:red;">*</span><b>Id Number</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="text" name="idno" value="<?php echo  $idno;?>" required="" class="form-control" pattern="[0-9]{7,8}" title="Enter numerics characters only">
        </div>
       
       <div class="form-group">&nbsp;&nbsp;&nbsp;
            <span style="color:red;">*</span><b>Gender</b><br>&nbsp;&nbsp;&nbsp;
            <select style = "width:30%;" class="form-control"  name = "gender" required = "required">
                      <option class="form-control" value = "">--select--</option>
                      <option class="form-control" value = "Male">Male</option>
                      <option class="form-control" value = "Female">Female</option>
            </select>
        </div>
        <div class="form-group">&nbsp;&nbsp;&nbsp;
            <span style="color:red;">*</span><b>Date of Birth</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="date" name="date" max="2001-01-01" value="<?php echo  $dob;?>" required="" class="form-control" >
        </div>
        
						
				<button class = "btn btn-warning" name = "edit_admin" ><span class = "glyphicon glyphicon-edit"></span> SAVE</button>
				<br />
					</div>	
					<?php require 'edit_query.php'?>
					</div>
				</form>			
			</div>	
		</div>	
	</div>
	<?php include_once('include/footer.php');?>
<?php include("script.php"); ?>
<script type = "text/javascript">
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>	
</body>
</html>