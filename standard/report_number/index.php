<?php
require '../../connection/connection.php';
$page = (isset($_GET['page'])) ? $_GET['page'] : '';
$strKeyword = '';
if (isset($_POST) && !empty($_POST)) {
    $strKeyword = $_POST["txtKeyword"];
}
$query = "SELECT * from main_std WHERE standard_number  LIKE '%$strKeyword%' ";
$result = sqlsrv_query($conn,$query);
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>ระบบติดตามเอกสาร</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/bootstrap-select.min.css" rel="stylesheet" />
	<script src="js/bootstrap-select.min.js"></script>
</head>
<body>
<form method="post" action="">
	<div class="container">
		<br />
		<h2 align="center">รายงานตามเลข มอก.</h2><br />

		<select name="multi_search_filter" id="multi_search_filter" multiple class="form-control selectpicker">
			<?php
			while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) { ?>
				<option value="<?php echo $row["standard_number"]; ?>"><?php echo $row["standard_number"]; ?></option>
			<?php }
			?>
		</select>
		<!-- <div class="search"> <input type="text" class="search-input" placeholder="กรุณากรอกเลข มอก. ที่ต้องการค้นหา" name="txtKeyword" id="txtKeyword" value="<?php echo $strKeyword ?>">
        <button class="search-icon" type="submit" value="ค้นหา"><i class="fa fa-search"></i></button> -->
		
		<input type="hidden" name="hidden_country" id="hidden_country" />
		<div style="clear:both"></div>
		<br />
		<div class="table-responsive">
		<table class="table" style="background-color:#ccf5ff;" id="tableall">
                        <thead style="background-color:#008fb3;">
					<tr>
					<th>ลำดับที่</th>
					<th>เลขที่ มอก.</th>
					 <th>ชื่อมาตรฐาน</th>
                    <th>สถานะ</th>
					<th>วันที่แต่งตั้งสถานะ</th>
                               
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
		<br />
		<br />
		<br />
	</div>
</form>
</body>

</html>


<script>
	$(document).ready(function() {

		load_data();

		function load_data(query = '') {
			$.ajax({
				url: "fetch.php",
				method: "POST",
				data: {
					query: query
				},
				success: function(data) {
					$('tbody').html(data);
				}
			})
		}

		$('#multi_search_filter').change(function() {
			$('#hidden_country').val($('#multi_search_filter').val());
			var query = $('#hidden_country').val();
			load_data(query);
		});

	});
</script>