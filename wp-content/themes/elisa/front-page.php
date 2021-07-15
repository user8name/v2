<?php

//网站SEO
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
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <a href="#" style="background: url(<?php echo get_template_directory_uri();?>/images/banner-1.jpg) no-repeat center bottom fixed;background-size: cover;"></a>
                <div class="carousel-caption">
                    <h1> <a href="#">Lynch & Powell<br>Trading Consultants</a></h1>
                    <p>TURNING YOUR VISION INTO PROFIT</p>
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
                <a href="#" style="background: url(<?php echo get_template_directory_uri();?>/images/banner-1.jpg) no-repeat center bottom fixed;background-size: cover;"></a>
                <div class="carousel-caption">
                    <h1> <a href="#">DISCOVERY MORE<br> ABOUT OUR SERVICES</a></h1>
                    <p>Complete cell biology function identification program to provide customers with effective support</p>
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
                <a href="#" style="background: url(<?php echo get_template_directory_uri();?>/images/banner-1.jpg) no-repeat center bottom fixed;background-size: cover;"></a>
                <div class="carousel-caption">
                    <h1> <a href="#">DISCOVERY MORE<br> ABOUT OUR SERVICES</a></h1>
                    <p>We advocate customer-centricity and focus on customer needs and expectations to maximize customer benefits</p>
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
            <div class="index-title">
                <h2>Our Products</h2>
                <p>The high-quality electronic chemical products we provide have provided services to many companies in the fields of semiconductors,<br>
                    integrated circuits, displays, batteries, etc., and have triggered technological innovation in many fields.</p>
            </div>
        </div>
        <div class="index-one-box">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <a href="#">
                            <p><span class="icon-OLED"></span></p>
                            <p>OLED and PLED / Liquid Crystals </p>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#">
                            <p><span class="icon-Solar"></span></p>
                            <p>Solar / Photovoltaic Materials / Battery Materials</p>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#">
                            <p><span class="icon-OFET"></span></p>
                            <p>OFET / Solution Deposition Precursors / Vapor Deposition Precursors / Chemicals for Semiconductors</p>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#">
                            <p><span class="icon-Self-Assembly"></span></p>
                            <p>Self Assembly and Contact Printing</p>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#">
                            <p><span class="icon-Acids-bases"></span></p>
                            <p>Acids & bases / Solvents / Etchants / Photoresists / Gases</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="index-two">
        <div class="container">
            <h2>Why<br>
                Choose Us</h2>
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="#">
                                <span class="icon-Clean-Experimental-Environment"></span>
                                <h3>Clean Experimental Environment</h3>
                                <p>I'm a paragraph. Click here to add your own text and edit me. It's easy. Just click "Edit Text" or double click me to add your own content and make changes to the font.</p>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="#">
                                <span class="icon-Professional-R-D-team"></span>
                                <h3>Professional R&D team</h3>
                                <p>I'm a paragraph. Click here to add your own text and edit me. It's easy. Just click "Edit Text" or double click me to add your own content and make changes to the font.</p>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="#">
                                <span class="icon-Customer-Focused-Mindset"></span>
                                <h3>Customer-focused Mindset</h3>
                                <p>I'm a paragraph. Click here to add your own text and edit me. It's easy. Just click "Edit Text" or double click me to add your own content and make changes to the font.</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="index-three">
        <div class="container">
            <div class="index-title">
                <h2>Our Services</h2>
                <p>The high-quality electronic chemical products we provide have provided services to many companies in the fields of semiconductors,<br>
                    integrated circuits, displays, batteries, etc., and have triggered technological innovation in many fields.</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a href="#">
                        <span class="icon-Custom-Synthesis"></span>
                        <h3>Custom Synthesis</h3>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#">
                        <span class="icon-Analysis-and-Testing-Service"></span>
                        <h3>Analysis and Testing Service</h3>
                    </a>
                </div>
            </div>
        </div>

    </div>

<?php get_footer()?>