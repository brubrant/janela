<?php get_header(); ?>

	<section id="content">

		<?php the_post(); ?>
		
		<div id="archive-header">
			<?php $meta = get_option('first_section');
			if (empty($meta)) $meta = array();
			if (!is_array($meta)) $meta = (array) $meta;
			
			$meta = isset($meta['trintaeum-filmes']) ? $meta['trintaeum-filmes'] : array();
			
			$value = $meta['group_url'];
			
			echo $value; ?>
			<h1><?php single_cat_title(); ?></h1>
		</div><!-- /archive-header -->
		
		<?php rewind_posts(); ?>
		
		<?php get_template_part( 'loop', 'archive' ); ?>

	</section><!-- /content -->

<?php get_footer(); ?>