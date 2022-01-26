
<?php

function datetodb($date)
//    23/04/2564
{
    $day = substr($date, 0, 2); // substrตัดข้อความที่เป็นสติง
    $month = substr($date, 3, 2); //ตัดตำแหน่ง
    $year = substr($date, 6) - 543;
    $dateme = $year . '-' . $month . '-' . $day;
    return $dateme; //return ส่งค่ากลับไป
}

if (isset($_GET['standard_idtb']) && !empty($_GET['standard_idtb'])) {
    $standard_idtb = $_GET['standard_idtb'];
    $sql = "SELECT *  , a.standard_idtb,a.standard_status,b.statuss_name AS name_status 
 FROM  main_std a INNER JOIN select_status b ON a.standard_status = b.id_statuss WHERE standard_idtb = " . $_REQUEST["standard_idtb"];
    $query = sqlsrv_query($conn, $sql);
    $result = sqlsrv_fetch_array($query);
}




if (isset($_POST) && !empty($_POST)) {

    $standard_number = $_POST['standard_number'];
    $standard_meet = $_POST['standard_meet'];
    $standard_detail = $_POST['standard_detail'];
    $standard_mandatory = $_POST['standard_mandatory'];
    $standard_tacking = $_POST['standard_tacking'];
    $standard_note = $_POST['standard_note'];
    $standard_status = $_POST['standard_status'];
    $standard_day = datetodb( $_POST['standard_day']);

    $sql = "UPDATE main_std 
        SET standard_number= '$standard_number' ,
            standard_meet = '$standard_meet' , 
            standard_detail = '$standard_detail' ,
            standard_mandatory = '$standard_mandatory' ,
            standard_tacking = '$standard_tacking' ,
            standard_note = '$standard_note',
            standard_status ='$standard_status' ,
            standard_day = '$standard_day'
         WHERE standard_idtb = '$standard_idtb' ";

    //ไฟล์
    $count_file = count($_REQUEST['id_dimension_file']);
    print_r($_FILES['fileupload']);
    print_r($_REQUEST['id_dimension_file']);
    for ($i = 0; $i < $count_file; $i++) {
        $id_dimension_file = $_REQUEST['id_dimension_file'][$i];
        $fileupload = $_FILES['fileupload']['name'][$i];
        if ($id_dimension_file != '' && $fileupload != '') {
            date_default_timezone_set("Asia/Bangkok");
            $date = date("Y-m-d");
            //เพิ่มไฟล์
            $upload = $_FILES['fileupload'];
            // print_r($upload);
            $count_upload = count($upload['name']);

            for ($i = 0; $i < $count_upload; $i++) {
                $file_name = $upload['name'][$i];
                $file_type = $upload['type'][$i];
                $file_tmp_name = $upload['tmp_name'][$i];
                $file_error = $upload['error'][$i];
                $file_size = $upload['size'][$i];

                // echo "<br> $i . $file_name ";

                if ($file_name != "") {   //not select file
                    //โฟลเดอร์ที่จะ upload file เข้าไป 
                    $path = "fileupload/";

                    $numrand        = (mt_rand()); //สุ่มตัวเลข
                    //$path           = "userfile/"; //กำหนดpath ใหม่
                    $type           = strrchr($file_name, "."); //ดึงเฉพาะนามสกุลไฟล์
                    $newname        = $date .  $numrand . $type; //ตั้งชื่อใหม่เรียงวันที่ ตัวเลขที่สุม และนามสกุลไฟล์
                    $path_copy      = $path . $newname; //กำหนดpath
                    //$path_link      = "/fileupload/" . $newname; //กำหนดlink
                    echo $file_name;
                    // copy($fltem, $path_copy
                    copy($file_tmp_name, $path_copy); //คัดลอกไwล์

                    $sql_update_file = "UPDATE dimension_file SET fileupload = '$newname' WHERE id_dimension_file = '$id_dimension_file'";
                    $show_file = sqlsrv_query($conn, $sql_update_file);
                }
            }
        } elseif ($id_dimension_file == '' && $fileupload != '') {
            date_default_timezone_set("Asia/Bangkok");
            $date = date("Y-m-d");
            //เพิ่มไฟล์
            $upload = $_FILES['fileupload'];
            // print_r($upload);
            $count_upload = count($upload['name']);

            for ($i = 0; $i < $count_upload; $i++) {
                $file_name = $upload['name'][$i];
                $file_type = $upload['type'][$i];
                $file_tmp_name = $upload['tmp_name'][$i];
                $file_error = $upload['error'][$i];
                $file_size = $upload['size'][$i];

                // echo "<br> $i . $file_name ";

                if ($file_name != "") {   //not select file
                    //โฟลเดอร์ที่จะ upload file เข้าไป 
                    $path = "fileupload/";

                    $numrand        = (mt_rand()); //สุ่มตัวเลข
                    //$path           = "userfile/"; //กำหนดpath ใหม่
                    $type           = strrchr($file_name, "."); //ดึงเฉพาะนามสกุลไฟล์
                    $newname        = $date .  $numrand . $type; //ตั้งชื่อใหม่เรียงวันที่ ตัวเลขที่สุม และนามสกุลไฟล์
                    $path_copy      = $path . $newname; //กำหนดpath
                    //$path_link      = "/fileupload/" . $newname; //กำหนดlink
                    echo $file_name;
                    // copy($fltem, $path_copy
                    copy($file_tmp_name, $path_copy); //คัดลอกไwล์

                    $sql_insert_file = "INSERT INTO dimension_file (fileupload , standard_idtb , upload_date) 
                    VALUES ( '$newname' , '$standard_idtb' , '$date')";
                    $insert_file = sqlsrv_query($conn, $sql_insert_file);
                }
            }
        }
    }

    //กลุ่มผลิตภัณฑ์
    $count_group = count($_REQUEST['id_dimension_group']);

    for ($i = 0; $i < $count_group; $i++) {
        $id_dimension_group = $_REQUEST['id_dimension_group'][$i];
        $group_id = $_REQUEST['group_id'][$i];
        if ($id_dimension_group != '' && $group_id != '') {
            $sql_update_group = " UPDATE dimension_group SET group_id = '$group_id' WHERE id_dimension_group = '$id_dimension_group'";
            $show_group = sqlsrv_query($conn, $sql_update_group);
        } elseif ($id_dimension_group == '' && $group_id != '') {
            $sql_insert_group = "INSERT INTO dimension_group (standard_idtb,group_id) VALUES (?,?);";
            $value_group = array($standard_idtb, $group_id);
            $insert_group = sqlsrv_query($conn, $sql_insert_group, $value_group);
        }
    }

    //หน่วยงานที่สามารถทดสอบได้
    $count_agency = count($_REQUEST['id_dimension_agency']);

    for ($i = 0; $i < $count_agency; $i++) {
        $id_dimension_agency = $_REQUEST['id_dimension_agency'][$i];
        $agency_id = $_REQUEST['agency_id'][$i];
        if ($id_dimension_agency != '' && $agency_id != '') {
            $sql_update_agency = " UPDATE dimension_agency SET agency_id = '$agency_id' WHERE id_dimension_agency = '$id_dimension_agency'";
            $show_agency = sqlsrv_query($conn, $sql_update_agency);
        } elseif ($id_dimension_agency == '' && $agency_id != '') {
            $sql_insert_agency = "INSERT INTO dimension_agency (standard_idtb,agency_id) VALUES (?,?);";
            $value_agency = array($standard_idtb, $agency_id);
            $insert_agency = sqlsrv_query($conn, $sql_insert_agency, $value_agency);
        }
    }

    //หน่วยงานที่ขอ
    $count_department = count($_REQUEST['id_dimension_department']);

    $count_department_id = count($_REQUEST['department_id']);

    for ($i = 0; $i < $count_department; $i++) {
        $id_dimension_department = $_REQUEST['id_dimension_department'][$i];
        $department_id = $_REQUEST['department_id'][$i];
        if ($id_dimension_department != '' && $department_id != '') {
            $sql_update_department = " UPDATE dimension_department SET department_id = '$department_id' WHERE id_dimension_department = '$id_dimension_department'";
            $show_department = sqlsrv_query($conn, $sql_update_department);
        }
        if ($id_dimension_department == '' && $department_id != '') {
            $sql_insert_department = "INSERT INTO dimension_department (standard_idtb,department_id) VALUES (?,?);";
            $value_department = array($standard_idtb, $department_id);
            $insert_department = sqlsrv_query($conn, $sql_insert_department, $value_department);
        }
    }

    //ประเภทผลิตภัณฑ์
    $count_type = count($_REQUEST['id_dimension_type']);

    for ($i = 0; $i < $count_type; $i++) {
        $id_dimension_type = $_REQUEST['id_dimension_type'][$i];
        $type_id = $_REQUEST['type_id'][$i];
        if ($id_dimension_type != '' && $type_id != '') {
            $sql_update_type = " UPDATE dimension_type SET type_id = '$type_id' WHERE id_dimension_type = '$id_dimension_type'";
            $show_type = sqlsrv_query($conn, $sql_update_type);
        }
        if ($id_dimension_type == '' && $type_id != '') {
            $sql_insert_type = "INSERT INTO dimension_type (standard_idtb,type_id) VALUES (?,?);";
            $value_type = array($standard_idtb, $type_id);
            $insert_type = sqlsrv_query($conn, $sql_insert_type, $value_type);
        }
    }

     if (sqlsrv_query($conn, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขสถานะสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=status";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . sqlsrv_errors($conn);
    }

    sqlsrv_close($conn);
}
