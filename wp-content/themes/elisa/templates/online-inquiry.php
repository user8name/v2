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
    <div class="second-banner" style="background: url(<?php echo get_template_directory_uri();?>/images/contact-us-bg.jpg) no-repeat center;background-size: cover;">
        <div class="container">
            <div class="second-box" >
                <div class="second-title">
                    <h2>Online Inquiry</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="bread-box">
        <div class="container">
            <ol class="breadcrumb">
                <?php get_breadcrumbs()?>
            </ol>
        </div>
    </div>

    <div class="content-box">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-box">
                        <h2 class="text-title"><?php  the_title();?></h2>
                    </div>
                    <div class="inquiy-part">
                        <?php get_template_part('/modules/inquiry-form')?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer()?>