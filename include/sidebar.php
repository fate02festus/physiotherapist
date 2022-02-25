<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
<div id = "sidebar">
			<ul id = "menu" class = "nav menu">
				<?php  if($_SESSION['level']=="1"){ ?>
				<li><a href = "home.php"><i class = "glyphicon glyphicon-home"></i> Dashboard</a></li>
				<li><a href = "#" class = "glyphicon glyphicon-user"> Admin </a>
					<ul>
						<li><a href = "admin.php" class = "glyphicon glyphicon-user"> Manage Admin</a></li>
					</ul>
				</li>
				<li><a href = "#" class = "glyphicon glyphicon-user"> Physiotherapist</a>
					<ul>
						<li><a href = "physio.php" class = "glyphicon glyphicon-user"> Manage Physio</a></li>						
					</ul>
				</li>
				<li><a href = "#" class = "glyphicon glyphicon-book"> Physio Room</a>
					<ul>
						<li><a href = "room.php" class = "glyphicon glyphicon-book"> Manage Rooms</a></li>						
					</ul>
				</li>
				<li><a href = "#" class = "glyphicon glyphicon-user"> Clients</a>
					<ul>
						<li><a href = "patients.php" class = "glyphicon glyphicon-user"> Manage Clients</a></li>						
					</ul>
				</li>
				<li><a href = "#" class = "glyphicon glyphicon-book"> Appointments</a>
					<ul>
						<li><a href = "b_app.php" class = "glyphicon glyphicon-book"> Create Appointment</a></li>						
					</ul>
				</li>
			<?php } else if($_SESSION['level']=="2"){ ?>
				<li><a href = "home-p.php"><i class = "glyphicon glyphicon-home"></i> Dashboard</a></li>
				<li><a href = "#" class = "glyphicon glyphicon-book"> Appointments</a>
					<ul>
						<li><a href = "home-p.php" class = "glyphicon glyphicon-book"> Manage Appointment</a></li>						
					</ul>
				</li>
			<?php } ?>
			</ul>
	</div></li></li></ul></div>