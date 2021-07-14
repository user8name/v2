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
        <h2><?php  echo  the_title();?></h2>
    </div>
</div>
<ul class="breadcrumb container">
    <li><a href="<?php home_url();?>" class="fa fa-home">&nbsp;Home</a></li>
    <li><a href="">&nbsp;<?php  echo  the_title();?></a></li>
</ul>
<div class="contact container">

    <div class="row-layout" style="justify-content: flex-start;align-items: flex-start;margin: 20px 0;">
        <div style="margin-right:40px;width:40%;" class="contact-mess">
            <h3>Connect with us</h3>
            <p>For support or any questions:</p>
            <p>Email us at <a href="">info@cd-biosciences.com</a></p>
        </div>
        <div>
            <h3>USA</h3>
            <ul class="cap-mess">
                <li class="cap-mess-address">
                    45-1 Ramsey Road, Shirley, NY11967, USA
                </li>
                <li class="cap-mess-tel">
                    Tel :&nbsp1-631-372-1052
                </li>

            </ul>
        </div>
    </div>
    <h3 style="color:rgba(134,80,175,1)">Get In Touch</h3>
    <p>Please fill out the quick form and we will be in touch with lightening speed.
    </p>
    <form class="inquiry-form">
        <div class="row-layout">
            <div>
                <label>*Name:</label>
                <input type="text" placeholder="Name:">
            </div>
            <div>
                <label>*E-mail:</label>
                <input type="text" placeholder="E-mail:">
            </div>
        </div>
        <div class="row-layout">
            <div>
                <label>*Phone:</label>
                <input type="text" placeholder="Phone:">
            </div>
            <div>
                <label>*Services Interested:</label>
                <input type="text" placeholder="Services Interested:">
            </div>
        </div>
        <div>
            <label>Project Description:</label>
            <textarea rows="4"  placeholder="Project Description:"></textarea>
        </div>

        <div class="row-layout" style="justify-content: flex-start;align-items: flex-end;">
            <div>
                <label>*Verification Code:</label>
                <input type="text" class="validate[required,ajax[ajaxCaptcha]]" name="code" size="15" placeholder="Verification Code">
            </div>
            <img src="<?php home_url();?>/?captcha=1&r=927837190" style="width:120px;height:34px;vertical-align:middle;cursor:pointer;" onclick="javascript: this.src = '<?php home_url();?>/?captcha=1&r=' + Math.random()" alt="Verification code" title="Click refresh">
        </div>
        <button type="submit" class="circle-btn">SEND</button>
    </form>

</div>
<div class="contactmap">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3018.2479359986746!2d-72.8827687!3d40.84448!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e85b3eaece06a3%3A0xf401c910ffd3fba1!2s45%20Ramsey%20Rd%2C%20Shirley%2C%20NY%2011967%2C%20USA!5e0!3m2!1sen!2s!4v1582350823401!5m2!1sen!2s" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<div class="indexschoose">
    <p>Are you ready to get started?</p>
    <a class="btn-normal" href="contact-us.html">LET’S GO</a>
</div>
<?php get_footer();?>
