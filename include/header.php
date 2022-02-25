<meta charset = "utf-8" />
<link rel = "shortcut icon" href = "images/log.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />

<div class = "navbar navbar-default navtop">
	<?php
		require'include/config.php';
					$qry="";
					if($_SESSION['level']=="1")
						$qry="SELECT * FROM admin where id = '$_SESSION[user_id]'";	
					else if($_SESSION['level']=="2")
						$qry="SELECT * FROM physiotherapist where id = '$_SESSION[user_id]'";					
				$q = $conn->query($qry) or die(mysqli_error());
				$f = $q->fetch_array();
			?>
		<img src = "images/log.jpg" style = "float:left;" height = "55px" /><label class = "navbar-brand">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mikado Physiotherapy Services </label>
		
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php
							echo $f['firstname']." ".$f['lastname'];
							//$conn->close();
						?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a class = "me" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Logout</a>
					</li>
				</ul>
				</li>
			</ul>
</div>