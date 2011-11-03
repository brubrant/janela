<?php
/**
 * The portion of the loop that shows the "standard" post format.
 *
 * @package WordPress
 * @subpackage Selecta
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'post-wrapper clearfix' ); ?>>

	<?php if ( ! is_single() ) : ?>
		<div class="entry-header">
			<?php selecta_entry_date(); ?>

			<?php if ( get_the_title() != '' ) : ?>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permanent Link to %s', 'selecta' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h2>
			<?php else: ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php endif; ?>
		</div><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-wrapper clearfix">
		<div class="entry">
			<?php if ( has_post_thumbnail() && ! is_single() ) : ?>
				<div class="thumbnail-container">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permanent Link to %s', 'selecta' ), the_title_attribute( 'echo=0' ) ) ); ?>">
						<?php the_post_thumbnail( 'normal', array( 'class' => 'post-thumbnail', 'alt' => get_the_title(), 'title' => get_the_title() ) ); ?>
					</a>
				</div><!-- .thumbnail-container -->
			<?php endif; ?>
			<?php the_content( __( 'Continue Reading <span class="meta-nav">&rarr;</span>', 'selecta' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><p><strong>'.__( "Pages:", "selecta" ).' </strong> ', 'after' => '</p></div>', 'next_or_number' => 'number' ) ); ?>
		</div><!-- .entry -->

		<div class="post-info clearfix">
			<p class="post-meta">
				<?php if( get_post_format() == 'aside' ) : ?>
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permanent Link to %s', 'selecta' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php _e( '#' ); ?></a>
			    <?php endif; ?>
				<?php selecta_post_meta(); ?>
				<?php edit_post_link( __( 'Edit this Entry', 'selecta' ), '<span class="edit-link">', '</span>' ); ?>
			</p>
			<p class="comment-link"><?php comments_popup_link( __( 'Leave a Comment', 'selecta' ), __( '1 Comment', 'selecta' ), __( '% Comments', 'selecta' ) ); ?></p>
		</div><!-- .post-info -->
		
		<?php if ( is_single() ) : ?>
		<div id="entry-credits">
			<?php echo get_the_term_list( $post->ID, 'group', 'Grupo: ', ', ', '' ); ?>
			
			<div class="entry-cast">
				<?php $credits = get_post_meta( $post->ID, 'janela_cast', $single = true ); ?>
				<h3>Com</h3>
				<?php $credit = explode(",", $credits); ?>
				<?php foreach($credit as $user_login) : ?>
	    		<?php $user = get_userdatabylogin($user_login); ?>
	    		<div class="pessoa">
	    		    <a href="<?php echo get_bloginfo('url'); ?>?author=<?php echo $user->ID ?>" title="<?php echo $user->display_name; ?>"><?php echo $user->display_name; ?></a>
	    		</div>	    	
	    		<?php endforeach; ?>
	    	</div>
	    </div>
	    <?php endif; ?>

	</div><!-- .entry-wrapper -->
</div><!-- .post-wrapper -->