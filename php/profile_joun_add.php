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
   
    $sql1 = "INSERT INTO journal(name,p_year,end_page,start_page,topic,journal_link,journal_name,volume,issue_no) VALUES('$name','$year','$epage','$spage','$topic','$conf_link','$jour_name','$volume','$issue')";
    if($res= $conn->query($sql1))
    {
        echo "inserted  new   journal   successfully";
    }else
    {
        echo"errooer";
        echo ($conn->error);
    }

    $last_id;
    $sql1 = "select LAST_INSERT_ID() as last";
    $result1 = $conn->query($sql1);
    if($result1)
    {
        $row = $result1->fetch_assoc();
        $last_id = $row['last'];
    }
    
    //echo ($_SESSION['user_id']);
    $sql ="INSERT INTO published_jour_by VALUES('$last_id','".$_SESSION['user_id']."','head')";
    if($res= $conn->query($sql))
    {
        echo("<br>success");
    }else{ 
        echo "Error in adding fac1";
        echo ($conn->error);
    }

    foreach($faculty as $value)
    {
        $sql ="INSERT INTO published_jour_by VALUES('$last_id','$value','head')";
        if($value!=$_SESSION['user_id'] && $res= $conn->query($sql))
        {
        }else{
            echo "Error in adding fac2";
            echo ($conn->error);
        }

    } 

?>