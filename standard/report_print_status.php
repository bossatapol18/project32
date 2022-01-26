<?php
$query = "SELECT DISTINCT  standard_status  ,  a.standard_idtb,b.id_statuss,b.statuss_name AS name_status  FROM main_std a 
INNER JOIN select_status b ON a.standard_status = b.id_statuss ORDER BY standard_status ASC";
$statement = sqlsrv_query($conn,$query);
?>
        <form action="" method="post">
        <h1 align="center">รายการรายสถานะของเอกสาร</h1>
        <select name="search_status" id="search_status" multiple class="form-control selectpicker">
            <?php while ($row = sqlsrv_fetch_array($statement, SQLSRV_FETCH_ASSOC)) : ?>
            <option value="<?php echo $row["standard_status"] ; ?>"><?php  echo $row["name_status"] ; ?></option>
            <?php endwhile ; ?>
        </select>
        <input type="hidden" name="status" id="status" />
        <div style="clear:both"></div>
        <br />
        <div class="table-responsive">
        <table class="table table-hover table-responsive-xl table-striped text-center pt-5"
                    style="background-color: white;" id="tableall">
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
            <center>
            <a  href="./standard/report_status.php">พิมพ์รายงาน</a>
            </center>
    </div>
<script type="text/javascript">
$(document).ready(function() {
    load_data();
    function load_data(query = '') {
        $.ajax({
            url: "./standard/report_fetch_status.php",
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
<?php
