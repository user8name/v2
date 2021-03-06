<?php
/**
 * Created by PhpStorm.
 * User: lirenjun
 * Date: 2019/5/17
 * Time: 14:40
 */


class PTCFP{

    function __construct(){

        add_action( 'init', array( $this, 'taxonomies_for_pages' ) );

        /**
         * 确保这些查询修改不会作用于管理后台，防止文章和页面混杂
         */
        if ( ! is_admin() ) {
            add_action( 'pre_get_posts', array( $this, 'category_archives' ) );
//            add_action( 'pre_get_posts', array( $this, 'tags_archives' ) );
        } // ! is_admin

    } // __construct

    /**
     * 为“页面”添加“标签”和“分类”
     *
     * @uses register_taxonomy_for_object_type
     */
    function taxonomies_for_pages() {
//        register_taxonomy_for_object_type( 'post_tag', 'page' );
        register_taxonomy_for_object_type( 'category', 'page' );
    } // taxonomies_for_pages

    /**
     * 在标签存档中包含“页面”
     */
    function tags_archives( $wp_query ) {

        if ( $wp_query->get( 'tag' ) )
            $wp_query->set( 'post_type', 'any' );

    } // tags_archives

    /**
     * 在分类存档中包含“页面”
     */
    function category_archives( $wp_query ) {

        if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) )
            $wp_query->set( 'post_type', 'any' );

    } // category_archives

} // PTCFP

$ptcfp = new PTCFP();
