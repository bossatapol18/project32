<?php
header("Content-Type: application/msword");
header('Content-Disposition: attachment; filename="Report_Word.doc"');
?>
<?php
require 'date.php';
?>
<!DOCTYPE html>
<html lang="en">

<head></head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ระบบติดตามเอกสาร</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    require '../connection/connection.php';
    if (isset($_GET['standard_idtb']) && !empty($_GET['standard_idtb'])) {
        $standard_idtb = $_GET['standard_idtb'];
        $sql = "SELECT *  , a.standard_status,b.id_statuss,b.statuss_name AS name_status ,
    c.agency_id,d.agency_id,d.agency_name AS name_agency ,
    e.department_id,f.department_id,f.department_name AS name_depart FROM main_std a 
    INNER JOIN select_status b ON a.standard_status = b.id_statuss 
    INNER JOIN dimension_agency c ON a.standard_idtb = c.standard_idtb 
    INNER JOIN agency_tb d ON c.agency_id = d.agency_id
    INNER JOIN dimension_department e ON a.standard_idtb = e.standard_idtb
    INNER JOIN department_tb f ON e.department_id = f.department_id WHERE a.standard_idtb = '$standard_idtb'";
        $query = sqlsrv_query($conn, $sql);
        $data = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
    }
    ?>
    <!-- <header>
      <table>
        <tr>
          <th rowspan="2"><img src="tistr-logo-stw.png" width="50"></th>
          <th> เอกสาร <br> ()</th>
          <th>หมายเลขเอกสาร :...</th>
        </tr>
        <td>...</td>
       
        </tr>
      </table>
    </header> -->
    <form action="" method="post" enctype=multipart/form-data>
        <!-- <img src="./img/tistr_sitename.png"> -->
        
        <div style="text-align:right;">
            <h2>
                <p style="color:#0000ff ;">สถาบันวิจัยวิทยาศาสตร์และเทคโนโลยีแห่งประเทศไทย 35 เทคโนธานี <br>
                ถนนเลียบคลองห้า ตำบลคลองห้า อำเภอคลองหลวง จังหวัดปทุมธานี 12120</p>
            </h2>
        </div>
        <hr>
        <center>
            <h2 style="text-align:center;"><u>::ข้อมูลรายงานเอกสาร หมายเลขเอกสาร <?= $data['standard_idtb']; ?>::</u></h2>
        </center>
        <h3 style="color: red;"><strong>ชื่อมาตรฐาน : </strong><?= $data['standard_detail'] ?></h3>
        <h4><strong>วาระจากในที่ประชุมสมอ :</strong> <?= $data['standard_meet'] ?></h4>
        <h4><strong>เลขที่มอก :</strong> <?= $data['standard_number'] ?></h4>
        <h4><strong>มาตรฐานบังคับ : </strong><?= $data['standard_mandatory'] ?></h4>
        <table class="table table-bordered " style="width: 100%;" border="">
                    <thead>
                        <tr>
                            <th style="background-color:#3cb371 ;" >หน่วยงานที่สามารถทดสอบได้</th>
                            <th style="background-color:#3cb371 ;">หน่วยงานที่ขอ</th>
                        </tr>
                        <tr>
                            <td style="text-align: center;">
                            <?php
                                                        $ii = 1;
                                                        $standarsidtb = $_REQUEST['standard_idtb'];
                                                        $sql2 = "SELECT * ,a.agency_id,b.agency_id,b.agency_name AS name_agency FROM dimension_agency a INNER JOIN agency_tb b ON a.agency_id= b.agency_id 
                                                        WHERE standard_idtb  = '$standarsidtb' ";
                                                        $query2 = sqlsrv_query($conn, $sql2);
                                                        while ($result2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) { ?>
                                                        <?= $ii++ ?>. <?= $result2['name_agency']; ?><br>
                                                        <?php } ?>
                        </td>
                            <td style="text-align: center; ">
                         <?php
                                            $iii = 1;
                                            $standarsidtb = $_REQUEST['standard_idtb'];
                                            $sql3 = "SELECT * ,b.department_id,c.department_id,c.department_name AS name_department FROM dimension_department b INNER JOIN department_tb c ON b.department_id = c.department_id 
                                            WHERE standard_idtb  = '$standarsidtb' ";
                                            $query3 = sqlsrv_query($conn, $sql3);
                                            while ($result3 = sqlsrv_fetch_array($query3, SQLSRV_FETCH_ASSOC)) { ?>
                                            <?= $iii++ ?>. <?= $result3['name_department']; ?><br>
                                            <?php } ?>
                        </td>
                       
                        </tr>
                    </thead>
                   
                </table>
    <hr>        
        <div class=" mb-3">
            <center>
                <table class="table table-bordered " style="width: 100%;" border="">
                    <thead>
                        <tr>
                            <th colspan="3" style="background-color: #ffd747">ความก้าวหน้าของการขอรับการแต่งตั้ง</th>
                        </tr>
                        <tr>
                            <td style="text-align: center;">ระบุวันที่</td>
                            <td style="text-align: center; background-color: #ff5d7a; ">สถานะ</td>
                            <td style="text-align: center; ">เลขเอกสารที่เกี่ยวข้อง</td>
                        </tr>
                    </thead>
                    <tbody>
                        <td style="text-align: center;"><?= DateThai($data['standard_day']); ?></td>
                        <td style="text-align: center; color:#4e9100;"><?= $data['name_status'] ?></td>
                        <td></td>
                        </tr>
                    </tbody>
                </table>
            </center>
        </div>
    </form>
</body>

</html>