<?php include('../connection/connection.php'); ?>
<?php 


$id_dimension_department = $_REQUEST["id_dimension_department"];
$sql = "DELETE FROM dimension_department WHERE id_dimension_department=$id_dimension_department";
$query = sqlsrv_query($conn, $sql);

echo "<script>history.go(-1);</script>";
?>