<?php
/**
 * Created by PhpStorm.
 * User: lirenjun
 * Date: 2019/7/16
 * Time: 16:51
 */








class Header_Menu_Walker extends Walker_Nav_Menu {

    /**
     * start_lvl函数
     * 这函数主要处理ul，如果ul有一些特殊的样式，修改这里
     * 他这里面的$depth就是层级，一级二级三级
     * $args是上面wp_nav_menu()函数定义的那个数组
     *
     */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // 缩进
        $display_depth = ( $depth + 1); // 层级默认是0级，这里+1为了从1开始算
        $classes = array(
            ( $display_depth % 2  ? 'rd-navbar-megamenu rd-navbar-open-right' : ' ' ),   //1级菜单的时候，添加这个样式
            ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ), //子菜单奇数加样式menu-odd,偶数加样式menu-even
            ( $display_depth >=2 ? 'sub-sub-menu' : '' ),   //三级菜单的时候，添加这个样式
            'navi-menu-' . ($display_depth+1), //这样式主要能看出当前菜单的层级，menu-depth-2是二级呗
        );
        $class_names = implode( ' ', $classes ); //用空格分割多个样式名
        if($display_depth ==1){
            $output .= "\n" . $indent . '<div class="navigation_Solutions" style="display: none;">' . "\n";
            $output .= "\n" . $indent . '<div class="navigation_content">' . "\n";
        }

        $output .= "\n" . $indent . '<ul class="navi_cont_chtitle">' . "\n"; //把刚才定义的，那么多的样式，写到ul里面
    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $display_depth = ( $depth + 1);
        $indent  = str_repeat( $t, $depth );
        $output .= "$indent</ul>{$n}";
        if($display_depth ==1){
            $output .= "\n" . $indent . '</div>' . "\n";
            $output .= "\n" . $indent . '</div>' . "\n";
        }
    }
    /**
     * start_el函数
     * 主要处理li和里面的a
     * $depth和$args同上
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     * @param int    $id     Current item ID.
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        if(is_main_domain()){
            if($item->object=="page" && get_post_meta($item->object_id, 'auditStatus', true)==="0"){
                return;
            }elseif($item->object=="category" && get_option('cat_audit-'.$item->object_id)==="0"){
                return;
            }
        }


        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // 缩进

        // 定义li的样式
        $depth_classes = array(
            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),   //一级的li，就main-menu-item，其余全部sub-menu-item
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),  //三级的li，添加这个样式
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),    //奇数加样式menu-item-odd,偶数加样式menu-item-even
            'menu-item-depth-' . $depth,    //层级同上
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) ); //这句我没看懂，不知道是在干啥

        // 把样式合成到li里面
        $output .= $indent . '<li>';


        if($item->object=="page" && get_post_meta($item->object_id, 'openLink', true)==="1"){
            $item->url="";
        }

        if($item->object=="page" && get_post_meta($item->object_id, 'noIndex', true)==="1"){
            $item->xfn="nofollow";
        }
        if($item->object=="category" && get_option('cat_open-'.$item->object_id)==="1"){
            $item->url="";
        }

        if($item->object=="page" && $item->object_id=="12"){
            $i_b=apply_filters('inquiry-box',0);
            if ($i_b==1){
                $item->url="#inquiry-box";
            }

        }

        // 处理a的属性
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
//        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
        $args->after='';
        if ($item->object=="category"){
            $category_tag=array(
                'hide_empty' => false,
                'child_of' => $item->object_id,
                'title_li'=>'',
                'hide_title_if_empty'=>true,
                'show_option_none'=>'',
                'class'=>'navh4',
                'taxonomy'=>'category',
                'echo'=>0,
                'walker'=>new Custom_Walker_Category_Nav(),
            );
            $args->after.=wp_list_categories_nav($category_tag);
            $args->link_after='<span class="caret"></span>';
        }
        //添加a的样式
        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );
        //上面这个item_output。这里写的有点死。
        //如果一级菜单是<a><span>我是菜单</span></a>
        //然而其他级菜单是<a><strong>我是菜单</strong></a>
        //这样的情况，$args->link_before是固定值就不行了，要自行判断
        //$link_before = $depth == 0 ? '<span>' : '<strong>';
        //$link_after = $depth == 0 ? '</span>' : '</strong>';
        //类似这个意思。
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        if(is_main_domain()){
            if($item->object=="page" && get_post_meta($item->object_id, 'auditStatus', true)==="0"){
                return;
            }elseif($item->object=="category" && get_option('cat_audit-'.$item->object_id)==="0"){
                return;
            }
        }

        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $output .= "</li>{$n}";
    }
} 

class Custom_Walker_Category_Nav extends Walker_Category{
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        if ( 'list' != $args['style'] ) {
            return;
        }

        $indent  = str_repeat( "\t", $depth );
        $output .= $indent."<ul class='navi_cont_chtitle'>\n";

    }

    public function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
        /** This filter is documented in wp-includes/category-template.php */
        $cat_name = apply_filters(
            'list_cats',
            esc_attr( $category->name ),
            $category
        );
        $cat_name=html_entity_decode($cat_name);
        // Don't generate an element if the category name is empty.
        if ( '' === $cat_name ) {
            return;
        }
        if(get_option('cat_open-'.$category->term_id)==="1"){
            $link = '<a href="javascript:void(0);" ';
        }else{
            $link = '<a href="' . esc_url( get_term_link( $category ) ) . '" ';
        }

        if ( $args['use_desc_for_title'] && ! empty( $category->description ) ) {
            /**
             * Filters the category description for display.
             *
             * @since 1.2.0
             *
             * @param string $description Category description.
             * @param object $category    Category object.
             */
            //$link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
        }

        $link .= '>';
        
            $link .= $cat_name . '</a>';
       


        if ( ! empty( $args['feed_image'] ) || ! empty( $args['feed'] ) ) {
            $link .= ' ';

            if ( empty( $args['feed_image'] ) ) {
                $link .= '(';
            }

            $link .= '<a href="' . esc_url( get_term_feed_link( $category->term_id, $category->taxonomy, $args['feed_type'] ) ) . '"';

            if ( empty( $args['feed'] ) ) {
                $alt = ' alt="' . sprintf( __( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
            } else {
                $alt   = ' alt="' . $args['feed'] . '"';
                $name  = $args['feed'];
                $link .= empty( $args['title'] ) ? '' : $args['title'];
            }

            $link .= '>';

            $link .= '</a>';

            if ( empty( $args['feed_image'] ) ) {
                $link .= ')';
            }
        }

        if ( ! empty( $args['show_count'] ) ) {
            $link .= ' (' . number_format_i18n( $category->count ) . ')';
        }
        if ( 'list' == $args['style'] ) {
            $output     .= "\t<li";
            $css_classes = array(
                'cat-item',
                'cat-item-' . $category->term_id,
            );

            if ( ! empty( $args['current_category'] ) ) {
                // 'current_category' can be an array, so we use `get_terms()`.
                $_current_terms = get_terms(
                    $category->taxonomy,
                    array(
                        'include'    => $args['current_category'],
                        'hide_empty' => false,
                    )
                );

                foreach ( $_current_terms as $_current_term ) {
                    if ( $category->term_id == $_current_term->term_id ) {
                        $css_classes[] = 'current-cat';
                    } elseif ( $category->term_id == $_current_term->parent ) {
                        $css_classes[] = 'current-cat-parent';
                    }
                    while ( $_current_term->parent ) {
                        if ( $category->term_id == $_current_term->parent ) {
                            $css_classes[] = 'current-cat-ancestor';
                            break;
                        }
                        $_current_term = get_term( $_current_term->parent, $category->taxonomy );
                    }
                }
            }

            /**
             * Filters the list of CSS classes to include with each category in the list.
             *
             * @since 4.2.0
             *
             * @see wp_list_categories()
             *
             * @param array  $css_classes An array of CSS classes to be applied to each list item.
             * @param object $category    Category data object.
             * @param int    $depth       Depth of page, used for padding.
             * @param array  $args        An array of wp_list_categories() arguments.
             */
            //$css_classes = implode( ' ', apply_filters( 'category_css_class', $css_classes, $category, $depth, $args ) );
            $css_classes =  '';

            
            $a_after='';

            $output .= $css_classes;
            $output .= ">$link\n";
        } elseif ( isset( $args['separator'] ) ) {
            $output .= "\t$link" . $args['separator'] . "\n";
        } else {
            $output .= "\t$link<br />\n";
        }
    }
}

function wp_list_categories_nav( $args = '' ) {
    $defaults = array(
        'child_of'            => 0,
        'current_category'    => 0,
        'depth'               => 0,
        'echo'                => 1,
        'exclude'             => '',
        'exclude_tree'        => '',
        'feed'                => '',
        'feed_image'          => '',
        'feed_type'           => '',
        'hide_empty'          => 1,
        'hide_title_if_empty' => false,
        'hierarchical'        => true,
        'order'               => 'ASC',
        'orderby'             => 'name',
        'separator'           => '<br />',
        'show_count'          => 0,
        'show_option_all'     => '',
        'show_option_none'    => __( 'No categories' ),
        'style'               => 'list',
        'taxonomy'            => 'category',
        'title_li'            => __( 'Categories' ),
        'use_desc_for_title'  => 1,
    );

    $r = wp_parse_args( $args, $defaults );

    if ( ! isset( $r['pad_counts'] ) && $r['show_count'] && $r['hierarchical'] ) {
        $r['pad_counts'] = true;
    }

    // Descendants of exclusions should be excluded too.
    if ( true == $r['hierarchical'] ) {
        $exclude_tree = array();

        if ( $r['exclude_tree'] ) {
            $exclude_tree = array_merge( $exclude_tree, wp_parse_id_list( $r['exclude_tree'] ) );
        }

        if ( $r['exclude'] ) {
            $exclude_tree = array_merge( $exclude_tree, wp_parse_id_list( $r['exclude'] ) );
        }

        $r['exclude_tree'] = $exclude_tree;
        $r['exclude']      = '';
    }

    if ( ! isset( $r['class'] ) ) {
        $r['class'] = ( 'category' == $r['taxonomy'] ) ? 'categories' : $r['taxonomy'];
    }

    if ( ! taxonomy_exists( $r['taxonomy'] ) ) {
        return false;
    }

    $show_option_all  = $r['show_option_all'];
    $show_option_none = $r['show_option_none'];

    $categories = get_categories( $r );

    $output = '';
    $output = '<ul class="dropdown-menu row">';


    if ( empty( $categories ) ) {
        if ( ! empty( $show_option_none ) ) {
            if ( 'list' == $r['style'] ) {
                $output .= '<li class="cat-item-none">' . $show_option_none . '</li>';
            } else {
                $output .= $show_option_none;
            }
        }
    } else {
        if ( ! empty( $show_option_all ) ) {

            $posts_page = '';

            // For taxonomies that belong only to custom post types, point to a valid archive.
            $taxonomy_object = get_taxonomy( $r['taxonomy'] );
            if ( ! in_array( 'post', $taxonomy_object->object_type ) && ! in_array( 'page', $taxonomy_object->object_type ) ) {
                foreach ( $taxonomy_object->object_type as $object_type ) {
                    $_object_type = get_post_type_object( $object_type );

                    // Grab the first one.
                    if ( ! empty( $_object_type->has_archive ) ) {
                        $posts_page = get_post_type_archive_link( $object_type );
                        break;
                    }
                }
            }

            // Fallback for the 'All' link is the posts page.
            if ( ! $posts_page ) {
                if ( 'page' == get_option( 'show_on_front' ) && get_option( 'page_for_posts' ) ) {
                    $posts_page = get_permalink( get_option( 'page_for_posts' ) );
                } else {
                    $posts_page = home_url( '/' );
                }
            }

            $posts_page = esc_url( $posts_page );
            if ( 'list' == $r['style'] ) {
                $output .= "<li class='cat-item-all'><a href='$posts_page'>$show_option_all</a></li>";
            } else {
                $output .= "<a href='$posts_page'>$show_option_all</a>";
            }
        }

        if ( empty( $r['current_category'] ) && ( is_category() || is_tax() || is_tag() ) ) {
            $current_term_object = get_queried_object();
            if ( $current_term_object && $r['taxonomy'] === $current_term_object->taxonomy ) {
                $r['current_category'] = get_queried_object_id();
            }
        }

        if ( $r['hierarchical'] ) {
            $depth = $r['depth'];
        } else {
            $depth = -1; // Flat.
        }
        $output .= walk_category_tree( $categories, $depth, $r );
    }


    $output .= '</ul>';


    /**
     * Filters the HTML output of a taxonomy list.
     *
     * @since 2.1.0
     *
     * @param string $output HTML output.
     * @param array  $args   An array of taxonomy-listing arguments.
     */
    $html = apply_filters( 'wp_list_categories', $output, $args );

    if ( $r['echo'] ) {
        echo $html;
    } else {
        return $html;
    }
}