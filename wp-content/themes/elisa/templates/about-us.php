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
                    <h2><?php  echo  the_title();?></h2>
                </div>
            </div>
        </div>
    </div>


    <div class="bread-box">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="<?php home_url();?>"><span class="icon-home"></span>&nbsp; Home</a></li>
                <li class="active"><?php  echo  the_title();?></li>
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
                        <p>With the advancement of gene sequencing technology, the cross-scientific application of bioinformatics and big data, gene technology has led human science research into a new era. With the establishment of various gene resource databases, the biological characteristics of our genes and their correlation The genetic information will have a deeper and more comprehensive understanding, so that multiple sets of systems and methods can be established for gene sequencing research.</p>
                        <h3>Sample processing</h3>
                        <p>Nucleic acid extraction is the premise of genomics research.CD Bioscience provides users with highly sensitive automatic nucleic acid extraction solutions. It uses a special patented nucleic acid purification technology to ensure that no matter whether low-abundance trace nucleic acid extraction or large-volume nucleic acid concentration and enrichment can be easily achieved.</p>
                        <p>The CD Bioscience automatic nucleic acid extraction platform is compatible with various magnetic bead nucleic acid extraction kits, and can be used for clinical specimens from plasma/serum, whole blood, leukocytes, urine, hydroplegia, saliva, feces, living tissue, paraffin-embedded sections, etc. In the effective extraction of cfDNA/ctDNA, genomic nucleic acid, viral nucleic acid, etc.</p>
                        <p>CD Bioscience unique technology platform can easily extract trace amounts of cfDNA/ctDNA from 200μl to 10ml plasma, with an elution volume as low as 50μl, providing guarantee for accurate nucleic acid detection.</p>
                        <p>From sample extraction to analysis of sequencing results, the entire process can be completed within 2 days.</p>
                        <h4>Sample processing</h4>
                        <p>CD Bioscience Oncomine Lung cfDNA Assay can detect more than 150 mutations including T790M and L858R in genes such as EGFR, KRAS and BRAF, and can detect as low as 0.1% of mutants in samples.</p>
                        <p>In addition to high-throughput sequencing, CD Bioscience also provides CD Bioscience QuantStudio series real-time fluorescent quantitative PCR instrument and CD Bioscience QuantStudio 3D digital PCR instrument, which can be applied to chromosome copy number variation, gene rearrangement detection, gene mutation detection, gene expression detection, etc. Various molecular detection applications.</p>
                        <p>CD Bioscience provides medical institutions and third-party testing companies with integrated solutions for gene sequencing laboratories. It runs through the construction of standard laboratories, the establishment of quality systems, the transfer of high-throughput sequencing technology, equipment and reagents, personnel training and capacity improvement. The follow-up platform software upgrade and other comprehensive service systems provide cooperative customers with practical, feasible and sustainable high-throughput sequencing support work.CD Bioscience has an excellent team of experts that can provide you with customized multi-group experimental design and experimental solutions related to precision medicine, so that you can experience the highest quality, most advanced and most satisfactory service. Scientists who help your research produce rapid results and good results, thereby promoting technological innovation. CD Bioscience, a multi-layer assembly customization service expert can help you conduct scientific research!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo get_footer()?>