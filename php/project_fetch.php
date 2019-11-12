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
  SELECT * FROM projects 
  WHERE proj_id LIKE '%".$search."%'
  OR name LIKE '%".$search."%' 
  OR topic LIKE '%".$search."%' 
  OR sponsor LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  SELECT * FROM projects ORDER BY proj_id
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{

    $output .= '
    <div class="table-responsive">
     <table class="table table bordered">
     <thead>
     <tr>
       <th scope="col">#</th>
       <th scope="col">Project Title</th>
       <th scope="col">People</th>
       <th scope="col">sponsor</th>
       <th scope="col">Dates</th>
     
     </tr>
   </thead>
   <tbody>
   ';
 while($row = mysqli_fetch_array($result))
 {
    
  $output .= '
   <tr>
    <td>'.$row["proj_id"].'</td>
    <td>'.$row["name"].'</td>
    <td>Samrat</td>
    <td>'.$row["sponsor"].'</td>
    <td>'.$row["start_date"].'-'.$row["end_date"].'</td>
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