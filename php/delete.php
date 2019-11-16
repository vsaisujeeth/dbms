<?php
session_start();
 $prid = $_POST['delProj'];
 $conid=$_POST['delConf'];
 $jourid=$_POST['delJour'];
 require'connection.php';
 //$conn = new mysqli("localhost","root","","dbms");
 if(!empty($prid))
 {
 $sql= "SELECT * FROM worked_on WHERE proj_id='$prid' AND faculty_id='".$_SESSION['user_id']."'";
 $result = $conn->query($sql); 
if($result->num_rows>0)
 {
     $res= $conn->query("DELETE FROM worked_on WHERE proj_id='$prid'");
     $res1= $conn->query("DELETE FROM projects WHERE proj_id='$prid'"); 
     if($res&&$res1)
     echo(" project deleted successfully<br>");
     $result->free(); 
 }
 else 
 {
    
    echo "project not found or you are not a part of the entered project<br>";
 }
}
 if(!empty($conid))
 {
 $sql= "SELECT * FROM published_conf_by WHERE pub_id='$conid' AND faculty_id='".$_SESSION['user_id']."'";
 $result = $conn->query($sql); 
if($result->num_rows>0)
 {
     $res= $conn->query("DELETE FROM published_conf_by WHERE pub_id='$conid'");
     $res1= $conn->query("DELETE FROM conference WHERE pub_id='$conid'"); 
     if($res&&$res1)
     echo(" conference deleted successfully<br>");
     $result->free(); 
 }
 else 
 {
    
    echo "conference not found or you are not a part of the entered conference publication<br>";
 }
}
 if(!empty($jourid))
 {
 $sql= "SELECT * FROM published_jour_by WHERE pub_id='$jourid' AND faculty_id='".$_SESSION['user_id']."'";
 $result = $conn->query($sql); 
if($result->num_rows>0)
 {
     $res= $conn->query("DELETE FROM published_jour_by WHERE pub_id='$jourid'");
     $res1= $conn->query("DELETE FROM journal WHERE pub_id='$jourid'"); 
     if($res&&$res1)
     echo(" journal deleted successfully");
     $result->free(); 
 }
 else 
 {
    
    echo "journal not found or you are not a part of the entered journal publication<br>";
 }
}
?>