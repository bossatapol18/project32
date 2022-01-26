<?php
$sql = "SELECT COUNT(standard_number) as count_standard FROM standard_tb";
$query = sqlsrv_query($conn, $sql);
?>
<section class="why-choose section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
          <h2 class="wow fadeInUp" data-wow-delay=".4s">เอกสารทั้งหมด</h2>
          <p class="wow fadeInUp" data-wow-delay=".6s"></p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="choose-content">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
              <!-- Start Single List -->
              <div class="single-list wow fadeInUp" data-wow-delay=".2s">
                <i class="lni lni-book"></i>
                <?php while ($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) : ?>
                  <h4>จำนวนเอกสารทั้งหมด</h4>
                  <p><?= $result['count_standard'] ?></p>
                <?php endwhile; ?>
              </div>
              <!-- Start Single List -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <div class="  tab-content font">
    <div id="home" class="container-fluid tab-pane active m-2">
      <table class="table table-striped ">
        <thead>
          <tr>
            <th>ลำดับที่</th>
            <th>วาระจากในที่ประชุมสมอ.</th>
            <th>เลขที่มอก.</th>
            <th>ชื่อมาตรฐาน</th>
            <th>หน่วยงานที่สามารถทดสอบได้</th>
            <th>มาตรฐานบังคับ</th>
            <th>หน่วยงานที่ขอ</th>
            <th>วันที่แต่งตั้ง</th>
            <th>สถานะ</th>
            <th>เลขเอกสารที่เกี่ยวข้อง</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>4.1</td>
            <td>มอก. 2243-25xx</td>
            <td>ลวดเหล็กกล้าดึงเย็นเสริมคอนกรีต</td>
            <td>1. กรมวิทยาศาสตร์บริการ<br>
              2. กรมส่งเสริมอุตสาหกรรม<br>
              3. สถาบันวิจัยวิทยาศาสตร์และเทคโนโลยีแห่งประเทศไทย<br>
              4. สถาบันเหล็กและเหล็กกล้าฯ แห่งประเทศไทย
            </td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
          </tr>

          <tr>
            <td>2</td>
            <td>4.1</td>
            <td>มอก. 2243-25xx</td>
            <td>ลวดเหล็กกล้าดึงเย็นเสริมคอนกรีต</td>
            <td>1. กรมวิทยาศาสตร์บริการ<br>
              2. กรมส่งเสริมอุตสาหกรรม<br>
              3. สถาบันวิจัยวิทยาศาสตร์และเทคโนโลยีแห่งประเทศไทย<br>
              4. สถาบันเหล็กและเหล็กกล้าฯ แห่งประเทศไทย
            </td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
          </tr>



        </tbody>
      </table>
    </div>
  </div>
  </div>
</section>
<!-- /End Items Grid Area -->