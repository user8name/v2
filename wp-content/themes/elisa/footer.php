<div class="footer-box">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 mbottom30">
                        <h4>Navigation</h4>
                        <ul class="foot-ul">
                            <li><a href="#">Electronic Chemicals Services </a> </li>
                            <li><a href="#">About Us</a> </li>
                            <li><a href="#">Contact Us</a> </li>
                        </ul>
                    </div>
                    <div class="col-md-6 mbottom30">
                        <h4>Address</h4>
                        <p>45-1 Ramsey Road, Shirley, NY 11967, USA</p>
                        <h4>Email</h4>
                        <p><a href="#">info@cd-biosciences.com</a> </p>
                        <h4>Phone</h4>
                        <p>1-631-372-1052</p>
                    </div>
                    <div class="col-md-6 mbottom30">
                        <a href="#" id="back-top">Back to Top</a>
                    </div>
                    <div class="col-md-6 share-box mbottom30">
                        <a href="#">Facebook</a>
                        <a href="#">Linkedin</a>
                        <a href="#">Twitter</a>
                        <a href="#"> blog</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-md-offset-1">
                <h4>Contact Us</h4>
                <div  class="row foot-form">
                    <form  name="form-inquiry" autocomplete="off" method="post" action="/inquiryinfo">
                        <div class="form-group col-md-6">
                            <input type="text" name="I_1-Contact_Information-Name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="I_1-Contact_Information-Email" class="form-control validate[required,custom[email]]" placeholder="Email *">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="topic" rows="3" class="form-control validate[required]" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="identify-box">
                                <input type="text" class="form-control validate[required]" name="vcode" placeholder="Verification Code *">
                                <span class="check-fa  icon-check checkright" style="display:none"></span>
                                <span class="check-fa  icon-false checkerror" style="color: red;"></span>
                                <img src="<?php echo get_template_directory_uri();?>/images/identifyingcode.gif" style="vertical-align:middle;cursor:pointer;" onclick="javascript: this.src = '/async/identifyingcode?token=FORMINQUIRY&amp;t=' + Math.random()" alt="Verification code" title="Click refresh">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="inquiry-submit">SUBMIT</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="container">
            Copyright © 2007 - <script type="text/javascript">document.write((new Date()).getFullYear())</script> CD BioSciences. All rights reserved
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/respond.min.js?v=1.6"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/delighters.js?v=1.6"></script>
<script src="<?php echo get_template_directory_uri();?>/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var navli= $("ul.navbar-nav li").has("ul");
        navli.addClass("dropdown");
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