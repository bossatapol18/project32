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
?>

<?php
require '../connection/connection.php';
$mode = $_REQUEST["mode"];
// echo '<pre>';
// print_r($_REQUEST);
// exit();

if ($mode == "insert_data") {
    $standard_meet = $_REQUEST["standard_meet"]; 
    $standard_number = $_REQUEST["standard_number"];
    $standard_detail = $_REQUEST["standard_detail"];
    // วันที่ประชุม
    $standard_survey = ($_REQUEST["standard_survey"]);
    // เลขที่มา
    $standard_source = $_REQUEST["standard_source"];
    // จดหมายสอบถามสมอ
    $standard_pick = $_REQUEST["standard_pick"];
    $date = date('Y-m-d');
    $group_id = $_REQUEST["group_id"];
    $agency_id = $_REQUEST["agency_id"];
    $manda_id = $_REQUEST["manda_id"];
    $department_id = $_REQUEST["department_id"];
    $sql = "INSERT INTO main_std (  standard_meet , standard_number , standard_detail  , standard_status ,standard_create , standard_survey , standard_source , standard_pick) 
      VALUES ( '$standard_meet','$standard_number','$standard_detail' , '7' , '$date' , '$standard_survey' , '$standard_source' , '$standard_pick')";

    $stmt = sqlsrv_query($conn, $sql);

    $sqlmaxid = "SELECT @@IDENTITY AS 'Maxid'";
    $querymax = sqlsrv_query($conn, $sqlmaxid);
    $resultMaxid = sqlsrv_fetch_array($querymax, SQLSRV_FETCH_ASSOC);

    $standard_idtb =  $resultMaxid['Maxid'];


// 1
    $countgroup = count($group_id);
    for ($i = 0; $i < $countgroup; $i++) {
        $groupid =  $group_id[$i];
        if (trim($groupid) <> "") {

            $sql2 = "INSERT INTO dimension_group ( group_id , standard_idtb  ) 
            VALUES ('$groupid', '$standard_idtb')";

            $stmt2 = sqlsrv_query($conn, $sql2);
        }
    }

 //2
    $countagency = count($agency_id);
    for ($i = 0; $i < $countagency; $i++) {
        $agencyid =  $agency_id[$i];
        if (trim($agencyid) <> "") {
            $sql3 = "INSERT INTO dimension_agency ( agency_id , standard_idtb  ) 
            VALUES ('$agencyid', '$standard_idtb')";

            $stmt3 = sqlsrv_query($conn, $sql3);
        }
    }

    //3
    // $counttype = count($type_id);
    // for ($i = 0; $i < $counttype; $i++) {
    //     $typeid =  $type_id[$i];
    //     if (trim($typeid) <> "") {

    //         $sql3 = "INSERT INTO dimension_type ( type_id , standard_idtb  ) 
    //   VALUES ('$typeid', '$standard_idtb')";

    //         $stmt3 = sqlsrv_query($conn, $sql3);
    //     }
    // }

    // 4
    $countboxdepartment = count($department_id);
    for ($i = 0; $i < $countboxdepartment; $i++) {
        $departmentid =  $department_id[$i];
        if (trim($departmentid) <> "") {

            $sql4 = "INSERT INTO dimension_department ( department_id , standard_idtb  ) 
      VALUES ('$departmentid', '$standard_idtb')";
            $stmt4 = sqlsrv_query($conn, $sql4);
        }
    }

    // 5
    date_default_timezone_set("Asia/Bangkok");
    $date = date("Y-m-d");
    //เพิ่มไฟล์
    $upload = $_FILES['fileupload'];
     //print_r($upload);
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
            $path = "../fileupload/";

            $numrand        = (mt_rand()); //สุ่มตัวเลข
            //$path           = "userfile/"; //กำหนดpath ใหม่
            $type           = strrchr($file_name, "."); //ดึงเฉพาะนามสกุลไฟล์
            $newname        = $date .  $numrand . $type; //ตั้งชื่อใหม่เรียงวันที่ ตัวเลขที่สุม และนามสกุลไฟล์
            $path_copy      = $path . $newname; //กำหนดpath
            //$path_link      = "/fileupload/" . $newname; //กำหนดlink
            //echo $file_name;
            // copy($fltem, $path_copy
            copy($file_tmp_name, $path_copy); //คัดลอกไwล์

            $sql_insert_file = "INSERT INTO dimension_file (fileupload , standard_idtb , upload_date) 
                    VALUES ( '$newname' , '$standard_idtb' , '$date')";
            $insert_file = sqlsrv_query($conn, $sql_insert_file);
        }
    }

    // 6
    $countmanda = count($manda_id);
    //echo $test;
    for ($i = 0; $i < $countmanda; $i++) {
        $mandaid =  $manda_id[$i];

        //echo "<br>";

        if (trim($mandaid) <> "") {
            $sql7 = "INSERT INTO dimension_manda ( manda_id , standard_idtb  ) 
            VALUES ('$mandaid', '$standard_idtb')";

            // $stmt7 = sqlsrv_query($conn, $sql7);
        }
    }
    

    if (sqlsrv_query($conn,$sql7 )) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("เพิ่มข้อมูลเอกสารสำเร็จ !!");';
        $alert .= 'window.location.href = "../index.php?page=status";';
        $alert .= '</script>';
        echo $alert;
        exit();;
    } else {
        echo "Error: " . $sql7 . "<br>" . sqlsrv_errors($conn);
    }
    sqlsrv_close($conn);
}
