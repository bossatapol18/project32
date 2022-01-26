<?php
if (isset($_GET['department_id']) && !empty($_GET['department_id'])) {
    $department_id = $_GET['department_id'];
    $sql = "SELECT * FROM department_tb WHERE department_id = ?";
    $params = array($department_id);
    $query = sqlsrv_query($conn, $sql, $params);
    $result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
}
if (isset($_POST) && !empty($_POST)) {
    $department_name = $_POST['department_name'];
    $sql = "UPDATE department_tb SET department_name= ?  WHERE department_id = ? ";
    $params = array($department_name, $department_id);

    if (sqlsrv_query($conn, $sql, $params)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขหน่วยงานที่ขอสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=add_department";';
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
                    <h2 class="font-mirt">แก้ไขหน่วยงานที่ขอ</h2>
                </div>
            </div>

    </div>
    <form action="" method="post" enctype=multipart/form-data>
        <div class="container  tab-content font">
            <div id="home" class="container-fluid tab-pane active m-2">
                <div class="mb-3">
                    <label class="form-label">ชื่อกลุ่ม</label>
                    <input type="text" class="form-control" value="<?= $result['department_name'] ?>" name="department_name" placeholder="ชื่อกลุ่ม :" required autocomplete="off">
                </div>
                <button type="submit" class="btn btn-primary">บันทึก</button>
    </form>
    </div>
    </div>