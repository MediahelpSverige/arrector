<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />

		<title>ARRECTOR.SE</title>
        
        <link rel="icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon">
        <link rel="icon" type="<?php bloginfo('template_directory'); ?>/image/png" href="images/favicon.png" /> 
        
		<meta name="description" content="" />
        <meta name="author" content="admin" />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    
    <link href="<?php bloginfo('template_directory'); ?>/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="<?php bloginfo('template_directory'); ?>/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/css/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php bloginfo('template_directory'); ?>/css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/jquery.mCustomScrollbar.css">
     <link href="<?php bloginfo('template_directory'); ?>/css/developer.css" rel="stylesheet" type="text/css" />
    <link href="<?php bloginfo('template_directory'); ?>/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,400italic,300italic,300,100italic,100,900italic,900,700italic' rel='stylesheet' type='text/css'>
    

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!--header part start-->
<header class="header_part">
	<div class="header_top">
    	<div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <h1 class="logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_field('header_icon',4); ?>" alt=""></a></h1>
                </div>
                <div class="col-sm-5">
                	<div class="search_area clearfix">
                    	<!-- <input name="" placeholder="Type your search here" type="text">
                        <button><i class="fa fa-search"></i></button> -->
                        <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<input type="text" placeholder="Type your search here" value="<?php echo get_search_query(); ?>" name="s" id="s" />
							<button type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
					</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu_part">
    	<div class="container">
            <div class="navbar navbar-default">
            	<div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
            	</div>
                <div class="navbar-collapse collapse">
                	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav navbar-nav', 'menu_id' => 'primary-menu' ) ); ?>
<!--                     <ul class="nav navbar-nav">
                        <li class="active"><a href="#">HEM</a></li>
                        <li><a href="#">VÅRA FASTIGHETER</a></li>
                        <li><a href="#">INTRESSEANMÄLAN</a></li>
                        <li><a href="#">FELANMÄLAN</a></li>
                        <li><a href="#">KONTAKT</a></li>
                        <li><a href="#">ARRECTOR </a></li>
                     </ul> -->
                </div>
            </div>
        </div>
    </div>
</header>
<!--header part start-->