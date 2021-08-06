<div class="contact_bottom">
    <div class="contact_container">

        <div class="row">

            <div class="col-md-4">
                <p><img src="<?php echo get_template_directory_uri();?>/images/logo.png"></p>
                <p>CD BioSciences is a globally recognized phage company. CD BioSciences is committed to providing researchers with the most reliable service and the most competitive price.</p>

                <ul class="social-icon-two">
                    <li><a href=""><span class="fa fa-facebook"></span></a></li>
                    <li><a href=""><span class="fa fa-twitter"></span></a></li>
                    <li><a href=""><span class="fa fa-linkedin-square"></span></a></li>
                </ul>
            </div>


            <div class="col-md-4">
                <h3>Company</h3>
                <ul class="list-style-two">
                    <li><span class="icon fa fa-phone"></span>Tel: 1-631-372-1052</li>
                    <li><span class="icon fa fa-envelope-o"></span>Email: <a class="email-info" href="mailto:clinicaldisposal.com">info@clinicaldisposal.com</a></li>
                    <li><span class="icon fa fa-map-marker"></span>45-1 Ramsey Road, Shirley, NY 11967, USA</li>
                </ul>
            </div>


            <div class="col-md-4">
                <div class="footer-item">
                    <h3>QUICK LINKS</h3>
                    <p><a href="<?php echo home_url();?>">Home</a></p>
                    <p><a href="<?php echo home_url();?>/products.html">Products</a></p>
                    <p><a href="<?php echo home_url();?>/about-us.html">About Us</a></p>
                </div>
            </div>


        </div>

    </div>
    <div class="cop">Copyright © <script type="text/javascript">document.write((new Date()).getFullYear())</script> CD BioSciences. All rights reserved.</div>
</div>
<div id="topcontrol" title="Go To Up!" style="position: fixed; bottom: 50px; right: 30px; opacity: 1; cursor: pointer;"><div class="scrolltopcontrol"></div></div>
<script type='text/javascript' src='<?php echo  get_template_directory_uri();?>/_noindex/ajax/jquery.base64.js?ver=1615952188'></script>
<script type='text/javascript' src='<?php echo  get_template_directory_uri();?>/_noindex/ajax/jquery.xload.js?ver=1615952188'></script>
<script type="text/javascript">
    $(document).ready(function(){
        var a = 1;
            $(".navi-menu-3>span").click(function (e) {
                if(a==1){
                    $(this).siblings(".navi-menu-4").show();
                    a = 2;
                }else{
                    $(this).siblings(".navi-menu-4").hide();
                    a = 1;
                }
            return false;
        });
        var navli= $("ul.navbar-nav>li").has("ul");
        var navlis= $("ul.navi-menu-3").has("ul");
        navli.find('span:first').addClass("hot");
        navlis.find('span:first').addClass("navi-submenu");
        navli.find('a:first').addClass("dropdown-toggle").attr('data-toggle','dropdown');
        var getWindow = $(window).width();
        $(document).off('click.bs.dropdown.data-api');
        // if( getWindow > 1000 ){
        //     dropdownOpen();
        // }
        // else {
        //     $(".head-nav a.dropdown-toggle>.caret", this).on('click', function (e) {
        //         e.stopPropagation();
        //         $(this).closest("li.dropdown").find(".dropdown-menu").first().stop().fadeToggle();
        //         $(this).closest("li.dropdown").first().toggleClass("on");
        //         return false;
        //     });
        //
        // }

    });
    function dropdownOpen() {
        var $dropdownLi = $('.head-nav li.dropdown');
        $dropdownLi.mouseover(function() {
            $(this).addClass('open');
        }).mouseout(function() {
            $(this).removeClass('open');
        });
    }
    var scrollTopLast = 0;
    window.onscroll=function(e){
        var scrollTop = e.target.scrollingElement.scrollTop;
        if(scrollTop > scrollTopLast){
            $(".head-nav").removeClass("isStuck")
        }else{
            $(".head-nav").addClass("isStuck")
        }
        scrollTopLast = scrollTop;
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(function () {
            $("#back-top").click(function () {
                $('body,html').animate({ scrollTop: 0 }, 1000);
                return false;
            });
        });
    });
</script>

</body>
</html>