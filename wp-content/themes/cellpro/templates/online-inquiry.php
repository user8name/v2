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

    <section class="banner_inpage services_bg" style="background-image: url(<?php echo get_template_directory_uri();?>/images/inquirybg.jpg);" >
        <div class="banner-table">
            <div class="banner-table-cell">
                <div class="auto-container">
                    <h1>Online Inquiry</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="<?php echo home_url();?>">Home</a></li> <li>Online Inquiry</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <div class="container services-container index-iconbg">
        <div class="container-box">
            <h2 class="h2-box-center" style="margin-bottom: 15px;">Online Inquiry</h2>
            <p class="text-center">We are always ready to solve all your problems</p>
            <h3>Online Inquiry</h3>
            <div class="container-left">
                <div class="inquirybox">
                    <?php get_template_part('/modules/inquiry-form')?>
                </div>
            </div>
            <div class="container-right">
                <div class="contact-information">
                    <h4>Don't Hesitate to contact us for any kind of information</h4>
                    <?php get_template_part('/modules/right-contact-us');?>
                </div>
            </div>

        </div>
    </div>
<?php get_footer()?>