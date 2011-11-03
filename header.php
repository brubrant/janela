<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">	
	    <title><?php wp_title('&mdash;','true','right'); ?><?php bloginfo('name'); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="stylesheet" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>">
			
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		
		<script src="http://use.typekit.com/dwv7qgp.js"></script>
		<script>try{Typekit.load();}catch(e){}</script>
		
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<header class="clearfix">
			<h1 id="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<nav id="access" role="navigation">
				<a id="menu-videos" href="<?php echo home_url( '/' ); ?>" title="Vários vídeos">Vídeos</a>
				<a id="menu-series" href="#" title="Nossas séries" data-reveal-id="myModal">Séries</a>
				<a id="menu-grupos" href="#" title="Tchurma" data-reveal-id="myModals">Grupos</a>
				<a id="menu-sobre" href="<?php echo get_page_link() ?>" title="Jaenla Errad">Sobre</a>
			</nav><!-- /access -->
		</header>
		
		<div id="myModal" class="reveal-modal">
			<h1>Séries</h1>
			<?php wp_tag_cloud( array( 'taxonomy' => 'series', 'number' => 45 ) ); ?>
			<a class="close-reveal-modal">&#215;</a>
		</div>
		
		<div id="myModals" class="reveal-modal">
			<h1>Reveal Modal Goodsasdasdness</h1>
			<p>This is a default modal in all its glory, but any of the styles here can easily be changed in the CSS.</p>
			<a class="close-reveal-modal">&#215;</a>
		</div>

		<div id="main">