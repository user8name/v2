<?php
//var_dump( get_template_directory_uri());exit;
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

function banener_img($banner_img)
{
    $img = get_post_meta(get_the_ID(), 'bannerImg', true);
    if ($img) {
        $banner_img = $img;
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
        <img src="<?php echo get_template_directory_uri();?>/images/service-banner.jpg" alt="about-banner">

        <div class="nomain-banner-mess">
            <h2><?php  echo  the_title();?></h2>
        </div>
    </div>
    <ul class="breadcrumb container">
        <li><a href="<?php home_url();?>" class="fa fa-home">&nbsp;Home</a></li>
        <li><a href="">&nbsp;<?php  echo  the_title();?></a></li>
    </ul>
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
                <a href="<?php echo home_url();?>/online-inquiry.html?t=<?php  echo  the_title();?>" class="new-nuka-btn" data-text="INQUIRY" id="inquiry">INQUIRY</a>
                <?php
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>