<div class="footer-box">
    <div class="container">
        <div class="row">
            <div  class="col-md-3">
                <p><img src="<?php echo get_template_directory_uri();?>/images/logo.png" class="img-responsive" width="250px"></p>
                <div class="foot-form">
                    <form name="form-inquiry" autocomplete="off" method="post" action="<?php echo home_url();?>/pub.html">
                        <input type="email" name="email" class="form-control validate[required,custom[email]]" placeholder="E-Mail">
                        <input type="hidden" name="act" value="send">
                        <input type="hidden" name="bad" value="1">
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-1 mbottom30">
                <h4>Navigation</h4>
                <ul class="foot-ul">
                    <li><a href="<?php  echo  home_url();?>/products.html">ELISA Kits Products</a> </li>
                    <li><a href="<?php  echo  home_url();?>/services.html">Customized Services</a> </li>
                    <li><a href="<?php  echo  home_url();?>/about-us.html">About Us</a> </li>
                    <li><a href="<?php  echo  home_url();?>/contact-us.html">Contact Us</a> </li>
                </ul>
            </div>
            <div class="col-md-4 mbottom30 foot-contact">
                <h4>Contact Us</h4>
                <p><span class="icon-address-map"></span>&nbsp;&nbsp;45-1 Ramsey Road, Shirley, NY 11967, USA</p>
                <p><span class="icon-email-3"></span>&nbsp;&nbsp;<a href="#">info@cd-biosciences.com</a> </p>
                <p><span class="icon-tel-3"></span>&nbsp;&nbsp;1-631-372-1052</p>
            </div>
            <div class="col-md-6 share-box mbottom30">
                <a href="#">Facebook</a>
                <a href="#">Linkedin</a>
                <a href="#">Twitter</a>
                <a href="#"> blog</a>
            </div>
            <div class="col-md-6 mbottom30 text-right">
                <a href="#" id="back-top">Back to Top</a>
            </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="container">
            Copyright © <script type="text/javascript">document.write((new Date()).getFullYear())</script> CD BioSciences. All rights reserved.
        </div>
    </div>
</div>
<script type='text/javascript' src='<?php echo  get_template_directory_uri();?>/_noindex/ajax/jquery.base64.js?ver=1615952188'></script>
<script type='text/javascript' src='<?php echo  get_template_directory_uri();?>/_noindex/ajax/jquery.xload.js?ver=1615952188'></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/respond.min.js?v=1.6"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/delighters.js?v=1.6"></script>
<script src="<?php echo get_template_directory_uri();?>/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var navli= $("ul.navbar-nav>li").has("ul");
        var navlis= $("li.droper").has("ul");
        navli.addClass("dropdown");
        navli.find('span:first').addClass("caret");
        navlis.find('span:first').addClass("caret");
        navli.find('a:first').addClass("dropdown-toggle").attr('data-toggle','dropdown');
        var getWindow = $(window).width();
        $(document).off('click.bs.dropdown.data-api');
        if( getWindow > 1000 ){
            dropdownOpen();
        }
        else {
            $(".head-nav a.dropdown-toggle>.caret", this).on('click', function (e) {
                e.stopPropagation();
                $(this).closest("li.dropdown").find(".dropdown-menu").first().stop().fadeToggle();
                $(this).closest("li.dropdown").first().toggleClass("on");
                return false;
            });

        }

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