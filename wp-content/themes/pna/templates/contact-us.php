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

<div class="nomain-banner">
    <img src="<?php echo get_template_directory_uri();?>/images/contact-banner.jpg" alt="about-banner">

    <div class="nomain-banner-mess">
        <h2><?php the_title();?></h2>
        <ul class="breadcrumb container">
            <?php get_breadcrumbs()?>
        </ul>
    </div>
</div>
<div class="contact container">

    <div class="contact-first" >
        <div>
            <h3>Contact Info</h3>
            <ul class="cap-mess">
                <li class="cap-mess-address">
                    <h4>Our Location
                    </h4>
                    45-1 Ramsey Road, Shirley, NY 11967, USA
                </li>
                <li class="cap-mess-email">
                    <h4>Email  Address
                    </h4>
                    <a href="">info@cd-biosciences.com</a>
                </li>
                <li class="cap-mess-tel">
                    <h4>Phone Number
                    </h4>
                    1-631-372-1052
                </li>

            </ul>
        </div>
        <div>
            <h3>Online Inquiry</h3>
			  <?php get_template_part('/modules/inquiry-form');?>
           
    </div>



</div>



</div>
<div class="contactmap">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3018.2479359986746!2d-72.8827687!3d40.84448!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e85b3eaece06a3%3A0xf401c910ffd3fba1!2s45%20Ramsey%20Rd%2C%20Shirley%2C%20NY%2011967%2C%20USA!5e0!3m2!1sen!2s!4v1582350823401!5m2!1sen!2s" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<?php get_footer();?>
