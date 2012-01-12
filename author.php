<?php get_header(); ?>
	
	<header class="archive-header" id="member-header">
		<?php $member = get_userdata( get_query_var( 'author' ) ); ?>

   		<?php echo get_avatar( $member->ID, 256, '', 'avatar-' . $member->display_name ); ?>
   		
   		<div class="member-info">
    	
    		<h2 class="header-title" id="member-title"><?php echo $member->display_name; ?></h2>
    		
			<?php if ( ! empty ( $member->description ) ) : ?>
    			<div class="member-description"><?php echo $member->description; ?></div>
    		<?php endif; ?>
    		
    		<?php if ( $member->user_url OR $member->facebook OR $member->twitter != '' ) : ?>
    			<ul class="member-social">
    			    <?php if ( ! empty ( $member->user_url ) ) : ?>
    			    <li class="member-url"><a href="<?php echo esc_url( $member->user_url ); ?>" title="<?php echo $member->user_url; ?>">K</a></li>
    			    <?php endif; ?>
    			    
				    <?php if ( ! empty ( $member->facebook ) ) : ?>
    			    <li class="member-facebook"><a href="http://facebook.com/<?php echo $member->facebook; ?>" title="/<?php echo $member->facebook; ?>">f</a></li>
    			    <?php endif; ?>
    			    
    			    <?php if ( ! empty ( $member->twitter ) ) : ?>
    			    <li class="member-twitter"><a href="http://twitter.com/<?php echo $member->twitter; ?>" title="@<?php echo $member->twitter; ?>">t</a></li>
    			    <?php endif; ?>
    			</ul>
    		<?php endif; ?>
    		
    	</div><!-- /member-info -->
	</header><!-- /member-header -->

	<section class="content clearfix" id="content-list">
		
		<?php
		
		// Altera a query do autor para que seja usado o valor do custom field
		query_posts( 
			array(
				'meta_query' => array (
					'relation' => 'OR',
					array(
						'key' => 'janela_cast',
						'value' => $member->user_login,
						'compare' => 'LIKE'
					),
					array(
						'key' => 'janela_directed',
						'value' => $member->user_login,
						'compare' => 'LIKE'
					),
					array(
						'key' => 'janela_wrote',
						'value' => $member->user_login,
						'compare' => 'LIKE'
					)
				)
			)
		);
		
		get_template_part( 'loop', 'archive' );
		
		?>

	</section><!-- /content -->

<?php get_footer(); ?>