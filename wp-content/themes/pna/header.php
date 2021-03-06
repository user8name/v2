<!DOCTYPE html>
<html <?php  language_attributes();?> style="margin-top: 0px !important;">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width">
    <meta name="description" content="<?php get_meta_description();?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?php get_meta_keyword();?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset');?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php get_meta_title();?></title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/public.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/style.css">
    <?php wp_head();
    $noindex= get_post_meta(get_the_ID(), "noIndex", true);
    if ($noindex==='1') {
        echo '<meta name="robots" content="noindex,nofollow" />';
    }
    echo apply_filters('custom_get_canonical_url','');
    ?>
</head>
<body>
<button class="gotop">
    <span class="fa fa-chevron-up"></span>
</button>
<div class="barmobile">
    <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
         y="0px"   viewBox="0 0 48 48" style="enable-background:new 0 0 48 48;"
         xml:space="preserve">
            <rect x="2.333" y="6" style="fill:rgba(235,84,37,1);" width="19.333" height="4.125"></rect>
        <rect x="2.333" y="18.188" style="fill:rgba(235,84,37,1);" width="35.667" height="4.125"></rect>
        <rect x="21.833" y="29.625" style="fill:rgba(235,84,37,1);" width="16.333" height="4.125"></rect>
            </svg>
</div>
<div class="topnavi">
</div>

<div class="header-shell">
    <div class="navigation_shell container"><!-- mobile-move-->
        <a class="logo" id="pc-log" href="<?php echo home_url();?>">
            <img src="<?php echo get_template_directory_uri();?>/images/CD-logo.svg" alt="logo">
        </a>
        <div class="mobile-nav mobile-move">
            <?php get_template_part('/modules/nav');?>
        </div>
        <div class="header-search">
            <span class="fa fa-search search-show"></span>
            <span class="fa fa-times search-close"></span>
            <form class="search-platform" action="<?php echo home_url();?>" method="get" style="display:none">
                <input type="text" placeholder="Please input keywords." name="s"   required="">
                <button class="">Search</button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/breeding.js?v=1.6"></script>