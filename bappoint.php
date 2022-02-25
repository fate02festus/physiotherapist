<!DOCTYPE html>
<?php
    include_once('include/config.php');
	require_once 'logincheck.php';
	//get hos code
	$pat=$_GET['id'];

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
				<label>SELECT PHYSIOTHERAPIST</Label>
			</div>
			<div class = "panel-body">
			
				<table id = "table" class = "display" width = "100%" cellspacing = "0">
					<thead>
						<tr>
							 <th>Id</th>
							  <th>Name</th>							  
							  <th>Phone</th>
							  <th>ID NO.</th>
							  <th>Room</th>
							  <th>Hall</th>
							  <th><center>Option</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query = $conn->query("SELECT room.id as rid,name as room,hall,concat(firstname,' ',middlename,' ',lastname) as name,physiotherapist.idno,physiotherapist.phone,physiotherapist.id  FROM room left join physiotherapist on physiotherapist.id=room.physio order by room.id") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>
						<tr>
							<td><?php echo $fetch['id'];?></td>
							<td><?php echo $fetch['name'];?></td>
							<td><?php echo $fetch['phone'];?></td>
							<td><?php echo $fetch['idno'];?></td>
							<td><?php echo $fetch['room'];?></td>
							<td><?php echo $fetch['hall'];?></td>
							<td><a href="appointment.php?rid=<?php echo $fetch['rid']; ?>&phy=<?php echo $fetch['id']; ?>&pid=<?php echo $pat; ?>"><span class="btn btn-success bg-green"><i class="fa fa-edit"></i>  Select </span></a></td>


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