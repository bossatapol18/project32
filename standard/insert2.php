<!doctype html>
<html lang="en">
<?php
$date_today = (date('d/m/Y H:i:s'));
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title></title>
</head>

<body>

    <form action="standard/insert_sql2.php" method="POST" enctype="multipart/form-data">

        <section class="about section-bg">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-lg " style="background-color:#FFD700;" onclick="window.history.go(-1); return false;">ย้อนกลับ</a>
                        <div class="section-title">

                            <h2 class="font-mirt">เพิ่มเอกสารยื่น มอก.</h2>
                            <h3 class="font-mirt">เพิ่มเอกสารยื่น มอก.</h3>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="col-md-12">
                        <div class="card mt-12">
                            <div class="card-body">

                                <div class="col-md-6">
                                    <input type="radio" onclick="hiddenn('1')" name="standard_source" value="1"> จากการประชุม<br /><br>
                                    <lable id="a11">วาระจากที่ประชุม สมอ.</lable>
                                    <input value="" type="text" name="standard_meet" id="a1" class="form-control"> <br>
                                    <lable id="a22">วันที่ประชุม สมอ.</lable>
                                    <input type="text" name="standard_survey" id="a2" class="form-control"> <br>
                                </div>

                                <div class="col-md-6">
                                    <input type="radio" name="standard_source" onclick="hiddenn('2')" value="2"> จดหมายสอบถามจากสมอ.<br /><br>
                                    <lable id="a33">จดหมายสอบถามจากสมอ.</lable>
                                    <input type="text" name="standard_pick" id="a3" class="form-control"> <br>
                                    <lable id="a22">วันที่ประชุม สมอ.</lable>
                                    <input type="text" name="standard_survey" id="a2" class="form-control"> <br>
                                </div>

                               
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="mode" value="insert_data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="">
                                        <div class="form-group mb-2">
                                            <label for="">วาระจากที่ประชุม สมอ. </label>
                                            <input type="text" name="standard_meet" class="form-control" placeholder="เช่น 4.1" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="">
                                        <div class="form-group mb-2 f-red">
                                            <label for="">เลขที่ มอก.*</label>
                                            <input type="text" name="standard_number" class="form-control" placeholder="เช่น มอก. 538-2560" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="">
                                        <div class="form-group mb-2">
                                            <label for="">ชื่อมาตรฐาน</label>
                                            <input type="text" name="standard_detail" class="form-control" placeholder="เช่น ถุงมือยางปราศจากเชื้อ" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="">
                                        <div class="form-group mb-2">
                                            <div class="form-group mb-2">
                                                <label for="">ปรเภทมาตรฐาน </label>
                                                <input type="text" name="standard_mandatory" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- <div class="col-md-4">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="">
                                        <div class="form-group mb-2">
                                            <label for="">หมายเลข tracking</label>
                                            <input type="text" name="standard_tacking" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="col-md-4">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="">
                                        <div class="form-group mb-2">
                                            <label for="">หมายเหตุ</label>
                                            <input type="text" name="standard_note" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- หลายฟอร์ม -->
                        <div class="col-md-4">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="">
                                        <label for="">ไฟล์แนบ</label>
                                        <a href="javascript:void(0)" onclick="add_element('main5','sub_main5');" class=" float-end btn btn-success">เพิ่ม</a>
                                        <div class="main-form1 mt-3 " id="main5">
                                            <input type="file" class="form-control" name="fileupload[]" id="fileupload" style="height: unset !important;">
                                            <div style="display:none;">
                                                <div class="row" id="sub_main5">

                                                    <div class="">
                                                        <div class="form-group mb-2 input-group mt-3">

                                                            <input type="file" class="form-control" name="fileupload[]" id="fileupload" style="height: unset !important;">
                                                            <button type="button" onclick="$(this).parent().remove();" class="remove-btn btn btn-danger ">ลบ</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="">
                                        <label for="">กลุ่มผลิตภัณฑ์</label>
                                        <a href="javascript:void(0)" onclick="add_element('main4','sub_main4');" class=" float-end btn btn-success">เพิ่ม</a>
                                        <div class="main-form1 mt-3 " id="main4">
                                            <select class="form-control" name="group_id[]" id="group_id" style="height: unset !important;">
                                                <option selected disabled>กรุณาเลือกกลุ่มผลิตภัณฑ์</option>
                                                <?php
                                                $sql = "SELECT * FROM group_tb";
                                                $query = sqlsrv_query($conn, $sql);
                                                while ($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $result['group_id'];  ?>">
                                                        <?php echo $result['group_name'];  ?></option>
                                                <?php } ?>
                                            </select>
                                            <div style="display: none;">
                                                <div class="row" id="sub_main4">

                                                    <div class="">
                                                        <div class="form-group mb-2 input-group mt-2">

                                                            <select class="form-control" name="group_id[]" id="group_id" style="height: unset !important;">
                                                                <option selected disabled>กรุณาเลือกกลุ่มผลิตภัณฑ์
                                                                </option>
                                                                <?php
                                                                $sql = "SELECT * FROM group_tb";
                                                                $query = sqlsrv_query($conn, $sql);
                                                                while ($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) { ?>
                                                                    <option value="<?php echo $result['group_id'];  ?>">
                                                                        <?php echo $result['group_name'];  ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <button type="button" onclick="$(this).parent().remove();" class="remove-btn btn btn-danger ">ลบ</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--  -->

                        <!-- หลายฟอร์ม -->
                        <div class="col-md-4">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="">
                                        <label for="">หน่วยงานคู่แข่ง</label>
                                        <a href="javascript:void(0)" onclick="add_element('main1','sub_main1');" class=" float-end btn btn-success">เพิ่ม</a>
                                        <div class="main-form1 mt-3 " id="main1">
                                            <select class="form-control" name="agency_id[]" id="agency_id" style="height: unset !important;">
                                                <option selected disabled>
                                                    กรุณาเลือกหน่วยงานคู่แข่ง</option>
                                                <?php
                                                $sql2 = "SELECT * FROM agency_tb";
                                                $query2 = sqlsrv_query($conn, $sql2);
                                                while ($result = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $result['agency_id'];  ?>">
                                                        <?php echo $result['agency_name'];  ?></option>
                                                <?php } ?>
                                            </select>
                                            <div style="display: none;">
                                                <div class="row" id="sub_main1">
                                                    <div class="">
                                                        <div class="form-group mb-2 input-group mt-2">

                                                            <select class="form-control" name="agency_id[]" id="agency_id" style="height: unset !important;">
                                                                <option selected disabled>
                                                                    กรุณาเลือกหน่วยงานคู่แข่ง</option>
                                                                <?php
                                                                $sql2 = "SELECT * FROM agency_tb";
                                                                $query2 = sqlsrv_query($conn, $sql2);
                                                                while ($result = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) { ?>
                                                                    <option value="<?php echo $result['agency_id'];  ?>">
                                                                        <?php echo $result['agency_name'];  ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <button type="button" onclick="$(this).parent().remove();" class="remove-btn btn btn-danger ">ลบ</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- <div class="paste-new-forms1"></div> -->
                        <!--  -->

                        <!-- หลายฟอร์ม
                        <div class="col-md-6">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="">
                                        <label for="">ประเภทผลิตภัณฑ์</label>
                                        <a href="javascript:void(0)" onclick="add_element('main2','sub_main2');"
                                            class="float-end btn btn-success">เพิ่ม</a>
                                        <div class="main-form2 mt-3" id="main2">
                                            <select class="form-control" name="type_id[]" id="type_id"
                                                style="height: unset !important;">
                                                <option selected disabled>กรุณาเลือกประเภทผลิตภัณฑ์</option>
                                                <?php
                                                $sql3 = "SELECT * FROM type_tb";
                                                $query3 = sqlsrv_query($conn, $sql3);
                                                while ($result = sqlsrv_fetch_array($query3, SQLSRV_FETCH_ASSOC)) { ?>
                                                <option value="<?php echo $result['type_id'];  ?>">
                                                    <?php echo $result['type_name'];  ?></option>
                                                <?php } ?>
                                            </select>
                                            <div style="display: none;">
                                                <div class="row" id="sub_main2">
                                                    <div class="">
                                                        <div class="form-group mb-2 input-group mt-2">

                                                            <select class="form-control" name="type_id[]" id="type_id"
                                                                style="height: unset !important;">
                                                                <option selected disabled>กรุณาเลือกประเภทผลิตภัณฑ์
                                                                </option>
                                                                <?php
                                                                $sql3 = "SELECT * FROM type_tb";
                                                                $query3 = sqlsrv_query($conn, $sql3);
                                                                while ($result = sqlsrv_fetch_array($query3, SQLSRV_FETCH_ASSOC)) { ?>
                                                                <option value="<?php echo $result['type_id'];  ?>">
                                                                    <?php echo $result['type_name'];  ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <button type="button" onclick="$(this).parent().remove();"
                                                                class="remove-btn btn btn-danger ">ลบ</button>
                                                        </div>  

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div> -->

                        <div class="col-md-4">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="">
                                        <label for="">หน่วยงานที่ขอ</label>
                                        <a href="javascript:void(0)" onclick="add_element('main3','sub_main3');" class="float-end btn btn-success">เพิ่ม</a>
                                        <div class="main-form2 mt-3 border-bottom" id="main3">
                                            <select class="form-control" name="department_id[]" id="department_id" style="height: unset !important;">
                                                <option selected disabled>กรุณาเลือกหน่วยงานที่ขอ</option>
                                                <?php
                                                $sql3 = "SELECT * FROM department_tb";
                                                $query3 = sqlsrv_query($conn, $sql3);
                                                while ($result = sqlsrv_fetch_array($query3, SQLSRV_FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $result['department_id'];  ?>">
                                                        <?php echo $result['department_name'];  ?></option>
                                                <?php } ?>
                                            </select>
                                            <div style="display: none;">
                                                <div class="row" id="sub_main3">
                                                    <div class="">
                                                        <div class="form-group mb-2 input-group mt-2">

                                                            <select class="form-control" name="department_id[]" id="department_id" style="height: unset !important;">
                                                                <option selected disabled>กรุณาเลือกหน่วยงานที่ขอ
                                                                </option>
                                                                <?php
                                                                $sql3 = "SELECT * FROM department_tb";
                                                                $query3 = sqlsrv_query($conn, $sql3);
                                                                while ($result = sqlsrv_fetch_array($query3, SQLSRV_FETCH_ASSOC)) { ?>
                                                                    <option value="<?php echo $result['department_id'];  ?>">
                                                                        <?php echo $result['department_name'];  ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <button type="button" onclick="$(this).parent().remove();" class="remove-btn btn btn-danger">ลบ</button>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- <div class="paste-new-forms2"></div> -->
                        <center>
                            <!--  -->
                            <button type="submit" class="btn btn-primary mt-3">
                                <h5 class="font-mirt">บันทึกข้อมูล</h5>
                            </button>
                        </center>
    </form>

    </div>
    </div>
    </div>
    </div>
    </div>
    </section>

</body>

</html>