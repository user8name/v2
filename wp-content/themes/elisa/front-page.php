<?php

function custom_get_canonical_url1($url){
    return  '<link rel="canonical" href="' . home_url() . '" />' . "\n";
}
add_filter('custom_get_canonical_url','custom_get_canonical_url1');
get_header();
?>
    <div id="carousel-example-generic" class="carousel slide index-slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <a href="#" style="background: url(<?php echo get_template_directory_uri();?>/images/banner-1.jpg) no-repeat center bottom fixed;background-size: cover;"></a>
                <div class="carousel-caption">
                    <h1> <a href="#">ELISA Kits</a></h1>
                    <p>We Use Advanced Equipment And Follow Industry Standards To Provide A Wide Range Of Professional Products.</p>
                    <p>
                    <span class="banner-more">
                         <a href="#">
                             Learn More
                         </a>
                    </span>
                    </p>
                </div>
            </div>
            <div class="item">
                <a href="#" style="background: url(<?php echo get_template_directory_uri();?>/images/banner-2.jpg) no-repeat center bottom fixed;background-size: cover;"></a>
                <div class="carousel-caption">
                    <h1> <a href="#">Professional Customized Services</a></h1>
                    <p>We Use Advanced Equipment And Follow Industry Standards To Provide Professional Customized ELISA Kits And Testing Services.</p>
                    <p>
                    <span class="banner-more">
                         <a href="#">
                             Learn More
                         </a>
                    </span>
                    </p>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        </a>
    </div>

    <div class="index-one">
        <div class="container">
            <h2 class="index-first">Quality/Sensitive/Science</h2>
            <div class="index-title">
                <h2>Products</h2>
                <p>
                    CD Biosciences provides high-quality, rich types of ELISA Kits, and provides you with strong technical support.<br>
                    We want to help you complete your research more easily and efficiently.
                </p>
            </div>
            <div class="first-part">
                <h3>By Applications</h3>
                <div class="row">
                    <div class="col-md-4">
                        <a class="first-by" href="#">
                            <h4><span>General Biology</span></h4>
                            <div class="first-bg" style="background: url(<?php echo get_template_directory_uri();?>/images/Products-General-Biology.png) no-repeat;background-size: cover"></div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="first-by" href="#">
                            <h4><span>Disease Detection</span></h4>
                            <div class="first-bg" style="background: url(<?php echo get_template_directory_uri();?>/images/Products-Disease-Detection.png) no-repeat;background-size: cover"></div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="first-by" href="#">
                            <h4><span>Food Safety</span></h4>
                            <div class="first-bg" style="background: url(<?php echo get_template_directory_uri();?>/images/Products-Food-Safety.png) no-repeat;background-size: cover"></div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="first-by" href="#">
                            <h4><span>Pesticide Residues</span></h4>
                            <div class="first-bg" style="background: url(<?php echo get_template_directory_uri();?>/images/Products-Pesticide-Residues.png) no-repeat;background-size: cover"></div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="first-by" href="#">
                            <h4><span>Biopharmaceutical</span></h4>
                            <div class="first-bg" style="background: url(<?php echo get_template_directory_uri();?>/images/Products-Biopharmaceutical.png) no-repeat;background-size: cover"></div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="first-by" href="#">
                            <h4><span>Immunology</span></h4>
                            <div class="first-bg" style="background: url(<?php echo get_template_directory_uri();?>/images/Products-Immunology.png) no-repeat;background-size: cover"></div>
                        </a>
                    </div>
                </div>
                <h3>By Disease</h3>
                <div class="row">
                    <div class="col-md-3">
                        <a class="first-by" href="#">
                            <h4><span>Cancer</span></h4>
                            <div class="first-bg" style="background: url(<?php echo get_template_directory_uri();?>/images/Products-Cancer.png) no-repeat;background-size: cover"></div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a class="first-by" href="#">
                            <h4><span>Infectious Disease</span></h4>
                            <div class="first-bg" style="background: url(<?php echo get_template_directory_uri();?>/images/Products-infectious-disease.png) no-repeat;background-size: cover"></div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a class="first-by" href="#">
                            <h4><span>Allergy</span></h4>
                            <div class="first-bg" style="background: url(<?php echo get_template_directory_uri();?>/images/Products-Allergy.png) no-repeat;background-size: cover"></div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a class="first-by" href="#">
                            <h4><span>Fertility</span></h4>
                            <div class="first-bg" style="background: url(<?php echo get_template_directory_uri();?>/images/Products-Fertility.png) no-repeat;background-size: cover"></div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="first-by" href="#">
                            <h4><span>Metabolism</span></h4>
                            <div class="first-bg" style="background: url(<?php echo get_template_directory_uri();?>/images/Products-Metabolism.png) no-repeat;background-size: cover"></div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="first-by" href="#">
                            <h4><span>Neuroscience</span></h4>
                            <div class="first-bg" style="background: url(<?php echo get_template_directory_uri();?>/images/Products-Neuroscience.png) no-repeat;background-size: cover"></div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="first-by" href="#">
                            <h4><span>Anemia</span></h4>
                            <div class="first-bg" style="background: url(<?php echo get_template_directory_uri();?>/images/Products-Anemia.png) no-repeat;background-size: cover"></div>
                        </a>
                    </div>
                </div>
                <h3>By ELISA Type</h3>
                <div class="row">
                    <div class="col-md-3">
                        <a class="first-by" href="#">
                            <h4><span>Direct ELISA</span></h4>
                            <div class="first-bg" style="background: url(<?php echo get_template_directory_uri();?>/images/Products-Direct-ELISA.png) no-repeat;background-size: cover"></div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a class="first-by" href="#">
                            <h4><span>Indirect ELISA</span></h4>
                            <div class="first-bg" style="background: url(<?php echo get_template_directory_uri();?>/images/Products-Indirect-ELISA.png) no-repeat;background-size: cover"></div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a class="first-by" href="#">
                            <h4><span>Sandwich ELISA</span></h4>
                            <div class="first-bg" style="background: url(<?php echo get_template_directory_uri();?>/images/Products-Sandwich-ELISA.png) no-repeat;background-size: cover"></div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a class="first-by" href="#">
                            <h4><span>Competitive ELISA</span></h4>
                            <div class="first-bg" style="background: url(<?php echo get_template_directory_uri();?>/images/Products-Competitive-ELISA.png) no-repeat;background-size: cover"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="index-three">
        <div class="container">
            <div class="index-title">
                <h2>Services</h2>
                <p>We provide customized ELISA Kits and professional testing services to meet your needs.</p>
            </div>
            <div class="row">
                <div class="col-md-5 col-md-offset-1">
                    <a href="#">
                        <span class="icon-Custom-Synthesis"></span>
                        <h3>Custom ELISA Kits</h3>
                    </a>
                </div>
                <div class="col-md-5">
                    <a href="#">
                        <span class="icon-Analysis-and-Testing-Service"></span>
                        <h3>ELISA Testing Service</h3>
                    </a>
                </div>
            </div>
        </div>

    </div>

<?php get_footer()?>