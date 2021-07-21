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
            <li><a href="<?php echo  home_url(); ?>">Home</a></li>
            <li class="active"><?php  echo  the_title();?></li>
        </ol>
    </div>
</div>
<div class="content-box">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-box">
                    <h2 class="text-title"><?php  echo  the_title();?></h2>
                </div>
                <div class="contact-box">
                    <div class="row mbottom30">
                        <div class="col-md-4">
                            <div class="mtop30 mbottom30">
                                <p><strong>For any inquiries, please call or email:</strong></p>
                                <p><strong>Email</strong></p>
                                <p><a href="#">info@cd-biosciences.com</a> </p>
                                <p><strong>Phone</strong></p>
                                <p>1-631-372-1052</p>
                            </div>
                        </div>
                        <div class="col-md-7 col-md-offset-1 mbottom40">
                            <div class="contact-form">
                                <div  class="row foot-form">
                                    <?php get_template_part('/modules/bottom-form');?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mtop30 mbottom30">
                                <h3>Headquarter</h3>
                                <p><strong>Address: </strong> 45-1 Ramsey Road, Shirley, NY 11967, USA</p>
                                <p><strong>Phone: </strong> 1-631-372-1052</p>
                                <p><strong>Email: </strong> <a href="#">info@cd-biosciences.com</a></p>
                            </div>
                        </div>
                        <div class="col-md-7 col-md-offset-1">
                            <iframe allowfullscreen="" frameborder="0" height="240" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3018.2481191092143!2d-72.8827686845854!3d40.84447597931769!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e85b3eaece06a3%3A0xf401c910ffd3fba1!2s45+Ramsey+Rd%2C+Shirley%2C+NY+11967!5e0!3m2!1sen-US!2sus!4v1501298423546" style="border: 0" width="100%"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>
