<?php
/**
 * Template Name: Product
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
    <img src="<?php echo get_template_directory_uri();?>/images/product-banner.jpg" alt="about-banner">

    <div class="nomain-banner-mess">
        <h2><?php  echo  the_title();?></h2>
    </div>
</div>
<ul class="breadcrumb container">
    <li><a href="<?php home_url();?>" class="fa fa-home">&nbsp;Home</a></li>
    <li><a href="">&nbsp;<?php  echo  the_title();?></a></li>
</ul>

<div class="nomain-content container ">
    <a href="" class="new-nuka-btn" data-text="INQUIRY" id="inquiry">INQUIRY</a>
    <h2><?php  echo  the_title();?></h2>
    <p>
        Lorem ipsum dolor sit amet, id suavitate adipiscing reprehendunt has. Usu vivendum convenire reprimique an. In est integre fierent convenire, cum mundi oratio at, vim no causae contentiones. Per lorem nobis te, id has dico diceret, eu natum euismod est. Affert lucilius cu mel, munere utroque duo ei. Ut oportere pericula vel, sit ex officiis suscipiantur, nonumy option ex nam. Ad dicit decore senserit sit.
    </p>
    <h3 class="titlePage">Browse Our Catalogue</h3>
    <div class="row-layout" style="justify-content:center;">
        <div style="margin-right:50px;">
            <ul class="main-product-list">
                <li><a>
                        <img src="<?php echo get_template_directory_uri();?>/images/Home-Products-Kinases.png" alt="Kinases">
                        <span>Kinases</span>
                        <div>
                            <h3>Kinases</h3>
                            <p>Browse Kinases Collection</p>
                        </div>
                    </a></li>
                <li><a>
                        <img src="<?php echo get_template_directory_uri();?>/images/Home-Products-Phosphatases.png" alt="Phosphatases">
                        <span>Phosphatases</span>
                        <div>
                            <h3>Phosphatases</h3>
                            <p>Browse Phosphatases Collection</p>
                        </div>
                    </a></li>
            </ul>
        </div>
        <div class="main-product-plat">
            <ul>
                <li><a href=""><img src="<?php echo get_template_directory_uri();?>/images/Home-Products-Antibodies.jpg" alt="Antibodies"><span>Antibodies</span></a></li>
                <li><a href=""><img src="<?php echo get_template_directory_uri();?>/images/Home-Products-Arrays.jpg" alt="Arrays"><span>Arrays</span></a></li>
            </ul>
            <ul>
                <li><a href=""><img src="<?php echo get_template_directory_uri();?>/images/Home-Products-Cells-&-Tissues.jpg" alt="Cells-Tissues"><span>Cells&amp;Tissues</span></a></li>
                <li><a href=""><img src="<?php echo get_template_directory_uri();?>/images/Home-Products-Cloning-&-Expression.jpg" alt="Cloning-Expression"><span>Cloning&amp;Expression</span></a></li>
                <li><a href=""><img src="<?php echo get_template_directory_uri();?>/images/Home-Products-Peptides-Proteins-Enzymes.jpg" alt="Peptides-Proteins-Enzymes"><span>Peptides Proteins Enzymes</span></a></li>
            </ul>
            <ul>
                <li><a href=""><img src="<?php echo get_template_directory_uri();?>/images/Home-Products-Small-Molecules.jpg" alt="Small-Molecules"><span>Small Molecules</span></a></li>
                <li><a href=""><img src="<?php echo get_template_directory_uri();?>/images/Home-Products-Miscellaneous.jpg" alt="Miscellaneous"><span>Miscellaneous</span></a></li>
            </ul>
        </div>
    </div>
</div>
<?php get_footer();?>
