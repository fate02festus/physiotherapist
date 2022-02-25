<!DOCTYPE html>
<?php
    include_once('include/config.php');
	require_once 'logincheck.php';
	//get hos code
	
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
			
				
		</div>	
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<label>APPOINTMENTs</Label>
			</div>
			<div class = "panel-body">
			
				<table id = "table" class = "display" width = "100%" cellspacing = "0">
					<thead>
						<tr>
							 <th>Id</th>
							 <th>Client</th>
							 <th>Phone No.</th>						  
							 <th>Physiotherapist</th>
							 <th>Room</th>
							 <th>Hall</th>
							  <th>Status</th>
							 <th>Date</th>
							 <th><center>Option</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query = $conn->query("SELECT appointments.id,concat(patients.firstname,' ',patients.middlename,' ',patients.lastname) as name,patients.phone,room.name as room,room.hall,concat(physiotherapist.firstname,' ',physiotherapist.middlename,' ',physiotherapist.lastname) as physio,date,app_status.name as status FROM `appointments` left join app_status on app_status.id=appointments.status left join physiotherapist on physiotherapist.id=appointments.physio left join patients on patients.id=appointments.patient left join room on room.id=appointments.room order by appointments.id desc") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>
						<tr>
							<td><?php echo $fetch['id'];?></td>
							<td><?php echo $fetch['name'];?></td>
							<td><?php echo $fetch['phone'];?></td>
							<td><?php echo $fetch['physio'];?></td>
							<td><?php echo $fetch['room'];?></td>
							<td><?php echo $fetch['hall'];?></td>
							<td><?php echo $fetch['status'];?></td>
							<td><?php echo $fetch['date'];?></td>
							<td><a href="app_options.php?id=<?php echo $fetch['id']; ?>"><span class="btn btn-success bg-green"><i class="fa fa-edit"></i> Change Status </span></a></td>


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