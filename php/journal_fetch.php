<?php
//fetch.php
require'connection.php';
//$conn = mysqli_connect("localhost", "root", "", "dbms");
$output = '';
if(isset($_POST["query"]))
//if(1)
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 //$search = "project";
 $query = "
  SELECT * FROM journal 
  WHERE pub_id LIKE '%".$search."%'
  OR name LIKE '%".$search."%' 
  OR topic LIKE '%".$search."%' 
  OR journal_name LIKE '%".$search."%' 
  OR journal_link LIKE '%".$search."%' 
  OR p_year LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  SELECT * FROM journal ORDER BY pub_id
 ";
}
if($result = mysqli_query($conn, $query))
{
  if(mysqli_num_rows($result) > 0)
  {
  
      $output .= '
      <div class="row">
      <div class="col-12 col-sm-8 col-lg-10">
          <h6 class="text-muted">Journal</h6> 
          <ul class="list-group">
     ';
   while($row = mysqli_fetch_array($result))
   {
      
    $output .= '
  <a href="'.$row["journal_link"].'" style="margin: 0.5rem;" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
      <div class="flex-column">
      <h5><b>Journal ID: </b>'.$row["pub_id"].'<br><p><b>Name: </b>'.$row["name"].'</h5>
        <i>'.$row["topic"].'</i><br>
        <b>Journal Name:</b> '.$row["journal_name"].'<br><b>Volume No: </b>'.$row["volume"].',<b> Issue No: </b>'.$row["issue_no"].' 
        <p>'.$row["journal_link"].'</p>
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
}


?>