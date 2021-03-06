<!DOCTYPE html>
<html <?php  language_attributes();?> style="margin-top: 0px !important;">
<head>
    <title><?php get_meta_title();?></title>
    <meta name="description" content="<?php get_meta_description();?>" />
    <meta name="keywords" content="<?php get_meta_keyword();?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset');?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/images/favicon.png" type="image/x-icon">
    <link rel='stylesheet' id='s-v1-public-css'  href='<?php echo get_template_directory_uri();?>/css/public.css?ver=1615947479' type='text/css' media='all' />
    <link rel='stylesheet' id='s-v1-style-css'  href='<?php echo get_template_directory_uri();?>/css/style.css?ver=1615958730' type='text/css' media='all' />
    <script type='text/javascript' src='<?php echo get_template_directory_uri();?>/js/jquery-migrate.min.js?ver=1.4.1'></script>
    <script type='text/javascript' src='<?php echo get_template_directory_uri();?>/js/jquery-3.1.1.min.js?ver=1600156821'></script>
    <script type='text/javascript' src='<?php echo get_template_directory_uri();?>/js/menu.min.js?ver=1616640504'></script>
    <?php wp_head();
    $noindex= get_post_meta(get_the_ID(), "noIndex", true);
    if ($noindex==='1') {
        echo '<meta name="robots" content="noindex,nofollow" />';
    }
    echo apply_filters('custom_get_canonical_url','');
    ?>

</head>
<body>

<div class="top-container">
    <div class="top-link">
        <div class="top-email"><span class="fa fa-envelope"></span> <span id="xload-le" class="xload-tel" data-file="<?php echo get_template_directory_uri();?>/_noindex/ajax/786a0b4a39efab23" data-scroll="false"></span><script>$(function () { $("#xload-le").xload(); });</script><noscript><a class="email-info"></a></noscript></div>
        <div class="top-phone"><span class="fa fa-phone"></span> <span id="xload-l" class="xload-tel" data-file="<?php echo get_template_directory_uri();?>/_noindex/ajax/2dd2e32c96396fb6" data-scroll="false"></span><script>$(function () { $("#xload-l").xload(); });</script><noscript><img src="<?php echo get_template_directory_uri();?>/_noindex/phone-white.svg" alt="phone" style="height: 17px;display: inline-block;margin-top: 3px;"></noscript></div>
    </div>
</div>
<div class="nav">
    <div class="auto-header">
        <a href="<?php echo  home_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="logo"/></a>
        <div id='menu' class="menu">
            <?php get_template_part('/modules/nav');?>
        </div>
        <div class="submit_search">
            <div class="submitsearchshow">
                <form action="<?php  echo  home_url();?>" method="get">
                    <label class="radio-inline">
                        <input type="radio" name="ty"   class="rdo_productsearch" id="ProductSearch" value="2" checked="checked"> Product Search
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="ty" class="rdo_Servicesearch" id="ServiceSearch" value="1"> Service Search
                    </label>
                    <div class="submitsearch-box">
                        <input type="text" placeholder="Please type your keywords." id="searchkey" name="s" value="" class="search-input" required="">
                        <div class="buttonbox"><button type="submit" id="ClickMe">Search</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>