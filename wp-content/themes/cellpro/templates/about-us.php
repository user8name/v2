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

<section class="banner_inpage about_bg" style="background-image: url(<?php echo  get_template_directory_uri();?>/images/aboutbg.jpg);" >
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
<div class="container greybg index-iconbg index-services-iconbg aboutbox">
    <div class="container-box index-container">
        <div class="row index-about" style="margin: 0">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="about-show-box">
                    <h2 class="h2-box text-left">About Us</h2>
                    <p>CD BioSciences is a sub-brand of CD BioSciences. We offer a full range of glycobiology-related products, analysis, custom synthesis, and design to advance your glycobiology research. We have provided professional and reliable scientific research assistance to customers from all over the world and received a lot of appreciation.</p>
                    <p>Quality and efficiency are our criteria to evaluate ourselves. Our experienced scientists provide quality services using a large number of advanced instruments. We do not subcontract services in order to guarantee high-quality standards.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-lg-img">
                <div class="index-about-box about-1">
                    <img src="<?php echo get_template_directory_uri();?>/images/about-1.jpg"/>
                    <div class="index-about-box1"></div>
                    <div class="index-about-box2"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container index-iconbg aboutbox-1">
    <div class="container-box index-container">
        <div class="row index-about" style="margin: 0">
            <div class="col-lg-6 col-md-6 col-sm-6 col-lg-img">
                <div class="index-about-box about-2">
                    <img src="<?php echo get_template_directory_uri();?>/images/about-2.jpg"/>
                    <div class="index-about-box1"></div>
                    <div class="index-about-box2"></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="about-show-box">
                    <h2 class="h2-box text-left">Why Choose Us</h2>
                    <p>With innovative perspectives on the design and analysis of glycobiology and other studies, CD BioSciences's unparalleled expertise will help reduce client???s time and cost for the drug development process. To accelerate this process, we believe customization, sharing accessible resources, and a team of different backgrounds will be the key.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo get_footer()?>