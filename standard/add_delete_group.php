<?php
if (isset($_GET['group_id']) && !empty($_GET['group_id'])) {
    $group_id = $_GET['group_id'];
    $sql = "DELETE FROM group_tb WHERE group_id = ? ";
    $params = array($group_id);
    if (sqlsrv_query($conn, $sql, $params)) {
        // echo "ลบข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("ลบกลุ่มสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=add_group";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . sqlsrv_errors($conn);
    }
    sqlsrv_close($conn);
}
