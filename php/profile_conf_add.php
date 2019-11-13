<?php
    session_start();
    $connect = mysqli_connect("localhost", "root", "", "dbms");
    echo($_POST['conf_name']);
    $conf_name=$_POST['conf_name'];
    $month=$_POST['conf_month'];

    $name = $_POST['conname'];
    $year=$_POST['confyear'];
    $spage=$_POST['startpage'];
   
    $epage=$_POST['endpage'];
    $topic=$_POST['topic'];
    $conf_link=$_POST['conferencelink'];
    $faculty = $_POST['faculty'];

    
    $conn = new mysqli("localhost","root","","dbms");
   
    // $sdate=str_replace('/','-',$sdate);
    // $edate=str_replace('/','-',$edate);
    //echo "$edate";

    //echo($date);

    // $sql = "select count(*) as total from projects";
    // $res= $conn->query($sql);

    $sql1 = "INSERT INTO conference VALUES('pub001','$name','$year','$spage','$epage','$topic','$conf_link','$conf_name','$month')";
    if($res= $conn->query($sql1))
    {
        echo "inserted  new   user   successfully";
    }else
    {
        echo "error";
    }
    echo("ygdehf");
    echo ($_SESSION['user_id']);
    $sql ="INSERT INTO published_conf_by VALUES('pr008',".$_SESSION['user_id'].",'head')";
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