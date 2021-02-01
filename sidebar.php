<aside id="sidebar">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	<nav id="menu">
<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); 
//menu name needs to be 'main-menu'
?>
</nav>
<?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
<div id="primary" class="widget-area">
<ul class="xoxo">
<?php dynamic_sidebar( 'primary-widget-area' ); ?>
</ul>
</div>
<?php endif; ?>
</aside>