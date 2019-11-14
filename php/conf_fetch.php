<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "dbms");
$output = '';
if(isset($_POST["query"]))
//if(1)
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
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

$result = mysqli_query($connect, $query);
if($result)
{
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
              <h5><b>'.$row["name"].'</b></h5>
              <p>
              <i>'.$row["topic"].'</i>
              '.$row["conference_name"].' ConferencePub year: '.$row["p_year"].', ConferencePub month: '.$row["p_month"].' 
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
}


?>