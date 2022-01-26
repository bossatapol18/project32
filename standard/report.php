<section class="about section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2 class="font-mirt">รายงาน</h2>
                    <h3 class="font-mirt">เลือกรายงานที่ต้องการ</h3>
                </div>
            </div>

            <div class="  tab-content font">
                <div id="home" class="container-fluid tab-pane active m-2">
                    <div class="container">
                        <div class="col-md-11">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="">
                                        <div class="pd-t">
                                        <h1 class="font-mirt"><label><a href="./standard/report_status/index.php">1. รายงานรายสถานะของเอกสาร</a></label><br><br>
                                            <label> <a href="./standard/report_list/index.php">2. รายงานรายชื่อศูนย์</a></label><br><br>
                                            <label> <a href="./standard/report_date/report_date3.php">3. รายงานตามช่วงเวลา</a></label><br><br>
                                            <label> <a href="./standard/report_number/index.php">4. รายงานตามเลข มอก.</a></label><br><br>
                                            <label> <a href="./standard/report_agency/index.php">5. รายงานตามหน่วยงานคู่แข่ง</a></label><br><br>


                                            <!-- <select name="type_com" class="form-control">
                                                <option value="" selected disabled>-กรุณาเลือก-</option>
                                                <option href="#" value="">รายงานรายศูนย์</option>
                                                <option href="#" value="">รายงานรายช่วงเวลา </option>
                                                <a href="?page=reportstatus">
                                                    <option value="">รายงานรายสถานะ </option>
                                                </a>
                                                <option href="#" value="">รายงานตามเลขมอก. </option>
                                                <option href="#" value="">รายงานตามหน่วยงานคู่แข่งที่เลือก
                                                    หรือจำนวนคู่แข่ง (มาก-น้อย)</option>
                                            </select> -->
                                            <br>
                                            <!-- <div class="">
                                                <button type="submit"
                                                    class="btn btn-danger bt mg-t-bt">พิมพ์รายงาน</button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- <div>
                            <div class="col-md-12">
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <div class="">
                                            <label> เลือกรูปแบบรายงานแบบกำหนดเอง</label>
                                            <br>
                                            <input type="checkbox" id="vehicle1" name="vehicle1" value=""><label
                                                for="vehicle1"> มาตรฐานเลขที่ *</label>
                                            <br>
                                            <input type="checkbox" id="vehicle2" name="vehicle2" value=""><label
                                                for="vehicle2">ประเภทผลิตภัณฑ์ *</label>
                                            <br>
                                            <input type="checkbox" id="vehicle3" name="vehicle3" value=""><label
                                                for="vehicle3">กลุ่มผลิตภัณฑ์</label>
                                            <br>
                                            <input type="checkbox" id="vehicle3" name="vehicle3" value=""><label
                                                for="vehicle3"> ศูนย์ที่เกี่ยวข้อง</label>
                                            <br>
                                            <input type="checkbox" id="vehicle3" name="vehicle3" value=""><label
                                                for="vehicle3">แสดงวันที่ของสถานะทั้งหมด</label>
                                            <br>
                                            <input type="checkbox" id="vehicle3" name="vehicle3" value=""><label
                                                for="vehicle3">แสดงเอกสารแนบทั้งหมด</label>
                                            (สร้างเป็น link จากในระบบเพื่อให้กดดูได้)
                                        </div>
                                        <div class="">
                                            <button type="submit" class="btn btn-danger bt mg-t-bt">พิมพ์รายงาน</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div> -->



                    </div>
                </div>

</section>
<script>
function goTo(page) {
    if (page != "") {
        if (page == "--") {
            resetMenu();
        } else {
            document.location.href = page;
        }
    }
    return false;
}
</script>