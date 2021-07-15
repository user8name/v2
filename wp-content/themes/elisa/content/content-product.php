<?php

$vpid = get_query_var('vpid1');



if (empty($vpid)) {
    status_header(404);
    get_template_part('404');
    die;
}
global $wpdb;
$product = $wpdb->get_row($wpdb->prepare('SELECT `id`,`cid`,`cid1`,`cid2`,`cat`,`size`,`productname`,`description`,`detail` FROM `'.$wpdb->prefix.'products` INNER JOIN `'.$wpdb->prefix.'products_json` ON `'.$wpdb->prefix.'products`.`id`= `'.$wpdb->prefix.'products_json`.`productid` WHERE `id`=%d and isdel=%d', [$vpid,0]));

$js = null;
$cat = null;
$cid = 0;
if ($product != null) {
    $cid = $product->cid;
    $cat = get_category($cid);
    $js = json_decode($product->detail, true);


} else {
    status_header(404);
    get_template_part('404');
    die;
}

function v1_page_title($title)
{

    global $product;
    $title['site'] = 'BIoCell & Strains';
    $seotitle = $product->seo_title;
    $customtitle = $product->productname;

    $customtitle=strip_tags($customtitle);
    $title['title'] = $seotitle ? $seotitle : $customtitle;
    return $title;
}
add_filter('document_title_parts', 'v1_page_title', 10, 1);
function custom_inquiry_title(){
    global $product;
    $title=strip_tags('('.$product->cat.')'.$product->productname);
    return $title;
}

add_filter('custom-inquiry-title','custom_inquiry_title',10,1);

function v1_meta_description(){
    global $product;
    $desc=strip_tags($product->description);
    return $desc;
}
add_filter('v1_meta_description','v1_meta_description',10,1);
function custom_page_title_baner(){
    global $product;
    return $product->productname;
}

add_filter('custom_page_title_baner','custom_page_title_baner',10,1);

function banener_img($banner_img){
    $img='/images/productsbg.jpg';
    if($img){
        $banner_img=$img;
    }
    return $banner_img;
}
add_filter('custom_banner_img','banener_img',10,1);

function custom_p_cid($cid){
    global $product;
    if ($product->cid2!=0){
        return $product->cid2;
    }elseif ($product->cid1!=0){
        return $product->cid1;
    }else{
        return $product->cid;
    }
}

add_filter('custom_p_cid','custom_p_cid',10,1);

function custom_get_canonical_url($url){
    global $product;
    $url = home_url().'/'.sanitize_title(preg_replace( '/[^A-Za-z0-9\-\s\-]/', '', $product->productname)) . '-item-'.$product->id.'.html';
    return  '<link rel="canonical" href="' . $url. '" />' . "\n";
}
add_filter('custom_get_canonical_url','custom_get_canonical_url');


get_header()
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
                    <p class="padding0"><b>Cat. No.:</b> <?php echo $product->cat;?></p>
                    <h3 class="padding0 productname-h3"><?php echo $product->productname;?></h3>
                    <?php if(isset($js['Synonym'])):?>
                        <p class="padding0"><b>Synonym:</b> <?php echo $js['Synonym'];?></p>
                    <?php endif;?>
                    <?php if(isset($js['Form'])):?>
                        <p class="padding0"><b>Form:</b> <?php echo $js['Form'];?></p>
                    <?php endif;?>
                    
                    <ul class="other-detail">
                        <?php 
                            $in_columns=['MDL','CAS Number','NACRES','PubChem Substance ID','Enzyme Commission Number','REAXYS Number'];
                            foreach($js as $k=>$v):
                            if (in_array(trim($k), $in_columns)):
                            ?>
                                <li><b><?php echo $k;?>:</b> <?php echo $v;?></li>
                            <?php endif;?>
                        <?php endforeach;?>
                    </ul>
                    <div id="tabs" class="tabs">

                        <div class="content">


                                <div class="content-detail">
                                    <div class="table-responsive">
                                        <table border="0" cellspacing="0" cellpadding="0" class="tablecontentshow">
                                            <tbody>
                                                <?php 
                                                    $in_columns1=['cid','cid1','cid2','Product Type1','Product Type2','Product Type3','Product Name','Cat.No','Price'];
                                                    foreach($js as $k=>$v):
                                                    if (in_array(trim($k),$in_columns1)){
                                                        continue;
                                                    }
                                                    ?>   
                                                    <tr>
                                                        <td width="25%"><strong><?php echo $k;?></strong></td>
                                                        <td width="75%"><?php echo str_replace(array("\r\n", "\r", "\n"), "<br>", $v);?></td>
                                                    </tr>

                                                <?php endforeach;?>
                                                <tr>
                                                    <td width="25%"><strong>Prize</strong></td>
                                                    <td width="75%"><a href="<?php  echo home_url();?>/online-inquiry.html?t=<?php echo apply_filters('custom-inquiry-title','');?>">Inquiry</a></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                            </section>

                        </div>
                    </div>

                </div>
        </div>
    </div>
</div>
<?php get_footer();?>
