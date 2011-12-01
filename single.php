<?php get_header();
	if ( isset( $GLOBALS['content_width'] ) )
		$GLOBALS['content_width'] = 940;
?>

	<section class="content clearfix">
	
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>
			
			<div id="entry-credits">
				<ul class="nav">
            	   	<li class="nav-title"><a href="#credit-main" class="current">Creditos</a></li>
                    <?php $credits_full = get_post_meta( $post->ID, 'janela_bio', $single = true ); ?>
                    <?php if ( ! empty ( $credits_full ) ) : ?>
            	   	<li class="nav-full"><a href="#credit-full">Completo</a></li>
                    <?php endif; ?>
            	</ul>
            	<div id="credit-main">
			    	<div class="entry-cast">
			    		<?php $credits = get_post_meta( $post->ID, 'janela_cast', $single = true ); ?>
                        <?php if ( ! empty ( $credits ) ) : ?>
                            <h3>Com</h3>
                            <?php $credit = explode(",", $credits); ?>
                            <?php foreach($credit as $user_login) : ?>
                            	<?php $user = get_userdatabylogin($user_login); ?>
			    				<a href="<?php echo get_author_posts_url( $user->ID ); ?>" title="<?php echo $user->display_name; ?>" data-tooltip="<?php echo $user->display_name; ?>"><?php echo get_avatar( $user->ID, 60, 'Nome', false ); ?></a>
			    			<?php endforeach; ?>
						<?php endif; ?>
			    	</div>
			    	<div class="entry-directed">
			    		<?php $credits = get_post_meta( $post->ID, 'janela_directed', $single = true ); ?>
			    		<?php if ( ! empty ( $credits ) ) : ?>
                            <h3>Direção</h3>
                            <?php $credit = explode(",", $credits); ?>
                            <?php foreach($credit as $user_login) : ?>
                            	<?php $user = get_userdatabylogin($user_login); ?>
			    				<a href="<?php echo get_author_posts_url( $user->ID ); ?>" title="<?php echo $user->display_name; ?>" data-tooltip="<?php echo $user->display_name; ?>"><?php echo get_avatar( $user->ID, 60, 'Nome', false ); ?></a>
			    			<?php endforeach; ?>
						<?php endif; ?>
			    	</div>
			    	<div class="entry-wrote">
			    		<?php $credits = get_post_meta( $post->ID, 'janela_wrote', $single = true ); ?>
			    		<?php if ( ! empty ( $credits ) ) : ?>
                            <h3>Roteiro</h3>
                            <?php $credit = explode(",", $credits); ?>
                            <?php foreach($credit as $user_login) : ?>
                            	<?php $user = get_userdatabylogin($user_login); ?>
			    				<a href="<?php echo get_author_posts_url( $user->ID ); ?>" title="<?php echo $user->display_name; ?>" data-tooltip="<?php echo $user->display_name; ?>"><?php echo get_avatar( $user->ID, 60, 'Nome', false ); ?></a>
			    			<?php endforeach; ?>
						<?php endif; ?>
			    	</div>
			    </div>
                <?php if ( ! empty ( $credits_full ) ) : ?>
			    <div id="credit-full" class="hide">
			    	<?php echo $credits_full; ?>
			    </div>
                <?php endif; ?>
			    
			</div><!-- /entry-credits -->
			
			<?php janela_share(); ?>
						
		<?php endwhile; ?>
	
	</section>

<?php get_footer(); ?>