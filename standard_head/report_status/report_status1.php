<?php
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
                <br />
                <h1 align="center">รายงานสถานะของเอกสาร</h1>
                <div class="table table-bordered">
                    <table class="table" style="background-color:#ccf5ff;" id="tableall">
                        <thead style="background-color:#008fb3;">
                            <tr>
                            <th>ลำดับที่</th>
                                <th>ที่มาจากการประชุม</th>
                                <th class="text-white" style="background-color: green;">สถานะ</th>
                                <th class="text-white" style="background-color: green;">วันที่แต่งตั้งสถานะ</th>
                                <!-- <th class="text-white" style="background-color: green;" >คู่แข่ง</th> -->
                                <th class="1 selectt">ชื่อมาตรฐาน</th>
                                <th class="2 selectt">ประเภทผลิตภัณฑ์</th>
                                <th class="3 selectt">กลุ่มผลิตภัณฑ์</th>
                                <th class="4 selectt">ชื่อหน่วยงานศูนย์</th>
                                <th class="6 selectt">ไฟล์แนบ</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                    </table>
                </div>
                
            </form>
             <a class="btn btn-sm text-white" style="background-color:black; font-size:20px;" onclick="window.history.go(-1); return false;">ย้อนกลับ</a>
        </div>
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                load_data();
                function load_data(query = '') {
                    $.ajax({
                        url: "./standard/report_fetch_status1.php",
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
<!-- <a href="{page_url}/print_pdf" target="_blank" class="btn btn-danger btn-lg" data-toggle="tooltip" title="พิมพ์ข้อมูล">
     <i class="fas fa-file-excel"></i></span> PDF
    </a> -->
    
