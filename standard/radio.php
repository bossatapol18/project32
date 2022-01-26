<!-- 
 <div class="card mt-4">
                    <div class="card-body">
                        <div class="col-md-4">
                        <input id="rati0" value="จากการประชุม" type="radio" onclick="fnc_free(1)" name="standard_source" readonly>
                        <b>จากการประชุม</b>
                        <br>
                        <br>
                        <label>ที่มาของการประชุม</label>
                        <input type="text" id="a1" name="standard_origin" autocomplete="off" class="form-control" multiple readonly>
                        <br>
                        <label>ส่งแบบสำรวจล่วงหน้าแล้ว</label>
                        <input type="text" id="a2" name="standard_survey" autocomplete="off" class="form-control" multiple readonly>
                        </div>
                        <div class="col-md-4">
                        <input id="rati0" value="จากจดหมาย สมอ." type="radio" onclick="fnc_free(2)" name="standard_source" readonly>
                        <b>จากจดหมาย สมอ.</b>
                        <br>
                        <br>
                        <label>วันที่รับหนังสือจากสมอ.</label>
                        <input id="a3" type="text"   name="standard_pick" autocomplete="off" class="form-control" multiple readonly> -->
                        <!-- <input id="a3" type="text" name="standard_pick" class=" form-control" required multiple readonly>
                        <br>
                        <label>วันที่ส่งเอกสารออกไป สมอ.</label>
                        <input id="a4" type="text"  name="standard_pickup" autocomplete="off" class="form-control" multiple readonly>
                        </div>
                        <div class="col-md-4">
                        <input id="rati0" value="จากราชกิจานุเบกษา" type="radio" onclick="fnc_free(3)" name="standard_source" readonly>
                        <b>จากราชกิจานุเบกษา</b>
                        <br>
                        <br> -->
                        <!-- <label>หน่วยงานคู่แข่ง</label> -->
                        <!-- <input type="text" id="a5" name="#" autocomplete="off" class="form-control" multiple readonly style="display: none;"> -->
                        <!-- <br>
                        <label>วันที่ประกาศราชกิจจานุเบกษา</label>
                        <input type="date" id="a6" name="standard_gazet" autocomplete="off" class="form-control" multiple readonly>
                        </div>
                    </div>
                    </div>  -->
<!-- <SCRIPT>
    function fnc_free($data) {
        if ($data == "1") {
            document.getElementById("a1").readOnly = false;
            document.getElementById("a2").readOnly = false;
            document.getElementById("a3").readOnly = true;
            document.getElementById("a4").readOnly = true;
            document.getElementById("a5").readOnly = true;
            document.getElementById("a6").readOnly = true;
        } else if ($data == "2") {
            document.getElementById("a1").readOnly = true;
            document.getElementById("a2").readOnly = true;
            document.getElementById("a3").readOnly = false;
            document.getElementById("a4").readOnly = false;
            document.getElementById("a5").readOnly = true;
            document.getElementById("a6").readOnly = true;
        } else if ($data == "3") {
            document.getElementById("a1").readOnly = true;
            document.getElementById("a2").readOnly = true;
            document.getElementById("a3").readOnly = true;
            document.getElementById("a4").readOnly = true;
            document.getElementById("a5").readOnly = false;
            document.getElementById("a6").readOnly = false;
        }
    }
</script> -->


<script>
    function hiddenn(show) {
        if (show == 0) {
            // document.getElementById("a1").style.display = 'none';
            document.getElementById("a2").style.display = 'none';
            // document.getElementById("a11").style.display = 'none';
            document.getElementById("a22").style.display = 'none';
            document.getElementById("a3").style.display = 'none';
            document.getElementById("a4").style.display = 'none';
            document.getElementById("a33").style.display = 'none';
            document.getElementById("a44").style.display = 'none';
            // document.getElementById("a5").style.display = 'none';
            // document.getElementById("a55").style.display = 'none';
            // document.getElementById("a555").style.display = 'none';
            document.getElementById("a6").style.display = 'none';
            document.getElementById("a66").style.display = 'none';
        } else if (show == 1) {
            // document.getElementById("a1").style.display = '';
            document.getElementById("a2").style.display = '';
            // document.getElementById("a11").style.display = '';
            document.getElementById("a22").style.display = '';
            document.getElementById("a3").style.display = 'none';
            document.getElementById("a4").style.display = 'none';
            document.getElementById("a33").style.display = 'none';
            document.getElementById("a44").style.display = 'none';
            // document.getElementById("a5").style.display = 'none';
            // document.getElementById("a55").style.display = 'none';
            // document.getElementById("a555").style.display = 'none';
            document.getElementById("a6").style.display = 'none';
            document.getElementById("a66").style.display = 'none';
        } else if (show == 2) {
            // document.getElementById("a1").style.display = 'none';
            document.getElementById("a2").style.display = 'none';
            // document.getElementById("a11").style.display = 'none';
            document.getElementById("a22").style.display = 'none';
            document.getElementById("a3").style.display = '';
            document.getElementById("a4").style.display = '';
            document.getElementById("a33").style.display = '';
            document.getElementById("a44").style.display = '';
            // document.getElementById("a5").style.display = 'none';
            // document.getElementById("a55").style.display = 'none';
            // document.getElementById("a555").style.display = 'none';
            document.getElementById("a6").style.display = 'none';
            document.getElementById("a66").style.display = 'none';
        } else if (show == 3) {
            // document.getElementById("a1").style.display = 'none';
            document.getElementById("a2").style.display = 'none';
            // document.getElementById("a11").style.display = 'none';
            document.getElementById("a22").style.display = 'none';
            document.getElementById("a3").style.display = 'none';
            document.getElementById("a4").style.display = 'none';
            document.getElementById("a33").style.display = 'none';
            document.getElementById("a44").style.display = 'none';
            // document.getElementById("a5").style.display = '';
            // document.getElementById("a55").style.display = '';
            // document.getElementById("a555").style.display = '';
            document.getElementById("a6").style.display = '';
            document.getElementById("a66").style.display = '';
        }
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://รับเขียนโปรแกรม.net/picker_date/picker_date.js"></script>
<script>
    picker_date(document.getElementById("a4"), {
        year_range: "-12:+10"
    });
    picker_date(document.getElementById("a6"), {
        year_range: "-12:+10"
    });
    picker_date(document.getElementById("a2"), {
        year_range: "-12:+10"
    });
</script>