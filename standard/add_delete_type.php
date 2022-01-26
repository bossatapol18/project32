<?php
if (isset($_GET['id_statuss']) && !empty($_GET['id_statuss'])) {
    $id_statuss = $_GET['id_statuss'];
    $sql = "DELETE FROM select_status WHERE id_statuss = ? ";
    $params = array($id_statuss);
    if (sqlsrv_query($conn, $sql, $params)) {
        // echo "ลบข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("ลบสถานะสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=add_type";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . sqlsrv_errors($conn);
    }
    sqlsrv_close($conn);
}