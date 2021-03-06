<?php
/**
 * Template Name: contact-us
 */
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

get_header();

?>
    <section class="banner_inpage contact_bg" style="background-image: url(<?php echo get_template_directory_uri();?>/images/contactbg.jpg);" >
        <div class="banner-table">
            <div class="banner-table-cell">
                <div class="auto-container">
                    <h1><?php  the_title();?></h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="<?php echo home_url();?>">Home</a></li> <li><?php  the_title();?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

<div class="container contact-container index-iconbg">
    <div class="container-box">
        <h2 class="h2-box-center">Get In Touch</h2>
        <div class="row contact-row-box">
        <div class="col-md-4">
                <h4>Phone</h4>
                <ul class="list-style-two">
                    <li><span class="fa fa-phone"></span> <span id="xload-g" class="xload-tel" data-file="<?php echo get_template_directory_uri();?>/_noindex/ajax/2dd2e32c96396fb6" data-scroll="false"></span><script>$(function () { $("#xload-g").xload(); });</script><noscript><img src="<?php echo get_template_directory_uri();?>/_noindex/phone.svg" alt="phone" style="height: 17px;display: inline-block;margin-top: 3px;"></noscript></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Email</h4>
                <ul class="list-style-two">
                    <li><span class="fa fa-envelope"></span> <span id="xload-ge" class="xload-tel" data-file="<?php echo get_template_directory_uri();?>/_noindex/ajax/786a0b4a39efab23" data-scroll="false"></span><script>$(function () { $("#xload-ge").xload(); });</script><noscript><a class="email-info"></a></noscript></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Address</h4>
                <ul class="list-style-two">
                    <li><span class="fa fa-map-marker"></span> <span id="xload-ga" class="xload-tel" data-file="<?php echo get_template_directory_uri();?>/_noindex/ajax/999fc47a3c2694e4" data-scroll="false"></span><script>$(function () { $("#xload-ga").xload(); });</script><noscript><span class="fa fa-map-marker"></span> <img src="<?php echo get_template_directory_uri();?>/_noindex/address.svg" alt="address" style="height: 40px;display: inline-block;margin-top: 3px;"></noscript></li>
                </ul>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-5">
                <div class="contact-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3018.2479359986746!2d-72.8827687!3d40.84448!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e85b3eaece06a3%3A0xf401c910ffd3fba1!2s45%20Ramsey%20Rd%2C%20Shirley%2C%20NY%2011967%2C%20USA!5e0!3m2!1sen!2s!4v1582350823401!5m2!1sen!2s" width="100%" height="420" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1"><div class="contact-line"></div></div>
            <div class="col-lg-7 col-md-7 col-sm-6">
               <?php get_template_part('/modules/inquiry-form')?>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>
