<?php
/**
 * Created by PhpStorm.
 * User: lirenjun
 * Date: 2019/7/17
 * Time: 10:59
 */

function wp_list_pages_c( $args = '' ) {
    $defaults = array(
        'depth'        => 0,
        'show_date'    => '',
        'date_format'  => get_option( 'date_format' ),
        'child_of'     => 0,
        'exclude'      => '',
        'title_li'     => __( 'Pages' ),
        'echo'         => 1,
        'authors'      => '',
        'sort_column'  => 'menu_order, post_title',
        'link_before'  => '',
        'link_after'   => '',
        'item_spacing' => 'preserve',
        'walker'       => '',
    );

    $r = wp_parse_args( $args, $defaults );

    if ( ! in_array( $r['item_spacing'], array( 'preserve', 'discard' ), true ) ) {
        // invalid value, fall back to default.
        $r['item_spacing'] = $defaults['item_spacing'];
    }

    $output       = '';
    $current_page = 0;

    // sanitize, mostly to keep spaces out
    $r['exclude'] = preg_replace( '/[^0-9,]/', '', $r['exclude'] );

    // Allow plugins to filter an array of excluded pages (but don't put a nullstring into the array)
    $exclude_array = ( $r['exclude'] ) ? explode( ',', $r['exclude'] ) : array();

    /**
     * Filters the array of pages to exclude from the pages list.
     *
     * @since 2.1.0
     *
     * @param array $exclude_array An array of page IDs to exclude.
     */
    $r['exclude'] = implode( ',', apply_filters( 'wp_list_pages_excludes', $exclude_array ) );

    // Query pages.
    $r['hierarchical'] = 0;
    $pages             = get_pages( $r );

    if ( ! empty( $pages ) ) {

            $output .= ' <h3 class="title-side">'.$r['title_li'].'</h3><ul class="product-navi">';

        global $wp_query;
        if ( is_page() || is_attachment() || $wp_query->is_posts_page ) {
            $current_page = get_queried_object_id();
        } elseif ( is_singular() ) {
            $queried_object = get_queried_object();
            if ( is_post_type_hierarchical( $queried_object->post_type ) ) {
                $current_page = $queried_object->ID;
            }
        }

        $output .= walk_page_tree( $pages, $r['depth'], $current_page, $r );


            $output .= '</ul>';

    }

    /**
     * Filters the HTML output of the pages to list.
     *
     * @since 1.5.1
     * @since 4.4.0 `$pages` added as arguments.
     *
     * @see wp_list_pages()
     *
     * @param string $output HTML output of the pages list.
     * @param array  $r      An array of page-listing arguments.
     * @param array  $pages  List of WP_Post objects returned by `get_pages()`
     */
    $html = apply_filters( 'wp_list_pages', $output, $r, $pages );

    if ( $r['echo'] ) {
        echo $html;
    } else {
        return $html;
    }
}


function wp_list_pages_v1( $args = '' ) {
    $defaults = array(
        'depth'        => 0,
        'show_date'    => '',
        'date_format'  => get_option( 'date_format' ),
        'child_of'     => 0,
        'exclude'      => '',
        'title_li'     => __( 'Pages' ),
        'echo'         => 1,
        'authors'      => '',
        'sort_column'  => 'menu_order, post_title',
        'link_before'  => '',
        'link_after'   => '',
        'item_spacing' => 'preserve',
        'walker'       => '',
    );

    $r = wp_parse_args( $args, $defaults );

    if ( ! in_array( $r['item_spacing'], array( 'preserve', 'discard' ), true ) ) {
        // invalid value, fall back to default.
        $r['item_spacing'] = $defaults['item_spacing'];
    }

    $output       = '';
    $current_page = 0;

    // sanitize, mostly to keep spaces out
    $r['exclude'] = preg_replace( '/[^0-9,]/', '', $r['exclude'] );

    // Allow plugins to filter an array of excluded pages (but don't put a nullstring into the array)
    $exclude_array = ( $r['exclude'] ) ? explode( ',', $r['exclude'] ) : array();

    /**
     * Filters the array of pages to exclude from the pages list.
     *
     * @since 2.1.0
     *
     * @param array $exclude_array An array of page IDs to exclude.
     */
    $r['exclude'] = implode( ',', apply_filters( 'wp_list_pages_excludes', $exclude_array ) );

    // Query pages.
    $r['hierarchical'] = 0;
    $pages             = get_pages( $r );

    if ( ! empty( $pages ) ) {
        if ( $r['title_li'] ) {
            $output .= '<h3>' . $r['title_li'] . '</h3><ul class="container-row-a container-row-sub">';
        }
        global $wp_query;
        if ( is_page() || is_attachment() || $wp_query->is_posts_page ) {
            $current_page = get_queried_object_id();
        } elseif ( is_singular() ) {
            $queried_object = get_queried_object();
            if ( is_post_type_hierarchical( $queried_object->post_type ) ) {
                $current_page = $queried_object->ID;
            }
        }

        $output .= walk_page_tree( $pages, $r['depth'], $current_page, $r );

        if ( $r['title_li'] ) {
            $output .= '</ul>';
        }
    }

    /**
     * Filters the HTML output of the pages to list.
     *
     * @since 1.5.1
     * @since 4.4.0 `$pages` added as arguments.
     *
     * @see wp_list_pages()
     *
     * @param string $output HTML output of the pages list.
     * @param array  $r      An array of page-listing arguments.
     * @param array  $pages  List of WP_Post objects returned by `get_pages()`
     */
    $html = apply_filters( 'wp_list_pages', $output, $r, $pages );

    if ( $r['echo'] ) {
        echo $html;
    } else {
        return $html;
    }
}


class Custom_Walker_Page_v1 extends Walker_Page {




    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
            $t = "\t";
            $n = "\n";
        } else {
            $t = '';
            $n = '';
        }
        $indent  = str_repeat( $t, $depth );
        $output .= "{$n}{$indent}<ul class='sub-menu'>{$n}";
    }

    public function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {
        if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
            $t = "\t";
            $n = "\n";
        } else {
            $t = '';
            $n = '';
        }
        if ( $depth ) {
            $indent = str_repeat( $t, $depth );
        } else {
            $indent = '';
        }

        $css_class = array( 'page_item', 'page-item-' . $page->ID );

        if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
            $css_class[] = 'page_item_has_children';
        }

        if ( ! empty( $current_page ) ) {
            $_current_page = get_post( $current_page );
            if ( $_current_page && in_array( $page->ID, $_current_page->ancestors ) ) {
                $css_class[] = 'current_page_ancestor';
            }
            if ( $page->ID == $current_page ) {
                $css_class[] = 'current_page_item';
            } elseif ( $_current_page && $page->ID == $_current_page->post_parent ) {
                $css_class[] = 'current_page_parent';
            }
        } elseif ( $page->ID == get_option( 'page_for_posts' ) ) {
            $css_class[] = 'current_page_parent';
        }

        /**
         * Filters the list of CSS classes to include with each page item in the list.
         *
         * @since 2.8.0
         *
         * @see wp_list_pages()
         *
         * @param string[] $css_class    An array of CSS classes to be applied to each list item.
         * @param WP_Post  $page         Page data object.
         * @param int      $depth        Depth of page, used for padding.
         * @param array    $args         An array of arguments.
         * @param int      $current_page ID of the current page.
         */
        $css_classes = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );
        $css_classes = $css_classes ? ' class="' . esc_attr( $css_classes ) . '"' : '';

        if ( '' === $page->post_title ) {
            /* translators: %d: ID of a post */
            $page->post_title = sprintf( __( '#%d (no title)' ), $page->ID );
        }

        $args['link_before'] = empty( $args['link_before'] ) ? '' : $args['link_before'];
        $args['link_after']  = empty( $args['link_after'] ) ? '' : $args['link_after'];

        $atts                 = array();
        if(get_post_meta($page->ID, 'openLink', true)==="1"){
            $atts['href']         = 'javascript:void(0);';
        }else{
            $atts['href']         = get_permalink( $page->ID );
        }

        $atts['aria-current'] = ( $page->ID == $current_page ) ? 'page' : '';

        /**
         * Filters the HTML attributes applied to a page menu item's anchor element.
         *
         * @since 4.8.0
         *
         * @param array $atts {
         *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
         *
         *     @type string $href         The href attribute.
         *     @type string $aria_current The aria-current attribute.
         * }
         * @param WP_Post $page         Page data object.
         * @param int     $depth        Depth of page, used for padding.
         * @param array   $args         An array of arguments.
         * @param int     $current_page ID of the current page.
         */
        $atts = apply_filters( 'page_menu_link_attributes', $atts, $page, $depth, $args, $current_page );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value       = esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        $a_after='';
        if($args['walker']->has_children===true){
            $a_after='<div style="clear: both;"></div>';
        }

        $output .= $indent . sprintf(
                '<li%s><span class="icon fa fa-caret-right"></span><a%s>%s%s%s</a>%s',
                $css_classes,
                $attributes,
                $args['link_before'],
                /** This filter is documented in wp-includes/post-template.php */
                apply_filters( 'the_title', $page->post_title, $page->ID ),
                $args['link_after'],
                $a_after
            );

        if ( ! empty( $args['show_date'] ) ) {
            if ( 'modified' == $args['show_date'] ) {
                $time = $page->post_modified;
            } else {
                $time = $page->post_date;
            }

            $date_format = empty( $args['date_format'] ) ? '' : $args['date_format'];
            $output     .= ' ' . mysql2date( $date_format, $time );
        }
    }


}


class Custom_Walker_Page extends Walker_Page {




    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
            $t = "\t";
            $n = "\n";
        } else {
            $t = '';
            $n = '';
        }
        $indent  = str_repeat( $t, $depth );
        $output .= "{$n}{$indent}<ul style='display: none;'>{$n}";
    }

    public function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {
        if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
            $t = "\t";
            $n = "\n";
        } else {
            $t = '';
            $n = '';
        }
        if ( $depth ) {
            $indent = str_repeat( $t, $depth );
        } else {
            $indent = '';
        }

        $css_class = array( '' );

        if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
            $css_class[] = 'page_item_has_children';
        }

        if ( ! empty( $current_page ) ) {
            $_current_page = get_post( $current_page );
            if ( $_current_page && in_array( $page->ID, $_current_page->ancestors ) ) {
                $css_class[] = 'current_page_ancestor';
            }
            if ( $page->ID == $current_page ) {
                $css_class[] = 'current_page_item';
            } elseif ( $_current_page && $page->ID == $_current_page->post_parent ) {
                $css_class[] = 'current_page_parent';
            }
        } elseif ( $page->ID == get_option( 'page_for_posts' ) ) {
            $css_class[] = 'current_page_parent';
        }

        /**
         * Filters the list of CSS classes to include with each page item in the list.
         *
         * @since 2.8.0
         *
         * @see wp_list_pages()
         *
         * @param string[] $css_class    An array of CSS classes to be applied to each list item.
         * @param WP_Post  $page         Page data object.
         * @param int      $depth        Depth of page, used for padding.
         * @param array    $args         An array of arguments.
         * @param int      $current_page ID of the current page.
         */
        $css_classes = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );
        $css_classes = $css_classes ? ' class="' . esc_attr( $css_classes ) . '"' : '';

        if ( '' === $page->post_title ) {
            /* translators: %d: ID of a post */
            $page->post_title = sprintf( __( '#%d (no title)' ), $page->ID );
        }

        $args['link_before'] = empty( $args['link_before'] ) ? '' : $args['link_before'];
        $args['link_after']  = empty( $args['link_after'] ) ? '' : $args['link_after'];

        $atts                 = array();
        if(get_post_meta($page->ID, 'openLink', true)==="1"){
            $atts['href']         = 'javascript:void(0);';
        }else{
            $atts['href']         = get_permalink( $page->ID );
        }

        $atts['aria-current'] = ( $page->ID == $current_page ) ? 'page' : '';

        /**
         * Filters the HTML attributes applied to a page menu item's anchor element.
         *
         * @since 4.8.0
         *
         * @param array $atts {
         *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
         *
         *     @type string $href         The href attribute.
         *     @type string $aria_current The aria-current attribute.
         * }
         * @param WP_Post $page         Page data object.
         * @param int     $depth        Depth of page, used for padding.
         * @param array   $args         An array of arguments.
         * @param int     $current_page ID of the current page.
         */
        $atts = apply_filters( 'page_menu_link_attributes', $atts, $page, $depth, $args, $current_page );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value       = esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        $a_after='';
        if($args['walker']->has_children===true){
            $a_after='<span class="fa fa-angle-down rotate_angle"></span>';
        }

        $output .= $indent . sprintf(
                '<li%s><a%s>%s%s%s</a>%s',
                $css_classes,
                $attributes,
                $args['link_before'],
                /** This filter is documented in wp-includes/post-template.php */
                apply_filters( 'the_title', $page->post_title, $page->ID ),
                $args['link_after'],
                $a_after
            );

        if ( ! empty( $args['show_date'] ) ) {
            if ( 'modified' == $args['show_date'] ) {
                $time = $page->post_modified;
            } else {
                $time = $page->post_date;
            }

            $date_format = empty( $args['date_format'] ) ? '' : $args['date_format'];
            $output     .= ' ' . mysql2date( $date_format, $time );
        }
    }


}

class Custom_Walker_Category extends Walker_Category{
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        if ( 'list' != $args['style'] ) {
            return;
        }

        $indent  = str_repeat( "\t", $depth );
        $output .= "$indent<ul class='sub-menu'>\n";
    }

    public function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
        /** This filter is documented in wp-includes/category-template.php */
        $cat_name = apply_filters(
            'list_cats',
            esc_attr( $category->name ),
            $category
        );

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

            if ( empty( $args['feed_image'] ) ) {
                $link .= $name;
            } else {
                $link .= "<img src='" . esc_url( $args['feed_image'] ) . "'$alt" . ' />';
            }
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
            $css_classes = implode( ' ', apply_filters( 'category_css_class', $css_classes, $category, $depth, $args ) );
            $css_classes = $css_classes ? ' class="' . esc_attr( $css_classes ) . '"' : '';
            $a_after='';
            if($args['walker']->has_children===true){
                $link.='<span class="arrow afinve1"></span>';
            }
            $output .= $css_classes;
            $output .= ">$link\n";
        } elseif ( isset( $args['separator'] ) ) {
            $output .= "\t$link" . $args['separator'] . "\n";
        } else {
            $output .= "\t$link<br />\n";
        }
    }
}

function wp_list_categories_c( $args = '' ) {
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
    if ( $r['title_li'] && 'list' == $r['style'] && ( ! empty( $categories ) || ! $r['hide_title_if_empty'] ) ) {
        $output = '<h2 class="' . esc_attr( $r['class'] ) . '">' . $r['title_li'] . '</h2><ul class="navmenu"><li class="open"><ul class="sub-menu" style="display: block;">';

    }
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

    if ( $r['title_li'] && 'list' == $r['style'] && ( ! empty( $categories ) || ! $r['hide_title_if_empty'] ) ) {
        $output .= '</ul></li></ul>';
    }

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
