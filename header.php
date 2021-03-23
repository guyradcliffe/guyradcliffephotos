<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W2Z22GG');</script>
<!-- End Google Tag Manager -->

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php
loadHead();
wp_deregister_script('jquery');
wp_head(); //needed for title and meta-description
?>
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W2Z22GG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="wrapper" class="hfeed">
	<span id="menuBtn" onclick="openNav()">&#9776;</span>
<header id="header">
<?php // custom
if ( is_front_page() || is_home() || is_front_page() && is_home() ) { ?>
<img src="https://photos.guyradcliffe.com/wp-content/uploads/2018/07/20180714_192954.jpg" alt="Guy Radcliffe Photos, Hunting and Fishing" id="imagestyle">
<div id="branding"></div> <!-- branding div is a 'container' for site-title and site description -->
<div class="insidebranding">
	<img src="https://photos.guyradcliffe.com/wp-content/themes/guyradcliffetheme/website-logo.png" alt="Guy Radcliffe Photos" />
	<div id="site-title">
		<h1>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
		</h1>
		<div id="site-description"><?php bloginfo( 'description' ); ?></div>
	</div><!-- site-title div -->
</div><!-- insidebranding div -->
<?php } //end custom ?>
</header>
<div id="container">
	<div id="search"><?php get_search_form(); ?></div>
	<?php
	if (!($_SERVER['REQUEST_URI']==='/')) {
		//show yoast breadcrumbs if not on home page
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		}
	} else {
		// show nothing on home page
	}

