<?php
/**
 * Created by PhpStorm.
 * User: lirenjun
 * Date: 2019/9/20
 * Time: 9:38
 */



add_filter('custom_page_title_baner',function (){
    $title='404 Not Found';
    return $title;
},10,1);

get_header();
?>

<section class="banner_inpage services_bg" style="background-image: url(<?php echo get_template_directory_uri();?>/images/servicesbg.jpg);" >
    <div class="banner-table">
        <div class="banner-table-cell">
            <div class="auto-container">
                <h1>404 Not Found</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="<?php home_url();?>">Home</a></li> <li>404 Not Found</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container nomain-service nomain-content">
    <div class="container-box">
        <div class="e404">
            <img src="<?php echo get_template_directory_uri();?>/images/404.jpg" alt="404"/>
            <h3>Sorry, but page was not found</h3>
            <p>You may have mistyped the address or the page may have moved.</p>
            <p><a href="<?php echo home_url();?>" class="btn">Back to home</a> <a href="<?php home_url();?>/about-us.html" class="btn">About Us</a> <a href="<?php home_url();?>/contact-us.html" class="btn">Contact Us</a></p>
        </div>
    </div>
</div>
<?php
get_footer();
?>
