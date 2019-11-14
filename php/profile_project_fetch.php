<?php
//fetch.php
session_start();
$connect = mysqli_connect("localhost", "root", "", "dbms");
$output = '';
{
 $query = "
  SELECT * FROM projects WHERE proj_id in (SELECT proj_id FROM worked_on WHERE faculty_id='".$_SESSION['user_id']."')  
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
    <td>'.$row["name"].'</td><td>';
    
    $q="SELECT faculty.name FROM faculty,worked_on WHERE faculty.faculty_id=worked_on.faculty_id AND proj_id = '".$row["proj_id"]."'";
    $res=mysqli_query($connect,$q);
    if($res)
    {
        while($row1 = mysqli_fetch_array($res))
        {
            $output .='
            '.$row1["name"].',';
        }

    }
    
    $output .='
    </td>
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