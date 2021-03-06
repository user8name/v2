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
<div class="nomain-banner">
    <img src="<?php echo get_template_directory_uri();?>/images/service-banner.jpg" alt="about-banner">

    <div class="nomain-banner-mess">
        <h2>404 Not Found</h2>
        <ul class="breadcrumb container">
            <li><a class="fa fa-home" href="<?php echo home_url();?>">&nbsp;Home</a></li>  <li>404 Not Found</li>        </ul>
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
