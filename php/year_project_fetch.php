<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "dbms");
$output = '';
// if(isset($_POST["query"]))
// //if(1)
// {
//  $search = mysqli_real_escape_string($connect, $_POST["query"]);
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
{
 $query = "
 select year(start_date) as year,count(proj_id) as pr from  projects group by(year(start_date));
 ";
}
$result = mysqli_query($connect, $query);
if($result)
{
if(mysqli_num_rows($result) > 0)
{

    $output .= '
    <div class="table-responsive">
     <table class="table table hover">
     <thead>
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


?>