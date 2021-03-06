<?php
/**
 * Created by PhpStorm.
 * User: lirenjun
 * Date: 2019/9/20
 * Time: 9:38
 */


//require dirname(__FILE__).'/inc/category-upt.php';
add_filter('custom_page_title_baner',function (){
    $title='404 Not Found';
    return $title;
},10,1);

get_header();
?>
<div class="second-banner" style="background: url(<?php echo get_template_directory_uri();?>/images/services-bg.jpg) no-repeat  center;background-size: cover;">
    <div class="container">
        <div class="second-box" >
            <div class="second-title">
                <h2>404 Not Found</h2>
            </div>
        </div>
    </div>
</div>
<div class="bread-box">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo home_url();?>"><span class="icon-home"></span>  Home</a></li>  <li>404 Not Found</li>
        </ol>
    </div>
</div>
<div class="container nomain-service nomain-content">
    <div class="container-box">
        <div class="e404" style="text-align: center;">
            <img src="<?php echo get_template_directory_uri();?>/images/404.jpg" alt="404"/>
            <h3>Sorry, but page was not found</h3>
            <p>You may have mistyped the address or the page may have moved.</p>
            <p><a href="<?php echo home_url();?>" class="btn">Back to home</a> <a href="<?php echo home_url();?>/about-us.html" class="btn">About Us</a> <a href="<?php echo home_url();?>/contact-us.html" class="btn">Contact Us</a></p>
        </div>
    </div>
</div>
<?php
get_footer();
?>
