<!DOCTYPE html>
<?php
    include_once('include/config.php');
	require_once 'logincheck.php';
	//get hos code
			$id="1";
	$qq = $conn->query("SELECT * FROM `system_master` where id='$id'") or die(mysqli_error());
	$ff = $qq->fetch_array();
	$lno=intval($ff['last_number'])+1;
	$ln=str_pad($lno, intval($ff['length']), "0", STR_PAD_LEFT);


		

		function mysql_fetch_all($query) 
		{
		    $all = array();
		    while ($all[] = mysql_fetch_assoc($query)) {$temp=$all;}
		    return $temp;
		}
?>
<html lang = "eng">
	<head>
		<title>Physio Ap-MS</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />
	</head>
<body>
	<?php include "include/header.php"; ?>
	<?php include "include/sidebar.php"; ?>
	<div id = "content">
		<br />
		<br />
		<br />
		<div id = "add" class = "panel panel-success">	
			<div class = "panel-heading">
				<label>ADD ADMINISTRATOR</label>
				<button id = "hide" class = "btn btn-sm btn-danger" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-remove"></span> CLOSE</button>
			</div>
			<div class = "panel-body">
				<form id = "form_user" method = "POST" enctype = "multi-part/form-data">
					<div class = "panel panel-default" style = "width:60%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
						
						 <div class="form-group">
		                <label for="exampleInputEmail1">First Name</label>
		                 <input type="text" name = "id"  value = "<?php echo $id ?>" hidden="hidden">
		                <input type="text" name = "ln"  value = "<?php echo $ln ?>" hidden="hidden">
		                <input type="text" name="fname" class="form-control" placeholder="Enter First Name" required="required" pattern="[A-Za-z]{1,20}" title="Enter characters only">
		               </div>
		                <div class="form-group">
		                <label for="exampleInputEmail1">Middle Name</label>
		                <input type="text" name="mname" class="form-control" placeholder="Optional"  pattern="[A-Za-z]{1,20}" title="Enter characters only">
		               </div>
		               <div class="form-group">
		                <label for="exampleInputEmail1">Last Name</label>
		                <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" required="required" pattern="[A-Za-z]{1,20}" title="Enter characters only">
		               </div>
		               <div class="form-group">
		               <label for="exampleInputEmail1">Email</label>
		               <input type="email" name="username" class="form-control" placeholder="Enter Email">
		              </div>
		              <div class="form-group">
		              <label for="exampleInputPassword1">Phone No:</label>
		              <input type="text" name="phone"  class="form-control"  placeholder="Enter Name" required="required" pattern="[0-9]{9,12}" title="Enter numeric characters only">
		              </div>
                   <div class="form-group">
		              <label for="exampleInputPassword1">ID Number:</label>
		              <input type="text" name="idno" class="form-control"  placeholder="Enter ID" required="required" pattern="[0-9]{7,8}" title="Enter numeric characters only">
		              </div>
				<div class="form-group">
              <label for = "gender">Gender:</label>
                <select class="form-control"   name = "gender" required = "required">
                    <option class="form-control" value = "">--select--</option>
                    <option class="form-control"  value = "Male">Male</option>
                    <option class="form-control" value = "Female">Female</option>
                </select>
              </div>        
              <div class="form-group">
              <label for="exampleInputPassword1">Date of Birth:</label>
              <input type="date" class="form-control" name="dob"  required="required" max="2002-01-01">
              </div>              
              <div class="form-group">
              <label for="exampleInputFile">Password</label>
              <input type="Password" class="form-control"  name="password"  required="required" placeholder="">
              </div>
              <div class="form-group">
              <label for="exampleInputFile">Confirm Password</label>
              <input type="Password" name="cpassword" class="form-control"  required="required" placeholder="">
              </div>						
				<button type="submit" class = "btn btn-primary" name = "save_admin" ><span class = "glyphicon glyphicon-save"></span> SAVE</button>
				<br />
			</div>	
			<?php require 'add_user.php'?>
			</div>
		</form>			
			</div>	
		</div>	
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<label>ADMINISTRATORS</Label>
			</div>
			<div class = "panel-body">
				<button id = "show" class = "btn btn-info"><span class  = "glyphicon glyphicon-plus"></span> ADD</button>
				<a href = "home.php" class = "btn btn-sm btn-warning"><span class = "glyphicon glyphicon-pencil"></span> BACK</a>
				<br />
				<br />
				<table id = "table" class = "display" width = "100%" cellspacing = "0">
					<thead>
						<tr>
							 <th>Id</th>
							  <th>Name</th>
							  <th>Email</th>
							  <th>Phone</th>
							  <th>ID NO.</th>
							  <th><center>Option</th>
						</tr>
					</thead>
					<tbody>
					<?php
					    $adm="adm";
						$query = $conn->query("SELECT id,concat(firstname,' ',middlename,' ',lastname) as name,username,phone,idno FROM admin order by id") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>
						<tr>
							<td><?php echo $fetch['id'];?></td>
							<td><?php echo $fetch['name'];?></td>
							<td><?php echo $fetch['username'];?></td>
							<td><?php echo $fetch['phone'];?></td>
							<td><?php echo $fetch['idno'];?></td>
							<td><a href="editadmin.php?id=<?php echo $fetch['id']; ?>"><span class="btn btn-success bg-green"><i class="fa fa-edit"></i> Edit </span></a>
							 <a href="deletes.php?id=<?php echo $fetch['id']; ?> &del=<?php echo $adm ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>


						</tr>
					<?php
						}
						$conn->close();
					?>
					</tbody>
					</table>
			</div>
		</div>
	</div>
	<?php include "include/footer.php"; ?>	
	<script type = "text/javascript">
		function delete_user(that){
			var delete_func = confirm("Are you sure you want to delete this record?")
			if(delete_func){
				window.location = anchor.attr("href");
			}
		}
	</script>
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