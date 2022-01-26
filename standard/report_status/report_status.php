<?php require('./fontthai.php'); ?>
<?php require('./pdf.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบติดตามงานมาตรา 5</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <div class="container">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- font thai sarabun -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
</head>
<style>
    body {
        font-family: 'Sarabun', sans-serif;
    }
</style>

<body>
    <center>
        <?php
        require('../connection/connection.php');
        $query = "SELECT * from select_status ";
        $statement = sqlsrv_query($conn, $query);
        ?>

        <div class="container">
            <form action="" method="post">
                <select name="search_status" id="search_status" multiple class="form-control selectpicker">
                    <?php while ($row = sqlsrv_fetch_array($statement, SQLSRV_FETCH_ASSOC)) : ?>
                        <option value="<?php echo $row["id_statuss"]; ?>"><?php echo $row["statuss_name"]; ?></option>
                    <?php endwhile; ?>
                </select>
                <input type="hidden" name="status" id="status" />
                <div style="clear:both"></div>
                <?php ob_start(); ?>
                <br />
                <h1 align="center">รายงานสถานะของเอกสาร</h1>
                <div class="table table-bordered ">
                    <table class="table" style="background-color: white;" id="tableall">
                        <thead>
                            <tr>
                                <th class="col-1">ลำดับที่</th>
                                <th class="col-2">สถานะ</th>
                                <th class="col-2">วาระจากในที่ประชุมสมอ.</th>
                                <th class="col-1">เลขที่มอก.</th>
                                <th class="col-1">ชื่อมาตรฐาน</th>
                                <th class="col-2">วันที่แต่งตั้งสถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                    </table>
                </div>
                <br />
                <br />
                <br />
            </form>

        </div>
        <?php require('./pdfend.php'); ?>
        <a href="MyReport.pdf">รายงาน</a>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                load_data();

                function load_data(query = '') {
                    $.ajax({
                        url: "report_fetch_status.php",
                        method: "POST",
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('tbody').html(data);
                        }
                    })
                }
                $('#search_status').change(function() {
                    $('#status').val($('#search_status').val());
                    var query = $('#search_status').val();
                    load_data(query);
                    // console.log(query);
                });
            });
        </script>
        <!-- <a class="btn btn-primary" href="MyReport.pdf">โหลดรายงาน</a> -->
        <a class="btn btn-sm text-white" style="background-color:black; font-size:20px;" onclick="window.history.go(-1); return false;">ย้อนกลับ</a>
    </center>
    </div>
</body>

</html>