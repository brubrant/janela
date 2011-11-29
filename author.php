<?php get_header(); ?>

	<section id="content">

		<?php $member = get_userdata( get_query_var( 'author' ) ); ?>
            
        <div class="member-avatar"><?php echo get_avatar( $member->ID, 256, '', 'avatar-' . $member->display_name ); ?></div>
        
        <h1 class="member-name"><?php echo $member->display_name; ?></h1>
        
		<?php if ( ! empty ( $member->user_url ) ) : ?>
        <div class="member-url"><a href="<?php echo esc_url( $member->user_url ); ?>" title=""><?php echo $member->user_url; ?></a></div>
        <?php endif; ?>
        
		<?php if ( ! empty ( $member->description ) ) : ?>
        <div class="member-description"><?php echo $member->description; ?></div>
        <?php endif; ?>
        
        <?php if ( $member->facebook OR $member->twitter != '' ) : ?>
        <div class="member-social">
        	<ul>
				<?php if ( ! empty ( $member->facebook ) ) : ?>
                <li class="member-facebook"><a href="<?php echo esc_url( $member->facebook ); ?>" title=""><?php echo $member->facebook; ?></a></li>
                <?php endif; ?>
                
                <?php if ( ! empty ( $member->twitter ) ) : ?>
                <li class="member-twitter"><a href="<?php echo esc_url( $member->twitter ); ?>" title=""><?php echo $member->twitter; ?></a></li>
                <?php endif; ?>
            </ul>
		</div><!-- .member-social -->
        <?php endif; ?>
     

		
		<?php //get_template_part( 'loop', 'archive' ); ?>

	</section><!-- /content -->

<?php get_footer(); ?>