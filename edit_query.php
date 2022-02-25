<?php
    include_once('include/config.php');
	$id = $_GET['id'];
	//$last = $_GET['lastname'];
	//session_start();
	if(isset($_POST['edit_admin']))
	{ 
	    $id=$_POST['id'];

	    $fn=$_POST['fname'];
	    $mn=$_POST['mname'];
	    $ln=$_POST['lname'];
	    $usern=$_POST['username'];
	    $ph=$_POST['phone'];
      $idn=$_POST['idno'];
      $gender=$_POST['gender'];
      $dob=$_POST['dob'];
	   
      $write =$conn->query("UPDATE `admin` SET `idno`='$idn',`firstname`='$fn',`middlename`='$mn',`lastname`='$ln',`username`='$usern',`phone`='$ph',`dob`='$dob',`gender`='$gender' WHERE `id`='$id'") or die(mysqli_error());
      $writex =$conn->query("UPDATE users set `username`='$usern',`password`='$pass' where `username`='$usern'") or die(mysqli_error());
    
      echo " <script>alert('Records Successfully Inserted...');</script>";
      echo " <script>setTimeout(\"location.href='admin.php';\",150);</script>";
  }
  else if(isset($_POST['edit_pat']))//edit_landlord
	{ 
	    $id=$_POST['id'];

	    $fn=$_POST['fname'];
	    $mn=$_POST['mname'];
	    $ln=$_POST['lname'];
	    $address=$_POST['address'];
	    $ph=$_POST['phone'];
      $idn=$_POST['idno'];
      $gender=$_POST['gender'];
      $dob=$_POST['dob'];
	   
      $write =$conn->query("UPDATE `patients` SET `idno`='$idn',`firstname`='$fn',`middlename`='$mn',`lastname`='$ln',`phone`='$ph',`dob`='$dob',`gender`='$gender',`address`='$address' WHERE `id`='$id'") or die(mysqli_error());
      
    
      echo " <script>alert('Records Successfully Inserted...');</script>";
      echo " <script>setTimeout(\"location.href='patients.php';\",150);</script>";
  }
  else if(isset($_POST['edit_physio']))
	{ 
	    $id=$_POST['id'];

	    $fn=$_POST['fname'];
	    $mn=$_POST['mname'];
	    $ln=$_POST['lname'];
	    $usern=$_POST['username'];
	    $ph=$_POST['phone'];
      $idn=$_POST['idno'];
      $gender=$_POST['gender'];
      $dob=$_POST['dob'];
	   
      $write =$conn->query("UPDATE `physiotherapist` SET `idno`='$idn',`firstname`='$fn',`middlename`='$mn',`lastname`='$ln',`username`='$usern',`phone`='$ph',`dob`='$dob',`gender`='$gender' WHERE `id`='$id'") or die(mysqli_error());
      $writex =$conn->query("UPDATE users set `username`='$usern',`password`='$pass' where `username`='$usern'") or die(mysqli_error());
    
      echo " <script>alert('Records Successfully Inserted...');</script>";
      echo " <script>setTimeout(\"location.href='physio.php';\",150);</script>";
  }
  else if(isset($_POST['edit_physio']))//edit_landlord
	{ 
	    $id=$_POST['id'];

	     $name=$_POST['name'];
       $hall=$_POST['hall'];
       $desc=$_POST['desc'];
	   
      $write =$conn->query("UPDATE `room` SET `name`='$name',`hall`='$hall',`description`='$desc' WHERE `id`='$id'") or die(mysqli_error());
       
      echo " <script>alert('Records Successfully Inserted...');</script>";
      echo " <script>setTimeout(\"location.href='room.php';\",150);</script>";
  }
   

