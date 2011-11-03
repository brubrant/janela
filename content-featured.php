<?php
/**
 * The template for displaying content featured in the showcase.php page template
 *
 * @package WordPress
 * @subpackage Selecta
 */

 global $content_width;
 $content_width = 640;
?>

<div class="featured-post-header">
	<?php selecta_entry_date(); ?>
	<h2 class="featured-entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'selecta' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
</div><!-- .featured-post-header -->

<div class="featured-post-content">
	<div class="entry">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry -->
</div><!-- .featured-post-content -->