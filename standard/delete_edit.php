<?php include('../connection/connection.php'); ?>
<?php 


$id_dimension_group = $_REQUEST["id_dimension_group"];
$sql = "DELETE FROM dimension_group WHERE id_dimension_group=$id_dimension_group";
$query = sqlsrv_query($conn, $sql);

echo "<script>history.go(-1);</script>";
?>