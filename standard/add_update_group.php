<?php
if (isset($_GET['group_id']) && !empty($_GET['group_id'])) {
    $group_id = $_GET['group_id'];
    $sql = "SELECT * FROM group_tb WHERE group_id = ?";
    $params = array($group_id);
    $query = sqlsrv_query($conn, $sql, $params);
    $result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
}
if (isset($_POST) && !empty($_POST)) {
    $group_name = $_POST['group_name'];
    $sql = "UPDATE group_tb SET group_name= ?  WHERE group_id = ? ";
    $params = array($group_name, $group_id);

    if (sqlsrv_query($conn, $sql, $params)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขข้อมูลกลุ่มสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=add_group";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . sqlsrv_errors($conn);
    }
    sqlsrv_close($conn);
}
?>
<section class="upcoming-meetings" id="meetings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="font-mirt">แก้ไขกลุ่มผลิตภัณฑ์</h2>
                </div>
            </div>

    </div>
    <form action="" method="post" enctype=multipart/form-data>
        <div class="container  tab-content font">
            <div id="home" class="container-fluid tab-pane active m-2">
                <div class="mb-3">
                    <label class="form-label">ชื่อกลุ่ม</label>
                    <input type="text" class="form-control" value="<?= $result['group_name'] ?>" name="group_name" placeholder="ชื่อกลุ่ม :" required autocomplete="off">
                </div>
                <button type="submit" class="btn btn-primary">บันทึก</button>
    </form>
    </div>
    </div>