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
    <div class="banner_inpage about-bg">
        <div class="auto-container">
            <h2>About Us</h2>
        </div>
    </div>
    <div class="inpage_container">
        <div class="index_container">
            <div class="bread-center">
                <ul class="bread-crumb">
                    <?php get_breadcrumbs()?>
                </ul>
            </div>
            <div class="row" style="margin: 0; height: auto; overflow: hidden;">
                <div class="titlebg"><h2>About Us</h2></div>
                <div class="col-md-4" style="margin: 0; padding: 0;">
                    <img src="<?php echo get_template_directory_uri();?>/images/aboutimg.jpg" style="max-width: 100%;">
                </div>
                <div class="col-md-8">
                    <p>CD BioSciences is a globally recognized text kits  development company founded by a team of young experts. CD BioSciences has been raising industry standards and providing text kits development services according to customer needs. We have the ability to provide customers with testing reagents for a variety of applications, while reducing costs and maintaining quality.</p>
                    <ul class="ullist disc">
                        <li><strong>Why choose us</strong></li>
                    </ul>
                    <p>CD BioSciences is committed to fulfill all your demands in research of text kits. We provide high-quality reagents to support you in making innovative discoveries. </p>
                    <ul class="ullist disc">
                        <li><strong>Our Mission</strong></li>
                    </ul>
                    <p>Integrate global superior product resources and technical resources to provide scientists with the latest, professional, simple and fast text kits.</p>
                </div>

            </div>
            <ul class="ullist disc">
                <li><strong>Our Vision</strong></li>
            </ul>
            <p>Promote breakthroughs in life science research through our products.</p>

            <div class="section_title">
                <h2>Our Strengths</h2>
                <hr>
            </div>
            <p style="text-align: center;"><img src="<?php echo get_template_directory_uri();?>/images/aboutbottom.png"></p>
        </div>

    </div>

<?php echo get_footer()?>