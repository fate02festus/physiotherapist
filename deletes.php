<?php
    include_once('include/config.php');
     $id=$_GET['id'];
     $adm=$_GET['del'];

  	if($adm=='adm')
    { 
         $conn->query("delete from `admin` where id='$id'") or die(mysqli_error());
            echo " <script>alert('Records Successfully Inserted..');</script>";
            echo " <script>setTimeout(\"location.href='admin.php';\",150);</script>";
    }
    if($adm=='phy')
    { 
         $conn->query("delete from `physiotherapist` where id='$id'") or die(mysqli_error());
            echo " <script>alert('Records Successfully Inserted..');</script>";
            echo " <script>setTimeout(\"location.href='physio.php';\",150);</script>";
    }
    if($adm=='rm')
    { 
         $conn->query("delete from `room` where id='$id'") or die(mysqli_error());
            echo " <script>alert('Records Successfully Inserted..');</script>";
            echo " <script>setTimeout(\"location.href='room.php';\",150);</script>";
    }
    if($adm=='pat')
    { 
         $conn->query("delete from `patients` where id='$id'") or die(mysqli_error());
            echo " <script>alert('Records Successfully Inserted..');</script>";
            echo " <script>setTimeout(\"location.href='patients.php';\",150);</script>";
    }