<?php require('./fontthai.php');?>
<?php require('./date.php');?>
<?php include('./pdf.php');?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบติดตามงานมาตรา 5</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <div class="container">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- font thai sarabun -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100&display=swap" rel="stylesheet">
</head>
<!-- <style>
        font-family: 'Sarabun',
        sans-serif;
</style> -->
<body>
<center>
<?php
require('../connection/connection.php');
$query = "SELECT * from main_std ";
$statement = sqlsrv_query($conn,$query);
?>
<div class="container">
        <form action="" method="post">   
            <h1 align="center">รายงานตามเลข มอก.</h1>
             <select name="search_number" id="search_number" multiple class="form-control selectpicker">
                <?php while ($row = sqlsrv_fetch_array($statement, SQLSRV_FETCH_ASSOC)) : ?>
                <option value="<?php echo $row["standard_idtb"] ; ?>"><?php  echo $row["standard_number"] ; ?></option>
                <?php endwhile ; ?>
            </select>
            <input type="hidden" name="number" id="number" />
            <div style="clear:both"></div>
            <br />
            <div class="table table-bordered">
                <?PHP ob_start();?>
                <table class="table" style="background-color: white;" id="tableall">
                    <thead>
                        <tr>
                            <th class="col-1">ลำดับที่</th>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
            load_data();

            function load_data(query = '') {
                $.ajax({
                    url: "report_fetch_number.php",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('tbody').html(data);
                    }
                })
            }
            $('#search_number').change(function() {
                $('#number').val($('#search_number').val());
                var query = $('#search_number').val();
                load_data(query);
                // console.log(query);
            });
        });
        </script>
<?php include('./pdfend.php');?>
<a class="btn btn-primary" href="MyReport.pdf">โหลดรายงาน</a>
<a class="btn btn-sm text-white" style="background-color:black; font-size:20px;" onclick="window.history.go(-1); return false;">ย้อนกลับ</a>
    </center>
    </div>
</body>
</html>