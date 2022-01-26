<?php
require('../connection/connection.php');
if(($_POST['query']) != '')
{
 $search_text = implode(",",$_POST['query']);
 $query = "SELECT * FROM main_std WHERE standard_idtb IN ($search_text) ";
}
else
{
 $query = "SELECT * FROM main_std  ";
}
// var_dump($query);
$statement = sqlsrv_query($conn,$query);
$total_row = sqlsrv_num_rows($statement);
$output = '';
$i=1;
// var_dump($_POST['query']);

   while($row = sqlsrv_fetch_array($statement, SQLSRV_FETCH_ASSOC)){
  $output .= '
  <table class="table table-bordered">
  <tr>
   <td>'.$i++.'</td>
   <td>'.$row["standard_meet"].'</td>
   <td>'.$row["standard_number"].'</td>
   <td>'.$row["standard_detail"].'</td>
   <td>'.$row["standard_day"].'</td>
  </tr>
  </table>
  ';
   }
   
echo $output;
exit();
?>