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
  SELECT * FROM conference 
  WHERE pub_id LIKE '%".$search."%'
  OR name LIKE '%".$search."%' 
  OR topic LIKE '%".$search."%' 
  OR conference_name LIKE '%".$search."%' 
  OR conference_link LIKE '%".$search."%' 
  OR p_year LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  SELECT * FROM conference ORDER BY pub_id
 ";
}

$result = mysqli_query($conn, $query);
if($result)
{
      $output .= '
      <div class="row">
      <div class="col-12 col-sm-8 col-lg-10">
          <h6 class="text-muted">Conference</h6> 
          <ul class="list-group">
    ';
      if(mysqli_num_rows($result) > 0)
      {

         
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
     

      echo $output;
      }
      else
      {
      echo 'Data Not Found';
      }
      $output .= '
      </ul>
      </div>
      </div>
      ';
}


?>