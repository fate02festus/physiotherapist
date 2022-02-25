<!DOCTYPE html>
<?php
    include_once('include/config.php');
	require_once 'logincheck.php';
	//get hos code
	$phy="";
	if(isset($_GET['id']))
		$phy=$_GET['id'];


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
				<label>ADD A ROOM</label>
				<button id = "hide" class = "btn btn-sm btn-danger" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-remove"></span> CLOSE</button>
			</div>
			<div class = "panel-body">
				<form id = "form_user" method = "POST" enctype = "multi-part/form-data">
					<div class = "panel panel-default" style = "width:60%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
						
					   <div class="form-group">
		                <label for="exampleInputEmail1">Room Name</label>
		                <input type="text" name="name" class="form-control" placeholder="Enter  Name" required="required" title="Enter characters only">
		               </div>
		               <div class="form-group">
		                <label for="exampleInputEmail1">Room Hall</label>
		                <select class="form-control"   name = "hall" required = "required">
		                    <option class="form-control" value = "">--select--</option>
		                    <option class="form-control"  value = "Hall A">Hall A</option>
		                    <option class="form-control" value = "Hall B">Hall B</option>
		                    <option class="form-control" value = "Hall C">Hall C</option>
		                    <option class="form-control" value = "Hall D">Hall D</option>
		                </select> 
		               </div>
		               <div class="form-group">
		                <label for="exampleInputEmail1">Description</label>
		                <input type="text" name="desc" class="form-control" placeholder="Enter Description" required="required" title="Enter characters only">
		               </div>		              
									
				<button type="submit" class = "btn btn-primary" name = "save_room" ><span class = "glyphicon glyphicon-save"></span> SAVE</button>
				<br />
			</div>	
			<?php require 'add_user.php'?>
			</div>
		</form>			
			</div>	
		</div>	
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<label>PHYSIOTHERAPIST ROOMS</Label>
			</div>
			<div class = "panel-body">
				
				<br />
				<br />
				<table id = "table" class = "display" width = "100%" cellspacing = "0">
					<thead>
						<tr>
							 <th>Id</th>
							  <th>Name</th>
							  <th>Hall</th>
							  <th>Physiotherapist</th>
							  <th><center>Option</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query = $conn->query("SELECT room.id,name,hall,concat(firstname,' ',middlename,' ',lastname) as physio FROM room left join physiotherapist on physiotherapist.id=room.physio order by room.id") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>
						<tr>
							<td><?php echo $fetch['id'];?></td>
							<td><?php echo $fetch['name'];?></td>
							<td><?php echo $fetch['hall'];?></td>
							<td><?php echo $fetch['physio'];?></td>
							<td><center>
                             <?php 
                                 if(isset($phy) && $fetch['physio']=="")
                                 {
                             ?>
	                          <a href="alloc.php?rm=<?php echo $fetch['id']; ?>&phy=<?php echo $phy; ?>&al=<?php echo 1; ?>"><span class="btn btn-primary bg-green"><i class="fa fa-edit"></i> Select Room </span></a>
                           <?php }  
                           if($fetch['physio']!="")
							{
                           ?>
                           <a href="alloc.php?rm=<?php echo $fetch['id']; ?>&phy=<?php echo $phy; ?>&al=<?php echo 0; ?>"><span class="btn btn-warning bg-green"><i class="fa fa-edit"></i> Deprive Room </span></a>
                           <?php } ?>
								</center></td>


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