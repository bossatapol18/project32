
<?php
if (isset($_GET['standard_idtb']) && !empty($_GET['standard_idtb'])) {
    $standard_idtb = $_GET['standard_idtb'];
$sql0 = "SELECT * FROM  main_std WHERE standard_idtb = " . $_REQUEST["standard_idtb"];
$query0 = sqlsrv_query($conn, $sql0);
$result = sqlsrv_fetch_array($query0);
    }
    if (isset($_POST) && !empty($_POST)) {
        $standard_status = $_POST['standard_status'];
        // $standard_day = $_POST['standard_day'];
        $sql1 = "UPDATE main_std 
        SET standard_status = ? 
        WHERE standard_idtb = ? ";
        $params1 = array($standard_status);
        if (sqlsrv_query($conn, $sql1, $params1)) {
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("แก้ไขสถานะสำเร็จ !!");';
            $alert .= 'window.location.href = "?page=status";';
            $alert .= '</script>';
            echo $alert;
            exit();
        } else {
            echo "Error: " . $sql1 . "<br>" . sqlsrv_errors($conn);
        }
        sqlsrv_close($conn);
    }

    $sql2 = "SELECT * FROM select_status";
    $query2  = sqlsrv_query($conn , $sql2);
?>
<center>
<form method="post" action="">
<section class="upcoming-meetings" id="meetings">
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
                    <div class="section-title">
                        <h2>สถานะ</h2>
                        <h3>สถานะของเอกสาร <span>มอก.</span></h3>
                    </div>
                </div>
        <div class="container card-regis font">


            <hr>
            <br>
            <div class="">
            <div class="col-md-4">
                                <div class="card mt-4">
                                    <div class="card-body">
                <div>
                <label for="">สถานะ</label>
                <select class="form-control" name="standard_status"  style="height: unset !important;">
                <option selected disabled>เลือกสถานะ</option>
                <?php while ($result2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) { ?>
                <option value="<?php echo $result2['id_statuss'];  ?>"><?php echo $result2['statuss_name'];  ?></option>
                <?php } ?>
                </select>
                    <!-- <label >วันที่ปรับปรุง</label>
                    <input type="text" name="type_name" class="form-control" autocomplete="off"> -->

            <br>
                <div class="bt">
                    <button type="submit" class="btn btn-info bt">ยืนยันสถานะของเอกสาร</button>
                </div>
            </center>
                        </div>
            </div>
</form>
</div>



</section>