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
		<header id="pinhead" class="clearfix">
			<h1 id="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">Janela errada<small>Beta</small></a></h1>
			<nav id="access" role="navigation">
				<a id="menu-series" href="#" title="Nossas séries" data-reveal-id="modal-series">Séries</a>
				<a id="menu-grupos" href="#" title="Tchurma" data-reveal-id="modal-grupos">Grupos</a>
				<a id="menu-sobre" href="#" title="Jaenla Errad" data-reveal-id="modal-sobre">Sobre</a>
			</nav><!-- /access -->
		</header>
		
		<div id="modal-series" class="reveal-modal">
			<h3 class="lista-title">As melhores séries você só encontra aqui</h3>			
            <?php janela_lista( 'series' ); ?>
            <a class="close-reveal-modal">&#215;</a>
		</div>
		
		<div id="modal-grupos" class="reveal-modal">
			<h3 class="lista-title">Os bons são maioria</h3>			
			<a class="close-reveal-modal">&#215;</a> 
            <?php janela_lista( 'group' ); ?>
		</div>
		
		<div id="modal-sobre" class="reveal-modal">
			<?php $the_query = new WP_Query( 'pagename=sobre' );
			while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				
			<?php the_content(); ?>
			
			<?php endwhile; ?>
			<a class="close-reveal-modal">&#215;</a>
		</div>

		<div id="main">