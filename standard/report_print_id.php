<?php
require('pdf.php');
?>
<?php ob_start(); ?>
<?php
if (isset($_GET['standard_idtb']) && !empty($_GET['standard_idtb'])) {
    $standard_idtb = $_GET['standard_idtb'];
    $sql = "SELECT * , a.standard_idtb,a.standard_status,b.statuss_name AS name_status 
     FROM main_std a 
     INNER JOIN select_status b ON a.standard_status = b.id_statuss 
     WHERE a.standard_idtb = '$standard_idtb' ";
    $query = sqlsrv_query($conn, $sql);
    $result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
}


$sql2 = "SELECT * FROM select_status";
$query2 = sqlsrv_query($conn, $sql2);
$sql3 = "SELECT * FROM type_tb";
$query3 = sqlsrv_query($conn, $sql3);

?>
<style>
    body {
        font-family: 'Sarabun', sans-serif;
    }

    .ml {
        margin-left: 5%;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        border-color: whitesmoke;
    }

    th,
    td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #04AA6D;
        color: white;
    }

    tr:hover {
        background-color: whitesmoke;
    }
</style>

<?php
if (isset($_GET['standard_idtb']) && !empty($_GET['standard_idtb'])) {
    $standard_idtb = $_GET['standard_idtb'];
    $sql2 = "SELECT * FROM main_std  WHERE standard_idtb=$standard_idtb";
    $query2 = sqlsrv_query($conn, $sql2);
    $row = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC);
}
?>

<body>
    <form action="" method="post">
        <div class="container" style="text-align:center;">
            <img src="./standard/tistr_sitename.png">
            <h3>สถาบันวิจัยวิทยาศาสตร์และเทคโนโลยีแห่งประเทศไทย 35 เทคโนธานี </h3>
            <h3>ถนนเลียบคลองห้า ตำบลคลองห้า อำเภอคลองหลวง จังหวัดปทุมธานี 12120</h3>
            <h3 style="text-align:left;">รายงานเอกสาร หมายเลขเอกสาร : <u><?= $row['standard_idtb']; ?></u></h3>
        </div>
        <div class="container">
            <!-- <p class="justify-content-right" style="font-size: 18px;">
           <?php
            date_default_timezone_set('asia/bangkok');
            $date = date('m/d/Y');
            $date3 = DateThai($date);
            $date2 = date('เวลา h:i:s');
            echo '<p align=end>';
            echo $date;
            echo '</p>';
            echo '<p align=end>';
            echo $date2;
            echo '</p>';
            ?>  -->

            <table>
            </table>
            <hr>


            <p><strong>1. ชื่อมาตรฐาน : </strong> <strong style="color: red;"><?= $result['standard_detail']; ?></strong></p>
            <p><strong>2. สถานะ :</strong>  <strong style="color: green;"><?= $result['name_status']; ?></strong></p>
            <p><strong>3. รายละเอียดข้อมูลเอกสาร </strong> </p>
            <div class="row">
                <div class="col-sm-6">
                    <table style="border-collapse: collapse; width: 100%; text-align:center;margin-top:2%; " class="table table-bordered" border="1">
                        <thead>
                            <tr style="background-color: green;">
                                <th>วันที่ยื่นเอกสาร</th>
                                <th>เลขที่มอก</th>
                                <th>วาระจากในที่ประชุมสมอ.</th>
                            </tr>
                            <tr>
                                <td><?= DateThai($result['standard_create']) ?></td>
                                <td><?= $result['standard_number'] ?></td>
                                <td><?= $result['standard_meet'] ?></td>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="col-sm-6">
                    <table style="border-collapse: collapse; width: 100%; text-align:center;margin-top:2%; " class="table table-bordered" border="1">
                        <thead>
                            <tr style="background-color: green;">
                                <th>มาตรฐานบังคับ.</th>
                                <th>ชื่อมาตรฐาน</th>
                                <th>วันที่แต่งตั้งสถานะ</th>
                                <th style="background-color:red;">สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td><?= $result['standard_mandatory'] ?></td>
                                <td><?= $result['standard_detail'] ?></td>
                                <?php if ($result['standard_day'] == '') : ?>
                                    <td>ยังไม่ได้ระบุสถานะ</td>
                                <?php endif; ?>
                                <?php if ($result['standard_day']) : ?>
                                    <td><?= dateThai($result['standard_day']); ?></td>
                                <?php endif; ?>
                                <?php if ($result['id_statuss'] == 1) : ?>
                                    <td><?= $result['name_status'] ?></td>
                                <?php endif; ?>
                                <?php if ($result['id_statuss'] == 2) : ?>
                                    <td>
                                        <?= $result['name_status'] ?></td>
                                <?php endif; ?>
                                <?php if ($result['id_statuss'] == 3) : ?>
                                    <td><?= $result['name_status'] ?></td>
                                <?php endif; ?>
                                <?php if ($result['id_statuss'] == 4) : ?>
                                    <td>
                                        <?= $result['name_status'] ?></td>
                                <?php endif; ?>
                                <?php if ($result['id_statuss'] == '5') : ?>
                                    <td>
                                        <?= $result['name_status'] ?></td>
                                <?php endif; ?>
                                <?php if ($result['id_statuss'] == '6') : ?>
                                    <td>
                                        <?= $result['name_status'] ?></td>
                                <?php endif; ?>
                                <?php if ($result['id_statuss'] == '7') : ?>
                                    <td>
                                        <p>ไม่ได้ระบุสถานะ</p>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <table style="border-collapse: collapse; width: 100%; text-align:center; margin-top:2%; " class="table table-bordered" border="1">
                <thead>
                    <tr style="background-color: green;">
                        <!-- <th>หมายเลข tacking </th>
                    <th>หมายเหตุ</th> -->
                        <th>หน่วยงานคู่แข่ง.</th>
                        <th>หน่วยงานที่ขอ.</th>
                        <th>ประเภทผลิตภัณฑ์</th>
                        <th>กลุ่มผลิตภัณฑ์</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- <td><?= $result['standard_tacking']; ?></td>
                    <td><?= $result['standard_note']; ?></td> -->
                        <td>
                            <?php
                            $i = 1;
                            $standarsidtb = $_REQUEST['standard_idtb'];
                            $sql2 = "SELECT * ,a.agency_id,b.agency_id,b.agency_name AS name_agency FROM dimension_agency a INNER JOIN agency_tb b ON a.agency_id= b.agency_id 
                        WHERE standard_idtb  = '$standarsidtb' ";
                            $query2 = sqlsrv_query($conn, $sql2);
                            while ($result2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) { ?>
                                <?= $i++ ?>. <?= $result2['name_agency']; ?><br>
                            <?php } ?>
                        </td>
                        <td>
                            <?php
                            $ii = 1;
                            $standarsidtb = $_REQUEST['standard_idtb'];
                            $sql3 = "SELECT * ,b.department_id,c.department_id,c.department_name AS name_department FROM dimension_department b INNER JOIN department_tb c ON b.department_id = c.department_id 
                        WHERE standard_idtb  = '$standarsidtb' ";
                            $query3 = sqlsrv_query($conn, $sql3);
                            while ($result3 = sqlsrv_fetch_array($query3, SQLSRV_FETCH_ASSOC)) { ?>
                                <?= $ii++ ?>.<?= $result3['name_department']; ?><br>
                            <?php } ?>
                        </td>
                        <td>
                            <?php
                            $iii = 1;
                            $standarsidtb = $_REQUEST['standard_idtb'];
                            $sql4 = "SELECT * ,a.type_id,b.type_id,b.type_name AS name_type FROM dimension_type a INNER JOIN type_tb b ON a.type_id = b.type_id 
                        WHERE standard_idtb  = '$standarsidtb' ";
                            $query4 = sqlsrv_query($conn, $sql4);
                            while ($result4 = sqlsrv_fetch_array($query4, SQLSRV_FETCH_ASSOC)) { ?>
                                <?= $iii++ ?>. <?= $result4['name_type']; ?><br>
                            <?php } ?>
                        </td>
                        <td>
                            <?php
                            $iiii = 1;
                            $standarsidtb = $_REQUEST['standard_idtb'];
                            $sql5 = "SELECT * ,a.group_id,b.group_id,b.group_name AS name_group FROM dimension_group a INNER JOIN group_tb b ON a.group_id = b.group_id 
                        WHERE standard_idtb  = '$standarsidtb' ";
                            $query5 = sqlsrv_query($conn, $sql5);
                            while ($result4 = sqlsrv_fetch_array($query5, SQLSRV_FETCH_ASSOC)) { ?>
                                <?= $iiii++ ?>.<?= $result4['name_group']; ?><br>
                            <?php } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <p><strong>4. หมายเหตุ</strong> </p>
                <table>
                    <tr>
                        <td>
                            <p style="width:100%; " rows="4"><?= $result['standard_note']; ?></p>
                        </td>
                    </tr>
                </table>
                <p><strong>5. หมายเลข tacking</strong> </p>
                <table>
                    <tr>
                        <td>
                        <p style="width:50%;"><?= $result['standard_tacking']; ?></p>
                            </td>
                    </tr>
                </table>
            </div>
    </form>



</body>

<?php require('pdfend.php'); ?>
<br>
<a href="Report_PDF.pdf" class="btn btn-warning mt-3">พิมพ์รายงาน PDF</a>

<a href="./standard/report_print_id_excle.php?standard_idtb&standard_idtb=<?= $result['standard_idtb'] ?>" class="btn  btn-success mt-3">พิมพ์รายงาน Excel</a>

<a href="./standard/report_print_id_word.php?standard_idtb&standard_idtb=<?= $result['standard_idtb'] ?>" class="btn btn-primary mt-3">พิมพ์รายงาน Word</a>