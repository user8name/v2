<?php
/**
 * Created by PhpStorm.
 * User: lirenjun
 * Date: 2019/7/16
 * Time: 10:05
 */




function wpt_remove_tagline( $title ){

    if( (is_home() || is_front_page())&& isset( $title['tagline'] ) ) {
//        $title['title']='Lipid, Polymer Nanoparticles for Drug Delivery - CD Bioparticles';
        unset( $title['tagline'] );
    }
//    else{
//        unset($title['site']); //删除站点标题，不是首页才会有这个参数
//    }
    if(is_single() || is_page()){
        $tit=$desc=get_post_meta(get_the_ID(), 'metaTitle', true);
        if($tit){
            $title['title']=$tit;
        }
    }elseif (is_category()){
        $cat_title = get_option("seo-title-".get_query_var('cat'));
        if($cat_title){
            $title['title']=$cat_title;
        }
        $title['title']=strip_tags(html_entity_decode($title['title']));


    }
    return $title;

}
//过滤网站标题
add_filter( 'document_title_parts', 'wpt_remove_tagline' );


function get_meta_title(){
    $title = trim(wp_get_document_title());
    $title = str_replace('&#8211;','-',$title);
    echo $title;
}

function get_meta_description(){
    $desc="";
    if (!is_home() && !is_front_page() ) {
        if ( is_category() ){
            $desc=get_option('seo-des-'.get_query_var('cat'));
        }elseif (is_single() || is_page()){
            $desc=get_post_meta(get_the_ID(), 'metaDescription', true);
        }elseif(is_search()){
            $desc='';
        }elseif (is_404()){
            $desc='';
        }elseif (is_archive() && !is_category() ){
            $desc='';
        }

    }else{
        $vpid = get_query_var('vpid');
        if (!empty($vpid)) {
            $desc = apply_filters('v1_meta_description', $desc);
        }
    }
    echo $desc;

}
function get_meta_keyword(){
    $keyword="";
    if (!is_home() && !is_front_page() ) {
        if ( is_category() ){
            $keyword='';
        }elseif (is_single() || is_page()){
            $keyword=get_post_meta(get_the_ID(), 'metaKeyword', true);
        }elseif(is_search()){
            $keyword='';
        }elseif (is_404()){
            $keyword='';
        }elseif (is_archive() && !is_category() ){
            $keyword='';
        }

    }else{
        $vpid = get_query_var('vpid');
        if (!empty($vpid)) {
            $keyword = apply_filters('v1_meta_keyword', $keyword);
        }
    }
    echo $keyword;

}