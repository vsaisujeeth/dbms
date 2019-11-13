<?php
 $name = $_POST['username'];
 $pass=$_POST['password'];
 $join=$_POST['joinedon'];
 $dep=$_POST['department'];
 $phno=$_POST['phone'];
 $mail=$_POST['mail'];
 $fid=$_POST['faci'];
 $conn = new mysqli("localhost","root","","dbms");
 $sql = "SELECT * FROM faculty WHERE faculty_id='$fid'";
 $result = $conn->query($sql);
 if($result->num_rows>0)
 {
     echo "user already exists"; 
     $result->free();  
 }
 else 
 {
     $date=str_replace('/','-',$join);
     //echo($date);
    $sql1 = "INSERT INTO faculty VALUES('$fid','$name','$dep',$phno,'$mail','$date')";
    $sql2 = "INSERT INTO admin VALUES('$fid','$pass')";
    $res= $conn->query($sql1);
    if($res&&$conn->query($sql2))
    echo "inserted  new   user   successfully";
 }

?>