<?php include('./pdf.php'); ?>
<?php
require('../connection/connection.php');
if(($_POST['query']) != '')
{
 $search_text = implode(",",$_POST['query']);
 $query = "SELECT * , a.standard_idtb,b.statuss_name AS name_status FROM main_std a 
 INNER JOIN select_status b ON a.standard_status = b.id_statuss WHERE standard_status IN ($search_text) ";
}
else
{
 $query = "SELECT * , a.standard_idtb,b.statuss_name AS name_status FROM main_std a 
 INNER JOIN select_status b ON a.standard_status = b.id_statuss ";
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
   <td>'.$row["name_status"].'</td>
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
