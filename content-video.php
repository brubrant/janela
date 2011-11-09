<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="hentry-wrap">
		
		<?php if ( is_single() ) : ?>
		
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			
		<?php else : ?>
	
    		<?php if ( has_post_thumbnail() ) { ?>
        	    <div class="entry-feature">
        	   		<a href="<?php the_permalink(); ?>" title="<?php printf( __( 'Watch and share &ldquo;%s&rdquo;', 'janela' ), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_post_thumbnail( 'medium' ); ?></a>
        		</div>
        	<?php } ?>
        
        <?php endif; ?>
    	
    	<?php echo get_the_term_list( $post->ID, 'series', '<span class="entry-series">', ', ', '</span>' ); ?>
    	<?php if ( is_single() ) : ?>
    		<h2 class="entry-title"><?php the_title(); ?></h2>
    	<?php else : ?>
    		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __( 'Watch and share &ldquo;%s&rdquo;', 'janela' ), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    	<?php endif; ?>
    	<?php echo get_the_term_list( $post->ID, 'group', '<span class="entry-group">', ', ', '</span>' ); ?>
    </div>
    
</article><!-- /video-<?php the_ID(); ?> -->