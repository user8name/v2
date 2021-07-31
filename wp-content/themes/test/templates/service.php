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
<div class="second-banner" style="background: url(<?php echo get_template_directory_uri();?>/images/services-bg.jpg) no-repeat  center;background-size: cover;">
    <div class="container">
        <div class="second-box" >
            <div class="second-title">
                <h2><?php  the_title();?></h2>
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
                    <h2 class="text-title">Lab Testing Services</h2>
                    <p class="title-p">With the advancement of gene sequencing technology, the cross-scientific application of bioinformatics and big data, gene technology has led human science research into a new era. </p>
                </div>
                <div class="service-box">
                    <div class="row">
                        <div class="col-md-6 mbottom40">
                            <h3 class="services-title"><a href="#">Custom synthesis service</a> </h3>
                            <p>With the advancement of gene sequencing technology, the cross-scientific application of bioinformatics and big data, gene technology has led human science research into a new era. With the establishment of various gene resource databases, the biological characteristics of our genes and their correlation The genetic information will have a deeper and more comprehensive understanding, so that multiple sets of systems and methods can be established for gene sequencing research.</p>
                            <p class="learn-more"><a href="#">Learn More</a> </p>
                        </div>
                        <div class="col-md-5 col-md-offset-1 mbottom40">
                            <img src="<?php echo get_template_directory_uri();?>/images/services-pic-1.jpg"  class="img-responsive">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <img src="<?php echo get_template_directory_uri();?>/images/services-pic-2.jpg"  class="img-responsive">
                        </div>
                        <div class="col-md-6  col-md-offset-1">
                            <h3 class="services-title"><a href="#">Custom synthesis service</a> </h3>
                            <p>With the advancement of gene sequencing technology, the cross-scientific application of bioinformatics and big data, gene technology has led human science research into a new era. With the establishment of various gene resource databases, the biological characteristics of our genes and their correlation The genetic information will have a deeper and more comprehensive understanding, so that multiple sets of systems and methods can be established for gene sequencing research.</p>
                            <p class="learn-more"><a href="#">Learn More</a> </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>
