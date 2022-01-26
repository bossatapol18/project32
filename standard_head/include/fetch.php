<?php
//fetch.php
require('./connectio/connection.php');
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM main_std 
  WHERE standard_meet LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM main_std ORDER BY standard_idtb
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Customer Name</th>
     <th>Address</th>
     <th>City</th>
     <th>Postal Code</th>
     <th>Country</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["CustomerName"].'</td>
    <td>'.$row["Address"].'</td>
    <td>'.$row["City"].'</td>
    <td>'.$row["PostalCode"].'</td>
    <td>'.$row["Country"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>