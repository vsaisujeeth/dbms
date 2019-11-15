<?php
//fetch.php
session_start();
$connect = mysqli_connect("localhost", "root", "", "dbms");
$output = '';


{
 $query = "
 SELECT * FROM conference WHERE pub_id in (SELECT pub_id FROM published_conf_by WHERE faculty_id='".$_SESSION['user_id']."')  
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{

    $output .= '
    <div class="row">
    <div class="col-12 col-sm-8 col-lg-10">
        <h6 class="text-muted">Conference</h6> 
        <ul class="list-group">
   ';
 while($row = mysqli_fetch_array($result))
 {
    
    
  $output .= '
  <a href="'.$row["conference_link"].'" style="margin: 0.5rem;" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
      <div class="flex-column">
        <h5><b>Conference ID: </b>'.$row["pub_id"].'<p><b>Name: </b>'.$row["name"].'</h5>
        <i>'.$row["topic"].'</i><br>
        <b>Conference name:  </b>'.$row["conference_name"].'<br> <b> year: </b>'.$row["p_year"].', <b> month:</b> '.$row["p_month"].' 
        <p>'.$row["conference_link"].'</p>
        </p>
      </div>
  </a>
  ';
  
 }
 $output .= '
 </ul>
 </div>
</div>
 ';

 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>