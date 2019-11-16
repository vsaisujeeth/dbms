<?php
    session_start();
    require'connection.php';
    //$conn = mysqli_connect("localhost", "root", "", "dbms");
    $name = $_POST['prname'];
    $sdate=$_POST['start_date'];
    $edate=$_POST['end_date'];
    $budget=$_POST['budget'];
    $topic=$_POST['topic'];
    $sponsor=$_POST['sponsor'];
    $faculty = array();
    if(!empty($_POST['faculty']))
    {
        $faculty= $_POST['faculty'];
    }
    
    $conn = new mysqli("localhost","root","","dbms");
   
    $sdate=str_replace('/','-',$sdate);
    $edate=str_replace('/','-',$edate);
    //echo "$edate";

    //echo($date);

    // $sql = "select count(*) as total from projects";
    // $res= $conn->query($sql);
    //insert into projects(name,start_date,end_date,budget,topic,sponsor)values('project 4','2001-3-03','2003-4-05',2345,'dcvfd','sbi');
    $sql1 = "insert into projects(name,start_date,end_date,budget,topic,sponsor) values ('$name','$sdate','$edate','$budget','$topic','$sponsor')";
    if($res= $conn->query($sql1))
    {
        echo "inserted  new   project   successfully";
    }else
    {
        echo "error";
    }

    $last_id;
    $sql1 = "select LAST_INSERT_ID() as last";
    $result1 = $conn->query($sql1);
    if($result1)
    {
        $row = $result1->fetch_assoc();
        $last_id = $row['last'];
    }
    // echo("ygdehf");
    //echo ($_SESSION['user_id']);
    $sql ="INSERT INTO worked_on VALUES('$last_id','".$_SESSION['user_id']."','head')";
    if($res= $conn->query($sql))
    {
    }else{
        echo ("error1");
        echo ($conn->error);
    }

    foreach($faculty as $value)
    {
        $sql ="INSERT INTO worked_on VALUES('$last_id','$value','head')";
        if($value!=$_SESSION['user_id'] && $res= $conn->query($sql))
        {
        }else{
            error("error2");
            echo ($conn->error);
        }

    } 
    // $sql2 = "INSERT INTO admin VALUES('$fid','$pass')";
    // $res= $conn->query($sql1);
    // if($res&&$conn->query($sql2))


?>