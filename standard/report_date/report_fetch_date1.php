<!-- $query = "  
           SELECT * FROM main_std  
           WHERE standard_day BETWEEN '".$_POST["standard_create"]."' AND '".$_POST["standard_day"]."'  
      ";   -->
      <?php include('date.php');?>
<?php  
  $i = 1;
 //filter.php  
 if(isset($_POST["standard_create"], $_POST["standard_day"]))  
 {  
      include('../connection/connection.php');
      $output = '';  
     //  $query = "SELECT * FROM  main_std WHERE standard_create  = '12/28/2021' AND standard_day = '12/31/2021'";
      $query = "SELECT * FROM main_std WHERE standard_create >= '".$_POST["standard_create"]." AND standard_day <= ".$_POST["standard_day"]."'";
     //  print_r($query);
      $stmt = sqlsrv_query($conn, $query);  
     // $result = sqlsrv_num_rows($stmt);
     // print_r($stmt);
      $output .= '  
           <table class="table table-bordered text-center">  
                <tr>  
                <th width="5%">ลำดับ</th>  
                <th width="10%">วันที่เพิ่มเอกสาร</th>   
                <th width="10%">วันที่แต่งตั้งเอกสาร</th>  
                <th width="10%">หมายเลขเอกสาร</th>  
                <th width="10%">หมายเหตุ</th>  
                <th width="10%">หมายเลข tacking</th>  
                </tr>  
      ';  
     //  if($result > 0)  
     //  {  
           while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
          //  $i = 1 ;  
           {  
                if($row['standard_day'] == '') {
                $output .= '  
                     <tr> 
                     <td>'.$i++.'</td>
                     <td>'.DateThai($row["standard_create"]).'</td> 
                     <td>'.DateThai($row["standard_day"]).'</td> 
                     <td>'.$row["standard_number"].'</td>   
                     <td>'.$row["standard_note"].'</td>  
                     <td>'.$row["standard_tacking"].'</td>  
                     </tr>  
                ';  
                }
           }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>
