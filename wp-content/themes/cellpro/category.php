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

<section class="banner_inpage services_bg" style="background-image: url(<?php echo get_template_directory_uri().apply_filters('custom_banner_img','/images/servicesbg.jpg');?>);" >
    <div class="banner-table">
        <div class="banner-table-cell">
            <div class="auto-container">
                <h1><?php echo apply_filters('custom_page_title_baner','');?></h1>
                <ul class="bread-crumb clearfix">
                    <?php get_breadcrumbs();?>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container services-container index-iconbg">
    <div class="container-box">
        <div class="left-container">
            <div class="side-box">
                <div class="side-content">
                <?php get_template_part('/modules/right-product');?>
                </div>
            </div>
            <div class="side-box">
                <div class="side-headline">Online Inquiry</div>
                <div class="inquirybox">
                    <?php get_template_part('/modules/inquiry-form');?>
                </div>
            </div>
        </div>
        <div class="right-container">
            <div class="row service-tit">
                <div class="col-md-9 col-lg-9">
                    <h2><?php echo $cat->cat_name;?></h2>
                </div>
                <div class="col-md-3 col-lg-3"><a rel="nofollow" class="btn pro_btn" href="<?php echo home_url();?>/online-inquiry.html?t=<?php echo apply_filters('custom-inquiry-title','')?>">Inquiry</a></div>
            </div>
            <?php echo do_shortcode($cat->description);?>

            <?php
            $arg_ca=[
                'type' => 'post',
                'hide_empty'=>false,
                'taxonomy'=>'category',
                'parent'=>$cid,
                'depth'=>1,            //???????????????????????????????????????????????????0
            ];
            $cats=get_categories($arg_ca);

            ?>
            <?php if ($cats):?>
                    <ul class="row product-transition-ul">
                
                        <?php foreach ($cats as $v):
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
                            ?>
                            <li class="col-md-6 col-lg-6 product-transition-li">
                            <div class="product-transition-box">
                                <div class="product-transition-cell">
                                    <a href="<?php echo $href;?>">
                                        <h3><?php echo html_entity_decode($v->cat_name);?></h3>
                                        <p>Browse our high-quality products</p>
                                    </a>
                                </div>
                            </div>
                            </li>
                        <?php endforeach;?>
                    </ul>
                
            <?php else:?>

            <?php

            global $wpdb;
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

            ?>
            <?php if ($rows):?>
                <div class="table-responsive" style="margin-top: 25px;">
                        
                <table class="pro-table" id="table-breakpoint">
                    <thead>
                        <tr>
                            <th width="110">Cat. #</th>
                            <th>Product Name</th>
                            <th>Size</th>

                            <th class="text-center" width="80">Prize</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rows as $k=>$v):
                        $url = home_url().'/'.sanitize_title(preg_replace( '/[^A-Za-z0-9\-\s\-]/', '', $v->productname)) . '-item-'.$v->id.'.html';

                        ?>
                        <tr>
                            <td><?php echo $v->cat;?></td>
                            <td><a href="<?php echo $url;?>"><?php echo $v->productname;?></a></td>
                            <td><?php echo $v->size;?></td>

                            <td class="text-center"><a rel="nofollow"  class="btn-inquiry" href="<?php echo home_url();?>/online-inquiry.html?t=(<?php echo $v->cat;?>) <?php echo $v->productname;?>"><span class="icon fa fa-commenting"></span></a></td>
                           
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                </div>
                <div class="pagenav">
                        <ul class="pagination">
                            <?php echo $pagenavstr;?>
                        </ul>   
                </div>
            
            <?php endif;?>

            <?php endif;?>
        </div>

    </div>
</div>


<?php get_footer();?>
