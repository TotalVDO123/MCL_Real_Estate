<!-- Main Footer -->
  <footer class="main-footer">
    <div class="pattern-layer" style="background-image: url(images/background/pattern-8.png)"></div>
    <div class="auto-container"> 
      
      <!-- Widgets Section -->
      <div class="widgets-section">
        <div class="row clearfix"> 
          
          <!-- Column -->
          <div class="big-column col-lg-6 col-md-12 col-sm-12">
            <div class="row clearfix"> 
              
              <!-- Footer Column -->
              <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                <div class="footer-widget logo-widget">
                  <div class="logo"><a href="index.php"><img src="images/logo.png" alt="" title=""></a></div>
                  <!-- Social Box -->
                  <ul class="social-box">
                    <li><a href="https://www.facebook.com/" class="fa fa-facebook-f"></a></li>
                    <!-- <li><a href="https://www.twitter.com/" class="fa fa-twitter"></a></li>
                    <li><a href="https://www.linkedin.com/" class="fa fa-linkedin"></a></li> -->
                    <li><a href="https://www.instagram.com/" class="fa fa-instagram"></a></li>
                  </ul>
                </div>
              </div>
              
              <!-- Footer Column -->
              <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                <div class="footer-widget links-widget">
                  <h5>Our Company</h5>
                  <ul class="links">
                    <li><a href="<?php echo base_url(); ?>privacy-policy">Privacy Policy</a></li>
                    <li><a href="<?php echo base_url(); ?>terms-and-condition">Terms & Conditions</a></li>
                    <li><a href="<?php echo base_url(); ?>web-accessibility">Web Accessibility</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Column -->
          <div class="big-column col-lg-6 col-md-12 col-sm-12">
            <div class="row clearfix"> 
              
              <!-- Footer Column -->
              <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                <div class="footer-widget links-widget">
                  <h5>Support</h5>
                  <ul class="links">
                    <li><a href="index.php#contact">Contact Support</a></li>
                    <li><a href="mailto:support@multipleclientlist.com">support@multipleclientlist.com</a></li>
                  </ul>
                </div>
              </div>
              
              <!-- Footer Column -->
            </div>
          </div>
        </div>
      </div>
      
      <!-- Footer Bottom -->
      <div class="footer-bottom">
        <div class="auto-container">
          <div class="row clearfix"> 
            <!-- Column -->
            <div class="column col-lg-12 col-md-12 col-sm-12">
              <div class="copyright text-center">Copyright© 2024 All Rights Reserved</div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Main Footer --> 
  
</div>
<!--End pagewrapper--> 

<!-- Scroll To Top -->
<div class="scroll-to-top scroll-to-target theme-btn btn-style-two" data-target="html"><span class="txt fa fa-arrow-up"></span></div>
<script src="<?php echo base_url(); ?>assets/home_assets/js/jquery.js"></script> 
<script src="<?php echo base_url(); ?>assets/home_assets/js/popper.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/home_assets/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/home_assets/js/jquery.mCustomScrollbar.concat.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/home_assets/js/jquery.fancybox.js"></script> 
<script src="<?php echo base_url(); ?>assets/home_assets/js/appear.js"></script> 
<script src="<?php echo base_url(); ?>assets/home_assets/js/tilt.jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/home_assets/js/owl.js"></script> 
<script src="<?php echo base_url(); ?>assets/home_assets/js/wow.js"></script> 
<script src="<?php echo base_url(); ?>assets/home_assets/js/nav-tool.js"></script> 
<script src="<?php echo base_url(); ?>assets/home_assets/js/jquery-ui.js"></script> 
<script src="<?php echo base_url(); ?>assets/home_assets/js/script.js"></script> 
<script src="<?php echo base_url(); ?>assets/home_assets/js/color-settings.js"></script>






<div class="card cookie-alert">
  <div class="card-body">
    <h5 class="card-title">&#x1F36A; Do you like cookies?</h5>
    <p class="card-text">We use cookies to ensure you get the best experience on our website.</p>
    <div class="btn-toolbar justify-content-center">
      <!-- <a href="privacy-policy.php" target="_blank" class="btn btn-link">Learn more</a> -->
       <a href="#"  class="btn btn-link decline_btn">Denied</a> <span class="or">Or </span>
      <a href="#" class="btn btn-primary accept-cookies">Accept</a>
    </div>
  </div>
</div>


<script type="text/javascript">
// (function () {
//     "use strict";

//     var cookieAlert = document.querySelector(".cookie-alert");
//     var acceptCookies = document.querySelector(".accept-cookies");

//     cookieAlert.offsetHeight; // Force browser to trigger reflow (https://stackoverflow.com/a/39451131)

//     if (!getCookie("acceptCookies")) {
//         cookieAlert.classList.add("show");
//     }

//     acceptCookies.addEventListener("click", function () {
//         setCookie("acceptCookies", true, 60);
//         cookieAlert.classList.remove("show");
//     });
// })();

// // Cookie functions stolen from w3schools
// function setCookie(cname, cvalue, exdays) {
//     var d = new Date();
//     d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
//     var expires = "expires=" + d.toUTCString();
//     document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
// }

// function getCookie(cname) {
//     var name = cname + "=";
//     var decodedCookie = decodeURIComponent(document.cookie);
//     var ca = decodedCookie.split(';');
//     for (var i = 0; i < ca.length; i++) {
//         var c = ca[i];
//         while (c.charAt(0) === ' ') {
//             c = c.substring(1);
//         }
//         if (c.indexOf(name) === 0) {
//             return c.substring(name.length, c.length);
//         }
//     }
//     return "";
// }


  (function () {
    "use strict";

    var cookieAlert = document.querySelector(".cookie-alert");
    var acceptCookies = document.querySelector(".accept-cookies");
    var declineBtn = document.querySelector(".decline_btn");

    cookieAlert.offsetHeight; // Force browser to trigger reflow (https://stackoverflow.com/a/39451131)

    if (!getCookie("acceptCookies")) {
        cookieAlert.classList.add("show");
    }

    acceptCookies.addEventListener("click", function () {
        setCookie("acceptCookies", true, 60);
        cookieAlert.classList.remove("show");
    });

    declineBtn.addEventListener("click", function () {
        // You can also set a cookie here if needed
        cookieAlert.classList.remove("show");
    });
})();

// Cookie functions stolen from w3schools
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

</script>
