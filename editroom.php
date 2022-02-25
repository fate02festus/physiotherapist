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
		    $sql="SELECT * FROM room WHERE id='".$_GET['id']."'";
		  $write =$conn->query($sql) or die(mysqli_error($db_connect));
		 // print_r($sql); exit;
		    $row=$write->fetch_array();
		    $id=$row['id'];
		    $name=$row['name'];
		    $hall=$row['hall'];
		    $desc=$row['description'];

		?>
			<div class = "panel-heading">
				<label>UPDATE ROOM</label>
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
        <label for="exampleInputEmail1">Room Name</label>
        <input type="text" name="name" value="<?php echo $name;?>" class="form-control" placeholder="Enter  Name" required="required" title="Enter characters only">
       </div>
       <div class="form-group">
        <label for="exampleInputEmail1">Room Hall</label>
        <select class="form-control"  value="<?php echo $hall;?>" name = "hall" required = "required">
            <option class="form-control" value = "">--select--</option>
            <option class="form-control"  value = "Hall A">Hall A</option>
            <option class="form-control" value = "Hall B">Hall B</option>
            <option class="form-control" value = "Hall C">Hall C</option>
            <option class="form-control" value = "Hall D">Hall D</option>
        </select> 
       </div>
       <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <input type="text" name="desc" value="<?php echo $desc;?>" class="form-control" placeholder="Enter Description" required="required" title="Enter characters only">
       </div>	
        
						
				<button class = "btn btn-warning" name = "edit_physio" ><span class = "glyphicon glyphicon-edit"></span> SAVE</button>
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