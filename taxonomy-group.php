<?php get_header(); ?>

	<section id="content">

		<?php the_post(); ?>
		
		<div id="archive-header">
		   
            <?php
			// Procura pelos dados da metabox de grupo
			$meta = get_option( 'group_extras' );
			
			echo 'Visualização dos campos: <br/>';
			print_r($meta);
						

			// Procura os dados do grupo atual através do slug
			$group = get_term_by( 'slug', $term, 'group' );
			
			if (empty($meta)) $meta = array();
			if (!is_array($meta)) $meta = (array) $meta;
		
			$meta = isset( $meta[$group->term_id] ) ? $meta[$group->term_id] : array();
			
			?>
            
			<h1><?php single_cat_title(); ?></h1>
            
			<?php
			// URL
			if ( ! empty( $meta['group_url'] ) ) : ?>
                <div class="group-url">
                	<a href="#"><?php echo $meta['group_url']; ?></a>
                </div>
            <?php
            endif;
			
			// Descrição
			$group_description = term_description();
			
			if ( ! empty( $group_description ) ) : ?>
                <div class="group-description">
                    <?php echo $group_description; ?>
                </div>
            <?php
            endif;
			
			// Membros
			if ( ! empty( $meta['group_members'] ) ) : ?>
            	<div class="group-members">
                	<?php $member = explode( ',', $meta['group_members'] ); ?>
                    
                	<ul>
						<?php foreach ( $member as $member_name ) : ?>
                        <li><?php echo $member_name; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php
			endif;
			?>
            
		</div><!-- /archive-header -->
		
		<?php rewind_posts(); ?>
		
		<?php get_template_part( 'loop', 'archive' ); ?>

	</section><!-- /content -->

<?php get_footer(); ?>