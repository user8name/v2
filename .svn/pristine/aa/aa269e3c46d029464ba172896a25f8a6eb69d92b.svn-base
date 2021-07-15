<?php
/**
 * Template Name: services
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
            <div class="navi-layout">
                <?php get_template_part('/modules/left-service');?>
            </div>
            <?php get_template_part('/modules/left-form');?>
        </div>
        <div class="layout-right">
            <h2><?php  echo  the_title();?></h2>
            <p>
                Successfully! Thank you for your interest in career opportunities at CD BioSciences.
                 We have successfully received your online application.
                Our HR staff will review your application and qualifications. You will be contacted by us
                if your background and experiences are a match to our current job opportunity. 
            </p>
            <a href="<?php echo home_url();?>/online-inquiry.html?t=<?php  echo  the_title();?>" class="new-nuka-btn" data-text="INQUIRY" id="inquiry">INQUIRY</a>
            <p>CD BioSciences relies on leading technology platform, first-class R&D platform, excellent team and rich experience to serve the field of agricultural molecular breeding.
                We are adhering to the best service attitude and the most professional technology to be the best research assistant for customers-everything is customer-centric,
                to provide you with personalized products and services. </p>

            <ul class="twoPicShow">
                <li>
                    <a href="">
                        <img src="<?php echo get_template_directory_uri();?>/images/3-4-In-Vitro-Structural-and-Functional-Characterization-Figure-1.png" alt="Custom cDNA Cloning Services">
                        <h3>Structure Characterization</h3>
                        <p>Structural characterization of kinase/phosphatase family has made a significant contribution to our understanding of molecular mechanisms regulating their activity. <b>CD BioSciences</b> has a team of experienced scientists capable of providing different primary and higher-order structural characterization strategies for various types of samples based on our advanced technology platform.</p>
                        <p class="hollow-btn">Learn More</p>
                    </a>
                </li>
                <li>
                    <a>
                        <img src="<?php echo get_template_directory_uri();?>/images/3-4-In-Vitro-Structural-and-Functional-Characterization-Figure-2.png" alt="Custom ORF Cloning Services">
                        <h3>In Vitro Kinase Screening & Profiling</h3>
                        <p>Kinase screening and profiling techniques covering multiple assay formats are powerful tools for identifying kinase-interacting substrate, potential drug targets, and novel drug candidates. <b>CD BioSciences</b> has established an integrated kinase screening & profiling platform with the largest portfolio of kinase assays, enabling our scientific team to offer customized services to meet your individual needs.
                        </p>
                        <p class="hollow-btn">Learn More</p>
                    </a>
                </li>
                <li>
                    <a>
                        <img src="<?php echo get_template_directory_uri();?>/images/3-4-In-Vitro-Structural-and-Functional-Characterization-Figure-3.png" alt="Custom ORF Cloning Services">
                        <h3><i>In Vitro</i> Phosphatase Screening & Profiling</h3>
                        <p>New and creative methods have been developed for phosphatase screening and profiling to address specific challenges in studying phosphatases. <b>CD BioSciences</b> offers comprehensive services for <i>in vitro</i> phosphatase screening and profiling to support our customers’ cutting-edge research and accelerate their journey to success.
                        </p>
                        <p class="hollow-btn">Learn More</p>
                    </a>
                </li>
                <li>
                    <a>
                        <img src="<?php echo get_template_directory_uri();?>/images/3-4-In-Vitro-Structural-and-Functional-Characterization-Figure-4.png" alt="Custom ORF Cloning Services">
                        <h3>Analysis of Phosphorylation <i>In Vitro</i></h3>
                        <p>Phosphorylation is of particular importance in biology because it is a key reaction in protein and enzyme function, glycolysis, and energy storage and release. <b>CD BioSciences</b> provides expertise and experience in the comprehensive analysis of phosphorylation <i>in vitro</i> to support the study of sophisticated phosphorylation events.
                        </p>
                        <p class="hollow-btn">Learn More</p>
                    </a>
                </li>
                <li class="contact_">
                    <img src="<?php echo get_template_directory_uri();?>/images/3-4-In-Vitro-Structural-and-Functional-Characterization-Figure-5.png" alt="contact">
                    <a href="">
                        <h3>Can’t find what you’re looking for?</h3>
                        <p>Contact Us</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php get_footer();?>
