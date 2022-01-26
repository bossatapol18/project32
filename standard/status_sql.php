<?php
if (isset($_POST) && !empty($_POST)) {
    $standard_name = $_POST['standard_name'];
    $standard_number = $_POST['standard_number'];
    $standard_meet = $_POST['standard_meet'];
    $standard_detail = $_POST['standard_detail'];
    $standard_mandatory = $_POST['standard_mandatory'];
    $standard_tacking = $_POST['standard_tacking'];
    $standard_note = $_POST['standard_note'];
}
$sql = "SELECT *  FROM standard_tb";
$query = sqlsrv_query($conn, $sql);
?>



