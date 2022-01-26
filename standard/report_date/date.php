<?php
	date_default_timezone_set("Asia/Bangkok");
	function DateThai($strDate)
	{
		$strYear = date("Y", strtotime($strDate))+543;
		$strMonth = date("n", strtotime($strDate));
		$strDay = date("j", strtotime($strDate));
		$strHour = date("H", strtotime($strDate));
		$strMinute = date("i", strtotime($strDate));
		$strSeconds = date("s", strtotime($strDate));
		$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$strMonthThai = $strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
		// $strHour:$strMinute
	}
?>
<?php	
	function DateThai1($date_end)
	{
		$strYear = date("Y",strtotime($date_end))+543;
		$strMonth= date("n",strtotime($date_end));
		$strDay= date("j",strtotime($date_end));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}
?>
<!--  เรียกใช้  picker_date.js สำหรับสร้างตัวเลือก ปฎิทิน -->
<script src="https://รับเขียนโปรแกรม.net/picker_date/picker_date.js"></script>