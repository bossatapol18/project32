<?php include('../connection/connection.php'); ?>
<?php 


$id_dimension_type = $_REQUEST["id_dimension_type"];
$sql = "DELETE FROM dimension_type WHERE id_dimension_type=$id_dimension_type";
$query = sqlsrv_query($conn, $sql);

echo "<script>history.go(-1);</script>";
?>