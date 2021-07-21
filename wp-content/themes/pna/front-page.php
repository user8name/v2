<?php

function custom_get_canonical_url1($url){
    return  '<link rel="canonical" href="' . home_url() . '" />' . "\n";
}
add_filter('custom_get_canonical_url','custom_get_canonical_url1');
get_header();
?>
    <main>
        <div class="virus_headerobj"></div>
        <div class="temp_empty">
        </div>
        <h1 style="display: none">kinase-phosphatase-biology</h1>
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
                    <img src="<?php echo get_template_directory_uri();?>/images/main-banner1.jpg" alt="Kinase/Phosphatase Biology">
                    <div class="carousel-contentMess">

                        <h2>Kinase/Phosphatase Biology</h2>
                        <h3>Empowering basic research and drug development width the broadest set of products and services.</h3>
                        <a href="/contact-us.html" class="banner-btn">GET STARTED</a>
                    </div>
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri();?>/images/main-banner2.jpg" alt="Solutions">
                    <div class="carousel-contentMess">
                        <h2>Solutions
                        </h2>
                        <h3>Accelerating your journey to success with expertise and tailored solutions.</h3>
                        <a href="" class="banner-btn">Learn More</a>
                    </div>
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri();?>/images/main-banner3.jpg" alt="Platforms">
                    <div class="carousel-contentMess">
                        <h2>Platforms
                        </h2>

                        <h3>Equipped with cutting-edge platforms and equipment.</h3>
                        <a href="" class="banner-btn">Learn More</a>
                    </div>
                </li>
            </ul>
        </div>

        <div class="main-content">
            <div class="mainfirst container">
                <div class="mains1left fl" >
                    <h2>Who Are We?</h2>
                    <p>CD BioSciences is a leading customer-focused biotechnology company dedicated to providing the broadest set of products and services to empower kinase/phosphatase research and drug development. Equipped with cutting-edge platforms and equipment, CD BioSciences offers tailored solutions to accelerate your journey to success.
                    </p>
                    <a href="/about-us.html">Learn More</a>
                </div>
                <div class="mains1right fr">
                    <img src="<?php echo get_template_directory_uri();?>/images/Home-Who-Are-We.png" alt="Who Are We"/>
                </div>
            </div>
            <div class="indexproducts">
                <div class="maincon container">
                    <div class="maintitle">
                        <h2>Explore Our Products</h2>
                        <p>CD BioSciences offers the broadest set of products for kinase/phosphatase biology.</p>
                    </div>
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
                                <li><a href=""><img src="<?php echo get_template_directory_uri();?>/images/Home-Products-Cells-&-Tissues.jpg" alt="Cells-&-Tissues"><span>Cells&Tissues</span></a></li>
                                <li><a href=""><img src="<?php echo get_template_directory_uri();?>/images/Home-Products-Cloning-&-Expression.jpg" alt="Cloning-&-Expression"><span>Cloning&Expression</span></a></li>
                                <li><a href=""><img src="<?php echo get_template_directory_uri();?>/images/Home-Products-Peptides-Proteins-Enzymes.jpg" alt="Peptides-Proteins-Enzymes"><span>Peptides Proteins Enzymes</span></a></li>
                            </ul>
                            <ul>
                                <li><a href=""><img src="<?php echo get_template_directory_uri();?>/images/Home-Products-Small-Molecules.jpg" alt="Small-Molecules"><span>Small Molecules</span></a></li>
                                <li><a href=""><img src="<?php echo get_template_directory_uri();?>/images/Home-Products-Miscellaneous.jpg" alt="Miscellaneous"><span>Miscellaneous</span></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="indexservices">
                <div class="maincon container">
                    <div class="row-layout" style="align-items: normal">
                        <div class="main-service-title">
                            <h3><a href="">Our<br> Services</a>
                            </h3>
                        </div>
                        <ul class="main-service-list">
                            <li><a href="">
                                    <img src="<?php echo get_template_directory_uri();?>/images/Home-Services-1.png" alt="Molecular Biology">
                                    <span>Molecular Biology</span>
                                </a></li>
                            <li><a href="">
                                    <img src="<?php echo get_template_directory_uri();?>/images/Home-Services-2.png" alt="Protein/Peptide Services">
                                    <span>Protein/Peptide Services</span>
                                </a></li>
                            <li><a href="">
                                    <img src="<?php echo get_template_directory_uri();?>/images/Home-Services-3.png" alt="Custom Antibody Services">
                                    <span>Custom Antibody Services</span>
                                </a></li>
                            <li><a href="">
                                    <img src="<?php echo get_template_directory_uri();?>/images/Home-Services-4.png" alt="In Vitro Functional Assays">
                                    <span>In Vitro Functional Assays</span>
                                </a></li>
                            <li><a href="">
                                    <img src="<?php echo get_template_directory_uri();?>/images/Home-Services-5.png" alt="In Vivo Functional Assays">
                                    <span>In Vivo Functional Assays</span>
                                </a></li>
                            <li><a href="">
                                    <img src="<?php echo get_template_directory_uri();?>/images/Home-Services-6.png" alt="Assay Development Services">
                                    <span>Assay Development Services</span>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="indexssolutions">
                <div class="maincon container">
                    <div class="row-layout main-solution" style="align-items: normal">
                        <ul class="main-solution-list">
                            <li><a href="">
                                    <img src="<?php echo get_template_directory_uri();?>/images/Home-Solutions-1.jpg" alt="Screening & Profiling">
                                    <p><span class="">→</span><label>Screening & Profiling</label></p>
                                </a></li>
                            <li><a href="">
                                    <img src="<?php echo get_template_directory_uri();?>/images/Home-Solutions-2.jpg" alt="Chemical Research">
                                    <p><span class="">→</span>Chemical Research</p>
                                </a></li>
                            <li><a href="">
                                    <img src="<?php echo get_template_directory_uri();?>/images/Home-Solutions-3.jpg" alt="Drug Discovery & Development">
                                    <p><span class="">→</span>Drug Discovery & Development</p>
                                </a></li>
                            <li><a href="">
                                    <img src="<?php echo get_template_directory_uri();?>/images/Home-Solutions-4.jpg" alt="Solution Customization">
                                    <p><span class="">→</span>Solution Customization</p>
                                </a></li>
                        </ul>
                        <div class="main-service-title">
                            <h3><a href="">Our<br> Solutions</a>
                            </h3>
                        </div>

                    </div>
                </div>
            </div>
            <div class="indexschoose">
                <p>Are you ready to get started?</p>
                <a class="btn-normal" href="contact-us.html">LET’S GO</a>
            </div>
            <div class="mains5 container">
                <div class="maintitle">
                    <h2>Applications</h2>
                    <p style="text-align:center;">CD Biosciences is committed to supporting and promoting kinase/phosphatase biology research in a wide spectrum of fields.</p>
                </div>
                <div class="mains5li">
                    <ul class="main-applications">
                        <li><a href="">
                                <img src="<?php echo get_template_directory_uri();?>/images/Home-Applications-1.jpg" alt="">
                                <div>
                                    <h3>Life Sciences Research
                                    </h3>
                                    <p>Lorem ipsum dolor sit amet, et nam copiosae expetenda, eos falli libris urbanitas eu, ut vim malorum.</p>
                                    <p class="hollow-btn">Learn More</p>
                                </div>
                            </a></li>
                        <li><a href="">
                                <img src="<?php echo get_template_directory_uri();?>/images/Home-Applications-2.jpg" alt="">
                                <div>
                                    <h3>Disease Research</h3>
                                    <p>Lorem ipsum dolor sit amet, et nam copiosae expetenda, eos falli libris urbanitas eu, ut vim malorum.</p>
                                    <p class="hollow-btn">Learn More</p>
                                </div>
                            </a></li>
                        <li><a href="">
                                <img src="<?php echo get_template_directory_uri();?>/images/Home-Applications-3.jpg" alt="">
                                <div>
                                    <h3>Diagnostics</h3>
                                    <p>Lorem ipsum dolor sit amet, et nam copiosae expetenda, eos falli libris urbanitas eu, ut vim malorum.</p>
                                    <p class="hollow-btn">Learn More</p>
                                </div>
                            </a></li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="virus_footer">
        </div>
    </main>
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery-3.1.1.min.js"></script>

<?php get_footer()?>