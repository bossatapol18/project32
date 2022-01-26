<?php
$id_statuss = (isset($_GET['id_statuss'])) ? $_GET['id_statuss'] : '';
$statuss_name = (isset($_GET['statuss_name'])) ? $_GET['statuss_name'] : '';
if (isset($_POST) && !empty($_POST)) {
    $id_statuss = $_POST['id_statuss'];
    $statuss_name = $_POST['statuss_name'];
    $sql = "INSERT INTO select_status VALUES (?,?) ";
    $params = array($id_statuss , $statuss_name);
    $sss = sqlsrv_query($conn, $sql, $params);
    if ($sss = true) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("เพิ่มข้อมูลสถานะสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=add_type";';
    
        $alert .= '</script>';
        echo $alert;
        exit();;
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
                    <h2 class="font-mirt">เพิ่มข้อมูลสถานะ</h2>
                </div>
            </div>
        <div class="container card-regis font">


            <hr>
            <br>
            <div class="">
                <div>
                    <label>หมายเลขสถานะ</label>
                    <input  type="text" name="id_statuss" class="form-control" autocomplete="off">
                    <label >ชื่อสถานะ</label>
                    <input type="text" name="statuss_name" class="form-control" autocomplete="off">
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