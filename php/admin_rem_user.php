<?php
 $fid = $_POST['faci'];
 $conn = new mysqli("localhost","root","","dbms");
 $sql = "SELECT * FROM faculty WHERE faculty_id='$fid'";
 $result = $conn->query($sql);
 if($result->num_rows>0)
 {
     $sqlpr="DELETE FROM worked_on WHERE faculty_id='$fid'";
     $sqlconf="DELETE FROM published_conf_by WHERE faculty_id='$fid'";
     $sqljou="DELETE FROM published_jour_by WHERE faculty_id='$fid'";
     $sqlfac="DELETE FROM faculty WHERE faculty_id='$fid'";
     if($conn->query($sqlpr)&&$conn->query($sqlconf)&&$conn->query($sqljou)&& $conn->query($sqlfac))
     {
         echo "Removed User and his information(projects,publications etc) successfully";
     } 
 }
 else 
 {
    echo "facultyID doesn't exist in database";
 }

?>