<!DOCTYPE html>
<?php
include_once('include/config.php');
	require_once 'logincheck.php';
	$id = $_GET['id'];
    $rw = mysqli_query($conn, "SELECT id,name FROM app_status order by id") or die(mysqli_error());
 $rw1 = mysqli_fetch_all($rw);

//get properties
    $write =$conn->query("SELECT appointments.id,patients.id as pat,concat(patients.firstname,' ',patients.middlename,' ',patients.lastname) as name,patients.phone,room.name as room,room.hall,concat(physiotherapist.firstname,' ',physiotherapist.middlename,' ',physiotherapist.lastname) as physio,date,app_status.name as status FROM `appointments` left join app_status on app_status.id=appointments.status left join physiotherapist on physiotherapist.id=appointments.physio left join patients on patients.id=appointments.patient left join room on room.id=appointments.room where appointments.id='$id' ") or die(mysqli_error($db_connect));
    $row=$write->fetch_array();  
    $patient=$row['name'];
    $id=$row['id'];
    $room=$row['room'];
    $physio=$row['physio'];
    $date=$row['date'];

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
		
			<div class = "panel-heading">
				<label>CHANGE STATUS </label>
				<a href = "invoice.php" class = "btn btn-sm btn-info" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<div class = "panel-body">
			<form id = "form_user" method = "POST" enctype = "multi-part/form-data">
				<div class = "panel panel-default" style = "width:80%; margin:auto;">
				<div class = "panel-heading">
				</div>
                 <input type="hidden" name="id" value="<?php echo $id ;?>" >
				<div class = "panel-body">
                <div class="form-group">
               <label for="exampleInputEmail1">Appointment Status#</label>
                 <select name = "status" class = "form-control"  required = "required">
                <?php foreach ($rw1 as $p) {?>
                <option value = "<?php echo $p['0'];?>"><?php echo $p['1'];?></option>
                 <?php } ?>
               </select>                
               </div>
               <div class="form-group">
                <label for="exampleInputEmail1">Client </label>
                <input type="text" name="name" value="<?php echo $patient ;?>" class="form-control" readonly="readonly" >
               </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Room </label>
                <input type="text" name="room" value="<?php echo $room ;?>" class="form-control" readonly="readonly" >   
                     
               </div>
               
               <div class="form-group">
                <label for="exampleInputEmail1">Therapist </label>
                <input type="text" name="physio" value="<?php echo $physio ;?>" class="form-control" readonly="readonly" >
               </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Date </label>
                <input type="date" name="date" value="<?php echo $date ;?>"  class="form-control" >
               </div>


				<button class = "btn btn-warning" name = "save_status" ><span class = "glyphicon glyphicon-edit"></span> Save</button>
				<br />
					</div>	
					<?php require 'add_user.php'?>
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
 <script>
   
   function getAmt1(val) {
    $.ajax({
    type: "POST",
    url: "get-house.php",
    data:'payId='+val,
    success: function(data){
        $("#landlord1").html(data);
        
    }
    });
    }
</script>
</body>
</html>