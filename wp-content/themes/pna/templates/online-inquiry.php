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
  
	<div class="nomain-banner">
    <img src="<?php echo get_template_directory_uri();?>/images/inquiry-banner.jpg" alt="about-banner">

    <div class="nomain-banner-mess">
        <h2><?php the_title();?></h2>
        <ul class="breadcrumb container">
           <?php get_breadcrumbs()?>
        </ul>
    </div>
</div>
<div class="contact container">

    <div class="inquiry-first" >
        <div>
            <h3>Online Inquiry</h3>
       <?php get_template_part('/modules/inquiry-form')?>
        </div>
    </div>



</div>

<?php get_footer()?>