<?php
if (isset($_GET['agency_id']) && !empty($_GET['agency_id'])) {
    $agency_id = $_GET['agency_id'];
    $sql = "SELECT * FROM agency_tb WHERE agency_id = ?";
    $params = array($agency_id);
    $query = sqlsrv_query($conn, $sql, $params);
    $result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
}
if (isset($_POST) && !empty($_POST)) {
    $agency_name = $_POST['agency_name'];
    $sql = "UPDATE agency_tb SET agency_name = ?  WHERE agency_id = ? ";
    $params = array($agency_name, $agency_id);

    if (sqlsrv_query($conn, $sql, $params)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขข้อมูลหน่วยงานสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=add_agency";';
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
                    <h2 class="font-mirt">แก้ไขข้อมูลหน่วยงาน</h2>
                </div>
            </div>

    </div>
    <form action="" method="post" enctype=multipart/form-data>
        <div class="container  tab-content font">
            <div id="home" class="container-fluid tab-pane active m-2">
                <div class="mb-3">
                    <label class="form-label">ชื่อหน่วยงาน</label>
                    <input type="text" class="form-control" value="<?= $result['agency_name'] ?>" name="agency_name" placeholder="ชื่อหน่วยงาน :" required autocomplete="off">
                </div>
                <button type="submit" class="btn btn-primary">บันทึก</button>
    </form>
    </div>
    </div>