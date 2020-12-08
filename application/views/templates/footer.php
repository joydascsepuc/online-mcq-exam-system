<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container-fluid mt-3" style="background-color: black; color: white;">
  <div class="row text-justify p-5">
    <div class="col-md-3">
      <h5>About Defence Care</h5>
      <br>
      <p>চট্টগ্রামে যাত্রা শুরু করা পুর্নাংগ ডিফেন্স কোচিং, "ডিফেন্স কেয়ার ". এক ঝাঁক মেধাবী বিএমএ ক্যাডেট দিয়ে পরিচালিত । শুরুর সময় থেকে সাফল্য ঘরে তুলেছে ডিফেন্স কেয়ার। ইন্সট্রাকটর দের আন্তরিকতা, কঠোর পরিশ্রম ও অভিজ্ঞতা দিয়ে ছাত্র ছাত্রিদের অফিসার হবার সপ্ন পুরন করে আসছে আমাদের প্রিয় এই প্রতিষ্ঠানটি। আর্মি, নেভি এবং এয়ার ফোর্স এর প্রিলিমিনারি, লিখিত এবং আইএসএসবি এর সর্বোচচ প্রস্তুতির জন্য চলে আসো আমাদের কাছে।</p>
    </div>
    <div class="col-md-3">
      <h5>Our Mission</h5>
      <br>
      <p>চট্টগ্রামের ছেলেমেয়েদের সবসময় ডিফেন্স কোচিঙের জন্য হাজার হাজার টাকা খরছ করে এবং প্রচুর কস্ট সহ্য করে ঢাকা যেতে হয়। যার ফলে তাদের পরিপূর্ণ প্রস্তুতি নেয়া হয়ে উঠে না। তাই আমরা বিএমএ ক্যাডেট দের দিয়েই চট্টগ্রামে চালু করছি সম্পূর্ণ ঢাকার মানের একটি পুরনাঙ্গ কোচিং , যা তোমাদের হেল্প করবে। আশা করি সবাইকে সমান সেবা দিতে পারব।</p>
    </div>
    <div class="col-md-2">
      <h5>Important Links</h5>
      <br>
      <a href="#" target="_blank">Defence Care</a><br>
      <a href="http://issb-bd.org" target="_blank">ISSB</a><br>
      <a href="http://army.mil.bd" target="_blank">Join Bangladesh Army</a><br>
      <a href="http://navy.mil.bd" target="_blank">Join Bangladesh Navy</a><br>
      <a href="http://baf.mil.bd" target="_blank">Join Bangladesh Air Force</a><br>
      <a href="http://bncc.gov.bd" target="_blank">BNCC</a><br>
    </div>
    <div class="col-md-4">
      <h5>Contact Info</h5>
      <br>
      <p class="">Address: <br>
      Jalal Mansion (1st Floor), Nurbag R/A, Beside Central plaza, Nurbag R/A, O.R. Nijam road, GEC circle , GEC, Chittagong.</p>
      <div class="row">
        <div class="col-6">
          <span class="">Mobile: <br>+8801675-607126</span>
          <p class="">Mailing Support<br>murad.pu.dc@gmail.com</p>
        </div>
        <div class="col-6">
          <p class="">Hours of Open:<br><span>Saturday-Thursday: 9AM to 10PM</span><br><span>Friday : 3PM to 8PM</span></p>
        </div>
      </div>
    
     <div class="row">
       <div class="col-6">
         <span class="">Social Support:</span>
       </div>
       <div class="col-6">
         <a href="https://www.facebook.com/defencecare.ctg/" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>&nbsp;&nbsp;
         <a href="#" target="_blank" style="color: #1AADE3"><i class="fab fa-twitter fa-2x"></i></a>&nbsp;&nbsp;
         <a href="#" target="_blank" style="color: #E0584B"><i class="fas fa-envelope fa-2x"></i></a>
       </div>
     </div>
    </div>
  </div>

  <footer class="page-footer text-center ml-2">
    <?php $year = date('Y'); ?>
    <div class="footer-copyright text-center">© <?=$year;?> Copyright : Defence Care CTG, Bangladesh.</div>
  </footer>

</div>





<script type="text/javascript">
  $(document).ready( function () {
    $('#datatable').DataTable();
  });

  $('.nav-item a').on('click', function() {
   
    $('.nav-item').children('.dropdown-menu').slideUp(150);
    
    if ($(this).parent().hasClass("show")) {
      $(this).next('.dropdown-menu').slideUp(150);
    } else {
      $(this).next('.dropdown-menu').slideDown(200);
    }

  });
</script>
</body>
</html>