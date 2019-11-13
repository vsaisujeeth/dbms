<?php
 $dept = $_POST['dept'];
 $conn = new mysqli("localhost","root","","dbms");
 $sql = "SELECT * FROM departments WHERE dept_name='$dept'";
 $result = $conn->query($sql);
 if($result->num_rows>0)
 {
     echo "department already exists"; 
     $result->free();  
 }
 else 
 {
    $sql1 = "INSERT INTO departments VALUES('$dept')";
    $res= $conn->query($sql1);
    if($res)
    echo "inserted  successfully";
 }

?>