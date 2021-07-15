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
    'items_wrap'  => '<ul id="%1$s" class="%2$s">%3$s
</ul>',
    'walker' => new Header_Menu_Walker() ,
) );
?>

