<?php
/**
 * Created by PhpStorm.
 * User: lirenjun
 * Date: 2019/12/27
 * Time: 10:18
 */
function custom_inquiry_title()
{
    $title = get_the_title(get_the_ID());
    $title = strip_tags($title);
    return $title;
}

add_filter('custom-inquiry-title', 'custom_inquiry_title', 10, 1);
function custom_page_title_baner()
{
    $title = get_the_title(get_the_ID());
    return $title;
}

add_filter('custom_page_title_baner', 'custom_page_title_baner', 10, 1);

function banener_img($banner_img='')
{
    $img = get_post_meta(get_the_ID(), 'bannerImg', true);
    $imgs = get_stylesheet_directory().$img;
    if(file_exists($imgs)) {
        $banner_img = get_template_directory_uri().$img;
    } else {
        $banner_img = get_template_directory_uri().'/images/service-banner.jpg';
    }

    return $banner_img;
}
add_filter('custom_banner_img', 'banener_img', 10, 1);
function custom_page_txt_baner($bannerText)
{
    $bannerText = get_post_meta(get_the_ID(), 'bannerText', true);

    return $bannerText;
}

add_filter('custom_page_txt_baner', 'custom_page_txt_baner', 10, 1);

get_header();
?>
    <div class="nomain-banner">
<!--        <img src="--><?php //echo get_template_directory_uri();?><!--/images/service-banner.jpg" alt="about-banner">-->
        <img src="<?php echo apply_filters('custom_banner_img',get_template_directory_uri().'/images/service-banner.jpg');?>" alt="about-banner">

        <div class="nomain-banner-mess">
            <h2><?php the_title();?></h2>
			  <ul class="breadcrumb container">
            <?php get_breadcrumbs()?>
        </ul>
        </div>
    </div>
   
    <div class="nomain-content container ">
        <div class="nomain-service gridrow-layout">
            <div class="layout-left">
<!--                <div class="navi-layout">-->
<!--                    --><?php //get_template_part('/modules/left-service');?>
<!--                </div>-->
                <?php get_template_part('/modules/left-form');?>
            </div>

            <div class="layout-right">
                <h2><?php echo the_title(); ?></h2>
                <a href="<?php echo home_url();?>/online-inquiry.html?t=<?php the_title();?>" class="new-nuka-btn" data-text="INQUIRY" id="inquiry">INQUIRY</a>
                <?php
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>