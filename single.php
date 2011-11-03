<?php
/**
 * The template that shows single posts
 * @package WordPress
 * @subpackage Selecta
 */
get_header();
?>

<?php
	// Access global variable directly to set content_width
	if ( isset( $GLOBALS['content_width'] ) )
		$GLOBALS['content_width'] = 940;
?>


	<div id="content" role="main">

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class( 'post-wrapper clearfix' ); ?>>

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
    	
    	<div class="entry-info">
		    <?php echo get_the_term_list( $post->ID, 'series', '', ', ', '' ); ?>
		    <h1 class="entry-title"><?php the_title(); ?></h1>
		    <div class="entry-summary">
            	<?php the_excerpt(); ?>
            </div> 
		</div><!-- /entry-info -->
		
    	<div class="entry-credits">		
		    <?php echo get_the_term_list( $post->ID, 'group', '', ', ', '' ); ?>			
		    <div class="entry-cast">
		    	<?php $credits = get_post_meta( $post->ID, 'janela_cast', $single = true ); ?>
		    	<h3>Com</h3>
		    	<?php $credit = explode(",", $credits); ?>
		    	<?php foreach($credit as $user_login) : ?>
	        	<?php $user = get_userdatabylogin($user_login); ?>
	        	
	        	<a href="<?php echo get_author_posts_url( $user->ID ); ?>" title="<?php echo $user->display_name; ?>" data-tooltip="<?php echo $user->display_name; ?>"><?php echo get_avatar( $user->ID, 60, 'Nome', false ); ?></a>
	    	
	        	<?php endforeach; ?>
	        </div>
	        <div class="entry-directed">
		    	<?php $credits = get_post_meta( $post->ID, 'janela_directed', $single = true ); ?>
		    	<h3>Direção</h3>
		    	<?php $credit = explode(",", $credits); ?>
		    	<?php foreach($credit as $user_login) : ?>
	        	<?php $user = get_userdatabylogin($user_login); ?>
	        	
	        	<a href="<?php echo get_author_posts_url( $user->ID ); ?>" title="<?php echo $user->display_name; ?>" data-tooltip="<?php echo $user->display_name; ?>"><?php echo get_avatar( $user->ID, 60, 'Nome', false ); ?></a>
	    	
	        	<?php endforeach; ?>
	        </div>
	        <div class="entry-wrote">
		    	<?php $credits = get_post_meta( $post->ID, 'janela_wrote', $single = true ); ?>
		    	<h3>Roteiro</h3>
		    	<?php $credit = explode(",", $credits); ?>
		    	<?php foreach($credit as $user_login) : ?>
	        	<?php $user = get_userdatabylogin($user_login); ?>
	        	
	        	<a href="<?php echo get_author_posts_url( $user->ID ); ?>" title="<?php echo $user->display_name; ?>" data-tooltip="<?php echo $user->display_name; ?>"><?php echo get_avatar( $user->ID, 60, 'Nome', false ); ?></a>
	        	
	        	<?php endforeach; ?>
	        </div>
	    </div><!-- /entry-credits -->
	    
	    <div class="entry-share">
        	<div class="share-twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title_attribute(); ?>" data-count="horizontal">Tweet</a><script src="http://platform.twitter.com/widgets.js"></script></div>
        	<div class="share-facebook"><div id="fb-root"></div><script src="http://connect.facebook.net/pt_BR/all.js#appId=221052707924641&amp;xfbml=1"></script><fb:like href="<?php the_permalink() ?>" send="false" layout="button_count" width="90" show_faces="false" font="lucida grande"></fb:like></div>
        	<input class="share-shortlink" type="text" value="<?php echo wp_get_shortlink(get_the_ID()); ?>" onclick="this.focus(); this.select();" />
    	</div><!-- /entry-share -->
    	
    	</div>	

	</div><!-- .entry-wrapper -->
</div><!-- .post-wrapper -->
			
			<nav id="nav-below">
				<h3 class="assistive-text"><?php _e( 'Post navigation', 'selecta' ); ?></h3>
				<span class="nav-previous"><?php previous_post_link( '%link', __( '&larr; Previous Post', 'selecta' ) ); ?></span>
				<span class="nav-next"><?php next_post_link( '%link', __( 'Next Post &rarr;', 'selecta' ) ); ?></span>
			</nav><!-- #nav-below -->

		<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->

<?php get_footer(); ?>