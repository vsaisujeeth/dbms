<?php
//fetch.php
require'connection.php';
//$conn = mysqli_connect("localhost", "root", "", "dbms");
$output = '';
$output1 ='';
$output2 ='';
// if(isset($_POST["query"]))
// //if(1)
// {
//  $search = mysqli_real_escape_string($conn, $_POST["query"]);
//  //$search = "project";
//  $query = "
//   SELECT * FROM projects 
//   WHERE proj_id LIKE '%".$search."%'
//   OR name LIKE '%".$search."%' 
//   OR topic LIKE '%".$search."%' 
//   OR sponsor LIKE '%".$search."%' 
//  ";
// }
// else
 $query = "select year(start_date) as year,count(proj_id) as pr from  projects group by(year(start_date)) order by (year(start_date)) desc limit 3";
$result = mysqli_query($conn, $query);
if($result)
{
  if(mysqli_num_rows($result) > 0)
  {
    $output .= '
    <div class="table-responsive">
     <table class="table table bordered">
     <thead class="thead-dark">
     <tr>
       <th scope="col">year</th>
       <th scope="col">no.of projects</th>
     </tr>
   </thead>
   <tbody>
   ';
    while($row = mysqli_fetch_array($result))
    {
        
      $output .= '
      <tr>
        <td>'.$row["year"].'</td>
        <td>'.$row["pr"].'</td>
      </tr>
      ';
      
    }
    $output .= '
      </tbody>
      </table>
      <hr>
      <div class="row">
          <div class="col-md-4 col-md-offset-4 text-center">
              <ul class="pagination" id="myPager"></ul>
          </div>
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
$query1 = "select p_year as year,count(pub_id) as pr from  conference group by(p_year) order by p_year desc limit 3";
$result1 = mysqli_query($conn, $query1);
if($result1)
{
  if(mysqli_num_rows($result1) > 0)
  {
    $output1 .= '
    <div class="table-responsive">
     <table class="table table hover">
     <thead>
     <tr>
       <th scope="col">year</th>
       <th scope="col">no.of conference publications</th>
     </tr>
   </thead>
   <tbody>
   ';
    while($row1 = mysqli_fetch_array($result1))
    {
        
      $output1 .= '
      <tr>
        <td>'.$row1["year"].'</td>
        <td>'.$row1["pr"].'</td>
      </tr>
      ';
      
    }
    $output1 .= '
      </tbody>
      </table>
      <hr>
      <div class="row">
          <div class="col-md-4 col-md-offset-4 text-center">
              <ul class="pagination" id="myPager"></ul>
          </div>
      </div>
    </div>
    ';
  echo $output1;
  }
  else
  {
    echo 'Data Not Found';
  } 
}
$query2 = "select p_year as year,count(pub_id) as pr from journal group by(p_year) order by p_year desc limit 3";
$result2 = mysqli_query($conn, $query2);
if($result2)
{
  if(mysqli_num_rows($result2) > 0)
  {
    $output2 .= '
    <div class="table-responsive">
     <table class="table table hover">
     <thead>
     <tr>
       <th scope="col">year</th>
       <th scope="col">no.of journal publications</th>
     </tr>
   </thead>
   <tbody>
   ';
    while($row2 = mysqli_fetch_array($result2))
    {
        
      $output2 .= '
      <tr>
        <td>'.$row2["year"].'</td>
        <td>'.$row2["pr"].'</td>
      </tr>
      ';
      
    }
    $output2 .= '
      </tbody>
      </table>
      <hr>
      <div class="row">
          <div class="col-md-4 col-md-offset-4 text-center">
              <ul class="pagination" id="myPager"></ul>
          </div>
      </div>
    </div>
    ';
  echo $output2;
  }
  else
  {
    echo 'Data Not Found';
  } 
}


?>