<?php get_header(); ?>

	<section id="content">

		<?php 
            
        $member = get_userdata( get_query_var( 'author' ) );
        
        print_r($member);
        ?>
            
        <div class="member-avatar"><?php echo get_avatar( $member->ID, 256, '', 'avatar-' . $member->display_name ); ?></div>
        
        <h1 class="member-name"><?php echo $member->display_name; ?></h1>
        
		<?php if ( ! empty ( $member->user_url ) ) : ?>
        <div class="member-url"><?php echo $member->user_url; ?></div>
        <?php endif; ?>
        
		<?php if ( ! empty ( $member->description ) ) : ?>
        <div class="member-description"><?php echo $member->description; ?></div>
        <?php endif; ?>
        
        <?php if ( $member->facebook OR $member->twitter != '' ) : ?>
        <div class="member-social">
        	<ul>
				<?php if ( ! empty ( $member->facebook ) ) : ?>
                <li class="member-facebook"><?php echo $member->facebook; ?></li>
                <?php endif; ?>
                
                <?php if ( ! empty ( $member->twitter ) ) : ?>
                <li class="member-twitter"><?php echo $member->twitter; ?></li>
                <?php endif; ?>
            </ul>
		</div><!-- .member-social -->
        <?php endif; ?>
     

		
		<?php //get_template_part( 'loop', 'archive' ); ?>

	</section><!-- /content -->

<?php get_footer(); ?>