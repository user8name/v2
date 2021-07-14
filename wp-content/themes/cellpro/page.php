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

    <section class="banner_inpage services_bg"
             style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/servicesbg.jpg);">
        <div class="banner-table">
            <div class="banner-table-cell">
                <div class="auto-container">
                    <h1><?php the_title(); ?></h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="<?php home_url(); ?>">Home</a></li>
                        <li><?php the_title(); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container services-container index-iconbg index-services-iconbg">
        <div class="container-box">
            <div class="left-container">
                <div class="side-box">
                    <div class="side-content">

                        <?php get_template_part('/modules/left-service')?>
                    </div>
                </div>
                <div class="side-box">
                    <div class="side-headline">Online Inquiry</div>
                    <div class="inquirybox">
                        <?php get_template_part('/modules/inquiry-form')?>
                    </div>
                </div>
            </div>
            <div class="right-container">
                <div class="row service-tit">
                    <div class="col-md-9 col-lg-9">
                        <h2><?php echo the_title(); ?></h2>
                    </div>
                    <div class="col-md-3 col-lg-3"><a rel="nofollow" class="btn pro_btn"
                                                      href="<?php echo  home_url();?>/online-inquiry.html?t=<?php echo the_title()?>">Inquiry</a>
                    </div>
                </div>
                <?php
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>