<?php
include_once('include/config.php');
       $rm=$_GET['rm'];
        $phy=$_GET['phy'];
        $al=$_GET['al'];
        if($al=="1")
        {
            $write =$conn->query("UPDATE room SET physio='$phy'  WHERE id='$rm'") or die(mysqli_error());          
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
        }else
        {
             $write =$conn->query("UPDATE room SET physio=''  WHERE id='$rm'") or die(mysqli_error());          
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

         ?>         
