<?php
    session_start();
    require'connection.php';
    //$conn = mysqli_connect("localhost", "root", "", "dbms");
    echo($_POST['conf_name']);
    $conf_name=$_POST['conf_name'];
    $month=$_POST['conf_month'];

    $name = $_POST['conname'];
    $year=$_POST['confyear'];
    $spage=$_POST['startpage'];
   
    $epage=$_POST['endpage'];
    $topic=$_POST['topic'];
    $conf_link=$_POST['conferencelink'];
    $faculty = array();
    if(!empty($_POST['faculty']))
    {
        $faculty= $_POST['faculty'];
    }
    
    $conn = new mysqli("localhost","root","","dbms");
   
    // $sdate=str_replace('/','-',$sdate);
    // $edate=str_replace('/','-',$edate);
    //echo "$edate";

    //echo($date);

    // $sql = "select count(*) as total from projects";
    // $res= $conn->query($sql);

    $sql1 = "INSERT INTO conference(name,p_year,end_page,start_page,topic,conference_link,conference_name,p_month) VALUES ('$name',$year,'$spage','$epage','$topic','$conf_link','$conf_name','$month')";
    if($res= $conn->query($sql1))
    {
        echo "inserted  new   conference   successfully";
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
    // echo ($_SESSION['user_id']);
    $sql ="INSERT INTO published_conf_by VALUES('$last_id','".$_SESSION['user_id']."','head')";
    if($res= $conn->query($sql))
    {
    }else{ 
        echo "Error in adding fac";
    }

    foreach($faculty as $value)
    {
        $sql ="INSERT INTO published_conf_by VALUES('$last_id','$value','head')";
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