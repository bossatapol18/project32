<?php
require_once "../connection/connection.php";
if (isset($_GET['term'])) {
  $agency_name = $_GET['agency_name'];
$sql2 = "SELECT * FROM agency_tb  WHERE agency_name LIKE '{$_GET['term']}%' LIMIT 25 ";
$query2 = sqlsrv_query($conn, $sql2);
if (sqlsrv_num_rows($query2) > 0) {
     while ($user = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) {
      $res[] = $user['agency_name'];
     }
    } else {
      $res = array();
    }
    //return json res
    echo json_encode($res);
}
?>