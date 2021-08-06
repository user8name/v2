<?php
/**
 * Created by PhpStorm.
 * User: lirenjun
 * Date: 2020/2/4
 * Time: 10:12
 */
?>
<?php
$category_tag=array(
    'hide_empty' => false,
    'child_of' => 1,
    'title_li'=>'Products',
    'hide_title_if_empty'=>true,
    'show_option_none'=>'',
    'class'=>'',
    'taxonomy'=>'category',
    'current_category'=>apply_filters('custom_p_cid','1'),//将id为7的分类添加class 为current-cat
    'walker'=>new Custom_Walker_Category(),
);
wp_list_categories_c($category_tag);
?>
