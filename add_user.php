<?php
    include_once('include/config.php');
  	if(ISSET($_POST['save_admin']))
    { 
      $id=$_POST['id'];
            $ln=$_POST['ln'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $mname=$_POST['mname'];
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $cpassword=md5($_POST['cpassword']);
        $phone=$_POST['phone'];
        $idno=$_POST['idno'];
        $gender=$_POST['gender'];
        $dob=$_POST['dob'];
           
        
       if( $password==$cpassword)
       {
          $qry=$conn->query("SELECT * FROM users where `username` ='$username' ")or die (mysqli_error());
          $nrows=$qry->fetch_all();
          $Valid = $qry->num_rows;
           if($Valid <= 0)
           {
                $write =$conn->query("INSERT INTO `admin`(`idno`, `id`, `firstname`, `middlename`, `lastname`,`username`, `password`, `phone`, `dob`, `gender`) VALUES ('$idno','$ln','$fname','$mname','$lname','$username','$password','$phone','dob','$gender')") or die(mysqli_error());
                  $wr =$conn->query("INSERT INTO `users`(`username`, `password`, `level`)              VALUES ('$username','$password','$id')") or die(mysqli_error());
                  $conn->query("update system_master set last_number=last_number+1 where id='$id'") or die(mysqli_error());
                if($write )
                {                    
                    echo " <script>alert('Records Successfully Inserted..');</script>";
                    echo " <script>setTimeout(\"location.href='admin.php';\",150);</script>";
                }
                else 
                { 
                   echo " <script>alert('Something went wrong...');</script>";
                   echo " <script>setTimeout(\"location.href='admin.php';\",150);</script>";
              }
          }
          else
          {
            
              echo " <script>alert('Username already exist. Please check...');</script>";
               echo " <script>setTimeout(\"location.href='admin.php';\",150);</script>";
      }
     }
     else
     {
        echo " <script>alert('password does not match. Please check...');</script>";
         echo " <script>setTimeout(\"location.href='admin.php';\",150);</script>";
     }
  }
  if(ISSET($_POST['save_physio']))
    { 
      $id=$_POST['id'];
            $ln=$_POST['ln'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $mname=$_POST['mname'];
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $cpassword=md5($_POST['cpassword']);
        $phone=$_POST['phone'];
        $idno=$_POST['idno'];
        $gender=$_POST['gender'];
        $dob=$_POST['dob'];
           
        
       if( $password==$cpassword)
       {
          $qry=$conn->query("SELECT * FROM users where `username` ='$username' ")or die (mysqli_error());
          $nrows=$qry->fetch_all();
          $Valid = $qry->num_rows;
           if($Valid <= 0)
           {
                $write =$conn->query("INSERT INTO `physiotherapist`(`idno`, `id`, `firstname`, `middlename`, `lastname`,`username`, `password`, `phone`, `dob`, `gender`) VALUES ('$idno','$ln','$fname','$mname','$lname','$username','$password','$phone','dob','$gender')") or die(mysqli_error());
                  $wr =$conn->query("INSERT INTO `users`(`username`, `password`, `level`)              VALUES ('$username','$password','$id')") or die(mysqli_error());
                  $conn->query("update system_master set last_number=last_number+1 where id='$id'") or die(mysqli_error());
                if($write )
                {                    
                    echo " <script>alert('Records Successfully Inserted..');</script>";
                    echo " <script>setTimeout(\"location.href='physio.php';\",150);</script>";
                }
                else 
                { 
                   echo " <script>alert('Something went wrong...');</script>";
                   echo " <script>setTimeout(\"location.href='physio.php';\",150);</script>";
              }
          }
          else
          {
            
              echo " <script>alert('Username already exist. Please check...');</script>";
               echo " <script>setTimeout(\"location.href='physio.php';\",150);</script>";
      }
     }
     else
     {
        echo " <script>alert('password does not match. Please check...');</script>";
         echo " <script>setTimeout(\"location.href='physio.php';\",150);</script>";
     }
     
  }
	if(ISSET($_POST['save_room']))
   { 
        $name=$_POST['name'];
        $hall=$_POST['hall'];
        $desc=$_POST['desc'];
        
        $write =$conn->query("INSERT INTO `room`(`name`, `hall`, `description`) VALUES ('$name','$hall','$desc')") or die(mysqli_error());          
        if($write )
        {                    
            echo " <script>alert('Records Successfully Inserted..');</script>";
            echo " <script>setTimeout(\"location.href='room.php';\",150);</script>";
        }
        else 
        { 
           echo " <script>alert('Something went wrong...');</script>";
           echo " <script>setTimeout(\"location.href='room.php';\",150);</script>";
         }     
  }
  if(ISSET($_POST['save_pat']))
   { 
        $fname=$_POST['fname'];
        $mname=$_POST['mname'];
        $lname=$_POST['lname'];
        $gender=$_POST['gender'];
        $dob=$_POST['dob'];
        $address=$_POST['address'];
        $idno=$_POST['idno'];
        $phone=$_POST['phone'];
        
        $write =$conn->query("INSERT INTO `patients`(`firstname`, `middlename`, `lastname`, `phone`, `idno`, `address`, `gender`, `dob`) VALUES ('$fname','$mname','$lname','$phone','$idno','$address','$gender','$dob')") or die(mysqli_error());          
        if($write )
        {                    
            echo " <script>alert('Records Successfully Inserted..');</script>";
            echo " <script>setTimeout(\"location.href='patients.php';\",150);</script>";
        }
        else 
        { 
           echo " <script>alert('Something went wrong...');</script>";
           echo " <script>setTimeout(\"location.href='patients.php';\",150);</script>";
         }     
  }//save_appoint
  if(ISSET($_POST['save_appoint']))
  { 
        $physio=$_POST['phy'];
        $pat=$_POST['pid'];
        $hall=$_POST['hall'];
        $room=$_POST['rid'];
        $date=$_POST['date'];
        $status=$_POST['status'];
        
        $write =$conn->query("INSERT INTO `appointments`(`patient`, `room`, `physio`, `hall`, `date`, `status`) VALUES ('$pat','$room','$physio','$hall','$date','$status')") or die(mysqli_error());          
        if($write )
        {                    
            echo " <script>alert('Records Successfully Inserted..');</script>";
            echo " <script>setTimeout(\"location.href='c_appoint.php';\",150);</script>";
        }
        else 
        { 
           echo " <script>alert('Something went wrong...');</script>";
           echo " <script>setTimeout(\"location.href='c_appoint.php';\",150);</script>";
         }     
  }
  if(ISSET($_POST['save_status']))
  { 
        $id=$_POST['id'];
        $status=$_POST['status'];
        
        $write =$conn->query("update `appointments` set `status`='$status' ") or die(mysqli_error());          
        if($write )
        {                    
            echo " <script>alert('Records Successfully Inserted..');</script>";
            echo " <script>setTimeout(\"location.href='home-p.php';\",150);</script>";
        }
        else 
        { 
           echo " <script>alert('Something went wrong...');</script>";
           echo " <script>setTimeout(\"location.href='home-p.php';\",150);</script>";
         }     
  }