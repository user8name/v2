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
    <div class="second-banner" style="background: url(<?php echo get_template_directory_uri();?>/images/about-us-bg.jpg) no-repeat center;background-size: cover;">
        <div class="container">
            <div class="second-box" >
                <div class="second-title">
                    <h1><?php the_title();?></h1>
                </div>
            </div>
        </div>
    </div>


    <div class="bread-box">
        <div class="container">
            <ol class="breadcrumb">
                <?php get_breadcrumbs()?>
            </ol>
        </div>
    </div>
    <div class="content-box">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-box">
                        <h2 class="text-title">About Us</h2>
                    </div>
                    <div class="service-box">
                        <div class="row mbottom30">
                            <div class="col-md-6">
                                <img src="<?php echo get_template_directory_uri();?>/images/About-Us.jpg" class="img-responsive"/>
                            </div>
                            <div class="col-md-6">
                                <p><strong>CD  BioSciences</strong>  is  a trusted reagent supply and service-provider CRO company founded in New York.  CD BioSciences  provides high-quality reagents and comprehensive services and is committed to  developing and manufacturing a variety of ELISA Kits. Its research fields cover  cancer, infectious diseases, metabolic diseases, and other research fields.We  have advanced technology and equipment, as well as a professional research  team. We are proud to offer comprehensive ELISA Kits products, customized ELISA  Kits services, and professional ELISA testing services for customers all over  the world.</p>
                                <p>CD BioSciences  is working to be a world well-known ELISA Kits provider with products and  services.</p>
                            </div>
                        </div>
                        <h3>Why Choose Us</h3>
                        <p>CD BioSciences is committed to fulfilling all your demands in ELISA Kits. We provide high-quality products and comprehensive solutions to support you in making innovative discoveries.</p>
                         <div class="row about-box">
                             <div class="col-md-4">
                                 <p><span class="icon-award"></span></p>
                                 <h4>Committed to Quality</h4>
                                 <p>We put quality first. We provide high-quality products, services and solutions to support customers worldwide.</p>
                             </div>
                             <div class="col-md-4">
                                 <p><span class="icon-handshake"></span></p>
                                 <h4>Standardized Procedures</h4>
                                 <p>Developed and processed with the highest standard, we always deliver results on time without compromising quality.</p>
                             </div>
                             <div class="col-md-4">
                                 <p><span class="icon-file-alt"></span></p>
                                 <h4>One-stop Services</h4>
                                 <p>Intended to save time and reduce cost for our clients, we provide extensive services to meet their needs.</p>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo get_footer()?>