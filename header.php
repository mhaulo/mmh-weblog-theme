<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Future_Imperfect
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,700|Source+Sans+Pro:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Alegreya:400,700|Alegreya+SC:400,700' rel='stylesheet' type='text/css'>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site container-fluid no-padding">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'future-imperfect' ); ?></a>

	<div class="row no-margin">
		<div class="col-xs-12 col-lg-3 site-header">
			<header id="masthead" role="banner">
				<div class="site-branding">
					<div class="site-avatar">
						<?php if (get_header_image() != ""): ?>
							<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" / class="hidden-xs hidden-sm">
						<?php endif; ?>
					</div>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					
					<?php

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php
					endif; ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="btn btn-link menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-navicon"></i></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container_class' => "primary-menu", 'fallback_cb' => false ) ); ?>
				</nav><!-- #site-navigation -->
				
				<div class="">
					<?php get_sidebar("sidebar-1"); ?>
				</div>
				
				<div class="site-info hidden-xs hidden-sm">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'future-imperfect' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'future-imperfect' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'future-imperfect' ), 'future-imperfect', '<a href="http://haulo.fi" rel="designer">Mika Haulo</a>' ); ?>
				</div><!-- .site-info -->
			</header><!-- #masthead -->
		</div>

