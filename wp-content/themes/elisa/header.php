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
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/header-footer.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/icons.css">
    <link href="<?php  echo get_template_directory_uri()?>/css/validationEngine.jquery.css" rel="stylesheet" type="text/css">
    <script src="<?php echo get_template_directory_uri();?>/js/jquery.validationEngine-en.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/js/jquery.validationEngine.js"></script>
    <?php wp_head();
    $noindex= get_post_meta(get_the_ID(), "noIndex", true);
    if ($noindex==='1') {
        echo '<meta name="robots" content="noindex,nofollow" />';
    }
    echo apply_filters('custom_get_canonical_url','');
    ?>
</head>
<body>
<div class="head-nav">
    <div class="container">
        <div class="header-one">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <nav class="navbar navbar-default">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand logo-part" href="#">
                                <img src="<?php echo get_template_directory_uri();?>/images/logo.png">
                            </a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <?php get_template_part('/modules/nav');?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
