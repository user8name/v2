<?php

function custom_get_canonical_url1($url){
    return  '<link rel="canonical" href="' . home_url() . '" />' . "\n";
}
add_filter('custom_get_canonical_url','custom_get_canonical_url1');
get_header();
?>
    <div class="banner-page">
        <ul>
            <li data-background="<?php echo get_template_directory_uri();?>/images/banner-1.jpg">
                <h2 aos="fade-up" aos-delay="400">Featured Products</h2>
                <p>We provide customers with various text kits, using the most sophisticated technology and delivering the results at the fastest speed and lowest cost.</p>
                <p><a class="btn" href="">Learn More</a></p>
            </li>
            <li data-background="<?php echo get_template_directory_uri();?>/images/banner-2.jpg">
                <h2 aos="fade-up" aos-delay="400">Welcome to Your Text Kits Research Center</h2>
                <p>Consectetur adipisicing elit sed do ei usmod tempor incididunt. Enim minim veniam, quis nostrud exer citation ullamco laboris commodo conse inquat duis aute irure dolor.</p>
                <p><a class="btn" href="">Learn More</a></p>
            </li>

            <li data-background="<?php echo get_template_directory_uri();?>/images/banner-3.jpg">
                <h2 aos="fade-up" aos-delay="400">Welcome to Your Text Kits Research Center</h2>
                <p>Consectetur adipisicing elit sed do ei usmod tempor incididunt. Enim minim veniam, quis nostrud exer citation ullamco laboris commodo conse inquat duis aute irure dolor.</p>
                <p><a class="btn" href="">Learn More</a></p>
            </li>
        </ul>
    </div>


    <!--service index-->
    <div class="indexaboutbg">
        <div class="index_container">
            <div class="row">
                <div class="col-md-6" style="padding: 120px 0 120px 20px;">
                    <h2 class="title-name">Welcome to Your Text Kits Research Center</h2>
                    <p><strong>CD BioSciences</strong> is committed to fulfill all your demands in research of text kits. We provide high-quality reagents to support you in making innovative discoveries. </p>
                </div>
                <div class="col-md-6"></div>

            </div>

        </div>

    </div>
    <!--service1 index-->
    <div class="index_container">
        <div class="section_title">
            <!--<span>SERVICES</span>-->
            <h2>Featured Products</h2>
            <hr>
        </div>

        <ul class="main-solution-mess">
            <li>
                <div class="main-solution-img">
                    <img src="<?php echo get_template_directory_uri();?>/images/Food-safety-text-kits.jpg" alt="Food safety text kits">
                </div>
                <div class="main-solution-title">
                    <h3>Food safety text kits</h3>
                    <ul>
                        <li><a href="#">Mycotoxin</a></li>
                        <li><a href="#">Antibiotic Residues </a></li>
                        <li><a href="#">Hormone/Additives</a></li>
                        <li><a href="#">Pesticide Residues</a></li>
                        <li><a href="#">Veterinary drug residue</a></li>
                        <li><a href="#">Pathogens</a></li>
                        <li><a href="#">Heavy Metal</a></li>
                        <li><a href="#">Marine Biotoxins</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="main-solution-img">
                    <img src="<?php echo get_template_directory_uri();?>/images/Animal-disease-text-kits.jpg" alt="Animal disease text kits">
                </div>
                <div class="main-solution-title">
                    <h3>Animal disease text kits</h3>
                    <ul>
                        <li><a href="#">Companion Animals</a></li>
                        <li><a href="#">Farm Animals</a></li>
                        <li><a href="#">Ruminantsr</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="main-solution-img">
                    <img src="<?php echo get_template_directory_uri();?>/images/Environmental-protection-text-Kits.jpg" alt="Environmental protection text Kits">
                </div>
                <div class="main-solution-title">
                    <h3>Custom Assay Development</h3>
                    <ul>
                        <li><a href="#">Microbiome text Kits</a></li>
                        <li><a href="#">Environmental Test Kits</a></li>

                    </ul>
                </div>
            </li>

            <li>
                <div class="main-solution-img">
                    <img src="<?php echo get_template_directory_uri();?>/images/Plant-disease-diagnosis-text-Kits.jpg" alt="Plant disease diagnosis text Kits">
                </div>
                <div class="main-solution-title">
                    <h3>Plant disease diagnosis text Kits</h3>
                    <ul>
                        <li><a href="#">GMO / Trait Tests</a></li>
                        <li><a href="#">Insect Diagnostics</a></li>
                        <li><a href="#">Pathogen Tests</a></li>
                        <li><a href="#">Plant Hormones & Proteins</a></li>
                        <li><a href="#">Test Kits by Crop</a></li>
                    </ul>
                </div>
            </li>

            <li>
                <div class="main-solution-img">
                    <img src="<?php echo get_template_directory_uri();?>/images/In-vitro-diagnostic-test-Kits.jpg" alt="In vitro diagnostic test Kits">
                </div>
                <div class="main-solution-title">
                    <h3><em>In vitro</em> diagnostic test Kits</h3>
                    <ul>
                        <li><a href="#">Enzyme-linked immunosorbent assay reagents</a></li>
                        <li><a href="#">Rapid Tests</a></li>
                    </ul>
                </div>
            </li>
        </ul>

    </div>

    <div class="container loc_quote_wrapper">
        <div class="index_container">

            <div class="section_title">
                <!--<span>SERVICES</span>-->
                <h2>Our advantage</h2>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-3"><img src="<?php echo get_template_directory_uri();?>/images/01-img.jpg"></div>
                <div class="col-md-9">We have gathered young experts to join our team.  They have developed specific skills and expertise for the production of high-quality text kits. We use the current front-end technology and knowledge in the field of life sciences to develop testing reagents</div>
            </div>

            <div class="row">
                <div class="col-md-3"><img src="<?php echo get_template_directory_uri();?>/images/02-img.jpg"></div>
                <div class="col-md-9">Our experienced teams are committed to  provide your successful text kits with the latest, professional, simple and fast text kits and to meeting your evolving needs, which can increase your testing satisfaction.</div>
            </div>

            <div class="row">
                <div class="col-md-3"><img src="<?php echo get_template_directory_uri();?>/images/03-img.jpg"></div>
                <div class="col-md-9">We committed to fulfill all your demands in research of text kits with  high-quality reagents. Our products cover a wide range of research fields including food safety, animals disease, environmental protection, plant disease and  human disease.</div>
            </div>


        </div>
    </div>

<?php get_footer()?>