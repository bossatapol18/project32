<?php
if (isset($_GET['agency_id']) && !empty($_GET['agency_id'])) {
    $agency_id = $_GET['agency_id'];
    $sql = "DELETE FROM agency_tb WHERE agency_id = ? ";
    $params = array($agency_id);
    if (sqlsrv_query($conn, $sql, $params)) {
        // echo "ลบข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("ลบหน่วยงานสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=add_agency";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . sqlsrv_errors($conn);
    }
    sqlsrv_close($conn);
}
