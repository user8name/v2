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
<div class="second-banner" style="background: url(<?php echo get_template_directory_uri();?>/images/contact-us-bg.jpg) no-repeat  center;background-size: cover;">
    <div class="container">
        <div class="second-box" >
            <div class="second-title">
                <h2>Contact Us</h2>
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
                <div class="contact-form">
                    <div  class="row">
                        <div class="col-md-12">
                            <div class="row contact-form">
                                <?php get_template_part('/modules/contact-form');?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row contact-box">
                    <div class="col-md-5">
                        <span class="icon-address-4"></span>
                        <h4>Corporate Office</h4>
                        <p>45-1 Ramsey Road, Shirley, NY 11967, USA</p>
                    </div>
                    <div class="col-md-4">
                        <span class="icon-phone-4"></span>
                        <h4>Tel</h4>
                        <p>1-631-372-1052</p>
                    </div>
                    <div class="col-md-3">
                        <span class="icon-email-4"></span>
                        <h4>Email</h4>
                        <p><a href="mailto:info@cd-biosciences.com">info@cd-biosciences.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>
