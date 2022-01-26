  <!-- Vendor JS Files -->
  <script src="./ass/assets/vendor/purecounter/purecounter.js"></script>
  <script src="./ass/assets/vendor/aos/aos.js"></script>
  <script src="./ass/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./ass/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="./ass/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="./ass/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="./ass/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="./ass/assets/vendor/php-email-form/validate.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <!-- datatable -->
<script src="//cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
  <!-- Template Main JS File -->
  <script src="./ass/assets/js/main.js"></script>

  <!-- JDN -->
  <script
src="https://code.jquery.com/jquery-3.6.0.min.js"integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
    <div class="container">
  
  <!-- datatables -->
<!-- seacrh -->
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>