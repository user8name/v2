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
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/public.css">
    <script src="<?php echo get_template_directory_uri();?>/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/js/menu.min2.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri();?>/js/search-min.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri();?>/js/banner.min.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri();?>/js/tool.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri();?>/js/scrolltopcontrol.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri();?>/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
    <?php wp_head();
    $noindex= get_post_meta(get_the_ID(), "noIndex", true);
    if ($noindex==='1') {
        echo '<meta name="robots" content="noindex,nofollow" />';
    }
    echo apply_filters('custom_get_canonical_url','');
    ?>
</head>
<body>
<div class="top-header">
    <div class="auto-header">
        <span><i class="fa fa-phone"></i>Tel: 1-631-372-1052</span>
        <span><i class="fa fa-envelope-o"></i>Email: <a class="email-info" href="mailto:clinicaldisposal.com">info@clinicaldisposal.com</a></span>
        <span class="iconright"><a href=""><span class="fa fa-facebook"></span></a>
        <a href=""><span class="fa fa-twitter"></span></a>
        <a href=""><span class="fa fa-linkedin-square"></span></a></span>
    </div>
</div>
<div class="nav" style="top: 0px;">
    <div class="auto-header">
        <div class="logo"><a href="<?php echo home_url();?>"><img src="<?php echo get_template_directory_uri();?>/images/logo.png"></a></div>
        <div class="cart-top"><a></a></div>
        <div class="submit_search"><a id="clickme"></a></div>
        <div class="menu">
            <?php get_template_part('/modules/nav');?>
        </div>
        <div id="goodcover"></div>
        <div id="code">
            <div class="close1"><a href="javascript:void(0);" id="closebt"></a></div>
            <div class="searchtxt">
                <!--<select class="search-sc">
                <option value="services">Service Search</option>
                <option value="product">Product Search</option>
                <option value="google">Keywords Search</option>
                </select>-->
                <form action="<?php  echo  home_url();?>" method="get">
                    <input type="text" placeholder="Please input your keywords." id="searchkey" name="s" class="search-input">
                    <input type="submit" value="Search" id="search_button" class="btnx">
                </form>
            </div>
        </div>
        <!--menu End-->
    </div>
</div>
<link href="<?php  echo get_template_directory_uri()?>/css/jquery.validationEngine.css" rel="stylesheet" type="text/css">
<script src="<?php echo get_template_directory_uri();?>/js/jquery.validationEngine-en.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jquery.validationEngine.js"></script>
