<?php

function custom_get_canonical_url1($url){
    return  '<link rel="canonical" href="' . home_url() . '" />' . "\n";
}
add_filter('custom_get_canonical_url','custom_get_canonical_url1');
get_header();
?>
    <main>
     
        <div class="temp_empty">
        </div>
       <div class="temp_empty">
    </div>
    <h1 style="display: none">PNA</h1>
    <div class="banner-carousel">
        <div class="operate left">
            <span class="fa fa-angle-left"></span>
        </div>
        <div class="operate right">
            <span class="fa fa-angle-right"></span>
        </div>
        <ul class="carousel-content">
            <li style="opacity: 0;position: relative;z-index:-1;">
                <img src="<?php echo get_template_directory_uri();?>/images/main-banner1.jpg">
            </li>
            <li>
                <img src="<?php echo get_template_directory_uri();?>/images/main-banner1.jpg" alt="PNA Biotech">
                <div class="carousel-contentMess">

                    <h2>PNA Biotech</h2>
                    <P>A leading provider of PNA biotechnology, committed to  meet our customers' needs, and ensure service quality.</P>
                    <a href="/contact-us.html" class="banner-btn">LEARN MORE</a>
                </div>
            </li>
            <li>
                <img src="<?php echo get_template_directory_uri();?>/images/main-banner2.jpg" alt="PNA Biotech">
                <div class="carousel-contentMess">
                    <h2>PNA Biotech</h2>
                    <P>Providing the broadest set of products and services for PNA biotechnology.</P>
                    <a href="" class="banner-btn">Learn More</a>
                </div>
            </li>

        </ul>
    </div>

    <div class="main-content">
        <div class="mainfirst container">
         <h3 class="titleStyle">Our Products</h3>
            <ul class="graphic-display">
                <li>
                    <a>
                        <div>
                            <img src="<?php echo get_template_directory_uri();?>/images/main-pc-1.jpg" alt="PNA FISH Probe">
                        </div>
                        <h4> PNA FISH Probe
                        </h4>
                    </a>
                </li>
                <li>
                    <a>
                        <div>
                            <img src="<?php echo get_template_directory_uri();?>/images/main-pc-2.jpg" alt="PNA FISH Probe">
                        </div>
                        <h4> Fmoc PNA Monomer

                        </h4>
                    </a>
                </li>
                <li>
                    <a>
                        <div>
                            <img src="<?php echo get_template_directory_uri();?>/images/main-pc-3.jpg" alt="PNA FISH Probe">
                        </div>
                        <h4>  PNA miRNA Inhibitor

                        </h4>
                    </a>
                </li>
                <li>
                    <a>
                        <div>
                            <img src="<?php echo get_template_directory_uri();?>/images/main-pc-4.jpg" alt="PNA FISH Probe">
                        </div>
                        <h4> PNA Clamp Kit

                        </h4>
                    </a>
                </li>
                <li>
                    <a>
                        <div>
                            <img src="<?php echo get_template_directory_uri();?>/images/main-pc-5.jpg" alt="PNA FISH Probe">
                        </div>
                        <h4> Globin Reduction PNA
                        </h4>
                    </a>
                </li>
                <li>
                    <a>
                        <div>
                            <img src="<?php echo get_template_directory_uri();?>/images/main-pc-6.jpg" alt="PNA FISH Probe">
                        </div>
                        <h4> Gamma PNA
                        </h4>
                    </a>
                </li>
            </ul>
        </div>
        <div class="indexproducts">
            <div class="maincon container">
                <h3 class="titleStyle">Our Services</h3>

                <div class="main-service">
                    <ul class="mainService-list">
                        <li>
                            <a>
                                <img src="<?php echo get_template_directory_uri();?>/images/service-icon1.jpg">
                                <p> PNA Design</p>
                            </a>
                        </li>
                        <li>
                            <a>
                                <img src="<?php echo get_template_directory_uri();?>/images/service-icon2.jpg">
                                <p>  PNA Modifications</p>
                            </a>
                        </li>
                        <li>
                            <a>
                                <img src="<?php echo get_template_directory_uri();?>/images/service-icon3.jpg">
                                <p> Custom PNA Probes</p>
                            </a>
                        </li>
                        <li>
                            <a>
                                <img src="<?php echo get_template_directory_uri();?>/images/service-icon4.jpg">
                                <p> PNA Synthesis</p>
                            </a>
                        </li>
                        <li>
                            <a>
                                <img src="<?php echo get_template_directory_uri();?>/images/service-icon5.jpg">
                                <p> PNA Analog Synthesis</p>
                            </a>
                        </li>
                    </ul>
                    <div class="mainService-img">
                        <img src="<?php echo get_template_directory_uri();?>/images/mainService.jpg" alt="Our Services">
                    </div>
                </div>

            </div>
        </div>


        <div class="mains5 container">
            <h3 class="titleStyle"> Solutions</h3>
            <p>
                CD Biosciences is committed to supporting and promoting PNA biology research in a wide spectrum of fields.

            </p>
            <div class="mains5li">
                <ul class="main-applications">
                    <li><a href="">
                        <img src="<?php echo get_template_directory_uri();?>/images/Home-Solutions-1.jpg" alt="PNA Drug Development">
                        <div>
                            <h3> PNA Drug Development
                            </h3>
                            <p class="hollow-btn">Learn More</p>
                        </div>
                    </a></li>
                    <li><a href="">
                        <img src="<?php echo get_template_directory_uri();?>/images/Home-Solutions-2.jpg" alt="Cellular Delivery for PNA">
                        <div>
                            <h3>Cellular Delivery for PNA</h3>
                            <p class="hollow-btn">Learn More</p>
                        </div>
                    </a></li>
                    <li><a href="">
                        <img src="<?php echo get_template_directory_uri();?>/images/Home-Solutions-3.jpg" alt=" Diagnosis and Detection">
                        <div>
                            <h3> Diagnosis and Detection</h3>
                            <p class="hollow-btn">Learn More</p>
                        </div>
                    </a></li>
                    <li><a href="">
                        <img src="<?php echo get_template_directory_uri();?>/images/Home-Solutions-4.jpg" alt="PNA-Based Biosensors">
                        <div>
                            <h3>PNA-Based Biosensors</h3>
                            <p class="hollow-btn">Learn More</p>
                        </div>
                    </a></li>
                </ul>
            </div>
        </div>

    </div>
       
    </main>

<?php get_footer()?>