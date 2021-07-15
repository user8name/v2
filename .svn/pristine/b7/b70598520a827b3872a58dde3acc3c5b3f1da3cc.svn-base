<?php
/**
 * Template Name: about-us
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
    <div class="nomain-banner">
        <img src="<?php echo get_template_directory_uri();?>/images/about-banner.jpg" alt="about-banner">

        <div class="nomain-banner-mess">
            <h2><?php  echo  the_title();?></h2>
        </div>
    </div>
    <ul class="breadcrumb container">
        <li><a href="<?php home_url();?>" class="fa fa-home">&nbsp;Home</a></li>
        <li><a href="">&nbsp;<?php  echo  the_title();?></a></li>
    </ul>
    <div class="about container">

        <div class="nomain-about row-layout">
            <img src="<?php echo get_template_directory_uri();?>/images/About-Us-Figure-1.jpg" class="left" alt="Our Story">
            <div>
                <h3>Our Story</h3>
                <p>CD BioSciences is a leading customer-focused biotechnology company. We are dedicated to providing high-quality products, comprehensive services, and tailored solutions to support and facilitate life sciences and pharmaceutical research and development. CD BioSciences is fully committed to helping our customers around the world solve any problems encountered in their projects and accelerate their journey to success.
                </p>
            </div>
        </div>
        <div class="nomain-about row-layout">
            <div class="left">
                <h3>What We Do</h3>
                <p>Kinases and phosphatases play a crucial role in biological functions. They control nearly every cellular process and are involved in a wide variety
                    of pathological conditions. With years of accumulated experience, CD BioSciences has built a powerful scientific team and a fully integrated platform
                    for kinase/phosphatase biology to provide one-stop services and customizable solutions to fully meet specific requirements of our customers.
                </p>
            </div>
            <img src="<?php echo get_template_directory_uri();?>/images/About-Us-Figure-2.jpg" alt="What We Do">

        </div>
        <div class="aboutmodule2">
            <h3>Why Choose Us</h3>
            <div>
                <img src="<?php echo get_template_directory_uri();?>/images/About-Us-Figure-3.png" alt="Why Choose Us" style="width:50%;">
            </div>
        </div>

    </div>
    <div class="indexschoose">
        <p>Are you ready to get started?</p>
        <a class="btn-normal" href="contact-us.html">LET’S GO</a>
    </div>
<?php echo get_footer()?>