<?php

//fetch.php

require 'connection.php' ;

if($_POST["query"] != '')
{
	$search_array = explode(",", $_POST["query"]);
	$search_text = "'" . implode("', '", $search_array) . "'";
	$query = "SELECT DISTINCT x.statuss_name AS name_status1 , a.standard_detail AS standard_detail1 ,
	bb.type_name AS name_type1 , cc.group_name AS name_group1 , dd.department_name AS name_depart1 , e.fileupload AS name_file1 ,
	 a.standard_number AS standard_number1 , a.standard_day AS standard_day1 
	FROM main_std a 
	-- status
	LEFT JOIN select_status x ON a.standard_status = x.id_statuss
	-- type
	LEFT JOIN dimension_type b ON a.standard_idtb = b.standard_idtb 
	LEFT JOIN type_tb bb ON b.type_id = bb.type_id
	-- group
	LEFT JOIN dimension_group c ON a.standard_idtb = c.standard_idtb 
	LEFT JOIN group_tb cc ON c.group_id = cc.group_id
	-- depart
	LEFT JOIN dimension_department d ON a.standard_idtb = d.standard_idtb 
	LEFT JOIN department_tb dd ON d.department_id = dd.department_id
	-- file
	LEFT JOIN dimension_file e ON a.standard_idtb = e.standard_idtb 
	WHERE a.standard_status IN (".$search_text.")   GROUP BY  a.standard_idtb , x.statuss_name ,
      a.standard_detail  , bb.type_name , cc.group_name  , dd.department_name  , a.standard_day , a.standard_number , e.fileupload ,a.standard_day
	";
}
else
{
	$query = "SELECT DISTINCT x.statuss_name AS name_status1 , a.standard_detail AS standard_detail1 ,
	bb.type_name AS name_type1 , cc.group_name AS name_group1 , dd.department_name AS name_depart1 , e.fileupload AS name_file1 ,
	 a.standard_number AS standard_number1 , a.standard_day AS standard_day1 
	FROM main_std a 
	-- status
	LEFT JOIN select_status x ON a.standard_status = x.id_statuss
	-- type
	LEFT JOIN dimension_type b ON a.standard_idtb = b.standard_idtb 
	LEFT JOIN type_tb bb ON b.type_id = bb.type_id
	-- group
	LEFT JOIN dimension_group c ON a.standard_idtb = c.standard_idtb 
	LEFT JOIN group_tb cc ON c.group_id = cc.group_id
	-- depart
	LEFT JOIN dimension_department d ON a.standard_idtb = d.standard_idtb 
	LEFT JOIN department_tb dd ON d.department_id = dd.department_id
	-- file
	LEFT JOIN dimension_file e ON a.standard_idtb = e.standard_idtb   GROUP BY  a.standard_idtb , x.statuss_name ,
      a.standard_detail  , bb.type_name , cc.group_name  , dd.department_name  , a.standard_day , a.standard_number , e.fileupload ,a.standard_day ";
}

$result = sqlsrv_query($conn,$query);
$total_row = sqlsrv_num_rows($result);
$i=1;
$output = '';


	while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
	{
		$output .= '
		<tr>
		<td>'.$i++.'</td>
		<td>'.$row["name_depart1"].'</td>
		<td>'.$row["standard_number1"].'</td>
		<td>'.$row["standard_detail1"].'</td>
		<td>'.$row["name_status1"].'</td>
		<td>'.$row["standard_day1"].'</td>
		</tr>
		';
	}

echo $output;


?>