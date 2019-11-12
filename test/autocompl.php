<?php

//CREDENTIALS FOR DB

//LET'S INITIATE CONNECT TO DB
$connect = mysqli_connect("localhost", "root", "", "dbms");
$result = mysqli_select_db($connect,"dbms") or die("Can't select database. Please check DB name and try again");

//CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
if (isset($_REQUEST["q"])) 
//if(1)
{
    $query = $_REQUEST['q'];
    //$q = "badri";
    $sql = mysqli_query ($connect,"SELECT * FROM faculty WHERE name LIKE '%{$query}%'");
	$array = array();
    while ($row = mysqli_fetch_array($sql)) {
        $array[] = array (
            'label' => $row['name'],
            'value' => $row['name'],
        );
    }
    //RETURN JSON ARRAY
    //echo($array);
    echo json_encode ($array);
}

?>