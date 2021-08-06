<?php
/**
 * Created by PhpStorm.
 * User: lirenjun
 * Date: 2019/12/27
 * Time: 10:27
 */
?>
<?php


wp_nav_menu( array(
    'theme_location'  => 'top',
    'container'  => 'ul',
    'container_class' => '',
    'menu_class'   => 'navbar-nav',
    'echo'  => true,
    //添加了一个搜索按钮
    'items_wrap'  => '<ul class="%2$s">%3$s 
</ul>',
    //如何包装列表
    'walker' => new Header_Menu_Walker() ,
) );
?>

