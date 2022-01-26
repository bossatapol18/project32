
<?php
$sql = "SELECT * FROM main_std" ; 
$query = sqlsrv_query($conn , $sql);
?>
<form method="post" action="">
    <div class="container">
                <table class="table table-bordered table-responsive-xl table-striped text-center pt-5"
                    style="background-color: white;" id="tableall">
                    <thead>
                        <tr>
                            <th class="col-1">ลำดับที่</th>
                            <th class="col-2">วาระจากในที่ประชุมสมอ.</th>
                            <th class="col-1">เลขที่มอก.</th>
                            <th class="col-1">ชื่อมาตรฐาน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php while ($data = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) : ?>
                        <tr class="text-center">
                            <td class="align-middle"><?= $i++ ?></td>
                            <td class="align-middle"><?= $data['standard_meet'] ?></td>
                            <td class="align-middle"><?= $data['standard_number'] ?></td>
                            <td class="align-middle"><?= $data['standard_mandatory'] ?></td>
                            <?php endwhile; ?>
                        </table>
    <!-- datatable -->
                        </div>
