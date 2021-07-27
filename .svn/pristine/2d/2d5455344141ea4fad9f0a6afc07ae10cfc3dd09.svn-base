<?php
/**
 * Created by PhpStorm.
 * User: lirenjun
 * Date: 2019/7/24
 * Time: 9:43
 */


function get_breadcrumbs($cid=0)
{
    global $wp_query;

    if (!is_home()) {
        // Add the Home link
        echo '<li><a href="' . home_url() . '">Home</a></li>  ';

        if (is_category()) {
            $catpath = "" . custom_get_category_parents(get_query_var('cat'), true, "  ") . "";
            echo $catpath;
        } elseif (is_archive() && !is_category()) {
            echo "<li>Archives</li>";
        } elseif (is_search()) {
            echo "<li>Search Results</li>";
        } elseif (is_404()) {
            echo "<li>404 Not Found</li>";
        } elseif (is_single()) {
            $category = get_the_category();
            $category_id = get_cat_ID($category[0]->cat_name);
            echo '' . custom_get_category_parents($category_id, true, "");
            echo "<li>".the_title('', '', false) . "</li>";
        } elseif (is_page()) {
            $post = $wp_query->get_queried_object();

            if ($post->post_parent == 0) {

                echo "<li>" . the_title('', '', false) . "</li>";

            } else {
                $title = the_title('', '', false);
                $ancestors = array_reverse(get_post_ancestors($post->ID));
                array_push($ancestors, $post->ID);

                foreach ($ancestors as $ancestor) {
                    if ($ancestor != end($ancestors)) {
                        if(get_post_meta($ancestor, 'openLink', true)==1){
                            echo '<li><a href="javascript:void(0);">' . get_the_title($ancestor) . '</a>  </li>';

                        }else{
                            echo '<li><a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a></li>  ';

                        }
                    } else {
                        echo '<li>' . get_the_title($ancestor) . '</li>';
                    }
                }
            }
        }

    }else{
        //自定义页面也在这里
        $cid=apply_filters('custom_p_cid',0);
        if($cid!=0){
            echo '<li><a href="' . home_url() . '">Home</a> </li> ';
            $catpath = ' ' . custom_get_category_parents($cid, true, "  ");
            echo $catpath;
        }

    }
}
/**
 * 自定义分类面包屑
 *
 */
function custom_get_category_parents($id, $link = false, $separator = '/', $nicename = false, $deprecated = array() ){
    if ( ! empty( $deprecated ) ) {
        _deprecated_argument( __FUNCTION__, '4.8.0' );
    }

    $format = $nicename ? 'slug' : 'name';

    $args = array(
        'separator' => $separator,
        'link'      => $link,
        'format'    => $format,
    );

    return custom_get_term_parents_list( $id, 'category', $args );
}
function custom_get_term_parents_list( $term_id, $taxonomy, $args = array() ) {
    $list = '';
    $term = get_term( $term_id, $taxonomy );

    if ( is_wp_error( $term ) ) {
        return $term;
    }

    if ( ! $term ) {
        return $list;
    }

    $term_id = $term->term_id;

    $defaults = array(
        'format'    => 'name',
        'separator' => ' / ',
        'link'      => true,
        'inclusive' => true,
    );

    $args = wp_parse_args( $args, $defaults );

    foreach ( array( 'link', 'inclusive' ) as $bool ) {
        $args[ $bool ] = wp_validate_boolean( $args[ $bool ] );
    }

    $parents = get_ancestors( $term_id, $taxonomy, 'taxonomy' );

    if ( $args['inclusive'] ) {
        array_unshift( $parents, $term_id );
    }
    $parents_arr=array_reverse( $parents );
    foreach ( $parents_arr as $term_id ) {
        $parent = get_term( $term_id, $taxonomy );
        $name   = ( 'slug' === $args['format'] ) ? $parent->slug : $parent->name;

        if ( $args['link'] ) {
            if(get_option('cat_open-'.$parent->term_id)==1){
                $list .= '<li><a href="javascript:void(0);">' . html_entity_decode($name) . '</a></li>' . $args['separator'];
            }else{
                $list .= '<li><a href="' . esc_url( get_term_link( $parent->term_id, $taxonomy ) ) . '">' . html_entity_decode($name) . '</a></li>' . $args['separator'];
            }
        } else {
            $list .=''. html_entity_decode($name) . $args['separator'].'';
        }
    }

    return $list;
}