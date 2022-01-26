<?php include('../connection/connection.php'); ?>
<?php 


$id_dimension_agency = $_REQUEST["id_dimension_agency"];
$sql = "DELETE FROM dimension_agency WHERE id_dimension_agency=$id_dimension_agency";
$query = sqlsrv_query($conn, $sql);

echo "<script>history.go(-1);</script>";
?>