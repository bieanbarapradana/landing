 <!--site footer-->
      <footer class="footer-preset-02">
        <div class="container">
          <div class="footer-preset-wrapper">
            <div class="row">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="footer-quote-01">
                  <div class="footer-quote"><a href="index.html"><img src="assets/images/footer-001.png" alt="wolverine"></a>
                    <div class="content">
                      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.<br><br>standard dummy text ever since. Lorem  Ipsum has been the industry’s standard dummy text ever since. </p><a href="#">READ MORE</a>
                    </div>
                    <div class="icon">
                      <p>Follow Us:</p>
                      <ul class="social-02">
                        <li><a href="#"><i class="fa icon-facebook"></i></a></li>
                        <li><a href="#"><i class="fa icon-lastfm"></i></a></li>
                        <li><a href="#"><i class="fa icon-dribbble"> </i></a></li>
                        <li><a href="#"><i class="fa icon-twitter"></i></a></li>
                        <li><a href="#"><i class="fa icon-tumblr"></i></a></li>
                        <li><a href="#"><i class="fa icon-gplus"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <h5>INSTAGRAM FOLLOW</h5>
                <div class="widget instagram">
                  <div class="instagram-wrapper">
                    <div class="instagram-item"><a href="#"><img src="assets/images/instagram-01.jpg" alt="instagram-image" class="img-responsive"></a></div>
                    <div class="instagram-item"><a href="#"><img src="assets/images/instagram-02.jpg" alt="instagram-image" class="img-responsive"></a></div>
                    <div class="instagram-item"><a href="#"><img src="assets/images/instagram-03.jpg" alt="instagram-image" class="img-responsive"></a></div>
                    <div class="instagram-item"><a href="#"><img src="assets/images/instagram-04.jpg" alt="instagram-image" class="img-responsive"></a></div>
                    <div class="instagram-item"><a href="#"><img src="assets/images/instagram-05.jpg" alt="instagram-image" class="img-responsive"></a></div>
                    <div class="instagram-item"><a href="#"><img src="assets/images/instagram-06.jpg" alt="instagram-image" class="img-responsive"></a></div>
                    <div class="instagram-item"><a href="#"><img src="assets/images/instagram-07.jpg" alt="instagram-image" class="img-responsive"></a></div>
                    <div class="instagram-item"><a href="#"><img src="assets/images/instagram-08.jpg" alt="instagram-image" class="img-responsive"></a></div>
                    <div class="instagram-item"><a href="#"><img src="assets/images/instagram-09.jpg" alt="instagram-image" class="img-responsive"></a></div>
                  </div>
                </div>
              </div>
              <div class="col-md-offset-0 col-md-4 col-sm-8 col-sm-offset-2 col-xs-12">
                <h5>QUICK CONTACT US</h5>
                <div class="widget contact-us">
                  <form id="contact_form">
                    <input type="text" name="name" placeholder="Name" required class="name">
                    <input type="email" name="email" placeholder="Email" required class="email">
                    <textarea name="message" placeholder="Message" required class="msg"></textarea>
                    <button type="submit" class="normal-btn normal-btn-main btn-size-5">SUBMIT</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="footer-foot text-center">
            <p>© 2015 WOLVERINE TEMPLATE. DESIGNED BY OSTHEMES</p>
          </div>
        </div>
      </footer>
      <!--end site footer-->
    </main>
    
    <script>(function(b,o,i,l,e,r){b.GoogleAsnalyticsObject=l;b[l]||(b[l]=function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;e=o.createElement(i);r=o.getElementsByTagName(i)[0];e.src='../../www.google-analytics.com/analytics.js';r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));ga('create','UA-57387972-1');ga('send','pageview');</script>
    <script>setTimeout(function(){var a=document.createElement("script"); var b=document.getElementsByTagName("script")[0]; a.src=document.location.protocol + "//script.crazyegg.com/pages/scripts/0040/7412.js?" + Math.floor(new Date().getTime() / 3600000);a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);</script>
  </body>

<!-- Mirrored from demo.osthemes.biz/wolverine/portfolio-nospace-4-col.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Oct 2017 22:11:30 GMT -->
</html>
<?php

          if(isset($add_js)):

            foreach($add_js as $js):

        ?>

        <script src="<?=$js?>"></script>

        <?php

            endforeach;

          endif;

        ?>