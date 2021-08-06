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
<div class="banner_inpage contact-bg">
    <div class="auto-container">
        <h2>Contact Us</h2>
    </div>

</div>

<!--About us-->
<div class="inpage_container" style="margin: 0;">
    <div class="index_container">
        <div class="bread-center">
            <ul class="bread-crumb">
                <?php get_breadcrumbs()?>
            </ul>
        </div>
        <div class="row" style="margin: 50px 0 0 0;">
            <div class="section_title">
                <span>CONTACT</span>
                <h2>Get In Touch</h2>
                <hr>
            </div>
            <div class="col-md-4">
                <div class="inpage_right" style="min-height: 170px;">
                    <p><strong>Address</strong></p>
                    <p>45-1 Ramsey Road, Shirley, NY 11967, USA</p>
                </div>

            </div>
            <div class="col-md-4">
                <div class="inpage_right" style="min-height: 170px;">
                    <p><strong>Email</strong></p>
                    <p>info@cd-biosciences.com</p>

                </div>
            </div>
            <div class="col-md-4">
                <div class="inpage_right" style="min-height: 170px;">
                    <p><strong>Phone</strong></p>
                    <p>1-631-372-1052</p>

                </div>
            </div>

        </div>


        <div class="row" style="margin: 0;">
            <div class="section_title" style="display: block; height: auto; overflow: hidden; width: 100%;">
                <h2>Contact Form</h2>
                <hr>
            </div>
            <div class="col-md-12">
                <div class="inpage_right">
                    <div class="inquiry_form">
                        <?php get_template_part('/modules/inquiry-form');?>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<div class="row" style="margin: 0; padding: 0;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3018.250689592404!2d-72.88269758439478!3d40.84441953744048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e85b3ea8d0d4d7%3A0x4db04fcc077413f9!2s45%20Ramsey%20Rd%2C%20Shirley%2C%20NY%2011967!5e0!3m2!1sen!2sus!4v1627526405847!5m2!1sen!2sus" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>


<?php get_footer();?>
