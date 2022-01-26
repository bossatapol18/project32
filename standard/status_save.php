<?php
$sql = "UPDATE standard_tb SET standard_meet = ?,standard_number = ?,standard_detail = ? ,standard_mandatory = ? ,standard_tacking = ?
,standard_note = ?  WHERE standard_id = ?" ;
$ss = array($_REQUEST["standard_meet"],$_REQUEST["standard_number"],$_REQUEST["standard_detail"],$_REQUEST["standard_mandatory"],$_REQUEST["standard_tacking"],$_REQUEST["standard_note"],$_REQUEST["standard_id"]);
$query = sqlsrv_query($conn, $sql, $ss);
// ลองทำตามโอมสอนมา ยังบันทึกไม่ได้ ดึงข้อมูลมาโชว์บางอันได้อย่างเดียว
if ($query == false) {
    print_r(sqlsrv_errors());
}else{
    echo "OK";
}
