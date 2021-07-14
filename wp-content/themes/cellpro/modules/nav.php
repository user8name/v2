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
    'menu_class'   => 'navigation_title row-layout',
    'echo'  => true,
    //添加了一个搜索按钮
    'items_wrap'  => '<ul id="%1$s" class="%2$s">%3$s 
<li class="switch-btn"><a href="javascript:void(0)"><span class="icon fa fa-search"></span></a></li> 
</ul>',
    //如何包装列表
    'walker' => new Header_Menu_Walker() ,
) );
?>

