<?php
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
                <table class="table" style="background-color:#ccf5ff;" id="tableall">
                        <thead style="background-color:#008fb3;">
                        <tr>
                            <th class="col-1">ลำดับที่</th>
                            <!-- <th class="col-2">วาระจากในที่ประชุมสมอ.</th> -->
                            <th class="col-1">เลขที่มอก.</th>
                            <th class="col-1">ชื่อมาตรฐาน</th>
                            <th class="col-2">สถานะ</th>
                            <th class="col-2">วันที่แต่งตั้งสถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
            
                    </tbody>
                </table>
            </div>
            
        </form>
        <a class="btn btn-sm text-white" style="background-color:black; font-size:20px;" onclick="window.history.go(-1); return false;">ย้อนกลับ</a>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
            load_data();

            function load_data(query = '') {
                $.ajax({
                    url: "./standard/report_fetch_number1.php",
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