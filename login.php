<?php
	session_start();
	include_once('include/config.php');
	if(ISSET($_POST['login']))
	{
		$username = $_POST['username'];
		$password =md5($_POST['password']);
		//determine user
		if($username && $password)
		{
			$qryy = $conn->query("SELECT * FROM `users` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
			$Valid = $qryy->num_rows;
			$ftch = $qryy->fetch_array();
			if($Valid>0)
			{
				$level = $ftch['level'];
				$_SESSION['level'] =$ftch['level'];
				if($level=="1")
				{
					$qry = $conn->query("SELECT * FROM `admin` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
				     $fetch = $qry->fetch_array();
					$isValid = $qry->num_rows;
					
					$_SESSION['user_id'] =$fetch['id'];
					
			 	    if($isValid > 0)
				    {
				   		header("location: home.php");

					}
					else
					{
						echo "<script>alert('Invalid Admin username or password')</script>";
						echo "<script>window.location = 'index.php'</script>";
					}
				}
				else if($level=="2")
				{
					$qry = $conn->query("SELECT * FROM `physiotherapist` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
				     $fetch = $qry->fetch_array();
					$isValid = $qry->num_rows;
					
					$_SESSION['user_id'] =$fetch['id'];
					
			 	    if($isValid > 0)
				    {
				   		header("location: home-p.php");

					}
					else
					{
						echo "<script>alert('Invalid Admin username or password')</script>";
						echo "<script>window.location = 'index.php'</script>";
					}
				}
			}
       		else
			{
					echo "<script>alert('username does not exist. Kindly check')</script>";
								echo "<script>window.location = 'index.php'</script>";
			}
		}
		else
		{
			echo "<script>alert('username or password not supplied. Kindly check')</script>";
								echo "<script>window.location = 'index.php'</script>";
		}
	}
	$conn->close();
	