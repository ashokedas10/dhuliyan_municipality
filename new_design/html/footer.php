
    <!-- footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="basic-padding">
              <h4>About Dhuliyan Municipality</h4>
              <p>Dhuliyan is a very densely populated Municipality Comprising 21 No. of Wards in Jangipur Sub-Division of Murshidabad District. This Municipality was established in the year 1909 with 9 No. of Wards and population of 8,295.  <a href="about.php">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-3">
                <div class="basic-padding">
                  <h4>Main Links</h4>
                  <ul class="list-unstyled add-icon">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Dhuliyan</a></li>
                    <li><a href="service.php">Services</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3">
                <div class="basic-padding">
                  <h4>Main Links</h4>
                  <ul class="list-unstyled add-icon">
                    <li><a href="administrator.php">Administrator</a></li>
                    <li><a href="tender.php">Tender</a></li>
                    <li><a href="department.php">Department</a></li>
                    <li><a href="projects.php">Projects</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6">
                <div class="basic-padding">
                  <h4>Contact Us</h4>
                  <ul class="list-unstyled">
                    <li style="margin-bottom:10px;">
                      <p><img src="img/icon/envelope.svg" class="icon"> dhuliyanmunicipality@gmail.com <br />  &nbsp; &nbsp; &nbsp;&nbsp; info@dhuliyanmunicipality.in</p>
                    </li>
                    <li style="margin-bottom:10px;">
                      <p><img src="img/icon/call-answer.svg" class="icon"> 03485- 266133</p>
                    </li>
                    <li>
                      <p><img src="img/icon/fax-top-view.svg" class="icon"> 03485 - 265233</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script>
      $(window).load(function(){
        $(".se-pre-con").fadeOut("slow");
      
    });

      $('.slider-banner').owlCarousel({
        loop: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        nav: true,
        items:1,
        dots: false,
        autoplay:false,
        autoplayTimeout: 5000,
        animateOut: 'slideOutLeft',
        animateIn: 'fadeIn',
        // animateOut: 'slideOutDown',
        // animateIn: 'fadeIn',
        smartSpeed: 450
      });

      $('.dhuliyan').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        navText:false,
        items:1,
        dots: false,
        autoplay:true,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        })
    </script>
  </body>
</html>