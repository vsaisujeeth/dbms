<?php
    session_start();
    $connect = mysqli_connect("localhost", "root", "", "dbms");
   
    

    $name = $_POST['jname'];
    $year=$_POST['jyear'];
    $spage=$_POST['startpage'];
   
    $epage=$_POST['endpage'];
    $topic=$_POST['topic'];
    $conf_link=$_POST['jlink'];
    $jour_name =$_POST['jour_name'];
    $volume = $_POST['volume'];
    $issue = $_POST['issueno'];
    $faculty = $_POST['faculty'];

    
    $conn = new mysqli("localhost","root","","dbms");
   
    // $sdate=str_replace('/','-',$sdate);
    // $edate=str_replace('/','-',$edate);
    //echo "$edate";

    //echo($date);

    // $sql = "select count(*) as total from projects";
    // $res= $conn->query($sql);

    $sql1 = "INSERT INTO journal VALUES('pub006','$name','$year','$epage','$spage','$topic','$conf_link','$jour_name','$volume','$issue')";
    if($res= $conn->query($sql1))
    {
        echo "inserted  new   user   successfully";
    }else
    {
        echo"errooer";
        echo ($conn->error);
    }
    
    echo ($_SESSION['user_id']);
    $sql ="INSERT INTO published_jour_by VALUES('pub006','".$_SESSION['user_id']."','head')";
    if($res= $conn->query($sql))
    {
        echo("success");
    }else{ 
        echo "Error in adding fac1";
        echo ($conn->error);
    }

    foreach($faculty as $value)
    {
        $sql ="INSERT INTO published_jour_by VALUES('pub006','$value','head')";
        if($value!=$_SESSION['user_id'] && $res= $conn->query($sql))
        {
        }else{
            echo "Error in adding fac2";
            echo ($conn->error);
        }

    } 
    // $sql2 = "INSERT INTO admin VALUES('$fid','$pass')";
    // $res= $conn->query($sql1);
    // if($res&&$conn->query($sql2))


?>