<?php
/**
 * Template Name: about-us
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
    <img src="<?php echo get_template_directory_uri();?>/images/about-banner.jpg" alt="about-banner">

    <div class="nomain-banner-mess">
        <h2><?php the_title();?></h2>
        <ul class="breadcrumb container">
           <?php get_breadcrumbs()?>
        </ul>
    </div>
</div>
  

<div class="aboutLayout ">

    <div class="nomain-about about-first container">
        <div class="about-firstImg">
            <img src="<?php echo get_template_directory_uri();?>/images/about-1.jpg"  alt="Who is CD BioSciences">
        </div>

        <div class="about-firstMess">
            <h3 class="about-titleStyle"> Who is CD BioSciences？</h3>
            <p>
                CD BioSciences is a leading biomedical technology company located in New York. The company is committed to providing high-quality products, comprehensive services and solutions for life science research. CD BioSciences is composed of experts in various fields of life sciences and continuously provides professional services to local, domestic and international customers.

            </p>
        </div>
    </div>
    <div class="nomain-about about-second container" style="margin-top: 200px;">
        <div class="">
            <h3 class="about-titleStyle">What We Do</h3>
            <p>
                Peptide nucleic acid, a type of DNA analogue, have many advantages that DNA molecules do not.CD BioSciences provides a full range of PNA products and related services, including but not limited to PNA design, custom synthesis, chemical modification, PNA-based biochemical services and drug development services.
            </p>
        </div>
        <div class="about-secondImg">
            <img src="<?php echo get_template_directory_uri();?>/images/about-2.jpg" alt="What We Do">
        </div>
    </div>
    <div class="aboutmodule2">
        <div class="container">
            <h3 class="about-titleStyle">Why Choose Us?</h3>
            <ul class="about-rowList">
                <li>
                    <h4>Quality Guarantee</h4>
                    <p>
                        Quality is the cornerstone of CD BioSciences’ success. We provide high-quality products, services and solutions to support customers worldwide. Our highly trained staff will strictly implement quality control procedures to deliver customer results on time without compromising quality.

                    </p>
                </li>
                <li>
                    <h4>One-stop Service</h4>
                    <p>
                        We are committed to research in the field of life sciences. We provide a complete set of services, including experiment consulting, design, execution, management, analysis and reporting services. One-stop service that we provide help customers solve problems more easily and quickly.
                    </p>
                </li>
                <li>
                    <h4>Extensive Experience </h4>
                    <p>
                        Our team members have been trained as researchers in top-level universities or scientific research institutions, and have extensive experience in PNA. CD BioSciences will provide professional support to local, national and international clients with excellent team and advanced platform.

                    </p>
                </li>
            </ul>
        </div>

    </div>

</div>
  
<?php get_footer()?>