
<div id="post-<?php the_ID(); ?>" <?php post_class( 'post-wrapper clearfix' ); ?>>

	<?php if ( ! is_single() ) : ?>
		<div class="entry-header">
			<?php if ( get_the_title() != '' ) : ?>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permanent Link to %s', 'selecta' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h2>
			<?php else: ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php endif; ?>
		</div><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-wrapper clearfix">
		<div class="entry-content">
			<?php the_content( __( 'Continue Reading <span class="meta-nav">&rarr;</span>', 'selecta' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><p><strong>'.__( "Pages:", "selecta" ).' </strong> ', 'after' => '</p></div>', 'next_or_number' => 'number' ) ); ?>
		</div><!-- .entry -->

	</div><!-- .entry-wrapper -->
</div><!-- .post-wrapper -->