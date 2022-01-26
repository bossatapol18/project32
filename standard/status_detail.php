<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';

if (isset($_GET['standard_idtb']) && !empty($_GET['standard_idtb'])) {
    $standard_idtb = $_GET['standard_idtb'];
    $sql = "SELECT * , a.standard_idtb,a.standard_status,b.statuss_name AS name_status 
     FROM main_std a INNER JOIN select_status b ON a.standard_status = b.id_statuss WHERE standard_idtb = '$standard_idtb' ";
    $query = sqlsrv_query($conn, $sql);
    $result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
}


$sql2 = "SELECT * FROM select_status";
$query2 = sqlsrv_query($conn, $sql2);
$sql3 = "SELECT * FROM type_tb";
$query3 = sqlsrv_query($conn, $sql3);

?>
<section class="about section-bg">
    <form action="" method="post" enctype=multipart/form-data style="font-size:18px;" >
        <div class="container-sm">
            <div class="col-lg-12">
                <h5 align="left" class="text-success">สถานะของเอกสารปัจจุบัน : <?php echo $result['name_status']; ?>
                </h5>
                <div class="section-title">
                    <div align="right">
                        <a href="?page=<?= $_GET['page'] ?>&function=update&standard_idtb=<?= $result['standard_idtb'] ?>"
                            class="btn btn-sm btn-warning text-white" style="font-size:20px;">แก้ไขข้อมูลสถานะ</a>
                            <a href="?page=<?= $_GET['page'] ?>&function=print&standard_idtb=<?= $result['standard_idtb'] ?>"
                            onclick="return confirm('คุณต้องการพิมพ์เอกสารนี้ : <?= $result['standard_number'] ?> หรือไม่ ??')"
                            class="btn btn-sm btn-success text-white" style="font-size:20px;">พิมพ์รายงาน</a>
                        <a href="?page=delete&standard_idtb=<?= $result['standard_idtb'] ?>"
                            onclick="return confirm('คุณต้องการลบเอกสารนี้ : <?= $result['standard_number'] ?> หรือไม่ ??')"
                            class="btn btn-sm btn-danger"style="font-size:20px;">ลบเอกสาร</a>
                        <a class="btn btn-sm text-white" style="background-color:black; font-size:20px;"
                            onclick="window.history.go(-1); return false;">ย้อนกลับ</a>
                    </div>
                    <h2 class="font-mirt">เอกสารทั้งหมด</h2>
                    <h4 class="font-mirt">หมายเลขเอกสาร : <?php echo $result['standard_idtb'] ?></h4>
                </div>
            </div>
            <div class="section-title">
                <h5 align="right">วันที่แต่งตั้ง : <?php echo dateThai($result['standard_day']); ?></h5>
            </div>
            <!-- <div class="row text-center">
                <div class="col-lg-6 col-md-6 align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <h4 class="font-mirt">วาระจากในที่ประชุมสมอ : <?php echo $result['standard_meet'] ?></h4>
                </div>
                <div class="col-lg-6 col-md-6 align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <h4 clas    s="font-mirt">เลขที่มอก : <?php echo $result['standard_number'] ?></h4>
                </div>
            </div> -->
            <hr>
            <div class="row">
                <!--ซ้าย-->
                <div class="col-sm-6">
                    <div class="card   mb-3" style="max-width:100%">
                        <div class="card-header text-white bg-primary">เลขที่มอก</div>
                        <div class="card-body">
                            <p class="card-text"><?php echo $result['standard_number']; ?> </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card   mb-3" style="max-width:100%">
                        <div class="card-header text-white bg-primary">ที่มาวาระจากในที่ประชุมสมอ.</div>
                        <div class="card-body">
                            <p class="card-text">วันที่ ...<br>วาระที่ ... </p>
                        </div>
                    </div>
                </div>

                <!--ซ้าย-->
                <div class="col-sm-6">
                    <div class="card   mb-3" style="max-width:100%">
                        <div class="card-header text-white bg-primary">ชื่อมาตรฐาน</div>
                        <div class="card-body">
                            <p class="card-text"><?php echo $result['standard_detail']; ?> </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card  mb-3" style="max-width: 100%">
                        <div class="card-header text-white bg-primary ">จดหมายสอบถามจาก สมอ.</div>
                        <div class="card-body">
                            <p class="card-text">วันที่ ... </p>
                        </div>
                    </div>
                </div>

                <!--ซ้าย-->
                <div class="col-sm-6">
                    <div class="card   mb-3" style="max-width:100%">
                        <div class="card-header text-white bg-primary">กลุ่มผลิตภัณฑ์</div>
                        <?php
                        $standarsidtb = $_REQUEST['standard_idtb'];
                        $sql = "SELECT * FROM dimension_group WHERE standard_idtb  = '$standarsidtb' ";
                        $query1 = sqlsrv_query($conn, $sql);
                        while ($result = sqlsrv_fetch_array($query1, SQLSRV_FETCH_ASSOC)) { ?>
                        <?php $group =  $result['group_id']; ?>
                        <select class="form-control" name="group_id[]" id="group_id" style="height: unset !important;"
                            disabled>
                            <option value="">กรุณาเลือกกลุ่มผลิตภัณฑ์</option>
                            <?php
                                $sql2 = "SELECT * FROM group_tb";
                                $query2 = sqlsrv_query($conn, $sql2);
                                while ($result2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) {
                                    $group2 =  $result2['group_id'];
                                    if ($group == $group2) {
                                        $c = "selected";
                                    } else {
                                        $c = "";
                                    }
                                ?>

                            <option value="<?php echo $result2['group_id'];  ?>" <?php echo $c; ?>>
                                <?php echo $result2['group_name']; ?></option>
                            <?php } ?>
                        </select>
                        <?php } ?>

                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card   mb-3" style="max-width:100%">
                        <div class="card-header text-white bg-primary">หน่วยงานที่ขอ</div>
                        <?php
                        $standarsidtb = $_REQUEST['standard_idtb'];
                        $sql3 = "SELECT * FROM dimension_department WHERE standard_idtb  = '$standarsidtb' ";
                        $query3 = sqlsrv_query($conn, $sql3);
                        while ($result3 = sqlsrv_fetch_array($query3, SQLSRV_FETCH_ASSOC)) { ?>
                        <?php $department =  $result3['department_id']; ?>
                        <select class="form-control" name="department_id[]" id="department_id"
                            style="height: unset !important;" disabled>
                            <option value="">กรุณาเลือกหน่วยงานที่ขอ</option>
                            <?php
                                $sql33 = "SELECT * FROM department_tb";
                                $query33 = sqlsrv_query($conn, $sql33);
                                while ($result33 = sqlsrv_fetch_array($query33, SQLSRV_FETCH_ASSOC)) {
                                    $department2 =  $result33['department_id'];
                                    if ($department == $department2) {
                                        $c = "selected";
                                    } else {
                                        $c = "";
                                    }
                                ?>

                            <option value="<?php echo $result33['department_id'];  ?>" <?php echo $c; ?>>
                                <?php echo $result33['department_name']; ?></option>
                            <?php } ?>
                        </select>
                        <?php } ?>
                    </div>
                </div>



                <!--ซ้าย-->
               <div class="col-sm-6">
                    <div class="card   mb-3" style="max-width:100%">
                        <div class="card-header text-white bg-primary">ไฟล์แนบ</div>
                        <div class="main-form1 mt-3 " id="main5">
                            <div class="row" id="sub_main5">

                                <div class="col-md-8">
                                    <div class="form-group mb-2 input-group">
                                        <?php 
                                        $i=1;
                                                        $standarsidtb = $_REQUEST['standard_idtb'];
                                                        $sql5 = "SELECT * FROM dimension_file WHERE standard_idtb  = '$standarsidtb' ";
                                                        $query5 = sqlsrv_query($conn,$sql5);
                                                        while ($result5 = sqlsrv_fetch_array($query5, SQLSRV_FETCH_ASSOC)) { ?>
                                        <a href='./fileupload/<?=$result5['fileupload'] ;?>'>
                                        <?php echo $i++ . ")" .$result5['fileupload'] ; ?>
                                        <br>
                                        </a>
                                        <?php } ?>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card   mb-3" style="max-width:100%">
                        <div class="card-header text-white bg-primary">สถานะล่าสุด</div>
                        <div class="card-body">
                            <p class="card-text"><?php echo $result['name_status']; ?> </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card   mb-3" style="max-width:100%">
                        <div class="card-header text-white bg-primary">หมายเหตุ</div>
                        <div class="card-body">
                            <p class="card-text"><?php echo $result['standard_note']; ?> </p>
                        </div>
                    </div>
                </div>                                             


                <!-- หลายฟอร์ม -->
                <div class="col-sm-6">
                    <div class="card   mb-3" style="max-width:100%">
                        <div class="card-header text-white bg-primary">หน่วยงานคู่แข่ง</div>
                        <?php
                        $standarsidtb = $_REQUEST['standard_idtb'];
                        $sql2 = "SELECT * FROM dimension_agency WHERE standard_idtb  = '$standarsidtb' ";
                        $query2 = sqlsrv_query($conn, $sql2);
                        while ($result2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) { ?>
                        <?php $agency =  $result2['agency_id']; ?>
                        <select class="form-control" name="agency_id[]" id="agency_id" style="height: unset !important;"
                            disabled>
                            <option value="">กรุณาเลือกหน่วยงานที่ทดสอบ</option>
                            <?php
                                $sql22 = "SELECT * FROM agency_tb";
                                $query22 = sqlsrv_query($conn, $sql22);
                                while ($result22 = sqlsrv_fetch_array($query22, SQLSRV_FETCH_ASSOC)) {
                                    $agency2 =  $result22['agency_id'];
                                    if ($agency == $agency2) {
                                        $c = "selected";
                                    } else {
                                        $c = "";
                                    }
                                ?>

                            <option value="<?php echo $result22['agency_id'];  ?>" <?php echo $c; ?>>
                                <?php echo $result22['agency_name']; ?></option>
                            <?php } ?>
                        </select>
                        <?php } ?>
                    </div>
                </div>


                <!-- หลายฟอร์ม -->
               

                           

                <!-- <div class="col-sm-6">
                    <div class="card   mb-3" style="max-width:100%">
                        <div class="card-header text-white bg-primary">ประเภทผลิตภัณฑ์</div>
                        <?php
                        $standarsidtb = $_REQUEST['standard_idtb'];
                        $sql4 = "SELECT * FROM dimension_type WHERE standard_idtb  = '$standarsidtb' ";
                        $query4 = sqlsrv_query($conn, $sql4);
                        while ($result4 = sqlsrv_fetch_array($query4, SQLSRV_FETCH_ASSOC)) { ?>
                        <?php $type =  $result4['type_id']; ?>
                        <select class="form-control" name="type_id[]" id="type_id" style="height: unset !important;"
                            disabled>
                            <option value="">กรุณาเลือกประเภทผลิตภัณฑ์</option>
                            <?php
                                $sql44 = "SELECT * FROM type_tb";
                                $query44 = sqlsrv_query($conn, $sql44);
                                while ($result44 = sqlsrv_fetch_array($query44, SQLSRV_FETCH_ASSOC)) {
                                    $type2 =  $result44['type_id'];
                                    if ($type == $type2) {
                                        $c = "selected";
                                    } else {
                                        $c = "";
                                    }
                                ?>

                            <option value="<?php echo $result44['type_id'];  ?>" <?php echo $c; ?>>
                                <?php echo $result44['type_name']; ?></option>
                            <?php } ?>
                        </select>
                        <?php } ?>
                    </div>
                </div> -->


                


            </div>
        </div>
        </div>
        </div>

        <div class="paste-new-forms2"></div>


        </div>
        </div>
        </div>
        </div>

        </div>
        </div>
        </div>

        </div>
        </div>
        </div>
    </form>
</section><!-- End Pricing Section -->