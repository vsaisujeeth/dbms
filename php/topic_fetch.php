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
 SELECT projects.topic,count(proj_id) as pr,count(conference.pub_id) as conf,count(journal.pub_id) as jou FROM projects,conference,journal WHERE projects.topic=conference.topic AND conference.topic=journal.topic GROUP BY(topic)
 ";
}
$result = mysqli_query($connect, $query);
if($result)
if(mysqli_num_rows($result) > 0)
{

    $output .= '
    <div class="table-responsive">
     <table class="table table hover">
     <thead>
     <tr>
       <th scope="col">topic</th>
       <th scope="col">no.of projects</th>
       <th scope="col">no.of conference publications</th>
       <th scope="col">no.of journal publications</th>
     </tr>
   </thead>
   <tbody>
   ';
 while($row = mysqli_fetch_array($result))
 {
    
  $output .= '
   <tr>
    <td>'.$row["topic"].'</td>
    <td>'.$row["pr"].'</td>
    <td>'.$row["conf"].'</td>
    <td>'.$row["jou"].'</td>
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

?>