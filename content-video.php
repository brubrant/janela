<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="hentry-wrap">
    	<div class="entry-content">
    		<?php the_content(  'Continua...' ); ?>
    	</div><!-- /entry-content -->
    	
    	<?php echo get_the_term_list( $post->ID, 'series', '', ', ', '' ); ?>
    	<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __( 'Read, comment and share &ldquo;%s&rdquo;', 'janela' ), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    	<?php echo get_the_term_list( $post->ID, 'group', '', ', ', '' ); ?>
    </div>
    
</article><!-- /video-<?php the_ID(); ?> -->