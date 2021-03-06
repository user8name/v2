<?php

function custom_get_canonical_url1($url){
    return  '<link rel="canonical" href="' . home_url() . '" />' . "\n";
}



add_filter('custom_get_canonical_url','custom_get_canonical_url1');
get_header();
?>

<h1 class="pageheadline">CD BioSciences</h1>
<div class="banner-page">
    <ul>
        <li data-background="<?php  echo  get_template_directory_uri();?>/images/banner-1.jpg">
            <h2>YOUR RELIABLE PARTNER IN GLYCOBIOLOGY RESEARCH</h2>
            <a class="btn" href="#">Learn More</a>
        </li>
        <li data-background="<?php echo get_template_directory_uri();?>/images/banner-2.jpg">
            <h2>WE HOPE TO START THE EXPLORATION OF GLYCOBIOLOGY WITH YOU</h2>
            <a class="btn" href="#">Learn More</a>
        </li>
        <li data-background="<?php echo get_template_directory_uri();?>/images/banner-3.jpg">
            <h2>WE HOPE TO START THE EXPLORATION OF GLYCOBIOLOGY WITH YOU</h2>
            <a class="btn" href="#">Learn More</a>
        </li>
    </ul>
</div>

<div class="container index-iconbg">
    <div class="container-box index-container">
        <div class="row index-about">
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="index-about-box">
                    <img src="<?php echo get_template_directory_uri();?>/images/index-about-5.jpg" alt="Welcome to CD BioSciences"/>
                    <div class="index-about-box1"></div>
                    <div class="index-about-box2"></div>
                </div>
            </div>
            <div class="col-lg-7 col-md-6 col-sm-6">
                <h2 class="h2-box text-left">Welcome to CD BioSciences</h2>
                <p>CD BioSciences is  the world leading  biological company whose mission focuses on the acquisition, authentication, production, and development of standard reference microbial strains, and cell lines.</p>
                <p>CD BioSciences provides life science researchers with high-quality cell products and services, that can improve research results and increase the speed of success. We aim to provide customers with high-satisfaction assistance in life science researches and save time, effort, and money for customers while obtaining perfect data.</p>
                <a rel="nofollow"  class="btn" href="#">Contact Now</a>
            </div>
        </div>
        <div class="row index-platform">
            <div class="col-md-4 col-sm-6">
                <div class="index-platform-box">
                    <div class="index-icon">
                        <img src="<?php echo get_template_directory_uri();?>/images/index-about-2.png" alt="Combination of numerous world-class technology platforms">
                    </div>
                    <h3>Combination of numerous world-class technology platforms</h3>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="index-platform-box">
                    <div class="index-icon">
                        <img src="<?php echo  get_template_directory_uri();?>/images/index-about-3.png" alt="PhD level experienced technicians">
                    </div>
                    <h3>PhD level experienced technicians</h3>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="index-platform-box">
                    <div class="index-icon">
                        <img src="<?php echo get_template_directory_uri();?>/images/index-about-4.png" alt="Powerful and advanced data analysis tools">
                    </div>
                    <h3>Powerful and advanced data analysis tools</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container greybg">
    <div class="container-box index-container">
        <h2 class="h2-box-center">We Provide The Best Products - CELLS</h2>
        <div class="row index-products">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="index-products-box">
                    <div class="index-products-img"><img src="<?php echo get_template_directory_uri();?>/images/index-products-1.jpg" alt="Primary Cells"/></div>
                    <p>Primary Cells</p>
                    <a class="btn" href="#">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="index-products-box">
                    <div class="index-products-img"><img src="<?php echo get_template_directory_uri()?>/images/index-products-2.jpg" alt="Stable Cells"/></div>
                    <p>Stable Cells</p>
                    <a class="btn" href="#">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="index-products-box">
                    <div class="index-products-img"><img src="<?php echo get_template_directory_uri()?>/images/index-products-3.jpg" alt="Immortalized Primary Cells"/></div>
                    <p>Immortalized Primary Cells</p>
                    <a class="btn" href="#">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="index-products-box">
                    <div class="index-products-img"><img src="<?php echo get_template_directory_uri();?>/images/index-products-4.jpg" alt="Fluorescent Cells"/></div>
                    <p>Fluorescent Cells</p>
                    <a class="btn" href="#">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="index-products-box">
                    <div class="index-products-img"><img src="<?php echo get_template_directory_uri();?>/images/index-products-5.jpg" alt="Engineered Cells"/></div>
                    <p>Engineered Cells</p>
                    <a class="btn" href="#">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="index-products-box">
                    <div class="index-products-img"><img src="<?php echo get_template_directory_uri();?>/images/index-products-6.jpg" alt="Stem Cells"/></div>
                    <p>Stem Cells</p>
                    <a class="btn" href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container index-iconbg index-services-iconbg">
    <div class="container-box index-container">
        <h2 class="h2-box-center">MICROBIAL STRAINS</h2>
        <div class="row index-services">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="index-services-box">
                    <div class="index-servicesicon"><img src="<?php echo get_template_directory_uri();?>/images/index-service1.png" alt="Bacteria"/></div>
                    <h3><a href="#">Bacteria</a></h3>
                    <p>CD BioSciences provides comprehensive glycomic analysis services, including qualitative, quantitative and sequencing of glycans, etc.</p>
                    <a class="btn" href="#">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="index-services-box">
                    <div class="index-servicesicon"><img src="<?php echo  get_template_directory_uri();?>/images/index-service2.png" alt="Archaea"/></div>
                    <h3><a href="#">Archaea</a></h3>
                    <p>CD BioSciences can provide one-stop service from glycoprotein enrichment to structural analysis.</p>
                    <a class="btn" href="#">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="index-services-box">
                    <div class="index-servicesicon"><img src="<?php echo  get_template_directory_uri();?>/images/index-service3.png" alt="Plasmids"/></div>
                    <h3><a href="#">Plasmids</a></h3>
                    <p>The high-quality glycolipid services provided by CD BioSciences mainly include the separation and profiling of glycolipids.</p>
                    <a class="btn" href="#">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="index-services-box">
                    <div class="index-servicesicon"><img src="<?php echo  get_template_directory_uri();?>/images/index-service4.png" alt="Fungi & Yeasts"/></div>
                    <h3><a href="#">Fungi & Yeasts</a></h3>
                    <p>CD BioSciences provides many analysis services for plant polysaccharides, cell walls, starch and other common plant carbohydrates.</p>
                    <a class="btn" href="#">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="index-services-box">
                    <div class="index-servicesicon"><img src="<?php echo  get_template_directory_uri();?>/images/index-service5.png" alt="Bacteriophages"/></div>
                    <h3><a href="#">Bacteriophages</a></h3>
                    <p>The high-quality glycosaminoglycan services provided by CD BioSciences mainly include the separation and structural analysis of glycosaminoglycans.</p>
                    <a class="btn" href="#">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="index-services-box">
                    <div class="index-servicesicon"><img src="<?php echo  get_template_directory_uri();?>/images/index-service6.png" alt="Cyanobacteria"/></div>
                    <h3><a href="#">Cyanobacteria</a></h3>
                    <p>CD BioSciences' microbial carbohydrate services mainly include analysis of peptidoglycans, lipopolysaccharides and fatty acids. </p>
                    <a class="btn" href="#">Read More</a>
                </div>
            </div>
        
        </div>
    </div>
</div>

<div class="container greybg">
    <div class="container-box index-container">
        <h2 class="h2-box text-left">WE PROVIDE CELL LINE DEVELOPMENT TESTING</h2>
        <div class="row index-about" style="margin: 0">
            <div class="col-lg-8 col-md-7 col-sm-7">
                <p>After genomics and proteomics, glycomics has become a new research focus. With the rapid development of glycobiology, CD BioSciences has built a series of unparalleled carbohydrates research platforms with its long-term insights and professional knowledge. On these platforms, customers can research almost any content of interest, we can also provide innovative research directions according to your needs, or customize one-stop solutions for your project.</p>
                <p>As a pioneer in biotechnology, CD BioSciences has grown into one of the world's largest independent biotechnology companies by discovering, developing, manufacturing high-quality products, services, and solutions. Today we have attracted millions of researchers and partners worldwide, and we continue to expand our global network to provide strong support to more scientists.</p>
                <a class="btn" href="#">Read More</a>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-5">
                <div class="row index-solutions">
                    <img src="<?php echo  get_template_directory_uri();?>/images/index-solutions-1.png"/>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer()?>