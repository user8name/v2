<?php
/**
 * Template Name:  online-Inquiry
 */

function custom_inquiry_title()
{
    $title = isset($_REQUEST['t'])?$_REQUEST['t']:'';
    $title = strip_tags($title);
    return $title;
}

add_filter('custom-inquiry-title', 'custom_inquiry_title', 10, 1);
function custom_page_title_baner(){
    $title=get_the_title(get_the_ID());
    return $title;
}

add_filter('custom_page_title_baner','custom_page_title_baner',10,1);

function banener_img($banner_img){
    $img=get_post_meta(get_the_ID(), 'bannerImg', true);
    if($img){
        $banner_img=$img;
    }
    return $banner_img;
}
add_filter('custom_banner_img','banener_img',10,1);
function custom_page_txt_baner($bannerText){
    $bannerText=get_post_meta(get_the_ID(), 'bannerText', true);

    return $bannerText;
}
add_filter('custom_page_txt_baner','custom_page_txt_baner',10,1);

get_header();?>
    <div class="banner_inpage online-bg">
        <div class="auto-container">
            <h2>Online Inquiry</h2>
        </div>

    </div>
    <!--About us-->
    <div class="inpage_container">
        <div class="index_container">

            <div class="row" style="margin-top: 50px;">
                <div class="section_title">
                    <h2>Online Inquiry</h2>
                    <hr>
                </div>
                <div class="col-md-8">

                    <div class="inquiry_form">
                        <?php get_template_part('/modules/inquiry-form');?>
                    </div>


                </div>
                <div class="col-md-4">
                    <div class="inpage_right">

                        <!--left contact-->
                        <p><img src="<?php echo get_template_directory_uri();?>/images/logo.png"></p>
                        <p><strong>Contact Us</strong></p>
                        <ul class="list-style-left">
                            <li><span class="icon fa fa-phone"></span>Tel: 1-631-372-1052</li>
                            <li><span class="icon fa fa-envelope-o"></span>Email: <a class="email-info"></a></li>
                            <p><strong>Address</strong></p>
                            <li><span class="icon fa fa-map-marker"></span>45-1 Ramsey Road, Shirley, NY 11967, USA</li>
                        </ul>
                        <ul class="social-icon-two">
                            <li><a href=""><span class="fa fa-facebook"></span></a></li>
                            <li><a href=""><span class="fa fa-twitter"></span></a></li>
                            <li><a href=""><span class="fa fa-linkedin-square"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php get_footer()?>