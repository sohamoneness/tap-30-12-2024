<footer>

      <div class="container">

        <div class="row gx-5">

          <div class="col-sm-3">

            <img src="{{ asset('site/images/copywriter_logo_black.png')}}" class="footer_logo">

            <p>Our beautiful designs open the door to a realm of limitless possibilities, where imagination knows no bounds.</p>

          </div>

          <div class="col-6 col-sm-2">
            <h5>Our Links</h5>
            <ul>
                <li><a href="{!! URL::to('v2/features') !!}">Features</a></li>
                <li><a href="{!! URL::to('v2/pricing') !!}">Plans &amp; Pricing</a></li>
                <li><a href="{!! URL::to('v2/marketplace') !!}">Freelancers Marketplace</a></li>
                <li><a href="{!! URL::to('user/login') !!}">Login</a></li>
            </ul>
          </div>

          <div class="col-6 col-sm-2">
            <h5>Markets</h5>
            <ul>
                <li><a href="{!! URL::to('v2/bloggers') !!}">Bloggers</a></li>
                <li><a href="{!! URL::to('v2/employers') !!}">Employers</a></li>
                <li><a href="{!! URL::to('v2/freelancer') !!}">Freelancer</a></li>
                <li><a href="{!! URL::to('v2/publishers') !!}">Publishers</a></li>
                <li><a href="{!! URL::to('v2/in-house-copywriter') !!}">In House Copywriters</a></li>
            </ul>
          </div>

          <div class="col-6 col-sm-2">
            <h5>Quick Links</h5>
            <ul>
                <li><a href="{!! URL::to('v2/knowledge-centre') !!}">Content Hub</a></li>
                <li><a href="{!! URL::to('v2/blog') !!}">Blog</a></li>
                <li><a href="{!! URL::to('v2/glossary') !!}">Glossary</a></li>
                <li><a href="{!! URL::to('v2/tools') !!}">Tools</a></li>
                <li><a href="{!! URL::to('v2/faqs') !!}">FAQs</a></li>
            </ul>
          </div>



          <div class="col-sm-3">

            <h5>Get in touch</h5>

            <ul>

              <li><a href="mailto:support@copywriting.com">support@copywriting.com</a></li>

            </ul>

          </div>

        </div>

      </div>

    </footer>

    <section class="bottom_footer">

      <div class="container">

        <div class="row">

          <div class="col-sm-6">

            <p>Copyright © 2022 Copywriter Pvt. Ltd. All Rights Reserved.</p>

          </div>

          <div class="col-sm-6 text-center text-sm-end">

            <ul>

              <li><a href="#">Terms & Conditions</a></li>

              <li><a href="#">Privacy Policy</a></li>

            </ul>

          </div>

        </div>

      </div>

    </section>



    

    <script>

        $(document).ready(function(){

              $.fn.extend({

              equalizer: function () {

                  var minHeight = 0;

                  $(this).each(function () {

                      if ($(this).outerHeight() > minHeight) {

                          minHeight = $(this).outerHeight()

                      }

                  });

                  $(this).css('min-height', minHeight + 'px')

              }

            });

            $('.blog_area figcaption').equalizer();

            $('.portfolio-v4-education-info').equalizer();

            $('.portfolio-v4-education-info h4').equalizer();

            $('.feature_item').equalizer();

            $('.target_block').equalizer();

            $('.solution_item').equalizer();



            $('.accordian_box:first').addClass('active');

            $('.accordian_box').click(function(){

                if(!$(this).hasClass('active')) {

                    $('.accordian_box.active').removeClass('active');

                    $(this).addClass('active');

                } else {

                    $(this).removeClass('active');

                }

                //$(this).toggleClass('active');

                //$('.accordian_box').not($(this).parent().next()).removeClass('active');;

            });



            var swiper = new Swiper(".mySwiper", {

              slidesPerView: 1,

              spaceBetween: 10,

              pagination: {

                el: ".swiper-pagination",

                clickable: true,

              },

              breakpoints: {

                320: {

                  slidesPerView: 1,

                  spaceBetween: 20,

                },

                768: {

                  slidesPerView: 1,

                  spaceBetween: 40,

                },

                1024: {

                  slidesPerView: 2,

                  spaceBetween: 50,

                },

              },

            });



            var certificate_slider = new Swiper(".certificate_slider", {

              slidesPerView: 1,

              spaceBetween: 10,

              pagination: {

                el: ".swiper-pagination",

                clickable: true,

              },

              breakpoints: {

                320: {

                  slidesPerView: 1,

                  spaceBetween: 20,

                },

                768: {

                  slidesPerView: 1,

                  spaceBetween: 40,

                },

                1024: {

                  slidesPerView: 2,

                  spaceBetween: 50,

                },

              },

            });





            /* PORTFOLIO TAB */

            const portTabs = document.querySelectorAll(".port-tab");

            const portItemLinks = document.querySelectorAll(".portfolio-links-item");



            portTabs.forEach((portTab) => {

              portTab.addEventListener("click", () => {

                portTab.classList.add("active");



                portTabs.forEach((portTab2) => {

                  if (portTab2 != portTab) {

                    portTab2.classList.remove("active");

                  }

                });



                const portData = portTab.getAttribute("data-port");

                console.log(portData);



                portItemLinks.forEach((portItemLink) => {

                  // portItemLink.classList.remove('active')

                  //portItemLink.classList.add("hide");

                  const portItemData = portItemLink.getAttribute('id')



                  if (portItemData == portData) {

                    // portItemLink.classList.remove("hide");

                    //   portItemLink.classList.add('active')

                    portItemLink.classList.add('active')

                  }

                  else {

                    portItemLink.classList.remove('active')

                  }

                });

              });

            });

            /* PORTFOLIO TAB */



            /* PORTFOLIO TAB2 */

            const portTabsv2 = document.querySelectorAll(".portv2-tab");

            const portItemLinksv2 = document.querySelectorAll(".portfolio-links-item");



            portTabsv2.forEach((portTabv2) => {

              portTabv2.addEventListener("click", () => {

                portTabv2.classList.add("active");



                portTabsv2.forEach((portTab2v2) => {

                  if (portTab2v2 != portTabv2) {

                    portTab2v2.classList.remove("active");

                  }

                });



                const portDatav2 = portTabv2.getAttribute("data-portv2-link");

                console.log(portDatav2);



                portItemLinks.forEach((portItemLink) => {

                  // portItemLink.classList.remove('active')

                  portItemLink.classList.add("hide");



                  if (portItemLink.getAttribute("id") == portDatav2 || portDatav2 == "all") {

                    portItemLink.classList.remove("hide");

                    //   portItemLink.classList.add('active')

                  }

                });

              });

            });

            /* PORTFOLIO TAB2 */

            /* PORTFOLIO TAB3 */

            const portTabsv3 = document.querySelectorAll(".portv3-tab");

            const portItemLinksv3 = document.querySelectorAll(".portfoliov3-links-item");



            portTabsv3.forEach((portTabv3) => {

              portTabv3.addEventListener("click", () => {

                portTabv3.classList.add("active");



                portTabsv3.forEach((portTab2v3) => {

                  if (portTab2v3 != portTabv3) {

                    portTab2v3.classList.remove("active");

                  }

                });



                const portDatav3 = portTabv3.getAttribute("data-tab");

                console.log(portDatav3);



                portItemLinks.forEach((portItemLink) => {

                  // portItemLink.classList.remove('active')

                  portItemLink.classList.add("hide");



                  if (portItemLink.getAttribute("id") == portDatav3 || portDatav3 == "all") {

                    portItemLink.classList.remove("hide");

                    //   portItemLink.classList.add('active')

                  }

                });

              });

            });

            /* PORTFOLIO TAB3 */

        });

    </script>

<script>
        $('#currency_select').on('change',function(){
            var currency_id = this.value;            
            $('#currency-select').submit();
        });
    </script>
  </body>

</html>