<!DOCTYPE html>
<?php
    include_once('include/config.php');
	require_once 'logincheck.php';
	   $rw = mysqli_query($conn, "SELECT id,name FROM app_status order by id") or die(mysqli_error());
      $rw1 = mysqli_fetch_all($rw);

       $rp = mysqli_query($conn, "SELECT id,concat(firstname,' ',middlename,' ',lastname) as name FROM physiotherapist order by id") or die(mysqli_error());
      $rp1 = mysqli_fetch_all($rp);
$dat=date("Y-m-d");
	$physio=$_SESSION['user_id'];
	$filter=" where physiotherapist.id='$physio' and date>='$dat'";

   if(ISSET($_POST['save']))
   { 
    		   
        $date=$_POST['date'];
        $status=$_POST['status'];
        if($status!="" && $date!="")
        	$filter=" and app_status.id='$status' and date='$date'";
        else if($status!="" && $date=="" )
        	$filter=" and app_status.id='$status' ";
        else if($date!=""  && $status=="" )
        	$filter=" and date='$date' ";
           
   }

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
		
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<label>APPOINTMENTs</Label>
			</div>
				<br />		
			<div>
			<form id = "form_user" method = "POST" enctype = "multi-part/form-data">
		             
               	<label for="exampleInputPassword1">Status:</label>
		              <select name = "status" >
		         <option value ="">All Status</option>
                <?php foreach ($rw1 as $p) {?>
                <option value = "<?php echo $p['0'];?>"><?php echo $p['1'];?></option>
                 <?php } ?>
               </select>  
		              
		              <label for="exampleInputPassword1">Date:</label>
		              <input type="date" name="date" >
		              <button type="submit" class = "btn btn-success" name = "save" ><span class = "glyphicon glyphicon-search"></span> Search</button>

			</form>
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
					
						$query = $conn->query("SELECT appointments.id,concat(patients.firstname,' ',patients.middlename,' ',patients.lastname) as name,patients.phone,room.name as room,room.hall,concat(physiotherapist.firstname,' ',physiotherapist.middlename,' ',physiotherapist.lastname) as physio,date,app_status.name as status FROM `appointments` left join app_status on app_status.id=appointments.status left join physiotherapist on physiotherapist.id=appointments.physio left join patients on patients.id=appointments.patient left join room on room.id=appointments.room ". $filter ." order by appointments.id desc") or die(mysqli_error());
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