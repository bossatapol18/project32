<?php
require('../connection/connection.php');
if(($_POST['query']) != '')
{
 $search_text = implode(",",$_POST['query']);
 $query = "SELECT * , a.department_id,b.department_id,b.department_name AS name_depart FROM dimension_department a 
 INNER JOIN department_tb b ON a.department_id = b.department_id
 INNER JOIN main_std c ON a.standard_idtb = c.standard_idtb  WHERE b.department_id IN ($search_text) ";
}
else
{
 $query = "SELECT * , a.department_id,b.department_id,b.department_name AS name_depart FROM dimension_department a 
 INNER JOIN department_tb b ON a.department_id = b.department_id
 INNER JOIN main_std c ON a.standard_idtb = c.standard_idtb";
}

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
   <td>'.$row["name_depart"].'</td>
   <td>'.$row["standard_number"].'</td>
   <td>'.$row["standard_detail"].'</td>
  </tr>
  </table>
  ';
   }
   
echo $output;
exit();
?>