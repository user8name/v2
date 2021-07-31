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
    $banner_img='/<?php echo get_template_directory_uri();?>/images/productsbg.jpg';
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
<div class="banner_inpage services_bg">
    <div class="auto-container">
        <h2>Products</h2>
    </div>
</div>
<div class="content-box">
        <div class="row">


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
            <!--About us-->
            <div class="inpage_container">
                <div class="index_container">
                    <div class="bread-center">
                        <ul class="bread-crumb">
                            <?php get_breadcrumbs()?>
                        </ul>
                    </div>
                    <div class="row" style="margin: 30px 0 0 0; height: auto; overflow: hidden;">
                        <div class="index-items index-items-0">
                            <a href="">
                                <div class="col-md-3">
                                    <div class="items-content">
                                        <h2>Food safety text kits</h2>
                                    </div>
                                    <div class="item-blue-bg"></div>
                                    <div class="item-yellow-bg"></div>
                                </div>
                            </a>
                        </div>
                        <div class="index-items index-items-1">

                            <a href="">
                                <div class="col-md-3">
                                    <div class="items-content">
                                        <h2>Animal disease text kits</h2>
                                    </div>
                                    <div class="item-blue-bg"></div>
                                    <div class="item-yellow-bg"></div>
                                </div>
                            </a>

                        </div>
                        <div class="index-items index-items-2">

                            <a href="">
                                <div class="col-md-3">
                                    <div class="items-content">
                                        <h2>Custom Assay Development</h2>
                                    </div>
                                    <div class="item-blue-bg"></div>
                                    <div class="item-yellow-bg"></div>
                                </div>
                            </a>

                        </div>
                        <div class="index-items index-items-3">

                            <a href="">
                                <div class="col-md-3">
                                    <div class="items-content">
                                        <h2>Plant disease diagnosis text Kits</h2>
                                    </div>
                                    <div class="item-blue-bg"></div>
                                    <div class="item-yellow-bg"></div>
                                </div>
                            </a>

                        </div>
                        <div class="index-items index-items-4">

                            <a href="">
                                <div class="col-md-3">
                                    <div class="items-content">
                                        <h2><em>In vitro</em> diagnostic test Kits</h2>
                                    </div>
                                    <div class="item-blue-bg"></div>
                                    <div class="item-yellow-bg"></div>
                                </div>
                            </a>

                        </div>


                    </div>
                </div>
                <div class="productlisttitle">Hot Products Recommendation</div>
                <div class="index_container">

                    <div class="row">
                        <div class="col-md-3">
                            <p class="productlist-img"><img src="<?php echo get_template_directory_uri();?>/images/products-img.png"></p>
                            <div class="productlist">
                                <h3><a href="">BISPHENOL A (BPA) ELISA TEST KIT</a></h3>
                                <p>Qualitative or quantitative analysis the residues of Bisphenol A in plastic products, plastic packing bottles, water sample, milk powder, etc.</p>
                                <a class="btn" href="">Learn More</a>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <p class="productlist-img"><img src="<?php echo get_template_directory_uri();?>/images/products-img.png"></p>
                            <div class="productlist">
                                <h3>BISPHENOL A (BPA) ELISA TEST KIT</h3>
                                <p>Qualitative or quantitative analysis the residues of Bisphenol A in plastic products, plastic packing bottles, water sample, milk powder, etc.</p>
                                <a class="btn" href="">Learn More</a>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <p class="productlist-img"><img src="<?php echo get_template_directory_uri();?>/images/products-img.png"></p>
                            <div class="productlist">
                                <h3>BISPHENOL A (BPA) ELISA TEST KIT</h3>
                                <p>Qualitative or quantitative analysis the residues of Bisphenol A in plastic products, plastic packing bottles, water sample, milk powder, etc.</p>
                                <a class="btn" href="">Learn More</a>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <p class="productlist-img"><img src="<?php echo get_template_directory_uri();?>/images/products-img.png"></p>
                            <div class="productlist">
                                <h3>BISPHENOL A (BPA) ELISA TEST KIT</h3>
                                <p>Qualitative or quantitative analysis the residues of Bisphenol A in plastic products, plastic packing bottles, water sample, milk powder, etc.</p>
                                <a class="btn" href="">Learn More</a>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <p class="productlist-img"><img src="<?php echo get_template_directory_uri();?>/images/products-img.png"></p>
                            <div class="productlist">
                                <h3>BISPHENOL A (BPA) ELISA TEST KIT</h3>
                                <p>Qualitative or quantitative analysis the residues of Bisphenol A in plastic products, plastic packing bottles, water sample, milk powder, etc.</p>
                                <a class="btn" href="">Learn More</a>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <p class="productlist-img"><img src="<?php echo get_template_directory_uri();?>/images/products-img.png"></p>
                            <div class="productlist">
                                <h3>BISPHENOL A (BPA) ELISA TEST KIT</h3>
                                <p>Qualitative or quantitative analysis the residues of Bisphenol A in plastic products, plastic packing bottles, water sample, milk powder, etc.</p>
                                <a class="btn" href="">Learn More</a>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <p class="productlist-img"><img src="<?php echo get_template_directory_uri();?>/images/products-img.png"></p>
                            <div class="productlist">
                                <h3>BISPHENOL A (BPA) ELISA TEST KIT</h3>
                                <p>Qualitative or quantitative analysis the residues of Bisphenol A in plastic products, plastic packing bottles, water sample, milk powder, etc.</p>
                                <a class="btn" href="">Learn More</a>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <p class="productlist-img"><img src="<?php echo get_template_directory_uri();?>/images/products-img.png"></p>
                            <div class="productlist">
                                <h3>BISPHENOL A (BPA) ELISA TEST KIT</h3>
                                <p>Qualitative or quantitative analysis the residues of Bisphenol A in plastic products, plastic packing bottles, water sample, milk powder, etc.</p>
                                <a class="btn" href="">Learn More</a>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="index_container">
                    <div class="row" style="margin-top: 50px;">
                        <div class="section_title">
                            <h2>Online Inquiry</h2>
                            <hr>
                        </div>

                        <div class="col-md-4">
                            <img src="<?php echo get_template_directory_uri();?>/images/onlineleft.jpg">
                        </div>
                        <div class="col-md-8">
                            <div class="inquiry_form">
                                <?php get_template_part('/modules/inquiry-form');?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php get_footer();?>
