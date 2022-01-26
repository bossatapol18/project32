<?php
if (isset($_GET['department_id']) && !empty($_GET['department_id'])) {
    $department_id = $_GET['department_id'];
    $sql = "DELETE FROM department_tb WHERE department_id = ? ";
    $params = array($department_id);
    if (sqlsrv_query($conn, $sql, $params)) {
        // echo "ลบข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("ลบหน่วยงานที่ขอสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=add_department";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . sqlsrv_errors($conn);
    }
    sqlsrv_close($conn);
}
