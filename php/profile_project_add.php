<?php
    session_start();
    $connect = mysqli_connect("localhost", "root", "", "dbms");
    $name = $_POST['prname'];
    $sdate=$_POST['start_date'];
    $edate=$_POST['end_date'];
    $budget=$_POST['budget'];
    $topic=$_POST['topic'];
    $sponsor=$_POST['sponsor'];
    $faculty=$_POST['faculty'];
    
    $conn = new mysqli("localhost","root","","dbms");
   
    $sdate=str_replace('/','-',$sdate);
    $edate=str_replace('/','-',$edate);
    //echo "$edate";

    //echo($date);

    // $sql = "select count(*) as total from projects";
    // $res= $conn->query($sql);

    $sql1 = "INSERT INTO projects VALUES('pr008','$name','$sdate','$edate','$budget','$topic','$sponsor')";
    if($res= $conn->query($sql1))
    {
        echo "inserted  new   user   successfully";
    }else
    {
        echo "error";
    }
    echo("ygdehf");
    echo ($_SESSION['user_id']);
    $sql ="INSERT INTO worked_on VALUES('pr008',".$_SESSION['user_id'].",'head')";
    if($res= $conn->query($sql))
    {
    }else{
        echo "Error in adding fac";
    }

    foreach($faculty as $value)
    {
        $sql ="INSERT INTO worked_on VALUES('pr008','$value','head')";
        if($value!=$_SESSION['user_id'] && $res= $conn->query($sql))
        {
        }else{
            echo "Error in adding fac";
        }

    } 
    // $sql2 = "INSERT INTO admin VALUES('$fid','$pass')";
    // $res= $conn->query($sql1);
    // if($res&&$conn->query($sql2))


?>