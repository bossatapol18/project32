<?php
$department_id = (isset($_GET['department_id'])) ? $_GET['department_id'] : '';
$department_name = (isset($_GET['department_name'])) ? $_GET['department_name'] : '';
if (isset($_POST) && !empty($_POST)) {
    $department_id = $_POST['department_id'];
    $department_name = $_POST['department_name'];
    $sql = "INSERT INTO department_tb VALUES (?,?) ";
    $params = array( $department_id,$department_name);
    if (sqlsrv_query($conn, $sql, $params)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("เพิ่มหน่วยงานสำเร็จ !!");';
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
<form method="post" action="">
<section class="upcoming-meetings" id="meetings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="font-mirt">เพิ่มหน่วยงานที่ขอ</h2>
                </div>
            </div>
        <div class="container card-regis font">


            <hr>
            <br>
            <div class="">
                <div>
                    <label>หมายเลขหน่วยงานที่ขอ</label>
                    <input  type="text" name="department_id" class="form-control" autocomplete="off">
                    <label >ชื่อหน่วยงานที่ขอ</label>
                    <input type="text" name="department_name" class="form-control" autocomplete="off">
                </div>
            </div>
            <hr>
            <center>
                <div class="bt">
                    <button type="submit" class="btn btn-info bt">เพิ่มข้อมูล</button>
                </div>
            </center>
</form>
</div>



</section>