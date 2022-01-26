 <!-- ======= Header ======= -->
 <header id="header" class="d-flex align-items-center font-mirt">
   <div class="container d-flex align-items-center justify-content-between non-printable">
     <a href="?page=dash" class="non-printable">
       <img src="img/tistr_sitename.png" class="non-printable" width="90%" /></a>

     <!-- Uncomment below if you prefer to use an image logo -->
     <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->
     <nav id="navbar" class="navbar">
       <ul>    
         <li><a class="nav-link scrollto" href="?page=report">รายงานเอกสาร</a></li>
       <li class="dropdown"><a href="#"><span>สวัสดีคุณ <?=$_SESSION['user_login'] ; ?> || ตำแหน่ง : <?=$_SESSION['role_login'] ; ?></span> <i class="bi bi-chevron-down"></i></a>
           <ul>
         <li><a href="?page=logout" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่')" >ออกจากระบบ</a></li>
       </ul>
       </li>
       
       </ul>
       <i class="bi bi-list mobile-nav-toggle"></i>
     </nav><!-- .navbar -->


   </div>
 </header><!-- End Header -->