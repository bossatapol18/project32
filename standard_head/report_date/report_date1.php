<?php
     $query = "SELECT * FROM main_std ORDER BY standard_idtb desc";
     $result = sqlsrv_query($conn, $query);
     ?>
     <body>
          <br /><br />

          <div class="container" style="width:900px;">
               <h2 align="center">รายงานเอกสารตามช่วงเวลา</h2>
               <div class="col-md-3">
                    <input type="text" name="standard_create" id="standard_create" class="form-control" placeholder="จากวันที่" autocomplete="off" />
               </div>
               <div class="col-md-3">
                    <input type="text" name="standard_day" id="standard_day" class="form-control" placeholder="ถึงวันที่" autocomplete="off" />
               </div>
               <div class="col-md-5">
                    <input type="button" name="filter" id="filter" value="ค้นหาเอกสาร" class="btn btn-info" />
               </div>
               <div style="clear:both"></div>
               <br />
               <div id="order_table">
                    <table class="table table-bordered text-center">
                         <tr>
                              <th width="5%">ลำดับ</th>
                              <th width="10%">วันที่เพิ่มเอกสาร</th>
                              <th width="10%">วันที่แต่งตั้งเอกสาร</th>
                              <th width="10%">หมายเลขเอกสาร</th>
                              <th width="10%">หมายเหตุ</th>
                              <th width="10%">หมายเลข tacking</th>

                         </tr>
                         <?php
                         $i = 1;
                         while ($row  = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                         ?>
                              <tr>
                                   <td><?php echo $i++; ?></td>
                                   <td><?php echo DateThai($row["standard_create"]); ?></td>
                                   <?php if ($row['standard_day'] == '') : ?>
                                        <td><?php echo "ยังไม่ได้แต่งตั้งสถานะ" ?></td>
                                   <?php endif; ?>
                                   <?php if ($row['standard_day'] == true) : ?>
                                        <td><?php echo DateThai($row["standard_day"]); ?></td>
                                   <?php endif; ?>
                                   <td><?php echo $row["standard_number"]; ?></td>
                                   <td><?php echo $row["standard_note"]; ?></td>
                                   <td><?php echo $row["standard_tacking"]; ?></td>

                              </tr>
                         <?php
                         }
                         ?>
                    </table>
               
                    <!-- <a href="MyReport.pdf">โหลดรายงาน</a> -->
                    <a class="btn btn-sm text-white" style="background-color:black; font-size:20px;" onclick="window.history.go(-1); return false;">ย้อนกลับ</a>
               </div>
          </div>
     </body>

     </html>
     <script>
          $(document).ready(function() {
               $.datepicker.setDefaults({
                    dateFormat: 'mm/dd/yy'
               });
               $(function() {
                    $("#standard_create").datepicker();
                    $("#standard_day").datepicker();
               });
               $('#filter').click(function() {
                    var standard_create = $('#standard_create').val();
                    var standard_day = $('#standard_day').val();
                    if (standard_create != '' && standard_day != '') {
                         $.ajax({
                              url: "./standard/report_fetch_date1.php",
                              method: "POST",
                              data: {
                                   standard_create: standard_create,
                                   standard_day: standard_day
                              },
                              success: function(data) {
                                   $('#order_table').html(data);
                              }
                         });
                    } else {
                         alert("โปรดกรอกวันที่เริ่มการค้นหาก่อน");
                    }
               });
          });
     </script>