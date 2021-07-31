<?php
/**
 * Created by PhpStorm.
 * User: lirenjun
 * Date: 2019/1/10
 * Time: 12:08
 */



$cid = get_query_var('cat');


$cat = get_category($cid);

function custom_page_title_baner(){
    global $cat;
    $title=html_entity_decode($cat->cat_name);
    return $title;
}

add_filter('custom_page_title_baner','custom_page_title_baner',10,1);


add_filter('custom-inquiry-title',function (){
    global $cat;
    $title=strip_tags(html_entity_decode($cat->cat_name));
    return $title;

},10,1);

function banener_img($banner_img){
    $banner_img='/images/productsbg.jpg';
    global $cat;
    $img=get_option("banner-pic-{$cat->cat_ID}");
    if($img){
        $banner_img=$img;
    }
    return $banner_img;
}
add_filter('custom_banner_img','banener_img',10,1);

function custom_get_canonical_url($url){
    global $cid;
    return  '<link rel="canonical" href="' . get_category_link($cid) . '" />' . "\n";
}
add_filter('custom_get_canonical_url','custom_get_canonical_url');


get_header();
?>
<div class="second-banner" style="background: url(<?php echo get_template_directory_uri();?>/images/products-bg.jpg)  center;background-size: cover;">
    <div class="container">
        <div class="second-box" >
            <div class="second-title">
                <h2><?php echo apply_filters('custom_page_title_baner','');?></h2>
            </div>
        </div>
    </div>
</div>
<div class="bread-box">
    <div class="container">
        <ol class="breadcrumb">
            <?php get_breadcrumbs();?>
        </ol>
    </div>
</div>

<div class="content-box">
    <div class="container">
        <div class="row">
            <div class="title-box">
                <h2 class="text-title"><?php echo apply_filters('custom_page_title_baner','');?></h2>
            </div>

<!--
                <?php
/*                $arg_ca=[
                    'type' => 'post',
                    'hide_empty'=>false,
                    'taxonomy'=>'category',
                    'parent'=>$cid,
                    'depth'=>1,            //类别深度。用于制表符缩进。默认值为0
                ];
                $cats=get_categories($arg_ca);

                */?>
                <?php /*if ($cats):*/?>
                    <div class="product-box">
                        <div class="row">
                        <?php /*foreach ($cats as $v):
                            if (get_option("cat-is-show-{$v->term_id}") != 0) {
                                continue;
                            }
                            if (is_main_domain() && get_option("cat_audit-{$v->term_id}") == 0){
                                continue;
                            }
                            $href= esc_url( get_term_link( $v->term_id, 'category' ) );
                            if (get_option("cat_open-{$v->term_id}") == 1) {
                                $href="javascript:void(0);";
                            }
                            */?>
                            <div class="col-md-6">
                                <a href="<?php /*echo $href;*/?>"><?php /*echo html_entity_decode($v->cat_name);*/?> </a>
                            </div>
                        <?php /*endforeach;*/?>
                        </div>
                    </div>
                <?php /*else:*/?>
                    <?php
/*                    global $wpdb;
                    $page = $_REQUEST["page"]??1;
                    if ($page == null) {
                        $page = 1;
                    }
                    $pagesize=20;

                    $total = intval($wpdb->get_var($wpdb->prepare('SELECT COUNT(1) FROM `'.$wpdb->prefix.'products` WHERE (`cid`=%d or `cid1`=%d or `cid2`=%d ) and `isdel`=%d', [$cid,$cid,$cid,0])));

                    $rows = $wpdb->get_results($wpdb->prepare('SELECT `id`,`cid`,`cid1`,`cid2`,`cat`,`cas`,`size`,`productname`,`detail` FROM `'.$wpdb->prefix.'products` WHERE (`cid`=%d or `cid1`=%d or `cid2`=%d ) and `isdel`=%d order by cat limit ' . (($page - 1) * $pagesize) . ',' . $pagesize, [$cid,$cid,$cid,0]));
                    $pagenavstr='';
                    if ($total > $pagesize){
                        $pager = new pager($total,$page,10,'',3,$pagesize); // $pager

                        $pagenavstr = $pager->showpager();
                    }

                    */?>
                    <?php /*if ($rows):*/?>
                        <div class="col-md-3">
                            <div class="side-filter">
                                <h3>Filter Results <a href="#">Clear All</a></h3>
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title" data-toggle="collapse"  data-target="#collapseOne">
                                                <span class="icon-plus-circle"></span> Product Type <a  class="filter-clear" role="button" href="#">Clear</a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> ELISA Kit
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Application Kit
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Others
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> ELISA Kit

                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Application Kit
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Others
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> ELISA Kit

                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Application Kit
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Others
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> ELISA Kit

                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Application Kit
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Others
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title" data-toggle="collapse" data-target="#collapseTwo">
                                                <span class="icon-plus-circle"></span>  Protein/Target <a href="#" class="filter-clear">Clear</a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="optionsRadios" value="option1">
                                                        HIF-1 alpha (5)
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="optionsRadios"  value="option2">
                                                        Beclin 1 (3)
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="optionsRadios"  value="option3">
                                                        APE (2)
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="optionsRadios" value="option4">
                                                        HIF-1 alpha (5)
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="optionsRadios"  value="option5">
                                                        Beclin 1 (3)
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="optionsRadios"  value="option6">
                                                        APE (2)
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title" data-toggle="collapse" data-target="#collapseThree">
                                                <span class="icon-plus-circle"></span>  Reactivity <a href="#" class="filter-clear">Clear</a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <p class="mbottom20"><input type="text" class="form-control" placeholder="Search"></p>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> ELISA Kit

                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Application Kit
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Others
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> ELISA Kit

                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Application Kit
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Others
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> ELISA Kit

                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Application Kit
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Others
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="filter-group">
                                <span class="crumbs-handle">Application: fc <a class="filter-close" href="">× </a></span>
                                <span class="crumbs-handle">Target/Gene: ada <a class="filter-close" href="">× </a></span>
                            </div>
                            <div class="table-responsive" style="margin-top: 25px;">

                                <table class="pro-table" id="table-breakpoint">
                                    <thead>
                                    <tr>
                                        <th width="110">Name</th>
                                        <th>Sensitivity</th>
                                        <th>Assay Range</th>
                                        <th class="text-center" width="80">Sample Type</th>
                                        <th>Duration</th>
                                        <th>Price</th>
                                        <th>Inquiry</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php /*foreach ($rows as $k=>$v):
                                        $url = home_url().'/'.sanitize_title(preg_replace( '/[^A-Za-z0-9\-\s\-]/', '', $v->productname)) . '-item-'.$v->id.'.html';

                                        */?>
                                        <tr>
                                            <td><?php /*echo $v->cat;*/?></td>
                                            <td><a href="<?php /*echo $url;*/?>"><?php /*echo $v->productname;*/?></a></td>
                                            <td><?php /*echo $v->size;*/?></td>
                                            <td><?php /*echo $v->size;*/?></td>
                                            <td><?php /*echo $v->size;*/?></td>
                                            <td><?php /*echo $v->size;*/?></td>
                                            <td><a href="<?php /*echo home_url();*/?>/online-inquiry.html?t=(<?php /*echo $v->cat;*/?>) <?php /*echo $v->productname;*/?>">Inquiry</a> </td>
                                        </tr>
                                    <?php /*endforeach;*/?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="product-page">
                                <ul class="pagination">
                                    <?php /*echo $pagenavstr;*/?>
                                </ul>
                            </div>
                        </div>
                    <?php /*endif;*/?>
                --><?php /*endif;*/?>

            <div class="col-md-9">
                <div class="service-box">
                    <div class="product-one">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#">Composition </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#">Application </a>
                            </div>
                        </div>
                    </div>

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
            <div class="col-md-3">
                <div class="side-box">
                    <h3 class="side-title">Online Inquiry</h3>
                    <?php get_template_part('/modules/right-form');?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer();?>
